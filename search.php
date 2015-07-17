<?php get_header(); ?>

        <section id="content"><div class="inner contain">

            <main id="primary"><div class="inner">

<?php if (have_posts()) : ?>
<?php $singular = get_post_type_object(get_post_type())->labels->singular_name; ?>
<?php $s = isset($_GET['s']) ? $_GET['s'] : null; ?>

                <article class="article">
                    <header class="header">
                        <h1 class="heading">
                            <?php _e('Search','custom'); echo $s ? ' for &ldquo;'.$s.'&rdquo;' : NULL; ?>
                        </h1><!--.heading-->
                    </header><!--.header-->

                    <section class="content">
                        <?php get_search_form(); ?>
                    </section><!--.content-->

<?php if ($s) : ?>

                    <section class="articles -results">

<?php while (have_posts()) : the_post(); ?>
<?php // get_template_part('content','search'); // content-search.php defaults to content.php ?>
<?php // bof content-search.php ?>
                        <article id="post-<?php the_ID(); ?>" class="article -search<?php // echo implode(' ',get_post_class()); ?>">
                            <header class="header">
                                <h1 class="heading">
                                    <span class="label"><?php echo $singular; ?>:</span>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h1><!--.heading-->
                            </header><!--.header-->

                            <section class="content -excerpt">
                                <?php the_excerpt(); ?>
                            </section><!--.content-->

                            <?php edit_post_link(__('Edit','custom').' '.$singular,'<p class="edit -'.get_post_type().'">','</p>'); ?>
                        </article><!--.article-->
<?php // eof content-search.php ?>
<?php endwhile; // have_posts ?>

                    </section><!--.articles-->

                    <?php
                        the_posts_pagination(array(
                            'screen_reader_text' => __('Posts Navigation','custom'),
                            'prev_text'          => __('Previous','custom').'<span class="screen-reader-text"> '.__('Page','custom').'</span>',
                            'next_text'          => __('Next','custom').'<span class="screen-reader-text"> '.__('Page','custom').'</span>',
                            'before_page_number' => '<span class="screen-reader-text">'.__('Page','custom').' </span>',
                        ));
                    ?>

<?php endif; // $s ?>

                </article><!--.article-->

<?php endif; // have_posts ?>

            </div><!--.inner--></main><!--#primary-->

<?php // get_sidebar(); ?>

        </div><!--.inner--></section><!--#content-->

<?php get_footer(); ?>
