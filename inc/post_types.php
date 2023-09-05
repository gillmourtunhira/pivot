<?php
/**
* Custom Post Types
*
* @see register_post_type()
*/

// Packages cpt
function pivot_packages_cpt(){

  $labels = [
    'name'  =>  __( 'Packages', 'pivot' ),
    'singular_name' => __( 'Package', 'pivot' ),
    'add_new'                  => __( 'Add New', 'pivot' ),
    'add_new_item'             => __( 'Add New Package', 'pivot' ),
    'edit_item'                => __( 'Edit Package', 'pivot' ),
    'new_item'                 => __( 'New Package', 'pivot' ),
    'view_item'                => __( 'View Package', 'pivot' ),
    'view_items'               => __( 'View Packages', 'pivot' ),
    'search_items'             => __( 'Search Package', 'pivot' ),
  ];

  $args = [
    'labels' => $labels,
    'description' => __( 'Show Travel packages as options', 'pivot' ),
    'supports' => ['title','thumbnail'],
    'public' => true,
    'hierarchial' => false,
    'has_archive' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-image-filter',
    'capability_type' => 'post',
    'rewrite' => [
      'slug' => 'package',
    ],
    'taxonomies'  =>  ['packages'],
  ];

  register_post_type( 'package', $args );

}
add_action( 'init', 'pivot_packages_cpt', 0 );

// Services cpt
function pivot_services_cpt(){
  $labels = [
    'name'  =>  __( 'Services', 'pivot' ),
    'singular_name' => __( 'Service', 'pivot' ),
    'add_new'                  => __( 'Add New', 'pivot' ),
    'add_new_item'             => __( 'Add New Service', 'pivot' ),
    'edit_item'                => __( 'Edit Service', 'pivot' ),
    'new_item'                 => __( 'New Service', 'pivot' ),
    'view_item'                => __( 'View Service', 'pivot' ),
    'view_items'               => __( 'View Services', 'pivot' ),
    'search_items'             => __( 'Search Service', 'pivot' ),
  ];

  $args = [
    'labels' => $labels,
    'description' => __( 'Show Travel Services as options', 'pivot' ),
    'supports' => ['title','thumbnail', 'excerpt'],
    'public' => true,
    'hierarchial' => false,
    'has_archive' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-universal-access-alt',
    'capability_type' => 'post',
    'rewrite' => [
      'slug' => 'service',
    ],
    'taxonomies'  =>  ['services'],
  ];

  register_post_type( 'service', $args );
}
add_action( 'init', 'pivot_services_cpt', 0 );

// Slides cpt
function pivot_slides_cpt(){
  $labels = [
    'name'  =>  __( 'Slides', 'pivot' ),
    'singular_name' => __( 'Slide', 'pivot' ),
    'add_new'                  => __( 'Add New', 'pivot' ),
    'add_new_item'             => __( 'Add New Slide', 'pivot' ),
    'edit_item'                => __( 'Edit Slide', 'pivot' ),
    'new_item'                 => __( 'New Slide', 'pivot' ),
    'view_item'                => __( 'View Slide', 'pivot' ),
    'view_items'               => __( 'View Slides', 'pivot' ),
    'search_items'             => __( 'Search Slide', 'pivot' ),
  ];

  $args = [
    'labels' => $labels,
    'description' => __( 'Showcase Hero Slides on Homepage', 'pivot' ),
    'supports' => ['title'],
    'public' => true,
    'hierarchial' => false,
    'has_archive' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-images-alt2',
    'capability_type' => 'post',
    'rewrite' => [
      'slug' => 'slide',
    ],
    'taxonomies'  =>  [],
  ];

  register_post_type( 'slide', $args );
}
add_action( 'init', 'pivot_slides_cpt', 0 );

// Slides cpt
function pivot_logos(){
  $labels = [
    'name'  =>  __( 'Logos', 'pivot' ),
    'singular_name' => __( 'Logo', 'pivot' ),
    'add_new'                  => __( 'Add New', 'pivot' ),
    'add_new_item'             => __( 'Add New Logo', 'pivot' ),
    'edit_item'                => __( 'Edit Logo', 'pivot' ),
    'new_item'                 => __( 'New Logo', 'pivot' ),
    'view_item'                => __( 'View Logo', 'pivot' ),
    'view_items'               => __( 'View Logos', 'pivot' ),
    'search_items'             => __( 'Search Logo', 'pivot' ),
  ];

  $args = [
    'labels' => $labels,
    'description' => __( 'Showcase Partner Logos on Homepage', 'pivot' ),
    'supports' => ['title'],
    'public' => true,
    'hierarchial' => false,
    'has_archive' => true,
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-format-image',
    'capability_type' => 'post',
    'rewrite' => [
      'slug' => 'logo',
    ],
    'taxonomies'  =>  [],
  ];

  register_post_type( 'logo', $args );
}
add_action( 'init', 'pivot_logos', 0 );
