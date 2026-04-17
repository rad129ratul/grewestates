<?php
/**
 * File: grewestates/inc/enqueue.php
 * Purpose: Register and enqueue all global and page-specific CSS/JS assets.
 *
 * Dependency chain (load order guaranteed by WP):
 *   Google Fonts (Inter)
 *   Bootstrap Icons CSS
 *   Bootstrap 5 CSS
 *   grewestates-main CSS  ← depends on Bootstrap
 *
 *   Bootstrap 5 JS bundle (includes Popper)
 *   grewestates-main JS   ← depends on Bootstrap JS
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', 'grewestates_enqueue_assets' );

function grewestates_enqueue_assets() {
    $uri     = get_template_directory_uri();
    $version = GREWESTATES_VERSION;

    // ------------------------------------------------------------------
    // GLOBAL STYLES
    // ------------------------------------------------------------------

    // Google Fonts — Inter (300, 400, 500, 600, 700).
    // Loaded via WP so it participates in the resource-hint queue.
    wp_enqueue_style(
        'grewestates-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap',
        [],
        null // External URL — no version fingerprint.
    );

    // Bootstrap Icons 1.11.
    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
        [],
        '1.11.3'
    );

    // Bootstrap 5.3 CSS.
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3'
    );

    // Theme stylesheet (style.css — design tokens).
    wp_enqueue_style(
        'grewestates-style',
        get_stylesheet_uri(),
        [ 'bootstrap' ],
        $version
    );

    // Main theme CSS — layout, typography overrides, global components.
    wp_enqueue_style(
        'grewestates-main',
        $uri . '/assets/css/main.css',
        [ 'grewestates-style' ],
        $version
    );

    // Header CSS — sticky nav, logo, mobile toggle.
    wp_enqueue_style(
        'grewestates-header',
        $uri . '/assets/css/header.css',
        [ 'grewestates-main' ],
        $version
    );

    // Footer CSS — columns, social links, copyright bar.
    wp_enqueue_style(
        'grewestates-footer',
        $uri . '/assets/css/footer.css',
        [ 'grewestates-main' ],
        $version
    );

    // ------------------------------------------------------------------
    // PAGE-SPECIFIC STYLES
    // Enqueued conditionally so unused CSS never ships to a page.
    // ------------------------------------------------------------------

    if ( is_page_template( 'page-templates/template-home.php' ) ) {
        wp_enqueue_style(
            'grewestates-home',
            $uri . '/assets/css/pages/home.css',
            [ 'grewestates-main' ],
            $version
        );
    }

    if ( is_page_template( 'page-templates/template-properties.php' ) ) {
        wp_enqueue_style(
            'grewestates-properties',
            $uri . '/assets/css/pages/properties.css',
            [ 'grewestates-main' ],
            $version
        );
    }

    if ( is_page_template( 'page-templates/template-property-single.php' ) ) {
        wp_enqueue_style(
            'grewestates-property-single',
            $uri . '/assets/css/pages/property-single.css',
            [ 'grewestates-main' ],
            $version
        );
    }

    if ( is_page_template( 'page-templates/template-about.php' ) ) {
        wp_enqueue_style(
            'grewestates-about',
            $uri . '/assets/css/pages/about.css',
            [ 'grewestates-main' ],
            $version
        );
    }

    if ( is_page_template( 'page-templates/template-contact.php' ) ) {
        wp_enqueue_style(
            'grewestates-contact',
            $uri . '/assets/css/pages/contact.css',
            [ 'grewestates-main' ],
            $version
        );
    }

    if ( is_page_template( 'page-templates/template-agents.php' ) ) {
        wp_enqueue_style(
            'grewestates-agents',
            $uri . '/assets/css/pages/agents.css',
            [ 'grewestates-main' ],
            $version
        );
    }

    if ( is_404() ) {
        wp_enqueue_style(
            'grewestates-404',
            $uri . '/assets/css/pages/404.css',
            [ 'grewestates-main' ],
            $version
        );
    }

    // ------------------------------------------------------------------
    // GLOBAL SCRIPTS
    // ------------------------------------------------------------------

    // Bootstrap 5.3 JS bundle (includes Popper 2).
    // Loaded in footer to avoid render-blocking.
    wp_enqueue_script(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.3',
        true // Load in footer.
    );

    // Main theme JS — global interactions (navbar scroll, etc.).
    wp_enqueue_script(
        'grewestates-main',
        $uri . '/assets/js/main.js',
        [ 'bootstrap' ],
        $version,
        true
    );

    // ------------------------------------------------------------------
    // PAGE-SPECIFIC SCRIPTS
    // ------------------------------------------------------------------

    if ( is_page_template( 'page-templates/template-home.php' ) ) {
        wp_enqueue_script(
            'grewestates-home',
            $uri . '/assets/js/pages/home.js',
            [ 'grewestates-main' ],
            $version,
            true
        );
    }

    if ( is_page_template( 'page-templates/template-properties.php' ) ) {
        wp_enqueue_script(
            'grewestates-properties',
            $uri . '/assets/js/pages/properties.js',
            [ 'grewestates-main' ],
            $version,
            true
        );
    }

    if ( is_page_template( 'page-templates/template-contact.php' ) ) {
        wp_enqueue_script(
            'grewestates-contact',
            $uri . '/assets/js/pages/contact.js',
            [ 'grewestates-main' ],
            $version,
            true
        );
    }
}

add_action( 'wp_enqueue_scripts', 'grewestates_dequeue_defaults', 20 );

function grewestates_dequeue_defaults() {
    // jQuery is unnecessary — Bootstrap 5 is vanilla JS.
    // Priority 20 guarantees this runs after WP's default registrations at priority 10.
    wp_dequeue_script( 'jquery' );
    wp_deregister_script( 'jquery' );
}