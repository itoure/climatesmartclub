<?php
if( ! function_exists("rt_row") ){

	/**
	 * rt_row shortcode
	 * 
	 * creates a holder for contents with several background effects and layouts
	 * 
	 * @param  [array] $atts    
	 * @param  [string] $content  
	 */
	function rt_row( $atts, $content = null, $tag = "" ) { 

	extract(shortcode_atts(array(
		'rt_row_background_width' => '',
		'rt_row_content_width' => '',
		'rt_row_height' => '',
		'rt_row_style' => '',
		'rt_bg_color' => '',
		'rt_bg_image' => '',
		'rt_bg_effect' => '',
		'rt_bg_parallax_effect' => '',
		'rt_bg_image_repeat' => '',
		'rt_bg_position' => '',
		'rt_bg_size' => '',
		'rt_bg_attachment' => '',
		'rt_row_paddings' => '',
		'rt_padding_top' => '',
		'rt_padding_bottom' => '',
		'rt_padding_left' => '',
		'rt_padding_right' => '',   
		'rt_border_radius_tl' => '',
		'rt_border_radius_tr' => '',
		'rt_border_radius_bl' => '',
		'rt_border_radius_br' => '',   			
		'rt_grid' => "",  
		'rt_overlap' => "",   
		'rt_row_borders' => "",
		'el_class' => '',
		'vc_base' => '',
		'class' => '',
		'id' => ''
	), $atts));


	$style = $bg_style = $output = $wrapper_style = $wrapper_class = "";

	//image id attr
	$id = ! empty( $id ) ? 'id="'.sanitize_html_class($id).'"' : "";

	//el_class
	$class .= ! empty( $el_class ) ? " ".$el_class : "";	

	//row style
	$class .= ! empty( $rt_row_style ) ? " ".$rt_row_style : "";	

	//row background width
	$class .= ! empty( $rt_row_background_width ) ? " ".$rt_row_background_width : "";

	//border grid
	$class .= ! empty( $rt_grid ) && $rt_grid == "true" ? " border_grid fixed_heights" : "";

	//overlap
	$class .= ! empty( $rt_overlap ) && $rt_overlap == "true" ? " overlap" : "";

	/*
	*	Background options  
	*/
	//background image
	$bg_image_url = "";


	if( $rt_bg_image ){
		$bg_image_url = rt_get_attachment_image_src($rt_bg_image); 		
	}


	/**
	 * Paddings
	 */
	if($rt_row_paddings !== "false"){
		//row paddings for left & right 10 is the default value
		$rt_padding_left = $rt_padding_left == "10" ? "" : $rt_padding_left;
		$rt_padding_right = $rt_padding_right == "10" ? "" : $rt_padding_right;

		//row paddings for top & bottom 20 is the default value
		$rt_padding_top = $rt_padding_top == "20" ? "" : $rt_padding_top;
		$rt_padding_bottom = $rt_padding_bottom == "20" ? "" : $rt_padding_bottom;


		//css for row paddings
		$wrapper_style  .= $rt_padding_top != "" ? 'padding-top:'.str_replace("px", "", $rt_padding_top ).'px;': "";
		$wrapper_style  .= $rt_padding_bottom != "" ? 'padding-bottom:'.str_replace("px", "", $rt_padding_bottom ).'px;': "";
		$wrapper_style  .= $rt_padding_left != "" ? 'padding-left:'.str_replace("px", "", $rt_padding_left ).'px;': "";
		$wrapper_style  .= $rt_padding_right != "" ? 'padding-right:'.str_replace("px", "", $rt_padding_right ).'px;': "";	
	}else{
		$wrapper_class = "nopadding";
	}

	/**
	 * Borders
	 */
	$rt_row_borders = ! empty( $rt_row_borders ) ? explode(",", $rt_row_borders) : array();

	foreach ($rt_row_borders as $v) {
		$class .= " border-".$v;
	}	

	//radius
	$style .= $rt_border_radius_tl != "" ? 'border-top-left-radius:'.str_replace("%", "", $rt_border_radius_tl ).'%;': "";
	$style .= $rt_border_radius_tr != "" ? 'border-top-right-radius:'.str_replace("%", "", $rt_border_radius_tr ).'%;': "";
	$style .= $rt_border_radius_bl != "" ? 'border-bottom-left-radius:'.str_replace("%", "", $rt_border_radius_bl ).'%;': "";
	$style .= $rt_border_radius_br != "" ? 'border-bottom-right-radius:'.str_replace("%", "", $rt_border_radius_br ).'%;': "";	

	//row height
	$wrapper_style .= ! empty( $rt_row_height ) ? 'height:'.str_replace("px", "", $rt_row_height ).'px;': ""; 

	//parallax settings 
	$parallax = "";
	

	/**
	 * classic bg values
	 */
	
	if( ! empty( $bg_image_url ) ){
		//background image
		$bg_style  .= 'background-image: url('.$bg_image_url.');';
		
		//background repeat
		$bg_style  .= ! empty( $rt_bg_image_repeat ) ? 'background-repeat: '.$rt_bg_image_repeat.';': "";

		//background size
		$bg_style  .= ! empty( $rt_bg_size ) ? 'background-size: '.$rt_bg_size.';': "";

		//background attachment
		$rt_bg_attachment = $rt_bg_effect != "parallax" ? $rt_bg_attachment : "";
		$bg_style  .= ! empty( $rt_bg_attachment ) ? 'background-attachment: '.$rt_bg_attachment.';': "";

		//background position
		//$rt_bg_position = $rt_bg_effect == "parallax" ? "center" : $rt_bg_position;
		$bg_style  .= ! empty( $rt_bg_position ) ? 'background-position: '.$rt_bg_position.';': "";		
	}	

	//background color
	$bg_style  .= ! empty( $rt_bg_color ) ? 'background-color: '.$rt_bg_color.';': "";


	if( $rt_bg_effect == "parallax" && ! empty( $bg_image_url ) ){

		//parallax settings
		$parallax_settings = array(
					"1"=> array( "effect" => "horizontal", "direction" => -1),
					"2"=> array( "effect" => "horizontal", "direction" => 1),
					"3"=> array( "effect" => "vertical", "direction" => -1),
					"4"=> array( "effect" => "vertical", "direction" => 1),
					);		

		$bg_style .= "width:100%;height:100%;top:0;";

		$parallax = ! empty( $bg_image_url ) && $rt_bg_effect == "parallax" ? '<div class="rt-parallax-background" data-rt-parallax-direction="'. $parallax_settings[$rt_bg_parallax_effect]["direction"] .'" data-rt-parallax-effect="'.$parallax_settings[$rt_bg_parallax_effect]["effect"].'" style="'.$bg_style.'"></div>':"";		

		$bg_style = "";
		$style  .= "position:relative;overflow:hidden;";
	}

	//create styles
	$style .= $bg_style;
	$style_output = ! empty( $style ) ? 'style="'.$style.'"' : "";
	$wrapper_style = ! empty( $wrapper_style ) ? 'style="'.$wrapper_style.'"' : "";

	//content output
	$content_output = $vc_base ==='vc_row' || empty( $vc_base ) && $tag != "vc_row_inner" ? '<div class="content_row_wrapper '. $wrapper_class .' '. $rt_row_content_width .'" '. $wrapper_style .'>'.do_shortcode($content).'</div>' : do_shortcode($content);


	$output .= "\n".'<div '.$id.' class="content_row row '.trim($class).'" '.$style_output.'>';
	$output .= "\n\t".$parallax;
	$output .= "\n\t".$content_output;
	$output .= "\n".'</div>'."\n";

	return $output;

	}

}
add_shortcode('rt_row', 'rt_row'); 


if ( ! class_exists( "Vc_Manager" ) ) {
	add_shortcode('vc_row', 'rt_row'); 
	add_shortcode('vc_row_inner', 'rt_row'); 
}