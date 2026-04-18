<?php
/**
 * File: grewestates/page-templates/template-properties.php
 * Purpose: Properties listing page — hero, quick search bar, sidebar filters,
 *          3-column property grid, pagination, newsletter strip.
 * Template Name: Properties
 * Dependencies: header.php, footer.php,
 *               template-parts/components/property-card.php,
 *               template-parts/components/newsletter-strip.php
 */

get_header();

// ------------------------------------------------------------------
// DATA — Static property listings (hardcoded; no CPT yet).
// ------------------------------------------------------------------
$properties = [
    [
        'id'       => 1,
        'title'    => 'Modern Villa Estate',
        'location' => 'Beverly Hills, CA',
        'price'    => '$2.45M',
        'beds'     => 4,
        'baths'    => 3,
        'sqft'     => '3,200',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-villa-estate.jpg',
    ],
    [
        'id'       => 2,
        'title'    => 'Cozy Cottage',
        'location' => 'Aspen, CO',
        'price'    => '$1.75M',
        'beds'     => 3,
        'baths'    => 2,
        'sqft'     => '1,600',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-cottage.jpg',
    ],
    [
        'id'       => 3,
        'title'    => 'Luxury Penthouse',
        'location' => 'New York, NY',
        'price'    => '$3.10M',
        'beds'     => 2,
        'baths'    => 2,
        'sqft'     => '1,800',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-penthouse.jpg',
    ],
    [
        'id'       => 4,
        'title'    => 'Charming Bungalow',
        'location' => 'Portland, OR',
        'price'    => '$900K',
        'beds'     => 2,
        'baths'    => 1,
        'sqft'     => '1,200',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-bungalow.jpg',
    ],
    [
        'id'       => 5,
        'title'    => 'Tuscan Villa',
        'location' => 'Napa Valley, CA',
        'price'    => '$4.50M',
        'beds'     => 5,
        'baths'    => 4,
        'sqft'     => '4,500',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-tuscan.jpg',
    ],
    [
        'id'       => 6,
        'title'    => 'Urban Loft',
        'location' => 'Chicago, IL',
        'price'    => '$650K',
        'beds'     => 1,
        'baths'    => 1,
        'sqft'     => '800',
        'badge'    => 'rent',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-loft.jpg',
    ],
    [
        'id'       => 7,
        'title'    => 'Contemporary Mansion',
        'location' => 'Miami, FL',
        'price'    => '$2.90M',
        'beds'     => 6,
        'baths'    => 5,
        'sqft'     => '5,000',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-mansion.jpg',
    ],
    [
        'id'       => 8,
        'title'    => 'Waterfront Home',
        'location' => 'Seattle, WA',
        'price'    => '$1.25M',
        'beds'     => 3,
        'baths'    => 2,
        'sqft'     => '2,300',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-waterfront.jpg',
    ],
    [
        'id'       => 9,
        'title'    => 'Beachfront Villa',
        'location' => 'Malibu, CA',
        'price'    => '$3.60M',
        'beds'     => 4,
        'baths'    => 4,
        'sqft'     => '3,800',
        'badge'    => 'sale',
        'image'    => get_template_directory_uri() . '/assets/images/properties/prop-beachfront.jpg',
    ],
];
?>

<main id="main" class="site-main" role="main">

    <!-- ============================================================
         SECTION 1: PAGE HERO
         Dark band with breadcrumb, heading, and subtext.
         ============================================================ -->
    <section class="props-hero" aria-label="<?php esc_attr_e( 'Properties page header', 'grewestates' ); ?>">
        <div class="container">

            <nav aria-label="<?php esc_attr_e( 'Breadcrumb', 'grewestates' ); ?>">
                <ol class="props-hero__breadcrumb">
                    <li class="props-hero__breadcrumb-item">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php esc_html_e( 'Home', 'grewestates' ); ?>
                        </a>
                    </li>
                    <li class="props-hero__breadcrumb-item props-hero__breadcrumb-item--active" aria-current="page">
                        <?php esc_html_e( 'Properties', 'grewestates' ); ?>
                    </li>
                </ol>
            </nav>

            <h1 class="props-hero__heading">
                <?php esc_html_e( 'Explore Properties', 'grewestates' ); ?>
            </h1>
            <p class="props-hero__subtext">
                <?php esc_html_e( 'Browse verified listings tailored to your needs and preferences.', 'grewestates' ); ?>
            </p>

        </div>
    </section>


    <!-- ============================================================
         SECTION 2: QUICK SEARCH BAR
         4-field search row pinned below the hero.
         ============================================================ -->
    <div class="props-search-bar" role="search" aria-label="<?php esc_attr_e( 'Quick property search', 'grewestates' ); ?>">
        <div class="container">
            <div class="props-search-bar__inner">

                <div class="props-search-bar__field">
                    <label class="props-search-bar__label" for="qs-locale">
                        <?php esc_html_e( 'Select a Locale', 'grewestates' ); ?>
                    </label>
                    <div class="props-search-bar__input-wrap">
                        <i class="bi bi-geo-alt" aria-hidden="true"></i>
                        <input type="text"
                               id="qs-locale"
                               class="props-search-bar__input"
                               placeholder="<?php esc_attr_e( 'Search by city or region', 'grewestates' ); ?>"
                               aria-label="<?php esc_attr_e( 'Search by city or region', 'grewestates' ); ?>">
                    </div>
                </div>

                <div class="props-search-bar__divider" aria-hidden="true"></div>

                <div class="props-search-bar__field">
                    <label class="props-search-bar__label" for="qs-category">
                        <?php esc_html_e( 'Property Category', 'grewestates' ); ?>
                    </label>
                    <div class="props-search-bar__input-wrap">
                        <i class="bi bi-building" aria-hidden="true"></i>
                        <select id="qs-category"
                                class="props-search-bar__select"
                                aria-label="<?php esc_attr_e( 'Select property category', 'grewestates' ); ?>">
                            <option value="apartment"><?php esc_html_e( 'Apartment', 'grewestates' ); ?></option>
                            <option value="villa"><?php esc_html_e( 'Luxury Villa', 'grewestates' ); ?></option>
                            <option value="home"><?php esc_html_e( 'Family Home', 'grewestates' ); ?></option>
                            <option value="commercial"><?php esc_html_e( 'Commercial Space', 'grewestates' ); ?></option>
                            <option value="investment"><?php esc_html_e( 'Investment', 'grewestates' ); ?></option>
                            <option value="waterfront"><?php esc_html_e( 'Waterfront Property', 'grewestates' ); ?></option>
                        </select>
                    </div>
                </div>

                <div class="props-search-bar__divider" aria-hidden="true"></div>

                <div class="props-search-bar__field">
                    <label class="props-search-bar__label" for="qs-price">
                        <?php esc_html_e( 'Investment', 'grewestates' ); ?>
                    </label>
                    <div class="props-search-bar__input-wrap">
                        <i class="bi bi-currency-dollar" aria-hidden="true"></i>
                        <input type="text"
                               id="qs-price"
                               class="props-search-bar__input"
                               placeholder="<?php esc_attr_e( '$50,000 – $100,000', 'grewestates' ); ?>"
                               aria-label="<?php esc_attr_e( 'Price range', 'grewestates' ); ?>">
                    </div>
                </div>

                <div class="props-search-bar__divider" aria-hidden="true"></div>

                <div class="props-search-bar__field">
                    <label class="props-search-bar__label" for="qs-area">
                        <?php esc_html_e( 'Area (sq ft)', 'grewestates' ); ?>
                    </label>
                    <div class="props-search-bar__input-wrap">
                        <i class="bi bi-aspect-ratio" aria-hidden="true"></i>
                        <input type="text"
                               id="qs-area"
                               class="props-search-bar__input"
                               placeholder="<?php esc_attr_e( 'Square Footage', 'grewestates' ); ?>"
                               aria-label="<?php esc_attr_e( 'Area in square feet', 'grewestates' ); ?>">
                    </div>
                </div>

                <button type="button"
                        class="btn btn-primary props-search-bar__btn"
                        id="js-qs-search">
                    <i class="bi bi-search" aria-hidden="true"></i>
                    <?php esc_html_e( 'Search Now', 'grewestates' ); ?>
                </button>

            </div>
        </div>
    </div>


    <!-- ============================================================
         SECTION 3: SIDEBAR + RESULTS GRID
         Left: accordion filter panel. Right: 3-col property grid.
         ============================================================ -->
    <div class="props-body py-5">
        <div class="container">
            <div class="props-body__layout">

                <!-- ------------------------------------------------
                     FILTER SIDEBAR
                     ------------------------------------------------ -->
                <aside class="props-sidebar" aria-label="<?php esc_attr_e( 'Property filters', 'grewestates' ); ?>">

                    <div class="props-sidebar__header">
                        <span class="props-sidebar__title">
                            <?php esc_html_e( 'More Filters', 'grewestates' ); ?>
                        </span>
                        <button type="button"
                                class="props-sidebar__clear"
                                id="js-filter-clear"
                                aria-label="<?php esc_attr_e( 'Clear all filters', 'grewestates' ); ?>">
                            <?php esc_html_e( 'Clear All', 'grewestates' ); ?>
                        </button>
                    </div>

                    <!-- Neighborhood -->
                    <div class="props-filter-group">
                        <button class="props-filter-group__toggle"
                                type="button"
                                aria-expanded="true"
                                aria-controls="filter-neighborhood"
                                id="filter-neighborhood-btn">
                            <?php esc_html_e( 'Neighborhood', 'grewestates' ); ?>
                            <i class="bi bi-chevron-up" aria-hidden="true"></i>
                        </button>
                        <div class="props-filter-group__body" id="filter-neighborhood" role="region" aria-labelledby="filter-neighborhood-btn">
                            <div class="props-filter-group__input-wrap">
                                <i class="bi bi-geo-alt" aria-hidden="true"></i>
                                <input type="text"
                                       class="props-filter-group__text-input"
                                       id="filter-neighborhood-input"
                                       placeholder="<?php esc_attr_e( 'Enter neighborhood', 'grewestates' ); ?>"
                                       aria-label="<?php esc_attr_e( 'Filter by neighborhood', 'grewestates' ); ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Select Type -->
                    <div class="props-filter-group">
                        <button class="props-filter-group__toggle"
                                type="button"
                                aria-expanded="true"
                                aria-controls="filter-type"
                                id="filter-type-btn">
                            <?php esc_html_e( 'Select Type', 'grewestates' ); ?>
                            <i class="bi bi-chevron-up" aria-hidden="true"></i>
                        </button>
                        <div class="props-filter-group__body" id="filter-type" role="region" aria-labelledby="filter-type-btn">
                            <?php
                            $property_types = [
                                'townhouse' => __( 'Townhouse', 'grewestates' ),
                                'loft'      => __( 'Loft', 'grewestates' ),
                                'retail'    => __( 'Retail', 'grewestates' ),
                                'cottage'   => __( 'Cottage', 'grewestates' ),
                            ];
                            foreach ( $property_types as $value => $label ) : ?>
                                <label class="props-filter-group__checkbox-label">
                                    <input type="checkbox"
                                           class="props-filter-group__checkbox"
                                           value="<?php echo esc_attr( $value ); ?>"
                                           name="filter-type[]">
                                    <?php echo esc_html( $label ); ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Price Bracket -->
                    <div class="props-filter-group">
                        <button class="props-filter-group__toggle"
                                type="button"
                                aria-expanded="true"
                                aria-controls="filter-price"
                                id="filter-price-btn">
                            <?php esc_html_e( 'Price Bracket', 'grewestates' ); ?>
                            <i class="bi bi-chevron-up" aria-hidden="true"></i>
                        </button>
                        <div class="props-filter-group__body" id="filter-price" role="region" aria-labelledby="filter-price-btn">
                            <input type="range"
                                   class="props-filter-group__range"
                                   id="filter-price-range"
                                   min="10000"
                                   max="20000000"
                                   step="10000"
                                   value="5000000"
                                   aria-label="<?php esc_attr_e( 'Maximum price', 'grewestates' ); ?>">
                            <div class="props-filter-group__range-labels">
                                <span>$10K</span>
                                <span id="js-price-label">$5.0M</span>
                                <span>$20.0M</span>
                            </div>
                        </div>
                    </div>

                    <!-- Rooms -->
                    <div class="props-filter-group">
                        <button class="props-filter-group__toggle"
                                type="button"
                                aria-expanded="true"
                                aria-controls="filter-rooms"
                                id="filter-rooms-btn">
                            <?php esc_html_e( 'Rooms', 'grewestates' ); ?>
                            <i class="bi bi-chevron-up" aria-hidden="true"></i>
                        </button>
                        <div class="props-filter-group__body" id="filter-rooms" role="region" aria-labelledby="filter-rooms-btn">
                            <div class="props-filter-group__pills" role="group" aria-label="<?php esc_attr_e( 'Number of rooms', 'grewestates' ); ?>">
                                <?php foreach ( [ '1', '2', '3', '4+' ] as $val ) : ?>
                                    <button type="button"
                                            class="props-filter-group__pill"
                                            data-filter-group="rooms"
                                            data-value="<?php echo esc_attr( $val ); ?>"
                                            aria-pressed="false">
                                        <?php echo esc_html( $val ); ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Washrooms -->
                    <div class="props-filter-group">
                        <button class="props-filter-group__toggle"
                                type="button"
                                aria-expanded="true"
                                aria-controls="filter-washrooms"
                                id="filter-washrooms-btn">
                            <?php esc_html_e( 'Washrooms', 'grewestates' ); ?>
                            <i class="bi bi-chevron-up" aria-hidden="true"></i>
                        </button>
                        <div class="props-filter-group__body" id="filter-washrooms" role="region" aria-labelledby="filter-washrooms-btn">
                            <div class="props-filter-group__pills" role="group" aria-label="<?php esc_attr_e( 'Number of washrooms', 'grewestates' ); ?>">
                                <?php foreach ( [ '1', '2', '3+' ] as $val ) : ?>
                                    <button type="button"
                                            class="props-filter-group__pill"
                                            data-filter-group="washrooms"
                                            data-value="<?php echo esc_attr( $val ); ?>"
                                            aria-pressed="false">
                                        <?php echo esc_html( $val ); ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- Size (sq ft) — collapsible, closed by default -->
                    <div class="props-filter-group">
                        <button class="props-filter-group__toggle"
                                type="button"
                                aria-expanded="false"
                                aria-controls="filter-size"
                                id="filter-size-btn">
                            <?php esc_html_e( 'Size (sq ft)', 'grewestates' ); ?>
                            <i class="bi bi-chevron-down" aria-hidden="true"></i>
                        </button>
                        <div class="props-filter-group__body props-filter-group__body--collapsed" id="filter-size" role="region" aria-labelledby="filter-size-btn">
                            <div class="props-filter-group__input-wrap">
                                <i class="bi bi-aspect-ratio" aria-hidden="true"></i>
                                <input type="text"
                                       class="props-filter-group__text-input"
                                       id="filter-size-input"
                                       placeholder="<?php esc_attr_e( '500 – 5,000 sq ft', 'grewestates' ); ?>"
                                       aria-label="<?php esc_attr_e( 'Filter by size', 'grewestates' ); ?>">
                            </div>
                        </div>
                    </div>

                    <button type="button"
                            class="btn btn-primary w-100 props-sidebar__apply"
                            id="js-filter-apply">
                        <?php esc_html_e( 'Apply Filters', 'grewestates' ); ?>
                    </button>

                </aside>


                <!-- ------------------------------------------------
                     RESULTS GRID
                     ------------------------------------------------ -->
                <div class="props-results">

                    <!-- Results count + view toggle -->
                    <div class="props-results__toolbar">
                        <p class="props-results__count mb-0">
                            <?php
                            printf(
                                /* translators: %d = number of properties shown */
                                esc_html__( 'Showing %d properties', 'grewestates' ),
                                count( $properties )
                            );
                            ?>
                        </p>
                        <div class="props-results__view-toggle" role="group" aria-label="<?php esc_attr_e( 'View style', 'grewestates' ); ?>">
                            <button type="button"
                                    class="props-results__view-btn props-results__view-btn--active"
                                    id="js-view-grid"
                                    aria-pressed="true"
                                    aria-label="<?php esc_attr_e( 'Grid view', 'grewestates' ); ?>">
                                <i class="bi bi-grid-3x3-gap-fill" aria-hidden="true"></i>
                            </button>
                            <button type="button"
                                    class="props-results__view-btn"
                                    id="js-view-list"
                                    aria-pressed="false"
                                    aria-label="<?php esc_attr_e( 'List view', 'grewestates' ); ?>">
                                <i class="bi bi-list-ul" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Property cards grid -->
                    <div class="props-results__grid" id="js-props-grid">
                        <?php foreach ( $properties as $prop ) :
                            set_query_var( 'ge_property', $prop );
                            set_query_var( 'ge_property_variant', 'listing' );
                            get_template_part( 'template-parts/components/property-card' );
                        endforeach; ?>
                    </div>

                    <!-- Pagination -->
                    <nav class="props-pagination" aria-label="<?php esc_attr_e( 'Property listing pages', 'grewestates' ); ?>">
                        <ul class="props-pagination__list">
                            <li class="props-pagination__item">
                                <a href="#" class="props-pagination__link props-pagination__link--prev" aria-label="<?php esc_attr_e( 'Previous page', 'grewestates' ); ?>">
                                    <?php esc_html_e( 'Previous', 'grewestates' ); ?>
                                </a>
                            </li>
                            <li class="props-pagination__item">
                                <a href="#" class="props-pagination__link props-pagination__link--active" aria-current="page">1</a>
                            </li>
                            <li class="props-pagination__item">
                                <a href="#" class="props-pagination__link">2</a>
                            </li>
                            <li class="props-pagination__item">
                                <a href="#" class="props-pagination__link">3</a>
                            </li>
                            <li class="props-pagination__item props-pagination__item--ellipsis" aria-hidden="true">
                                <span class="props-pagination__ellipsis">&hellip;</span>
                            </li>
                            <li class="props-pagination__item">
                                <a href="#" class="props-pagination__link">10</a>
                            </li>
                            <li class="props-pagination__item">
                                <a href="#" class="props-pagination__link props-pagination__link--next" aria-label="<?php esc_attr_e( 'Next page', 'grewestates' ); ?>">
                                    <?php esc_html_e( 'Next', 'grewestates' ); ?>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div><!-- .props-results -->

            </div><!-- .props-body__layout -->
        </div><!-- .container -->
    </div><!-- .props-body -->


    <!-- ============================================================
         SECTION 4: NEWSLETTER STRIP
         Full-width dark band with email subscribe form.
         ============================================================ -->
    <?php get_template_part( 'template-parts/components/newsletter-strip' ); ?>

</main><!-- #main -->

<?php get_footer(); ?>