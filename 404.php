<?php get_header(); ?>

	<!-- section -->
	<section role="main">

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<p><?php _e( 'Something seems to have gone missing. You can either try a search, or &nbsp;<a href="http://brooklynphotoarchive.com/contact/" class="entypo-mail">&nbsp;contact us</a> and we&#39;ll do our best to help you find what you&#39;re looking for.' ); ?></p>

			<h4>
				<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a>
			</h4>

		</article>
		<!-- /article -->

	</section>
	<!-- /section -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>