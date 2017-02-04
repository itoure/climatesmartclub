<?php
if( ! function_exists("rt_shortcode_button") ){
	/**
	 * Buttons Shortcode
	 * 
	 * @param  array $atts
	 * @param  string $content
	 * @return html $button
	 */			
	function rt_shortcode_button( $atts, $content = null ) {		

	//defaults
	extract(shortcode_atts(array(  
		"id"                => '',
		"class"             => '',
		"button_size"       => 'small',
		"button_text"       => '',
		"button_link"       => '',
		"button_icon"       => '',
		"button_align"      => '',
		"link_open"         => '_self', 
		"button_style"		=> 'default',
		"href_title"		=> '',	
	), $atts));

	$button = ""; 

	$href_title = ! empty( $href_title ) ? $href_title : $button_text;

	//icon output 
	$icon_output = $button_icon ? '<span class="'.$button_icon.'"></span>' : ""; 

	//classes
	$class .= " ".$button_style;
	$class .= " ".$button_size;

	//id attr
	$id_attr = ! empty( $id ) ? 'id="'.$id.'"' : "";

	//button format
	$button_format = '<div class="button_wrapper %8$s"><a %1$s href="%2$s" target="%3$s" title="%4$s" class="button_ %5$s">%6$s%7$s</a></div>';

	$button = sprintf($button_format, $id_attr, $button_link, $link_open, sanitize_text_field( $href_title ), $class, $icon_output, $button_text, "align".$button_align);

	return $button;
	}
}

add_shortcode('button', 'rt_shortcode_button');	