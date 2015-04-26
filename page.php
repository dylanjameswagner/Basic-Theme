<?php get_header(); ?>

		<section id="content"><div class="inner contain">

			<main id="primary"><div class="inner">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php // get_template_part('content','page'); // content-page.php defaults to content.php ?>
<?php // bof content-page.php ?>
<?php $singular = get_post_type_object(get_post_type())->labels->singular_name; ?>

				<article id="post-<?php the_ID(); ?>" class="<?php echo implode(' ',get_post_class()); ?>">
					<header class="header">
						<h1 class="title">
							<?php the_title(); ?>
						</h1><!--.title-->
					</header><!--.header-->

					<section class="content">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
						<?php edit_post_link(__('Edit','custom').' '.$singular,'<p class="edit -'.get_post_type().'">','</p>'); ?>
					</section><!--.content-->

					<?php comments_template(); ?>
				</article><!--.article-->
<?php // eof content-page.php ?>

<?php endwhile; // have_posts ?>
<?php endif; // have_posts ?>

			</div><!--.inner--></main><!--#primary-->

<?php get_sidebar(); ?>

		</div><!--.inner--></section><!--#content-->

<?php get_footer(); ?>
