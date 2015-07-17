<?php if (post_password_required()) return; ?>
<?php if (comments_open() || have_comments()): ?>

                        <section id="comments" class="comments"><div class="inner">

                            <h2 class="title">
                                <?php _e('Comments','custom'); ?>
                                <?php // printf(_n('One thought on &ldquo;%2$s&rdquo;','%1$s thoughts on &ldquo;%2$s&rdquo;',get_comments_number(),'custom'),number_format_i18n(get_comments_number()),'<span>'.get_the_title().'</span>'); ?>
                            </h2><!--.title-->

<?php if (have_comments()): ?>

                            <ol class="list">
                                <?php
                                    wp_list_comments(array(
                                        'style'       => 'ol',
                                        'short_ping'  => true,
                                        'avatar_size' => 34,
                                    ));
                                ?>
                            </ol><!--.list-->

<?php if (get_comment_pages_count() > 1): ?>
                            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                                <h2 class="screen-reader-text"><?php _e('Comment Navigation','custom'); ?></h2>
                                <div class="nav-links">
                                    <?php
                                        if ($previous_link = get_previous_comments_link(__('Older Comments','custom'))) : printf('<div class="nav-previous">%s</div>',$previous_link); endif;
                                        if ($next_link     = get_next_comments_link(__('Newer Comments','custom')))     : printf('<div class="nav-next">%s</div>',$next_link); endif;
                                    ?>
                                </div>
                            </nav>
<?php endif; // get_comment_pages_count ?>

<?php if (!comments_open()) : ?>
                            <p class="closed"><?php _e('Comments are closed.','custom'); ?></p>
<?php endif; // !comments_open() ?>

<?php endif; // have_comments() ?>

                            <?php
                                // http://codex.wordpress.org/Function_Reference/comment_form
                                global $allowedtags;
                                foreach ($allowedtags as $tag => $value){
                                    foreach ($value as $att => $v){
                                        $atts[] = ' '.$att.'=""';
                                    }
                                    $tags[] = '<code>&lt;'.$tag.(count($atts) ? implode(' ',$atts) : NULL).'&gt;</code>';
                                    $atts = NULL;
                                }

                                comment_form(array(
                                    'comment_notes_before' => '<p class="notes before">'.__('Your email address will not be published. Required fields are marked','custom').' <span class="required">*</span></p>',
                                    'comment_notes_after'  => '<p class="notes after">'.sprintf('<span class="meta-title">'.__('Comments support these','custom').' <abbr title="HyperText Markup Language">HTML</abbr> '.__('tags and attributes:','custom').'</span><br/> <span class="meta-content">%s</span>',implode(' ',$tags)).'</p>', //  <code>'.allowed_tags().'</code>
                                    'title_reply'          => __('Respond','custom'),
                                    'title_reply_to'       => __('Leave a Reply to %s','custom'),
                                    'cancel_reply_link'    => __('Cancel Reply','custom'),
                                    'label_submit'         => __('Post Response','custom'),
                                    'class_submit'         => 'button'
                                ));
                            ?>
                        </div><!--.inner--></section><!--.comments-->

<?php endif; // comments_open() || have_comments() ?>
