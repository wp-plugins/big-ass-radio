<?php
/*
Plugin Name: Big Ass Radio
Description: Add a Big Ass Radio to your wordpress website. More than 15,000 Big Ass Stations in 30+ genres. 
Version: 1.0
*/

// Create class
class Radio_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		'wpb_widget', 
		__('Big Ass Radio', 'wpb_widget_domain'), // Widget name will appear in UI
		array( 'description' => __( 'Add the Big Ass Radio widget to your website', 'wpb_widget_domain' ), )
		);// Widget description
	}//End function

	// Widget front-end
	public function widget( $args, $instance ) {
	
		$title = apply_filters( 'widget_title', $instance['title'] );

		// Before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
			
			// Display the output
			echo "<center><iframe src='http://embed.bigassradio.com/player.php' style='height: 350px; width: 210px; border: 0px;' scrolling='no'></iframe></center>";
			echo $args['after_widget'];
		}//End if
		
		// Widget Backend 
		public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else{
			$title = __( 'Big Ass Radio', 'wpb_widget_domain' );
		}//End if

	}//End function
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}//End function
	
} // End class

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'Radio_widget' );
}//End function
add_action( 'widgets_init', 'wpb_load_widget' );

?>