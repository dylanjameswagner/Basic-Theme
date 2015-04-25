<?php $singular = get_post_type_object(get_post_type())->labels->singular_name; ?>

					<article id="post-<?php the_ID(); ?>" class="article <?php echo implode(' ',get_post_class()); ?>">

						<header class="header">
							<h1 class="title">
								<?php if (!is_single()) : ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php else : ?><?php the_title(); ?><?php endif; ?>
							</h1><!--.title-->
							<p class="published">
								<span class="label">Published</span>
								<span class="author"><span class="label">by</span> <?php the_author_posts_link(); ?></span>
								<span class="date"><span class="label">on</span> <?php echo get_the_date(); ?></span>
								<span class="time"><span class="label">@</span> <?php echo get_the_time(); ?></span>
							</p><!--.published-->
						</header><!--.header-->

						<section class="content">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
							<?php edit_post_link(__('Edit','custom').' '.$singular,'<p class="edit -'.get_post_type().'">','</p>'); ?>
						</section><!--.content-->

<?php if (is_single()) : ?>
						<footer class="footer">
							<?php
								$have_cats = count(get_categories(array(
									'fields'     => 'ids',
									'hide_empty' => 1,
									'number'     => 2,
								)));

								$categories_list = get_the_category_list(_x(', ','comma space, used between list items','custom'));
								if ($categories_list && $have_cats){
									printf('<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',_x('Categories:','title colon, used before category list','custom'),$categories_list);
								}

								$tags_list = get_the_tag_list('',_x(', ','comma space, used between list items','custom'));
								if ($tags_list){
									printf('<p class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</p>',_x('Tags: ','title colon, used before tag list','custom'),$tags_list);
								}
							?>
						</footer><!--.footer-->
<?php endif; // is_single ?>

<?php if (is_single() && get_the_author_meta('description')) : ?>
						<section class="author">

							<h2 class="label"><?php _e('About the Author','custom'); ?></h2>
							<h2 class="name"><?php the_author_meta('display_name'); ?></h2>
							<div class="description">
								<?php the_author_meta('description'); ?>
							</div>
							<p><a href="mailto:<?php the_author_meta('email'); ?>"><?php the_author_meta('email'); ?></a></p>
							<p><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php _e('View all posts by','custom'); echo ' '.get_the_author_meta('display_name'); ?></a></p>

						</section><!--.author-->
<?php endif; // is_single ?>

<?php if (is_single()) : ?>
						<?php
							the_post_navigation(array(
								'screen_reader_text'	=> __('Post Navigation','custom'),
								'prev_text'				=> __('Previous '.$singular,'custom'),
								'next_text'				=> __('Next '.$singular,'custom'),
							));
						?>
<?php endif; // is_single ?>

						<?php comments_template(); ?>
					</article><!--.article-->
