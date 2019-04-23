		<section class="footer contain">
			<?php
			if ( has_nav_menu( 'footer' ) ) :
				wp_nav_menu( [
					'container'       => 'nav',
					'theme_location'  => 'footer',
					'container_id'    => 'footer-menu',
					'menu_id'         => 'footer-menu-list',
					'container_class' => 'menu horizontal',
					'menu_class'      => 'list contain',
				] );
			else :
				wp_page_menu( [
					'menu_class' => 'menu horizontal',
					'show_home'  => true,
					'depth'      => 1,
				] );
			endif;
			?>

			<p class="footer__social">
				<a target="_blank" class="facebook" title="Facebook" href="https://facebook.com/">
					Facebook
				</a>

				<a target="_blank" class="twitter" title="Twitter" href="https://twitter.com/">
					Twitter
				</a>

				<a target="_blank" class="linkedin" title="LinkedIn" href="https://linkedin.com/">
					LinkedIn
				</a>
			</p>

			<footer class="footer__notice">
				<p class="footer__copyright">
					Copyright &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>
				</p>

				<p class="footer__credit">
					<a target="_blank" href="<?php echo wp_get_theme()->get( 'AuthorURI' ); ?>">
						<?php echo __( 'Developed by', 'custom' ) . ' ' . wp_get_theme()->get( 'Author' ); ?>
					</a>
				</p>
			</footer>
		</section>
	</div>

	<!-- bof wp_footer -->
	<?php wp_footer(); ?>
	<!-- eof wp_footer -->

</body>
</html>
