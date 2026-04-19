<?php
/**
 * File: grewestates/404.php
 * Purpose: 404 — Page Not Found template.
 *          Renders the error hero, popular pages grid, and standard footer.
 * Dependencies: header.php, footer.php
 */

get_header();
?>

<main id="main" class="site-main error-404" role="main">

    <!-- ============================================================
         SECTION 1: ERROR HERO
         Centred: gold 404 icon badge, heading, subtext, two CTAs, go back link.
         ============================================================ -->
    <section class="error-hero" aria-labelledby="error-heading">
        <div class="container">
            <div class="error-hero__inner text-center">

                <!-- Gold circular icon badge -->
                <div class="error-hero__icon-wrap" aria-hidden="true">
                    <i class="bi bi-exclamation-triangle-fill error-hero__icon"></i>
                    <span class="error-hero__icon-label">404</span>
                </div>

                <h1 id="error-heading" class="error-hero__heading">
                    <?php esc_html_e( 'Page Not Found', 'grewestates' ); ?>
                </h1>

                <p class="error-hero__subtext">
                    <strong class="error-hero__oops">
                        <?php esc_html_e( 'Oops!', 'grewestates' ); ?>
                    </strong>
                    <?php esc_html_e( "The page you're looking for seems to have moved or doesn't exist. Let's help you find your way back home.", 'grewestates' ); ?>
                </p>

                <!-- Primary CTAs -->
                <div class="error-hero__actions">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                       class="btn btn-primary error-hero__btn">
                        <i class="bi bi-house" aria-hidden="true"></i>
                        <?php esc_html_e( 'Go to Homepage', 'grewestates' ); ?>
                    </a>
                    <a href="<?php echo esc_url( home_url( '/properties/' ) ); ?>"
                       class="btn btn-outline-primary error-hero__btn">
                        <i class="bi bi-search" aria-hidden="true"></i>
                        <?php esc_html_e( 'Browse Properties', 'grewestates' ); ?>
                    </a>
                </div>

                <!-- Go Back text link -->
                <button type="button"
                        class="error-hero__go-back"
                        data-action="go-back"
                        aria-label="<?php esc_attr_e( 'Go back to the previous page', 'grewestates' ); ?>">
                    <i class="bi bi-arrow-left" aria-hidden="true"></i>
                    <?php esc_html_e( 'Go Back', 'grewestates' ); ?>
                </button>

            </div>
        </div>
    </section>


    <!-- ============================================================
         SECTION 2: POPULAR PAGES
         Centred heading + 4-column card grid.
         ============================================================ -->
    <section class="error-popular py-5" aria-labelledby="popular-heading">
        <div class="container">

            <h2 id="popular-heading" class="error-popular__heading text-center">
                <?php esc_html_e( 'Popular Pages', 'grewestates' ); ?>
            </h2>

            <?php
            // Popular page cards data.
            $popular_pages = [
                [
                    'icon'  => 'bi-house-door',
                    'label' => __( 'Home', 'grewestates' ),
                    'desc'  => __( 'Explore featured properties and listings', 'grewestates' ),
                    'url'   => home_url( '/' ),
                ],
                [
                    'icon'  => 'bi-search',
                    'label' => __( 'Properties', 'grewestates' ),
                    'desc'  => __( 'Browse all available properties', 'grewestates' ),
                    'url'   => home_url( '/properties/' ),
                ],
                [
                    'icon'  => 'bi-geo-alt',
                    'label' => __( 'Find Agents', 'grewestates' ),
                    'desc'  => __( 'Connect with expert agents', 'grewestates' ),
                    'url'   => home_url( '/find-agents/' ),
                ],
                [
                    'icon'  => 'bi-telephone',
                    'label' => __( 'Contact Us', 'grewestates' ),
                    'desc'  => __( 'Get in touch with our team', 'grewestates' ),
                    'url'   => get_theme_mod( 'ge_contact_page_url', home_url( '/contact/' ) ),
                ],
            ];
            ?>

            <div class="error-popular__grid">
                <?php foreach ( $popular_pages as $page ) : ?>
                    <a href="<?php echo esc_url( $page['url'] ); ?>"
                       class="error-popular__card"
                       aria-label="<?php echo esc_attr( $page['label'] ); ?>">

                        <div class="error-popular__card-icon" aria-hidden="true">
                            <i class="bi <?php echo esc_attr( $page['icon'] ); ?>"></i>
                        </div>

                        <h3 class="error-popular__card-title">
                            <?php echo esc_html( $page['label'] ); ?>
                        </h3>

                        <p class="error-popular__card-desc">
                            <?php echo esc_html( $page['desc'] ); ?>
                        </p>

                    </a>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

</main><!-- #main -->

<?php get_footer(); ?>