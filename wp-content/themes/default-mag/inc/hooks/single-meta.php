<?php
/**
 * Implement theme metabox.
 *
 * @package Default Mag
 */
if (!function_exists('default_magadd_theme_meta_box')) :

    /**
     * Add the Meta Box
     *
     * @since 1.0.0
     */
    function default_magadd_theme_meta_box()
    {

        $screens = array('post', 'page');

        foreach ($screens as $screen) {
            add_meta_box(
                'default-theme-settings',
                esc_html__('Single Page/Post Layout Settings', 'default-mag'),
                'default_magrender_theme_settings_metabox',
                $screen,
                'normal', 
            	'high'

            );
        }

    }

endif;

add_action('add_meta_boxes', 'default_magadd_theme_meta_box');


if ( ! function_exists( 'default_magrender_theme_settings_metabox' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @since 1.0.0
	 */
	function default_magrender_theme_settings_metabox( $post, $metabox ) {

		$post_id = $post->ID;
		$default_magpost_meta_value = get_post_meta($post_id);

		// Meta box nonce for verification.
		wp_nonce_field( basename( __FILE__ ), 'default_magmeta_box_nonce' );
		// Fetch Options list.
		$page_layout = get_post_meta($post_id,'default-mag-meta-select-layout',true);
		$default_magmeta_checkbox = get_post_meta($post_id,'default-mag-meta-checkbox',true);
	?>

	<div class="default-tab-main">

        <div class="default-metabox-tab">
            <ul>
                <li>
                    <a id="twp-tab-general" class="twp-tab-active" href="javascript:void(0)"><?php esc_html_e('Layout Settings', 'default-mag'); ?></a>
                </li>
            </ul>
        </div>

        <div class="default-tab-content">
            
            <div id="twp-tab-general-content" class="default-content-wrap default-tab-content-active">

                <div class="default-meta-panels">

                    <div class="default-opt-wrap default-checkbox-wrap">

                        <input id="default-mag-meta-checkbox" name="default-mag-meta-checkbox" type="checkbox" <?php if ( $default_magmeta_checkbox ) { ?> checked="checked" <?php } ?> />

                        <label for="default-mag-meta-checkbox"><?php esc_html_e('Check To Enable Featured Image On Single Page', 'default-mag'); ?></label>
                    </div>

                    <div class="default-opt-wrap default-opt-wrap-alt">
						
						<label><?php esc_html_e('Single Page/Post Layout', 'default-mag'); ?></label>

	                     <select name="default-mag-meta-select-layout" id="default-mag-meta-select-layout">
				            <option value="right-sidebar" <?php selected('right-sidebar',$page_layout);?>>
				            	<?php _e( 'Content - Primary Sidebar', 'default-mag' )?>
				            </option>
				            <option value="left-sidebar" <?php selected('left-sidebar',$page_layout);?>>
				            	<?php _e( 'Primary Sidebar - Content', 'default-mag' )?>
				            </option>
				            <option value="no-sidebar" <?php selected('no-sidebar',$page_layout);?>>
				            	<?php _e( 'No Sidebar', 'default-mag' )?>
				            </option>
			            </select>

			        </div>

                </div>
            </div>

        </div>
    </div>

    <?php
	}

endif;



if ( ! function_exists( 'default_magsave_theme_settings_meta' ) ) :

	/**
	 * Save theme settings meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post object.
	 */
	function default_magsave_theme_settings_meta( $post_id, $post ) {

		// Verify nonce.
		if ( ! isset( $_POST['default_magmeta_box_nonce'] ) || ! wp_verify_nonce( $_POST['default_magmeta_box_nonce'], basename( __FILE__ ) ) ) {
			  return; }

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check permission.
		if ( 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return; }
		} else if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$default_magmeta_checkbox =  isset( $_POST[ 'default-mag-meta-checkbox' ] ) ? esc_attr($_POST[ 'default-mag-meta-checkbox' ]) : '';
		update_post_meta($post_id, 'default-mag-meta-checkbox', sanitize_text_field($default_magmeta_checkbox));

		$default_magmeta_select_layout =  isset( $_POST[ 'default-mag-meta-select-layout' ] ) ? esc_attr($_POST[ 'default-mag-meta-select-layout' ]) : '';
		if(!empty($default_magmeta_select_layout)){
			update_post_meta($post_id, 'default-mag-meta-select-layout', sanitize_text_field($default_magmeta_select_layout));
		}
	}

endif;

add_action( 'save_post', 'default_magsave_theme_settings_meta', 10, 3 );