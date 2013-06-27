<?php get_header(); ?>
	<?php if (have_posts()) : ?>

				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
  		        <?php if ( function_exists( 'ngg_images_results' )  && have_images() )  : ?>

        		<?php ngg_images_results(); ?>

        		<?php endif; ?>

<?php elseif ( function_exists( 'ngg_images_results' ) && have_images() )  : ?>
	<h2 class="pagetitle"><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

        		<?php ngg_images_results(); ?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, this archive may not contain what you were searching for. Let us know what you&#39;re looking for <a href="http://brooklynphotoarchive.com/contact/" class="entypo-mail">&nbsp;contact us</a> and we&#39;ll do our best to help you find what you&#39;re looking for' ); ?>


						</p>
					</div></div><!-- .entry-content -->
<?php endif; ?>

<?php get_footer(); ?>
