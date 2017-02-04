<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * RT-Theme Product Options
 */

$this->options["rt_product_options"] = array(

		'title' => __("Product Options", "rt_theme_admin"), 
		//'description' => "", 
		'priority' => 5,
		'sections' => array(

							array(
								'id'       => 'misc',
								'title'    => __("Global Layout Options", "rt_theme_admin"), 
								'controls' => array( 
													array(
														"id"          => RT_THEMESLUG."_product_layout",															
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
													array(
														'id'          => RT_THEMESLUG.'_product_layout_style',
														'label'       => __("Layout Style",'rt_theme_admin'),
														"description" => __("Select and set a default layout style for the product category & archive listing pages",'rt_theme_admin'),
														'type'        => 'select',
														'default'     => 'grid',
														"transport"   => "refresh",
														'choices'     => array(
																			"grid" => __("Grid","rt_theme_admin"),
																			"masonry" => __("Masonry","rt_theme_admin"),
																		),
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
														"id"          => RT_THEMESLUG."_product_list_pager",
														"min"         => "1",
														"max"         => "200",
														"default"     => "9", 
														"type"        => "number",
														"transport"   => "refresh",
														"input_attrs" => array("min"=>1,"max"=>201)
													),
										
													array(
														"label"       => __("OrderBy Parameter",'rt_theme_admin'),
														"description" => __("Select and set the sorting order for the product items within the product listing pages by this parameter.",'rt_theme_admin'),
														"id"          => RT_THEMESLUG."_product_list_orderby",
														"choices"     => array('author'=>__('Author','rt_theme_admin'),'date'=>__('Date','rt_theme_admin'),'title'=>__('Title','rt_theme_admin'),'modified'=>__('Modified','rt_theme_admin'),'ID'=>__('ID','rt_theme_admin'),'rand'=>__('Randomized','rt_theme_admin')), 
														"default"     => "date",
														"transport"   => "refresh",
														"type"        => "select"
													),
										
													array(
														"label"       => __("Order",'rt_theme_admin'),
														"description" => __("Select and set the ascending or descending order for the ORDERBY parameter.",'rt_theme_admin'),
														"id"          => RT_THEMESLUG."_product_list_order",
														"choices"     => array('ASC'=>__('Ascending','rt_theme_admin'),'DESC'=>__('Descending','rt_theme_admin')),
														"default"     => "DESC",
														"transport"   => "refresh",				
														"type"        => "select"
													),

											),
							),		

							array(
								'id'       => 'currency',									
								'title'    => __("Currency Options", "rt_theme_admin"), 
								'controls' => array( 

													array(
														"label"       => __("Currency",'rt_theme_admin'),
														"description" => __('Set a default currency sign/character.','rt_theme_admin'),
														"id"          => RT_THEMESLUG."_currency",
														"default"     => "$",
														"type"        => "text", 
														"transport"   => "refresh",
													),

													array(
														"label"        => __("Currency Location",'rt_theme_admin'),
														"description" => __('Select the location for the currency sign/character (before or after the price label).','rt_theme_admin'),
														"id"          => RT_THEMESLUG."_currency_location",
														"choices"     =>  array( "before" => __("Before the numbers","rt_theme_admin"),  "after" => __("After the numbers","rt_theme_admin")  ),
														"default"     => "before", 
														"type"        => "select",
														"transport"   => "refresh",
													),
										 
													array(
														"label"        => __("Display Price in Product Lists",'rt_theme_admin'),
														"description" => __('Display the price in lists like product categories','rt_theme_admin'),
														"id"          => RT_THEMESLUG."_show_price_in_list",
														"choices"     =>  array( "true" => __("Yes","rt_theme_admin"),  "false" => __("No","rt_theme_admin")  ),
														"default"     => "true", 
														"type"        => "select",
														"transport"   => "refresh",
													),										 

													array(
														"label"        => __("Display Price in Single Product Pages",'rt_theme_admin'),
														"description" => __('Display the price in single product page','rt_theme_admin'),
														"id"          => RT_THEMESLUG."_show_price_in_pages",
														"choices"     =>  array( "true" => __("Yes","rt_theme_admin"),  "false" => __("No","rt_theme_admin")  ),
														"default"     => "true", 
														"type"        => "select",
														"transport"   => "refresh",
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
													"id"          => RT_THEMESLUG."_product_image_resize",
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
													"id"          => RT_THEMESLUG."_product_image_width",
													"default"     => 0, 
													"type"        => "number",
													"transport"   => "postMessage",
													"input_attrs" => array("min"=>0,"max"=>3000, "data-depends-id" => RT_THEMESLUG."_product_image_resize", "data-depends-values" => "true")
												),


												array(
													"label"       => __("Featured Image Max Height",'rt_theme_admin'),
													"id"          => RT_THEMESLUG."_product_image_height",
													"default"     => 0, 
													"type"        => "number",
													"transport"   => "postMessage",
													"input_attrs" => array("min"=>0,"max"=>3000, "data-depends-id" => RT_THEMESLUG."_product_image_resize", "data-depends-values" => "true")
												),

												array(
													"label"       => __("Crop Featured Image",'rt_theme_admin'),
													"id"          => RT_THEMESLUG."_product_image_crop",
													"default"     => "",
													"transport"   => "postMessage",
													"type"        => "rt_checkbox",
													"input_attrs" => array("data-depends-id" => RT_THEMESLUG."_product_image_resize", "data-depends-values" => "true")
												),
									 

										),
						),		

							array(
								'id'          => 'single',									
								'title'       => __("Single Product Layout", "rt_theme_admin"), 
								'description' => __("These options for default single product page layout. ", "rt_theme_admin"), 
								'controls'    => array( 

													array(
														"id"          => RT_THEMESLUG."_product_content_width",															
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
														"id"          => RT_THEMESLUG."_product_content_style",
														"choices"     =>  array(
																			"1" => __("Stlye 1 - Horizontal Tabs","rt_theme_admin"),
																			"2" => __("Stlye 2 - Left Vertical Tabs","rt_theme_admin"),
																			"3" => __("Stlye 3 - Right Vertical Tabs","rt_theme_admin"),
																			"4" => __("Stlye 4 - Accordion","rt_theme_admin"),
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
														"id"          => RT_THEMESLUG."_related_product_layout",															
														"label"       => __("Layout",'rt_theme_admin'),
														"description" => __("Select and set a default column layout for the related products list.",'rt_theme_admin'),
														"choices"     =>  array(
																			"1/6" => "1/6", 
																			"1/4" => "1/4",
																			"1/3" => "1/3",
																			"1/2" => "1/2"
																  		),			
														"default"   => "1/2",
														"transport" => "refresh", 
														"type"      => "select"
													),	
										
													array(
														"label"       => __("Crop Featured Image",'rt_theme_admin'),
														"description" => __('Enable cropping for product images inside the related products list.','rt_theme_admin'),
														"id"          => RT_THEMESLUG."_related_product_image_crop",
														"default"     => "",
														"transport"   => "postMessage",
														"type"        => "checkbox"
													),
										 
											),
							),		


					)
	);
