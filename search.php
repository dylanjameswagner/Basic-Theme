<?php get_header(); ?>
<?php $s = isset($_GET['s']) ? $_GET['s'] : null; ?>

<section class="content">
	<main role="main" class="primary">

		<article role="article" class="article">
			<header class="article__header">
				<h1 class="article__heading">
					<?php echo $s ? sprintf('Search for &ldquo;%s&rdquo;', $s) : __('Search', 'basic-theme'); ?>
				</h1>
			</header>

			<section class="article__content">
				<?php get_search_form(); ?>
			</section>

			<?php if ($s && have_posts()) : ?>

				<section class="articles__articles">

					<?php while (have_posts()) : the_post(); ?>

						<article class="article">
							<header class="article__header">
								<h1 class="article__heading">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h1>
								<p class="article__url">
									<a href="<?php the_permalink(); ?>">
										<?php the_permalink(); ?>
									</a>
								</p>
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
					<?php echo $s ? __('No Search Results', 'basic-theme') : __('Provide some keywords to begin a search.', 'basic-theme'); ?>
				</p>
			</section>

		<?php endif; ?>

	</main>

	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>
