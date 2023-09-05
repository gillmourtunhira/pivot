<?php
/**
* Shortcodes
*/

/**
 * Register Services Posts Shortcode
 *
 * @return null
 */
function register_services_shortcode(){
  add_shortcode( 'services', 'pivot_services_posts' );
}
add_action( 'init', 'register_services_shortcode' );

/**
* Services Posts
*
* @param Array $atts
* @return string
*/
function pivot_services_posts( $atts ){
  $atts = shortcode_atts( array(
    'count' => 6,
    'type' => 'service',
    'status' => 'publish',
    'order' => 'ASC'
  ), $atts );

  $args = [
    'numberposts' => $atts['count'],
    'post_type' => $atts['type'],
    'post_status' => $atts['status'],
    'order' => $atts['order'],
  ];

  $services = get_posts( $args );

  if( ! empty( $services ) ) :
    ob_start();

    foreach( $services as $service ) :
      $serv = $service;
      get_template_part( 'partials/content', 'service-post', ['serv' => $serv ] );
    endforeach;

  endif;

  $output_string = ob_get_contents();
  ob_clean();

  wp_reset_postdata();
  return $output_string;

}

/**
 * Register Logos Shortcode
 *
 * @return null
 */
 function register_logos_shortcode(){
   add_shortcode( 'logos', 'pivot_partner_logos' );
 }
 add_action( 'init', 'register_logos_shortcode' );

 /**
 * Logos
 *
 * @param Array $atts
 * @return string
 */
 function pivot_partner_logos( $atts ){
   $atts = shortcode_atts( array(
     'count' => -1,
     'type' => 'logo',
     'status' => 'publish',
     'order' => 'ASC'
   ), $atts );

   $args = [
     'numberposts' => $atts['count'],
     'post_type' => $atts['type'],
     'post_status' => $atts['status'],
     'order' => $atts['order'],
   ];

   $logos = get_posts( $args );

   if( ! empty( $logos ) ) :
     ob_start();

     foreach( $logos as $logo ) :
       $logimg = $logo;
       get_template_part( 'partials/content', 'partner-logo', ['logimg' => $logimg ] );
     endforeach;

   endif;

   $output_string = ob_get_contents();
   ob_clean();

   wp_reset_postdata();
   return $output_string;

 }

 function wpb_list_child_pages() {

    global $post;

if ( is_page() && $post->ID )
    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0&depth=2' );

    if ( $childpages ) {
         $string = '<ul>' . $childpages . '</ul>';
    }

    return $string;
}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');
