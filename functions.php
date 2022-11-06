<?php

/**
 * 	Enqueue Scripts
 * */
function pivot_theme_scripts(){
	// CSS
	wp_enqueue_style( 'quick-font', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap' );
	wp_enqueue_style( 'ibm-font', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&display=swap' );
	wp_enqueue_style( 'fonts-pivot', get_template_directory_uri() . '/dist/css/main.css', ['quick-font','ibm-font'], time() );

	// JS
	wp_enqueue_script('js-pivot', get_template_directory_uri() . '/dist/js/main.min.js', array('jquery'), time(), false);
}
add_action( 'wp_enqueue_scripts','pivot_theme_scripts' );