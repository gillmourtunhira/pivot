<?php
/*
  ==========================================
   Sidebar function
  ==========================================
*/
function widget_footer()
{
  add_theme_support('widget');

  register_sidebar(
    [
      'name'  => 'Footer',
      'id'    => 'footer',
      'description' => 'Footer widgets for navigation',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h1 class="widget-title">',
      'after_title'   => '</h1>',
    ]
  );
  register_sidebar(
    [
      'name'  =>  'Footer Contacts',
      'id'    =>  'footer_contacts',
      'description' =>  'Contact details on footer',
      'before_widget' => '<div id="%1$s" class="widget text-white %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="widget-title fw-bold fs-5 text-uppercase mb-4">',
      'after_title'   => '</h4>',
    ]
  );
  register_sidebar(
    [
      'name'  =>  'Footer Social Links',
      'id'    =>  'footer_social_links',
      'description' =>  'Show social media links with icons',
      'before_widget' => '<ul id="%1$s" class="widget text-white d-flex flex-row justify-content-around p-0 m-0 %2$s">',
      'after_widget'  => '</ul>',
      'before_title'  => '<li class="widget-title fw-bold fs-5 text-uppercase mb-4">',
      'after_title'   => '</li>',
    ]
  );
}

widget_footer();
add_action('init', 'widget_footer');
