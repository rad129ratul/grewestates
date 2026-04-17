<?php
/**
 * File: grewestates/index.php
 * Purpose: WordPress fallback template. Renders the blog post loop.
 * Used when no more-specific template (page, single, 404, etc.) matches.
 */

get_header();
?>

<main id="main" class="site-main py-5" role="main">
    <div class="container">

        <?php if ( have_posts() ) : ?>

            <div class="row g-4">
                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="col-md-6 col-lg-4">
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'ge-card h-100' ); ?>>

                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                                    <?php the_post_thumbnail( 'ge-property-card', [
                                        'class' => 'img-fluid w-100',
                                        'alt'   => get_the_title(),
                                    ] ); ?>
                                </a>
                            <?php endif; ?>

                            <div class="p-4">
                                <h2 class="h5 mb-2">
                                    <a href="<?php the_permalink(); ?>" class="text-dark stretched-link text-decoration-none">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <p class="mb-0 small">
                                    <?php the_excerpt(); ?>
                                </p>
                            </div>

                        </article>
                    </div>

                <?php endwhile; ?>
            </div>

            <?php the_posts_navigation(); ?>

        <?php else : ?>

            <p class="text-center text-muted py-5">
                <?php esc_html_e( 'No posts found.', 'grewestates' ); ?>
            </p>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>