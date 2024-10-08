<?php
/*
 * Theme Functions
 */

// Theme Title
add_theme_support('title-tag');

// Theme CSS & jQuery File calling
function devash_call_css_js() { 
    //css files
    wp_enqueue_style('devash-style', get_stylesheet_uri());
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '5.3.3', 'all');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('devash-custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all');

    //jQuery files
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '5.3', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);

}
add_action('wp_enqueue_scripts', 'devash_call_css_js');

//Theme function
function devash_customizer_register($wp_customize){
    $wp_customize->add_section('devash-header-area', array(
        'title' => __('Header Area', 'devash'),
        'description' => __('Change Logo', 'devash'),
    ));

    $wp_customize -> add_setting('devash_logo', array(
        'default' => get_bloginfo('template_directory') . '/img/logo.png',
    ));

    $wp_customize -> add_control( new WP_Customize_Image_Control($wp_customize, 'devash_logo', array(
        'label' => 'Logo Upload',
        'description' => 'Recommended size 500*500px',
        'setting' => 'devash_logo',
        'section' => 'devash-header-area',
    )));
}

add_action('customize_register','devash_customizer_register');