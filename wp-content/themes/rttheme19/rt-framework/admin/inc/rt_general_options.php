<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * RT-Theme Options Without Panels
 */
$this->options["rt_single_options"] = array(

			array(
				'id'       => 'copyright',
				'title'    => __("Copyright Text", "rt_theme_admin"), 
				'controls' => array( 

									array(
										"id"          => RT_THEMESLUG."_copyright", 	
										"label"       => __("Copyright Text",'rt_theme_admin'),
										"description" => __('The copyright text will be displayed in the footer of your website.','rt_theme_admin'),
										"transport"   => "refresh",		
										"default"     =>  'Copyright &copy; Company Name, Inc.',													
										"type"        => "textarea",
										"sanitize_callback" => "rt_sanitize_basic_html"
									), 

							),
			), 
	);

/**
 * RT-Theme General Options
 */
$this->options["rt_general_options"] = array(

		'title' => __("General Options", "rt_theme_admin"), 
		'priority' => 1,
		//'description' => __("General Options Desc", "rt_theme_admin"), 
		'sections' => array(

							array(
								'id'       => 'logos',
								'title'    => __("Logo & Favicon", "rt_theme_admin"), 
								'controls' => array( 

													array(
														"id"          => RT_THEMESLUG."_logo_url", 	
														"label"       => __("Logo Image",'rt_theme_admin'),
														"description" => __('Upload a image file by the use of the upload button or insert a valid url to a image to use as the website logo. Use a bigger image than the logo box width like 580px (width) to get a sharp look with the retina devices.','rt_theme_admin'),
														"transport"   => "refresh",															
														"type"        => "rt_media"
													), 

													array(
														"id"          => RT_THEMESLUG."_sticky_logo_url", 	
														"label"       => __("Logo Image for the Sticky Header (optional)",'rt_theme_admin'),
														"description" => __('Upload an alternative logo image for the sticky navigation bar.','rt_theme_admin'),
														"transport"   => "refresh",															
														"type"        => "rt_media"
													), 

													array(
														"id"          => RT_THEMESLUG."_favicon_url", 	
														"label"       => __("Custom Favicon",'rt_theme_admin'),
														"description" => __('Provide a valid url to the favicon image or use the upload button to upload a favicon.ico image.  Max Icon size allowed : 16x16px. File extension required: &#39;.ico&#39;','rt_theme_admin'),
														"transport"   => "refresh",															
														"type"        => "rt_media"
													), 
 

											),
							),

							array(
								'id'       => 'performance',
								'title'    => __("Performance", "rt_theme_admin"), 
								"description" => __('Speed up your website by using minified and combined versions of the css/js files that used for the theme. ','rt_theme_admin'),								
								'controls' => array(

													array(
														"id"        => RT_THEMESLUG."_optimize_css",															
														"label"     => __("Combine & optimize CSS files of the theme",'rt_theme_admin'),														
														"default"   => "",
														"transport" => "refresh",
														"type"      => "checkbox",
													),	

													array(
														"id"        => RT_THEMESLUG."_optimize_js",															
														"label"     => __("Combine & optimize JS files of the theme",'rt_theme_admin'),														
														"default"   => "",
														"transport" => "refresh",
														"type"      => "checkbox",
													),	

											),
							),


							array(
								'id'       => 'breadcrumb',
								'title'    => __("Breadcrumb Menus", "rt_theme_admin"), 
								'controls' => array( 

													array(
														"id"          => RT_THEMESLUG."_blog_page",															
														"label"       => __("Blog Start Page",'rt_theme_admin'),
														"description" => __("Select blog start page to add after home link.",'rt_theme_admin'),
														"default"   => "0",
														"transport" => "refresh", 
														"type"      => "dropdown-pages"
													),														
													array(
														"id"          => RT_THEMESLUG."_product_list",															
														"label"       => __("Product Showcase Start Page",'rt_theme_admin'),
														"description" => __("Select product start page to add after home link.",'rt_theme_admin'),
														"default"   => "0",
														"transport" => "refresh", 
														"type"      => "dropdown-pages"
													),												
													array(
														"id"          => RT_THEMESLUG."_portf_page",															
														"label"       => __("Portfolio Start Page",'rt_theme_admin'),
														"description" => __("Select portfolio start page to add after home link.",'rt_theme_admin'),		
														"default"   => "0",
														"transport" => "refresh", 
														"type"      => "dropdown-pages"
													),	
													array(
														"id"          => RT_THEMESLUG."_staff_page",															
														"label"       => __("Team Start Page",'rt_theme_admin'),
														"description" => __("Select team/staff start page to add after home link.",'rt_theme_admin'),		
														"default"   => "0",
														"transport" => "refresh", 
														"type"      => "dropdown-pages"
													),
											),
							),


							array(
								'id'       => 'sidebars',
								'title'    => __("Sidebar Options", "rt_theme_admin"), 
								'controls' => array( 
													
													array(
														"id"          => RT_THEMESLUG."_default_sidebar_position",	
														"label"       => __("Default Sidebar Position",'rt_theme_admin'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			""      => __("No Sidebar","rt_theme_admin"),
																			"left"  => __("Left Sidebar","rt_theme_admin"),
																			"right" => __("Right Sidebar","rt_theme_admin"), 
																		),  
														"type" => "select",
														"default" => "",
														"rt_skin"   => true
													),

													array(
														"id"          => RT_THEMESLUG."_sidebar_blog_cats",	
														"label"       => __("Sidebar Position for Blog Categories",'rt_theme_admin'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			""      => __("No Sidebar","rt_theme_admin"),
																			"left"  => __("Left Sidebar","rt_theme_admin"),
																			"right" => __("Right Sidebar","rt_theme_admin"), 
																		),  
														"type" => "select",
														"default" => "",
														"rt_skin"   => true
													),

													array(
														"id"          => RT_THEMESLUG."_sidebar_portfolio_cats",	
														"label"       => __("Sidebar Position for Portfolio Categories",'rt_theme_admin'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			""      => __("No Sidebar","rt_theme_admin"),
																			"left"  => __("Left Sidebar","rt_theme_admin"),
																			"right" => __("Right Sidebar","rt_theme_admin"), 
																		),  
														"type" => "select",
														"default" => "",
														"rt_skin"   => true
													),												

													array(
														"id"          => RT_THEMESLUG."_sidebar_product_cats",	
														"label"       => __("Sidebar Position for Product Showcase Categories",'rt_theme_admin'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			""      => __("No Sidebar","rt_theme_admin"),
																			"left"  => __("Left Sidebar","rt_theme_admin"),
																			"right" => __("Right Sidebar","rt_theme_admin"), 
																		),  
														"type" => "select",
														"default" => "",
														"rt_skin"   => true
													),	

													array(
														"id"          => RT_THEMESLUG."_sidebar_woo_cats",	
														"label"       => __("Sidebar Position for WooCommerce Categories",'rt_theme_admin'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			""      => __("No Sidebar","rt_theme_admin"),
																			"left"  => __("Left Sidebar","rt_theme_admin"),
																			"right" => __("Right Sidebar","rt_theme_admin"), 
																		),  
														"type" => "select",
														"default" => "",
														"rt_skin"   => true
													),	
													
													/*
													array(
														"id"          => RT_THEMESLUG."_sidebar_test_cats",	
														"label"       => __("Sidebar Position for Testimonial Categories",'rt_theme_admin'),
														"description" => "",
														"transport"   => "refresh",															
														"choices"     => array(		
																			""      => __("No Sidebar","rt_theme_admin"),
																			"left"  => __("Left Sidebar","rt_theme_admin"),
																			"right" => __("Right Sidebar","rt_theme_admin"), 
																		),  
														"type" => "select",
														"default" => "",
														"rt_skin"   => true
													),	
													*/

											),
							),


							array(
								'id'          => 'page_comments',
								'title'       => __("Page Comments", "rt_theme_admin"), 
								"description" => __("Turn ON this option if you want to allow comments on regular pages. Make sure 'Allow Comments' box is also checked for individual pages. If you dont see that option in your pages make sure to turn on the &#39;discussions&#39; option in the screen options below the admin name while you are in that page editing the content.",'rt_theme_admin'),				
								'controls'    => array( 

													array(
														"id"        => RT_THEMESLUG."_allow_page_comments",															
														"label"     => __("Allow comments on pages",'rt_theme_admin'),														
														"default"   => 0,
														"transport" => "refresh",
														"type"      => "checkbox",
													),	

											),
							),
   

							array(
								'id'          => 'page_loading',
								'title'       => __("Page Loading Effect", "rt_theme_admin"), 
								"description" => __("Check this option to enable page loading effect",'rt_theme_admin'),				
								'controls'    => array( 

													array(
														"id"        => RT_THEMESLUG."_page_loading_effect",															
														"label"     => __("Page Loading Effect",'rt_theme_admin'),														
														"default"   => 1,
														"transport" => "refresh",
														"type"      => "checkbox",
													),	

											),
							),

					)
	);