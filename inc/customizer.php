<?php
/**
 * Live_Gray Theme Customizer
 *
 * @package Live_Gray
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function live_gray_customize_register($wp_customize)
{
//    $wp_customize->get_setting('blogname')->transport = 'postMessage';
//    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
////    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
//
//    if (isset($wp_customize->selective_refresh)) {
//        $wp_customize->selective_refresh->add_partial('blogname', array(
//            'selector' => '.site-title a',
//            'render_callback' => 'live_gray_customize_partial_blogname',
//        ));
//        $wp_customize->selective_refresh->add_partial('blogdescription', array(
//            'selector' => '.site-description',
//            'render_callback' => 'live_gray_customize_partial_blogdescription',
//        ));
//    }
    // Add main Site settings and control.
    $wp_customize->add_section('live_gray_sosial', array(
        'title' => esc_html__('Social links', 'live-gray'),
        'priority' => 30
    ));
    $wp_customize->add_setting('live_gray_facebook_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('live_gray_facebook_url', array(
        'label' => esc_html__('Facebook url:', 'live-gray'),
        'section' => 'live_gray_sosial',
        'type' => 'text'
    ));
    $wp_customize->add_setting('live_gray_instagram_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('live_gray_instagram_url', array(
        'label' => esc_html__('Instagram url:', 'live-gray'),
        'section' => 'live_gray_sosial',
        'type' => 'text'
    ));

    $wp_customize->add_setting('live_gray_twitter_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('live_gray_twitter_url', array(
        'label' => esc_html__('Twitter url:', 'live-gray'),
        'section' => 'live_gray_sosial',
        'type' => 'text'
    ));
    $wp_customize->add_setting('live_gray_linkedin_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('live_gray_linkedin_url', array(
        'label' => esc_html__('Linkedin url:', 'live-gray'),
        'section' => 'live_gray_sosial',
        'type' => 'text'
    ));
    $wp_customize->add_setting('live_gray_pinterest_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('live_gray_pinterest_url', array(
        'label' => esc_html__('Pinterest url:', 'live-gray'),
        'section' => 'live_gray_sosial',
        'type' => 'text'
    ));
}

add_action('customize_register', 'live_gray_customize_register');

/**
// * Render the site title for the selective refresh partial.
// *
// * @return void
// */
//function live_gray_customize_partial_blogname()
//{
//    bloginfo('name');
//}
//
///**
// * Render the site tagline for the selective refresh partial.
// *
// * @return void
// */
//function live_gray_customize_partial_blogdescription()
//{
//    bloginfo('description');
//}
//
///**
// * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
// */
//function live_gray_customize_preview_js()
//{
//    wp_enqueue_script('live-gray-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
//}
//
//add_action('customize_preview_init', 'live_gray_customize_preview_js');
