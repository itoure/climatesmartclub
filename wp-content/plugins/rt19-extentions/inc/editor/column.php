<?php
/*
*
* Column
* [Column] 
*
*/
vc_map_update( 'vc_column', array(
	'icon'        => 'content-band',
	'category'    => array(__( 'Structure', 'rt_theme_admin' ), __( 'Theme Addons', 'rt_theme_admin' )),
));


rt_vc_add_param( array('vc_column','vc_column_inner'), array(
	'param_name'  => 'rt_color_set',
	'heading'     => __( 'Column Color Scheme', 'rt_theme_admin' ),
	'description' => __( 'Select a color scheme for the column.', 'rt_theme_admin' ),
	'type'        => 'dropdown',
	"value"       => array(
						__("Global", "rt_theme_admin") => "global-style",
						__("Color Set 1", "rt_theme_admin") => "default-style",
						__("Color Set 2", "rt_theme_admin") => "alt-style-1",
						__("Color Set 3", "rt_theme_admin") => "alt-style-2",
						__("Color Set 4", "rt_theme_admin") => "light-style",
					)
));



//remove vc_column params
rt_vc_remove_param('vc_column', array('bg_color','font_color','padding','margin_bottom','bg_image','bg_image_repeat','el_class','css'));
rt_vc_remove_param('vc_column_inner', array('bg_color','font_color','padding','margin_bottom','bg_image','bg_image_repeat','el_class','css'));


			//column general options	
			rt_vc_add_param( array('vc_column','vc_column_inner'), array(
				'param_name'  => 'id',
				'heading'     => __('ID', 'rt_theme_admin' ),
				'description' => __('Unique ID', 'rt_theme_admin' ),
				'type'        => 'textfield',
				'value'       => ''
			));

			rt_vc_add_param( array('vc_column','vc_column_inner'), array(
				'param_name'  => 'class',
				'heading'     => __('Class', 'rt_theme_admin' ),
				'description' => __('CSS Class Name', 'rt_theme_admin' ),
				'type'        => 'textfield'
			));			

			rt_vc_add_param( array('vc_column','vc_column_inner'), array(
				'param_name'  => 'rt_padding_top',
				'heading'     => __( 'Padding Top', 'rt_theme_admin' ),
				'description' => __( 'Set padding top value (px)', 'rt_theme_admin' ),
				'type'        => 'rt_number',
			));

			rt_vc_add_param( array('vc_column','vc_column_inner'), array(
				'param_name'  => 'rt_padding_bottom',
				'heading'     => __( 'Padding Bottom', 'rt_theme_admin' ),
				'description' => __( 'Set padding bottom value (px)', 'rt_theme_admin' ),
				'type'        => 'rt_number',
			));

			rt_vc_add_param( array('vc_column','vc_column_inner'), array(
				'param_name'  => 'rt_padding_left',
				'heading'     => __( 'Padding Left', 'rt_theme_admin' ),
				'description' => __( 'Set padding left value (px)', 'rt_theme_admin' ),
				'type'        => 'rt_number',
			));

			rt_vc_add_param( array('vc_column','vc_column_inner'), array(
				'param_name'  => 'rt_padding_right',
				'heading'     => __( 'Padding Right', 'rt_theme_admin' ),
				'description' => __( 'Set padding right value (px)', 'rt_theme_admin' ),
				'type'        => 'rt_number',
			));	


			//column background options
			rt_vc_add_param( array('vc_column','vc_column_inner'), array(
				'param_name'  => 'rt_bg_image',
				'heading'     => __( 'Background Image', 'rt_theme_admin' ),
				'description' => __( 'Select a background image', 'rt_theme_admin' ),
				'type'        => 'attach_image',	
				'group'       => __( 'Background Options', 'rt_theme_admin' )
			));


			rt_vc_add_param( array('vc_column','vc_column_inner'), array(
				'param_name'  => 'rt_bg_color',
				'heading'     => __( 'Background Color', 'rt_theme_admin' ),
				'description' => __( 'Select a background color for the content row', 'rt_theme_admin' ),
				'type'        => 'colorpicker',
				'group'       => __( 'Background Options', 'rt_theme_admin' ),
				"dependency"  => array(
										"element" => "rt_bg_effect",
										"value" => array("classic")
									),		
			));

			rt_vc_add_param( array('vc_column','vc_column_inner'), array(
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

			rt_vc_add_param( array('vc_column','vc_column_inner'), array(
				'param_name'  => 'rt_bg_size',
				'heading'     => __( 'Background Image Size', 'rt_theme_admin' ),
				'description' => __( 'Select and set size / coverage behaviour for the background image.', 'rt_theme_admin' ),
				'type'        => 'dropdown', 
				"value"       => array(		
									__("Auto","rt_theme_admin") => "auto auto",
									__("Cover","rt_theme_admin") => "cover",
									__("Contain","rt_theme_admin") => "contain",
									__("100%","rt_theme_admin") => "100% auto",
									__("50%","rt_theme_admin") => "50% auto",
									__("25%","rt_theme_admin") => "25% auto",
								),	
				'group'       => __( 'Background Options', 'rt_theme_admin' ),
			));

			rt_vc_add_param( array('vc_column','vc_column_inner'), array(
				'param_name'  => 'rt_bg_attachment',
				'heading'     => __( 'Background Attachment', 'rt_theme_admin' ),
				'description' => __( 'Select and set fixed or scroll mode for the background image.', 'rt_theme_admin' ),
				'type'        => 'dropdown', 
				"value"       => array(		
									__("Scroll","rt_theme_admin") => "scroll",
									__("Fixed","rt_theme_admin") => "fixed",  
								),	
				'group'       => __( 'Background Options', 'rt_theme_admin' ),	
			));		


?>