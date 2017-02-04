<?php
/**
 * RT-Theme Shortcodes
 *
 * Main file that includes the shortcodes and contains helper functions
 *
 * @author 		RT-Themes
 */

/* Shortcode files to include */
$shortcodes = array(
				"product_carousel",
				"blog_carousel",
				"portfolio_carousel",
				"woo_products",
				"woo_product_carousel",
				"video_embed",
				"portfolio_box",
				"product_box",
				"divider",
				"testimonials",
				"staff_box",
				"testimonial_carousel",
				"rt_columns",
				"rt_column",
				"rt_row",
				"rt_column_text",
				"contact_form",
				"rt_social_media_icons",
				"rt_social_media_share",
				"rt_get_commnets_template",
				"widget_caller",
				"google_maps",
				"space_box",
				"rt_slider",
				"blog_box",
				"pricing_tables",
				"icon",
				"info_box",
				"content_box",
				"content_icon_box",
				"rt_heading",
				"rt_highlight",
				"rt_timeline",
				"rt_chained_contents",
				"rt_tabs",
				"banner",
				"button",
				"rt_accordion",
				"rt_tooltip",
				"rt_image_gallery",
				"rt_image_carousel",
				"pullquote",
				"rt_icon_list",
				"rt_counter",
				"rt_latest_news",
				"rt_quote"
			);

foreach ($shortcodes as $shorcode) {
	include(RT_EXTENTIONS_PATH . "inc/shortcodes/{$shorcode}.php");
}

/*  Use shortcode in widget texts */
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode', 20);


/* Helper Functions */ 
if( ! function_exists("rt_visual_composer_fix") ){
	/**
	 * Visual Composer Content Fix
	 * Corrects the wrong p tags caused by VComposer plugin by using its native function
	 * 
	 * @param  string $content
	 * @return html $content
	 */
	function rt_visual_composer_content_fix( $content = null ) {
		if( function_exists("wpb_js_remove_wpautop") ){		
			$content = wpb_js_remove_wpautop($content,"true");
		}
		
		return $content;
	}
}

if( ! function_exists("rt_content_filter") ){
	/**
	 * Fix Shortcodes
	 * @param  string $content
	 * @return html $rep
	 */
	function rt_content_filter($content) {

	// array of custom shortcodes requiring the fix for extra p tags 
	$shortcodes = array(
						"rt_column",
						"rt_row",
						"rt_columns",
						"rt_column",
						"rt_column_text",
						"rt_slider",
						"rt_slide",
						"rt_tooltip", 
						"rt_icon_list",
						"rt_icon_list_line",
						"rt_tabs",
						"rt_tab",
						"rt_pricing_table",
						"rt_table_column",
						"rt_compare_table",
						"rt_compare_table_column",
						"contact_form",
						"icon",
						"info_box",
						"pullquote",
						"banner",
						"button",  
						"google_maps",
						"location",
						"rt_divider",  
						"content_box",
						"content_icon_box",	
						"rt_heading",
						"rt_highlight",
						"rt_timeline",
						"rt_tl_event",
						"rt_image_gallery",
						"rt_image_carousel",
						"rt_gal_item",
						"rt_chained_contents",
						"rt_chained_content",
						"rt_accordion",
						"rt_accordion_content",
						"rt_counter",
						"rt_latest_news",
						"rt_quote"			
	);


	if ( ! class_exists( "Vc_Manager" ) ) {
		//Add VC shortcodes to the main $shortcodes array if the plugins not installed
		$vc_shortcodes = array(			
						"vc_row",
						"vc_row_inner",
						"vc_column",
						"vc_column_inner",
						"vc_column_text",
						"vc_tabs",
						"vc_tab",
						"vc_accordion",
						"vc_accordion_tab",
			);

		$shortcodes = array_merge($shortcodes, $vc_shortcodes);
	}

	$block = join("|",$shortcodes);	

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]", $content);
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);

	return $rep;
	}
}

add_filter("the_content", "rt_content_filter"); 
?>