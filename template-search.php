<?php
/*
Template Name: Search Results
Ê*/
?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
<!-- Place this tag where you want the search results to render -->
<!-- result.php -->
<script>
  function() {
    var cx = '005479909923204109580:WMX-714144716';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  }();
</script>
<gcse:searchresults-only></gcse:searchresults-only>

<?php endwhile; ?>

<?php endif; ?>
<?php get_footer(); ?>