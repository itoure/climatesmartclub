<?php
if( ! function_exists("rt_dividers") ){
	/**
	 * Divider
	 * @param  array $atts
	 * @param  string $content
	 * @return html $divider
	 */
	function rt_dividers( $atts, $content = null ) {		
 
 	//defaults
	extract(shortcode_atts(array(
		"id"            => '',
		"class"         => '',		
		"style"         => 'style-5',
		"margin_top"    => '0',
		"margin_bottom" => '0',
	), $atts));

	//id attr
	$id_attr = ! empty( $id ) ? 'id="'.sanitize_html_class($id).'"' : "";	  
 
 	//margins
	$style_output = $margin_top != "" ? "margin-top:".$margin_top."px;" : "";
 	$style_output .= $margin_bottom != "" ? "margin-bottom:".$margin_bottom."px;" : "";
	$style_output = ! empty( $style_output ) ? 'style="'.$style_output.'"' : "";

	//output
	$divider = sprintf('<div %1$s class="rt_divider %3$s %2$s" %4$s></div>', $id_attr, sanitize_html_class($class), $style, $style_output);

	return $divider;

	}
}

add_shortcode('rt_divider', 'rt_dividers'); 		 
