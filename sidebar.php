<?php // if (is_active_sidebar(strtolower(get_post_type_object(get_post_type())->label))) : ?>

			<section id="secondary"><div class="inner">

				<?php get_search_form(); ?>

<?php if (!dynamic_sidebar(strtolower(get_post_type_object(get_post_type())->label))) : ?>

				<?php // default sidebar ?>

<?php endif; // !dynamic_sidebar ?>

			</div><!--.inner--></section><!--#secondary-->

<?php // endif; // is_active_sidebar ?>