<?php
/**
 * File: grewestates/inc/customizer.php
 * Purpose: Expose editable theme settings in the WordPress Customizer.
 *
 * Sections registered here:
 *   - ge_contact_info  → Phone, email, address (used in navbar & footer)
 *   - ge_social_links  → Facebook, Instagram, LinkedIn, YouTube URLs
 */

defined( 'ABSPATH' ) || exit;

add_action( 'customize_register', 'grewestates_customizer_register' );

function grewestates_customizer_register( WP_Customize_Manager $wp_customize ) {

    // ------------------------------------------------------------------
    // SECTION: Contact Information
    // ------------------------------------------------------------------
    $wp_customize->add_section( 'ge_contact_info', [
        'title'    => esc_html__( 'Contact Information', 'grewestates' ),
        'priority' => 130,
    ] );

    // Phone number.
    $wp_customize->add_setting( 'ge_phone', [
        'default'           => '+880 1700-000000',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ] );
    $wp_customize->add_control( 'ge_phone', [
        'label'   => esc_html__( 'Phone Number', 'grewestates' ),
        'section' => 'ge_contact_info',
        'type'    => 'text',
    ] );

    // Email address.
    $wp_customize->add_setting( 'ge_email', [
        'default'           => 'info@grewestates.com',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'postMessage',
    ] );
    $wp_customize->add_control( 'ge_email', [
        'label'   => esc_html__( 'Email Address', 'grewestates' ),
        'section' => 'ge_contact_info',
        'type'    => 'email',
    ] );

    // Office address.
    $wp_customize->add_setting( 'ge_address', [
        'default'           => 'Gulshan 2, Dhaka 1212, Bangladesh',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ] );
    $wp_customize->add_control( 'ge_address', [
        'label'   => esc_html__( 'Office Address', 'grewestates' ),
        'section' => 'ge_contact_info',
        'type'    => 'text',
    ] );

    // Contact page URL — used in the navbar CTA button.
    $wp_customize->add_setting( 'ge_contact_page_url', [
        'default'           => '/contact/',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'postMessage',
    ] );
    $wp_customize->add_control( 'ge_contact_page_url', [
        'label'   => esc_html__( 'Contact Page URL', 'grewestates' ),
        'section' => 'ge_contact_info',
        'type'    => 'url',
    ] );

    // ------------------------------------------------------------------
    // SECTION: Social Media Links
    // ------------------------------------------------------------------
    $wp_customize->add_section( 'ge_social_links', [
        'title'    => esc_html__( 'Social Media Links', 'grewestates' ),
        'priority' => 135,
    ] );

    $social_channels = [
        'ge_social_facebook'  => 'Facebook URL',
        'ge_social_instagram' => 'Instagram URL',
        'ge_social_linkedin'  => 'LinkedIn URL',
        'ge_social_youtube'   => 'YouTube URL',
    ];

    foreach ( $social_channels as $setting_id => $label ) {
        $wp_customize->add_setting( $setting_id, [
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage',
        ] );
        $wp_customize->add_control( $setting_id, [
            'label'   => esc_html__( $label ),
            'section' => 'ge_social_links',
            'type'    => 'url',
        ] );
    }
}