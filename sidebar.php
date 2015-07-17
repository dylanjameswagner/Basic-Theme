<?php $plural = get_post_type_object(get_post_type())->label; ?>
<?php // if (is_active_sidebar(strtolower($plural))) : ?>

            <section id="secondary"><div class="inner">
<?php if (!dynamic_sidebar(strtolower($plural))) : ?>

                <?php // default content ?>
                <?php get_search_form(); ?>

<?php endif; // !dynamic_sidebar ?>
            </div><!--.inner--></section><!--#secondary-->

<?php // endif; // is_active_sidebar ?>
