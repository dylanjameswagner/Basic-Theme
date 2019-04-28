		<section class="footer">
			<?php
			if (has_nav_menu('footer')) :
				wp_nav_menu([
					'theme_location'  => 'footer',
					'container'       => 'nav',
					'container_class' => 'footer-menu menu horizontal',
					'container_id'    => false,
					'menu_class'      => 'footer-menu__list menu__list',
					'menu_id'         => 'IGNORE',
				]);
			else :
				wp_page_menu([
					'show_home'  => true,
					'container'  => 'nav', // Undocumented // Default 'div'
					'menu_class' => 'footer-menu menu horizontal',
					'menu_id'    => false,
					'before'     => '<ul class="footer-menu__list menu__list">', // Default '<ul>'
				]);
			endif;
			?>

			<p class="footer__social">
				<a class="facebook" title="Facebook" target="_blank" href="http://facebook.com/">
					<?php _e('Facebook', 'basic-theme'); ?>
				</a>
				<a class="twitter" title="Twitter" target="_blank" href="http://twitter.com/">
					<?php _e('Twitter', 'basic-theme'); ?>
				</a>
				<a class="linkedin" title="LinkedIn" target="_blank" href="http://linkedin.com/">
					<?php _e('LinkedIn', 'basic-theme'); ?>
				</a>
			</p>

			<footer class="footer__notice">
				<p class="footer__copyright">
					<?php printf(__('Copyright &copy; %d %s', 'basic-theme'), date('Y'), get_bloginfo('name')); ?>
				</p>
				<p class="footer__credit">
					<a target="_blank" href="<?php echo wp_get_theme()->get('AuthorURI'); ?>">
						<?php printf(__('Developed by %s', 'basic-theme'), wp_get_theme()->get('Author')); ?>
					</a>
				</p>
			</footer>
		</section>

	</div><!-- .site Opened in header.php -->

	<!-- bof wp_footer(); -->
	<?php wp_footer(); ?>
	<!-- eof wp_footer(); -->

</body>
</html>
