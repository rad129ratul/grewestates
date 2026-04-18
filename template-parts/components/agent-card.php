<?php
/**
 * File: grewestates/template-parts/components/agent-card.php
 * Purpose: Reusable agent card — photo, name, title, experience, contact CTA.
 *
 * Expected data via set_query_var( 'ge_agent', $data ):
 *   name        string  Full name
 *   title       string  Professional role
 *   experience  string  e.g. '12+ Years Experience'
 *   phone       string  Formatted phone number
 *   email       string  Email address
 *   image       string  Absolute URL to agent photo
 *   link        string  URL to agent profile / anchor
 */

$agent = get_query_var( 'ge_agent', [] );

if ( empty( $agent ) ) return;
?>

<div class="col-sm-6 col-lg-3">
    <div class="agent-card ge-card h-100">

        <!-- Agent photo -->
        <div class="agent-card__image-wrap">
            <img src="<?php echo esc_url( $agent['image'] ); ?>"
                 alt="<?php echo esc_attr( $agent['name'] ); ?>"
                 class="agent-card__image"
                 width="320"
                 height="320"
                 loading="lazy">
        </div>

        <!-- Agent info -->
        <div class="agent-card__body">
            <h3 class="agent-card__name"><?php echo esc_html( $agent['name'] ); ?></h3>
            <p class="agent-card__title-role"><?php echo esc_html( $agent['title'] ); ?></p>

            <span class="agent-card__experience">
                <i class="bi bi-award" aria-hidden="true"></i>
                <?php echo esc_html( $agent['experience'] ); ?>
            </span>

            <div class="agent-card__contact">
                <?php if ( $agent['phone'] ) : ?>
                    <a href="tel:<?php echo esc_attr( preg_replace( '/[^+\d]/', '', $agent['phone'] ) ); ?>"
                       class="agent-card__contact-item"
                       aria-label="<?php echo esc_attr( sprintf( __( 'Call %s', 'grewestates' ), $agent['name'] ) ); ?>">
                        <i class="bi bi-telephone" aria-hidden="true"></i>
                        <?php echo esc_html( $agent['phone'] ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( $agent['email'] ) : ?>
                    <a href="mailto:<?php echo esc_attr( $agent['email'] ); ?>"
                       class="agent-card__contact-item"
                       aria-label="<?php echo esc_attr( sprintf( __( 'Email %s', 'grewestates' ), $agent['name'] ) ); ?>">
                        <i class="bi bi-envelope" aria-hidden="true"></i>
                        <?php echo esc_html( $agent['email'] ); ?>
                    </a>
                <?php endif; ?>
            </div>

            <a href="<?php echo esc_url( $agent['link'] ); ?>"
               class="btn btn-outline-primary w-100 agent-card__cta">
                <?php esc_html_e( 'Contact Agent', 'grewestates' ); ?>
            </a>
        </div>

    </div>
</div>