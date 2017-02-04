<?php
/*
*
* Image Carousel
* [rt_image_carousel] 
*
*/ 

vc_map(
	array(
		'base'        => 'rt_image_carousel',
		'name'        => __( 'Image Carousel', 'rt_theme_admin' ),
		'icon'        => 'rt_theme carousel',
		'category'    => array(__( 'Content', 'rt_theme_admin' ), __( 'Theme Addons', 'rt_theme_admin' )),
		'description' => __( 'Add an image carousel', 'rt_theme_admin' ),
		'params'      => array(

							array(
								'param_name'  => 'images',
								'heading'     => __('Images', 'rt_theme_admin' ),
								'description' => __('Select images for the carousel', 'rt_theme_admin' ),
								'type'        => 'attach_images'
							),

							array(
								'param_name'  => 'carousel_layout',
								'heading'     => __( 'Carousel Layout', 'rt_theme_admin' ),
								"description" => __("Visible image count for each slide",'rt_theme_admin'),
								'type'        => 'dropdown',
								"value"       => array(
													"1" => "1",
													"2" => "2",													
													"3" => "3",													
													"4" => "4",													
													"5" => "5",													
													"6" => "6",													
													"7" => "7",													
													"8" => "8",													
													"9" => "9", 
													"10" => "10"
												)
							),

							array(
								'param_name'  => 'img_width',
								'heading'     => __('Max Image Width', 'rt_theme_admin' ),
								'description' => __('Set an maximum width value for the carousel images. Note: Remember that the carousel width will be fluid.', 'rt_theme_admin' ),
								'type'        => 'rt_number',
								'value'       => ''
							),

							array(
								'param_name'  => 'img_height',
								'heading'     => __('Max Image Height', 'rt_theme_admin' ),
								'description' => __('Set an maximum height value for the carousel images.', 'rt_theme_admin' ),
								'type'        => 'rt_number',
								'value'       => ''
							),

							array(
								'param_name'  => 'crop',
								'heading'     => __( 'Crop Images', 'rt_theme_admin' ),
								'type'        => 'dropdown',
								"value"       => array(
													__("Disabled","rt_theme_admin") => "false",
													__("Enabled","rt_theme_admin") => "true"
												),
							),

							array(
								'param_name'  => 'nav',
								'heading'     => __( 'Navigation Arrows', 'rt_theme_admin' ),
								'type'        => 'dropdown',
								"value"       => array(
													__("Enabled","rt_theme_admin") => "true", 
													__("Disabled","rt_theme_admin") => "false"													
												)						
							),

							array(
								'param_name'  => 'dots',
								'heading'     => __( 'Navigation Dots', 'rt_theme_admin' ),
								'type'        => 'dropdown',
								"value"       => array(
													__("Disabled","rt_theme_admin") => "false",	
													__("Enabled","rt_theme_admin") => "true"							
												)						
							),

							array(
								'param_name'  => 'autoplay',
								'heading'     => __( 'Auto Play', 'rt_theme_admin' ),
								'type'        => 'dropdown',
								"value"       => array(												
													__("Disabled","rt_theme_admin") => "false",
													__("Enabled","rt_theme_admin") => "true"
												)						
							),

							array(
								'param_name'  => 'timeout',
								'heading'     => __('Auto Play Speed (ms)', 'rt_theme_admin' ),
								'type'        => 'rt_number',
								'value'       => "",
								"description" => __("Auto play speed value in milliseconds. For example; set 5000 for 5 seconds",'rt_theme_admin'),
								"dependency"  => array(
													"element" => "autoplay",
													"value" => array("true")
												),
							),

							array(
								'param_name'  => 'lightbox',
								'heading'     => __( 'Open Orginal Images in Lightbox', 'rt_theme_admin' ),
								'type'        => 'dropdown',
								"value"       => array(
													__("Disabled","rt_theme_admin") => "false",
													__("Enabled","rt_theme_admin") => "true"
												),
							),

							array(
								'param_name'  => 'margin',
								'heading'     => __('Item Margin', 'rt_theme_admin' ),
								'description' => __('Set a value for the margin between carousel items. Default is 15px', 'rt_theme_admin' ),
								'type'        => 'rt_number',
								'value'       => ''
							),


							array(
								'param_name'  => 'id',
								'heading'     => __('ID', 'rt_theme_admin' ),
								'description' => __('Unique ID', 'rt_theme_admin' ),
								'type'        => 'textfield',
								'value'       => ''
							),

							array(
								'param_name'  => 'class',
								'heading'     => __('Class', 'rt_theme_admin' ),
								'description' => __('CSS Class Name', 'rt_theme_admin' ),
								'type'        => 'textfield'
							),

						)
	)
);	

?>