<?php
/**
 * File: grewestates/inc/widgets.php
 * Purpose: Register sidebar and footer widget areas.
 * Widget areas are available in Appearance → Widgets.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'widgets_init', 'grewestates_register_widgets' );

function grewestates_register_widgets() {
    // Property listing sidebar — filters, search, featured listings.
    register_sidebar( [
        'name'          => esc_html__( 'Properties Sidebar', 'grewestates' ),
        'id'            => 'ge-sidebar-properties',
        'description'   => esc_html__( 'Widgets shown in the properties listing sidebar.', 'grewestates' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>',
    ] );

    // Footer widget area — spans the full-width footer above the link columns.
    register_sidebar( [
        'name'          => esc_html__( 'Footer Widget Area', 'grewestates' ),
        'id'            => 'ge-footer-widgets',
        'description'   => esc_html__( 'Widgets displayed in the footer above the link columns.', 'grewestates' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget__title">',
        'after_title'   => '</h4>',
    ] );
}