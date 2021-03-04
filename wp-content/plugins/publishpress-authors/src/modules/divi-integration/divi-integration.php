<?php
/**
 * @package PublishPress Authors
 * @author  PublishPress
 *
 * Copyright (C) 2018 PublishPress
 *
 * This file is part of PublishPress Authors
 *
 * PublishPress Authors is free software: you can redistribute it
 * and/or modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation, either version 3 of the License,
 * or (at your option) any later version.
 *
 * PublishPress is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PublishPress.  If not, see <http://www.gnu.org/licenses/>.
 */

use MultipleAuthors\Classes\Legacy\Module;
use MultipleAuthors\Classes\Objects\Author;
use MultipleAuthors\Factory;

if (!class_exists('MA_Divi_Integration')) {
    /**
     * class MA_Divi_Integration
     */
    class MA_Divi_Integration extends Module
    {
        public $module_name = 'divi_integration';

        /**
         * Instance for the module
         *
         * @var stdClass
         */
        public $module;

        /**
         * Construct the MA_Divi_Integration class
         */
        public function __construct()
        {
            $this->module_url = $this->get_module_url(__FILE__);

            // Register the module with PublishPress
            $args = [
                'title'             => __('Divi Integration', 'publishpress-authors'),
                'short_description' => __('Add compatibility with the Divi Theme Builder', 'publishpress-authors'),
                'module_url'        => $this->module_url,
                'icon_class'        => 'dashicons dashicons-feedback',
                'slug'              => 'divi-integration',
                'default_options'   => [
                    'enabled' => 'on',
                ],
                'options_page'      => false,
                'autoload'          => true,
            ];

            // Apply a filter to the default options
            $args['default_options'] = apply_filters(
                'pp_divi_integration_default_options',
                $args['default_options']
            );

            $legacyPlugin = Factory::getLegacyPlugin();

            $this->module = $legacyPlugin->register_module($this->module_name, $args);

            parent::__construct();
        }

        /**
         * Initialize the module. Conditionally loads if the module is enabled
         */
        public function init()
        {
            try {
                add_filter('et_builder_resolve_dynamic_content', [$this, 'resolveDefaultDynamicContent'], 15, 6);
            } catch (Exception $e) {
                error_log(
                    sprintf('[PublishPress Authors] Method [%s] caught the exception %s', __METHOD__, $e->getMessage())
                );
            }
        }

        /**
         * Resolve built-in dynamic content fields.
         *
         * @param string $content
         * @param string $name
         * @param array $settings
         * @param string $context
         * @param integer $post_id
         *
         * @return string
         * @copyright Based on the function et_builder_filter_resolve_default_dynamic_content found in the DIVI theme.
         *
         */
        public function resolveDefaultDynamicContent($content, $name, $settings, $post_id, $context, $overrides)
        {
            global $shortname, $wp_query;

            $_       = ET_Core_Data_Utils::instance();
            $def     = 'et_builder_get_dynamic_attribute_field_default';
            $post    = get_post($post_id);
            $author  = null;
            $wrapped = false;
            $is_woo  = false;

            if (is_author()) {
                $author = get_queried_object();

                if ($author instanceof WP_User) {
                    $author = Author::get_by_user_id($author->ID);
                }
            } elseif ($post) {
                $author = get_multiple_authors($post_id);
                $author = $author[0];
            }

            switch ($name) {
                case 'post_author':
                    $name_format      = $_->array_get($settings, 'name_format', $def($post_id, $name, 'name_format'));
                    $link             = $_->array_get($settings, 'link', $def($post_id, $name, 'link'));
                    $link             = 'on' === $link;
                    $link_destination = $_->array_get(
                        $settings,
                        'link_destination',
                        $def($post_id, $name, 'link_destination')
                    );
                    $link_target      = 'author_archive' === $link_destination ? '_self' : '_blank';
                    $label            = '';
                    $url              = '';

                    if (!$author) {
                        $content = '';
                        break;
                    }

                    switch ($name_format) {
                        case 'display_name':
                            $label = $author->display_name;
                            break;
                        case 'first_last_name':
                            $label = $author->first_name . ' ' . $author->last_name;
                            break;
                        case 'last_first_name':
                            $label = $author->last_name . ', ' . $author->first_name;
                            break;
                        case 'first_name':
                            $label = $author->first_name;
                            break;
                        case 'last_name':
                            $label = $author->last_name;
                            break;
                        case 'nickname':
                            $label = $author->nickname;
                            break;
                        case 'username':
                            $label = $author->user_login;
                            break;
                    }

                    switch ($link_destination) {
                        case 'author_archive':
                            $url = $author->link;
                            break;
                        case 'author_website':
                            $url = $author->user_url;
                            break;
                    }

                    $content = esc_html($label);

                    if ($link && !empty($url)) {
                        $content = sprintf(
                            '<a href="%1$s" target="%2$s">%3$s</a>',
                            esc_url($url),
                            esc_attr($link_target),
                            et_core_esc_previously($content)
                        );
                    }
                    break;

                case 'post_author_bio':
                    if (!$author) {
                        break;
                    }

                    $content = et_core_intentionally_unescaped($author->description, 'cap_based_sanitized');
                    break;

                case 'post_author_url':
                    if (!$author) {
                        break;
                    }

                    $content = esc_url($author->link);
                    break;

                case 'post_author_profile_picture':
                    if (!$author) {
                        break;
                    }

                    $content = $author->get_avatar_url();
                    if (is_array($content)) {
                        $content = $content['url'];
                    }
            }

            // Handle in post type URL options.
            $post_types = et_builder_get_public_post_types();
            foreach ($post_types as $public_post_type) {
                $key = 'post_link_url_' . $public_post_type->name;

                if ($key !== $name) {
                    continue;
                }

                $selected_post_id = $_->array_get($settings, 'post_id', $def($post_id, $name, 'post_id'));
                $content          = esc_url(get_permalink($selected_post_id));
                break;
            }

            // Wrap non plain text woo data to add custom selector for styling inheritance.
            // It works by checking is the content has HTML tag.
            if ($is_woo && $content && preg_match('/<\s?[^\>]*\/?\s?>/i', $content)) {
                $content = sprintf(
                    '<div class="woocommerce et-dynamic-content-woo et-dynamic-content-woo--%2$s">%1$s</div>',
                    $content,
                    $name
                );
            }

            if (!$wrapped) {
                $content = et_builder_wrap_dynamic_content($post_id, $name, $content, $settings);
                $wrapped = true;
            }

            return $content;
        }
    }
}
