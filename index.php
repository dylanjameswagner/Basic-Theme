<?php get_header(); ?>

<section class="content">
	<main role="main" class="primary">

		<?php $plural = get_post_type_object(get_post_type())->label; ?>

		<article role="article" class="article">
			<header class="article__header">
				<h1 class="article__heading">
					<?php
						if (is_author()) : echo sprintf('Archive of %s by Author', $plural);
					elseif (is_year())   : echo sprintf('Archive of %s by Year', $plural);
					elseif (is_month())  : echo sprintf('Archive of %s by Month', $plural);
					elseif (is_day())    : echo sprintf('Archive of %s by Day', $plural);
					else :
						echo $plural;
					endif;
					?>
				</h1>
			</header>

			<?php if (have_posts()) : ?>

				<section class="article__articles">

					<?php while (have_posts()) : the_post(); ?>

						<article class="article">
							<header class="article__header">
								<h1 class="article__heading">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h1>
							</header>

							<section class="article__excerpt">
								<?php the_excerpt(); ?>
							</section>

							<?php edit_post_link(__('Edit', 'basic-theme'), '<p class="article__edit">', '</p>'); ?>
						</article>

					<?php endwhile; ?>

				</section>

				<?php the_posts_pagination(); ?>
			</article>

		<?php else : ?>

			<section class="article__content">
				<p>
					<?php _e('No Posts', 'basic-theme'); ?>
				</p>
			</section>

		<?php endif; ?>

	</main>

	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>
