<?php
/**
 * File: grewestates/template-parts/components/property-card.php
 * Purpose: Reusable property card — image, badge, price, location, bed/bath/sqft.
 *
 * Expected data via set_query_var( 'ge_property', $data ):
 *   id       int     Unique identifier (used for aria / linking)
 *   title    string  Property name
 *   location string  City, state
 *   price    string  Formatted price string e.g. '$4,100,000'
 *   beds     int     Bedroom count
 *   baths    int     Bathroom count
 *   sqft     string  Area e.g. '5,800'
 *   badge    string  'sale' | 'rent'
 *   image    string  Absolute URL to property image
 */

$prop = get_query_var( 'ge_property', [] );

if ( empty( $prop ) ) return;

$badge_label = ( 'rent' === $prop['badge'] )
    ? esc_html__( 'For Rent', 'grewestates' )
    : esc_html__( 'For Sale', 'grewestates' );

$badge_class = ( 'rent' === $prop['badge'] )
    ? 'ge-badge--rent'
    : 'ge-badge--sale';

$detail_url = home_url( '/properties/' . (int) $prop['id'] . '/' );
?>

<article class="property-card ge-card" aria-label="<?php echo esc_attr( $prop['title'] ); ?>">

    <!-- Image + overlay -->
    <div class="property-card__image-wrap">
        <a href="<?php echo esc_url( $detail_url ); ?>" tabindex="-1" aria-hidden="true">
            <img src="<?php echo esc_url( $prop['image'] ); ?>"
                 alt="<?php echo esc_attr( $prop['title'] ); ?>"
                 class="property-card__image"
                 loading="lazy">
        </a>

        <div class="ge-img-overlay" aria-hidden="true"></div>

        <!-- Sale / Rent badge -->
        <span class="ge-badge <?php echo esc_attr( $badge_class ); ?> property-card__badge">
            <?php echo $badge_label; // Already escaped above. ?>
        </span>

        <!-- Price overlay at bottom -->
        <div class="property-card__price-overlay">
            <span class="property-card__price"><?php echo esc_html( $prop['price'] ); ?></span>
        </div>
    </div>

    <!-- Card body -->
    <div class="property-card__body">
        <h3 class="property-card__title">
            <a href="<?php echo esc_url( $detail_url ); ?>" class="stretched-link">
                <?php echo esc_html( $prop['title'] ); ?>
            </a>
        </h3>

        <p class="property-card__location">
            <i class="bi bi-geo-alt" aria-hidden="true"></i>
            <?php echo esc_html( $prop['location'] ); ?>
        </p>

        <div class="property-card__meta" aria-label="<?php esc_attr_e( 'Property details', 'grewestates' ); ?>">
            <span class="property-card__meta-item">
                <i class="bi bi-door-open" aria-hidden="true"></i>
                <span><?php echo (int) $prop['beds']; ?></span>
                <span class="visually-hidden"><?php esc_html_e( 'bedrooms', 'grewestates' ); ?></span>
            </span>
            <span class="property-card__meta-item">
                <i class="bi bi-droplet" aria-hidden="true"></i>
                <span><?php echo (int) $prop['baths']; ?></span>
                <span class="visually-hidden"><?php esc_html_e( 'bathrooms', 'grewestates' ); ?></span>
            </span>
            <span class="property-card__meta-item">
                <i class="bi bi-aspect-ratio" aria-hidden="true"></i>
                <span><?php echo esc_html( $prop['sqft'] ); ?> <?php esc_html_e( 'sq ft', 'grewestates' ); ?></span>
            </span>
        </div>
    </div>

</article>