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
function live_gray_customize_register($wp_customize){
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
