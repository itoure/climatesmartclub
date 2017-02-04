<?php

if( ! function_exists("rt_image_carousel") ){
	/**
	 * Image Carousel Shortcode
	 * 
	 * @param  array $atts
	 * @param  string $content
	 * @return html
	 */															
	function rt_image_carousel( $atts, $content = null ) {

	//defaults
	extract(shortcode_atts(array(  
		"id"  => 'image-carousel-'.rand(100000, 1000000),	
		"class" => '',			
		"images" => '',
		"img_width" => 980,
		"img_height" => 980,
		"crop" => "false",
		"carousel_layout" => 1,
		"lightbox" => "true",
		"margin" => "",
		"nav" => "true",
		"dots" => "false",
		"autoplay" => "false",
		"timeout" => 5000,				
	), $atts)); 

	//images 
	$images = ! empty( $images ) ? explode(",", $images ) : array();

	//carousel atts
	$carousel_atts = array(  
		"id"  => sanitize_html_class($id), 
		"item_width"  => $carousel_layout, 
		"class" => sanitize_html_class($class),
		"nav" => $nav,
		"dots" => $dots,
		"autoplay" => $autoplay,
		"timeout" => $timeout,
		"margin" => $margin
	);

	return rt_create_image_carousel(array("rt_gallery_images" => $images, "carousel_atts" => $carousel_atts, "w" => $img_width, "h" => $img_height, "crop" => $crop, "echo" => false, "lightbox" => $lightbox) ) ;

	}
}

add_shortcode('rt_image_carousel', 'rt_image_carousel');