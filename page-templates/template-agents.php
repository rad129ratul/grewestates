<?php
/**
 * File: grewestates/page-templates/template-agents.php
 * Purpose: Find Agents page — dark hero, 3-column detailed agent grid with
 *          sort dropdown, testimonials, and CTA banner.
 * Template Name: Find Agents
 * Dependencies: header.php, footer.php,
 *               template-parts/components/agent-card-detailed.php,
 *               template-parts/components/section-header.php,
 *               template-parts/components/cta-banner.php
 */

get_header();

// ------------------------------------------------------------------
// DATA — Agent listings (static, hardcoded for now).
// ------------------------------------------------------------------
$agents = [
    [
        'id'             => 'james-turner',
        'name'           => 'James Turner',
        'title'          => 'Real Estate Agent',
        'rating'         => 4.7,
        'review_count'   => 98,
        'experience'     => '5+ years',
        'location'       => 'Miami, FL',
        'specialization' => [
            'Selling Waterfront Properties',
        ],
        'bio'            => 'Expert in negotiating waterfront property sales and committed to maximizing client value.',
        'languages'      => [ 'English', 'French' ],
        'badges'         => [ 'Highly Rated', 'Verified' ],
        'cta_view'       => __( 'View Profile', 'grewestates' ),
        'cta_contact'    => __( 'Contact Agent', 'grewestates' ),
        'image'          => get_template_directory_uri() . '/assets/images/agents/agent-james-turner.jpg',
        'link'           => home_url( '/find-agents/#james-turner' ),
    ],
    [
        'id'             => 'sophia-martinez',
        'name'           => 'Sophia Martinez',
        'title'          => 'Interior Designer',
        'rating'         => 4.9,
        'review_count'   => 150,
        'experience'     => '7+ years',
        'location'       => 'Los Angeles, CA',
        'specialization' => [
            'Residential Modern Aesthetics',
        ],
        'bio'            => 'Passionate about creating inviting spaces that reflect clients\' personalities and lifestyles.',
        'languages'      => [ 'English', 'Spanish' ],
        'badges'         => [ 'Top Rated', 'Verified' ],
        'cta_view'       => __( 'View Portfolio', 'grewestates' ),
        'cta_contact'    => __( 'Contact Designer', 'grewestates' ),
        'image'          => get_template_directory_uri() . '/assets/images/agents/agent-sophia-martinez.jpg',
        'link'           => home_url( '/find-agents/#sophia-martinez' ),
    ],
    [
        'id'             => 'liam-johnson',
        'name'           => 'Liam Johnson',
        'title'          => 'Mortgage Broker',
        'rating'         => 4.8,
        'review_count'   => 76,
        'experience'     => '6+ years',
        'location'       => 'Chicago, IL',
        'specialization' => [
            'Financing First-Time Buyers',
        ],
        'bio'            => 'Dedicated to finding the best mortgage solutions tailored to individual client\'s needs and financial goals.',
        'languages'      => [ 'English', 'Mandarin' ],
        'badges'         => [ 'Highly Rated', 'Verified' ],
        'cta_view'       => __( 'View Services', 'grewestates' ),
        'cta_contact'    => __( 'Contact Broker', 'grewestates' ),
        'image'          => get_template_directory_uri() . '/assets/images/agents/agent-liam-johnson.jpg',
        'link'           => home_url( '/find-agents/#liam-johnson' ),
    ],
    [
        'id'             => 'ethan-reed',
        'name'           => 'Ethan Reed',
        'title'          => 'Financial Consultant',
        'rating'         => 4.9,
        'review_count'   => 250,
        'experience'     => '8+ years',
        'location'       => 'Austin, TX',
        'specialization' => [
            'Debt Management',
            'Cash Flow Optimization',
        ],
        'bio'            => 'Expert in helping clients regain control of their finances and reduce debt effectively.',
        'languages'      => [ 'English' ],
        'badges'         => [ 'Verified' ],
        'cta_view'       => __( 'View Profile', 'grewestates' ),
        'cta_contact'    => __( 'Contact Agent', 'grewestates' ),
        'image'          => get_template_directory_uri() . '/assets/images/agents/agent-ethan-reed.jpg',
        'link'           => home_url( '/find-agents/#ethan-reed' ),
    ],
    [
        'id'             => 'sophia-turner',
        'name'           => 'Sophia Turner',
        'title'          => 'Investment Strategist',
        'rating'         => 4.6,
        'review_count'   => 180,
        'experience'     => '10+ years',
        'location'       => 'New York, NY',
        'specialization' => [
            'Portfolio Diversification',
            'Retirement Planning',
        ],
        'bio'            => 'Dedicated to creating customized investment strategies that align with clients\' financial goals.',
        'languages'      => [ 'English', 'Spanish' ],
        'badges'         => [ 'Verified' ],
        'cta_view'       => __( 'View Profile', 'grewestates' ),
        'cta_contact'    => __( 'Contact Agent', 'grewestates' ),
        'image'          => get_template_directory_uri() . '/assets/images/agents/agent-sophia-turner.jpg',
        'link'           => home_url( '/find-agents/#sophia-turner' ),
    ],
    [
        'id'             => 'olivia-smith',
        'name'           => 'Olivia Smith',
        'title'          => 'Retirement Advisor',
        'rating'         => 4.7,
        'review_count'   => 150,
        'experience'     => '12+ years',
        'location'       => 'Chicago, IL',
        'specialization' => [
            'Retirement Income Planning',
            'Social Security Strategies',
        ],
        'bio'            => 'Committed to ensuring clients enjoy a secure and fulfilling retirement with sound financial planning.',
        'languages'      => [ 'English', 'French' ],
        'badges'         => [ 'Verified' ],
        'cta_view'       => __( 'View Profile', 'grewestates' ),
        'cta_contact'    => __( 'Contact Agent', 'grewestates' ),
        'image'          => get_template_directory_uri() . '/assets/images/agents/agent-olivia-smith.jpg',
        'link'           => home_url( '/find-agents/#olivia-smith' ),
    ],
    [
        'id'             => 'james-thompson',
        'name'           => 'James Thompson',
        'title'          => 'Insurance Advisor',
        'rating'         => 4.4,
        'review_count'   => 160,
        'experience'     => '6+ years',
        'location'       => 'Miami, FL',
        'specialization' => [
            'Life Insurance',
            'Risk Management',
        ],
        'bio'            => 'Devoted to protecting clients\' assets and loved ones with tailored insurance solutions.',
        'languages'      => [ 'English', 'Portuguese' ],
        'badges'         => [ 'Verified' ],
        'cta_view'       => __( 'View Profile', 'grewestates' ),
        'cta_contact'    => __( 'Contact Agent', 'grewestates' ),
        'image'          => get_template_directory_uri() . '/assets/images/agents/agent-james-thompson.jpg',
        'link'           => home_url( '/find-agents/#james-thompson' ),
    ],
    [
        'id'             => 'ava-brown',
        'name'           => 'Ava Brown',
        'title'          => 'Financial Analyst',
        'rating'         => 4.8,
        'review_count'   => 300,
        'experience'     => '7+ years',
        'location'       => 'Los Angeles, CA',
        'specialization' => [
            'Market Research',
            'Investment Analysis',
        ],
        'bio'            => 'Focused on delivering actionable insights and data-driven strategies to enhance portfolio performance.',
        'languages'      => [ 'English', 'Japanese' ],
        'badges'         => [ 'Verified' ],
        'cta_view'       => __( 'View Profile', 'grewestates' ),
        'cta_contact'    => __( 'Contact Agent', 'grewestates' ),
        'image'          => get_template_directory_uri() . '/assets/images/agents/agent-ava-brown.jpg',
        'link'           => home_url( '/find-agents/#ava-brown' ),
    ],
    [
        'id'             => 'mason-lee',
        'name'           => 'Mason Lee',
        'title'          => 'Tax Advisor',
        'rating'         => 4.5,
        'review_count'   => 220,
        'experience'     => '5+ years',
        'location'       => 'Seattle, WA',
        'specialization' => [
            'Tax Planning',
            'IRS Representation',
        ],
        'bio'            => 'Skilled in navigating complex tax situations and helping clients maximize their returns.',
        'languages'      => [ 'English', 'Korean' ],
        'badges'         => [ 'Verified' ],
        'cta_view'       => __( 'View Profile', 'grewestates' ),
        'cta_contact'    => __( 'Contact Agent', 'grewestates' ),
        'image'          => get_template_directory_uri() . '/assets/images/agents/agent-mason-lee.jpg',
        'link'           => home_url( '/find-agents/#mason-lee' ),
    ],
];

// ------------------------------------------------------------------
// DATA — Testimonials.
// ------------------------------------------------------------------
$testimonials = [
    [
        'name'     => 'Michael Thompson',
        'role'     => 'Home Seller',
        'location' => 'Los Angeles, CA',
        'rating'   => 4,
        'quote'    => 'The service we received from GrewEstates was outstanding. Our agent was attentive, knowledgeable, and worked tirelessly to secure the best offer for our property!',
        'image'    => get_template_directory_uri() . '/assets/images/testimonials/testimonial-michael.jpg',
    ],
    [
        'name'     => 'Emily Chen',
        'role'     => 'Investor',
        'location' => 'Santa Monica, CA',
        'rating'   => 4,
        'quote'    => 'GrewEstates exceeded our expectations! They were always available to answer our questions and provided invaluable insights throughout the buying process!',
        'image'    => get_template_directory_uri() . '/assets/images/testimonials/testimonial-jennifer.jpg',
    ],
    [
        'name'     => 'David Miller',
        'role'     => 'First-time Buyer',
        'location' => 'Pasadena, CA',
        'rating'   => 4,
        'quote'    => 'I can\'t thank GrewEstates enough for their support. Our agent was friendly, experienced, and made the entire experience smooth and enjoyable!',
        'image'    => get_template_directory_uri() . '/assets/images/testimonials/testimonial-sarah.jpg',
    ],
];
?>

<main id="main" class="site-main" role="main">

    <!-- ============================================================
         SECTION 1: PAGE HERO
         Dark gradient; breadcrumb, large heading, subtext, CTA button.
         ============================================================ -->
    <section class="agents-hero" aria-labelledby="agents-hero-heading">
        <div class="container">

            <nav aria-label="<?php esc_attr_e( 'Breadcrumb', 'grewestates' ); ?>">
                <ol class="agents-hero__breadcrumb">
                    <li class="agents-hero__breadcrumb-item">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php esc_html_e( 'Home', 'grewestates' ); ?>
                        </a>
                    </li>
                    <li class="agents-hero__breadcrumb-item agents-hero__breadcrumb-item--active" aria-current="page">
                        <?php esc_html_e( 'Find Agents', 'grewestates' ); ?>
                    </li>
                </ol>
            </nav>

            <div class="agents-hero__content">
                <h1 id="agents-hero-heading" class="agents-hero__heading">
                    <?php esc_html_e( 'Find the Right Agent', 'grewestates' ); ?><br>
                    <?php esc_html_e( 'for Your Property Journey', 'grewestates' ); ?>
                </h1>
                <p class="agents-hero__subtext">
                    <?php esc_html_e( 'Connect with experienced real estate professionals who understand your needs and help you make confident decisions.', 'grewestates' ); ?>
                </p>
                <a href="#agents-grid"
                   class="btn agents-hero__btn"
                   aria-label="<?php esc_attr_e( 'Browse all agents', 'grewestates' ); ?>">
                    <?php esc_html_e( 'Browse Agents', 'grewestates' ); ?>
                </a>
            </div>

        </div>
    </section>


    <!-- ============================================================
         SECTION 2: AGENT GRID
         Toolbar (count + sort dropdown) + 3-column detailed agent cards.
         ============================================================ -->
    <section class="agents-grid-section py-5" id="agents-grid" aria-labelledby="agents-grid-heading">
        <div class="container">

            <!-- Section heading + toolbar -->
            <div class="agents-grid-section__header">
                <div>
                    <h2 id="agents-grid-heading" class="section-title mb-1">
                        <?php esc_html_e( 'Our Expert Agents', 'grewestates' ); ?>
                    </h2>
                    <span class="ge-divider"></span>
                    <p class="agents-grid-section__count">
                        <?php
                        printf(
                            /* translators: %d = number of agents */
                            esc_html__( 'Showing %d agents', 'grewestates' ),
                            count( $agents )
                        );
                        ?>
                    </p>
                </div>

                <!-- Sort dropdown — decoration only; sorting is server-side when CPT is integrated -->
                <div class="agents-grid-section__sort">
                    <label class="visually-hidden" for="agents-sort">
                        <?php esc_html_e( 'Sort agents by', 'grewestates' ); ?>
                    </label>
                    <select id="agents-sort"
                            class="agents-grid-section__sort-select"
                            aria-label="<?php esc_attr_e( 'Sort agents', 'grewestates' ); ?>">
                        <option value="popular"><?php esc_html_e( 'Most Popular', 'grewestates' ); ?></option>
                        <option value="rating"><?php esc_html_e( 'Highest Rated', 'grewestates' ); ?></option>
                        <option value="experience"><?php esc_html_e( 'Most Experienced', 'grewestates' ); ?></option>
                    </select>
                </div>
            </div>

            <!-- 3-column agent card grid -->
            <div class="agents-grid" role="list" aria-label="<?php esc_attr_e( 'Agent listings', 'grewestates' ); ?>">
                <?php foreach ( $agents as $agent ) :
                    set_query_var( 'ge_agent_detailed', $agent );
                    get_template_part( 'template-parts/components/agent-card-detailed' );
                endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ============================================================
         SECTION 3: TESTIMONIALS
         Light background; centred heading; 3-column testimonial cards.
         ============================================================ -->
    <section class="agents-testimonials py-5 bg-light-ge" aria-labelledby="agents-testimonials-heading">
        <div class="container">

            <?php
            set_query_var( 'ge_section_header', [
                'id'      => 'agents-testimonials-heading',
                'heading' => __( 'What Our Clients Say', 'grewestates' ),
                'subtext' => __( 'Real experiences from people who found their perfect agent', 'grewestates' ),
                'align'   => 'center',
            ] );
            get_template_part( 'template-parts/components/section-header' );
            ?>

            <div class="row g-4 mt-2">
                <?php foreach ( $testimonials as $testimonial ) : ?>
                    <div class="col-md-4">
                        <div class="agents-testimonials__card ge-card h-100 p-4">

                            <!-- Reviewer identity -->
                            <div class="agents-testimonials__reviewer">
                                <img src="<?php echo esc_url( $testimonial['image'] ); ?>"
                                     alt="<?php echo esc_attr( $testimonial['name'] ); ?>"
                                     class="agents-testimonials__avatar"
                                     width="52"
                                     height="52"
                                     loading="lazy">
                                <div>
                                    <strong class="agents-testimonials__name d-block">
                                        <?php echo esc_html( $testimonial['name'] ); ?>
                                    </strong>
                                    <span class="agents-testimonials__meta">
                                        <?php echo esc_html( $testimonial['role'] ); ?>
                                    </span>
                                    <span class="agents-testimonials__location">
                                        <?php echo esc_html( $testimonial['location'] ); ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Star rating -->
                            <div class="agents-testimonials__stars"
                                 aria-label="<?php echo esc_attr( sprintf( __( '%d out of 5 stars', 'grewestates' ), $testimonial['rating'] ) ); ?>">
                                <?php
                                for ( $i = 1; $i <= 5; $i++ ) :
                                    $class = $i <= $testimonial['rating'] ? 'bi-star-fill' : 'bi-star';
                                ?>
                                    <i class="bi <?php echo esc_attr( $class ); ?>" aria-hidden="true"></i>
                                <?php endfor; ?>
                            </div>

                            <!-- Quote -->
                            <blockquote class="agents-testimonials__quote">
                                &ldquo;<?php echo esc_html( $testimonial['quote'] ); ?>&rdquo;
                            </blockquote>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ============================================================
         SECTION 4: CTA BANNER
         "Need Help Choosing the Right Agent?" — Get Assistance + Contact Support.
         ============================================================ -->
    <?php
    set_query_var( 'ge_cta', [
        'heading'         => __( 'Need Help Choosing the Right Agent?', 'grewestates' ),
        'subtext'         => __( 'Our team is here to guide you. Get personalized recommendations based on your needs.', 'grewestates' ),
        'primary_label'   => __( 'Get Assistance', 'grewestates' ),
        'primary_url'     => home_url( '/contact/' ),
        'secondary_label' => __( 'Contact Support', 'grewestates' ),
        'secondary_url'   => get_theme_mod( 'ge_contact_page_url', home_url( '/contact/' ) ),
    ] );
    get_template_part( 'template-parts/components/cta-banner' );
    ?>

</main><!-- #main -->

<?php get_footer(); ?>