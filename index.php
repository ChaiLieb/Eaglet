<?php get_header(); ?>
<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar('slider') ) : ?>
<?php endif; ?>
<?php echo do_shortcode("[album id=7 template=compact]"); ?>
<?php get_footer(); ?>