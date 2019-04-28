<?php $plural = get_post_type_object(get_post_type())->label; ?>
<?php // if (is_active_sidebar(strtolower($plural))) : ?>

	<section role="complimentary" class="secondary">
		<?php if (!dynamic_sidebar(strtolower($plural))) : ?>
			<?php // default content ?>
			<?php get_search_form(); ?>
		<?php endif; // !dynamic_sidebar ?>
	</section>

<?php // endif; // is_active_sidebar ?>
