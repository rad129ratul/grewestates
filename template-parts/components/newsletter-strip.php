<?php
/**
 * File: grewestates/template-parts/components/newsletter-strip.php
 * Purpose: Full-width dark newsletter subscription band.
 *          Used on the Properties page and any future page that needs it.
 * Loaded via get_template_part().
 */
?>

<section class="newsletter-strip" aria-labelledby="newsletter-heading">
    <div class="container">
        <div class="newsletter-strip__inner text-center">

            <h2 id="newsletter-heading" class="newsletter-strip__heading">
                <?php esc_html_e( 'Subscribe to Our Newsletter', 'grewestates' ); ?>
            </h2>
            <p class="newsletter-strip__subtext">
                <?php esc_html_e( 'Get the latest property listings and real estate insights delivered to your inbox.', 'grewestates' ); ?>
            </p>

            <div class="newsletter-strip__form" role="form" aria-label="<?php esc_attr_e( 'Newsletter subscription', 'grewestates' ); ?>">
                <label class="visually-hidden" for="newsletter-email">
                    <?php esc_html_e( 'Email address', 'grewestates' ); ?>
                </label>
                <input type="email"
                       id="newsletter-email"
                       class="newsletter-strip__input"
                       placeholder="<?php esc_attr_e( 'Enter your email address', 'grewestates' ); ?>"
                       aria-label="<?php esc_attr_e( 'Your email address', 'grewestates' ); ?>">
                <button type="button"
                        class="btn btn-primary newsletter-strip__btn"
                        id="js-newsletter-subscribe">
                    <?php esc_html_e( 'Subscribe', 'grewestates' ); ?>
                </button>
            </div>

        </div>
    </div>
</section>