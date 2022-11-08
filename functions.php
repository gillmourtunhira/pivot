<?php

require( 'inc/ajax_posts_call.php' );
require( 'inc/navwalker.php' );
require( 'inc/post_types.php' );
require( 'inc/taxonomies.php' );
require( 'inc/widgets.php' );


/**
 *  Enqueue Scripts
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
    'primary'   =>  __( 'Top Navigation' ),
    'footer'    =>  __( 'Footer Navigation' ),
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

/*
  ==========================================
   Theme cleanup
  ==========================================
*/
function theme_cleanup ()
{
    add_filter('the_generator', '__return_false');

    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    remove_action('wp_head', 'print_emoji_detection_script', 7 );
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_resource_hints', 2);
    remove_action('wp_print_styles', 'print_emoji_styles' );

    add_image_size( 'desktop', 2100, 1080, false);
    add_image_size( 'desktop-side', 1050, 1080, false);
    add_image_size( 'mobile-portrait', 470, 800, false);
}
add_action('after_setup_theme', 'theme_cleanup');


function use_bootstrap_navwalker($args)
{
  $args = array_merge($args, [
    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
    'walker'      => new WP_Bootstrap_Navwalker(),
  ]);

  $args['menu_class'] .= ' navbar-nav';

  return $args;
}

add_filter('wp_nav_menu_args', 'use_bootstrap_navwalker');

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

// Support SVG
function enable_svg_upload( $upload_mimes ){

    if( current_user_can( 'unfiltered_html' ) ){
        $upload_mimes['svg'] = 'images/svg+xml';
        $upload_mimes['svgz'] = 'images/svg+xml';
    }

    return $upload_mimes;
}
add_filter( 'upload_mimes', 'enable_svg_upload', 10, 1 );

function adminstrator_svg_upload($data, $file, $filename, $mimes)
{
  $filetype = wp_check_filetype( $filename, $mimes );

  if($filetype['ext'] == 'svg' && current_user_can('unfiltered_html'))
  {
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  }
  return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'adminstrator_svg_upload', 10, 4 );


// Add an achor class to footer menu items
function pivot_add_additional_class_on_a( $classes, $item, $args ){
    if( isset( $args->footer_a_link ) ){
      $classes['class'] = $args->footer_a_link;
    }
    return $classes;
  }
  add_filter('nav_menu_link_attributes', 'pivot_add_additional_class_on_a', 1,3);
  
  // Add an achor class to primary menu items
  function pivot_add_primay_menu_a_class( $classes, $item, $args ){
    if( isset( $args->primary_a_link ) ){
      $classes['class'] = $args->primary_a_link;
    }
    return $classes;
  }
  add_filter('nav_menu_link_attributes', 'pivot_add_primay_menu_a_class', 1,3);
  
  // Add a list class to menu
  function pivot_add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
  }
  add_filter('nav_menu_css_class', 'pivot_add_additional_class_on_li', 1, 3);

  /**
 * =======================
 * Pre get insights posts
 * =======================
 */
function pivot_filter_archive( $query ) {
    if ( ! is_admin() ) {
            return;
    }
    if ( ! $query->is_main_query() ) {
      return $query;
    }
    if ( is_archive() || is_post_type_archive( 'insights' ) ) {
      if ( 'cat' === ( $_GET['getby'] = (isset($_GET['getby']) ? $_GET['getby'] : 'insights') ) ) {
        $taxquery = array(
          array(
            'taxonomy' => 'insights',
            'field' => 'slug',
            'terms' => $_GET['cat'],
          ),
        );
        $query->set( 'tax_query', $taxquery );
      }
    }
    return $query;
  }
  add_action( 'pre_get_posts', 'pivot_filter_archive');
