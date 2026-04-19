<?php
/**
 * File: grewestates/page-templates/template-about.php
 * Purpose: About Us page — hero, story, mission/vision, stats,
 *          why choose us, leadership team, CTA banner, testimonials.
 * Template Name: About
 * Dependencies: header.php, footer.php,
 *               template-parts/components/section-header.php,
 *               template-parts/components/cta-banner.php
 */

get_header();

// ------------------------------------------------------------------
// DATA — Leadership team members.
// ------------------------------------------------------------------
$team = [
    [
        'name'  => 'James Turner',
        'role'  => 'Chief Technology Officer',
        'bio'   => 'A tech visionary, James spearheads our innovative solutions in property management.',
        'image' => get_template_directory_uri() . '/assets/images/team/team-james.jpg',
    ],
    [
        'name'  => 'Emily Rodriguez',
        'role'  => 'Head of Marketing',
        'bio'   => 'With a flair for storytelling, Emily crafts compelling narratives that engage our audience.',
        'image' => get_template_directory_uri() . '/assets/images/team/team-emily.jpg',
    ],
    [
        'name'  => 'Michael Smith',
        'role'  => 'Operations Manager',
        'bio'   => 'Michael ensures seamless operations, optimizing our processes for maximum efficiency.',
        'image' => get_template_directory_uri() . '/assets/images/team/team-michael.jpg',
    ],
    [
        'name'  => 'Aisha Patel',
        'role'  => 'Customer Success Lead',
        'bio'   => 'Aisha is passionate about elevating customer experiences and fostering long-term relationships.',
        'image' => get_template_directory_uri() . '/assets/images/team/team-aisha.jpg',
    ],
];

// ------------------------------------------------------------------
// DATA — Why choose us features (4 bordered cards).
// ------------------------------------------------------------------
$why_features = [
    [
        'icon'  => 'bi-patch-check',
        'title' => 'Verified Listings',
        'desc'  => 'Every property is thoroughly vetted to ensure accuracy and quality.',
    ],
    [
        'icon'  => 'bi-people',
        'title' => 'Expert Agents',
        'desc'  => 'Our experienced team provides personalized guidance throughout your journey.',
    ],
    [
        'icon'  => 'bi-shield-check',
        'title' => 'Transparent Process',
        'desc'  => 'Clear communication and honest advice at every step of the way.',
    ],
    [
        'icon'  => 'bi-heart',
        'title' => 'Customer-Centric Approach',
        'desc'  => 'Your satisfaction is our priority, with support available whenever you need it.',
    ],
];

// ------------------------------------------------------------------
// DATA — Impact stats.
// ------------------------------------------------------------------
$stats = [
    [ 'value' => '1200+', 'label' => 'Properties Listed' ],
    [ 'value' => '850+',  'label' => 'Happy Clients' ],
    [ 'value' => '15+',   'label' => 'Years Experience' ],
    [ 'value' => '98%',   'label' => 'Client Satisfaction' ],
];

// ------------------------------------------------------------------
// DATA — Client testimonials.
// ------------------------------------------------------------------
$testimonials = [
    [
        'name'     => 'Jennifer & Mark Wilson',
        'role'     => 'Homeowners',
        'location' => 'Beverly Hills, CA',
        'rating'   => 5,
        'quote'    => 'GrewEstates helped us find our dream home with complete confidence and ease. Their team was professional, knowledgeable, and always available.',
        'image'    => get_template_directory_uri() . '/assets/images/testimonials/testimonial-jennifer.jpg',
    ],
    [
        'name'     => 'Robert Chen',
        'role'     => 'Property Investor',
        'location' => 'Santa Monica, CA',
        'rating'   => 5,
        'quote'    => 'The entire process was smooth and transparent. We felt supported every step of the way, from viewing to closing.',
        'image'    => get_template_directory_uri() . '/assets/images/testimonials/testimonial-michael.jpg',
    ],
    [
        'name'     => 'Amanda Foster',
        'role'     => 'First-time Buyer',
        'location' => 'Malibu, CA',
        'rating'   => 5,
        'quote'    => 'Outstanding service and attention to detail. GrewEstates truly understands what modern homebuyers need.',
        'image'    => get_template_directory_uri() . '/assets/images/testimonials/testimonial-sarah.jpg',
    ],
];
?>

<main id="main" class="site-main" role="main">

    <!-- ============================================================
         SECTION 1: PAGE HERO
         Light background; breadcrumb + heading + subtext.
         No full-bleed image — the story image follows in Section 2.
         ============================================================ -->
    <section class="about-hero" aria-labelledby="about-hero-heading">
        <div class="container">

            <nav aria-label="<?php esc_attr_e( 'Breadcrumb', 'grewestates' ); ?>">
                <ol class="about-hero__breadcrumb">
                    <li class="about-hero__breadcrumb-item">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php esc_html_e( 'Home', 'grewestates' ); ?>
                        </a>
                    </li>
                    <li class="about-hero__breadcrumb-item about-hero__breadcrumb-item--active" aria-current="page">
                        <?php esc_html_e( 'About Us', 'grewestates' ); ?>
                    </li>
                </ol>
            </nav>

            <div class="about-hero__content">
                <h1 id="about-hero-heading" class="about-hero__heading">
                    <?php esc_html_e( 'Redefining Real Estate', 'grewestates' ); ?><br>
                    <?php esc_html_e( 'for Modern Living', 'grewestates' ); ?>
                </h1>
                <p class="about-hero__subtext">
                    <?php esc_html_e( 'At GrewEstates, we combine technology, expertise, and human insight to help you discover the right property with confidence.', 'grewestates' ); ?>
                </p>
            </div>

        </div>
    </section>


    <!-- ============================================================
         SECTION 2: OUR STORY
         Two-column: left = photo with stat overlay card,
         right = heading + three paragraphs.
         ============================================================ -->
    <section class="about-story py-5" aria-labelledby="about-story-heading">
        <div class="container">
            <div class="row g-5 align-items-center">

                <!-- LEFT: Photo + floating experience badge -->
                <div class="col-lg-5">
                    <div class="about-story__image-wrap">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/about/about-story.jpg' ); ?>"
                             alt="<?php esc_attr_e( 'GrewEstates team collaborating on real estate solutions', 'grewestates' ); ?>"
                             class="about-story__image"
                             width="560"
                             height="480"
                             loading="lazy">

                        <!-- Floating stat badge -->
                        <div class="about-story__badge" aria-label="<?php esc_attr_e( '15+ Years Experience', 'grewestates' ); ?>">
                            <span class="about-story__badge-value">15+</span>
                            <span class="about-story__badge-label"><?php esc_html_e( 'Years Experience', 'grewestates' ); ?></span>
                        </div>
                    </div>
                </div>

                <!-- RIGHT: Story copy -->
                <div class="col-lg-7">
                    <h2 id="about-story-heading" class="about-story__heading">
                        <?php esc_html_e( 'Our Story', 'grewestates' ); ?>
                    </h2>
                    <span class="ge-divider"></span>

                    <p><?php esc_html_e( 'GrewEstates was founded with a vision to simplify the real estate experience. We saw how complex and overwhelming property searching could be, and set out to create a platform that brings clarity, trust, and efficiency to every step of the journey.', 'grewestates' ); ?></p>

                    <p><?php esc_html_e( 'What started as a small team of passionate real estate professionals has grown into a trusted platform serving hundreds of clients. We\'ve built our reputation on transparency, expertise, and genuine care for our clients\' needs.', 'grewestates' ); ?></p>

                    <p class="mb-0"><?php esc_html_e( 'Today, we continue to innovate, combining cutting-edge technology with personal service to make property discovery an enjoyable and rewarding experience.', 'grewestates' ); ?></p>
                </div>

            </div>
        </div>
    </section>


    <!-- ============================================================
         SECTION 3: MISSION & VISION
         Two equal cards, side by side. Light warm background.
         ============================================================ -->
    <section class="about-mv py-5 bg-light-ge" aria-label="<?php esc_attr_e( 'Our Mission and Vision', 'grewestates' ); ?>">
        <div class="container">
            <div class="row g-4">

                <!-- Mission -->
                <div class="col-md-6">
                    <div class="about-mv__card">
                        <div class="about-mv__icon-wrap" aria-hidden="true">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <h2 class="about-mv__title">
                            <?php esc_html_e( 'Our Mission', 'grewestates' ); ?>
                        </h2>
                        <p class="about-mv__text mb-0">
                            <?php esc_html_e( 'To make property discovery simple, transparent, and accessible for everyone. We believe finding the right home should be an exciting journey, not a stressful ordeal.', 'grewestates' ); ?>
                        </p>
                    </div>
                </div>

                <!-- Vision -->
                <div class="col-md-6">
                    <div class="about-mv__card">
                        <div class="about-mv__icon-wrap" aria-hidden="true">
                            <i class="bi bi-eye"></i>
                        </div>
                        <h2 class="about-mv__title">
                            <?php esc_html_e( 'Our Vision', 'grewestates' ); ?>
                        </h2>
                        <p class="about-mv__text mb-0">
                            <?php esc_html_e( 'To become a trusted global platform for modern real estate experiences, setting new standards for innovation, service excellence, and client satisfaction.', 'grewestates' ); ?>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ============================================================
         SECTION 4: IMPACT IN NUMBERS
         Full-width dark band with 4 gold stat counters.
         ============================================================ -->
    <section class="about-stats" aria-label="<?php esc_attr_e( 'Our Impact in Numbers', 'grewestates' ); ?>">
        <div class="container">

            <h2 class="about-stats__heading">
                <?php esc_html_e( 'Our Impact in Numbers', 'grewestates' ); ?>
            </h2>

            <div class="about-stats__grid">
                <?php foreach ( $stats as $stat ) : ?>
                    <div class="about-stats__item">
                        <span class="about-stats__value"><?php echo esc_html( $stat['value'] ); ?></span>
                        <span class="about-stats__label"><?php echo esc_html( $stat['label'] ); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ============================================================
         SECTION 5: WHY CHOOSE GREWESTATES
         4-column bordered feature cards — white background.
         ============================================================ -->
    <section class="about-why py-5" aria-labelledby="about-why-heading">
        <div class="container">

            <?php
            set_query_var( 'ge_section_header', [
                'id'      => 'about-why-heading',
                'heading' => __( 'Why Choose GrewEstates', 'grewestates' ),
                'subtext' => __( 'We\'re committed to providing exceptional service and creating lasting relationships with our clients.', 'grewestates' ),
                'align'   => 'center',
            ] );
            get_template_part( 'template-parts/components/section-header' );
            ?>

            <div class="row g-4 mt-2">
                <?php foreach ( $why_features as $feature ) : ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="about-why__card">
                            <div class="about-why__icon-wrap" aria-hidden="true">
                                <i class="bi <?php echo esc_attr( $feature['icon'] ); ?>"></i>
                            </div>
                            <h3 class="about-why__title"><?php echo esc_html( $feature['title'] ); ?></h3>
                            <p class="about-why__desc mb-0"><?php echo esc_html( $feature['desc'] ); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ============================================================
         SECTION 6: MEET OUR LEADERSHIP TEAM
         4-column team member cards: photo, name, role, bio.
         ============================================================ -->
    <section class="about-team py-5 bg-light-ge" aria-labelledby="about-team-heading">
        <div class="container">

            <?php
            set_query_var( 'ge_section_header', [
                'id'      => 'about-team-heading',
                'heading' => __( 'Meet Our Leadership Team', 'grewestates' ),
                'subtext' => __( 'Passionate professionals dedicated to transforming your real estate experience.', 'grewestates' ),
                'align'   => 'center',
            ] );
            get_template_part( 'template-parts/components/section-header' );
            ?>

            <div class="row g-4 mt-2">
                <?php foreach ( $team as $member ) : ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="about-team__card ge-card">
                            <div class="about-team__image-wrap">
                                <img src="<?php echo esc_url( $member['image'] ); ?>"
                                     alt="<?php echo esc_attr( $member['name'] ); ?>"
                                     class="about-team__image"
                                     width="320"
                                     height="300"
                                     loading="lazy">
                            </div>
                            <div class="about-team__body">
                                <h3 class="about-team__name"><?php echo esc_html( $member['name'] ); ?></h3>
                                <p class="about-team__role"><?php echo esc_html( $member['role'] ); ?></p>
                                <p class="about-team__bio mb-0"><?php echo esc_html( $member['bio'] ); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ============================================================
         SECTION 7: CTA BANNER
         "Start Your Property Journey with Us" — Explore Properties + Contact Us.
         ============================================================ -->
    <?php
    set_query_var( 'ge_cta', [
        'heading'        => __( 'Start Your Property Journey with Us', 'grewestates' ),
        'subtext'        => __( 'Explore properties, connect with our experts, and find the perfect place to call home.', 'grewestates' ),
        'primary_label'  => __( 'Explore Properties', 'grewestates' ),
        'primary_url'    => home_url( '/properties/' ),
        'secondary_label' => __( 'Contact Us', 'grewestates' ),
        'secondary_url'   => get_theme_mod( 'ge_contact_page_url', home_url( '/contact/' ) ),
    ] );
    get_template_part( 'template-parts/components/cta-banner' );
    ?>


    <!-- ============================================================
         SECTION 8: CLIENT SUCCESS STORIES
         3-column testimonial cards — white background.
         ============================================================ -->
    <section class="about-testimonials py-5" aria-labelledby="about-testimonials-heading">
        <div class="container">

            <?php
            set_query_var( 'ge_section_header', [
                'id'      => 'about-testimonials-heading',
                'heading' => __( 'Client Success Stories', 'grewestates' ),
                'subtext' => __( 'Hear from clients who found their perfect properties with GrewEstates.', 'grewestates' ),
                'align'   => 'center',
            ] );
            get_template_part( 'template-parts/components/section-header' );
            ?>

            <div class="row g-4 mt-2">
                <?php foreach ( $testimonials as $testimonial ) : ?>
                    <div class="col-md-4">
                        <div class="about-testimonials__card ge-card h-100 p-4">

                            <!-- Reviewer identity -->
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <img src="<?php echo esc_url( $testimonial['image'] ); ?>"
                                     alt="<?php echo esc_attr( $testimonial['name'] ); ?>"
                                     class="about-testimonials__avatar"
                                     width="52"
                                     height="52"
                                     loading="lazy">
                                <div>
                                    <strong class="about-testimonials__name d-block">
                                        <?php echo esc_html( $testimonial['name'] ); ?>
                                    </strong>
                                    <span class="about-testimonials__meta">
                                        <?php echo esc_html( $testimonial['role'] ); ?> &middot;
                                        <?php echo esc_html( $testimonial['location'] ); ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Star rating -->
                            <div class="about-testimonials__stars mb-3"
                                 aria-label="<?php echo esc_attr( sprintf( __( '%d out of 5 stars', 'grewestates' ), $testimonial['rating'] ) ); ?>">
                                <?php for ( $i = 0; $i < $testimonial['rating']; $i++ ) : ?>
                                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                                <?php endfor; ?>
                            </div>

                            <!-- Quote -->
                            <p class="about-testimonials__quote mb-0">
                                &ldquo;<?php echo esc_html( $testimonial['quote'] ); ?>&rdquo;
                            </p>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

</main><!-- #main -->

<?php get_footer(); ?>