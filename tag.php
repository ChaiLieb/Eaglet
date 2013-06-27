<?php /*
Template Name: Tag Archive
*/ ?>
<?php get_header(); ?>
<div class="tag-index">
<header id="galtitle"><h1 class="galtitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1></header>

<?php echo nggTagCloud("smallest=12&largest=12&format=list&number=5000&orderby=name");?>
<?php echo paginate_links( $args ); ?>

</div>

<?php get_footer(); ?>