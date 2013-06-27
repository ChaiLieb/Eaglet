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

<?php 
$gallery_id = $gallery->ID;
global $wpdb;
$products_table_name = WP_ESTORE_PRODUCTS_TABLE_NAME;
$gallery_map_tbl_name = ESTORE_NGG_GALLERY_MAP_TBL;
$gallery_map_result = $wpdb->get_row("SELECT * FROM $gallery_map_tbl_name WHERE gallery_id = '$gallery_id'", OBJECT);
if($gallery_map_result){//Advanced options are in use. Lets load the correct product details
	$product_id = $gallery_map_result->prod_id;
}else{//Load the default product
	$product_id = get_option('eStore_ngg_template_product_id');	
}
$ret_product = $wpdb->get_row("SELECT * FROM $products_table_name WHERE id = '$product_id'", OBJECT);
$product_price = $ret_product->price;
$price_data = "";
if(get_option('eStore_ngg_addon_show_price')=='1'){
	$price_data = "<span>".print_tax_inclusive_payment_currency_if_enabled($product_price, WP_ESTORE_CURRENCY_SYMBOL,'',$ret_product)."</span>";
}
?>

<div class="ngg-galleryoverview" id="ngg-gallery-<?php echo $gallery->ID ?>">

	<!-- Thumbnails -->
	<?php foreach ($images as $image) : ?>
<ul class="box">
	<li class="gallery-list"><div id="ngg-image-<?php echo $image->pid ?>" class="ngg-gallery-thumbnail-box" <?php echo $gallery->imagewidth ?> >
		<div class="ngg-gallery-thumbnail" >
			<a href="<?php echo $image->imageURL ?>" title="" <?php echo $image->thumbcode ?> data-ob="lightbox">

				<img title="<?php echo $image->alttext ?>" alt="<?php echo $image->alttext ?>" src="<?php echo $image->thumbnailURL ?>" <?php echo $image->size ?> />
				<?php //echo $image->caption; ?>
				<?php echo $price_data; ?>
				<span>
                    <?php echo print_eStore_ngg_add_to_cart($image,$product_id); ?>
                </span>
			</a>
		</div>
	</div></li></lu>
	<?php if ( $gallery->columns > 0 && ++$i % $gallery->columns == 0 ) { ?>
	<br style="clear: both" />
	<?php } ?>
 	<?php endforeach; ?>
 	
	<!-- Pagination -->
 	<?php echo $pagination ?>
 	
</div>
 
<?php endif; ?>