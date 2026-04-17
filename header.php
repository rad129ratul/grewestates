<?php
/**
 * File: grewestates/header.php
 * Purpose: Outputs the document <head> and the site header (topbar + navbar).
 * Called via get_header() at the top of every page template.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

    <?php
    // ------------------------------------------------------------------
    // TOP BAR — phone, email, social icons
    // Values pulled from Customizer settings set in inc/customizer.php.
    // ------------------------------------------------------------------
    $phone   = get_theme_mod( 'ge_phone', '+880 1700-000000' );
    $email   = get_theme_mod( 'ge_email', 'info@grewestates.com' );
    $address = get_theme_mod( 'ge_address', 'Gulshan 2, Dhaka 1212, Bangladesh' );

    $social_channels = [
        'facebook'  => [ 'setting' => 'ge_social_facebook',  'icon' => 'bi-facebook' ],
        'instagram' => [ 'setting' => 'ge_social_instagram', 'icon' => 'bi-instagram' ],
        'linkedin'  => [ 'setting' => 'ge_social_linkedin',  'icon' => 'bi-linkedin' ],
        'youtube'   => [ 'setting' => 'ge_social_youtube',   'icon' => 'bi-youtube' ],
    ];
    ?>

    <div class="site-topbar d-none d-lg-block">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">

                <div class="site-topbar__contact">
                    <?php if ( $phone ) : ?>
                        <span class="site-topbar__contact-item">
                            <i class="bi bi-telephone" aria-hidden="true"></i>
                            <a href="tel:<?php echo esc_attr( preg_replace( '/[^+\d]/', '', $phone ) ); ?>">
                                <?php echo esc_html( $phone ); ?>
                            </a>
                        </span>
                    <?php endif; ?>

                    <?php if ( $email ) : ?>
                        <span class="site-topbar__contact-item">
                            <i class="bi bi-envelope" aria-hidden="true"></i>
                            <a href="mailto:<?php echo esc_attr( $email ); ?>">
                                <?php echo esc_html( $email ); ?>
                            </a>
                        </span>
                    <?php endif; ?>

                    <?php if ( $address ) : ?>
                        <span class="site-topbar__contact-item">
                            <i class="bi bi-geo-alt" aria-hidden="true"></i>
                            <?php echo esc_html( $address ); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="site-topbar__social">
                    <?php foreach ( $social_channels as $name => $data ) :
                        $url = get_theme_mod( $data['setting'], '' );
                        if ( ! $url ) continue;
                    ?>
                        <a href="<?php echo esc_url( $url ); ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           aria-label="<?php echo esc_attr( ucfirst( $name ) ); ?>">
                            <i class="bi <?php echo esc_attr( $data['icon'] ); ?>" aria-hidden="true"></i>
                        </a>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>

    <?php
    // ------------------------------------------------------------------
    // MAIN NAVBAR
    // ------------------------------------------------------------------
    get_template_part( 'template-parts/global/navbar' );
    ?>

    <div id="content" class="site-content">