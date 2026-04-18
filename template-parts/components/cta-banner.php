<?php
/**
 * File: grewestates/template-parts/components/cta-banner.php
 * Purpose: Full-width dark CTA strip — headline, subtext, two action buttons.
 *          Used on Home and other pages that need a conversion band.
 *
 * Expected data via set_query_var( 'ge_cta', $data ):
 *   heading          string  Main CTA headline
 *   subtext          string  Supporting sentence
 *   primary_label    string  Text for primary (gold) button
 *   primary_url      string  URL for primary button
 *   secondary_label  string  Text for secondary (outline) button
 *   secondary_url    string  URL for secondary button
 */

$cta = get_query_var( 'ge_cta', [] );

if ( empty( $cta ) ) return;
?>

<section class="cta-banner" aria-label="<?php echo esc_attr( $cta['heading'] ); ?>">
    <div class="container">
        <div class="cta-banner__inner text-center">

            <h2 class="cta-banner__heading">
                <?php echo esc_html( $cta['heading'] ); ?>
            </h2>

            <?php if ( ! empty( $cta['subtext'] ) ) : ?>
                <p class="cta-banner__subtext">
                    <?php echo esc_html( $cta['subtext'] ); ?>
                </p>
            <?php endif; ?>

            <div class="cta-banner__actions">
                <?php if ( ! empty( $cta['primary_label'] ) ) : ?>
                    <a href="<?php echo esc_url( $cta['primary_url'] ); ?>"
                       class="btn btn-primary cta-banner__btn">
                        <?php echo esc_html( $cta['primary_label'] ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( ! empty( $cta['secondary_label'] ) ) : ?>
                    <a href="<?php echo esc_url( $cta['secondary_url'] ); ?>"
                       class="btn btn-outline-light cta-banner__btn">
                        <?php echo esc_html( $cta['secondary_label'] ); ?>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>