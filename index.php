<?php get_header(); ?>

		<section id="content"><div class="inner contain">

			<main id="primary"><div class="inner">

				<article class="article">
					<header class="header">
						<h1 class="title">
							<?php echo is_post_type_archive() ? get_post_type_object(get_post_type())->label : get_the_title(get_option('page_for_posts')); ?>
						</h1>
					</header><!--.header-->

<?php if (have_posts()) : ?>

					<section class="articles -<?php echo strtolower(get_post_type_object(get_post_type())->label); ?>">

<?php while (have_posts()) : the_post(); ?>
<?php get_template_part('content',get_post_format()); // content-[format].php defaults to content.php ?>
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

<?php get_sidebar(); ?>

		</div><!--.inner--></section><!--#content-->

<?php get_footer(); ?>
