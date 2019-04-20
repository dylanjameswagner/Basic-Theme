<?php get_header(); ?>

<section class="content">
	<main class="primary">

		<?php if (have_posts()) : ?>
		<?php $plural = get_post_type_object(get_post_type())->label; ?>

			<article class="article">
				<header class="article__header">
					<h1 class="article__heading">
						<?php // get_the_title(get_option('page_for_posts')); ?>
						<?php
						// is_post_type_archive() || is_singular(get_post_types(array('_builtin'=>false)))) :
						if (is_archive()) :
							echo 'Archive of '.$plural;

								if (is_author()) : echo ' by Author';
							elseif (is_year())   : echo ' by Year';
							elseif (is_month())  : echo ' by Month';
							elseif (is_day())    : echo ' by Day';
							endif;
						else :
							echo $plural;
						endif;
						?>
					</h1>
				</header>

				<section class="article__articles">

					<?php while (have_posts()) : the_post(); ?>

						<article class="article">

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

				</section>

				<?php the_posts_pagination(); ?>
			</article>

		<?php else : ?>

			<article class="article article--none">
				<?php echo __('No Posts', 'custom'); ?>
			</article>

		<?php endif; ?>

		<?php get_sidebar(); ?>

	</main>
</section>

<?php get_footer();
