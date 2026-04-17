<?php
/**
 * File: grewestates/inc/setup.php
 * Purpose: Declare theme supports, register image sizes, and load the text domain.
 * Hooked to after_setup_theme so WP core features are available.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'grewestates_setup' );

function grewestates_setup() {
    // Make theme strings translatable.
    load_theme_textdomain( 'grewestates', get_template_directory() . '/languages' );

    // Let WordPress manage the <title> tag automatically.
    add_theme_support( 'title-tag' );

    // Enable post thumbnails for posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Output valid HTML5 markup for core elements.
    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ] );

    // Register custom image sizes used by property cards and hero areas.
    // Property card thumbnail — 4:3 landscape crop.
    add_image_size( 'ge-property-card', 600, 450, true );

    // Property single hero — wide landscape crop.
    add_image_size( 'ge-property-hero', 1200, 680, true );

    // Agent avatar — square crop.
    add_image_size( 'ge-agent-avatar', 320, 320, true );

    // Allow the custom logo to be set via the Customizer.
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ] );

    // Enable selective refresh for widgets in the Customizer preview.
    add_theme_support( 'customize-selective-refresh-widgets' );
}