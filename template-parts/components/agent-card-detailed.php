<?php
/**
 * File: grewestates/template-parts/components/agent-card-detailed.php
 * Purpose: Rich agent card used on the Find Agents page (3-column grid).
 *          Distinct from agent-card.php (compact, 4-column, home/about variant).
 *
 * Expected data via set_query_var( 'ge_agent_detailed', $data ):
 *   id             string    URL-safe anchor identifier
 *   name           string    Full name
 *   title          string    Professional role / title
 *   rating         float     Numeric rating (e.g. 4.7)
 *   review_count   int       Number of reviews
 *   experience     string    e.g. '5+ years'
 *   location       string    e.g. 'Miami, FL'
 *   specialization array     List of specialization label strings
 *   bio            string    Short biography paragraph
 *   languages      array     List of language strings
 *   badges         array     Pill labels: 'Highly Rated' | 'Top Rated' | 'Verified'
 *   cta_view       string    Label for the outline (view) button
 *   cta_contact    string    Label for the filled (contact) button
 *   image          string    Absolute URL to agent photo
 *   link           string    URL to agent profile / anchor
 */

$agent = get_query_var( 'ge_agent_detailed', [] );

if ( empty( $agent ) ) return;

// Map badge labels to their modifier classes.
$badge_class_map = [
    'Highly Rated' => 'agent-card-detailed__badge--popular',
    'Top Rated'    => 'agent-card-detailed__badge--top',
    'Verified'     => 'agent-card-detailed__badge--verified',
];

// Render star icons: filled for rating integer part, empty for remainder.
$full_stars  = (int) floor( $agent['rating'] );
$empty_stars = 5 - $full_stars;

$contact_url = add_query_arg( 'agent', $agent['id'], home_url( '/contact/' ) );
?>

<div class="agent-card-detailed ge-card" id="<?php echo esc_attr( $agent['id'] ); ?>" role="listitem">

    <!-- Image + badge pills -->
    <div class="agent-card-detailed__image-wrap">
        <img src="<?php echo esc_url( $agent['image'] ); ?>"
             alt="<?php echo esc_attr( $agent['name'] ); ?>"
             class="agent-card-detailed__image"
             width="400"
             height="260"
             loading="lazy">

        <?php if ( ! empty( $agent['badges'] ) ) : ?>
            <div class="agent-card-detailed__badges" aria-label="<?php esc_attr_e( 'Agent badges', 'grewestates' ); ?>">
                <?php foreach ( $agent['badges'] as $badge ) :
                    $mod = $badge_class_map[ $badge ] ?? '';
                ?>
                    <span class="agent-card-detailed__badge <?php echo esc_attr( $mod ); ?>">
                        <?php if ( 'Verified' === $badge ) : ?>
                            <i class="bi bi-patch-check-fill" aria-hidden="true"></i>
                        <?php elseif ( 'Highly Rated' === $badge || 'Top Rated' === $badge ) : ?>
                            <i class="bi bi-stars" aria-hidden="true"></i>
                        <?php endif; ?>
                        <?php echo esc_html( $badge ); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Card body -->
    <div class="agent-card-detailed__body">

        <!-- Name + title -->
        <h3 class="agent-card-detailed__name"><?php echo esc_html( $agent['name'] ); ?></h3>
        <p class="agent-card-detailed__title"><?php echo esc_html( $agent['title'] ); ?></p>

        <!-- Rating row: stars, count, experience pill -->
        <div class="agent-card-detailed__meta">
            <div class="agent-card-detailed__rating"
                 aria-label="<?php echo esc_attr( sprintf( __( '%.1f out of 5 stars', 'grewestates' ), $agent['rating'] ) ); ?>">
                <?php for ( $i = 0; $i < $full_stars; $i++ ) : ?>
                    <i class="bi bi-star-fill" aria-hidden="true"></i>
                <?php endfor; ?>
                <?php for ( $i = 0; $i < $empty_stars; $i++ ) : ?>
                    <i class="bi bi-star" aria-hidden="true"></i>
                <?php endfor; ?>
                <span class="agent-card-detailed__rating-value"><?php echo esc_html( number_format( $agent['rating'], 1 ) ); ?></span>
                <span class="agent-card-detailed__review-count">
                    (<?php echo esc_html( number_format_i18n( $agent['review_count'] ) ); ?>
                    <?php esc_html_e( 'reviews', 'grewestates' ); ?>)
                </span>
            </div>
            <span class="agent-card-detailed__experience">
                <?php echo esc_html( $agent['experience'] ); ?>
            </span>
        </div>

        <!-- Location -->
        <p class="agent-card-detailed__location">
            <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
            <?php echo esc_html( $agent['location'] ); ?>
        </p>

        <!-- Specialization -->
        <div class="agent-card-detailed__spec">
            <span class="agent-card-detailed__spec-label">
                <?php esc_html_e( 'Specialization:', 'grewestates' ); ?>
            </span>
            <div class="agent-card-detailed__spec-tags">
                <?php foreach ( $agent['specialization'] as $spec ) : ?>
                    <span class="agent-card-detailed__spec-tag">
                        <?php echo esc_html( $spec ); ?>
                    </span>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Bio -->
        <p class="agent-card-detailed__bio"><?php echo esc_html( $agent['bio'] ); ?></p>

        <!-- Languages -->
        <p class="agent-card-detailed__languages">
            <span class="agent-card-detailed__languages-label">
                <?php esc_html_e( 'Languages:', 'grewestates' ); ?>
            </span>
            <?php echo esc_html( implode( ', ', $agent['languages'] ) ); ?>
        </p>

        <!-- CTA row -->
        <div class="agent-card-detailed__actions">
            <a href="<?php echo esc_url( $agent['link'] ); ?>"
               class="btn btn-outline-primary agent-card-detailed__btn">
                <?php echo esc_html( $agent['cta_view'] ); ?>
            </a>
            <a href="<?php echo esc_url( $contact_url ); ?>"
               class="btn btn-primary agent-card-detailed__btn">
                <?php echo esc_html( $agent['cta_contact'] ); ?>
            </a>
        </div>

    </div><!-- .agent-card-detailed__body -->

</div><!-- .agent-card-detailed -->