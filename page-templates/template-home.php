<?php
/**
 * File: grewestates/page-templates/template-home.php
 * Purpose: Home page template — hero, featured properties, property types,
 *          features, neighborhoods, agents, testimonials, CTA banner.
 * Template Name: Home
 * Dependencies: header.php, footer.php,
 *               template-parts/components/property-card.php,
 *               template-parts/components/agent-card.php,
 *               template-parts/components/section-header.php,
 *               template-parts/components/cta-banner.php
 */

get_header();

// ------------------------------------------------------------------
// DATA — Featured properties (static, hardcoded for now).
// ------------------------------------------------------------------
$featured_properties = [
    [
        'id'       => 1,
        'title'    => 'Oceanfront Villa',
        'location' => 'Malibu, CA',
        'price'    => '$3,200,000',
        'beds'     => 5,
        'baths'    => 4,
        'sqft'     => '4,500',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-1.jpg',
    ],
    [
        'id'       => 2,
        'title'    => 'Modern Penthouse',
        'location' => 'Manhattan, NY',
        'price'    => '$2,750,000',
        'beds'     => 4,
        'baths'    => 3,
        'sqft'     => '3,200',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-2.jpg',
    ],
    [
        'id'       => 3,
        'title'    => 'Garden Estate',
        'location' => 'Beverly Hills, CA',
        'price'    => '$5,900,000',
        'beds'     => 7,
        'baths'    => 6,
        'sqft'     => '7,100',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-3.jpg',
    ],
    [
        'id'       => 4,
        'title'    => 'Contemporary Estate',
        'location' => 'Malibu, CA',
        'price'    => '$4,100,000',
        'beds'     => 6,
        'baths'    => 5,
        'sqft'     => '5,800',
        'badge'    => 'rent',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-4.jpg',
    ],
];

// ------------------------------------------------------------------
// DATA — Property type categories.
// ------------------------------------------------------------------
$property_types = [
    [
        'label'      => 'Apartments',
        'count'      => '156 Properties',
        'image'      => get_template_directory_uri() . '/assets/images/types/type-apartments.jpg',
        'link'       => home_url( '/properties/?type=apartment' ),
    ],
    [
        'label'      => 'Luxury Villas',
        'count'      => '67 Properties',
        'image'      => get_template_directory_uri() . '/assets/images/types/type-villas.jpg',
        'link'       => home_url( '/properties/?type=villa' ),
    ],
    [
        'label'      => 'Family Homes',
        'count'      => '234 Properties',
        'image'      => get_template_directory_uri() . '/assets/images/types/type-homes.jpg',
        'link'       => home_url( '/properties/?type=home' ),
    ],
    [
        'label'      => 'Commercial Spaces',
        'count'      => '312 Properties',
        'image'      => get_template_directory_uri() . '/assets/images/types/type-commercial.jpg',
        'link'       => home_url( '/properties/?type=commercial' ),
    ],
    [
        'label'      => 'Waterfront Properties',
        'count'      => '23 Properties',
        'image'      => get_template_directory_uri() . '/assets/images/types/type-waterfront.jpg',
        'link'       => home_url( '/properties/?type=waterfront' ),
    ],
    [
        'label'      => 'Investment Properties',
        'count'      => '96 Properties',
        'image'      => get_template_directory_uri() . '/assets/images/types/type-investment.jpg',
        'link'       => home_url( '/properties/?type=investment' ),
    ],
];

// ------------------------------------------------------------------
// DATA — Why choose us features.
// ------------------------------------------------------------------
$features = [
    [
        'icon'  => 'bi-patch-check',
        'title' => 'Verified Listings',
        'desc'  => 'Every property is thoroughly verified and vetted to ensure authenticity and quality standards.',
    ],
    [
        'icon'  => 'bi-people',
        'title' => 'Expert Agents',
        'desc'  => 'Work with experienced real estate professionals who understand the market and your needs.',
    ],
    [
        'icon'  => 'bi-calendar2-check',
        'title' => 'Flexible Viewings',
        'desc'  => 'Schedule property viewings at your convenience with our easy booking system.',
    ],
    [
        'icon'  => 'bi-arrow-repeat',
        'title' => 'Seamless Process',
        'desc'  => 'From search to closing, we make buying or renting property smooth and stress-free.',
    ],
];

// ------------------------------------------------------------------
// DATA — Neighborhood grid.
// ------------------------------------------------------------------
$neighborhoods = [
    [
        'label'  => 'Luxury Communities',
        'desc'   => 'Exclusive estates with premium amenities',
        'count'  => '31 Properties',
        'image'  => get_template_directory_uri() . '/assets/images/neighborhoods/nbhd-luxury.jpg',
        'link'   => home_url( '/properties/?neighborhood=luxury' ),
        'size'   => 'normal',
    ],
    [
        'label'  => 'Downtown Living',
        'desc'   => 'Urban sophistication with vibrant city life',
        'count'  => '124 Properties',
        'image'  => get_template_directory_uri() . '/assets/images/neighborhoods/nbhd-downtown.jpg',
        'link'   => home_url( '/properties/?neighborhood=downtown' ),
        'size'   => 'normal',
    ],
    [
        'label'  => 'Family Suburbs',
        'desc'   => 'Safe, quiet communities perfect for families',
        'count'  => '89 Properties',
        'image'  => get_template_directory_uri() . '/assets/images/neighborhoods/nbhd-suburbs.jpg',
        'link'   => home_url( '/properties/?neighborhood=suburbs' ),
        'size'   => 'normal',
    ],
    [
        'label'  => 'Waterfront District',
        'desc'   => 'Scenic views and coastal living',
        'count'  => '72 Properties',
        'image'  => get_template_directory_uri() . '/assets/images/neighborhoods/nbhd-waterfront.jpg',
        'link'   => home_url( '/properties/?neighborhood=waterfront' ),
        'size'   => 'normal',
    ],
    [
        // Tall card — CSS pins this to grid-column: 2 / grid-row: 1 / 3 (right column, full height).
        // Must remain last in DOM so the 4 normal cards fill column 1 first via auto-placement.
        'label'  => 'Commercial Spaces',
        'desc'   => 'Where business meets opportunity.',
        'count'  => '204 Properties',
        'image'  => get_template_directory_uri() . '/assets/images/neighborhoods/nbhd-commercial.jpg',
        'link'   => home_url( '/properties/?neighborhood=commercial' ),
        'size'   => 'tall',
    ],
];

// ------------------------------------------------------------------
// DATA — Featured agents.
// ------------------------------------------------------------------
$agents = [
    [
        'name'       => 'Sarah Mitchell',
        'title'      => 'Senior Real Estate Agent',
        'experience' => '12+ Years Experience',
        'phone'      => '+1 (555) 123 4567',
        'email'      => 'sarah.mitchell@grewestates.com',
        'image'      => get_template_directory_uri() . '/assets/images/agents/agent-sarah.jpg',
        'link'       => home_url( '/find-agents/#sarah-mitchell' ),
    ],
    [
        'name'       => 'Michael Liechen',
        'title'      => 'Luxury Property Specialist',
        'experience' => '15+ Years Experience',
        'phone'      => '+1 (555) 123 4567',
        'email'      => 'michael.chen@grewestates.com',
        'image'      => get_template_directory_uri() . '/assets/images/agents/agent-michael.jpg',
        'link'       => home_url( '/find-agents/#michael-liechen' ),
    ],
    [
        'name'       => 'Emily Rodriguez',
        'title'      => 'Residential Expert',
        'experience' => '9+ Years Experience',
        'phone'      => '+1 (555) 123 4567',
        'email'      => 'emily.rodriguez@grewestates.com',
        'image'      => get_template_directory_uri() . '/assets/images/agents/agent-emily.jpg',
        'link'       => home_url( '/find-agents/#emily-rodriguez' ),
    ],
    [
        'name'       => 'David Thompson',
        'title'      => 'Commercial Property Agent',
        'experience' => '11+ Years Experience',
        'phone'      => '+1 (555) 123 4567',
        'email'      => 'david.thompson@grewestates.com',
        'image'      => get_template_directory_uri() . '/assets/images/agents/agent-david.jpg',
        'link'       => home_url( '/find-agents/#david-thompson' ),
    ],
];

// ------------------------------------------------------------------
// DATA — Testimonials.
// ------------------------------------------------------------------
$testimonials = [
    [
        'name'     => 'Jennifer Adams',
        'role'     => 'Homebuyer',
        'location' => 'Beverly Hills, CA',
        'rating'   => 5,
        'quote'    => 'GrewEstates made finding our dream home effortless. The team was professional, responsive, and truly understood what we were looking for. Highly recommended!',
        'image'    => get_template_directory_uri() . '/assets/images/testimonials/testimonial-jennifer.jpg',
    ],
    [
        'name'     => 'Michael Smith',
        'role'     => 'Investor',
        'location' => 'New York, NY',
        'rating'   => 5,
        'quote'    => 'Working with GrewEstates was a game changer for my investment strategy. Their insights into the market trends were invaluable and led to significant returns on my properties.',
        'image'    => get_template_directory_uri() . '/assets/images/testimonials/testimonial-michael.jpg',
    ],
    [
        'name'     => 'Sarah Johnson',
        'role'     => 'Seller',
        'location' => 'Austin, TX',
        'rating'   => 5,
        'quote'    => 'The GrewEstates team exceeded my expectations! They marketed my home beautifully and the sale went smoothly. I couldn\'t have asked for a better experience!',
        'image'    => get_template_directory_uri() . '/assets/images/testimonials/testimonial-sarah.jpg',
    ],
];
?>

<main id="main" class="site-main" role="main">

    <!-- ============================================================
         SECTION 1: HERO
         Full-viewport banner with search bar overlay.
         ============================================================ -->
    <section class="home-hero" aria-label="<?php esc_attr_e( 'Hero banner', 'grewestates' ); ?>">
        <div class="home-hero__overlay" aria-hidden="true"></div>

        <div class="container home-hero__inner">
            <div class="row">
                <div class="col-lg-7">
                    <p class="home-hero__eyebrow">
                        <i class="bi bi-stars" aria-hidden="true"></i>
                        <?php esc_html_e( 'Welcome to GrewEstates', 'grewestates' ); ?>
                    </p>
                    <h1 class="home-hero__heading">
                        <?php esc_html_e( 'Discover Exceptional Properties in Prime Locations', 'grewestates' ); ?>
                    </h1>
                    <p class="home-hero__subtext">
                        <?php esc_html_e( 'Explore premium homes, apartments, and investment-ready properties with a seamless search experience built for clarity and confidence.', 'grewestates' ); ?>
                    </p>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="home-hero__search-bar" role="search" aria-label="<?php esc_attr_e( 'Property search', 'grewestates' ); ?>">
                <div class="home-hero__search-fields">

                    <div class="home-hero__search-field">
                        <label class="home-hero__field-label" for="hero-location">
                            <?php esc_html_e( 'Location', 'grewestates' ); ?>
                        </label>
                        <div class="home-hero__field-input">
                            <i class="bi bi-geo-alt" aria-hidden="true"></i>
                            <input type="text"
                                   id="hero-location"
                                   class="home-hero__input"
                                   placeholder="<?php esc_attr_e( 'New York City', 'grewestates' ); ?>"
                                   aria-label="<?php esc_attr_e( 'Search by location', 'grewestates' ); ?>">
                        </div>
                    </div>

                    <div class="home-hero__search-divider" aria-hidden="true"></div>

                    <div class="home-hero__search-field">
                        <label class="home-hero__field-label" for="hero-type">
                            <?php esc_html_e( 'Property Type', 'grewestates' ); ?>
                        </label>
                        <div class="home-hero__field-input">
                            <i class="bi bi-building" aria-hidden="true"></i>
                            <select id="hero-type"
                                    class="home-hero__select"
                                    aria-label="<?php esc_attr_e( 'Select property type', 'grewestates' ); ?>">
                                <option value=""><?php esc_html_e( 'Apartment', 'grewestates' ); ?></option>
                                <option value="villa"><?php esc_html_e( 'Luxury Villa', 'grewestates' ); ?></option>
                                <option value="home"><?php esc_html_e( 'Family Home', 'grewestates' ); ?></option>
                                <option value="commercial"><?php esc_html_e( 'Commercial Space', 'grewestates' ); ?></option>
                                <option value="waterfront"><?php esc_html_e( 'Waterfront Property', 'grewestates' ); ?></option>
                                <option value="investment"><?php esc_html_e( 'Investment Property', 'grewestates' ); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="home-hero__search-divider" aria-hidden="true"></div>

                    <div class="home-hero__search-field">
                        <label class="home-hero__field-label" for="hero-price">
                            <?php esc_html_e( 'Price Range', 'grewestates' ); ?>
                        </label>
                        <div class="home-hero__field-input">
                            <i class="bi bi-currency-dollar" aria-hidden="true"></i>
                            <input type="text"
                                   id="hero-price"
                                   class="home-hero__input"
                                   placeholder="<?php esc_attr_e( '$20,000 – $40,000', 'grewestates' ); ?>"
                                   aria-label="<?php esc_attr_e( 'Price range', 'grewestates' ); ?>">
                        </div>
                    </div>

                    <div class="home-hero__search-divider" aria-hidden="true"></div>

                    <div class="home-hero__search-field">
                        <label class="home-hero__field-label" for="hero-area">
                            <?php esc_html_e( 'Area (sq ft)', 'grewestates' ); ?>
                        </label>
                        <div class="home-hero__field-input">
                            <i class="bi bi-aspect-ratio" aria-hidden="true"></i>
                            <input type="text"
                                   id="hero-area"
                                   class="home-hero__input"
                                   placeholder="<?php esc_attr_e( '1,000 – 3,000 sq ft', 'grewestates' ); ?>"
                                   aria-label="<?php esc_attr_e( 'Area in square feet', 'grewestates' ); ?>">
                        </div>
                    </div>

                    <a href="<?php echo esc_url( home_url( '/properties/' ) ); ?>"
                       class="btn btn-primary home-hero__search-btn"
                       id="js-hero-search">
                        <i class="bi bi-search" aria-hidden="true"></i>
                        <?php esc_html_e( 'Search', 'grewestates' ); ?>
                    </a>

                </div>
            </div><!-- .home-hero__search-bar -->
        </div><!-- .container -->
    </section>


    <!-- ============================================================
         SECTION 2: FEATURED RESIDENCES
         2×2 property card grid — one card shows detail overlay.
         ============================================================ -->
    <section class="home-featured py-5" aria-labelledby="featured-heading">
        <div class="container">

            <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-4 gap-3">
                <div>
                    <h2 id="featured-heading" class="section-title mb-1">
                        <?php esc_html_e( 'Featured Residences for You', 'grewestates' ); ?>
                    </h2>
                    <span class="ge-divider"></span>
                    <p class="section-subtitle mb-0">
                        <?php esc_html_e( 'Explore a curated selection of premium homes designed for comfort, style, and modern living. Each property is carefully chosen to match different lifestyles and investment goals.', 'grewestates' ); ?>
                    </p>
                </div>
                <a href="<?php echo esc_url( home_url( '/properties/' ) ); ?>"
                   class="home-featured__view-all text-nowrap">
                    <?php esc_html_e( 'View All Properties', 'grewestates' ); ?>
                    <i class="bi bi-arrow-right" aria-hidden="true"></i>
                </a>
            </div>

            <div class="home-featured__grid">
                <?php foreach ( $featured_properties as $prop ) :
                    set_query_var( 'ge_property', $prop );
                    get_template_part( 'template-parts/components/property-card' );
                endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ============================================================
         SECTION 3: BROWSE BY PROPERTY TYPE
         6-card image grid, each with overlay label + count.
         ============================================================ -->
    <section class="home-types py-5 bg-light-ge" aria-labelledby="types-heading">
        <div class="container">

            <?php
            set_query_var( 'ge_section_header', [
                'id'       => 'types-heading',
                'heading'  => __( 'Browse by Property Type', 'grewestates' ),
                'subtext'  => __( 'Find your perfect property by exploring different categories tailored to your lifestyle and investment needs.', 'grewestates' ),
                'align'    => 'center',
            ] );
            get_template_part( 'template-parts/components/section-header' );
            ?>

            <div class="home-types__grid">
                <?php foreach ( $property_types as $type ) : ?>
                    <a href="<?php echo esc_url( $type['link'] ); ?>"
                       class="home-types__card"
                       aria-label="<?php echo esc_attr( $type['label'] ); ?>">

                        <img src="<?php echo esc_url( $type['image'] ); ?>"
                             alt="<?php echo esc_attr( $type['label'] ); ?>"
                             class="home-types__card-img"
                             loading="lazy">

                        <div class="ge-img-overlay" aria-hidden="true"></div>

                        <div class="home-types__card-body">
                            <span class="home-types__card-count"><?php echo esc_html( $type['count'] ); ?></span>
                            <h3 class="home-types__card-label"><?php echo esc_html( $type['label'] ); ?></h3>
                        </div>

                    </a>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ============================================================
         SECTION 4: WHY CHOOSE GREWESTATES
         4-column icon + text feature strip.
         ============================================================ -->
    <section class="home-features py-5" aria-labelledby="features-heading">
        <div class="container">

            <?php
            set_query_var( 'ge_section_header', [
                'id'       => 'features-heading',
                'heading'  => __( 'Why Choose GrewEstates', 'grewestates' ),
                'subtext'  => __( 'We combine technology, expertise, and personalized service to deliver an exceptional real estate experience.', 'grewestates' ),
                'align'    => 'center',
            ] );
            get_template_part( 'template-parts/components/section-header' );
            ?>

            <div class="row g-4 mt-2">
                <?php foreach ( $features as $feature ) : ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="home-features__item text-center">
                            <div class="home-features__icon-wrap" aria-hidden="true">
                                <i class="bi <?php echo esc_attr( $feature['icon'] ); ?>"></i>
                            </div>
                            <h3 class="home-features__title"><?php echo esc_html( $feature['title'] ); ?></h3>
                            <p class="home-features__desc"><?php echo esc_html( $feature['desc'] ); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ============================================================
         SECTION 5: EXPLORE NEIGHBORHOODS
         Left text column + right image mosaic grid.
         ============================================================ -->
    <section class="home-neighborhoods py-5 bg-dark-ge" aria-labelledby="neighborhoods-heading">
        <div class="container">
            <div class="row g-4 align-items-center">

                <!-- Left: heading + description + CTA -->
                <div class="col-lg-4">
                    <h2 id="neighborhoods-heading" class="home-neighborhoods__heading text-white">
                        <?php esc_html_e( 'Explore Neighborhoods', 'grewestates' ); ?>
                    </h2>
                    <span class="ge-divider"></span>
                    <p class="home-neighborhoods__subtext">
                        <?php esc_html_e( 'Discover the perfect location that matches your lifestyle and preferences.', 'grewestates' ); ?>
                    </p>
                    <a href="<?php echo esc_url( home_url( '/properties/' ) ); ?>"
                       class="btn btn-primary mt-3">
                        <?php esc_html_e( 'Explore More', 'grewestates' ); ?>
                    </a>
                </div>

                <!-- Right: 2-column mosaic of neighborhood cards -->
                <div class="col-lg-8">
                    <div class="home-neighborhoods__grid">
                        <?php foreach ( $neighborhoods as $nbhd ) : ?>
                            <a href="<?php echo esc_url( $nbhd['link'] ); ?>"
                               class="home-neighborhoods__card home-neighborhoods__card--<?php echo esc_attr( $nbhd['size'] ); ?>"
                               aria-label="<?php echo esc_attr( $nbhd['label'] ); ?>">

                                <img src="<?php echo esc_url( $nbhd['image'] ); ?>"
                                     alt="<?php echo esc_attr( $nbhd['label'] ); ?>"
                                     class="home-neighborhoods__card-img"
                                     loading="lazy">

                                <div class="ge-img-overlay" aria-hidden="true"></div>

                                <div class="home-neighborhoods__card-body">
                                    <span class="home-neighborhoods__card-count">
                                        <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                                        <?php echo esc_html( $nbhd['count'] ); ?>
                                    </span>
                                    <h3 class="home-neighborhoods__card-label"><?php echo esc_html( $nbhd['label'] ); ?></h3>
                                    <p class="home-neighborhoods__card-desc"><?php echo esc_html( $nbhd['desc'] ); ?></p>
                                </div>

                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ============================================================
         SECTION 6: MEET OUR EXPERT AGENTS
         4-column agent cards with contact details.
         ============================================================ -->
    <section class="home-agents py-5" aria-labelledby="agents-heading">
        <div class="container">

            <?php
            set_query_var( 'ge_section_header', [
                'id'       => 'agents-heading',
                'heading'  => __( 'Meet Our Expert Agents', 'grewestates' ),
                'subtext'  => __( 'Our experienced team is dedicated to helping you find your perfect property and guiding you through every step.', 'grewestates' ),
                'align'    => 'center',
            ] );
            get_template_part( 'template-parts/components/section-header' );
            ?>

            <div class="row g-4 mt-2">
                <?php foreach ( $agents as $agent ) :
                    set_query_var( 'ge_agent', $agent );
                    get_template_part( 'template-parts/components/agent-card' );
                endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ============================================================
         SECTION 7: WHAT OUR CLIENTS SAY
         3-column testimonial cards with star rating + quote.
         ============================================================ -->
    <section class="home-testimonials py-5 bg-light-ge" aria-labelledby="testimonials-heading">
        <div class="container">

            <?php
            set_query_var( 'ge_section_header', [
                'id'       => 'testimonials-heading',
                'heading'  => __( 'What Our Clients Say', 'grewestates' ),
                'subtext'  => __( 'Real stories from satisfied clients who found their perfect properties with GrewEstates.', 'grewestates' ),
                'align'    => 'center',
            ] );
            get_template_part( 'template-parts/components/section-header' );
            ?>

            <div class="row g-4 mt-2">
                <?php foreach ( $testimonials as $testimonial ) : ?>
                    <div class="col-md-4">
                        <div class="home-testimonials__card ge-card h-100 p-4">

                            <!-- Reviewer identity -->
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="<?php echo esc_url( $testimonial['image'] ); ?>"
                                     alt="<?php echo esc_attr( $testimonial['name'] ); ?>"
                                     class="home-testimonials__avatar"
                                     width="52"
                                     height="52"
                                     loading="lazy">
                                <div>
                                    <strong class="home-testimonials__name d-block">
                                        <?php echo esc_html( $testimonial['name'] ); ?>
                                    </strong>
                                    <span class="home-testimonials__meta">
                                        <?php echo esc_html( $testimonial['role'] ); ?> &middot;
                                        <?php echo esc_html( $testimonial['location'] ); ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Star rating -->
                            <div class="home-testimonials__stars mb-3" aria-label="<?php echo esc_attr( sprintf( __( '%d out of 5 stars', 'grewestates' ), $testimonial['rating'] ) ); ?>">
                                <?php for ( $i = 0; $i < $testimonial['rating']; $i++ ) : ?>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                <?php endfor; ?>
                            </div>

                            <!-- Quote -->
                            <p class="home-testimonials__quote mb-0">
                                &ldquo;<?php echo esc_html( $testimonial['quote'] ); ?>&rdquo;
                            </p>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ============================================================
         SECTION 8: CTA BANNER
         Dark full-width band — Book a Viewing + Contact Agent.
         ============================================================ -->
    <?php
    set_query_var( 'ge_cta', [
        'heading'       => __( 'Ready to Find Your Next Home?', 'grewestates' ),
        'subtext'       => __( 'Connect with our real estate experts and schedule your private property viewing today.', 'grewestates' ),
        'primary_label' => __( 'Book a Viewing', 'grewestates' ),
        'primary_url'   => home_url( '/contact/' ),
        'secondary_label' => __( 'Contact Agent', 'grewestates' ),
        'secondary_url'   => home_url( '/find-agents/' ),
    ] );
    get_template_part( 'template-parts/components/cta-banner' );
    ?>

</main><!-- #main -->

<?php get_footer(); ?>