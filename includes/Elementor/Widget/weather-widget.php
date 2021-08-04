<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) exit; 

class Weather_Widget extends Widget_Base {
	
	public function get_name() {
		return __( 'Weather Widget', 'yogik' );
	}
	
	public function get_title() {
		return __( 'Creatrix Weather', 'yogik' );
	}

	public function get_categories() {
		return [ 'creatrix' ];
	}

	public function get_icon() {
		return 'eicon-slider-push';
	}

	protected function _register_controls() {

        $this->start_controls_section(
			'section_blog',
			[
				'label' => __( 'Weather Style', 'creatrix' ),
				
			]
		);
		$this->add_control(
			'weather_card_style',
			[
				'label' => __( 'Weather Card Style', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style_1',
				'label_block'=>true,
				'options' => [
					'style_1'  => __( 'Style 1', 'plugin-domain' ),
					'style_2' => __( 'Coming Soon', 'plugin-domain' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_card_api',
			[
				'label' => __( 'API Setting', 'creatrix' ),
				
			]
		);

		$this->add_control(
			'weather_api_key',
			[
				'label' => __( 'API Key', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Default title', 'plugin-domain' ),
				'placeholder' => __( 'Add Your API Key', 'plugin-domain' ),
				'label_block'=>true
			]
		);
		
		// GET CITIES DATA FROM JSON FILES
		if (!function_exists('creatrix_city_get')) {

			$path = plugin_dir_url( __FILE__ ) . 'city.list.json';
			// get data from files
			$str=file_get_contents($path);
			// JSON DECODE IS HERE
			$json = json_decode($str);

			$city_list = array();

			foreach ($json as $city) {

				// $city_list[$city->id] = $term->name;

				echo $city_list[$city->id];
			}

			function creatrix_city_get(){

				# city array
				$get_city= array();

			
			}
		}


		$this->add_control(
			'select_city',
			[
				'label' => esc_html__('City', 'iqonic'),
				'type' => Controls_Manager::SELECT2,
				'return_value' => 'true',
				'multiple' => true,
				'options' => creatrix_city_get()
			]
		);
		

		$this->end_controls_section();

	}
	
	protected function render() {
		require_once plugin_dir_path( __FILE__ ) . '../render/weather-render.php';
		
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Weather_Widget() );
?>