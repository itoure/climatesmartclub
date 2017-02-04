<?php
/**
 * RT-Theme Custom Styling
 *
 * contains functions used for creating dynamic css outputs
 *
 * @author 		RT-Themes
 */

global $grouped_selectors, $sections;


$grouped_selectors= array(
	//"bg-color" => array("use"=>"bg_color","selectors"=>'#main_content > [row-selector], #side_content > [row-selector], #footer > [row-selector], [row-selector].column_container,
	"link-font-color" => array("use"=>"link_color","selectors"=>'a'),
	"bg-color" => array("use"=>"bg_color","selectors"=>'
		[row-selector], [row-selector].column_container,
		.chained_contents.style-1 > div > .icon,
		.chained_contents.style-1 > div > .number,
		.chained_contents.style-2 > div > .icon,
		.chained_contents.style-2 > div > .number,
		.button_.color:hover:after,
		.quantity .minus,
		.quantity .plus
	'),
	"bg-color-as-border-color" => array("use"=>"bg_color","selectors"=>''),	
	"font-color" => array("use"=>"font_color","selectors"=>'
		[row-selector],
		.product_item_holder .product_info_footer a,
		.button_.default,
		.button_.color:hover,
		.paging_wrapper > .page-numbers a,
		.paging_wrapper > .page-numbers li > span,
		.author-name a,
		.quantity .plus:hover, 
		.quantity .minus:hover
	'),
	"border-color" =>array("use"=>"border_color","selectors"=>'
		[row-selector],
		[row-selector].border_grid > .row,
		[row-selector].border_grid .content_row,
		[row-selector].border_grid > .row > div:after,
		[row-selector].border_grid .wpb_column:after,
		[row-selector].border_grid .col:after,
		.wp-caption,
		.border_grid > .row,
		.border_grid > .row > div:after,
		.border_grid .col,
		.border_grid .col:after,
		.border_grid .col:before,
		.border_grid .wpb_column,
		.border_grid .wpb_column:after,
		.border_grid .wpb_column:before,
		.product_item_holder .product_info_footer,
		.single-products p.price, 
		.single-product p.price,
		span.price,
		.product_meta,
		.chained_contents.style-1 > div > .icon,
		.chained_contents.style-1 > div > .number,
		.chained_contents.style-2 > div > .icon,
		.chained_contents.style-2 > div > .number,
		.rt_divider,
		.pricing_table .table_wrap > ul,
		.pricing_table .table_wrap > ul > li,
		.button_.default,
		.button_.color:hover,
		.banner > .featured_text,
		.rt-toggle > ol,
		.rt-toggle > ol > li,
		.rt-toggle > ol > li .toggle-content,
		.rt_tabs.tab-style-1 .tab_nav,
		.rt_tabs.tab-style-1 .tab_nav > li,
		.rt_tabs.tab-style-1 .tab_content_wrapper > .tab_title,
		.rt_tabs.tab-style-2 .tab_nav,
		.rt_tabs.tab-style-2 .tab_nav > li,
		.rt_tabs.tab-style-2 .tab_contents .tab_content_wrapper > .tab_title,
		.read_more:before,
		.rt_heading_wrapper.style-2 > .style-2:after,
		.rt_heading_wrapper.style-3 > .style-3:before,
		.rt_heading_wrapper.style-3 > .style-3:after,
		.rt_heading_wrapper.style-6 > .style-6:after,
		.gallery-item img,
		.client_image,
		.paging_wrapper > .page-numbers,
		.paging_wrapper > .page-numbers a,
		.paging_wrapper > .page-numbers li > span,
		.social_share_holder .icon-share:after,
		.customselect,
		input,
		textarea,
		select,
		.post_data,
		#search-results .loop,
		.comment-holder,
		.children:before,
		.children .comment-holder:before,
		.comment-holder .comment-respond,
		.filter-holder,
		.filter_navigation li,
		.type-portfolio:after,
		.widget,
		.widget > ul > li > ul, .widget > ul > li > .sub-menu, .widget .menu > li > ul, .widget .menu > li > .sub-menu,
		.widget li,
		.widget_tag_cloud a,
		.widget_product_tag_cloud a,
		div.product form.cart,
		.quantity .plus,
		.quantity .minus,
		.quantity input.qty, 
		p.price, 
		span.price,
		table.shop_attributes, 
		table.shop_attributes *, 
		table.shop_table, 
		table.shop_table *, 
		.cross-sells, 
		.cart_totals, 
		form.checkout_coupon,
		.col-1,
		.checkout .col2-set,
		.col2-set h3,
		.addresses,
		p.stars span > a,
		.woocommerce.widget .total,
		[row-selector]#tools > ul > li > span:first-child,
		[row-selector]#tools > ul > li > div,
		[row-selector]#tools,
		#comments ol.commentlist li,
		.woo-sub-categories,
		[row-selector].footer_info_bar,
		#footer-navigation li,
		.profile,
		.person_links_wrapper,
		.latest_news .date,
		.wc-product-carousel .owl-item > div,
		.timeline > div,
		.select2-container .select2-choice,
		table:not(.table) > thead > tr > th,
		table:not(.table) > thead > tr > td,
		table:not(.table) > tbody > tr > th,
		table:not(.table) > tbody > tr > td,
		table:not(.table) > tfoot > tr > th,
		table:not(.table) > tfoot > tr > td,		
		table:not(.table) > thead > tr > th,
		.sidebar
	'),
	"border-color-as-font-color" => array("use"=>"border_color","selectors"=>'
		.rt_divider.style-1:before,
		.rt_divider.style-2:before,
		.rt_divider.style-3:before,
		.rt_divider.style-5,
		.rt-toggle .toggle-head:after,
		.testimonial .text .icon-quote-right,
		.testimonial .text .icon-quote-left,
		.rt_quote .icon-quote-right,
		.rt_quote .icon-quote-left,		
		.star-rating:before, .cart-collaterals h2:before,
		.timeline > div:before
	'),
	"border-color-as-background-color" => array("use"=>"border_color","selectors"=>'
		.masonry .vertical_line,
		.timeline:after,		
		.chained_contents.style-1:after,
		.chained_contents.style-2:after,
		.rt_divider.style-2:after,
		.rt_divider.style-3:after,
		.rt_divider.style-4,
		.pricing_table.compare .table_wrap > ul > li.caption,
		.pricing_table.compare .table_wrap > ul > li.price,
		.dots-holder > div span,
		.widget > h5:after,
		.widget .sub-menu li a:after, .widget .children li a:after,
		.price_slider_wrapper .ui-widget-content,
		.timeline > div:before
	'),
	"secondary-font-color" => array("use"=>"secondary_font_color","selectors"=>'
		p.price del,
		.rt_heading_wrapper.style-4 .punchline,
		.rt_heading_wrapper.style-5 .punchline,
		.client_info,
		.blog_list .date_box,
		.post_data *,
		.comment-meta > a,
		.filter_navigation li a,
		.widget > ul > li li a,
		.widget .menu > li li a,
		.widget_latest_posts .meta, .widget_latest_posts .meta *,
		.widget_popular_posts .meta, .widget_popular_posts .meta *,
		.small.note, .star-rating span:before,
		.with_icons.style-2 > div > .icon,
		.chained_contents.style-1 > div > .icon,
		.chained_contents.style-1 > div > .number,
		.chained_contents.style-2 > div > .icon,
		.chained_contents.style-2 > div > .number,
		.read_more:before,
		.icon-content-box.icon-style-1 .icon-holder span:before,
		.quantity .plus, .quantity .minus,
		.woocommerce.widget .quantity,
		[row-selector]#tools > ul > li:hover > span:first-child,
		[row-selector]#tools > ul > li.active > span:first-child,
		[row-selector]#tools > ul > li:hover:before,
		[row-selector]#tools > ul > li.active:before,
		.latest_news .date
	'),
	"primary-color-as-font-color" => array("use"=>"primary_color","selectors"=>'
		.product_item_holder .product_info_footer a:hover,
		.rt_heading_wrapper.style-2 > .style-2:before,
		.rt_heading .heading_icon:before,
		.highlight.style-1,
		.paging_wrapper > .page-numbers a:hover,
		.paging_wrapper > .page-numbers .current,
		.single_variation span.price,
		.latest_news .title:hover,
		.timeline > div > .event-date
	'),
	"primary-color-as-background-color" => array("use"=>"primary_color","selectors"=>'
		.pricing_table .table_wrap.highlight > ul > li.caption,
		.pricing_table .table_wrap.highlight > ul > li.price,
		.button_.default:hover:after,
		.button_.color,
		.rt-toggle > ol > li .toggle-number,
		.rt_heading.style-1:after,
		.rt_heading_wrapper.style-4 > .style-4:after,
		.rt_heading_wrapper.style-5 > .style-5:after,
		.highlight.style-2,
		.dots-holder div.active span,
		.dots-holder div:hover span,
		input[type="submit"]:hover,
		input[type="button"]:hover,
		.comment-reply a:hover,
		.comment-reply-title small > a:hover,
		.action_buttons li a:hover,
		.onsale,.product_info_footer a.added_to_cart, button.button:hover, input.button:hover, #respond input#submit:hover, .cart_totals a.button:hover,
		.ui-slider .ui-slider-handle,
		.ui-slider .ui-slider-range,
		.with_icons.style-3 > div > .icon,
		.icon-content-box.icon-style-2 .icon-holder span:before,
		.icon-content-box.icon-style-3 .icon-holder span:before		
	'),
	"primary-color-as-border-color" => array("use"=>"primary_color","selectors"=>'
		.rt_tabs.tab-style-1 .tab_nav > li.active:after,
		.rt_tabs.tab-style-1 .tab_content_wrapper.active > .tab_title,
		.rt_tabs.tab-style-2 .tab_nav > li.active:after,
		.rt_tabs.tab-style-2 .tab_contents .tab_content_wrapper.active > .tab_title,
		.filter_navigation li a.active,
		.button_.color
	'),
	"light-text-color" => array("use"=>"light_text_color","selectors"=>'
		.with_icons.style-3 > div > .icon,
		.pricing_table .table_wrap.highlight > ul > li.caption,
		.pricing_table .table_wrap.highlight > ul > li.price,
		.button_.color,
		.button_.default:hover,
		.rt-toggle > ol > li .toggle-number,
		.icon-content-box.icon-style-2 .icon-holder span:before,
		.highlight.style-2,
		input[type="submit"],
		input[type="button"],
		button:not(.button_),
		button:not(.button_):hover,
		.cart_totals a.button,
		.cart_totals a.button:hover,
		.comment-reply a,
		.comment-reply-title small > a,
		.comment-reply-title small > a:hover,
		.product_info_footer a.added_to_cart,.product_info_footer a.added_to_cart:hover,
		.quantity .plus:hover,.quantity .minus:hover		
	'),
	"heading-color" => array("use"=>"heading_color","selectors"=>'
		.rt_heading,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		h1 a,
		h2 a,
		h3 a,
		h4 a,
		h5 a,
		h6 a,
		h1 a:hover,
		h2 a:hover,
		h3 a:hover,
		h4 a:hover,
		h5 a:hover,
		h6 a:hover
	'),
	"form-button-bg-color" => array("use"=>"form-button_bg_color","selectors"=>'
		input[type="submit"],
		input[type="button"],
		button:not(.button_),
		.comment-reply a,
		.comment-reply-title small > a,
		button.button, input.button, #respond input#submit, .cart_totals a.button	
	'),
	"social-media-bg-color"=>array("use"=>"social_media_bg_color","selectors"=>'.social_media li a'),
);
$sections= array(
	"default"     => ".default-style",
	"alt_style_1" => ".alt-style-1",
	"alt_style_2" => ".alt-style-2",
	"widgets"     => ".sidebar-widgets",
	"light_style" => ".light-style",
	"footer"      => ".footer_contents",
);

if( ! function_exists("rt_custom_styling") ){
	/**
	 * Print Custom CSS output
	 * get custom css file or output and print
	 * 
	 * @global $wp_customize
 	 * @global $post
 	 * 
	 */
	function rt_custom_styling(){
		global $wp_customize, $post;	
		
		$rttheme_custom_css = "";
		$minify_css_output = true;

		//if it is customizer window or post preview, create dynamic css and print inline
		if( isset( $wp_customize) || is_preview() ) {
			$rttheme_custom_css = rt_get_custom_css_output();	
			wp_add_inline_style( 'theme-style', rt_minify_css_output( $rttheme_custom_css ) );	
			return ;
		}

		//get stored dates of custom css outputs
		$css_dates = get_option( RT_THEMESLUG."_custom_css_update_dates" );
		$css_dates["global"] = isset( $css_dates["global"] ) ? $css_dates["global"] : "";	

		//post if
		$post_id = isset( $post ) ? $post->ID : "";

		// recreate custom css output for this post if global settings updated 
		if( $post_id ){

			$css_dates[$post_id] = isset( $css_dates[$post_id] ) ? $css_dates[$post_id] : "";

			if( round( $css_dates[$post_id] ) < round( $css_dates["global"] ) ){
				rt_save_custom_css_output_post( $post_id );
			}		
		}

		//is css dir writeable?
		if( rt_is_css_dir_writeable() ){

				//get css dir
				$get_custom_css_dir = rt_get_custom_css_dir();
				$rt_get_custom_css_url = rt_get_custom_css_url();

				//check if a custom css file exists for this post
				if( ! empty($post_id) && file_exists( $get_custom_css_dir."dynamic-style-". $post_id .".css" ) ){		
					wp_enqueue_style('theme-dynamic',  $rt_get_custom_css_url."dynamic-style-". $post_id .".css", "" , sanitize_file_name( $css_dates[$post_id] ) );  
					return ;
				}

				//check if a global custom css file exists
				if ( file_exists( $get_custom_css_dir."dynamic-style.css" ) ) {
					wp_enqueue_style('theme-dynamic',  $rt_get_custom_css_url."dynamic-style.css", "" , sanitize_file_name( $css_dates["global"] ) );  
					return ;
				}

		//get stored css output from db	
		}else{
			$rttheme_custom_css = rt_get_saved_css_output( $post_id );	
		}

		//no stored css output found
		if( empty( $rttheme_custom_css ) ){
			$rttheme_custom_css = rt_get_custom_css_output();
		}

		//add the css output inline
		$rttheme_custom_css = $minify_css_output ? rt_minify_css_output( $rttheme_custom_css ) : $rttheme_custom_css ; 
		wp_add_inline_style( 'theme-style', $rttheme_custom_css );	
	}
}
add_action( 'wp_enqueue_scripts', 'rt_custom_styling', 30 );

if( ! function_exists("rt_get_saved_css_output") ){
	/**
	 *
	 *  Get the saved css output
	 *  returns stores css output of given $post_id
	 *  if $post_id or css of the post is empty returns global output
	 * 
	 *  @var $post_id 
	 *  @return $rttheme_custom_css
	 */
	function rt_get_saved_css_output( $post_id = "" ){

		if( ! empty( $post_id ) ){
			$rttheme_custom_css = get_option( RT_THEMESLUG."_custom_".$post_id."_css_output" );

			if( ! empty( $rttheme_custom_css ) ) {
				return $rttheme_custom_css;	
			}
			
		}

		$rttheme_custom_css = get_option( RT_THEMESLUG."_custom_css_output");	
		return $rttheme_custom_css;
	}
}

if( ! function_exists("rt_minify_css_output") ){
	/**
	 * Minify css output
	 */
	function rt_minify_css_output( $css = "" ){

		// Remove comments
		$css = preg_replace('#/\*.*?\*/#s', '', $css);
		// Remove whitespace
		$css = preg_replace('/\s*([{}|:;,])\s+/', '$1', $css);
		// Remove trailing whitespace at the start
		$css = preg_replace('/\s\s+(.*)/', '$1', $css);
		// Remove unnecesairy ;'s
		$css = str_replace(';}', '}', $css);  
		//Remove the tabs
		$css = str_replace("\t", "", $css); 

		return $css;
	}
}

if( ! function_exists("rt_save_custom_css_output") ){
	/**
	 * Save generated css output
	 */
	function rt_save_custom_css_output(){

		//create css output
		$css_output = rt_get_custom_css_output();

		//store the output to db
		update_option( RT_THEMESLUG."_custom_css_output" , $css_output );

		//store last update date
		$css_dates = get_option( RT_THEMESLUG."_custom_css_update_dates" );
		$css_dates = empty( $css_dates ) ? array() : get_option( RT_THEMESLUG."_custom_css_update_dates" );
		$css_dates["global"] = date('ymdHis');
		update_option( RT_THEMESLUG."_custom_css_update_dates",  $css_dates );

		//generate css file
		rt_create_dynamic_css_file( rt_minify_css_output( $css_output ), $file_name = "dynamic-style.css" );
	}
}
add_action( 'rt_after_reset' , 'rt_save_custom_css_output' );
add_action( 'customize_save_after', 'rt_save_custom_css_output' );
add_action( 'rt_after_user_custom_css', 'rt_save_custom_css_output' );


if( ! function_exists("rt_regenerate_custom_css_output") ){
	/**
	 * Regenerate generated css output when version changed
	 */
	function rt_regenerate_custom_css_output(){

		if( is_admin() ){
			return;
		}

		//latest stored theme version
		$latest_stored_theme_version = get_option( RT_THEMESLUG."_stored_theme_verion" );

		//get current theme data
		$theme_data = rt_get_theme();

		if( $theme_data["Version"] != $latest_stored_theme_version ){
			rt_save_custom_css_output();

			//store the new version
			update_option( RT_THEMESLUG."_stored_theme_verion" , $theme_data["Version"] );			
		}
	}
}
add_action( 'init' , 'rt_regenerate_custom_css_output' ); 


if( ! function_exists("rt_save_custom_css_output_post") ){
	/**
	 * Save generated css output
	 */
	function rt_save_custom_css_output_post( $post_id ){

		// If this is just a revision, don't create the output
		if ( wp_is_post_revision( $post_id ) ){
			return;	
		}
		
		$post_id = rt_wpml_translated_page_id( $post_id );

		if (
			get_post_meta( $post_id, RT_COMMON_THEMESLUG.'_breadcrumb_styling', true) == "new" ||
			get_post_meta( $post_id, RT_COMMON_THEMESLUG.'_body_background_options', true) == "new" ||
			get_post_meta( $post_id, RT_COMMON_THEMESLUG.'_left_background_options', true) == "new" ||
			get_post_meta( $post_id, RT_COMMON_THEMESLUG.'_right_background_options', true) == "new" ||
			get_post_meta( $post_id, RT_COMMON_THEMESLUG.'_header_options', true) == "new" ||
			get_post_meta( $post_id, RT_COMMON_THEMESLUG.'_left_top_padding', true) != "" ||
			get_post_meta( $post_id, RT_COMMON_THEMESLUG.'_right_top_padding', true) != "" 
		){

			//create a css output for this post
			$css_output = rt_get_custom_css_output();

			//store the output to db
			update_option( RT_THEMESLUG."_custom_".$post_id."_css_output" , $css_output );

			//store last update date
			$css_dates = get_option( RT_THEMESLUG."_custom_css_update_dates" );
			$css_dates = empty( $css_dates ) ? array() : get_option( RT_THEMESLUG."_custom_css_update_dates" );
			$css_dates[$post_id] = date('ymdHis');
			update_option( RT_THEMESLUG."_custom_css_update_dates",  $css_dates );

			//generate css file
			rt_create_dynamic_css_file( rt_minify_css_output( $css_output ), $file_name = "dynamic-style-". $post_id .".css" );

		}else{

			//check if a custom css file exists for this post
			if( file_exists( rt_get_custom_css_dir()."dynamic-style-". $post_id .".css" ) ){		
				rt_delete_dynamic_css_file( "dynamic-style-". $post_id .".css" );
			}

			//delete the db output 
			delete_option( RT_THEMESLUG."_custom_".$post_id."_css_output");

			return ;
		}
	}
}
add_action( 'rt_updated_post_meta' , 'rt_save_custom_css_output_post' );


if( ! function_exists("rt_create_dynamic_css_file") ){
	/**
	 * create dynamic css file
	 */
	function rt_create_dynamic_css_file( $output = "", $file_name = "dynamic-style.css" ){

		if( rt_is_css_dir_writeable() && ! empty( $output ) ){

			global $wp_filesystem;

			if (empty($wp_filesystem)) {
				require_once (ABSPATH . '/wp-admin/includes/file.php');
				WP_Filesystem();
			}

			$comment  = '/*' . "\n";
			$comment .= '* This is a dynamically generated css file by '. RT_THEMENAME .'. Do not edit.' . "\n";
			$comment .= '* Created on '. date("d-M-y H:i:s"). "\n";
			$comment .= '*/' . "\n";

			$wp_filesystem->put_contents(
				rt_get_custom_css_dir().sanitize_file_name($file_name),
				$comment . rt_minify_css_output($output),
				FS_CHMOD_FILE // predefined mode settings for WP files
			);
		}
	}
}

if( ! function_exists("rt_delete_dynamic_css_file") ){
	/**
	 * delete dynamic css file
	 */
	function rt_delete_dynamic_css_file( $file_name = "dynamic-style.css" ){

		if( ! is_admin() ){	
			return ;
		}

		$file_name = sanitize_file_name( $file_name );

		if( rt_is_css_dir_writeable() && ! empty( $file_name ) ){

			global $wp_filesystem; 

			if (empty($wp_filesystem)) {
				require_once (ABSPATH . '/wp-admin/includes/file.php');
				WP_Filesystem();
			}

			$wp_filesystem->delete(rt_get_custom_css_dir().$file_name );
		}
	}
}

if( ! function_exists("rt_get_custom_css_output") ){
	/**
	 * Get custom css output
	 */
	function rt_get_custom_css_output(){
		global $post;

	 	$rttheme_custom_css = "";

	  	//Misc settings
	 	$rttheme_custom_css .= rt_create_misc_css();

	 	//Fonts
		$rttheme_custom_css .= rt_create_fonts_css();   

	 	//Font sizes
	 	$rttheme_custom_css .= rt_create_font_size_css(); 
	 	 	
		//Custom Navigation colors
		$rttheme_custom_css .= create_rt_navigation_css();
	 
		//Color schemas
		$rttheme_custom_css .= rt_create_color_schema_css();


		//Background vars
		if( isset( $post ) && get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_body_background_options', true) == "new" ){
			$rt_bg_variables["page_bg_image"]             = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_body_background_image_url', true ); 
			$rt_bg_variables["page_bg_position"]          = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_body_background_position', true );
			$rt_bg_variables["page_bg_attachment"]        = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_body_background_attachment', true );
			$rt_bg_variables["page_bg_repeat"]            = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_body_background_repeat', true );
			$rt_bg_variables["page_bg_size"]              = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_body_background_size', true );
			$rt_bg_variables["page_bg_color"]             = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_body_background_color', true );  
			$rt_bg_variables["page_bg_attachment_mobile"] = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_body_background_attachment_mobile', true );
		}else{
			$rt_bg_variables["page_bg_image"]             = get_theme_mod( RT_THEMESLUG.'_body_background_image_url'); 
			$rt_bg_variables["page_bg_position"]          = get_theme_mod( RT_THEMESLUG.'_body_background_position');
			$rt_bg_variables["page_bg_attachment"]        = get_theme_mod( RT_THEMESLUG.'_body_background_attachment');
			$rt_bg_variables["page_bg_repeat"]            = get_theme_mod( RT_THEMESLUG.'_body_background_repeat');
			$rt_bg_variables["page_bg_size"]              = get_theme_mod( RT_THEMESLUG.'_body_background_size');
			$rt_bg_variables["page_bg_color"]             = get_theme_mod( RT_THEMESLUG.'_body_background_color');  
			$rt_bg_variables["page_bg_attachment_mobile"] = get_theme_mod( RT_THEMESLUG.'_body_background_attachment_mobile');
		}

		if( isset( $post ) && get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_left_background_options', true) == "new" ){
			$rt_bg_variables["page_left_bg_image"]          = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_left_background_image_url', true ); 
			$rt_bg_variables["page_left_bg_position"]       = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_left_background_position', true );
			$rt_bg_variables["page_left_bg_repeat"]         = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_left_background_repeat', true );
			$rt_bg_variables["page_left_bg_size"]           = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_left_background_size', true );
			$rt_bg_variables["page_left_bg_color"]          = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_left_background_color', true ); 
			$rt_bg_variables["page_left_parallax_effect"]   = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_left_background_parallax_effect', true );
			$rt_bg_variables["page_left_attachment_mobile"] = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_left_background_attachment_mobile', true );

		}else{
			$rt_bg_variables["page_left_bg_image"]          = get_theme_mod( RT_THEMESLUG.'_left_background_image_url'); 
			$rt_bg_variables["page_left_bg_position"]       = get_theme_mod( RT_THEMESLUG.'_left_background_position');
			$rt_bg_variables["page_left_bg_repeat"]         = get_theme_mod( RT_THEMESLUG.'_left_background_repeat');
			$rt_bg_variables["page_left_bg_size"]           = get_theme_mod( RT_THEMESLUG.'_left_background_size');
			$rt_bg_variables["page_left_bg_color"]          = get_theme_mod( RT_THEMESLUG.'_left_background_color'); 
			$rt_bg_variables["page_left_parallax_effect"]   = get_theme_mod( RT_THEMESLUG.'_left_background_parallax_effect'); 
			$rt_bg_variables["page_left_attachment_mobile"] = get_theme_mod( RT_THEMESLUG.'_left_background_attachment_mobile');
		}

		if( isset( $post ) && get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_right_background_options', true) == "new" ){
			$rt_bg_variables["page_right_bg_image"]      = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_right_background_image_url', true ); 
			$rt_bg_variables["page_right_bg_position"]   = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_right_background_position', true );
			$rt_bg_variables["page_right_bg_attachment"] = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_right_background_attachment', true );
			$rt_bg_variables["page_right_bg_repeat"]     = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_right_background_repeat', true );
			$rt_bg_variables["page_right_bg_size"]       = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_right_background_size', true );
			$rt_bg_variables["page_right_bg_color"]      = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_right_background_color', true );  

		}else{
			$rt_bg_variables["page_right_bg_image"]      = get_theme_mod( RT_THEMESLUG.'_right_background_image_url'); 
			$rt_bg_variables["page_right_bg_position"]   = get_theme_mod( RT_THEMESLUG.'_right_background_position');
			$rt_bg_variables["page_right_bg_repeat"]     = get_theme_mod( RT_THEMESLUG.'_right_background_repeat');
			$rt_bg_variables["page_right_bg_attachment"] = get_theme_mod( RT_THEMESLUG.'_right_background_attachment');
			$rt_bg_variables["page_right_bg_size"]       = get_theme_mod( RT_THEMESLUG.'_right_background_size');
			$rt_bg_variables["page_right_bg_color"]      = get_theme_mod( RT_THEMESLUG.'_right_background_color');  
		}


		if( get_theme_mod(RT_THEMESLUG.'_layout') == "layout2" ){
			//Body Background CSS
			$rttheme_custom_css .= rt_create_background_css( array(
					"background_color"             => $rt_bg_variables['page_bg_color'],   
					"background_image_url"         => $rt_bg_variables['page_bg_image'], 
					"background_attachment"        => $rt_bg_variables['page_bg_attachment'],
					"background_position"          => $rt_bg_variables['page_bg_position'], 
					"background_repeat"            => $rt_bg_variables['page_bg_repeat'], 
					"background_size"              => $rt_bg_variables['page_bg_size'], 
					"background_attachment_mobile" => $rt_bg_variables['page_bg_attachment_mobile'],
				), "body");
		}else{
			//Body Background CSS
			$rttheme_custom_css .= rt_create_background_css( array(
					"background_color"             => $rt_bg_variables['page_bg_color'],   
					"background_image_url"         => $rt_bg_variables['page_bg_image'], 
					"background_attachment"        => $rt_bg_variables['page_bg_attachment'],
					"background_position"          => $rt_bg_variables['page_bg_position'], 
					"background_repeat"            => $rt_bg_variables['page_bg_repeat'], 
					"background_size"              => $rt_bg_variables['page_bg_size'], 
					"background_attachment_mobile" => $rt_bg_variables['page_bg_attachment_mobile'],
				), "#container");			
		}


		$rttheme_custom_css .= rt_create_background_css( array(
				"background_color"             => $rt_bg_variables['page_bg_color'],    
			), "body.mobile-menu-active");


		//Left Side Background CSS
		$rttheme_custom_css .= rt_create_background_css( array(
				"background_color"             => $rt_bg_variables['page_left_bg_color'],   
				"background_image_url"         => $rt_bg_variables['page_left_bg_image'], 
				"background_position"          => $rt_bg_variables['page_left_bg_position'], 
				"background_repeat"            => $rt_bg_variables['page_left_bg_repeat'], 
				"background_size"              => $rt_bg_variables['page_left_bg_size'], 
				"background_attachment_mobile" => $rt_bg_variables['page_left_attachment_mobile'],
			), ".left-side-background");
			//), "body:not(.touch) .left-side-background");
			

		//Left Side Background CSS - For Mobile
		$rttheme_custom_css .= rt_create_background_css( array(
				"background_color"     => $rt_bg_variables['page_left_bg_color'],   
				"background_image_url" => $rt_bg_variables['page_left_bg_image'], 
				"background_position"  => $rt_bg_variables['page_left_bg_position'], 
				"background_repeat"    => $rt_bg_variables['page_left_bg_repeat'], 
				"background_size"      => $rt_bg_variables['page_left_bg_size'], 
			), "#left_side","@media screen and (max-width: 979px)");
			//), ".touch #left_side");
			


		//Right Side Background CSS
		$rttheme_custom_css .= rt_create_background_css( array(
				"background_color"      => $rt_bg_variables['page_right_bg_color'],   
				"background_image_url"  => $rt_bg_variables['page_right_bg_image'], 
				"background_attachment" => $rt_bg_variables['page_right_bg_attachment'],
				"background_position"   => $rt_bg_variables['page_right_bg_position'], 
				"background_repeat"     => $rt_bg_variables['page_right_bg_repeat'], 
				"background_size"       => $rt_bg_variables['page_right_bg_size'], 
			), "#right_side");



		//Main Header
		$rttheme_custom_css .= create_rt_main_header_css(); 

		//Sub Header
		$rttheme_custom_css .= create_rt_header_css();

		//User Custom CSS
		$rttheme_custom_css .= stripcslashes(get_option( RT_THEMESLUG."_user_custom_css" ));	
		
		return $rttheme_custom_css;
	}
}

if( ! function_exists("rt_create_misc_css") ){
	/**
	 * Create mics css codes
	 */
	function rt_create_misc_css(){
		global $post;

		$css = '';

		$logo_background_color           = get_theme_mod( RT_THEMESLUG."_logo_background_color" );
		$logo_bottom_border_color        = get_theme_mod( RT_THEMESLUG."_logo_bottom_border_color" );
		$logo_font_color                 = get_theme_mod( RT_THEMESLUG."_logo_font_color" );
		$logo_background_color_mobile    = get_theme_mod( RT_THEMESLUG."_logo_background_color_mobile" );
		$logo_bottom_border_color_mobile = get_theme_mod( RT_THEMESLUG."_logo_bottom_border_color_mobile" );
		$logo_font_color_mobile          = get_theme_mod( RT_THEMESLUG."_logo_font_color_mobile" );
		$logo_padding_t                  = get_theme_mod( RT_THEMESLUG."_logo_padding_t" );
		$logo_padding_b                  = get_theme_mod( RT_THEMESLUG."_logo_padding_b" );
		$logo_padding_l                  = get_theme_mod( RT_THEMESLUG."_logo_padding_l" );
		$logo_padding_r                  = get_theme_mod( RT_THEMESLUG."_logo_padding_r" );

		//logo box background color
		if( ! empty( $logo_background_color ) ){
			
			$css .= sprintf('
					.site-logo{
						background-color: %1$s
					}				
					', $logo_background_color );	
		}

		//logo bottom border color
		if( ! empty( $logo_bottom_border_color ) ){
			
			$css .= sprintf('
					.site-logo{
						border-color: %1$s
					}				
					', $logo_bottom_border_color );	
		}

		//logo font color
		if( ! empty( $logo_font_color ) ){
			
			$css .= sprintf('
					.site-logo .sitename > a{
						color: %1$s
					}				
					', $logo_font_color );	
		}

		//logo box background color
		if( ! empty( $logo_background_color_mobile ) ){
			
			$css .= sprintf('
					@media screen and (max-width: 979px) {
						#mobile-logo{
							background-color: %1$s
						}
					}				
					', $logo_background_color_mobile );	
		}

		//logo bottom border color
		if( ! empty( $logo_bottom_border_color_mobile ) ){
			
			$css .= sprintf('
					@media screen and (max-width: 979px) {
						#mobile-logo{
							border-color: %1$s
						}
					}				
					', $logo_bottom_border_color_mobile );	
		}
		
		//logo padding
		$logo_padding_t = intval ( $logo_padding_t );
		$logo_padding_b = intval ( $logo_padding_b );
		$logo_padding_l = intval ( $logo_padding_l );
		$logo_padding_r = intval ( $logo_padding_r );

		$css .= sprintf('
				.site-logo{
					padding: %spx %spx %spx %spx
				}				
				', $logo_padding_t , $logo_padding_r , $logo_padding_b , $logo_padding_l );	

		/**
		 * Layout 1 only
		 */
		if( get_theme_mod(RT_THEMESLUG.'_layout') == "layout1" || get_theme_mod(RT_THEMESLUG.'_layout') == "" ){

			//mobile logo font color
			if( ! empty( $logo_font_color_mobile ) ){
				
				$css .= sprintf('
						@media screen and (max-width: 979px) {
							#mobile-logo .sitename > a, .mobile-menu-button{
								color: %1$s
							}
						}				
						', $logo_font_color_mobile );	
			}


			if( isset( $post ) && get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_left_top_padding', true) != "" ){
				$left_side_top_padding   = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_left_top_padding', true );  
			}else{
				$left_side_top_padding   = get_theme_mod( RT_THEMESLUG."_left_top_padding" );      
			}

			if( isset( $post ) && get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_right_top_padding', true) != "" ){
				$right_side_top_padding   = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_right_top_padding', true );  
			}else{
				$right_side_top_padding   = get_theme_mod( RT_THEMESLUG."_right_top_padding" );      
			}

			//left side top padding
			if( $left_side_top_padding != "" ){
				
				$css .= sprintf('
						#left_side{
							padding-top: %1$spx
						}				
						', $left_side_top_padding );	
			}
			
			//right side top padding
			if( $right_side_top_padding != "" ){
				
				$css .= sprintf('
						#top_bar{
							height: %1$spx
						}				
						', $right_side_top_padding );	
			}
		}

		/**
		 * Layout 2 only
		 */
		if( get_theme_mod(RT_THEMESLUG.'_layout') == "layout2" ){

			$logo_box_width     = get_theme_mod( RT_THEMESLUG."_logo_box_width" );
			$logo_box_height    = get_theme_mod( RT_THEMESLUG."_logo_box_height" );
			$body_margin_top    = get_theme_mod( RT_THEMESLUG.'_body_margin_top' ); 
			$body_margin_bottom = get_theme_mod( RT_THEMESLUG.'_body_margin_bottom' ); 


			//mobile logo font color
			if( ! empty( $logo_font_color ) ){
				
				$css .= sprintf('
						@media screen and (max-width: 979px) {
							#mobile-logo .sitename > a, .mobile-menu-button{
								color: %1$s
							}
						}				
						', $logo_font_color );	
			}


			//logo box width
			if( ! empty( $logo_box_width ) ){
				
				$css .= sprintf('
					@media screen and (min-width: 992px) {
						#logo{
							max-width: %1$spx;
						}

						#logo img{
							max-width: %2$spx;
						}		
					}			
					', $logo_box_width + $logo_padding_l + $logo_padding_r, $logo_box_width );	

					if( $logo_box_width < 300 ){
						$css .= sprintf('
							@media screen and (max-width: 991px) {
								#logo{
									max-width: %1$spx;
								}

								#logo img{
									max-width: %2$spx;
								}		
							}
							', $logo_box_width + $logo_padding_l + $logo_padding_r, $logo_box_width );	
					}
			}

			//logo box width
			if( ! empty( $logo_box_height ) ){
				
				$css .= sprintf('
					@media screen and (min-width: 992px) {
						#logo{
							max-height: %1$spx;
						}

						#logo img{
							max-height: %2$spx;
						}		
					}			
					', $logo_box_height + $logo_padding_b + $logo_padding_t, $logo_box_height  );	

					
					if( $logo_box_height < 260 ){
						$css .= sprintf('
							@media screen and (max-width: 991px) {
								#logo{
									max-height: %1$spx;
								}

								#logo img{
									max-height: %2$spx;
								}		
							}			
							', $logo_box_height + $logo_padding_b + $logo_padding_t, $logo_box_height  );	

					}

			}

			//body margins
			$css .= ! empty( $body_margin_top ) ? sprintf('
				@media screen and (min-width: 992px) {
					#container{
						padding-top: %spx; 
					} 
				}
				', $body_margin_top ) :  "";	

			$css .= ! empty( $body_margin_bottom ) ? sprintf('
				@media screen and (min-width: 992px) {
					#footer{
						padding-bottom: %spx; 
					} 
				}
				', $body_margin_bottom ) :  "";	

		}



	 	return $css;
	}
}

if( ! function_exists("create_rt_navigation_css") ){
	/**
	 * Create navigation css
	 */
	function create_rt_navigation_css(){

		$css = '';

		$nav_item_vertical_padding = intval ( get_theme_mod( RT_THEMESLUG . "_nav_item_vertical_padding" ) );
		$nav_item_horizontal_padding = intval ( get_theme_mod( RT_THEMESLUG . "_nav_item_horizontal_padding" ) );
		$nav_item_background_color = get_theme_mod( RT_THEMESLUG . "_nav_item_background_color" );
		$nav_item_font_color = get_theme_mod( RT_THEMESLUG . "_nav_item_font_color" );
		$nav_item_border_color = get_theme_mod( RT_THEMESLUG . "_nav_item_border_color" );
		$nav_item_background_color_active = get_theme_mod( RT_THEMESLUG . "_nav_item_background_color_active" );
		$nav_item_font_color_active = get_theme_mod( RT_THEMESLUG . "_nav_item_font_color_active" );
		$nav_item_indicator_color_active = get_theme_mod( RT_THEMESLUG . "_nav_item_indicator_color_active" );

		$sub_nav_item_vertical_padding = intval ( get_theme_mod( RT_THEMESLUG . "_sub_nav_item_vertical_padding" ) );
		$sub_nav_item_horizontal_padding = intval ( get_theme_mod( RT_THEMESLUG . "_sub_nav_item_horizontal_padding" ) );
		$sub_nav_item_background_color = get_theme_mod( RT_THEMESLUG . "_sub_nav_item_background_color" );
		$sub_nav_item_font_color = get_theme_mod( RT_THEMESLUG . "_sub_nav_item_font_color" );
		$sub_nav_item_border_color = get_theme_mod( RT_THEMESLUG . "_sub_nav_item_border_color" );
		$sub_nav_item_background_color_active = get_theme_mod( RT_THEMESLUG . "_sub_nav_item_background_color_active" );
		$sub_nav_item_font_color_active = get_theme_mod( RT_THEMESLUG . "_sub_nav_item_font_color_active" );
		$sub_nav_item_indicator_color_active = get_theme_mod( RT_THEMESLUG . "_sub_nav_item_indicator_color_active" );


		$mobile_nav_background_color = get_theme_mod( RT_THEMESLUG . "_mobile_nav_background_color" );
		$mobile_nav_border_color = get_theme_mod( RT_THEMESLUG . "_mobile_nav_border_color" );

		//fix for versions before 1.3
		$mobile_nav_border_color = empty( $mobile_nav_border_color ) ? $nav_item_border_color : $mobile_nav_border_color;

		//nav_item_vertical_padding
		if( ! empty( $nav_item_vertical_padding ) ){

			$css .= sprintf('

					#navigation > li > a,
					.layout2 #tools > ul > li > span:first-child
					{
						padding-top: %1$spx;
						padding-bottom: %1$spx;
					}				
					', $nav_item_vertical_padding );	

		}

		//nav_item_horizontal_padding
		if( ! empty( $nav_item_horizontal_padding ) ){

			$css .= sprintf('

					#navigation > li > a,
					.layout2 #tools > ul > li > span:first-child
					{
						padding-left: %1$spx;
						padding-right: %1$spx;
					}				
					', $nav_item_horizontal_padding );	
		}	

		//nav_item_background_color
		if( ! empty( $nav_item_background_color ) ){
			
			$css .= sprintf('
					#navigation > li > a{
						background-color: %1$s
					}				
					', $nav_item_background_color );	
		}
	 
		//nav_item_font_color
		if( ! empty( $nav_item_font_color ) ){
			
			$css .= sprintf('
					#navigation > li > a{
						color: %1$s
					}				
					', $nav_item_font_color );	
		}
		
		//nav_item_border_color
		if( ! empty( $nav_item_border_color ) ){
			
			$css .= sprintf('
					#navigation > li > a, #navigation li.menu-item-has-children > a:after{
						border-color: %1$s
					}				
					', $nav_item_border_color );	
		}

		//mobile nav item boder color
		if( ! empty( $mobile_nav_border_color ) ){
			
			$css .= sprintf('
					.mobile-menu #navigation > li > a, .mobile-menu #navigation li.menu-item-has-children > a:after{
						border-color: %1$s
					}				
					', $mobile_nav_border_color );	
		}

		//mobile menu plus-minus as boder color
		if( ! empty( $mobile_nav_border_color ) ){
			
			$css .= sprintf('
					.mobile-menu #navigation li.menu-item-has-children > a:before{
						color: %1$s
					}				
					', $mobile_nav_border_color );	
		}

		//nav_item_background_color_active
		if( ! empty( $nav_item_background_color_active ) ){
			
			$css .= sprintf('
					
					body:not(.mobile-menu) #navigation > li:hover > a, 
					body:not(.mobile-menu) #navigation > li a:hover, 
					#navigation > li.current-menu-ancestor > a,
					#navigation > li.current-menu-item > a{
						background-color: %1$s
					}				
					', $nav_item_background_color_active );	
		}

		//nav_item_font_color_active
		if( ! empty( $nav_item_font_color_active ) ){
			
			$css .= sprintf('
					
					body:not(.mobile-menu) #navigation > li:hover > a, 
					body:not(.mobile-menu) #navigation > li a:hover, 
					#navigation > li.current-menu-ancestor > a,
					#navigation > li.current-menu-item > a{
						color: %1$s
					}				
					', $nav_item_font_color_active );	
		}


		//nav_item_indicator_color_active
		if( ! empty( $nav_item_indicator_color_active ) ){

			
			if( get_theme_mod(RT_THEMESLUG.'_layout') == "layout2" ){

				$css .= sprintf('
						
						#navigation > li:hover:after{
							border-bottom-color: %1$s
						}				
						', $nav_item_indicator_color_active );	

			}else{

				$css .= sprintf('
						
						#navigation > li:hover:after{
							border-right-color: %1$s
						}				
						', $nav_item_indicator_color_active );	

				
				$css .= sprintf('
						
						#navigation > li:hover:after{
							border-left-color: %1$s
						}				
						', $nav_item_indicator_color_active );	
			}




		}

		/* Sub Menu for mobile screens only - use same colors with top level menu items*/

		//sub_nav_item_background_color
		if( ! empty( $nav_item_background_color ) ){
			
			$css .= sprintf('
					body.mobile-menu #navigation > li li{
						background-color: %1$s
					}				
					', $nav_item_background_color );	
		}
	 
		//sub_nav_item_font_color
		if( ! empty( $sub_nav_item_font_color ) ){
			
			$css .= sprintf('
					body.mobile-menu #navigation > li li > a{
						color: %1$s
					}				
					', $nav_item_font_color );	
		}

		//sub_nav_item_border_color
		if( ! empty( $mobile_nav_border_color ) ){
			
			$css .= sprintf('
					body.mobile-menu #navigation > li li > a, 
					body.mobile-menu #navigation > li ul, 
					body.mobile-menu #navigation > li li.menu-item-has-children > a:after{
						border-color: %1$s
					}				
					', $mobile_nav_border_color );	
		}


		//sub_nav_item_background_color_active
		if( ! empty( $nav_item_background_color_active ) ){
			
			$css .= sprintf('
				
					body.mobile-menu #navigation > li li:hover > a, 
					body.mobile-menu #navigation > li li a:hover, 
					body.mobile-menu #navigation > li li.current-menu-ancestor > a,
					body.mobile-menu #navigation > li li.current-menu-item > a{
						background-color: %1$s
					}				
					', $nav_item_background_color_active );	
		}

		//nav_item_font_color_active
		if( ! empty( $nav_item_font_color_active ) ){
			
			$css .= sprintf('
					
					body.mobile-menu #navigation > li li:hover > a, 
					body.mobile-menu #navigation > li li a:hover, 
					body.mobile-menu #navigation > li li.current-menu-ancestor > a,
					body.mobile-menu #navigation > li li.current-menu-item > a{
						color: %1$s
					}				
					', $nav_item_font_color_active );	
		}


		//sub_nav_item_indicator_color_active
		if( ! empty( $nav_item_indicator_color_active ) ){
			
			$css .= sprintf('
					
					body.mobile-menu #navigation > li li.current-menu-ancestor:after,
					body.mobile-menu #navigation > li li.current-menu-item:after,
					body.mobile-menu #navigation > li li:hover:after{
						border-right-color: %1$s
					}				
					', $nav_item_indicator_color_active );	
		}

		/* Sub Menu for large screens only */

		
		//sub_nav_item_vertical_padding
		if( ! empty( $sub_nav_item_vertical_padding ) ){

			$css .= sprintf('

					body:not(.mobile-menu) #navigation > li li a
					{
						padding-top: %1$spx;
						padding-bottom: %1$spx;
					}				
					', $sub_nav_item_vertical_padding );	

		}else{

			$css .= sprintf('

					body:not(.mobile-menu) #navigation > li li a
					{
						padding-top: %1$spx;
						padding-bottom: %1$spx;
					}				
					', $nav_item_vertical_padding );	

		}

		//sub_nav_item_horizontal_padding
		if( ! empty( $sub_nav_item_horizontal_padding ) ){

			$css .= sprintf('

					body:not(.mobile-menu) #navigation > li li a 
					{
						padding-left: %1$spx;
						padding-right: %1$spx;
					}				
					', $sub_nav_item_horizontal_padding );	

		}

		//sub_nav_item_background_color
		if( ! empty( $sub_nav_item_background_color ) ){
			
			$css .= sprintf('
					body:not(.mobile-menu) #navigation > li li{
						background-color: %1$s
					}				
					', $sub_nav_item_background_color );	
		}
	 
		//sub_nav_item_font_color
		if( ! empty( $sub_nav_item_font_color ) ){
			
			$css .= sprintf('
					body:not(.mobile-menu) #navigation > li li > a{
						color: %1$s
					}				
					', $sub_nav_item_font_color );	
		}

		//sub_nav_item_border_color
		if( ! empty( $sub_nav_item_border_color ) ){
			
			$css .= sprintf('
					body:not(.mobile-menu) #navigation > li li > a, 
					body:not(.mobile-menu) #navigation > li ul, 
					body:not(.mobile-menu) #navigation > li li.menu-item-has-children > a:after{
						border-color: %1$s
					}				
					', $sub_nav_item_border_color );	
		}


		//sub_nav_item_background_color_active
		if( ! empty( $sub_nav_item_background_color_active ) ){
			
			$css .= sprintf('
				
					body:not(.mobile-menu) #navigation > li li:hover > a, 
					body:not(.mobile-menu) #navigation > li li a:hover, 
					body:not(.mobile-menu) #navigation > li li.current-menu-ancestor > a,
					body:not(.mobile-menu) #navigation > li li.current-menu-item > a{
						background-color: %1$s
					}				
					', $sub_nav_item_background_color_active );	
		}

		//nav_item_font_color_active
		if( ! empty( $sub_nav_item_font_color_active ) ){
			
			$css .= sprintf('
					
					body:not(.mobile-menu) #navigation > li li:hover > a, 
					body:not(.mobile-menu) #navigation > li li a:hover, 
					body:not(.mobile-menu) #navigation > li li.current-menu-ancestor > a,
					body:not(.mobile-menu) #navigation > li li.current-menu-item > a{
						color: %1$s
					}				
					', $sub_nav_item_font_color_active );	
		}


		//sub_nav_item_indicator_color_active
		if( ! empty( $sub_nav_item_indicator_color_active ) ){
			

			if( get_theme_mod(RT_THEMESLUG.'_layout') == "layout2" ){

				$css .= sprintf('
						
						body:not(.mobile-menu) #navigation > li li.current-menu-ancestor:after,
						body:not(.mobile-menu) #navigation > li li.current-menu-item:after,
						body:not(.mobile-menu) #navigation > li li:hover:after{
							color: %1$s;
						}				
						', $sub_nav_item_indicator_color_active );	
			}else{

				$css .= sprintf('
						
						body:not(.mobile-menu) #navigation > li li.current-menu-ancestor:after,
						body:not(.mobile-menu) #navigation > li li.current-menu-item:after,
						body:not(.mobile-menu) #navigation > li li:hover:after{
							border-right-color: %1$s; 
						}				
						', $sub_nav_item_indicator_color_active );	
			}

		}


		/* Mobile Navigation */

		//mobile nav background color for layout 2
		if( ! empty( $mobile_nav_background_color ) ){
			
			$css .= sprintf('
					
					body.mobile-menu.layout2 .header-right{
						background-color: %1$s
					}				
					', $mobile_nav_background_color );	
		}

	 	return $css;
	}
}

if( ! function_exists("create_rt_header_css") ){
	/**
	 * Create header css
	 */
	function create_rt_header_css(){
		global $post;

		$css = '';


		if( isset( $post ) && get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_options', true) == "new" ){
			$rt_header_variables["header_row_background_width"]   = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_background_width', true );
			$rt_header_variables["header_row_bg_effect"]          = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_effect', true );
			$rt_header_variables["header_row_bg_image"]           = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_image', true );
			$rt_header_variables["header_row_bg_position"]        = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_position', true );
			$rt_header_variables["header_row_bg_image_repeat"]    = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_image_repeat', true );
			$rt_header_variables["header_row_bg_size"]            = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_size', true );
			$rt_header_variables["header_row_bg_attachment"]      = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_attachment', true );
			$rt_header_variables["header_row_bg_color"]           = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_color', true );
			$rt_header_variables["header_row_font_color"]         = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_font_color', true );
		}else{
			$rt_header_variables["header_row_background_width"]   = get_theme_mod( RT_THEMESLUG.'_header_row_background_width' );
			$rt_header_variables["header_row_bg_effect"]          = get_theme_mod( RT_THEMESLUG.'_header_row_bg_effect' );
			$rt_header_variables["header_row_bg_image"]           = get_theme_mod( RT_THEMESLUG.'_header_row_bg_image' );
			$rt_header_variables["header_row_bg_position"]        = get_theme_mod( RT_THEMESLUG.'_header_row_bg_position' );
			$rt_header_variables["header_row_bg_image_repeat"]    = get_theme_mod( RT_THEMESLUG.'_header_row_bg_image_repeat' );
			$rt_header_variables["header_row_bg_size"]            = get_theme_mod( RT_THEMESLUG.'_header_row_bg_size' );
			$rt_header_variables["header_row_bg_attachment"]      = get_theme_mod( RT_THEMESLUG.'_header_row_bg_attachment' );
			$rt_header_variables["header_row_bg_color"]           = get_theme_mod( RT_THEMESLUG.'_header_row_bg_color' );
			$rt_header_variables["header_row_font_color"]         = get_theme_mod( RT_THEMESLUG.'_header_row_font_color' );
		}
	  
		if( isset( $post ) && get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_breadcrumb_styling', true) == "new" ){
			$rt_header_variables["breadcrumb_font_color"]         = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_breadcrumb_font_color', true );
			$rt_header_variables["breadcrumb_link_color"]         = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_breadcrumb_link_color', true );
			$rt_header_variables["breadcrumb_bg_color"]           = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_breadcrumb_bg_color', true );
		}else{
			$rt_header_variables["breadcrumb_font_color"]         = get_theme_mod( RT_THEMESLUG.'_breadcrumb_font_color' );
			$rt_header_variables["breadcrumb_link_color"]         = get_theme_mod( RT_THEMESLUG.'_breadcrumb_link_color' );
			$rt_header_variables["breadcrumb_bg_color"]           = get_theme_mod( RT_THEMESLUG.'_breadcrumb_bg_color' );
		}


		//header_row_font_color
		$css .= sprintf('
				.sub_page_header h1{
					color: %1$s;
				}
				', $rt_header_variables["header_row_font_color"] );	

		//header row background
		if( $rt_header_variables["header_row_bg_effect"] != "parallax" ) {

			$css .= rt_create_background_css( $background_options = array(	
					"background_color" => $rt_header_variables["header_row_bg_color"],
					"background_image_url" => $rt_header_variables["header_row_bg_image"],
					"background_attachment" => $rt_header_variables["header_row_bg_attachment"],
					"background_position" => $rt_header_variables["header_row_bg_position"],
					"background_repeat" => $rt_header_variables["header_row_bg_image_repeat"],
					"background_size" => $rt_header_variables["header_row_bg_size"],
					), ".sub_page_header");
		}

		//breadcrumb_font_color
		$css .= sprintf('
				.breadcrumb, .breadcrumb span:before{
					color: %1$s;
				}
				', $rt_header_variables["breadcrumb_font_color"] );	

		//breadcrumb_link_color
		$css .= sprintf('
				.breadcrumb a, .breadcrumb a:before{
					color: %1$s;
				}
				', $rt_header_variables["breadcrumb_link_color"] );	

		//breadcrumb_bg_color
		$css .= sprintf('
				.breadcrumb{
					background-color: %1$s;
				}
				', $rt_header_variables["breadcrumb_bg_color"] );	


	 	return $css;
	}
}


if( ! function_exists("create_rt_main_header_css") ){
	/**
	 * Create header css
	 */
	function create_rt_main_header_css(){

		if( get_theme_mod(RT_THEMESLUG.'_layout') != "layout2" ){
			return;
		}

		$css = '';

		$main_header_row_background_width = get_theme_mod( RT_THEMESLUG.'_main_header_row_background_width' ); 
		$main_header_row_bg_image         = get_theme_mod( RT_THEMESLUG.'_main_header_row_bg_image' );
		$main_header_row_bg_position      = get_theme_mod( RT_THEMESLUG.'_main_header_row_bg_position' );
		$main_header_row_bg_image_repeat  = get_theme_mod( RT_THEMESLUG.'_main_header_row_bg_image_repeat' );
		$main_header_row_bg_size          = get_theme_mod( RT_THEMESLUG.'_main_header_row_bg_size' );
		$main_header_row_bg_attachment    = get_theme_mod( RT_THEMESLUG.'_main_header_row_bg_attachment' );
		$main_header_row_bg_color         = get_theme_mod( RT_THEMESLUG.'_main_header_row_bg_color' ); 
		$main_header_padding_top          = get_theme_mod( RT_THEMESLUG.'_main_header_padding_top' ); 
		$main_header_padding_bottom       = get_theme_mod( RT_THEMESLUG.'_main_header_padding_bottom' ); 



		//header row background
		$css .= rt_create_background_css( $background_options = array(	
				"background_color" => $main_header_row_bg_color,
				"background_image_url" => $main_header_row_bg_image,
				"background_attachment" => $main_header_row_bg_attachment,
				"background_position" => $main_header_row_bg_position,
				"background_repeat" => $main_header_row_bg_image_repeat,
				"background_size" => $main_header_row_bg_size,
				), ".top-header");
  
		//header paddings
		$css .= sprintf('
				@media screen and (min-width: 992px) {
				.top-header{
					padding-top: %spx;
					padding-bottom: %spx;
				}				
			}
			', $main_header_padding_top,$main_header_padding_bottom );	


  		//top shortcode buttons
		$top_shortcut_buttons_background_color = get_theme_mod( RT_THEMESLUG.'_top_shortcut_buttons_background_color' ); 
		$top_shortcut_buttons_border_color     = get_theme_mod( RT_THEMESLUG.'_top_shortcut_buttons_border_color' ); 
		$top_shortcut_buttons_font_color       = get_theme_mod( RT_THEMESLUG.'_top_shortcut_buttons_font_color' ); 

		$top_shortcut_buttons_content_bg_color = get_theme_mod( RT_THEMESLUG.'_top_shortcut_buttons_content_bg_color' ); 
		$top_shortcut_buttons_content_border_color = get_theme_mod( RT_THEMESLUG.'_top_shortcut_buttons_content_border_color' ); 
		$top_shortcut_buttons_content_font_color = get_theme_mod( RT_THEMESLUG.'_top_shortcut_buttons_content_font_color' ); 

		//fix for version 1.2 and before
		$top_shortcut_buttons_content_border_color = empty( $top_shortcut_buttons_content_border_color ) && ! empty( $top_shortcut_buttons_border_color ) ? $top_shortcut_buttons_border_color : $top_shortcut_buttons_content_border_color ; 
		$top_shortcut_buttons_content_font_color = empty( $top_shortcut_buttons_content_font_color ) && ! empty( $top_shortcut_buttons_font_color ) ? $top_shortcut_buttons_font_color : $top_shortcut_buttons_content_font_color ; 	


		//top_shortcut_buttons_background_color
		if( ! empty( $top_shortcut_buttons_background_color ) ){
			$css .= sprintf('
					#tools > ul > li > span{
						background-color: %s;
					}				
					', $top_shortcut_buttons_background_color);	
  		}

		//top_shortcut_buttons_border_color
		if( ! empty( $top_shortcut_buttons_border_color ) ){
			$css .= sprintf('
					#tools, #tools > ul > li > span {
						border-color: %s;
					}				
					', $top_shortcut_buttons_border_color);	  
		}

		//top_shortcut_buttons_font_color
		if( ! empty( $top_shortcut_buttons_font_color ) ){
			$css .= sprintf('
					#tools > ul > li > span{
						color: %s;
					}				
					', $top_shortcut_buttons_font_color);	
		}
 
		//top_shortcut_buttons_background_color
		if( ! empty( $top_shortcut_buttons_content_bg_color ) ){
			$css .= sprintf('
					#tools .widget{
						background-color: %1$s;
					}				

					@media (min-width : 980px) and (max-width : 1200px) {

						#tools > ul > li > span{
							background-color: %1$s;
						}	

					}

					', $top_shortcut_buttons_content_bg_color);	
  		}

		//top_shortcut_buttons_content_border_color
		if( ! empty( $top_shortcut_buttons_content_border_color ) ){
			$css .= sprintf('
					#tools .widget, 
					#tools input[type="text"], 
					#tools input[type="password"],
					#tools .widget > ul > li,
					#tools .widget .menu > li,
					.woocommerce.widget_shopping_cart .total{
						border-color: %s;
					}				
					', $top_shortcut_buttons_content_border_color);	

			$css .= sprintf('
					#tools .widget > h5:after{
						background-color: %s;
					}				
					', $top_shortcut_buttons_content_border_color);	

		}


		//top_shortcut_buttons_font_color
		if( ! empty( $top_shortcut_buttons_content_font_color ) ){
			$css .= sprintf('
					#tools, #tools a, #tools input[type="text"]{
						color: %s;
					}				
					', $top_shortcut_buttons_content_font_color);	
		}




	 	return $css;
	}
}

if( ! function_exists("rt_create_fonts_css") ){
	/**
	 * Create font family css
	 */
	function rt_create_fonts_css(){

		$selected_fonts = rt_get_selected_fonts_list();
	 
		$css = ""; 


		//create css outputs
		foreach( $selected_fonts as $purpose => $data ) {

			if( !isset( $data ) || ! isset( $data["family"] ) ){
				continue;
			}

			//family name
			$family = explode(",", $data["family"] );
			array_walk($family, create_function('&$value', '$value = "\"$value\"";'));
			$family = implode( $family, ",");

			$style = preg_replace("/\d/i", "", $data["variant"] );
			$style = ! empty( $style ) ? 'font-style: '.$style.';' : 'font-style: normal;';
			$style = str_replace("regular", "normal", $style);

			$weight = preg_replace("/\D/i", "", $data["variant"]);
			$weight = ! empty( $weight ) ? 'font-weight: '.$weight.';' : 'font-weight: normal;';


			//heading
			if( $purpose == "heading" && ! empty( $data ) ){

				$css .= sprintf('
						h1:not(.clean_heading),
						h2:not(.clean_heading),
						h3:not(.clean_heading),
						h4:not(.clean_heading),
						h5:not(.clean_heading),
						h6:not(.clean_heading){
							font-family: %1$s; %2$s %3$s
						}				
						', $family, $weight, $style );	

			}		

			//body
			if( $purpose == "body" && ! empty( $data ) ){

				$css .= sprintf('
						body{
							font-family: %1$s; %2$s %3$s
						}				
						', $family, $weight, $style );	

			}		

			//menu
			if( $purpose == "menu" && ! empty( $data ) ){

				$css .= sprintf('
						#navigation > li > a,
						.layout2 #tools > ul > li > span:first-child{
							font-family: %1$s; %2$s %3$s
						}				
						', $family, $weight, $style );	

			}		


			//sub_menu
			if( $purpose == "sub_menu" && ! empty( $data ) ){

				$css .= sprintf('
						#navigation ul li a{
							font-family: %1$s; %2$s %3$s
						}				
						', $family, $weight, $style );	

			}		


		}

	 	return $css;
	}
}

if( ! function_exists("rt_create_font_size_css") ){
	/**
	 * Create font size css
	 */
	function rt_create_font_size_css(){

		$css = '';

		//selected fonts
		$selectors = array( 
						"h1" => get_theme_mod( RT_THEMESLUG.'_h1_font_size' ),
						"h2" => get_theme_mod( RT_THEMESLUG.'_h2_font_size' ),
						"h3" => get_theme_mod( RT_THEMESLUG.'_h3_font_size' ),
						"h4" => get_theme_mod( RT_THEMESLUG.'_h4_font_size' ),
						"h5" => get_theme_mod( RT_THEMESLUG.'_h5_font_size' ),
						"h6" => get_theme_mod( RT_THEMESLUG.'_h6_font_size' ),
						"menu_font_size" => get_theme_mod( RT_THEMESLUG.'_menu_font_size' ),
						"menu_sub_font_size" => get_theme_mod( RT_THEMESLUG.'_menu_sub_font_size' ),
						"mobile_menu_font_size" => get_theme_mod( RT_THEMESLUG.'_mobile_menu_font_size' ),
						"mobile_menu_sub_font_size" => get_theme_mod( RT_THEMESLUG.'_mobile_menu_sub_font_size' ),						
						"body_font_size" => get_theme_mod( RT_THEMESLUG.'_body_font_size' ),
						"breadcrumb_font_size" => get_theme_mod( RT_THEMESLUG.'_breadcrumb_font_size' ),
					);


		//create css outputs
		foreach( $selectors as $key => $value) {

			//heading 1
			if( $key == "h1" && ! empty( $value ) ){
				
				$css .= sprintf('
						h1{
							font-size: %1$spx
						}				
						', $value );	
			}
	 
	 		//heading 2
			elseif( $key == "h2" && ! empty( $value ) ){
				
				$css .= sprintf('
						h2,.single-products .head_text h1, .single-product .head_text h1{
							font-size: %1$spx
						}				
						', $value );	
			}

	 
	 		//heading 3
			elseif( $key == "h3" && ! empty( $value ) ){
				
				$css .= sprintf('
						h3{
							font-size: %1$spx
						}				
						', $value );	
			}

	 		//heading 4
			elseif( $key == "h4" && ! empty( $value ) ){
				
				$css .= sprintf('
						h4{
							font-size: %1$spx
						}				
						', $value );	
			}

	 		//heading 5
			elseif( $key == "h5" && ! empty( $value ) ){
				
				$css .= sprintf('
						h5, .wpb_content_element .widgettitle, .wpb_content_element  h2.wpb_heading{
							font-size: %1$spx
						}				
						', $value );	
			}

	 		//heading 6
			elseif( $key == "h6" && ! empty( $value ) ){
				
				$css .= sprintf('
						h6{
							font-size: %1$spx
						}				
						', $value );	
			}					

	 		//body font size
			elseif( $key == "body_font_size" && ! empty( $value ) ){
				
				$css .= sprintf('
						body{
							font-size: %1$spx;
						}				

						.sidebar-widgets .widget h5, .footer_widgets .widget h5, .latest_news h5{
							font-size: %2$spx;
						}									
						', $value, $value+2 );	


						//additionally fix various font sizes in case global body font size bigger than 16
						if( $value > 15 ){
							
							$css .= sprintf('
									.woocommerce .product .product_info h5,
									.woocommerce-page .product .product_info h5,
									.portfolio-carousel h5,
									.product-carousel .product_item_holder .product_info h5,
									.blog-carousel h5 {
										font-size: %1$spx;
									}
									', $value+2 );	 
						}

						//shortcut button titles
						$css .= sprintf('
						#tools .widget > h5 {
							font-size: %1$spx;
						}
						', $value+2 );	 

						
			}		

	 		//menu font size
			elseif( $key == "menu_font_size" && ! empty( $value ) ){
				
				$css .= sprintf('
						#navigation > li > a,
						.layout2 #tools > ul > li > span:first-child
						{
							font-size: %1$spx;
						}				
						', $value );	
			}		

	 		//sub menu font size
			elseif( $key == "menu_sub_font_size" && ! empty( $value ) ){
				
				$css .= sprintf('
						#navigation > li li > a{
							font-size: %1$spx;
						}				
						', $value );	
			}			

	 		//mobile menu font size
			elseif( $key == "mobile_menu_font_size" && ! empty( $value ) ){
				
				$css .= sprintf('
						.mobile-menu-active #navigation > li > a{
							font-size: %1$spx;
						}				
						', $value );	
			}		

	 		//mobile sub menu font size
			elseif( $key == "mobile_menu_sub_font_size" && ! empty( $value ) ){
				
				$css .= sprintf('
						.mobile-menu-active #navigation > li li > a{
							font-size: %1$spx;
						}				
						', $value );	
			}	

	 		//breadcrumb menu font size
			elseif( $key == "breadcrumb_font_size" && ! empty( $value ) ){
				
				$css .= sprintf('
						.breadcrumb{
							font-size: %1$spx;
						}				
						', $value );	
			}	

		}
	 
	 
	 	return $css;
	}
}

if( ! function_exists("rt_get_color_set") ){
	/**
	 * Get color sets as an array
	 */
	function rt_get_color_set( $colorset_code = "", $for = "" ){

		$color_set =  array();
		
		if ( ! empty( $for ) && get_option( RT_THEMESLUG.'_'. $for .'_colorset' ) == "new" || get_option( RT_THEMESLUG.'_'. $for .'_colorset' ) == "default" ) {
			$colorset_code = $for;
		} 

		if( get_option( RT_THEMESLUG.'_'. $colorset_code .'_colorset' ) == "new" ){
			$color_set = array(
				"primary" => get_option( RT_THEMESLUG.'_'. $colorset_code .'_primary' ),  // primary color
				"font" => get_option( RT_THEMESLUG.'_'. $colorset_code .'_font' ),  // font color
				"light_font" => get_option( RT_THEMESLUG.'_'. $colorset_code .'_light_font' ),  // light font color
				"headings" => get_option( RT_THEMESLUG.'_'. $colorset_code .'_headings' ),  // heading color 
				"heading_links" => get_option( RT_THEMESLUG.'_'. $colorset_code .'_heading_links' ),  // heading :hover color
				"link" => get_option( RT_THEMESLUG.'_'. $colorset_code .'_link' ),  // link color
				"link_hover" => get_option( RT_THEMESLUG.'_'. $colorset_code .'_link_hover' ),  // link :hover color
				"highlighted" => get_option( RT_THEMESLUG.'_'. $colorset_code .'_highlighted' ),  // highlighted content background color 
				"border" => get_option( RT_THEMESLUG.'_'. $colorset_code .'_border' ),  // border color 
				"social_media" => get_option( RT_THEMESLUG.'_'. $colorset_code .'_social_media' ),  // social media base color 
			); 
		}  


		return $color_set;
	}
}

if( ! function_exists("rt_create_color_schema_css") ){
	/**
	 *  Create background set
	 */
	function rt_create_color_schema_css(){
		global $grouped_selectors, $sections;

			$css = ''; 
	 
			foreach ($sections as $section_id => $section_selector) {


				//link colors   
				if ( $grouped_selectors["link-font-color"]["selectors"] != "" ){

						$css .= sprintf( create_selector_format($grouped_selectors["link-font-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_link_color") );
				}

				//background colors
				if ( $grouped_selectors["bg-color"]["selectors"] != "" ){

						$css .= sprintf( create_selector_format($grouped_selectors["bg-color"]["selectors"] ) .'{
							background-color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_bg_color") );
				}

				if ( $grouped_selectors["bg-color-as-border-color"]["selectors"] != "" ){
						$css .= sprintf( create_selector_format($grouped_selectors["bg-color-as-border-color"]["selectors"] ) .'{
							border-color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_bg_color") );					
				}

	 			//font colors
				if ( $grouped_selectors["font-color"]["selectors"] != "" ){

						$css .= sprintf( create_selector_format($grouped_selectors["font-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_font_color") );
				}

	 			//boder colors
				if ( $grouped_selectors["border-color"]["selectors"] != "" ){

						$css .= sprintf( create_selector_format($grouped_selectors["border-color"]["selectors"] ) .'{
							border-color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_border_color") );
				}

				if ( $grouped_selectors["border-color-as-font-color"]["selectors"] != "" ){

						$css .= sprintf( create_selector_format($grouped_selectors["border-color-as-font-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_border_color") );
				}		

				if ( $grouped_selectors["border-color-as-background-color"]["selectors"] != "" ){

						$css .= sprintf( create_selector_format($grouped_selectors["border-color-as-background-color"]["selectors"] ) .'{
							background-color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_border_color") );										
				}

				//font colors
				if ( $grouped_selectors["secondary-font-color"]["selectors"] != "" ){

						$css .= sprintf( create_selector_format($grouped_selectors["secondary-font-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_secondary_font_color") );
				}

	 			//primary colors
				if ( $grouped_selectors["primary-color-as-font-color"]["selectors"] != "" ){
						$css .= sprintf( create_selector_format($grouped_selectors["primary-color-as-font-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_primary_color") );
				}

				if ( $grouped_selectors["primary-color-as-background-color"]["selectors"] != "" ){
						$css .= sprintf( create_selector_format($grouped_selectors["primary-color-as-background-color"]["selectors"] ) .'{
							background-color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_primary_color") );
				}

				if ( $grouped_selectors["primary-color-as-border-color"]["selectors"] != "" ){
						$css .= sprintf( create_selector_format($grouped_selectors["primary-color-as-border-color"]["selectors"] ) .'{
							border-color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_primary_color") );
				}

				//light text colors
				if ( $grouped_selectors["light-text-color"]["selectors"] != "" ){
						
						$css .= sprintf( create_selector_format($grouped_selectors["light-text-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_light_text_color") );
				}

				//heading colors
				if ( $grouped_selectors["heading-color"]["selectors"] != "" ){
						
						$css .= sprintf( create_selector_format($grouped_selectors["heading-color"]["selectors"] ) .'{
							color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_heading_color") );
				}

				if ( $grouped_selectors["form-button-bg-color"]["selectors"] != "" ){
						$css .= sprintf( create_selector_format($grouped_selectors["form-button-bg-color"]["selectors"] ) .'{
							background-color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_form_button_bg_color") );					
				}
	 
	  			//social media bg colors
				if ( $grouped_selectors["social-media-bg-color"]["selectors"] != "" ){

						$css .= sprintf( create_selector_format($grouped_selectors["social-media-bg-color"]["selectors"] ) .'{
							background-color:%2$s;
						}', $section_selector, get_theme_mod(RT_THEMESLUG."_".$section_id."_social_media_bg_color") );				
				}

			}

			//selectors that outside of the rows 
			$css .= sprintf('.select2-drop{	border-color:%1$s; }', get_theme_mod(RT_THEMESLUG."_default_border_color") );


			return $css;
	}
}

if( ! function_exists("rt_create_background_css") ){
	/**
	 * Create background css
	 * @param  array  $background_options
	 * @param  string $container   
	 * @return $css  
	 */
	function rt_create_background_css( $background_options = array(), $container = "", $media_query = "" ){

			$css = ''; 

			extract(shortcode_atts(array(
				"background_color" => "",
				"background_image_url" => "",
				"background_attachment" => "scroll",
				"background_position" => "",
				"background_repeat" => "",
				"background_size" => "",
				"background_attachment_mobile" => "",
			), $background_options ) ); 

			//media query
			$css .= ! empty( $media_query ) ? $media_query."{" : "";
			
			// background color
			$css .= ! empty( $background_color ) ? sprintf('
						%2$s{ 
							background-color: %1$s; 
						}
			',
					$background_color,  // font color
					$container //container selector 

			) : "" ;



			// fix background position for wp-admin bar 
			if( $container == "#container" || $container =="#left_side" || $container ==".left-side-background" || $container == "#right_side" ){
				if( $background_position == "right top" || $background_position == "left top" || $background_position == "center top" ){			
					$css .= ! empty( $background_position ) ? sprintf('

							.admin-bar %3$s{  
								background-position: %1$s; 
							}

							.mobile_device.admin-bar %3$s{ 
								background-position: %2$s; 	 	
							} 

					',
							str_replace("top", "32px", $background_position),
							str_replace("top", "46px", $background_position),
							$container

					) : "" ; 

				}
			}

			// background image	
			$css .= ! empty( $background_image_url ) ? sprintf('

					%6$s{  
						background-image: url( %1$s );
						background-attachment: %2$s;  
						background-position: %3$s;
						background-repeat: %4$s;
						background-size: %5$s;
						-webkit-background-size: %5$s;
						-moz-background-size: %5$s;
						-o-background-size: %5$s;			 	
					}

					.mobile_device %6$s{   
						-webkit-background-size: auto 100%;
						-moz-background-size: auto;
						-o-background-size: auto;			 	
					} 

			',
					$background_image_url,  // image_url  - 1 
					$background_attachment,  // attachment - 2
					$background_position,  // position - 3
					$background_repeat,  // repeat - 4
					$background_size,  // size - 5
					$container //container selector - 6  

			) : "" ; 


			// mobile background attachment
			$css .= ! empty( $background_attachment_mobile ) ? sprintf('

					.mobile_device %2$s{   
						background-attachment: %1$s;
					}

			',
					$background_attachment_mobile,
					$container 

			) : "" ; 

			//background color set - no background image
			$css .= empty( $background_image_url ) && ! empty( $background_color ) ? $container .'{background-image:none;}' : "";

			//media query
			$css .= ! empty( $media_query ) ? "}" : "";

			return $css;
	}
}

if( ! function_exists("create_selector_format") ){
	/**
	 * add %1$s to each selector in string seperated by comma
	 * @return string $selector_format
	 */
	function create_selector_format( $selectors = "" ){
			$selector_format = explode(",", $selectors );
			array_walk($selector_format, create_function('&$value', 'strpos($value,"[row-selector]") == 0 ? $value = \'%1$s \'.$value : $value;'));
			$selector_format = implode( $selector_format , ",");

			$selector_format = str_replace("[row-selector]", '%1$s', $selector_format);

			return $selector_format;
	}
}

if( ! function_exists("create_css_for_customizer") ){
	/**
	 * create css output for live customizer
	 * @return output
	 */
	function create_css_for_customizer(){

	global $wp_customize;
	if ( ! isset( $wp_customize ) ) {
		return ;
	}


	global $grouped_selectors, $sections;

		$css = ''; 
 
 		/**
 		 * do for all content rows
 		 */
		foreach ($sections as $section_id => $section_selector) {


			//link colors   
			if ( $grouped_selectors["link-font-color"]["selectors"] != "" ){
					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["link-font-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_link_color", "color" );
			}

			//background colors
			if ( $grouped_selectors["bg-color"]["selectors"] != "" ){
					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["bg-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_bg_color", "background-color" );
			}

			if ( $grouped_selectors["bg-color-as-border-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["bg-color-as-border-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_bg_color" , "border-color");	
			}


 			//font colors
			if ( $grouped_selectors["font-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["font-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_font_color", "color" );
			}

 			//boder colors
 			
			if ( $grouped_selectors["border-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["border-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_border_color", "border-color" );
			}

			if ( $grouped_selectors["border-color-as-font-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["border-color-as-font-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_border_color", "color" );
			}		

			if ( $grouped_selectors["border-color-as-background-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["border-color-as-background-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_border_color", "background-color" ); 
			}

			//font colors
			if ( $grouped_selectors["secondary-font-color"]["selectors"] != "" ){
					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["secondary-font-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_secondary_font_color", "color" );
			}

 			//primary colors
			if ( $grouped_selectors["primary-color-as-font-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["primary-color-as-font-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_primary_color", "color" );
			}

			if ( $grouped_selectors["primary-color-as-background-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["primary-color-as-background-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_primary_color", "background-color" );
			}

			if ( $grouped_selectors["primary-color-as-border-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["primary-color-as-border-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_primary_color", "border-color" );
			}

			//light text colors
			if ( $grouped_selectors["light-text-color"]["selectors"] != "" ){
					
					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["light-text-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_light_text_color", "color" );
			}


			//heading colors
			if ( $grouped_selectors["heading-color"]["selectors"] != "" ){
					
					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["heading-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_heading_color", "color" );
			}

			//form button bg colors
			if ( $grouped_selectors["form-button-bg-color"]["selectors"] != "" ){
					
					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["form-button-bg-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_form_button_bg_color", "background-color" );
			}

  			//social media bg colors
			if ( $grouped_selectors["social-media-bg-color"]["selectors"] != "" ){

					$css .= sprintf( '<style data-id="%2$s" data-color-for="%3$s">'.create_selector_format($grouped_selectors["social-media-bg-color"]["selectors"] ) .'{ }</style>', $section_selector, RT_THEMESLUG."_".$section_id."_social_media_bg_color", "background-color" ); 		

			}

		}

 		/**
 		 * breadcrumb menus
 		 */
			//background colors
			$css .= sprintf( '<style data-id="%1$s" data-color-for="%2$s">.breadcrumb, .breadcrumb span:before{ }</style>', RT_THEMESLUG."_breadcrumb_font_color", "color" );
		

			//breadcrumb_link_color
			$css .= sprintf( '<style data-id="%1$s" data-color-for="%2$s">.breadcrumb a, .breadcrumb a:before{ }</style>', RT_THEMESLUG."_breadcrumb_link_color", "color" );
			

		/**
		 * create css output
		 */
		$css = preg_replace('#/\*.*?\*/#s', '', $css);
		// Remove whitespace
		$css = preg_replace('/\s*([{}|:;,])\s+/', '$1', $css);
		// Remove trailing whitespace at the start
		$css = preg_replace('/\s\s+(.*)/', '$1', $css);
		// Remove unnecesairy ;'s
		$css = str_replace(';}', '}', $css);  
		//Remove the tabs
		$css = str_replace("\t", "", $css); 

		echo $css;

	}
}
add_action( 'wp_head', 'create_css_for_customizer' );
?>