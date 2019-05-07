<?php get_header(); ?>

<section class="content">
	<main role="main" class="primary">

		<?php $singular = get_post_type_object(get_post_type())->labels->singular_name; ?>

		<article role="article" class="article <?php echo implode(' ', get_post_class()); ?>">

			<?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>

					<header class="article__header">
						<h1 class="article__heading">
							<?php the_title(); ?>
						</h1>
					</header>

					<section class="article__content">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
					</section>

					<?php edit_post_link(__('Edit', 'basic-theme'), '<p class="article__edit">', '</p>'); ?>

					<?php comments_template(); ?>

				<?php endwhile; ?>

			<?php endif; ?>

		</article>

	</main>

	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>
