<?php
/**
 * File: grewestates/footer.php
 * Purpose: Closes `.site-content`, renders the site footer, closes `.site`.
 * Called via get_footer() at the bottom of every page template.
 */
?>

    </div><!-- #content .site-content -->

    <?php get_template_part( 'template-parts/global/footer-content' ); ?>

</div><!-- #page .site -->

<?php wp_footer(); ?>
</body>
</html>