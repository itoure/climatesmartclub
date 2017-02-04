<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * RT-Theme Blog Options
 */
		$this->options["typography"] = array(

				'title' => __("Typography Options", "rt_theme_admin"), 
				'description' => "", 
				'priority' => 3,
				'sections' => array(

									array(
										'id'       => 'body',
										'title'    => __("Body", "rt_theme_admin"), 
										'controls' => array( 
															array(
																"id"          => RT_THEMESLUG.'_body_font',															
																"label"       => __("Font",'rt_theme_admin'),
																//"description" => __("",'rt_theme_admin'),
																"choices"     =>  $this->fonts,
																"input_attrs" => array("class"=>"rt_fonts", "data-variant-id"=> RT_THEMESLUG.'_body_font_variant', "data-subset-id"=> RT_THEMESLUG.'_body_font_subset'),
																"default"   => "google||Source Sans Pro",
																"transport" => "refresh", 
																"type"      => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => RT_THEMESLUG.'_body_font_subset',															
																"label"       => __("Subsets",'rt_theme_admin'),
																//"description" => __("",'rt_theme_admin'),
																"choices"     => array(),			
																"default"     => array("latin","latin-ext"),
																"input_attrs" => array("multiple"=>"multiple"),
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => RT_THEMESLUG.'_body_font_variant',															
																"label"       => __("Font Weight",'rt_theme_admin'),
																//"description" => __("",'rt_theme_admin'),
																"choices"     =>  array(),			
																"default"     => "regular",
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"label"       => __("Body Font Size",'rt_theme_admin'),																
																"id"          => RT_THEMESLUG."_body_font_size",
																"default"     => "15", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

													),
									),		

									array(
										'id'       => 'headings',
										'title'    => __("Headings", "rt_theme_admin"), 
										'controls' => array( 
															array(
																"id"          => RT_THEMESLUG.'_heading_font',															
																"label"       => __("Font",'rt_theme_admin'),
																//"description" => __("",'rt_theme_admin'),
																"choices"     =>  $this->fonts,
																"input_attrs" => array("class"=>"rt_fonts", "data-variant-id"=> RT_THEMESLUG.'_heading_font_variant', "data-subset-id"=> RT_THEMESLUG.'_heading_font_subset'),
																"default"   => "google||Roboto",
																"transport" => "refresh", 
																"type"      => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => RT_THEMESLUG.'_heading_font_subset',															
																"label"       => __("Subsets",'rt_theme_admin'),
																//"description" => __("",'rt_theme_admin'),
																"choices"     => array(),			
																"default"     => array("latin","latin-ext"),
																"input_attrs" => array("multiple"=>"multiple"),
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => RT_THEMESLUG.'_heading_font_variant',															
																"label"       => __("Font Weight",'rt_theme_admin'),
																//"description" => __("",'rt_theme_admin'),
																"choices"     =>  array(),			
																"default"     => "300",
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),


															array(
																"label"       => __("H1 Font Size",'rt_theme_admin'),																
																"id"          => RT_THEMESLUG."_h1_font_size",
																"default"     => "44", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

															array(
																"label"       => __("H2 Font Size",'rt_theme_admin'),																
																"id"          => RT_THEMESLUG."_h2_font_size",
																"default"     => "30", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),
															array(
																"label"       => __("H3 Font Size",'rt_theme_admin'),																
																"id"          => RT_THEMESLUG."_h3_font_size",
																"default"     => "26", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),
															array(
																"label"       => __("H4 Font Size",'rt_theme_admin'),																
																"id"          => RT_THEMESLUG."_h4_font_size",
																"default"     => "24", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),
															array(
																"label"       => __("H5 Font Size",'rt_theme_admin'),																
																"id"          => RT_THEMESLUG."_h5_font_size",
																"default"     => "22", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),
															array(
																"label"       => __("H6 Font Size",'rt_theme_admin'),																
																"id"          => RT_THEMESLUG."_h6_font_size",
																"default"     => "20", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

													),
									),				 

									array(
										'id'       => 'menu',
										'title'    => __("Main Menu", "rt_theme_admin"), 
										'controls' => array( 
															array(
																"id"          => RT_THEMESLUG.'_menu_font',															
																"label"       => __("Font",'rt_theme_admin'),
																//"description" => __("",'rt_theme_admin'),
																"choices"     =>  $this->fonts,
																"input_attrs" => array("class"=>"rt_fonts", "data-variant-id"=> RT_THEMESLUG.'_menu_font_variant', "data-subset-id"=> RT_THEMESLUG.'_menu_font_subset'),
																"default"   => "google||Roboto Condensed",
																"transport" => "refresh", 
																"type"      => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => RT_THEMESLUG.'_menu_font_subset',															
																"label"       => __("Subsets",'rt_theme_admin'),
																//"description" => __("",'rt_theme_admin'),
																"choices"     =>  array(),			
																"default"     => array("latin","latin-ext"),
																"input_attrs" => array("multiple"=>"multiple"),
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => RT_THEMESLUG.'_menu_font_variant',															
																"label"       => __("Font Weight",'rt_theme_admin'),
																//"description" => __("",'rt_theme_admin'),
																"choices"     =>  array(),			
																"default"     => "regular",
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"label"       => __("Top Level Item Font Size",'rt_theme_admin'),																
																"id"          => RT_THEMESLUG."_menu_font_size",
																"default"     => "16", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

															array(
																"label"       => __("Mobile Menu - Top Level Item Font Size",'rt_theme_admin'),																
																"id"          => RT_THEMESLUG."_mobile_menu_font_size",
																"default"     => "14", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

													),
									),	

									array(
										'id'       => 'sub_menu',
										'title'    => __("Sub Menu", "rt_theme_admin"), 
										'controls' => array( 
															array(
																"id"          => RT_THEMESLUG.'_sub_menu_font',															
																"label"       => __("Font",'rt_theme_admin'),
																//"description" => __("",'rt_theme_admin'),
																"choices"     =>  $this->fonts,
																"input_attrs" => array("class"=>"rt_fonts", "data-variant-id"=> RT_THEMESLUG.'_sub_menu_font_variant', "data-subset-id"=> RT_THEMESLUG.'_sub_menu_font_subset'),
																"default"   => "google||Roboto Condensed",
																"transport" => "refresh", 
																"type"      => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => RT_THEMESLUG.'_sub_menu_font_subset',															
																"label"       => __("Subsets",'rt_theme_admin'),
																//"description" => __("",'rt_theme_admin'),
																"choices"     => array(),			
																"default"     => array("latin","latin-ext"),
																"input_attrs" => array("multiple"=>"multiple"),
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"id"          => RT_THEMESLUG.'_sub_menu_font_variant',															
																"label"       => __("Font Weight",'rt_theme_admin'),
																//"description" => __("",'rt_theme_admin'),
																"choices"     =>  array(),			
																"default"     => "regular",
																"transport"   => "refresh", 
																"type"        => "rt_select",
																"rt_skin"   => true
															),

															array(
																"label"       => __("Sub Level Item Font Size",'rt_theme_admin'),																
																"id"          => RT_THEMESLUG."_menu_sub_font_size",
																"default"     => "16", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

															array(
																"label"       => __("Mobile Menu - Sub Level Item Font Size",'rt_theme_admin'),																
																"id"          => RT_THEMESLUG."_mobile_menu_sub_font_size",
																"default"     => "14", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

													),
									),	
									array(
										'id'       => 'miscellaneous',
										'title'    => __("Miscellaneous", "rt_theme_admin"), 
										'controls' => array( 

															array(
																"label"       => __("Breadcrumb Menu Font Size",'rt_theme_admin'),																
																"id"          => RT_THEMESLUG."_breadcrumb_font_size",
																"default"     => "11", 
																"type"        => "number",
																"transport"   => "refresh",
																"input_attrs" => array("min"=>10,"max"=>100),
																"rt_skin"   => true
															),

													),
									),		

							)
			);