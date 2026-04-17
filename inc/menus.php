<?php
/**
 * File: grewestates/inc/menus.php
 * Purpose: Register all navigation menu locations for the theme.
 * Menus are assigned by the site admin via Appearance → Menus.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'grewestates_register_menus' );

function grewestates_register_menus() {
    register_nav_menus( [
        // Primary navigation rendered in header.php navbar.
        'primary' => esc_html__( 'Primary Navigation', 'grewestates' ),

        // Two-column footer link menus.
        'footer-col-1' => esc_html__( 'Footer Column 1 — Quick Links', 'grewestates' ),
        'footer-col-2' => esc_html__( 'Footer Column 2 — Property Types', 'grewestates' ),
    ] );
}