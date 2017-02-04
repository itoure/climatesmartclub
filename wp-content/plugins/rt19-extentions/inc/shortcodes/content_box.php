<?php
if( ! function_exists("rt_content_box") ){
	/**
	 * Content Box With Image
	 * @param  array $atts
	 * @param  string $content
	 * @return html $output
	 */
	function rt_content_box( $atts, $content = null ) {

	//defaults
	extract(shortcode_atts(array(  
		"id"  => "", 
		"class" => "",
		"featured_image" => "",//image id
		"style" => "style-1",
		"link" => "",
		"link_text" => "",
		"link_target" => "_self",
		"heading_size" => "h4",
		"heading" => "",
		"text_color" => "",
		"text_align" => "left",
		"image_mask_color" => ""
	), $atts));

	//class
	$class .=' image-content-box content-box';

	//box style
	$class .=' box-'.$style;

	//text align
	$class .=' '.$text_align;

	$text_color_css = $mask_css = "";
	if( $style == "style-2" ){

		//font color css
		$text_color_css = $text_color ? 'style="color:'.$text_color.'"' : "";	
	
		//mask css
		$mask_css = $image_mask_color ? 'style="background-color:'.$image_mask_color.'"' : "";	
	}


	//featured image output
	$featured_image_output = $image_url = "";

	if( ! empty( $featured_image ) ){
 
		$image_alternative_text = get_post_meta($featured_image, '_wp_attachment_image_alt', true); 			
		$image_url =  wp_get_attachment_image_src($featured_image,"full"); 
		$image_url = is_array( $image_url ) ? $image_url[0] : "";
 	

		if( ! empty( $image_url ) ){ 
			//create img src
			$featured_image_output = '<img class="img-responsive" src="'.$image_url.'" alt="'.$image_alternative_text.'" />';

			//add links to the featured image
			$featured_image_output =  ! empty( $link ) ? '<a href="'.$link.'" title="'.$link_text.'" target="'.$link_target.'">'.$featured_image_output.'</a>' : $featured_image_output;

			//add holder
			$featured_image_output = '<div class="featured_image_holder">'.$featured_image_output.'</div>';
		} 

	} 

	//heading
	$heading_output = ! empty( $heading ) ? sprintf('<%1$s class="heading">%2$s</%1$s>', $heading_size, $heading ) : "";	
	$heading_output = ! empty( $link ) && ! empty( $heading ) ? sprintf('
	<%1$s class="heading" %6$s>
		<a href="%3$s" title="%4$s" target="%5$s" %6$s>
			%2$s
		</a>
	</%1$s>', $heading_size, $heading, $link, sanitize_text_field($heading), $link_target, $text_color_css ) : $heading_output ;	

	//text  
	$text = rt_visual_composer_content_fix(do_shortcode($content));	

	//link target
	$link_target = ! empty( $link_target ) ? $link_target : '_self';

	//link output
	$link_output = "";

	if ( ! empty( $link ) && ! empty( $link_text ) ) {
			$link_output .= '<a class="read_more" href="'.$link.'" title="'.$link_text.'" target="'.$link_target.'" '.$text_color_css.'>'.$link_text.'</a>';
	}

	//id attr
	$id = ! empty( $id ) ? 'id="'.sanitize_html_class($id).'"' : "";	 

	//class attr
	$class = ! empty( $class ) ? 'class="'.trim($class).'"' : "";	 


	//final output 
	if( $style == "style-1" ){
		//style 1
		$output="";
		$output.= '<article '.$id.' '.$class.'>';
		$output.= $featured_image_output;
		$output.= '<div class="text-holder">'.$heading_output.' '.$text.''.$link_output.'</div>';
		$output.= '</article>'; 
	}else{
		//style 2
		$output="";
		$output.= '
				<article '.$id.' '.$class.'> 
					<div class="background" style="background:url('.$image_url.') no-repeat scroll center center / cover ;">
						<div class="text-holder" '.$text_color_css.'>
							'.$heading_output.' '.$text.' '.$link_output.'
						</div>
						<div class="mask" '.$mask_css.'></div>
					</div>
				</article>
		'; 
	}

	return $output;
	}
}
 
add_shortcode('content_box', 'rt_content_box');