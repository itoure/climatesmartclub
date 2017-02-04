<?php

extract(shortcode_atts(array(
		"id" => '',
		"class"=> '',		
		"title" => 'title',
		"icon_name" => 'icon_name', 
), $atts));

$content = wpb_js_remove_wpautop($content,"true");

//create rt_row shortcode
$create_shortcode = '[rt_accordion_content id="'.$id.'" class="'.$class.'" title="'.$title.'" icon_name="'.$icon_name.'"]'.$content.'[/rt_accordion_content]'; 

//run
echo $create_shortcode;