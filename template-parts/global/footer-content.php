<?php
/**
 * File: grewestates/template-parts/global/footer-content.php
 * Purpose: Full footer markup — brand column, nav link columns,
 *          contact column, and copyright bar.
 * Loaded via get_template_part() from footer.php.
 */

$logo_white = get_template_directory_uri() . '/assets/images/logo-white.svg';
$phone      = get_theme_mod( 'ge_phone', '+880 1700-000000' );
$email      = get_theme_mod( 'ge_email', 'info@grewestates.com' );
$address    = get_theme_mod( 'ge_address', 'Gulshan 2, Dhaka 1212, Bangladesh' );
$year       = gmdate( 'Y' );

$social_channels = [
    'facebook'  => [ 'setting' => 'ge_social_facebook',  'icon' => 'bi-facebook',  'label' => 'Facebook' ],
    'instagram' => [ 'setting' => 'ge_social_instagram', 'icon' => 'bi-instagram', 'label' => 'Instagram' ],
    'linkedin'  => [ 'setting' => 'ge_social_linkedin',  'icon' => 'bi-linkedin',  'label' => 'LinkedIn' ],
    'youtube'   => [ 'setting' => 'ge_social_youtube',   'icon' => 'bi-youtube',   'label' => 'YouTube' ],
];
?>

<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="row g-5">

            <!-- BRAND COLUMN -->
            <div class="col-lg-4 col-md-6">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    <img src="<?php echo esc_url( $logo_white ); ?>"
                         alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                         class="site-footer__logo"
                         width="150"
                         height="40">
                </a>

                <p class="site-footer__tagline">
                    <?php esc_html_e( 'Your trusted partner for buying, selling, and renting premium properties across Bangladesh.', 'grewestates' ); ?>
                </p>

                <!-- Social Icons -->
                <div class="site-footer__social">
                    <?php foreach ( $social_channels as $data ) :
                        $url = get_theme_mod( $data['setting'], '' );
                        if ( ! $url ) continue;
                    ?>
                        <a href="<?php echo esc_url( $url ); ?>"
                           class="site-footer__social-link"
                           target="_blank"
                           rel="noopener noreferrer"
                           aria-label="<?php echo esc_attr( $data['label'] ); ?>">
                            <i class="bi <?php echo esc_attr( $data['icon'] ); ?>" aria-hidden="true"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- NAV COLUMN 1 — Quick Links -->
            <div class="col-lg-2 col-md-6 col-6">
                <h3 class="site-footer__col-title">
                    <?php esc_html_e( 'Quick Links', 'grewestates' ); ?>
                </h3>
                <?php
                wp_nav_menu( [
                    'theme_location' => 'footer-col-1',
                    'menu_class'     => 'site-footer__menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'depth'          => 1,
                ] );
                ?>
            </div>

            <!-- NAV COLUMN 2 — Property Types -->
            <div class="col-lg-2 col-md-6 col-6">
                <h3 class="site-footer__col-title">
                    <?php esc_html_e( 'Property Types', 'grewestates' ); ?>
                </h3>
                <?php
                wp_nav_menu( [
                    'theme_location' => 'footer-col-2',
                    'menu_class'     => 'site-footer__menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'depth'          => 1,
                ] );
                ?>
            </div>

            <!-- CONTACT COLUMN -->
            <div class="col-lg-4 col-md-6">
                <h3 class="site-footer__col-title">
                    <?php esc_html_e( 'Contact Us', 'grewestates' ); ?>
                </h3>

                <?php if ( $address ) : ?>
                    <div class="site-footer__contact-item">
                        <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                        <span><?php echo esc_html( $address ); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ( $phone ) : ?>
                    <div class="site-footer__contact-item">
                        <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                        <a href="tel:<?php echo esc_attr( preg_replace( '/[^+\d]/', '', $phone ) ); ?>">
                            <?php echo esc_html( $phone ); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if ( $email ) : ?>
                    <div class="site-footer__contact-item">
                        <i class="bi bi-envelope-fill" aria-hidden="true"></i>
                        <a href="mailto:<?php echo esc_attr( $email ); ?>">
                            <?php echo esc_html( $email ); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        </div><!-- .row -->
    </div><!-- .container -->

    <!-- COPYRIGHT BAR -->
    <div class="site-footer__bottom">
        <div class="container">
            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between gap-2">
                <p class="mb-0">
                    &copy; <?php echo esc_html( $year ); ?>
                    <?php echo esc_html( get_bloginfo( 'name' ) ); ?>.
                    <?php esc_html_e( 'All rights reserved.', 'grewestates' ); ?>
                </p>
                <p class="mb-0">
                    <?php esc_html_e( 'Crafted by', 'grewestates' ); ?>
                    <a href="https://grewdev.com" target="_blank" rel="noopener noreferrer">GrewDev</a>
                </p>
            </div>
        </div>
    </div>

</footer>