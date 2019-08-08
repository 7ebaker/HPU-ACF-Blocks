<?php
/**
 * Plugin Name: ACF Gutenberg Blocks
 * Description: Blocks include: T3 Visits, Testimonial Slider, Masonry Gallary, Countdown Timer
 * Author: Eli
 * Version: 1.0.0
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action('acf/init', 'my_acf_register_blocks');
function my_acf_register_blocks() {


// check function exists.
    if( function_exists('acf_register_block_type') ) {

        // Register a slider block.
        acf_register_block_type(array(
            'name'              => 'slider',
            'title'             => __('Slider Plugin'),
            'description'       => __('A custom slider block.'),
            // Specifying an absolute path to get to plugin file template
            'render_template'   => plugin_dir_path( __FILE__ ) . 'template-parts/blocks/slider/slider.php',
			'category'          => 'formatting',
			'icon' 				=> 'images-alt2',
			'align'				=> 'full',
			'enqueue_assets' 	=> function(){
				wp_enqueue_style( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
				wp_enqueue_style( 'slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
				wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );

				wp_enqueue_style( 'block-slider', plugin_dir_url(__FILE__) . 'template-parts/blocks/slider/slider.css', array(), '1.0.0' );
				wp_enqueue_script( 'block-slider', plugin_dir_url(__FILE__) . '/template-parts/blocks/slider/slider.js', array(), '1.0.0', true );
			  },
        ));
        // Register a Masonry block.
        acf_register_block_type(array(
            'name'              => 'masonry',
            'title'             => __('Masonry Plugin'),
            'description'       => __('A custom masonry block.'),
            // Specifying an absolute path to get to plugin file template
            'render_template'   => plugin_dir_path( __FILE__ ) . 'template-parts/blocks/masonry/masonry.php',
			'category'          => 'formatting',
			'icon' 				=> 'images-alt2',
			'align'				=> 'full',
			'enqueue_assets' 	=> function(){
				wp_enqueue_script( 'imagesloaded', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array('jquery'), '1.8.1', true );
				wp_enqueue_script( 'masonry', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array('jquery'), '1.8.1', true );

				wp_enqueue_style( 'block-masonry', plugin_dir_url(__FILE__) . 'template-parts/blocks/masonry/masonry.css', array(), '1.0.0' );
				wp_enqueue_script( 'block-masonry', plugin_dir_url(__FILE__) . '/template-parts/blocks/masonry/masonry.js', array(), '1.0.0', true );
			  },
        ));
        // Register a Countdown block.
        acf_register_block_type(array(
            'name'              => 'countdown',
            'title'             => __('Countdown Timer Plugin'),
            'description'       => __('A custom countdown timer block.'),
            // Specifying an absolute path to get to plugin file template
            'render_template'   => plugin_dir_path( __FILE__ ) . 'template-parts/blocks/countdown/countdown.php',
			'category'          => 'formatting',
			'icon' 				=> 'clock',
			'align'				=> 'center',
			'enqueue_assets' 	=> function(){
                wp_enqueue_style( 'flipclock', 'https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.7.8/flipclock.css', array(), '' ); //There is a problem when using the minified version of the css file
                
				wp_enqueue_script( 'flipclock', 'https://cdnjs.cloudflare.com/ajax/libs/flipclock/0.6.1/flipclock.min.js', array('jquery'), '1.8.1', true );
                
				wp_enqueue_style( 'block-flipclock', plugin_dir_url(__FILE__) . 'template-parts/blocks/countdown/countdown.css', array(), '1.0.0' );
				//wp_enqueue_script( 'block-flipclock', plugin_dir_url(__FILE__) . '/template-parts/blocks/countdown/countdown.js', array(), '1.0.0', true );
			  },
        ));
        
        // Register a t3 Visits block.
        /*acf_register_block_type(array(
            'name'              => 'visits',
            'title'             => __('T3 Visits Block'),
            'description'       => __('A custom countdown timer block.'),
            // Specifying an absolute path to get to plugin file template
            'render_template'   => plugin_dir_path( __FILE__ ) . 'template-parts/blocks/t3-visits/visits.php',
			'category'          => 'formatting',
			'icon' 				=> 'smiley',
			'align'				=> 'center',
			'enqueue_assets' 	=> function(){
                
				wp_enqueue_style( 'block-visits', plugin_dir_url(__FILE__) . 'template-parts/blocks/t3-visits/visits.css', array(), '1.0.0' );
				wp_enqueue_script( 'block-visits', plugin_dir_url(__FILE__) . '/template-parts/blocks/t3-visits/visits.js', array(), '1.0.0', true );
			  },
        ));*/
        // Register a t3 Visits block.
        acf_register_block_type(array(
            'name'              => 'apply-visit-request',
            'title'             => __('T2 Apply Visit Request Block'),
            'description'       => __('A custom Apply Visit Request block.'),
            // Specifying an absolute path to get to plugin file template
            'render_template'   => plugin_dir_path( __FILE__ ) . 'template-parts/blocks/t2-apply-visit-request/apply-visit-request.php',
			'category'          => 'formatting',
			'icon' 				=> 'smiley',
			'align'				=> 'center',
			'enqueue_assets' 	=> function(){
                
				wp_enqueue_style( 'block-apply-visit-request', plugin_dir_url(__FILE__) . 'template-parts/blocks/t2-apply-visit-request/apply-visit-request.css', array(), '1.0.0' );
				wp_enqueue_script( 'block-apply-visit-request', plugin_dir_url(__FILE__) . '/template-parts/blocks/t2-apply-visit-request/apply-visit-request.js', array(), '1.0.0', true );
			  },
        ));
    }
    }

 //Add Local JSON for ACF field saving
 
//Change ACF Local JSON save location to /acf folder inside this plugin
add_filter('acf/settings/save_json', function() {
    return dirname(__FILE__) . '/acf';
});
 
//Include the /acf folder in the places to look for ACF Local JSON files
add_filter('acf/settings/load_json', function($paths) {
    $paths[] = dirname(__FILE__) . '/acf';
    return $paths;
});