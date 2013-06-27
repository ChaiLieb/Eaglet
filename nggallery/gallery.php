<?php
/**
Template Page for the gallery overview

Follow variables are useable :

	$gallery     : Contain all about the gallery
	$images      : Contain all images, path, title
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<div class="ngg-galleryoverview" id="<?php echo $gallery->anchor ?>">
<header id="galtitle">

<?php if( is_page_template( 'tag.php' ) ) : ?>
<?php $gallerytag = (get_query_var('gallerytag')); 		// get the slug
			$gallerytag = str_replace("-", " ", $gallerytag); 	// replace dashes with spaces
			$gallerytag = ucwords($gallerytag);					// capitalize words
			echo '<h1>'.$gallerytag.'</h1>'; 					// show the result ?>

<?php else : ?>
<h1 class="galtitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
<?php endif; ?>

</header>
<?php echo get_the_term_list($post->ID, 'photographer', '<h4 class="subtext">Photographer: ', ', ', '<h4>'); ?></header>

	<!-- Thumbnails -->
	<?php foreach ( $images as $image ) : ?>

	<div id="ngg-image-<?php echo $image->pid ?>" class="ngg-gallery-thumbnail-box" <?php echo $image->style ?> >
		<div class="ngg-gallery-thumbnail" >
			<a href="<?php echo $image->imageURL ?>" title="<?php echo $image->description ?>" <?php echo $image->thumbcode ?> >
				<?php if ( !$image->hidden ) { ?>
				<img title="<?php echo $image->alttext ?>" alt="<?php echo $image->alttext ?>" src="<?php echo $image->thumbnailURL ?>" <?php echo $image->size ?> />
				<?php } ?>
			</a>
		</div>
									<?php echo $image->ngg_custom_fields["link"]; ?>

	</div>
	<?php if ( $image->hidden ) continue; ?>
	<?php if ( $gallery->columns > 0 && ++$i % $gallery->columns == 0 ) { ?>
		<br style="clear: both" />
	<?php } ?>

 	<?php endforeach; ?>

	<!-- Pagination -->
 	<?php echo $pagination ?>

</div>
<?php endif; ?>