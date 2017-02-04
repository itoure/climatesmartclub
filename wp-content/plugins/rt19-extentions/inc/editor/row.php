<?php
/*
*
* Rows
*
*/
vc_map_update( 'vc_row', array(
	'category'    => array(__( 'Structure', 'rt_theme_admin' ), __( 'Theme Addons', 'rt_theme_admin' )),
));

//remove vc_row params
rt_vc_remove_param('vc_row', array('full_width','bg_color','font_color','padding','margin_bottom','bg_image','bg_image_repeat','el_class','css'));


//general options
vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_row_background_width',
	'heading'     => __( 'Row Background Width', 'rt_theme_admin' ),
	'description' => __( 'Select a pre-defined width for the row background', 'rt_theme_admin' ),
	'type'        => 'dropdown',
	"value"       => array(
						__("Default Width", "rt_theme_admin") => "default",
						__("Full Width", "rt_theme_admin") => "fullwidth",
					),				
	'group'       => __( 'General', 'rt_theme_admin' )
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_row_content_width',
	'heading'     => __( 'Row Content Width', 'rt_theme_admin' ),
	'description' => __( 'Select a pre-defined width for the row content', 'rt_theme_admin' ),
	'type'        => 'dropdown',
	"value"       => array(
						__("Default Width", "rt_theme_admin") => "default",
						__("Full Width", "rt_theme_admin") => "fullwidth",
					),				
	'group'       => __( 'General', 'rt_theme_admin' ),
	"dependency"  => array(
							"element" => "rt_row_background_width",
							"value" => array("fullwidth")
						),		
));


vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_row_style',
	'heading'     => __( 'Row Style', 'rt_theme_admin' ),
	'description' => __( 'Select a color scheme for the row.', 'rt_theme_admin' ),
	'type'        => 'dropdown',
	"value"       => array(
						__("Color Set 1", "rt_theme_admin") => "default-style",
						__("Color Set 2", "rt_theme_admin") => "alt-style-1",
						__("Color Set 3", "rt_theme_admin") => "alt-style-2",
						__("Color Set 4", "rt_theme_admin") => "light-style",
					),				
	'group'       => __( 'General', 'rt_theme_admin' )
));

vc_add_param( 'vc_row_inner', array(
	'param_name'  => 'rt_row_style',
	'heading'     => __( 'Row Style', 'rt_theme_admin' ),
	'description' => __( 'Select a color scheme for the row.', 'rt_theme_admin' ),
	'type'        => 'dropdown',
	"value"       => array(
						__("Global", "rt_theme_admin") => "global-style",
						__("Color Set 1", "rt_theme_admin") => "default-style",
						__("Color Set 2", "rt_theme_admin") => "alt-style-1",
						__("Color Set 3", "rt_theme_admin") => "alt-style-2",
						__("Color Set 4", "rt_theme_admin") => "light-style",
					),				
	'group'       => __( 'General', 'rt_theme_admin' )
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_row_borders',
	'heading'     => __( 'Row Borders', 'rt_theme_admin' ),
	'type'        => 'checkbox',
	"value"       => array(
						__("Top Border", "rt_theme_admin") => "top",
						__("Bottom Border", "rt_theme_admin") => "bottom",
					),				
	'group'       => __( 'General', 'rt_theme_admin' )
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_overlap',
	'heading'     => __( 'Overlap', 'rt_theme_admin' ),
	'type'        => 'checkbox',
	"value"       => array(
						__("Overlap to the previous row", "rt_theme_admin") => "true",
					),				
	'group'       => __( 'General', 'rt_theme_admin' )
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_grid',
	'heading'     => __( 'Grid View', 'rt_theme_admin' ),
	'type'        => 'checkbox',
	"value"       => array(
						__("Display the columns as a grid with borders.", "rt_theme_admin") => "true",
					),
	'group'       => __( 'General', 'rt_theme_admin' )
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_row_height',
	'heading'     => __( 'Minimum Row Height', 'rt_theme_admin' ),
	'description' => __( 'You can set a minimum height for the row', 'rt_theme_admin' ),
	'type'        => 'rt_number',
	'group'       => __( 'General', 'rt_theme_admin' )
)); 

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_row_paddings',
	'heading'     => __( 'Paddings', 'rt_theme_admin' ),
	'description' => __( 'Remove/add paddings (gaps) around the row.', 'rt_theme_admin' ),
	'type'        => 'dropdown',
	"value"       => array(
						__("Add Paddings", "rt_theme_admin") => "true", 
						__("No Paddings", "rt_theme_admin") => "false",
					),						
	'group'       => __( 'Paddings', 'rt_theme_admin' )
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_padding_top',
	'heading'     => __( 'Padding Top', 'rt_theme_admin' ),
	'description' => __( 'Set padding top value (px) Default is 20px', 'rt_theme_admin' ),
	'type'        => 'rt_number',
	'group'       => __( 'Paddings', 'rt_theme_admin' ),
	"dependency"  => array(
							"element" => "rt_row_paddings",
							"value" => array("true")
						),		
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_padding_bottom',
	'heading'     => __( 'Padding Bottom', 'rt_theme_admin' ),
	'description' => __( 'Set padding bottom value (px) Default is 20px', 'rt_theme_admin' ),
	'type'        => 'rt_number',
	'group'       => __( 'Paddings', 'rt_theme_admin' ),
	"dependency"  => array(
							"element" => "rt_row_paddings",
							"value" => array("true")
						),	
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_padding_left',
	'heading'     => __( 'Padding Left', 'rt_theme_admin' ),
	'description' => __( 'Set padding left value (px) Default is 10px', 'rt_theme_admin' ),
	'type'        => 'rt_number',
	'group'       => __( 'Paddings', 'rt_theme_admin' ),
	"dependency"  => array(
							"element" => "rt_row_paddings",
							"value" => array("true")
						),	
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_padding_right',
	'heading'     => __( 'Padding Right', 'rt_theme_admin' ),
	'description' => __( 'Set padding right value (px) Default is 10px', 'rt_theme_admin' ),
	'type'        => 'rt_number',
	'group'       => __( 'Paddings', 'rt_theme_admin' ),
	"dependency"  => array(
							"element" => "rt_row_paddings",
							"value" => array("true")
						),	
));	


/*
		//safari doesn't support border-radius when we have css transforms inside the row such as sliders

		vc_add_param( 'vc_row', array(
			'param_name'  => 'rt_border_radius_tl',
			'heading'     => __( 'Border Top Left Radius', 'rt_theme_admin' ),
			'description' => __( 'Set top left border radius value (%)', 'rt_theme_admin' ),
			'type'        => 'rt_number',
			'group'       => __( 'Borders', 'rt_theme_admin' ),	
		));

		vc_add_param( 'vc_row', array(
			'param_name'  => 'rt_border_radius_tr',
			'heading'     => __( 'Border Top Right Radius', 'rt_theme_admin' ),
			'description' => __( 'Set top right border radius value (%)', 'rt_theme_admin' ),
			'type'        => 'rt_number',
			'group'       => __( 'Borders', 'rt_theme_admin' ),
		));

		vc_add_param( 'vc_row', array(
			'param_name'  => 'rt_border_radius_bl',
			'heading'     => __( 'Border Bottom Left Radius', 'rt_theme_admin' ),
			'description' => __( 'Set bottom left border radius value (%)', 'rt_theme_admin' ),
			'type'        => 'rt_number',
			'group'       => __( 'Borders', 'rt_theme_admin' ),
		));

		vc_add_param( 'vc_row', array(
			'param_name'  => 'rt_border_radius_br',
			'heading'     => __( 'Border Bottom Right Radius', 'rt_theme_admin' ),
			'description' => __( 'Set bottom right border radius value (%)', 'rt_theme_admin' ),
			'type'        => 'rt_number',
			'group'       => __( 'Borders', 'rt_theme_admin' ),
		));	
*/

vc_add_param( 'vc_row', array(
	'param_name'  => 'id',
	'heading'     => __('ID', 'rt_theme_admin' ),
	'description' => __('Unique ID', 'rt_theme_admin' ),
	'type'        => 'textfield',
	'value'       => '',
	'group'       => __( 'General', 'rt_theme_admin' )
));	

vc_add_param( 'vc_row', array(
	'param_name'  => 'class',
	'heading'     => __('Class', 'rt_theme_admin' ),
	'description' => __('CSS Class Name', 'rt_theme_admin' ),
	'type'        => 'textfield',
	'group'       => __( 'General', 'rt_theme_admin' )
));	


//background options
vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_bg_image',
	'heading'     => __( 'Background Image', 'rt_theme_admin' ),
	'description' => __( 'Select a background image', 'rt_theme_admin' ),
	'type'        => 'attach_image',	
	'group'       => __( 'Background Options', 'rt_theme_admin' )
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_bg_effect',
	'heading'     => __( 'Background Effect', 'rt_theme_admin' ),
	'description' => __( 'Select the background effect', 'rt_theme_admin' ),
	'type'        => 'dropdown',
	"value"       => array(
						__("Classic", "rt_theme_admin") => "classic",
						__("Parallax Image", "rt_theme_admin") => "parallax",
					),				
	'group'       => __( 'Background Options', 'rt_theme_admin' )
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_bg_color',
	'heading'     => __( 'Background Color', 'rt_theme_admin' ),
	'description' => __( 'Select a background color for the content row', 'rt_theme_admin' ),
	'type'        => 'colorpicker',
	'group'       => __( 'Background Options', 'rt_theme_admin' ),
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_bg_parallax_effect',
	'heading'     => __( 'Parallax Effect', 'rt_theme_admin' ),
	'description' => __( 'Select the parallax style set repeat mode direction for the background image.', 'rt_theme_admin' ),
	'type'        => 'dropdown',
	"value"       => array(		
						__("Horizontally, from left to right",'rt_theme_admin') => "1",  
						__("Horizontally, from right to left",'rt_theme_admin') => "2",  
						__("Vertically, from top to bottom",'rt_theme_admin') => "3",  
						__("Vertically, from bottom to top",'rt_theme_admin') => "4",  																
					),
	'group'       => __( 'Background Options', 'rt_theme_admin' ),
	"dependency"  => array(
							"element" => "rt_bg_effect",
							"value" => array("parallax")
						),						
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_bg_image_repeat',
	'heading'     => __( 'Background Repeat', 'rt_theme_admin' ),
	'description' => __( 'Select and set repeat mode direction for the background image.', 'rt_theme_admin' ),
	'type'        => 'dropdown',
	"value"       => array(		
						__("Tile","rt_theme_admin") => "repeat",
						__("Tile Horizontally","rt_theme_admin") => "repeat-x",
						__("Tile Vertically","rt_theme_admin") => "repeat-y",
						__("No Repeat","rt_theme_admin") => "no-repeat"
					),
	'group'       => __( 'Background Options', 'rt_theme_admin' ),
				
));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_bg_size',
	'heading'     => __( 'Background Image Size', 'rt_theme_admin' ),
	'description' => __( 'Select and set size / coverage behaviour for the background image.', 'rt_theme_admin' ),
	'type'        => 'dropdown', 
	"value"       => array(		
						__("Cover","rt_theme_admin") => "cover",
						__("Auto","rt_theme_admin") => "auto auto",						
						__("Contain","rt_theme_admin") => "contain",
						__("100%","rt_theme_admin") => "100% auto",
						__("50%","rt_theme_admin") => "50% auto",
						__("25%","rt_theme_admin") => "25% auto",
					),	
	'group'       => __( 'Background Options', 'rt_theme_admin' ),

));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_bg_position',
	'heading'     => __( 'Background Position', 'rt_theme_admin' ),
	'description' => __( 'Select a positon for the background image.', 'rt_theme_admin' ),
	'type'        => 'dropdown', 
	"value"       => array(		
						__("Right Top","rt_theme_admin") => "right top",
						__("Right Center","rt_theme_admin") => "right center",
						__("Right Bottom","rt_theme_admin") => "right bottom",
						__("Left Top","rt_theme_admin") => "left top",
						__("Left Center","rt_theme_admin") => "left center",
						__("Left Bottom","rt_theme_admin") => "left bottom",
						__("Center Top","rt_theme_admin") => "center top",
						__("Center Center","rt_theme_admin") => "center center",
						__("Center Bottom","rt_theme_admin") => "center bottom",
					),	
	'group'       => __( 'Background Options', 'rt_theme_admin' ),

));

vc_add_param( 'vc_row', array(
	'param_name'  => 'rt_bg_attachment',
	'heading'     => __( 'Background Attachment', 'rt_theme_admin' ),
	'description' => __( 'Select and set fixed or scroll mode for the background image.', 'rt_theme_admin' ),
	'type'        => 'dropdown', 
	"value"       => array(		
						__("Scroll","rt_theme_admin") => "scroll",
						__("Fixed","rt_theme_admin") => "fixed",  
					),	
	'group'       => __( 'Background Options', 'rt_theme_admin' ),
	"dependency"  => array(
							"element" => "rt_bg_effect",
							"value" => array("classic")
						),			
	
));					

?>