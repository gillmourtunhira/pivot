<?php
/**
* Customizer
*/
add_action( 'customize_register', 'pivot_customizer_settings' );

function pivot_customizer_settings( $wp_customize ){
  $wp_customize->add_section('pivot_social', array(
    'title' => __('Social Links'),
    'priority' => 30,
  ));

  $wp_customize->add_section('pivot_contacts', array(
    'title' => __('Contacts'),
    'priority' => 30,
  ));

  // Settings
  $wp_customize->add_setting( 'social_fb_link_setting', array(
    'sanitize_callback' => 'pivot_sanitize_url'
  ) );

  $wp_customize->add_setting( 'social_tw_link_setting', array(
    'sanitize_callback' => 'pivot_sanitize_url'
  ) );

  $wp_customize->add_setting( 'org_address_setting', array(
    'sanitize_callback' => 'pivot_sanitize_text'
  ) );

  $wp_customize->add_setting( 'org_phone_setting', array(
    'sanitize_callback' => 'pivot_sanitize_text'
  ) );

  // Controls
  $wp_customize->add_control( 'social_fb_link_setting', array(
    'type' => 'url',
    'section' => 'pivot_social',
    'label' => __( 'Facebook Link' ),
    'description' => __( 'Custom text box for facebook social link' ),
    'input_attrs' => array(
      'placeholder' => __( 'http://www.facebook.com/page' ),
    ),
  ) );

  $wp_customize->add_control( 'social_tw_link_setting', array(
    'type' => 'url',
    'section' => 'pivot_social',
    'label' => __( 'Twitter Link' ),
    'description' => __( 'Custom text box for twitter social link' ),
    'input_attrs' => array(
      'placeholder' => __( 'http://www.twitter.com/page' ),
    ),
  ) );

  $wp_customize->add_control( 'org_address_setting', array(
    'type' => 'textarea',
    'section' => 'pivot_contacts',
    'label' => __( 'Business Address' ),
    'description' => __( 'Business address textarea' ),
  ) );

  $wp_customize->add_control( 'org_phone_setting', array(
    'type' => 'text',
    'section' => 'pivot_contacts',
    'label' => __( 'Business Phone' ),
    'description' => __( 'Phone number field' ),
  ) );

  function pivot_sanitize_url( $url ){
    $sanitized_url = sanitize_url( $url, array( 'http', 'https' ) );
    return $sanitized_url;
  }

  function pivot_sanitize_text( $text ){
    $text = sanitize_text_field( $text );
    return $text;
  }

}
