<?php get_header(); ?>

        <section id="content"><div class="inner contain">
            <main id="primary" class="split"><div class="inner">

<?php if (have_posts()) : ?>
<?php $plural = get_post_type_object(get_post_type())->label; ?>

                <article class="article">
                    <header class="header">
                        <h1 class="heading">
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
                        </h1><!--.heading-->
                    </header><!--.header-->

                    <?php // FIXME explore WP_Query('page_id='.get_option('page_for_posts')); to get page_for_posts the_content(); ?>

                    <section class="articles -<?php echo strtolower($plural); ?>">

<?php while (have_posts()) : the_post(); ?>
<?php get_template_part('content'.'-'.get_post_type(),get_post_format()); // content-{type}-{format}.php defaults to content.php ?>
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
                </article><!--.article-->

<?php endif; // have_posts ?>

            </div><!--.inner--></main><!--#primary-->

<?php get_sidebar(); ?>

        </div><!--.inner--></section><!--#content-->

<?php get_footer(); ?>
