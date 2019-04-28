<?php if (post_password_required()) return; ?>

<?php if (comments_open() || have_comments()) : ?>

	<section id="comments" class="comments">
		<h2 class="title">
			<?php _e('Comments', 'basic-theme'); ?>
			<?php // printf(_n('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;',get_comments_number(), 'basic-theme'),number_format_i18n(get_comments_number()), '<span>' .get_the_title() . '</span>'); ?>
		</h2>

		<?php if (have_comments()) : ?>

			<ol class="comments__list">
				<?php
				wp_list_comments([
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 34,
				]);
				?>
			</ol>

			<?php if (get_comment_pages_count() > 1) : ?>
				<nav role="navigation" class="navigation comments-navigation">
					<h2 class="screen-reader-text">
						<?php _e('Comment Navigation', 'basic-theme'); ?>
					</h2>
					<div class="comments-navigation__links">
						<?php
						if ($previous_link = get_previous_comments_link(__('Older Comments', 'basic-theme'))) :
							printf('<div class="nav-previous">%s</div>', $previous_link);
						endif;

						if ($next_link = get_next_comments_link(__('Newer Comments', 'basic-theme'))) :
							printf('<div class="nav-next">%s</div>', $next_link);
						endif;
						?>
					</div>
				</nav>
			<?php endif; ?>

			<?php if (!comments_open()) : ?>
				<p class="closed">
					<?php _e('Comments are closed.', 'basic-theme'); ?>
				</p>
			<?php endif; ?>

		<?php endif; ?>

		<?php
		/**
		 * @link http://codex.wordpress.org/Function_Reference/comment_form
		 */
		global $allowedtags;
		foreach ($allowedtags as $tag_key => $tag_value) :
			$attributes = [];
			foreach ($tag_value as $attribute_key => $attribute_value) :
				$attributes[] = ' ' . $attribute_key . '=""';
			endforeach;
			$tags[] = '<code style="white-space: nowrap;">&lt;' . $tag_key . (count($attributes) ? implode(' ', $attributes) : null) . '&gt;</code>';
		endforeach;

		comment_form([
			'comment_notes_before' => '<p class="notes before">' . __('Your email address will not be published. Required fields are marked', 'basic-theme') . ' <span class="required">*</span></p>',
			'comment_notes_after'  => '<p class="notes after">' . sprintf('<span class="meta-title">' . __('Comments support these', 'basic-theme') . ' <abbr title="HyperText Markup Language">HTML</abbr> ' . __('tags and attributes:', 'basic-theme') . '</span><br/> <span class="meta-content">%s</span>', implode(' ', $tags)) . '</p>', //  <code>' .allowed_tags() . '</code>
			'title_reply'          => __('Respond', 'basic-theme'),
			'title_reply_to'       => __('Leave a Reply to %s', 'basic-theme'),
			'cancel_reply_link'    => __('Cancel Reply', 'basic-theme'),
			'label_submit'         => __('Post Response', 'basic-theme'),
			'class_submit'         => 'button'
		]);
		?>
	</section>

<?php endif;
