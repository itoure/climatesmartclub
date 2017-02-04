<?php

if( ! function_exists("rt_column") ){

	/**
	 * rt_column shortcode
	 * 
	 * creates a holder for contents with several background effects and layouts
	 * 
	 * @param  [array] $atts    
	 * @param  [string] $content  
	 */
	function rt_column( $atts, $content = null ) { 

	extract(shortcode_atts(array(
		'width' => '1/1',
		'id' => '',	
		'class' => '',	
		'rt_font_color' => '',
		'rt_bg_color' => '',
		'rt_bg_image' => '',
		'rt_bg_effect' => '',
		'rt_bg_image_repeat' => '',
		'rt_bg_size' => '',
		'rt_bg_attachment' => '',
		'rt_padding_top' => '',
		'rt_padding_bottom' => '',
		'rt_padding_left' => '',
		'rt_padding_right' => '',
		'rt_color_set' => '',
		'vc_base' => '',
	), $atts));

	$style = $output = "";
	
	//id attr
	$id = ! empty( $id ) ? 'id="'.sanitize_html_class($id).'"' : "";

	//row style
	$class .= ! empty( $rt_color_set ) ? " ".$rt_color_set : "";

	//column width
	if( empty( $vc_base ) ){
		$class .= " col col-xs-12 ".rt_column_class($width)."";		
	}

	//column paddings 
	$style  .= $rt_padding_top != "" ? 'padding-top:'.str_replace("px", "", $rt_padding_top ).'px;': "";
	$style  .= $rt_padding_bottom != "" ? 'padding-bottom:'.str_replace("px", "", $rt_padding_bottom ).'px;': "";
	$style  .= $rt_padding_left != "" ? 'padding-left:'.str_replace("px", "", $rt_padding_left ).'px;': "";
	$style  .= $rt_padding_right != "" ? 'padding-right:'.str_replace("px", "", $rt_padding_right ).'px;': "";

	//background settings
	if( ! empty( $rt_bg_image ) ){
		$bg_image_url =  wp_get_attachment_image_src($rt_bg_image,"full"); 
		$bg_image_url = is_array( $bg_image_url ) ? $bg_image_url[0] : "";	
	 
		//background image
		$style  .= ! empty( $bg_image_url ) ? 'background-image: url('.$bg_image_url.');': "";

		//background repeat
		$style  .= ! empty( $rt_bg_image_repeat ) ? 'background-repeat: '.$rt_bg_image_repeat.';': "";

		//background size
		$style  .= ! empty( $rt_bg_size ) ? 'background-size: '.$rt_bg_size.';': "";

		//background attachment
		$style  .= ! empty( $rt_bg_attachment ) ? 'background-attachment: '.$rt_bg_attachment.';': "";	
	}

	//background color
	$style  .= ! empty( $rt_bg_color ) ? 'background-color: '.$rt_bg_color.';': "";

	//font color
	$style  .= ! empty( $rt_font_color ) ? 'color: '.$rt_font_color.';': "";

	//create styles
	$style_output = ! empty( $style ) ? 'style="'.$style.'"' : "";

	$output .= "\n\t".'<div class="'.trim($class).'" '.$style_output.'>';
	$output .= ! empty( $vc_base ) ? "\n\t\t".'<div class="wpb_wrapper">' : "";
	$output .= "\n\t\t\t".do_shortcode($content);
	$output .= ! empty( $vc_base ) ? "\n\t\t".'</div>' : "";
	$output .= "\n\t".'</div>'."\n";

	return $output;
 

	}

}
add_shortcode('rt_column', 'rt_column'); 

if ( ! class_exists( "Vc_Manager" ) ) {
	add_shortcode('vc_column', 'rt_column'); 
	add_shortcode('vc_column_inner', 'rt_column'); 
}