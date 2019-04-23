<?php get_header(); ?>

<section class="content">
	<main class="primary">

		<?php $singular = get_post_type_object(get_post_type())->labels->singular_name; ?>

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<article class="article <?php echo implode(' ', get_post_class()); ?>">
					<header class="article__header">
						<h1 class="article__heading">
							<?php the_title(); ?>
						</h1>
					</header>

					<section class="article__content">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
					</section>

					<?php edit_post_link(__('Edit', 'custom'), '<p class="article__edit">', '</p>'); ?>

					<?php comments_template(); ?>
				</article>

			<?php endwhile; ?>

		<?php endif; ?>

	</main>

	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>
