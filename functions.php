<?php
/*
* My Theme Function
*/


// Theme Title
add_theme_support('title-tag');


// Theme CSS and jQuery File calling
function css_js_calling(){
  wp_enqueue_style('new-style', get_stylesheet_uri());
  wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '5.0.2', 'all');
  wp_register_style('custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all');
  wp_enqueue_style('bootstrap');
  wp_enqueue_style('custom');


  //jQuery
  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js', array(), '5.0.2', 'true' );
  wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array(), '1.0.0', 'true' );

}
add_action('wp_enqueue_scripts', 'css_js_calling');


// Google Fonts Enqueue
function add_google_fonts(){
  wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Oswald&display=swap', false);
}
add_action('wp_enqueue_scripts', 'add_google_fonts');


//Theme Function
function customizar_register($wp_customize){
  $wp_customize->add_section('header_area', array(
    'title' =>__('Header Area', 'Domain'),
    'description' => 'If you interested to update your header area, you can do it here.'
  ));

  // $wp_customize->add_setting('main_logo', array(
  //   'default' => get_bloginfo('template_directory') . '/img/logo.png',
  // ));
  $wp_customize->add_setting('main_logo', array(
    'default' => get_template_directory_uri() . '/img/logo.png',
  ));

  $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'main_logo', array(
    'label' => 'Logo Upload',
    'description' => 'If you interested to change or update your logo you can do it.',
    'settings' => 'main_logo',
    'section' => 'header_area',
  ) ));

  // Menu Position Option
  $wp_customize->add_section('menu_option', array(
    'title' => __('Menu Position Option', 'Domain'),
    'description' => 'If you interested to change your menu position you can do it.'
  ));

  $wp_customize->add_setting('menu_position', array(
    'default' => 'right_menu',
  ));

  $wp_customize-> add_control('menu_position', array(
    'label' => 'Menu Position',
    'description' => 'Select your menu position',
    'setting' => 'menu_position',
    'section' => 'menu_option',
    'type' => 'radio',
    'choices' => array(
      'left_menu' => 'Left Menu',
      'right_menu' => 'Right Menu',
      'center_menu' => 'Center Menu',
    ),
  ));


  // Footer Option
  $wp_customize->add_section('footer_option', array(
    'title' => __('Footer Option', 'Domain'),
    'description' => 'If you interested to change or update your footer settings you can do it.'
  ));

  $wp_customize->add_setting('copyright_section', array(
    'default' => '&copy; Copyright 2021 | Procoder BD',
  ));

  $wp_customize-> add_control('copyright_section', array(
    'label' => 'Copyright Text',
    'description' => 'If need you can update your copyright text from here',
    'setting' => 'copyright_section',
    'section' => 'footer_option',
  ));

}

add_action('customize_register', 'customizar_register');


// Menu Register
register_nav_menu( 'main_menu', __('Main Menu', 'Domain') );

// Walker Menu Properties
function nav_description( $item_output, $item, $args){
  if( !empty ($item->description)){
    $item_output = str_replace($args->link_after . '</a>', '<span class="walker_nav">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output);
  }
  return $item_output;
}
add_filter('walker_nav_menu_start_el', 'nav_description', 10, 3);