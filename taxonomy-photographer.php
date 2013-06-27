<?php
/*Template name: Photographers
 */

get_header(); ?>
<h1>Photographers</h1>

		<?php if ( have_posts() ) : ?>

				<h4>
					<?php

						if ( is_tax( 'post_format', 'page' ) ) :
							_e( 'Photographers', 'eaglet' );

						endif;
					?>
				</h4>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to overload this in a child theme then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

<?php get_footer(); ?>