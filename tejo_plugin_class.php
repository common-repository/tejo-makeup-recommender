<?php

class Tejo_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'tejo_widget', // Base ID
			esc_html__( 'Tejo Makeup Recommender', 'tejo_domain' ), // Name
			array( 'description' => esc_html__( 'Tejo Makeup Recommender', 'tejo_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	
	public function widget( $args, $instance) {
		$url=$instance['url'];
		echo "<style>
		.container {
			position: relative;
			overflow: hidden;
			width: 100%;
			padding-top: 60%; 
			text-align:center;
		  }
		  .tejo_iframe {
			position: absolute;
			top: 0;
			left: 0;
			bottom: 0;
			right: 0;
			width: 100%;
			height: 100%;
		  }
		  @media (max-width: 480px) {
			.container {
			  padding-top: 177%; 
			}
		  }</style>";
		echo '<div class="container">
			<iframe 
				class="tejo_iframe"
				src="' . esc_url($url) .'"
				allow="camera;microphone" 
				border:none;">
			</iframe>
		</div>';
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$url = !empty( $instance['url'] ) ? $instance['url'] : esc_html__( 'New URL', 'tejo_domain' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"><?php esc_attr_e( 'Tejo URL:', 'tejo_domain' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? sanitize_text_field( $new_instance['url'] ) : '';

		return $instance;
	}

} 