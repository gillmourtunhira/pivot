<?php

require( 'inc/post_types.php' );
require( 'inc/taxonomies.php' );


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

/**
 * =====
 * Menus
 * =====
 * */
function pivot_menu_setup(){
	add_theme_support( 'menus' );
	register_nav_menus( [
	'primary'	=>	__( 'Top Navigation' ),
	'footer'	=>	__( 'Footer Navigation' ),
    'terms'     =>  __( 'Bottom Navigation' ),
	]);
}
add_action( 'init', 'pivot_menu_setup' );

/**
 * =============
 * Theme Support
 * =============
 **/
function pivot_theme_support(){
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-formats', [ 'aside','gallery','image', 'video', 'link', 'quote', 'status' ] );
    add_theme_support( 'post-thumbnails' );

    // Custom Background
    $bg_defaults = [
        'default-image' => '',
        'default-preset'    =>  'default',
        'default-size'      =>  'cover',
        'default-repeat'    =>  'no-repeat',
        'default-attachment'    =>  'scroll',
    ];
    add_theme_support( 'custom-background', $bg_defaults );

    // Custom Header
    $h_defaults = [];
    add_theme_support( 'custom-header', $h_defaults );

    $logo_defaults = [
        'width' =>  '100',
        'flex-height'   =>  true,
        'flex-width'    =>  true,
    ];
    add_theme_support( 'custom-logo', $logo_defaults );

    // HTML5
    $html5 = [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ];
    add_theme_support( 'html5', $html5 );

    add_theme_support( 'customize-selective-refresh-widgets' );

    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'init', 'pivot_theme_support' );

// Remove WP Login Form Logo
function pivot_login_logo(){
    ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: none;
            background-size: 0 0;
            height: 0;
            margin: 0 auto 0;
            width: 0;
        }
        .login_label{
            text-align: center;
            font-size: 28px;
            text-transform: uppercase;
            font-weight: 700;
        }
    </style>
<?php
}
add_action( 'login_enqueue_scripts', 'pivot_login_logo' );

// Set up Loign Form Label
function pivot_login_label(){
    $site_title = get_bloginfo( 'name' );
    $label = "<h3 class='fw-bold login_label'>". $site_title ."</h3>";
    return $label;
}
add_filter( 'login_message', 'pivot_login_label' );

// Remove Editor on Pages
function pivot_remove_support(){
	// remove_post_type_support('page', 'editor');
}
add_action( 'init', 'pivot_remove_support' );

// Removing plugin controls from admin
function remove_plugin_controls($actions, $plugin_file, $plugin_data, $context){

    if( array_key_exists('edit', $actions) ){
        unset($actions['edit']);
    }

    if( array_key_exists('deactivate', $actions) ){
        unset($actions['deactivate']);
    }

    if( array_key_exists('activate',$actions) ){
        unset($actions['activate']);
    }

    if( array_key_exists('delete',$actions) ){
        unset($actions['delete']);
    }

    return $actions;

}
add_filter('plugin_action_links', 'remove_plugin_controls', 10, 4);

// Remove bulk action options for managing plugins
function disable_bulk_actions($actions){

    if( array_key_exists('deactivate-selected', $actions) ){
        unset( $actions['deactivate-selected'] );
    }

    if( array_key_exists('activate-selected', $actions) ){
        unset( $actions['activate-selected'] );
    }

    if( array_key_exists('delete-selected', $actions) ){
        unset( $actions['delete-selected'] );
    }

    if( array_key_exists('update-selected', $actions) ){
        unset( $actions['update-selected'] );
    }

}
add_filter('bulk_actions-plugins', 'disable_bulk_actions');

define('DISALLOW_FILE_MODS', true);