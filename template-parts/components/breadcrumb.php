<?php
/**
 * File: grewestates/template-parts/components/breadcrumb.php
 * Purpose: Reusable breadcrumb navigation bar — dark background strip.
 *          Renders a structured breadcrumb trail with schema.org markup.
 *
 * Expected data via set_query_var( 'ge_breadcrumb', $items ):
 *   Array of items, each with:
 *     label  string  Display text
 *     url    string  Link URL — empty string for the current (last) item
 *
 * Example:
 *   [
 *     [ 'label' => 'Home',       'url' => home_url('/') ],
 *     [ 'label' => 'Properties', 'url' => home_url('/properties/') ],
 *     [ 'label' => 'Modern Glass Villa in Downtown', 'url' => '' ],
 *   ]
 */

$items = get_query_var( 'ge_breadcrumb', [] );

if ( empty( $items ) ) return;

$last_index = count( $items ) - 1;
?>

<nav class="ge-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'grewestates' ); ?>">
    <div class="container">
        <ol class="ge-breadcrumb__list"
            itemscope
            itemtype="https://schema.org/BreadcrumbList">

            <?php foreach ( $items as $index => $item ) :
                $is_last    = ( $index === $last_index );
                $position   = $index + 1;
            ?>
                <li class="ge-breadcrumb__item <?php echo $is_last ? 'ge-breadcrumb__item--active' : ''; ?>"
                    itemprop="itemListElement"
                    itemscope
                    itemtype="https://schema.org/ListItem">

                    <?php if ( ! $is_last && $item['url'] ) : ?>
                        <a class="ge-breadcrumb__link"
                           href="<?php echo esc_url( $item['url'] ); ?>"
                           itemprop="item">
                            <span itemprop="name"><?php echo esc_html( $item['label'] ); ?></span>
                        </a>
                        <i class="bi bi-chevron-right ge-breadcrumb__sep" aria-hidden="true"></i>
                    <?php else : ?>
                        <span class="ge-breadcrumb__current"
                              itemprop="name"
                              aria-current="page">
                            <?php echo esc_html( $item['label'] ); ?>
                        </span>
                    <?php endif; ?>

                    <meta itemprop="position" content="<?php echo esc_attr( $position ); ?>">

                </li>
            <?php endforeach; ?>

        </ol>
    </div>
</nav>