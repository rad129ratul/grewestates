<?php
/**
 * File: grewestates/page-templates/template-property-single.php
 * Purpose: Property detail page — hero gallery, description, agent sidebar,
 *          amenities, property details table, floor plan, location,
 *          similar properties, and CTA banner.
 * Template Name: Property Single
 * Dependencies: header.php, footer.php,
 *               template-parts/components/property-card.php,
 *               template-parts/components/cta-banner.php,
 *               template-parts/components/breadcrumb.php
 */

get_header();

// ------------------------------------------------------------------
// DATA — Single property (static, hardcoded for now).
// ------------------------------------------------------------------
$property = [
    'id'           => 'GE-2024-1547',
    'title'        => 'Modern Glass Villa in Downtown',
    'location'     => 'Beverly Hills, California, USA',
    'price'        => '$1,250,000',
    'beds'         => 3,
    'baths'        => 2,
    'sqft'         => '2,100',
    'year_built'   => '2022',
    'status'       => 'For Sale',
    'badge'        => 'sale',
    'description'  => [
        'Welcome to this stunning modern glass villa, a masterpiece of contemporary architecture nestled in the heart of Downtown Beverly Hills. This exceptional property seamlessly blends luxury living with sophisticated design, offering an unparalleled lifestyle experience.',
        'The villa features expansive floor-to-ceiling windows that flood the interior with natural light and provide breathtaking views of the surrounding landscape. Every detail has been meticulously crafted using premium materials and finishes, from the Italian marble countertops to the custom oak flooring.',
        'The open-concept living spaces flow effortlessly, creating an ideal environment for both intimate family gatherings and grand entertaining. The gourmet kitchen is a chef\'s dream, equipped with top-of-the-line appliances and a spacious island perfect for culinary creations.',
        'Outside, the property boasts beautifully landscaped gardens, a stunning infinity pool, and multiple entertainment areas that capture the essence of California indoor-outdoor living. This is more than a home — it\'s a lifestyle statement.',
    ],
    'images'       => [
        'main'   => get_template_directory_uri() . '/assets/images/properties/prop-single-main.jpg',
        'thumb1' => get_template_directory_uri() . '/assets/images/properties/prop-single-thumb1.jpg',
        'thumb2' => get_template_directory_uri() . '/assets/images/properties/prop-single-thumb2.jpg',
        'thumb3' => get_template_directory_uri() . '/assets/images/properties/prop-single-thumb3.jpg',
    ],
    'extra_photos' => 7,
    'details'      => [
        'left'  => [
            [ 'label' => 'Property Type', 'value' => 'Modern Villa' ],
            [ 'label' => 'Status',        'value' => 'For Sale' ],
            [ 'label' => 'Total Area',    'value' => '2,100 sq ft' ],
            [ 'label' => 'Bedrooms',      'value' => '3 Bedrooms' ],
            [ 'label' => 'Bathrooms',     'value' => '2 Bathrooms' ],
        ],
        'right' => [
            [ 'label' => 'Year Built',    'value' => '2022' ],
            [ 'label' => 'Parking',       'value' => '2 Car Garage' ],
            [ 'label' => 'Lot Size',      'value' => '5,500 sq ft' ],
            [ 'label' => 'HOA Fees',      'value' => '$350/month' ],
            [ 'label' => 'Property Tax',  'value' => '$15,000/year' ],
        ],
    ],
];

// ------------------------------------------------------------------
// DATA — Key amenities.
// ------------------------------------------------------------------
$amenities = [
    [ 'icon' => 'bi-water',          'label' => 'Swimming Pool' ],
    [ 'icon' => 'bi-p-square',       'label' => 'Parking Space' ],
    [ 'icon' => 'bi-activity',       'label' => 'Fitness Center' ],
    [ 'icon' => 'bi-shield-check',   'label' => '24/7 Security' ],
    [ 'icon' => 'bi-flower1',        'label' => 'Private Garden' ],
    [ 'icon' => 'bi-phone',          'label' => 'Smart Home' ],
    [ 'icon' => 'bi-wifi',           'label' => 'High-Speed WiFi' ],
    [ 'icon' => 'bi-thermometer',    'label' => 'Central AC' ],
    [ 'icon' => 'bi-sun',            'label' => 'Solar Panels' ],
    [ 'icon' => 'bi-briefcase',      'label' => 'Home Office' ],
];

// ------------------------------------------------------------------
// DATA — Location POIs.
// ------------------------------------------------------------------
$location_pois = [
    [
        'icon'  => 'bi-mortarboard',
        'title' => 'Nearby Schools',
        'items' => [
            'Beverly Hills High School — 0.5 mi',
            'Hawthorne Elementary — 0.8 mi',
            'El Rodeo School — 1.2 mi',
        ],
    ],
    [
        'icon'  => 'bi-bag',
        'title' => 'Shopping & Dining',
        'items' => [
            'Rodeo Drive — 1.0 mi',
            'The Beverly Center — 1.5 mi',
            'Whole Foods Market — 0.3 mi',
        ],
    ],
    [
        'icon'  => 'bi-bus-front',
        'title' => 'Transportation',
        'items' => [
            'LAX Airport — 15 mi',
            'Metro Station — 0.7 mi',
            'Bus Stop — 0.2 mi',
        ],
    ],
];

// ------------------------------------------------------------------
// DATA — Similar properties.
// ------------------------------------------------------------------
$similar_properties = [
    [
        'id'       => 10,
        'title'    => 'Modern Loft',
        'location' => 'New York, NY',
        'price'    => '$1,200,000',
        'beds'     => 3,
        'baths'    => 2,
        'sqft'     => '2,500',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-similar-1.jpg',
    ],
    [
        'id'       => 11,
        'title'    => 'Charming Bungalow',
        'location' => 'Austin, TX',
        'price'    => '$700,000',
        'beds'     => 2,
        'baths'    => 1,
        'sqft'     => '1,200',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-similar-2.jpg',
    ],
    [
        'id'       => 12,
        'title'    => 'Luxury Villa',
        'location' => 'Beverly Hills, CA',
        'price'    => '$3,800,000',
        'beds'     => 8,
        'baths'    => 7,
        'sqft'     => '10,000',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-similar-3.jpg',
    ],
];

// ------------------------------------------------------------------
// DATA — Listing agent.
// ------------------------------------------------------------------
$agent = [
    'name'          => 'Sarah Mitchell',
    'title'         => 'Senior Real Estate Agent',
    'rating'        => 5,
    'rating_count'  => 48,
    'experience'    => '12+ years of experience',
    'response_time' => 'Replies within 1 hour',
    'email'         => 'sarah.mitchell@grewestates.com',
    'phone'         => '+15551234567',
    'phone_display' => '+1 (555) 123-4567',
    'image'         => get_template_directory_uri() . '/assets/images/agents/agent-sarah.jpg',
    'link'          => home_url( '/find-agents/#sarah-mitchell' ),
];

$contact_url = get_theme_mod( 'ge_contact_page_url', home_url( '/contact/' ) );
?>

<main id="main" class="site-main" role="main">

    <!-- ============================================================
         SECTION 1: BREADCRUMB
         Dark strip: Home / Properties / [Property Title]
         ============================================================ -->
    <?php
    set_query_var( 'ge_breadcrumb', [
        [
            'label' => __( 'Home', 'grewestates' ),
            'url'   => home_url( '/' ),
        ],
        [
            'label' => __( 'Properties', 'grewestates' ),
            'url'   => home_url( '/properties/' ),
        ],
        [
            'label' => $property['title'],
            'url'   => '',
        ],
    ] );
    get_template_part( 'template-parts/components/breadcrumb' );
    ?>


    <!-- ============================================================
         SECTION 2: PROPERTY HERO
         Left: price, title, stats, IDs, CTAs.
         Right: main image + thumbnail row + overflow counter.
         ============================================================ -->
    <section class="ps-hero" aria-labelledby="ps-property-title">
        <div class="container">
            <div class="row g-4 align-items-start">

                <!-- LEFT: Property summary panel -->
                <div class="col-lg-4">
                    <div class="ps-hero__panel">

                        <p class="ps-hero__price"><?php echo esc_html( $property['price'] ); ?></p>

                        <h1 id="ps-property-title" class="ps-hero__title">
                            <?php echo esc_html( $property['title'] ); ?>
                        </h1>

                        <p class="ps-hero__location">
                            <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                            <?php echo esc_html( $property['location'] ); ?>
                        </p>

                        <!-- Stats strip: beds / baths / sqft / year -->
                        <div class="ps-hero__stats" aria-label="<?php esc_attr_e( 'Property statistics', 'grewestates' ); ?>">
                            <div class="ps-hero__stat">
                                <span class="ps-hero__stat-value"><?php echo (int) $property['beds']; ?></span>
                                <span class="ps-hero__stat-label"><?php esc_html_e( 'Bedrooms', 'grewestates' ); ?></span>
                            </div>
                            <div class="ps-hero__stat-divider" aria-hidden="true"></div>
                            <div class="ps-hero__stat">
                                <span class="ps-hero__stat-value"><?php echo (int) $property['baths']; ?></span>
                                <span class="ps-hero__stat-label"><?php esc_html_e( 'Bathrooms', 'grewestates' ); ?></span>
                            </div>
                            <div class="ps-hero__stat-divider" aria-hidden="true"></div>
                            <div class="ps-hero__stat">
                                <span class="ps-hero__stat-value"><?php echo esc_html( $property['sqft'] ); ?></span>
                                <span class="ps-hero__stat-label"><?php esc_html_e( 'Square Feet', 'grewestates' ); ?></span>
                            </div>
                            <div class="ps-hero__stat-divider" aria-hidden="true"></div>
                            <div class="ps-hero__stat">
                                <span class="ps-hero__stat-value"><?php echo esc_html( $property['year_built'] ); ?></span>
                                <span class="ps-hero__stat-label"><?php esc_html_e( 'Year Built', 'grewestates' ); ?></span>
                            </div>
                        </div>

                        <!-- Property ID + status -->
                        <div class="ps-hero__meta">
                            <div class="ps-hero__meta-row">
                                <span class="ps-hero__meta-label"><?php esc_html_e( 'Property ID', 'grewestates' ); ?></span>
                                <span class="ps-hero__meta-value"><?php echo esc_html( $property['id'] ); ?></span>
                            </div>
                            <div class="ps-hero__meta-row">
                                <span class="ps-hero__meta-label"><?php esc_html_e( 'Status', 'grewestates' ); ?></span>
                                <span class="ge-badge ge-badge--<?php echo esc_attr( $property['badge'] ); ?>">
                                    <?php echo esc_html( $property['status'] ); ?>
                                </span>
                            </div>
                        </div>

                        <!-- CTAs -->
                        <div class="ps-hero__actions">
                            <a href="<?php echo esc_url( $contact_url ); ?>"
                               class="btn btn-primary w-100">
                                <i class="bi bi-calendar-check" aria-hidden="true"></i>
                                <?php esc_html_e( 'Book a Viewing', 'grewestates' ); ?>
                            </a>
                            <a href="<?php echo esc_url( $agent['link'] ); ?>"
                               class="btn btn-outline-primary w-100">
                                <i class="bi bi-person" aria-hidden="true"></i>
                                <?php esc_html_e( 'Contact Agent', 'grewestates' ); ?>
                            </a>
                        </div>

                    </div><!-- .ps-hero__panel -->
                </div><!-- col -->

                <!-- RIGHT: Gallery -->
                <div class="col-lg-8">
                    <div class="ps-gallery" aria-label="<?php esc_attr_e( 'Property photos', 'grewestates' ); ?>">

                        <!-- Main image -->
                        <div class="ps-gallery__main">
                            <img src="<?php echo esc_url( $property['images']['main'] ); ?>"
                                 alt="<?php echo esc_attr( $property['title'] ); ?>"
                                 class="ps-gallery__main-img"
                                 width="800"
                                 height="520">
                        </div>

                        <!-- Thumbnails row -->
                        <div class="ps-gallery__thumbs">
                            <div class="ps-gallery__thumb">
                                <img src="<?php echo esc_url( $property['images']['thumb1'] ); ?>"
                                     alt="<?php esc_attr_e( 'Property interior view 1', 'grewestates' ); ?>"
                                     class="ps-gallery__thumb-img"
                                     loading="lazy"
                                     width="240"
                                     height="160">
                            </div>
                            <div class="ps-gallery__thumb">
                                <img src="<?php echo esc_url( $property['images']['thumb2'] ); ?>"
                                     alt="<?php esc_attr_e( 'Property interior view 2', 'grewestates' ); ?>"
                                     class="ps-gallery__thumb-img"
                                     loading="lazy"
                                     width="240"
                                     height="160">
                            </div>
                            <!-- Third thumb with overflow counter -->
                            <div class="ps-gallery__thumb ps-gallery__thumb--more">
                                <img src="<?php echo esc_url( $property['images']['thumb3'] ); ?>"
                                     alt="<?php esc_attr_e( 'Property interior view 3', 'grewestates' ); ?>"
                                     class="ps-gallery__thumb-img"
                                     loading="lazy"
                                     width="240"
                                     height="160">
                                <div class="ps-gallery__more-overlay" aria-hidden="true">
                                    <span class="ps-gallery__more-count">
                                        +<?php echo (int) $property['extra_photos']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div><!-- .ps-gallery -->
                </div><!-- col -->

            </div><!-- .row -->
        </div><!-- .container -->
    </section>


    <!-- ============================================================
         SECTION 3: ABOUT + AGENT SIDEBAR
         Left: description paragraphs. Right: sticky agent card.
         ============================================================ -->
    <section class="ps-about py-5" aria-labelledby="ps-about-heading">
        <div class="container">
            <div class="row g-5">

                <!-- LEFT: Description -->
                <div class="col-lg-8">
                    <h2 id="ps-about-heading" class="ps-section-title">
                        <?php esc_html_e( 'About This Property', 'grewestates' ); ?>
                    </h2>
                    <span class="ge-divider"></span>

                    <?php foreach ( $property['description'] as $paragraph ) : ?>
                        <p><?php echo esc_html( $paragraph ); ?></p>
                    <?php endforeach; ?>
                </div>

                <!-- RIGHT: Agent sidebar card -->
                <div class="col-lg-4">
                    <p class="ps-agent-card__eyebrow">
                        <?php esc_html_e( 'Meet Your Agent', 'grewestates' ); ?>
                    </p>
                    <div class="ps-agent-card" aria-label="<?php esc_attr_e( 'Listing agent', 'grewestates' ); ?>">

                        <!-- Agent photo + identity -->
                        <div class="ps-agent-card__header">
                            <img src="<?php echo esc_url( $agent['image'] ); ?>"
                                 alt="<?php echo esc_attr( $agent['name'] ); ?>"
                                 class="ps-agent-card__photo"
                                 width="80"
                                 height="80"
                                 loading="lazy">
                            <div class="ps-agent-card__info">
                                <strong class="ps-agent-card__name"><?php echo esc_html( $agent['name'] ); ?></strong>
                                <span class="ps-agent-card__role"><?php echo esc_html( $agent['title'] ); ?></span>

                                <!-- Star rating -->
                                <div class="ps-agent-card__rating" aria-label="<?php echo esc_attr( sprintf( __( '%d out of 5 stars, %d reviews', 'grewestates' ), $agent['rating'], $agent['rating_count'] ) ); ?>">
                                    <?php for ( $i = 0; $i < $agent['rating']; $i++ ) : ?>
                                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    <?php endfor; ?>
                                    <span class="ps-agent-card__rating-count">
                                        <?php echo number_format_i18n( $agent['rating_count'] ); ?>
                                    </span>
                                </div>
                            </div>
                        </div><!-- .ps-agent-card__header -->

                        <!-- Badges: experience + response time -->
                        <div class="ps-agent-card__badges">
                            <span class="ps-agent-card__badge">
                                <i class="bi bi-award" aria-hidden="true"></i>
                                <?php echo esc_html( $agent['experience'] ); ?>
                            </span>
                            <span class="ps-agent-card__badge">
                                <i class="bi bi-lightning" aria-hidden="true"></i>
                                <?php echo esc_html( $agent['response_time'] ); ?>
                            </span>
                        </div>

                        <!-- Primary CTA: Call Agent -->
                        <a href="tel:<?php echo esc_attr( $agent['phone'] ); ?>"
                           class="btn btn-primary w-100 ps-agent-card__call">
                            <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                            <?php esc_html_e( 'Call Agent', 'grewestates' ); ?>
                        </a>

                        <!-- Secondary actions: Email / Message -->
                        <div class="ps-agent-card__secondary-actions">
                            <a href="mailto:<?php echo esc_attr( $agent['email'] ); ?>"
                               class="ps-agent-card__action-btn"
                               aria-label="<?php echo esc_attr( sprintf( __( 'Email %s', 'grewestates' ), $agent['name'] ) ); ?>">
                                <i class="bi bi-envelope" aria-hidden="true"></i>
                                <?php esc_html_e( 'Email', 'grewestates' ); ?>
                            </a>
                            <a href="<?php echo esc_url( $contact_url ); ?>"
                               class="ps-agent-card__action-btn"
                               aria-label="<?php echo esc_attr( sprintf( __( 'Message %s', 'grewestates' ), $agent['name'] ) ); ?>">
                                <i class="bi bi-chat-dots" aria-hidden="true"></i>
                                <?php esc_html_e( 'Message', 'grewestates' ); ?>
                            </a>
                        </div>

                    </div><!-- .ps-agent-card -->
                </div><!-- col -->

            </div><!-- .row -->
        </div><!-- .container -->
    </section>


    <!-- ============================================================
         SECTION 4: KEY FEATURES & AMENITIES
         2×5 icon grid — light background.
         ============================================================ -->
    <section class="ps-amenities py-5 bg-light-ge" aria-labelledby="ps-amenities-heading">
        <div class="container">
            <h2 id="ps-amenities-heading" class="ps-section-title">
                <?php esc_html_e( 'Key Features & Amenities', 'grewestates' ); ?>
            </h2>
            <span class="ge-divider"></span>

            <div class="ps-amenities__grid">
                <?php foreach ( $amenities as $amenity ) : ?>
                    <div class="ps-amenities__item">
                        <div class="ps-amenities__icon-wrap" aria-hidden="true">
                            <i class="bi <?php echo esc_attr( $amenity['icon'] ); ?>"></i>
                        </div>
                        <span class="ps-amenities__label"><?php echo esc_html( $amenity['label'] ); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ============================================================
         SECTION 5: PROPERTY DETAILS TABLE
         Two-column key-value pairs.
         ============================================================ -->
    <section class="ps-details py-5" aria-labelledby="ps-details-heading">
        <div class="container">
            <h2 id="ps-details-heading" class="ps-section-title">
                <?php esc_html_e( 'Property Details', 'grewestates' ); ?>
            </h2>
            <span class="ge-divider"></span>

            <div class="row g-0 mt-4">
                <?php foreach ( [ $property['details']['left'], $property['details']['right'] ] as $col ) : ?>
                    <div class="col-md-6">
                        <dl class="ps-details__list">
                            <?php foreach ( $col as $row ) : ?>
                                <div class="ps-details__row">
                                    <dt class="ps-details__label"><?php echo esc_html( $row['label'] ); ?></dt>
                                    <dd class="ps-details__value"><?php echo esc_html( $row['value'] ); ?></dd>
                                </div>
                            <?php endforeach; ?>
                        </dl>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ============================================================
         SECTION 6: FLOOR PLAN
         Light centred placeholder — icon, label, CTA button.
         ============================================================ -->
    <section class="ps-floorplan py-5 bg-light-ge" aria-labelledby="ps-floorplan-heading">
        <div class="container">
            <h2 id="ps-floorplan-heading" class="ps-section-title">
                <?php esc_html_e( 'Floor Plan', 'grewestates' ); ?>
            </h2>
            <span class="ge-divider"></span>

            <div class="ps-floorplan__placeholder" role="img" aria-label="<?php esc_attr_e( 'Interactive floor plan placeholder', 'grewestates' ); ?>">
                <div class="ps-floorplan__icon-wrap" aria-hidden="true">
                    <i class="bi bi-house-door"></i>
                </div>
                <p class="ps-floorplan__label"><?php esc_html_e( 'Interactive Floor Plan', 'grewestates' ); ?></p>
                <p class="ps-floorplan__sub"><?php esc_html_e( 'Detailed floor plan available upon request', 'grewestates' ); ?></p>
                <a href="<?php echo esc_url( $contact_url ); ?>"
                   class="btn btn-primary ps-floorplan__cta">
                    <?php esc_html_e( 'Request Floor Plan', 'grewestates' ); ?>
                </a>
            </div>
        </div>
    </section>


    <!-- ============================================================
         SECTION 7: LOCATION & NEIGHBORHOOD
         Map placeholder + 3-column POI list.
         ============================================================ -->
    <section class="ps-location py-5" aria-labelledby="ps-location-heading">
        <div class="container">
            <h2 id="ps-location-heading" class="ps-section-title">
                <?php esc_html_e( 'Location & Neighborhood', 'grewestates' ); ?>
            </h2>
            <span class="ge-divider"></span>

            <!-- Map placeholder -->
            <div class="ps-location__map-placeholder" role="img" aria-label="<?php esc_attr_e( 'Map of Beverly Hills, California', 'grewestates' ); ?>">
                <div class="ps-location__map-inner">
                    <i class="bi bi-geo-alt ps-location__map-icon" aria-hidden="true"></i>
                    <p class="ps-location__map-label"><?php echo esc_html( $property['location'] ); ?></p>
                    <p class="ps-location__map-sub"><?php esc_html_e( 'Interactive map view', 'grewestates' ); ?></p>
                </div>
            </div>

            <!-- POI columns -->
            <div class="row g-4 mt-4">
                <?php foreach ( $location_pois as $poi ) : ?>
                    <div class="col-md-4">
                        <div class="ps-location__poi">
                            <h3 class="ps-location__poi-title">
                                <i class="bi <?php echo esc_attr( $poi['icon'] ); ?>" aria-hidden="true"></i>
                                <?php echo esc_html( $poi['title'] ); ?>
                            </h3>
                            <ul class="ps-location__poi-list">
                                <?php foreach ( $poi['items'] as $item ) : ?>
                                    <li><?php echo esc_html( $item ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ============================================================
         SECTION 8: SIMILAR PROPERTIES
         3-column grid reusing property-card component.
         ============================================================ -->
    <section class="ps-similar py-5 bg-light-ge" aria-labelledby="ps-similar-heading">
        <div class="container">
            <h2 id="ps-similar-heading" class="ps-section-title">
                <?php esc_html_e( 'Similar Properties You May Like', 'grewestates' ); ?>
            </h2>
            <span class="ge-divider"></span>

            <div class="row g-4 mt-2">
                <?php foreach ( $similar_properties as $prop ) :
                    set_query_var( 'ge_property', $prop );
                    get_template_part( 'template-parts/components/property-card' );
                endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ============================================================
         SECTION 9: CTA BANNER
         "Interested in This Property?" dark band.
         ============================================================ -->
    <?php
    set_query_var( 'ge_cta', [
        'heading'        => __( 'Interested in This Property?', 'grewestates' ),
        'subtext'        => __( 'Schedule a visit or connect with our agent to learn more about this exceptional property.', 'grewestates' ),
        'primary_label'  => __( 'Book a Viewing', 'grewestates' ),
        'primary_url'    => $contact_url,
        'secondary_label' => __( 'Contact Agent', 'grewestates' ),
        'secondary_url'   => $agent['link'],
    ] );
    get_template_part( 'template-parts/components/cta-banner' );
    ?>

</main><!-- #main -->

<?php get_footer(); ?>