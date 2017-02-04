<?php
/*
*
* RT Google Maps
*
*/

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_google_maps extends WPBakeryShortCodesContainer { }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_location extends WPBakeryShortCode { }
}

vc_map(
	array(
		'base'                    => 'google_maps',
		'name'                    => __( 'Google Maps', 'rt_theme_admin' ),
		'icon'                    => 'rt_theme rt_maps',
		'category'    				  => array(__( 'Content', 'rt_theme_admin' ), __( 'Theme Addons', 'rt_theme_admin' )),
		'description'             => __( 'Google Maps Holder Shortcode', 'rt_theme_admin' ),
		'as_parent'               => array( 'only' => 'location' ),
		'js_view'                 => 'VcColumnView',
		'content_element'         => true,
		"show_settings_on_create" => false,
		'default_content'         => '[location title="' . __( 'Location Title','rt_theme_admin' ) . '"][/location] ',
		'params'                  => array(
					
											array(
												'param_name'  => 'map_id',
												'heading'     => __('ID', 'rt_theme_admin' ),
												'description' => __('Unique ID', 'rt_theme_admin' ),
												'type'        => 'textfield',
												'value'       => ''
											),

											array(
												'param_name'  => 'height',
												'heading'     => __('Height', 'rt_theme_admin' ),
												'description' => __('Map Height', 'rt_theme_admin' ),
												'type'        => 'rt_number'
											),

											array(
												'param_name'  => 'zoom',
												'heading'     => __('Zoom Level', 'rt_theme_admin' ),
												'type'        => 'rt_number',
												'description' => __('Zoom level. Works only with single map location. Enter a zoom level between 1 and 19','rt_theme_admin'),
												'value'       => 10
											),

									)
	)
);
 

vc_map(
	array(
		'base'                    => 'location',
		'name'                    => __( 'Google Map Location', 'rt_theme_admin' ),
		'icon'                    => 'rt_theme rt_location sub',
		'category'                => __( 'Contents', 'rt_theme_admin' ),
		'description'             => __( 'Adds a new location to the map', 'rt_theme_admin' ),
		'as_child'                => array( 'only' => 'google_maps' ),
		"show_settings_on_create" => true,
		'content_element'         => true,
		'params'                  => array(
 
	
											array(
												'param_name'  => 'title',
												'heading'     => __('Location Title', 'rt_theme_admin' ),
												'type'        => 'textfield',
												'holder'      => 'span'
											),

											array(
												'param_name'  => 'content',
												'heading'     => __( 'Location Description', 'rt_theme_admin' ),
												'description' => '',
												'type'        => 'textarea'
											),

											array(
												'value'       => sprintf(__('%sClick here%s to open the location finder to find Latitude and Longitude values easily.', 'rt_theme_admin' ),'<a class="open-rt-location-finder" href="#">','</a>'),
												'param_name'  => 'rt_desc',
												'type'        => 'rt_vc_description'
											),

											
											array(
												'param_name'  => 'lat',
												'heading'     => __('Latitude', 'rt_theme_admin' ),
												'type'        => 'rt_number',
												'class'       => 'geo_selection',
												'edit_field_class' => 'vc_col-sm-12 vc_column wpb_el_type_textfield vc_shortcode-param rt_geo_selection'
											),

											array(
												'param_name'  => 'lon',
												'heading'     => __('Longitude', 'rt_theme_admin' ),
												'type'        => 'rt_number',
												'class'       => 'geo_selection',
												'edit_field_class' => 'vc_col-sm-12 vc_column wpb_el_type_textfield vc_shortcode-param rt_geo_selection'
											),

									)
	)
);		


?>