<?php
/*
*
* Button
*
*/ 
 
vc_map(
	array(
		'base'        => 'button',
		'name'        => __( 'Button', 'rt_theme_admin' ),
		'icon'        => 'rt_theme rt_button',
		'category'    => array(__( 'Content', 'rt_theme_admin' ), __( 'Theme Addons', 'rt_theme_admin' )),
		'description' => __( 'Add a button', 'rt_theme_admin' ),
		'params'      => array(

 
							/* button */

							array(
								'param_name'  => 'button_text',
								'heading'     => __('Button Text', 'rt_theme_admin' ),
								'type'        => 'textfield',
								'value'       => '',
								'holder'      => 'span'
							),

							array(
								'param_name'  => 'button_size',
								'heading'     => __( 'Button Size', 'rt_theme_admin' ),
								'type'        => 'dropdown',
								"value"       => array(
													__("Small", "rt_theme_admin") => "small",
													__("Medium", "rt_theme_admin") => "medium",
													__("Big", "rt_theme_admin") => "big",
												),
							),

							array(
								'param_name'  => 'button_style',
								'heading'     => __( 'Button Style', 'rt_theme_admin' ),
								'type'        => 'dropdown',
								"value"       => array(
													__("Default Flat", "rt_theme_admin") => "default",
													__("Colored Flat", "rt_theme_admin") => "color",
												),
							),

							array(
								'param_name'  => 'button_icon',
								'heading'     => __('Button Icon', 'rt_theme_admin' ),
								'type'        => 'textfield',
								'value'       => '',
							),

							array(
								'param_name'  => 'button_align',
								'heading'     => __( 'Button Align', 'rt_theme_admin' ),
								'type'        => 'dropdown',
								"value"       => array(
													__("Default", "rt_theme_admin") => "",
													__("Left", "rt_theme_admin") => "left",
													__("Right", "rt_theme_admin") => "right",
													__("Center", "rt_theme_admin") => "center",													
												),
							),

							array(
								'param_name'  => 'button_link',
								'heading'     => __('Link', 'rt_theme_admin' ),
								'type'        => 'textfield',
								'value'       => '',
							),

							array(
								'param_name'  => 'link_open',
								'heading'     => __('Link Target', 'rt_theme_admin' ),
								'type'        => 'dropdown',
								"value"       => array(
													__("Same Tab", "rt_theme_admin") => "_self",
													__("New Tab", "rt_theme_admin") => "_blank", 
												),
							),

							array(
								'param_name'  => 'href_title',
								'heading'     => __('Link Title', 'rt_theme_admin' ),
								'type'        => 'dropdown',
								'type'        => 'textfield',
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