<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product, $layout;
?>

<div class="images woo_product_images">
<?php 

if ( has_post_thumbnail() ) { 	

	$attachment_ids = array_merge( array( get_post_thumbnail_id() ), $product->get_gallery_attachment_ids() ); 
	$attachment_count = count( $product->get_gallery_attachment_ids() );  
						
	/**
	 * call the product slider 
	 */

	//carousel atts
	$carousel_atts = array(  
		"id"  => $post->ID."-product-image-carosel", 
		"item_width"  => 1, 
		"class" => "product-image-carosel",
		"nav" => "true",
		"dots" => "false"
	);

	echo rt_create_image_carousel(array("rt_gallery_images" => $attachment_ids, "column_width" => 12 - rt_column_count($layout["content_width"]) , "carousel_atts" => $carousel_atts ) ) ;


}

?>  
</div>