<?php
if( ! function_exists("rt_icons") ){
	/**
	 * Icons Shortcode
	 * @param  array $atts
	 * @return html
	 */
	function rt_icons( $atts ) {
		
	//defaults
	extract(shortcode_atts(array(
		"name"  => '',
	), $atts));

	return '<span class="'.$name.'"></span>';
	}
}

add_shortcode('icon', 'rt_icons'); 			
