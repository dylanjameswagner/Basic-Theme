<?php $singular = get_post_type_object(get_post_type())->labels->singular_name; ?>

                    <article id="post-<?php the_ID(); ?>" class="article <?php echo implode(' ',get_post_class()); ?>">

                        <header class="header">
                            <h1 class="heading">
                                <?php the_title(); ?>
                            </h1><!--.heading-->
                        </header><!--.header-->

                        <section class="content">
                            <?php the_content(); ?>
                            <?php wp_link_pages(); ?>
                        </section><!--.content-->

                        <?php edit_post_link(__('Edit','custom').' '.$singular,'<p class="edit -'.get_post_type().'">','</p>'); ?>

                        <?php comments_template(); ?>
                    </article><!--.article-->
