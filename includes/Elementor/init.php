<?php
//include widgets files
add_action( 'elementor/widgets/widgets_registered', 'creatrix_register_elementor_widgets' );
function creatrix_register_elementor_widgets() {
	
	if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {	
        require_once plugin_dir_path( __FILE__ ) . '/Widget/weather-widget.php';
 	}
}

//add category in elementor widget area
add_action( 'elementor/init', function() {
	\Elementor\Plugin::$instance->elements_manager->add_category( 
		'creatrix',
		[
			'title' => __( 'Creatrix Elements', 'creatrix' ),
			'icon' => 'fa fa-plug',
		]
	);
});

//enque style
function creatrix_enqueue_custom_admin_style() {
	wp_enqueue_style('weather', plugin_dir_path( __FILE__ ) . '../assets/css/weather.css' , array(), '1.0.0', 'all');
}
add_action( 'admin_enqueue_scripts', 'creatrix_enqueue_custom_admin_style' );
