<?php get_header(); ?>

		<section id="content"><div class="inner contain">

			<main id="primary"><div class="inner">

<?php if (have_posts()) : ?>
<?php $plural = get_post_type_object(get_post_type())->label; ?>

				<article class="article">
					<header class="header">
						<h1 class="title">
							<?php echo is_post_type_archive() ? $plural : get_the_title(get_option('page_for_posts')); ?>
						</h1><!--.title-->
					</header><!--.header-->

					<?php // FIXME explore $query = new WP_Query('page_id={ID}}'); ?>

					<section class="articles -<?php echo strtolower($plural); ?>">

<?php while (have_posts()) : the_post(); ?>
<?php get_template_part('content',get_post_format()); // content-{format}.php defaults to content.php ?>
<?php endwhile; // have_posts ?>

					</section><!--.articles-->

					<?php
						the_posts_pagination(array(
							'screen_reader_text'	=> __('Posts Navigation','custom'),
							'prev_text'				=> __('Previous','custom').'<span class="screen-reader-text"> Page</span>',
							'next_text'				=> __('Next','custom').'<span class="screen-reader-text"> Page</span>',
							'before_page_number'	=> '<span class="screen-reader-text">'.__('Page','custom').' </span>',
						));
					?>
				</article><!--.article-->

<?php endif; // have_posts ?>

			</div><!--.inner--></main><!--#primary-->

<?php get_sidebar(); ?>

		</div><!--.inner--></section><!--#content-->

<?php get_footer(); ?>
