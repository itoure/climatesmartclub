<?php
if( ! function_exists("rt_heading_function") ){
	/**
	 * Heading Shortcode
	 * 
	 * @param  array $atts
	 * @param  string $content
	 * @return html $heading_output
	 */	
	function rt_heading_function( $atts, $content = null ) {

	//defaults
	extract(shortcode_atts(array(
		"id" => '',
		"class" => '',
		"style" => '',
		"icon_name" => '',
		"punchline" => '',
		"size" => 'h1',
	), $atts));

	$content = $content;

	//id attr
	$id = ! empty( $id ) ? 'id="'.sanitize_html_class($id).'"' : "";	

	//punchline
	$punchline = ! empty( $punchline ) && ( $style == "style-4" || $style == "style-5" ) ? sprintf('<span class="punchline">%s</span>', $punchline) : "";

	//add class
	$class .= ! empty( $punchline ) ? ' with_punchline' : "";

	//style 7 - centered
	$class .= $style == "style-7" ? ' aligncenter' : "";

	//icon
	$icon_output = ! empty( $icon_name ) ? sprintf('<span class="%s heading_icon"></span>', $icon_name) : "";

	$heading_output = "";


	//output for style 2,3,4
	$heading_output = ! empty( $content ) ? sprintf(
					'<div class="rt_heading_wrapper %3$s">
						%7$s
						<%1$s class="rt_heading %2$s %3$s" %4$s>%5$s%6$s</%1$s>
					</div>',
					$size, $class, $style, $id, $icon_output, $content, $punchline) : $heading_output;

	

	return $heading_output; 

	}
}

add_shortcode('rt_heading', 'rt_heading_function'); 