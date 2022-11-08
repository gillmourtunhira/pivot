<?php
// Action Hooks for AJAX Filter
// if( is_admin() || is_user_logged_in() ) {
//     add_action( 'wp_ajax_filter_insights', 'filter_insights' );
//     add_action( 'wp_ajax_nopriv_filter_insights', 'filter_insights' );
// }

// /**
//  * Filter function
//  * @package insights
//  */
// function filter_insights(){
//     $catSlug = $_POST['category'];

//     $args = [
//         'post_type' =>  'insight_cpt',
//         'posts_per_page'    =>  -1,
//     ];

//     if( $catSlug ){
//         $args['tax_query'][] = [
//             [
//                 'taxonomy'  =>  'insights',
//                 'field'     =>  'slug',
//                 'terms'     =>  $catSlug,
//                 'operator'  =>  'IN'
//             ],
//         ];
//     }

//     $ajaxposts  = new WP_Query( $args );

//     $response = '';

//     if( $ajaxposts->have_posts() ){
//         while( $ajaxposts->have_posts() ) : $ajaxposts->the_post();
//         $response .= get_template_part( 'partials/content', 'single_insight' );
//     endwhile;
//     } else {
//         $response = 'No insights to show';
//     }

//     echo $response;
//     exit;
// }