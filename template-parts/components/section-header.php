<?php
/**
 * File: grewestates/template-parts/components/section-header.php
 * Purpose: Reusable centred or left-aligned section heading block —
 *          heading, gold divider, optional subtext.
 *
 * Expected data via set_query_var( 'ge_section_header', $data ):
 *   id       string  HTML id for the <h2> (for aria-labelledby)
 *   heading  string  Section heading text
 *   subtext  string  Optional paragraph below heading
 *   align    string  'center' | 'left' (default: 'left')
 */

$header = get_query_var( 'ge_section_header', [] );

if ( empty( $header ) ) return;

$align       = isset( $header['align'] ) && 'center' === $header['align'] ? 'center' : 'left';
$text_class  = 'center' === $align ? 'text-center' : '';
$divider_mod = 'center' === $align ? 'ge-divider--center' : '';
$max_width   = 'center' === $align ? 'section-header__subtext--center' : '';
?>

<div class="section-header <?php echo esc_attr( $text_class ); ?> mb-2">
    <h2 id="<?php echo esc_attr( $header['id'] ); ?>" class="section-title">
        <?php echo esc_html( $header['heading'] ); ?>
    </h2>
    <span class="ge-divider <?php echo esc_attr( $divider_mod ); ?>"></span>

    <?php if ( ! empty( $header['subtext'] ) ) : ?>
        <p class="section-subtitle <?php echo esc_attr( $max_width ); ?>">
            <?php echo esc_html( $header['subtext'] ); ?>
        </p>
    <?php endif; ?>
</div>