<?php get_header(); ?>

		<section id="content"><div class="inner contain">

			<main id="primary"><div class="inner">

				<article class="article">
					<header class="header">
						<h1 class="title">
							<?php _e('Search','custom'); echo $_GET['s'] ? ' for &ldquo;'.$_GET['s'].'&rdquo;' : NULL; ?>
						</h1>
					</header><!--.header-->

					<section class="content">
						<?php get_search_form(); ?>
					</section><!--.content-->

<?php if (have_posts()) : ?>

					<section class="articles -results">

<?php while (have_posts()) : the_post(); ?>
<?php // get_template_part('content','search'); // content-search.php defaults to content.php ?>
<?php // bof content-search.php ?>
						<article id="post-<?php the_ID(); ?>" class="article -post -search<?php // echo implode(' ',get_post_class()); ?>">
							<header class="header">
								<h1 class="title">
									<span class="label"><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?>:</span>
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h1><!--.title-->
							</header><!--.header-->

							<section class="content -excerpt">
								<?php the_excerpt(); ?>
								<?php edit_post_link(__('Edit','custom').' '.get_post_type_object(get_post_type())->labels->singular_name,'<p class="edit -'.get_post_type().'">','</p>'); ?>
							</section><!--.content-->
						</article><!--.article-->
<?php // eof content-search.php ?>
<?php endwhile; // have_posts ?>

					</section><!--.articles-->

					<?php
						the_posts_pagination(array(
							'screen_reader_text'	=> __('Posts Navigation','custom'),
							'prev_text'          	=> __('Previous','custom'),
							'next_text'          	=> __('Next','custom'),
							'before_page_number'	=> '<span class="screen-reader-text">'.__('Page','custom').' </span>',
						));
					?>

<?php endif; // have_posts ?>

				</article><!--.article-->

			</div><!--.inner--></main><!--#primary-->

<?php // get_sidebar(); ?>

		</div><!--.inner--></section><!--#content-->

<?php get_footer(); ?>
