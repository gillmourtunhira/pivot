<?php
/**
*  Custom Taxonomy
*
*  @see register_taxonomy()
*/

function pivot_packages_tax(){
  $labels = [
    'name' => _x( 'Package Categories', 'taxonomy general name', 'pivot' ),
    'singular_name' => _x( 'Package Category', 'taxonomy singular name', 'pivot' ),
    'search_items'      => __( 'Search Packages', 'textdomain' ),
		'all_items'         => __( 'All Packages', 'textdomain' ),
		'parent_item'       => __( 'Parent Package Category', 'textdomain' ),
		'edit_item'         => __( 'Edit Package Category', 'pivot' ),
		'update_item'       => __( 'Update Package Category', 'pivot' ),
		'add_new_item'      => __( 'Add New Package Category', 'pivot' ),
		'new_item_name'     => __( 'New Package Category Name', 'pivot' ),
		'menu_name'         => __( 'Package Category', 'pivot' ),
  ];

  $args = [
    'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => [ 'slug' => 'packages' ],
  ];

  register_taxonomy( 'packages', ['package'], $args );
}
add_action( 'init', 'pivot_packages_tax', 0 );

function pivot_services_tax(){
  $labels = [
    'name' => _x( 'Service Categories', 'taxonomy general name', 'pivot' ),
    'singular_name' => _x( 'Service Category', 'taxonomy singular name', 'pivot' ),
    'search_items'      => __( 'Search Services', 'textdomain' ),
		'all_items'         => __( 'All Services', 'textdomain' ),
		'parent_item'       => __( 'Parent Service Category', 'textdomain' ),
		'edit_item'         => __( 'Edit Service Category', 'pivot' ),
		'update_item'       => __( 'Update Service Category', 'pivot' ),
		'add_new_item'      => __( 'Add New Service Category', 'pivot' ),
		'new_item_name'     => __( 'New Service Category Name', 'pivot' ),
		'menu_name'         => __( 'Service Category', 'pivot' ),
  ];

  $args = [
    'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => [ 'slug' => 'services' ],
  ];

  register_taxonomy( 'services', ['service'], $args );
}
add_action( 'init', 'pivot_services_tax', 0 );
