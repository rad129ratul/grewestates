<?php
/**
 * File: grewestates/template-parts/global/navbar.php
 * Purpose: Renders the sticky primary navigation bar.
 * Loaded via get_template_part() from header.php.
 */

$logo_white = get_template_directory_uri() . '/assets/images/logo-white.svg';
$logo_dark  = get_template_directory_uri() . '/assets/images/logo.svg';
?>

<nav class="site-navbar navbar navbar-expand-lg" aria-label="<?php esc_attr_e( 'Primary Navigation', 'grewestates' ); ?>">
    <div class="container">

        <!-- LOGO -->
        <a class="site-navbar__logo navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php if ( has_custom_logo() ) :
                the_custom_logo();
            else : ?>
                <img src="<?php echo esc_url( $logo_dark ); ?>"
                     alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                     class="logo-dark"
                     width="160"
                     height="44">
                <img src="<?php echo esc_url( $logo_white ); ?>"
                     alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                     class="logo-light"
                     width="160"
                     height="44">
            <?php endif; ?>
        </a>

        <!-- MOBILE TOGGLE -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarPrimary"
                aria-controls="navbarPrimary"
                aria-expanded="false"
                aria-label="<?php esc_attr_e( 'Toggle navigation', 'grewestates' ); ?>">
            <i class="bi bi-list fs-3" aria-hidden="true"></i>
        </button>

        <!-- NAV LINKS + CTA -->
        <div class="collapse navbar-collapse" id="navbarPrimary">
            <?php
            // Primary menu registered in inc/menus.php.
            wp_nav_menu( [
                'theme_location' => 'primary',
                'menu_class'     => 'navbar-nav ms-auto align-items-lg-center',
                'container'      => false,
                'fallback_cb'    => false,
                'depth'          => 2,
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'link_before'    => '',
                'link_after'     => '',
            ] );
            ?>

            <a href="<?php echo esc_url( get_theme_mod( 'ge_contact_page_url', home_url( '/contact/' ) ) ); ?>"
               class="site-navbar__cta btn btn-primary ms-lg-3">
                <?php esc_html_e( 'Get in Touch', 'grewestates' ); ?>
            </a>
        </div>

    </div>
</nav>