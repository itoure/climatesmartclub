<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = '';
extract(shortcode_atts(array(
	'rt_row_background_width' => '',
	'rt_row_content_width' => '',
	'rt_row_height' => '',
	'rt_row_style' => '',
	'rt_bg_selection' => '',
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
	'class' => '',
	'id' => '',
	'css' => ''
), $atts));
 
wp_enqueue_script( 'wpb_composer_front_js' ); 

$el_class = $this->getExtraClass($el_class);
$class .= " ".apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row '. ( $this->settings('base')==='vc_row_inner' ? 'vc_inner ' : '' ) . get_row_css_class() . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

//row style
$rt_row_style = empty( $rt_row_style ) && $this->settings('base') ==='vc_row' ? "default-style" : $rt_row_style;


$content = wpb_js_remove_wpautop($content,"true");

//create rt_row shortcode
$create_shortcode = '[rt_row vc_base="'.$this->settings('base').'" rt_row_background_width="'.$rt_row_background_width.'" rt_row_content_width="'.$rt_row_content_width.'" rt_row_height="'.$rt_row_height.'" rt_row_style="'.$rt_row_style.'" rt_bg_selection="'.$rt_bg_selection.'" rt_bg_color="'.$rt_bg_color.'" rt_bg_image="'.$rt_bg_image.'" rt_bg_effect="'.$rt_bg_effect.'" rt_bg_parallax_effect="'.$rt_bg_parallax_effect.'" rt_bg_image_repeat="'.$rt_bg_image_repeat.'" rt_bg_position="'.$rt_bg_position.'" rt_bg_size="'.$rt_bg_size.'" rt_bg_attachment="'.$rt_bg_attachment.'" rt_row_paddings="'.$rt_row_paddings.'" rt_padding_top="'.$rt_padding_top.'" rt_padding_bottom="'.$rt_padding_bottom.'" rt_padding_left="'.$rt_padding_left.'" rt_padding_right="'.$rt_padding_right.'" rt_border_radius_tl="'.$rt_border_radius_tl.'" rt_border_radius_tr="'.$rt_border_radius_tr.'" rt_border_radius_bl="'.$rt_border_radius_bl.'" rt_border_radius_br="'.$rt_border_radius_br.'" rt_grid="'.$rt_grid.'" rt_overlap="'.$rt_overlap.'" rt_row_borders="'.$rt_row_borders.'" el_class="'.$el_class.'" class="'.$class.'" id="'.$id.'"]'.$content.'[/rt_row]'; 

//run
echo do_shortcode( $create_shortcode );