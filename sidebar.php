<?php $plural = get_post_type_object( get_post_type() )->label; ?>
<?php // if ( is_active_sidebar( strtolower( $plural ) ) ) : ?>

    <section class="secondary">

        <?php if ( ! dynamic_sidebar( strtolower( $plural ) ) ) : ?>

            <?php get_search_form(); ?>

        <?php endif; ?>
    </section>

<?php // endif; ?>
