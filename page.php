<?php
/**
 * File: grewestates/page.php
 * Purpose: Default page template for WP pages that have no specific
 *          custom template assigned (i.e., not a template-*.php file).
 */

get_header();
?>

<main id="main" class="site-main py-5" role="main">
    <div class="container">

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="mb-4">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <span class="ge-divider"></span>
                </header>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages( [
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'grewestates' ),
                        'after'  => '</div>',
                    ] );
                    ?>
                </div>

            </article>

        <?php endwhile; ?>

    </div>
</main>

<?php get_footer(); ?>