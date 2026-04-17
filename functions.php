<?php
/**
 * File: grewestates/functions.php
 * Purpose: Bootstrap the theme by requiring all modular inc/ files.
 * No logic lives here — this file is intentionally thin.
 */

defined( 'ABSPATH' ) || exit;

// Theme version constant — used for cache-busting enqueued assets.
define( 'GREWESTATES_VERSION', '1.0.0' );

require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/menus.php';
require_once get_template_directory() . '/inc/widgets.php';
require_once get_template_directory() . '/inc/customizer.php';