<?php

extract(shortcode_atts(array(
	'font_color'         => '',
	'el_class'           => '',
	'width'              => '1/1',
	'css'                => '',	
	'offset'             => '',	
	'id'                 => '',	
	'class'              => '',	
	'rt_font_color'      => '',	
	'rt_bg_color'        => '',
	'rt_bg_image'        => '',
	'rt_bg_effect'       => '',
	'rt_bg_image_repeat' => '',
	'rt_bg_size'         => '',
	'rt_bg_attachment'   => '',
	'rt_padding_top'     => '',
	'rt_padding_bottom'  => '',
	'rt_padding_left'    => '',
	'rt_padding_right'   => '',
	'rt_color_set'       => '', 
), $atts));

$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);
$width = vc_column_offset_class_merge($offset, $width);
$el_class .= ' wpb_column vc_column_container';

$class .= " ".apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$content = wpb_js_remove_wpautop($content,"true");

//create shortcode
$create_shortcode = '[rt_column vc_base="'.$this->settings('base').'" width="'.$width.'" rt_font_color="'.$font_color.'" id="'.$id.'" class="'.$class.'" rt_bg_color="'.$rt_bg_color.'" rt_bg_image="'.$rt_bg_image.'" rt_bg_effect="'.$rt_bg_effect.'" rt_bg_image_repeat="'.$rt_bg_image_repeat.'" rt_bg_size="'.$rt_bg_size.'" rt_bg_attachment="'.$rt_bg_attachment.'" rt_padding_top="'.$rt_padding_top.'" rt_padding_bottom="'.$rt_padding_bottom.'" rt_padding_left="'.$rt_padding_left.'" rt_padding_right="'.$rt_padding_right.'" rt_color_set="'.$rt_color_set.'"]'.$content.'[/rt_column]';

//run
echo do_shortcode( $create_shortcode );