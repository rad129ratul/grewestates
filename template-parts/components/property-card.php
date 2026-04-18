<?php
/**
 * File: grewestates/template-parts/components/property-card.php
 * Purpose: Reusable property card.
 *          Supports two layout variants via the 'ge_property_variant' query var:
 *            - 'default'  → Home page grid card (image fills row, price overlay)
 *            - 'listing'  → Properties page card (fixed image height, body price,
 *                            heart icon, full-width View Details button)
 *
 * Expected data via set_query_var( 'ge_property', $data ):
 *   id       int     Unique identifier
 *   title    string  Property name
 *   location string  City, state
 *   price    string  Formatted price string e.g. '$2.45M'
 *   beds     int     Bedroom count
 *   baths    int     Bathroom count
 *   sqft     string  Area e.g. '3,200'
 *   badge    string  'sale' | 'rent'
 *   image    string  Absolute URL to property image
 *
 * Optional via set_query_var( 'ge_property_variant', 'listing' ).
 */

$prop    = get_query_var( 'ge_property', [] );
$variant = get_query_var( 'ge_property_variant', 'default' );

if ( empty( $prop ) ) return;

$badge_label = ( 'rent' === $prop['badge'] )
    ? esc_html__( 'For Rent', 'grewestates' )
    : esc_html__( 'For Sale', 'grewestates' );

$badge_class = ( 'rent' === $prop['badge'] )
    ? 'ge-badge--rent'
    : 'ge-badge--sale';

$detail_url = home_url( '/properties/' . (int) $prop['id'] . '/' );

$card_class = 'listing' === $variant
    ? 'property-card property-card--listing ge-card'
    : 'property-card ge-card';
?>

<article class="<?php echo esc_attr( $card_class ); ?>" aria-label="<?php echo esc_attr( $prop['title'] ); ?>">

    <!-- Image + overlay -->
    <div class="property-card__image-wrap">
        <a href="<?php echo esc_url( $detail_url ); ?>" tabindex="-1" aria-hidden="true">
            <img src="<?php echo esc_url( $prop['image'] ); ?>"
                 alt="<?php echo esc_attr( $prop['title'] ); ?>"
                 class="property-card__image"
                 loading="lazy">
        </a>

        <div class="ge-img-overlay" aria-hidden="true"></div>

        <!-- Sale / Rent badge — top-left -->
        <span class="ge-badge <?php echo esc_attr( $badge_class ); ?> property-card__badge">
            <?php echo $badge_label; // Already escaped above. ?>
        </span>

        <?php if ( 'listing' === $variant ) : ?>
            <!-- Wishlist heart icon — listing variant only -->
            <button type="button"
                    class="property-card__wishlist"
                    aria-label="<?php echo esc_attr( sprintf( __( 'Save %s to wishlist', 'grewestates' ), $prop['title'] ) ); ?>"
                    aria-pressed="false">
                <i class="bi bi-heart" aria-hidden="true"></i>
            </button>
        <?php endif; ?>

        <?php if ( 'default' === $variant ) : ?>
            <!-- Price overlay at bottom — default (home) variant only -->
            <div class="property-card__price-overlay">
                <span class="property-card__price"><?php echo esc_html( $prop['price'] ); ?></span>
            </div>
        <?php endif; ?>
    </div>

    <!-- Card body -->
    <div class="property-card__body">

        <?php if ( 'listing' === $variant ) : ?>
            <!-- Price shown in body for listing variant -->
            <span class="property-card__price-tag"><?php echo esc_html( $prop['price'] ); ?></span>
        <?php endif; ?>

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

        <?php if ( 'listing' === $variant ) : ?>
            <!-- View Details CTA — listing variant only; stretched-link covers entire card,
                 so this is decorative but gives users an obvious tap target on touch devices -->
            <span class="property-card__view-btn" aria-hidden="true">
                <?php esc_html_e( 'View Details', 'grewestates' ); ?>
            </span>
        <?php endif; ?>

    </div>

</article>