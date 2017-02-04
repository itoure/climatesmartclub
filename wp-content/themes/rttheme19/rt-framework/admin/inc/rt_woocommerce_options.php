<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * RT-Theme WooCommerce Options
 */

$this->options["rt_woocommerce_options"] = array(

		'title' => __("WooCommerce Options", "rt_theme_admin"), 
		'description' => "", 
		'priority' => 7,
		'sections' => array(

							array(
								'id'       => 'misc',
								'title'    => __("Global Layout Options", "rt_theme_admin"), 
								'controls' => array( 
													array(
														"id"          => RT_THEMESLUG."_woo_layout",															
														"label"       => __("Layout",'rt_theme_admin'),
														"description" => __("Select and set a default column layout for the product category & archive listing pages for each of the (single) post items listed within those pages.",'rt_theme_admin'),
														"choices"     =>  array(
																			"1/6" => "1/6", 
																			"1/4" => "1/4",
																			"1/3" => "1/3",
																			"1/2" => "1/2",
																			"1/1" => "1/1"
																  		),			
														"default"   => "1/3",
														"transport" => "refresh", 
														"type"      => "select"
													),										
											),
							),							

							array(
								'id'       => 'style',
								'title'    => __("Listing Parameters", "rt_theme_admin"), 
								'controls' => array( 

													array(
														"label"       => __("Amount of product items to show per page",'rt_theme_admin'),
														"description" => __("Set the amount of portfolio items to show per page before pagination kicks in.",'rt_theme_admin'),
														"id"          => RT_THEMESLUG."_woo_list_pager",
														"min"         => "1",
														"max"         => "200",
														"default"     => "9", 
														"type"        => "number",
														"transport"   => "refresh",
														"input_attrs" => array("min"=>1,"max"=>201),
														"callback"    => array(&$this, 'rt_sanitize_number')
													),

											),
							),		

						array(
							'id'       => 'featured_img',									
							'title'    => __("Featured Images", "rt_theme_admin"), 
							"description" => __('Enable "Image Resize" to resize or crop the featured images automatically. These settings will be used as globaly.<br />
												Please note, since the theme is reponsive the images cannot be wider than the column they are in. Leave these values "0" to use theme defaults.','rt_theme_admin'),

							'controls' => array( 

												array(
													"label"       => __("Image Resize",'rt_theme_admin'),
													"id"          => RT_THEMESLUG."_woo_image_resize",
													"choices"     =>  array(
																		"false" => __("Disabled","rt_theme_admin"),						
																		"true" => __("Enabled","rt_theme_admin"),
																	),			
													"default"   => "true",
													"transport" => "postMessage", 
													"type"      => "select"
												),		

												array(
													"label"       => __("Featured Image Max Width",'rt_theme_admin'),
													"id"          => RT_THEMESLUG."_woo_image_width",
													"default"     => 0, 
													"type"        => "number",
													"transport"   => "postMessage",
													"input_attrs" => array("min"=>0,"max"=>3000, "data-depends-id" => RT_THEMESLUG."_woo_image_resize", "data-depends-values" => "true")
												),

												array(
													"label"       => __("Featured Image Max Height",'rt_theme_admin'),
													"id"          => RT_THEMESLUG."_woo_image_height",
													"default"     => 0, 
													"type"        => "number",
													"transport"   => "postMessage",
													"input_attrs" => array("min"=>0,"max"=>3000, "data-depends-id" => RT_THEMESLUG."_woo_image_resize", "data-depends-values" => "true")
												),

												array(
													"label"       => __("Crop Featured Image",'rt_theme_admin'),
													"id"          => RT_THEMESLUG."_woo_image_crop",
													"default"     => "",
													"transport"   => "postMessage",
													"type"        => "rt_checkbox",
													"input_attrs" => array("data-depends-id" => RT_THEMESLUG."_woo_image_resize", "data-depends-values" => "true")
												),
									 

										),
						),		

							array(
								'id'          => 'single',									
								'title'       => __("Single Product Layout", "rt_theme_admin"), 
								'description' => __("These options for default single product page layout. ", "rt_theme_admin"), 
								'controls'    => array( 

													array(
														"id"          => RT_THEMESLUG."_woo_content_width",															
														"label"       => __("Product Info Width",'rt_theme_admin'),
														"description" => __("Select a width for the content block that contains product title, short info and the images.",'rt_theme_admin'),
														"choices"     =>  array(
																			"1/6" => "1/6",
																			"1/4" => "1/4",
																			"1/3" => "1/3",
																			"1/2" => "1/2",
																			"1/1" => "1/1"
																  		),			
														"default"   => "1/1",
														"transport" => "refresh", 
														"type"      => "select"
													),	
										
													array(
														"label"       => __("Tabular Content Style",'rt_theme_admin'),
														"description" => __('Select a style for the tabular content.','rt_theme_admin'),
														"id"          => RT_THEMESLUG."_woo_content_style",
														"choices"     =>  array(
																			"1" => __("Stlye 1 - Horizontal Tabs","rt_theme_admin"),
																			"2" => __("Stlye 2 - Left Vertical Tabs","rt_theme_admin"),
																			"3" => __("Stlye 3 - Right Vertical Tabs","rt_theme_admin"),
																  		),			
														"default"   => "1",
														"transport" => "refresh", 
														"type"      => "select"
													),
										 
											),
							),		

							array(
								'id'       => 'related',									
								'title'    => __("Related Products", "rt_theme_admin"), 
								'controls' => array( 

													array(
														"id"          => RT_THEMESLUG."_woo_related_product_layout",															
														"label"       => __("Layout",'rt_theme_admin'),
														"description" => __("Select and set a default column layout for the related products list.",'rt_theme_admin'),
														"choices"     =>  array(
																			"1/6" => "1/6", 
																			"1/4" => "1/4",
																			"1/3" => "1/3",
																			"1/2" => "1/2",
																			"1/1" => "1/1"
																  		),			
														"default"   => "1/3",
														"transport" => "refresh", 
														"type"      => "select"
													),	
										
													array(
														"label"       => __("Crop Featured Image",'rt_theme_admin'),
														"description" => __('Enable cropping for product images inside the related products list.','rt_theme_admin'),
														"id"          => RT_THEMESLUG."_woo_related_product_image_crop",
														"default"     => "on",
														"transport"   => "postMessage",
														"type"        => "checkbox"
													),
										 
											),
							),		

					)
	);