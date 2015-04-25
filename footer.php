	</div><!--#top-->

	<section id="footer"><div class="inner contain">

		<p class="return">
			<a title="<?php echo _x('Return to Top','scroll to top of document','custom'); ?>" href="#top">
				<?php echo _x('Return to Top','scroll to top of document','custom'); ?>
			</a>
		</p><!--.return-->

		<p class="social">
			<a class="facebook" title="Facebook" href="#">Facebook</a>
			<a class="twitter" title="Twitter" href="#">Twitter</a>
			<a class="linkedin" title="LinkedIn" href="#">LinkedIn</a>
		</p><!--.social-->

		<footer class="notice">
			<p class="copyright">
				Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>
			</p><!--.copyright-->

			<p class="credit">
				<a target="_blank" href="<?php echo wp_get_theme()->get('AuthorURI'); ?>">
					<?php _e('Developed by','custom'); ?> <?php echo wp_get_theme()->get('Author'); ?>
				</a>
			</p><!--.credit-->
		</footer><!--.notice-->

	</div><!--.inner--></section><!--#footer-->

<!--[if gte IE 9]><!-->
<?php wp_footer(); ?>
<!--<![endif]-->

	<!--script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-0000000-0', 'auto');
		ga('send', 'pageview');
	</script-->

</body>
</html>
