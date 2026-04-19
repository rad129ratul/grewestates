<?php
/**
 * File: grewestates/page-templates/template-contact.php
 * Purpose: Contact Us page — hero with stats, contact form + sidebar,
 *          office locations grid, and FAQ CTA banner.
 * Template Name: Contact
 * Dependencies: header.php, footer.php,
 *               template-parts/components/section-header.php,
 *               template-parts/components/cta-banner.php
 */

get_header();

// ------------------------------------------------------------------
// DATA — Office locations.
// ------------------------------------------------------------------
$offices = [
    [
        'city'    => 'San Francisco',
        'address' => '5678 Market St, San Francisco, CA 94103',
        'phone'   => '+1 (415) 555-0123',
        'email'   => 'sf@grewestates.com',
        'hours'   => 'Mon – Fri: 9:00 AM – 7:00 PM, Sat: 10:00 AM – 6:00 PM',
        'map_url' => 'https://maps.google.com/?q=5678+Market+St+San+Francisco+CA+94103',
        'image'   => get_template_directory_uri() . '/assets/images/offices/office-sf.jpg',
    ],
    [
        'city'    => 'New York',
        'address' => '9101 Broadway, New York, NY 10010',
        'phone'   => '+1 (212) 555-0145',
        'email'   => 'ny@grewestates.com',
        'hours'   => 'Mon – Sun: 9:00 AM – 9:00 PM',
        'map_url' => 'https://maps.google.com/?q=9101+Broadway+New+York+NY+10010',
        'image'   => get_template_directory_uri() . '/assets/images/offices/office-ny.jpg',
    ],
    [
        'city'    => 'Chicago',
        'address' => '2345 Lincoln Ave, Chicago, IL 60614',
        'phone'   => '+1 (312) 555-0187',
        'email'   => 'chi@grewestates.com',
        'hours'   => 'Mon – Sat: 10:00 AM – 7:00 PM, Sun: Closed',
        'map_url' => 'https://maps.google.com/?q=2345+Lincoln+Ave+Chicago+IL+60614',
        'image'   => get_template_directory_uri() . '/assets/images/offices/office-chi.jpg',
    ],
];

// ------------------------------------------------------------------
// DATA — Hero stats strip.
// ------------------------------------------------------------------
$stats = [
    [
        'icon'  => 'bi-chat-dots',
        'value' => '24/7',
        'label' => 'Customer Support',
    ],
    [
        'icon'  => 'bi-lightning-charge',
        'value' => '<1hr',
        'label' => 'Response Time',
    ],
    [
        'icon'  => 'bi-geo-alt',
        'value' => '03',
        'label' => 'Office Locations',
    ],
    [
        'icon'  => 'bi-people',
        'value' => '850+',
        'label' => 'Happy Clients',
    ],
];

// ------------------------------------------------------------------
// DATA — Sidebar contact details.
// ------------------------------------------------------------------
$sidebar_contact = [
    [
        'icon'  => 'bi-envelope',
        'label' => 'Email',
        'value' => 'contact@grewestates.com',
        'href'  => 'mailto:contact@grewestates.com',
    ],
    [
        'icon'  => 'bi-telephone',
        'label' => 'Phone',
        'value' => '+1 (800) 555-0100',
        'href'  => 'tel:+18005550100',
    ],
    [
        'icon'  => 'bi-geo-alt',
        'label' => 'Address',
        'value' => '9200 Sunset Blvd, West Hollywood, CA 90069',
        'href'  => '',
    ],
    [
        'icon'  => 'bi-clock',
        'label' => 'Hours',
        'value' => 'Monday – Friday: 9:00 AM – 6:00 PM',
        'href'  => '',
    ],
];

$social_channels = [
    'facebook'  => [ 'setting' => 'ge_social_facebook',  'icon' => 'bi-facebook',  'label' => 'Facebook' ],
    'twitter'   => [ 'setting' => 'ge_social_twitter',   'icon' => 'bi-twitter-x', 'label' => 'Twitter / X' ],
    'instagram' => [ 'setting' => 'ge_social_instagram', 'icon' => 'bi-instagram', 'label' => 'Instagram' ],
    'linkedin'  => [ 'setting' => 'ge_social_linkedin',  'icon' => 'bi-linkedin',  'label' => 'LinkedIn' ],
];

$contact_url = get_theme_mod( 'ge_contact_page_url', home_url( '/contact/' ) );
?>

<main id="main" class="site-main" role="main">

    <!-- ============================================================
         SECTION 1: PAGE HERO
         Dark gradient background; left: breadcrumb, headline, subtext,
         contact items; right: 2×2 stat grid.
         ============================================================ -->
    <section class="contact-hero" aria-labelledby="contact-hero-heading">
        <div class="container">
            <div class="row g-5 align-items-center">

                <!-- LEFT: Intro panel -->
                <div class="col-lg-5">

                    <nav aria-label="<?php esc_attr_e( 'Breadcrumb', 'grewestates' ); ?>">
                        <ol class="contact-hero__breadcrumb">
                            <li class="contact-hero__breadcrumb-item">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <?php esc_html_e( 'Home', 'grewestates' ); ?>
                                </a>
                            </li>
                            <li class="contact-hero__breadcrumb-item contact-hero__breadcrumb-item--active" aria-current="page">
                                <?php esc_html_e( 'Contact Us', 'grewestates' ); ?>
                            </li>
                        </ol>
                    </nav>

                    <h1 id="contact-hero-heading" class="contact-hero__heading">
                        <?php esc_html_e( "Let's Start a", 'grewestates' ); ?><br>
                        <?php esc_html_e( 'Conversation', 'grewestates' ); ?>
                    </h1>
                    <p class="contact-hero__subtext">
                        <?php esc_html_e( "Whether you're buying, selling, or just have a question, our team is here to help you every step of the way.", 'grewestates' ); ?>
                    </p>

                    <!-- Quick contact items: Call / Email / Hours -->
                    <div class="contact-hero__quick-contacts">
                        <div class="contact-hero__quick-item">
                            <div class="contact-hero__quick-icon" aria-hidden="true">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div>
                                <span class="contact-hero__quick-label">
                                    <?php esc_html_e( 'Call Us', 'grewestates' ); ?>
                                </span>
                                <a href="tel:+18005550100" class="contact-hero__quick-value">
                                    <?php esc_html_e( '+1 (800) 555-0100', 'grewestates' ); ?>
                                </a>
                            </div>
                        </div>

                        <div class="contact-hero__quick-item">
                            <div class="contact-hero__quick-icon" aria-hidden="true">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div>
                                <span class="contact-hero__quick-label">
                                    <?php esc_html_e( 'Email Us', 'grewestates' ); ?>
                                </span>
                                <a href="mailto:contact@grewestates.com" class="contact-hero__quick-value">
                                    <?php esc_html_e( 'contact@grewestates.com', 'grewestates' ); ?>
                                </a>
                            </div>
                        </div>

                        <div class="contact-hero__quick-item">
                            <div class="contact-hero__quick-icon" aria-hidden="true">
                                <i class="bi bi-clock-fill"></i>
                            </div>
                            <div>
                                <span class="contact-hero__quick-label">
                                    <?php esc_html_e( 'Office Hours', 'grewestates' ); ?>
                                </span>
                                <span class="contact-hero__quick-value">
                                    <?php esc_html_e( 'Mon – Fri: 9:00 AM – 6:00 PM', 'grewestates' ); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                </div><!-- col -->

                <!-- RIGHT: 2×2 stat grid -->
                <div class="col-lg-7">
                    <div class="contact-hero__stats" role="list" aria-label="<?php esc_attr_e( 'Key statistics', 'grewestates' ); ?>">
                        <?php foreach ( $stats as $stat ) : ?>
                            <div class="contact-hero__stat" role="listitem">
                                <div class="contact-hero__stat-icon" aria-hidden="true">
                                    <i class="bi <?php echo esc_attr( $stat['icon'] ); ?>"></i>
                                </div>
                                <span class="contact-hero__stat-value"><?php echo esc_html( $stat['value'] ); ?></span>
                                <span class="contact-hero__stat-label"><?php echo esc_html( $stat['label'] ); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div><!-- col -->

            </div><!-- .row -->
        </div><!-- .container -->
    </section>


    <!-- ============================================================
         SECTION 2: CONTACT FORM + SIDEBAR
         Left: form card. Right: Get in Touch card + urgent help card.
         ============================================================ -->
    <div class="contact-body py-5">
        <div class="container">
            <div class="row g-4 align-items-start">

                <!-- LEFT: Form card -->
                <div class="col-lg-7">
                    <div class="contact-form-card">

                        <h2 class="contact-form-card__title">
                            <?php esc_html_e( 'Send Us a Message', 'grewestates' ); ?>
                        </h2>
                        <p class="contact-form-card__sub">
                            <?php esc_html_e( "Fill out the form below and we'll get back to you as soon as possible.", 'grewestates' ); ?>
                        </p>

                        <div id="js-contact-form" novalidate aria-label="<?php esc_attr_e( 'Contact form', 'grewestates' ); ?>">

                            <!-- Row 1: First Name + Last Name -->
                            <div class="row g-3 mb-3">
                                <div class="col-sm-6">
                                    <label for="contact-first-name" class="contact-form-card__label">
                                        <?php esc_html_e( 'First Name', 'grewestates' ); ?>
                                        <span class="contact-form-card__required" aria-hidden="true">*</span>
                                    </label>
                                    <input type="text"
                                           id="contact-first-name"
                                           name="first_name"
                                           class="contact-form-card__input"
                                           placeholder="<?php esc_attr_e( 'John', 'grewestates' ); ?>"
                                           autocomplete="given-name"
                                           required
                                           aria-required="true">
                                    <span class="contact-form-card__error" id="err-first-name" role="alert"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="contact-last-name" class="contact-form-card__label">
                                        <?php esc_html_e( 'Last Name', 'grewestates' ); ?>
                                        <span class="contact-form-card__required" aria-hidden="true">*</span>
                                    </label>
                                    <input type="text"
                                           id="contact-last-name"
                                           name="last_name"
                                           class="contact-form-card__input"
                                           placeholder="<?php esc_attr_e( 'Doe', 'grewestates' ); ?>"
                                           autocomplete="family-name"
                                           required
                                           aria-required="true">
                                    <span class="contact-form-card__error" id="err-last-name" role="alert"></span>
                                </div>
                            </div>

                            <!-- Row 2: Email + Phone -->
                            <div class="row g-3 mb-3">
                                <div class="col-sm-6">
                                    <label for="contact-email" class="contact-form-card__label">
                                        <?php esc_html_e( 'Email Address', 'grewestates' ); ?>
                                        <span class="contact-form-card__required" aria-hidden="true">*</span>
                                    </label>
                                    <input type="email"
                                           id="contact-email"
                                           name="email"
                                           class="contact-form-card__input"
                                           placeholder="<?php esc_attr_e( 'john@example.com', 'grewestates' ); ?>"
                                           autocomplete="email"
                                           required
                                           aria-required="true">
                                    <span class="contact-form-card__error" id="err-email" role="alert"></span>
                                </div>
                                <div class="col-sm-6">
                                    <label for="contact-phone" class="contact-form-card__label">
                                        <?php esc_html_e( 'Phone Number', 'grewestates' ); ?>
                                    </label>
                                    <input type="tel"
                                           id="contact-phone"
                                           name="phone"
                                           class="contact-form-card__input"
                                           placeholder="<?php esc_attr_e( '+1 (555) 000-0000', 'grewestates' ); ?>"
                                           autocomplete="tel">
                                </div>
                            </div>

                            <!-- Row 3: Subject -->
                            <div class="mb-3">
                                <label for="contact-subject" class="contact-form-card__label">
                                    <?php esc_html_e( 'Subject', 'grewestates' ); ?>
                                    <span class="contact-form-card__required" aria-hidden="true">*</span>
                                </label>
                                <input type="text"
                                       id="contact-subject"
                                       name="subject"
                                       class="contact-form-card__input"
                                       placeholder="<?php esc_attr_e( 'Get in Touch', 'grewestates' ); ?>"
                                       required
                                       aria-required="true">
                                <span class="contact-form-card__error" id="err-subject" role="alert"></span>
                            </div>

                            <!-- Row 4: Preferred Contact Method -->
                            <div class="mb-3">
                                <span class="contact-form-card__label d-block mb-2">
                                    <?php esc_html_e( 'Preferred Contact Method', 'grewestates' ); ?>
                                </span>
                                <div class="contact-form-card__radio-group" role="group" aria-label="<?php esc_attr_e( 'Preferred contact method', 'grewestates' ); ?>">
                                    <label class="contact-form-card__radio-label">
                                        <input type="radio"
                                               name="contact_method"
                                               value="email"
                                               class="contact-form-card__radio"
                                               checked>
                                        <?php esc_html_e( 'Email', 'grewestates' ); ?>
                                    </label>
                                    <label class="contact-form-card__radio-label">
                                        <input type="radio"
                                               name="contact_method"
                                               value="phone"
                                               class="contact-form-card__radio">
                                        <?php esc_html_e( 'Phone', 'grewestates' ); ?>
                                    </label>
                                </div>
                            </div>

                            <!-- Row 5: Message -->
                            <div class="mb-4">
                                <label for="contact-message" class="contact-form-card__label">
                                    <?php esc_html_e( 'Message', 'grewestates' ); ?>
                                    <span class="contact-form-card__required" aria-hidden="true">*</span>
                                </label>
                                <textarea id="contact-message"
                                          name="message"
                                          class="contact-form-card__textarea"
                                          rows="5"
                                          placeholder="<?php esc_attr_e( "Tell us more about what you're looking for...", 'grewestates' ); ?>"
                                          required
                                          aria-required="true"></textarea>
                                <span class="contact-form-card__error" id="err-message" role="alert"></span>
                            </div>

                            <!-- Submit -->
                            <button type="button"
                                    id="js-contact-submit"
                                    class="btn btn-primary w-100 contact-form-card__submit">
                                <i class="bi bi-send" aria-hidden="true"></i>
                                <?php esc_html_e( 'Send Message', 'grewestates' ); ?>
                            </button>

                            <!-- Success / error feedback -->
                            <div class="contact-form-card__feedback" id="js-contact-feedback" role="status" aria-live="polite"></div>

                        </div><!-- #js-contact-form -->

                    </div><!-- .contact-form-card -->
                </div><!-- col -->


                <!-- RIGHT: Sidebar -->
                <div class="col-lg-5">

                    <!-- Get in Touch info card -->
                    <div class="contact-sidebar-card mb-3">
                        <h2 class="contact-sidebar-card__title">
                            <?php esc_html_e( 'Get in Touch', 'grewestates' ); ?>
                        </h2>

                        <div class="contact-sidebar-card__items">
                            <?php foreach ( $sidebar_contact as $item ) : ?>
                                <div class="contact-sidebar-card__item">
                                    <div class="contact-sidebar-card__icon" aria-hidden="true">
                                        <i class="bi <?php echo esc_attr( $item['icon'] ); ?>"></i>
                                    </div>
                                    <div class="contact-sidebar-card__detail">
                                        <span class="contact-sidebar-card__label">
                                            <?php echo esc_html( $item['label'] ); ?>
                                        </span>
                                        <?php if ( $item['href'] ) : ?>
                                            <a href="<?php echo esc_url( $item['href'] ); ?>"
                                               class="contact-sidebar-card__value">
                                                <?php echo esc_html( $item['value'] ); ?>
                                            </a>
                                        <?php else : ?>
                                            <span class="contact-sidebar-card__value">
                                                <?php echo esc_html( $item['value'] ); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Follow Us -->
                        <div class="contact-sidebar-card__social">
                            <span class="contact-sidebar-card__social-label">
                                <?php esc_html_e( 'Follow Us', 'grewestates' ); ?>
                            </span>
                            <div class="contact-sidebar-card__social-icons">
                                <?php foreach ( $social_channels as $name => $data ) :
                                    // Twitter URL setting may not exist in customizer; fall back gracefully.
                                    $url = get_theme_mod( $data['setting'], '' );
                                    if ( ! $url && 'twitter' === $name ) {
                                        // Show icon anyway in the design — link to '#' so layout matches
                                        $url = '#';
                                    }
                                    if ( ! $url ) continue;
                                ?>
                                    <a href="<?php echo esc_url( $url ); ?>"
                                       class="contact-sidebar-card__social-link"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       aria-label="<?php echo esc_attr( $data['label'] ); ?>">
                                        <i class="bi <?php echo esc_attr( $data['icon'] ); ?>" aria-hidden="true"></i>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div><!-- .contact-sidebar-card -->

                    <!-- Need Urgent Help? gold card -->
                    <div class="contact-urgent-card">
                        <h3 class="contact-urgent-card__title">
                            <?php esc_html_e( 'Need Urgent Help?', 'grewestates' ); ?>
                        </h3>
                        <p class="contact-urgent-card__text">
                            <?php esc_html_e( 'Our emergency hotline is available 24/7 for urgent property matters.', 'grewestates' ); ?>
                        </p>
                        <a href="tel:+18005550100"
                           class="btn contact-urgent-card__btn w-100">
                            <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                            <?php esc_html_e( 'Call Emergency Line', 'grewestates' ); ?>
                        </a>
                    </div><!-- .contact-urgent-card -->

                </div><!-- col -->

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .contact-body -->


    <!-- ============================================================
         SECTION 3: OUR OFFICE LOCATIONS
         Light background; centred section header; 3-column office cards.
         ============================================================ -->
    <section class="contact-offices py-5 bg-light-ge" aria-labelledby="offices-heading">
        <div class="container">

            <?php
            set_query_var( 'ge_section_header', [
                'id'      => 'offices-heading',
                'heading' => __( 'Our Office Locations', 'grewestates' ),
                'subtext' => __( 'Visit us at any of our convenient locations. Walk-ins are welcome, or schedule an appointment.', 'grewestates' ),
                'align'   => 'center',
            ] );
            get_template_part( 'template-parts/components/section-header' );
            ?>

            <div class="row g-4 mt-2">
                <?php foreach ( $offices as $office ) : ?>
                    <div class="col-md-4">
                        <div class="contact-office-card ge-card h-100">

                            <!-- Office photo -->
                            <div class="contact-office-card__image-wrap">
                                <img src="<?php echo esc_url( $office['image'] ); ?>"
                                     alt="<?php echo esc_attr( $office['city'] ); ?> <?php esc_attr_e( 'office', 'grewestates' ); ?>"
                                     class="contact-office-card__image"
                                     loading="lazy"
                                     width="400"
                                     height="220">
                            </div>

                            <!-- Office details -->
                            <div class="contact-office-card__body">
                                <h3 class="contact-office-card__city">
                                    <?php echo esc_html( $office['city'] ); ?>
                                </h3>

                                <ul class="contact-office-card__details" aria-label="<?php echo esc_attr( $office['city'] ); ?> <?php esc_attr_e( 'office details', 'grewestates' ); ?>">
                                    <li class="contact-office-card__detail-item">
                                        <i class="bi bi-geo-alt" aria-hidden="true"></i>
                                        <span><?php echo esc_html( $office['address'] ); ?></span>
                                    </li>
                                    <li class="contact-office-card__detail-item">
                                        <i class="bi bi-telephone" aria-hidden="true"></i>
                                        <a href="tel:<?php echo esc_attr( preg_replace( '/[^+\d]/', '', $office['phone'] ) ); ?>">
                                            <?php echo esc_html( $office['phone'] ); ?>
                                        </a>
                                    </li>
                                    <li class="contact-office-card__detail-item">
                                        <i class="bi bi-envelope" aria-hidden="true"></i>
                                        <a href="mailto:<?php echo esc_attr( $office['email'] ); ?>">
                                            <?php echo esc_html( $office['email'] ); ?>
                                        </a>
                                    </li>
                                    <li class="contact-office-card__detail-item">
                                        <i class="bi bi-clock" aria-hidden="true"></i>
                                        <span><?php echo esc_html( $office['hours'] ); ?></span>
                                    </li>
                                </ul>

                                <a href="<?php echo esc_url( $office['map_url'] ); ?>"
                                   class="btn btn-primary w-100 contact-office-card__directions"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   aria-label="<?php echo esc_attr( sprintf( __( 'Get directions to %s office', 'grewestates' ), $office['city'] ) ); ?>">
                                    <?php esc_html_e( 'Get Directions', 'grewestates' ); ?>
                                </a>
                            </div>

                        </div><!-- .contact-office-card -->
                    </div><!-- col -->
                <?php endforeach; ?>
            </div><!-- .row -->

        </div><!-- .container -->
    </section>


    <!-- ============================================================
         SECTION 4: HAVE QUESTIONS? CTA BANNER
         Dark full-width band — View FAQ + Contact Agent buttons.
         ============================================================ -->
    <?php
    set_query_var( 'ge_cta', [
        'heading'         => __( 'Have Questions?', 'grewestates' ),
        'subtext'         => __( 'Check out our frequently asked questions or connect with our team for personalized assistance.', 'grewestates' ),
        'primary_label'   => __( 'View FAQ', 'grewestates' ),
        'primary_url'     => home_url( '/faq/' ),
        'secondary_label' => __( 'Contact Agent', 'grewestates' ),
        'secondary_url'   => home_url( '/find-agents/' ),
    ] );
    get_template_part( 'template-parts/components/cta-banner' );
    ?>

</main><!-- #main -->

<?php get_footer(); ?>