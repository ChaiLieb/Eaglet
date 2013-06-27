<?php get_header(); ?>
	
	<!-- section -->
	<section role="main">
	
		<h1><?php _e( 'Categories for', 'html5blank' ); the_category(); ?></h1>
	
		<?php include (TEMPLATEPATH . '/posttemplate.php'); ?>
		<?php get_template_part('pagination'); ?>
	
	</section>
	<!-- /section -->
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>