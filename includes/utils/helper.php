<?php
use Elementor\Plugin;


echo require_once plugin_dir_path( __FILE__ ) . '/assets/json/city.list.json';

// get Blog Category
if (!function_exists('creatrix_city_get')) {

    function creatrix_city_get($taxo = '')
    {

        echo "test";
        // $taxonomy = 'category';


        // $iqonic_blog_cat = array();
        // $terms = get_terms($taxonomy);

        // foreach ($terms as $term) {
        //     $iqonic_blog_cat[$term->slug] = $term->name;
        // }
        // return $iqonic_blog_cat;
    }
}
