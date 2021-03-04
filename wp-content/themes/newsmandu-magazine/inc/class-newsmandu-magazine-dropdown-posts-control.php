<?php
/**
 * Customizer custom controls
 *
 * @package Newsmandu
 * @subpackage Newsmandu
 * @since newsmandu 1.0.0
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Customize Control for Posts Select.
 *
 * @since Ghumgham 1.0.0
 *
 * @see WP_Customize_Control
 */
class Newsmandu_Magazine_Dropdown_Posts_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'dropdown_posts';

	/**
	 * Post.
	 *
	 * @access public
	 * @var string
	 */
	private $posts = array();

	/**
	 * Constructor.
	 *
	 * @since Ghumgham 1.0.0
	 *
	 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
	 * @param string               $id      Control ID.
	 * @param array                $args    Optional. Arguments to override class property defaults.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		// Get our Posts.
		$this->posts = get_posts( $this->input_attrs );
	}

	/**
	 * Render content.
	 *
	 * @since Ghumgham 1.0.0
	 */
	public function render_content() {
		?>
			<?php if ( ! empty( $this->label ) ) { ?>
				<label for="<?php echo esc_attr( $this->id ); ?>" class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</label>
			<?php } ?>
			<?php if ( ! empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php } ?>
			<select name="<?php echo esc_attr( $this->id ); ?>" id="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); ?>>
			<?php
			printf( '<option value="%s" %s>%s</option>', '', selected( $this->value(), '', false ), '--None--' );
			?>
				<?php
				if ( ! empty( $this->posts ) ) {
					foreach ( $this->posts as $post ) {
						printf(
							'<option value="%s" %s>%s</option>',
							esc_html( $post->ID ),
							selected( $this->value(), $post->ID, false ),
							esc_html( $post->post_title )
						);
					}
				}
				?>
			</select>
		</div>
		<?php
	}
}
