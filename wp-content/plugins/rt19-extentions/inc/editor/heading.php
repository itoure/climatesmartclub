<?php
/*
*
* Headings
* [rt_heading] 
*
*/

vc_map(
	array(
	  'base'        => 'rt_heading',
	  'name'        => __( 'Heading', 'rt_theme_admin' ),
	  'icon'        => 'rt_theme rt_heading',
	  'category'    => array(__( 'Content', 'rt_theme_admin' ), __( 'Theme Addons', 'rt_theme_admin' )),
	  'description' => __( 'Add a styled heading', 'rt_theme_admin' ),
	  'params'      => array(

							array(
								'param_name'  => 'content',
								'heading'     => __( 'Heading Text', 'rt_theme_admin' ),
								'description' => '',
								'type'        => 'textfield',
								'holder'      => 'div',
								'value'       => __( 'Heading Text', 'rt_theme_admin' ),
							),

							array(
								'param_name'  => 'style',
								'heading'     => __( 'Style', 'rt_theme_admin' ),
								'description' => __( 'Select a style', 'rt_theme_admin' ),
								'type'        => 'dropdown',
								"value"       => array(
													__("Style One - ( w/ a short thin line below )", "rt_theme_admin") => "style-1",
													__("Style Two - ( w/ an arrow points the heading )", "rt_theme_admin") => "style-2", 
													__("Style Three - ( w/ lines before and after )", "rt_theme_admin") => "style-3", 
													__("Style Four - ( w/ a thin line below and punchline - centered ) ", "rt_theme_admin") => "style-4", 
													__("Style Five - ( w/ a thin line below and punchline - left aligned ) ", "rt_theme_admin") => "style-5", 
													__("Style Six - ( w/ a line after - left aligned )  ", "rt_theme_admin") => "style-6", 
													__("Style Seven - (centered) ", "rt_theme_admin") => "style-7", 
													__("No-Style", "rt_theme_admin") => "", 
												),
							),

							array(
								'param_name'  => 'punchline',
								'heading'     => __('Punchline', 'rt_theme_admin' ),
								'description' => __('Optional puchline text', 'rt_theme_admin' ),
								'type'        => 'textfield',
								"dependency"  => array(
												"element" => "style",
												"value" => array("style-4","style-5")
								),										
							),


							array(
								'param_name'  => 'size',
								'heading'     => __( 'Size', 'rt_theme_admin' ),
								'description' => __( 'Select the size of the heading tag', 'rt_theme_admin' ),
								'type'        => 'dropdown',
								"value"       => array(
													"H1" => "h1", 
													"H2" => "h2", 
													"H3" => "h3", 
													"H4" => "h4", 
													"H5" => "h5", 
													"H6" => "h6", 
												),
							),

							array(
								'param_name'  => 'icon_name',
								'heading'     => __('Icon Name', 'rt_theme_admin' ),
								'description' => __('Click inside the field to select an icon or type the icon name', 'rt_theme_admin' ),
								'type'        => 'textfield',
								'class'       => 'icon_selector'
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