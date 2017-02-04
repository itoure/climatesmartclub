<?php
/**
 * RT-THEME Global Theme Functions
 *
 * Various Functions for the theme
 *
 * @author 		RT-Themes
 * @package 	RT-Framework/Functions
 * @since 		1.0
 * @version    1.0
 */

if( ! function_exists("rt_global_variables") ){
	/**
	 * Global Variables
	 * 
	 * @global array $rt_global_variables
	 * @global string $rt_taxonomy
	 * @global string $rt_post_type
	 * @global object $post
	 * @global object $wp_query
	 */
	function rt_global_variables(){
		global $rt_global_variables, $rt_taxonomy, $rt_post_type, $post, $wp_query;


		//GLOBALS
		$layout = get_theme_mod(RT_THEMESLUG.'_layout');//design layout
		$GLOBALS['rt_layout'] = ! empty( $layout ) ? $layout : "layout1"; 
		
		//RT GLOBALS
		$rt_global_variables = array();

		//content widhts - used for only image resizing
		$rt_global_variables["content_full_width"] = $GLOBALS['rt_layout']== "layout2" ? 1180 : 980;
		$rt_global_variables["content_sidebar_width"] = $GLOBALS['rt_layout']== "layout2" ? 840 : 980;		

		
		//page titles and breadcrumb menus
		if( isset( $post ) && is_singular() ){
			$rt_global_variables["hide_page_title"]               = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_hide_page_title', true ));
			$rt_global_variables["hide_breadcrumb_menu"]          = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_hide_breadcrumb_menu', true ));
		}

		// Sub header related values
		$rt_global_variables["hide_page_title"]               = isset( $rt_global_variables["hide_page_title"] ) && $rt_global_variables["hide_page_title"] ? $rt_global_variables["hide_page_title"] : esc_attr(get_theme_mod( RT_THEMESLUG.'_hide_page_title' ));
		$rt_global_variables["hide_breadcrumb_menu"]          = isset( $rt_global_variables["hide_breadcrumb_menu"] ) && $rt_global_variables["hide_breadcrumb_menu"] ? $rt_global_variables["hide_breadcrumb_menu"] : esc_attr(get_theme_mod( RT_THEMESLUG.'_hide_breadcrumb_menu' ));
		$rt_global_variables["heading_tag"]                   = $rt_global_variables["hide_page_title"] ? "h1" : "h2";	
		$rt_global_variables["header_row_content_width"]      = "default";		 

		if( isset( $post ) && is_singular() && get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_options', true) == "new" ){
			$rt_global_variables["header_row_background_width"]   = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_background_width', true ));
			$rt_global_variables["header_row_bg_effect"]          = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_effect', true ));
			$rt_global_variables["header_row_bg_image"]           = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_image', true ));
			$rt_global_variables["header_row_bg_position"]        = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_position', true ));
			$rt_global_variables["header_row_bg_image_repeat"]    = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_image_repeat', true ));
			$rt_global_variables["header_row_bg_size"]            = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_size', true ));
			$rt_global_variables["header_row_bg_attachment"]      = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_attachment', true ));
			$rt_global_variables["header_row_bg_color"]           = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_bg_color', true ));
			$rt_global_variables["header_row_font_color"]         = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_header_row_font_color', true ));
		}else{
			$rt_global_variables["header_row_background_width"]   = esc_attr(get_theme_mod( RT_THEMESLUG.'_header_row_background_width' ));
			$rt_global_variables["header_row_bg_effect"]          = esc_attr(get_theme_mod( RT_THEMESLUG.'_header_row_bg_effect' ));
			$rt_global_variables["header_row_bg_image"]           = esc_attr(get_theme_mod( RT_THEMESLUG.'_header_row_bg_image' ));
			$rt_global_variables["header_row_bg_position"]        = esc_attr(get_theme_mod( RT_THEMESLUG.'_header_row_bg_position' ));
			$rt_global_variables["header_row_bg_image_repeat"]    = esc_attr(get_theme_mod( RT_THEMESLUG.'_header_row_bg_image_repeat' ));
			$rt_global_variables["header_row_bg_size"]            = esc_attr(get_theme_mod( RT_THEMESLUG.'_header_row_bg_size' ));
			$rt_global_variables["header_row_bg_attachment"]      = esc_attr(get_theme_mod( RT_THEMESLUG.'_header_row_bg_attachment' ));
			$rt_global_variables["header_row_bg_color"]           = esc_attr(get_theme_mod( RT_THEMESLUG.'_header_row_bg_color' ));
			$rt_global_variables["header_row_font_color"]         = esc_attr(get_theme_mod( RT_THEMESLUG.'_header_row_font_color' ));
		}

		if( empty( $rt_global_variables["header_row_background_width"] ) || $rt_global_variables["header_row_background_width"] == "global" ){
			$rt_global_variables["header_row_background_width"]   = esc_attr(get_theme_mod( RT_THEMESLUG.'_header_row_background_width' ));
		} 

		//left parallax
		if( isset( $post ) && is_singular() && get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_left_background_options', true) == "new" ){
			$rt_global_variables["page_left_parallax_effect"] = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_left_background_parallax_effect', true ));
		}else{
			$rt_global_variables["page_left_parallax_effect"] = esc_attr(get_theme_mod( RT_THEMESLUG.'_left_background_parallax_effect')); 
		}

		//start pages
		$rt_global_variables['rt_blogpage'] = esc_attr(get_theme_mod(RT_THEMESLUG.'_blog_page'));
		$rt_global_variables['rt_productpage'] = esc_attr(get_theme_mod(RT_THEMESLUG.'_product_list'));
		$rt_global_variables['rt_portfoliopage'] = esc_attr(get_theme_mod(RT_THEMESLUG.'_portf_page'));
		$rt_global_variables['rt_staffpage'] = esc_attr(get_theme_mod(RT_THEMESLUG.'_staff_page'));

		//get queried object
		$query_object = get_queried_object(); 

		//get taxomony name
		$rt_taxonomy = isset( $query_object->taxonomy ) ? $query_object->taxonomy : "";

		//page / post id
		$page_id = isset( $query_object->ID ) ? $query_object->ID : "";

		//get taxomony name
		$rt_post_type = get_post_type(); 

		//content holder width		
		$rt_global_variables["default_content_row_width"] = get_theme_mod( RT_THEMESLUG.'_default_content_row_width' ) == "fullwidth" ? "fullwidth" : "default";

		if( isset( $post ) && is_singular() ){
			$this_content_row_width = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_default_content_row_width', true ));

			if( $this_content_row_width != "global" && ! empty( $this_content_row_width ) ){
				$rt_global_variables["default_content_row_width"] = $this_content_row_width;	
			}
		} 

		//sidebars
		$rt_global_variables['sidebar_position'] = get_theme_mod(RT_THEMESLUG.'_default_sidebar_position');

		if( $rt_taxonomy == "category" ){
			$rt_global_variables['sidebar_position'] = get_theme_mod(RT_THEMESLUG.'_sidebar_blog_cats');
		}
		if( $rt_taxonomy == "product_categories" ){
			$rt_global_variables['sidebar_position'] = get_theme_mod(RT_THEMESLUG.'_sidebar_product_cats');
		}
		if( $rt_taxonomy == "portfolio_categories" ){
			$rt_global_variables['sidebar_position'] = get_theme_mod(RT_THEMESLUG.'_sidebar_portfolio_cats');
		}
		if( $rt_taxonomy == "product_cat" ){
			$rt_global_variables['sidebar_position'] = get_theme_mod(RT_THEMESLUG.'_sidebar_woo_cats');
		}
		if( $rt_taxonomy == "testimonial_categories" ){
			$rt_global_variables['sidebar_position'] = get_theme_mod(RT_THEMESLUG.'_sidebar_test_cats');
		}
		
		if( isset( $post ) && is_singular() ){
			$this_post_sidebar = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_post_sidebar_position', true ));

			if( $this_post_sidebar != "global" ){
				$rt_global_variables["sidebar_position"] = $this_post_sidebar;	
			}
			
		} 

	}
}
add_action( 'template_redirect', 'rt_global_variables', 10 );


if( ! function_exists("rt_footer_output_function") ){
	/**
	 * Footer output
	 * @return html
	 */
	function rt_footer_output_function(){
		global $post;

		//footer widths

		$footer_background_width = $footer_content_width = "";

		if( isset( $post ) && is_singular() ){
			$footer_background_width = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_footer_background_width', true ));
			$footer_content_width    = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'footer_content_width', true ));
		}

		if( empty( $footer_background_width ) || $footer_background_width == "global" ){
			$footer_background_width = esc_attr(get_theme_mod(RT_THEMESLUG.'_footer_background_width'));
		}
 
		if( empty( $footer_content_width ) || $footer_content_width == "global" ){
			$footer_content_width = esc_attr(get_theme_mod(RT_THEMESLUG.'_footer_content_width'));
		}

		

		//item width percentage
		$list_layout = esc_attr(get_theme_mod(RT_THEMESLUG.'_footer_widget_layout'));
		$list_layout = ! empty( $list_layout ) ? $list_layout : "1/3";

		//column count
		$column_count = rt_column_count( $list_layout );

		//column class		
		$column_class = rt_column_class( $list_layout );

		if ( 
			is_active_sidebar("sidebar-for-footer-column-1") || 
			is_active_sidebar("sidebar-for-footer-column-2") || 
			is_active_sidebar("sidebar-for-footer-column-3") || 
			is_active_sidebar("sidebar-for-footer-column-4") || 
			is_active_sidebar("sidebar-for-footer-column-5")
		) { 
			echo '<section class="footer_widgets content_row row clearfix footer border_grid fixed_heights footer_contents '.$footer_background_width.'">Our Services<div class="content_row_wrapper '.$footer_content_width.' clearfix">';
		
				if (function_exists('dynamic_sidebar')){
					for( $i = 1; $i <= $column_count; $i++ ){
						echo '<div id="footer-column-'.$i.'" class="col '.$column_class.' widgets_holder">';
							dynamic_sidebar('sidebar-for-footer-column-'.$i);  
						echo '</div>';
					}
				} 

			echo '</div></section>';
		}

		//copyright text
		$copyright = do_shortcode(rt_wpml_t('Theme Mod', "Footer Copyright Text", get_theme_mod(RT_THEMESLUG.'_copyright')));
		
		//footer navigation
		if ( has_nav_menu( 'rt-theme-footer-navigation' ) ){ // check if user created a custom menu and assinged to the rt-theme's location

			$footer_menu_vars = array(
				'menu_id'        => "footer-navigation",
				'container'      => '',
				'echo'           => false,
				'theme_location' => 'rt-theme-footer-navigation',
				'fallback_cb'    => false,
				'depth'          => 1,
			);
			
			$footer_menu=wp_nav_menu($footer_menu_vars);

		}else{
			
			$footer_menu_vars = array(
				'menu'           => 'Footer Navigation',  
				'menu_id'        => "footer-navigation",
				'container'      => '',
				'echo'           => false,
				'theme_location' => 'rt-theme-footer-navigation',
				'fallback_cb'    => false,
				'depth'          => 1,
			);
			
			$footer_menu = wp_nav_menu($footer_menu_vars);

		}


		if( ! empty( $copyright ) || ! $footer_menu ){
			echo '<div class="content_row row clearfix footer_contents footer_info_bar '.$footer_background_width.'"><div class="content_row_wrapper '.$footer_content_width.' clearfix">';
			echo '<div class="col col-sm-12"><div class="copyright ">'. apply_filters( "footer_copyright_text", esc_attr( $copyright ) ) .'</div>'.$footer_menu.'</div>';
			echo '</div></div>';
		}

	}
}
add_action( 'rt_footer_output', 'rt_footer_output_function', 10, 0 );

if( ! function_exists("rt_comment_form_before_fields") ){
	/**
	 * Add html before comment form fields
	 * @return html
	 */
	function rt_comment_form_before_fields(){
		print '<div class="text-boxes"><ul>';
	}
}
add_action( 'comment_form_before_fields', 'rt_comment_form_before_fields' );

if( ! function_exists("rt_comment_form_after_fields") ){
	/**
	 * Add html after comment form fields
	 * @return html
	 */	
	function rt_comment_form_after_fields(){
		print '</ul></div>';
	}
}
add_action( 'comment_form_after_fields', 'rt_comment_form_after_fields' );

if( ! function_exists("rt_create_media_output") ){
	/**
	 * Create media players
	 * @param  array $atts
	 * @return html
	 */
	function rt_create_media_output( $atts ){

		//defaults
		extract(shortcode_atts(array(  
			"id"  => 'player-'.rand(100000, 1000000), 
			"type" => "",
			"poster" => "",
			"file_mp3" => "",
			"file_oga" => "",
			"file_mp4" => "",
			"file_webm" => "",
		), $atts));	


		//audio output
		if( $type == "audio" ){
			printf('
				<div id="%s" class="rt-hosted-media mejs-wrapper mejs-orange">
					<audio controls="controls" preload="none" with="100%%">
						<source src="%s" type="video/mp3" title="mp4">
						<source src="%s" type="video/ogg" title="ogg">
					</audio>
				</div><!-- close .responsive-wrapper -->
			',$id, $file_mp3, $file_oga);
		}

		//video output
		if( $type == "video" ){
			printf('
				<div id="%1$s" class="rt-hosted-media mejs-wrapper mejs-orange">
				<video controls="controls" preload="none" poster="%2$s">
					<source src="%3$s" type="video/mp4" title="mp4">
					<source src="%4$s" type="video/webm" title="mp4">
				</video>

				</div><!-- close .responsive-wrapper -->
			',$id, $poster, $file_mp4, $file_webm);
		}
	}
}
add_action( "create_media_output", "rt_create_media_output", 10, 1 );

if( ! function_exists("rt_blog_post_loop") ){
	/**
	 * Blog Loop
	 * @param  boolean/array $wp_query
	 * @param  array $atts
	 * @return html
	 */
	function rt_blog_post_loop( $wp_query = false, $atts = array() ) { 
		global $rt_post_values, $rt_blog_list_atts;   

		//sanitize fields
		$atts["id"] = isset( $atts["id"] ) ? sanitize_html_class( $atts["id"] ) : 'blog-dynamicID-'.rand(100000, 1000000);

		//defaults
		$rt_blog_list_atts = shortcode_atts(array(  
			"id" => 'blog-dynamicID-'.rand(100000, 1000000), 
			"archive" => "false",
			"list_layout" => get_theme_mod(RT_THEMESLUG.'_blog_layout'),
			"layout_style" => get_theme_mod(RT_THEMESLUG.'_blog_layout_style'),
			"show_author" => get_theme_mod(RT_THEMESLUG.'_show_author') ? "true" : "false",
			"show_categories" => get_theme_mod(RT_THEMESLUG.'_show_categories') ? "true" : "false",
			"show_comment_numbers" => get_theme_mod(RT_THEMESLUG.'_show_comment_numbers') ? "true" : "false",
			"show_date" => get_theme_mod(RT_THEMESLUG.'_show_date') ? "true" : "false",
			"featured_image_resize" => get_theme_mod(RT_THEMESLUG."_blog_image_resize"),
			"featured_image_max_width" => get_theme_mod(RT_THEMESLUG."_blog_image_width"),				
			"featured_image_max_height" => get_theme_mod(RT_THEMESLUG."_blog_image_height"),
			"featured_image_crop" => get_theme_mod(RT_THEMESLUG."_blog_image_crop"),
			"pagination" => "true",
			"ajax_pagination" => "false",
			"use_excerpts" => get_theme_mod(RT_THEMESLUG."_use_excerpts") ? "true" : "false",
			"list_orderby" => "date",
			"list_order" => "DESC",
			"item_per_page"=> 10,
			"categories" => "",
			"ajax" => "false",
			"paged" => 0,
			"wpml_lang" => "",
		), $atts);

		extract($rt_blog_list_atts);
		
		//counter
		$counter = 1;			


		if( ! $wp_query ){

			//paged
			if( $pagination !== "false" && $paged == 0 ){
				if (get_query_var('paged') ) {$paged = get_query_var('paged');} elseif ( get_query_var('page') ) {$paged = get_query_var('page');} else {$paged = 1;} 
			}

			//create a post status array
			$post_status = is_user_logged_in() ? array( 'private', 'publish' ) : "publish";

			//categoried 
			$categories = is_array( $categories ) || empty( $categories ) ? $categories : explode(",", rt_wpml_lang_object_ids( $categories, "category",$wpml_lang ) ); 	

			//general query
			$args=array( 
				'post_status'    => $post_status,
				'post_type'      => 'post',
				'orderby'        => $list_orderby,
				'order'          => $list_order,
				'posts_per_page' => $item_per_page,
				'paged'          => $paged, 
				'category__in'   => $categories,
			);

			$wp_query  = new WP_Query($args); 

		}

		//get page & post counts
		$post_count = $wp_query->post_count;
		$page_count = $wp_query->max_num_pages;

		//item width percentage
		$list_layout = ! empty( $list_layout ) ? $list_layout : "1/3";

		//layout style
		$add_holder_class = $list_layout == "1/1" ? "" : ( $layout_style == "grid" ? " border_grid fixed_heights" : " masonry" ) ;
 
 		//column class
 		$add_column_class = rt_column_class( $list_layout );
		$add_column_class .= $layout_style == "masonry" ? " isotope-item" : "";

		//row count
		$column_count = rt_column_count( $list_layout );


		if ( $wp_query->have_posts() ){ 
			
			//open the wrapper
			echo "\n".'<div id="'.sanitize_html_class($id).'" class="blog_list clearfix '.trim($add_holder_class).'" data-column-width="'. $column_count .'">'."\n";

			//the loop
			while ( $wp_query->have_posts() ) : $wp_query->the_post();


				//get post values
				$rt_post_values = rt_get_loop_post_values( $wp_query->post, $rt_blog_list_atts );
				
				//open row block
				if(  $layout_style != "masonry" && $list_layout != "1/1" && ( $counter % $column_count == 1 || $column_count == 1 ) ){
					echo '<div class="row clearfix">'."\n";
				}	

					echo $list_layout != "1/1" ? '<div class="col '.$add_column_class.'">'."\n" : "";

						add_filter( "the_content", "remove_blog_shortcode", 10); 							  
						get_template_part( '/post-contents/content', get_post_format() ); 

					echo $list_layout != "1/1" ? '</div>'."\n" : "";

						 
				//close row block
				if( $layout_style != "masonry" && $list_layout != "1/1" && ( $counter % $column_count == 0 || $post_count == $counter ) ){
					echo '</div>'."\n";  
				}

			$counter++;
			endwhile;  
			
			//reset post data for the new query
			wp_reset_postdata(); 		

			//close wrapper
			echo '</div>'."\n"; 		


			if( ( $pagination !== "false" && $ajax_pagination === "false" ) || ( $pagination !== "false" && $layout_style != "masonry" ) ){
				rt_get_pagination( $wp_query );	
			} 
			
			if( $ajax_pagination !== "false" && $layout_style == "masonry" && $page_count > 1 && $ajax === "false" ){

				$rt_blog_list_atts["purpose"] = "blog";
				rt_get_ajax_loader_button( $rt_blog_list_atts, $page_count );	

			}

		}		
	}
}
add_action('blog_post_loop', 'rt_blog_post_loop', 10, 2); 

if( ! function_exists("rt_get_loop_post_values") ){
	/**
	 * Get post values for loops
	 * gets all data of a post including metas
	 * 
	 * @param  array $post
	 * @param  array $atts [atts of rt_blog_post_loop function]
	 * @return array
	 */
	function rt_get_loop_post_values( $post = array(), $atts = array(), $purpose = "" ){

		extract( $atts );

		//featured image
		$featured_image_id     = get_post_thumbnail_id(); 
		$featured_image_url    = ! empty( $featured_image_id ) ? wp_get_attachment_image_src( $featured_image_id, "full" ) : "";
		$featured_image_url    = is_array( $featured_image_url ) ? $featured_image_url[0] : "";	


		//custom thumbnail max height & crop settings for this post			
		if( $purpose != "carousel" ){	
			if( get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_featured_image_settings', true) == "new" ){
				$featured_image_resize     = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_blog_image_resize', true));
				$featured_image_max_width  = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_blog_image_width', true));
				$featured_image_max_height = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_blog_image_height', true));
				$featured_image_crop       = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_blog_image_crop', true));
			}
		}

		if( $featured_image_resize !== "false"){

			// thumbnail min width
			$w = ! empty( $featured_image_max_width ) ? $featured_image_max_width : rt_get_min_resize_size( $list_layout );			

			// thumbnail max height
			$h = ! empty( $featured_image_max_height ) ? $featured_image_max_height : 10000;

			//thumbnail output
			$thumbnail_image_output = ! empty( $featured_image_id ) ? get_resized_image_output( array( "image_url" => "", "image_id" => $featured_image_id, "w" => $w, "h" => $h, "crop" => $featured_image_crop ) ) : ""; 	

		}else{
			//thumbnail output
			$thumbnail_image_output = ! empty( $featured_image_id ) ? rt_get_image_output( array( "image_url" => "", "image_id" => $featured_image_id ) ) : ""; 						
		}


		// Tiny image thumbnail for lightbox gallery feature
		$lightbox_thumbnail = ! empty( $featured_image_id ) ? rt_vt_resize( $featured_image_id, "", 75, 50, true ) : rt_vt_resize( $featured_image_id, "", 75, 50, true ); 
		$lightbox_thumbnail = is_array( $lightbox_thumbnail ) ? $lightbox_thumbnail["url"] : "" ; 

		//gallery usage 
		$gallery_usage         = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'_gallery_usage', true)); 
		$gallery_usage_listing = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'_gallery_usage_listing', true));	 

		// gallery images
		$rt_gallery_images = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG . "rt_gallery_images", true )); 
		$rt_gallery_images = ! empty( $rt_gallery_images ) ? ! is_array( $rt_gallery_images ) ? explode(",", $rt_gallery_images) : $rt_gallery_images : array(); //turn into an array

		//video_usage_listing
		$video_usage_listing = get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'_video_usage_listing', true); 
		$video_usage_listing = isset( $layout_style ) && $layout_style == "masonry" && $video_usage_listing == "same" ? "only_featured_image" : $video_usage_listing;


		//create global values array
		$rt_post_values = array(
			"title"                    => get_the_title(),
			"permalink"                => get_permalink(),
			"featured_image_id"        => $featured_image_id ,
			"featured_image_url"       => esc_url($featured_image_url), 
			"post_format_link"         => esc_url(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'post_format_link', true)),
			"video_mp4"                => esc_url(get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'_post_video_m4v', true)),
			"video_webm"               => esc_url(get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'_post_video_webm', true)),
			"external_video"           => esc_url(get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'video_url', true)),
			"video_usage_listing"      => $video_usage_listing, 
			"audio_mp3"                => esc_url(get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'_post_audio_mp3', true)),
			"audio_ogg"                => esc_url(get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'_post_audio_oga', true)),
			"audio_usage_listing"      => get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'_audio_usage_listing', true),
			"gallery_images"           => $rt_gallery_images,
			"gallery_usage"            => $gallery_usage,
			"gallery_usage_listing"    => $gallery_usage_listing,
			"thumbnail_image_output"   => $thumbnail_image_output,
			"lightbox_thumbnail"       => $lightbox_thumbnail,
			"slider_images_crop"       => esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'gallery_images_crop', true)),
			"slider_images_max_height" => esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'gallery_images_height', true)),
		);


		return $rt_post_values;
	}
}

if( ! function_exists("rt_get_single_post_values") ){
	/**
	 * Get post values for single
	 * gets all data of a post including metas
	 * 
	 * @param  array $post
	 * @param  array $atts [atts of rt_blog_post_loop function]
	 * @return array
	 */
	function rt_get_single_post_values( $post = array(), $atts = array() ){


		//defaults
		$atts = shortcode_atts(array(  
			"layout"                     => "1/1",
			"show_author"                => get_theme_mod( RT_THEMESLUG ."_show_author_single" ) ? "true" : "false",
			"show_categories"            => get_theme_mod( RT_THEMESLUG ."_show_categories_single" ) ? "true" : "false",
			"show_comment_numbers"       => "false",
			"show_date"                  => get_theme_mod( RT_THEMESLUG ."_show_date_single" ) ? "true" : "false",
			"show_tags"                  => "true",
			"featured_image_max_height"  => 1000,
			"featured_image_crop"        => false,
			"show_author_info"           => get_theme_mod( RT_THEMESLUG ."_show_author_info" ),
			"featured_image_single_page" => get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'featured_image_single_page', true),
			"show_share_buttons"         => true
		), $atts);

		extract( $atts );

		//featured image
		$featured_image_id     = get_post_thumbnail_id(); 
		$featured_image_url    = ! empty( $featured_image_id ) ? wp_get_attachment_image_src( $featured_image_id, "full" ) : "";
		$featured_image_url    = is_array( $featured_image_url ) ? $featured_image_url[0] : "";	

		//custom thumbnail max height & crop settings for this post				
		$this_featured_image_settings = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_featured_image_settings', true);
		$featured_image_max_height = $this_featured_image_settings == "new" ? get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'blog_image_height', true) : $featured_image_max_height;
		$featured_image_crop = $this_featured_image_settings == "new" ? get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'blog_image_crop', true) : $featured_image_crop;

		// thumbnail min width
		$w = rt_get_min_resize_size($layout);

		// thumbnail max height
		$h = ! empty( $featured_image_max_height ) ? $featured_image_max_height : 10000;

	 	//thumbnail output
	 	$thumbnail_image_output = ! empty( $featured_image_id ) ? get_resized_image_output( array( "image_url" => "", "image_id" => $featured_image_id, "w" => $w, "h" => $h, "crop" => $featured_image_crop ) ) : ""; 

		// Tiny image thumbnail for lightbox gallery feature
		$lightbox_thumbnail = ! empty( $featured_image_id ) ? rt_vt_resize( $featured_image_id, "", 75, 50, true ) : rt_vt_resize( $featured_image_id, "", 75, 50, true ); 
		$lightbox_thumbnail = is_array( $lightbox_thumbnail ) ? $lightbox_thumbnail["url"] : "" ; 

		//gallery usage 
		$gallery_usage = get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'_gallery_usage', true);			

		// gallery images
		$rt_gallery_images = get_post_meta( $post->ID, RT_COMMON_THEMESLUG . "rt_gallery_images", true ); 
		$rt_gallery_images = ! empty( $rt_gallery_images ) ? ! is_array( $rt_gallery_images ) ? explode(",", $rt_gallery_images) : $rt_gallery_images : array(); //turn into an array

		//create global values array
		$rt_post_values = array(
			"title"                    => get_the_title(),
			"permalink"                => get_permalink(),
			"featured_image_id"        => $featured_image_id ,
			"featured_image_url"       => $featured_image_url, 
			"post_format_link"         => get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'post_format_link', true),
			"video_mp4"                => get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'_post_video_m4v', true),
			"video_webm"               => get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'_post_video_webm', true), 
			"external_video"           => get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'video_url', true),
			"audio_mp3"                => get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'_post_audio_mp3', true), 
			"audio_ogg"                => get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'_post_audio_oga', true), 
			"gallery_images"           => $rt_gallery_images,
			"gallery_usage"            => $gallery_usage,
			"thumbnail_image_output"   => $thumbnail_image_output,
			"lightbox_thumbnail"       => $lightbox_thumbnail,
			"slider_images_crop"       => get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'gallery_images_crop', true),
			"slider_images_max_height" => get_post_meta( $post->ID, RT_COMMON_THEMESLUG .'gallery_images_height', true),							
		);

		$rt_post_values = array_merge($rt_post_values, $atts);


		return $rt_post_values;
	}
}

if( ! function_exists("remove_blog_shortcode") ){
	/**
	 * Remove blog shortcodes from content to prevent endless looping
	 * @param  string $content
	 * @return $content
	 */
	function remove_blog_shortcode( $content ){
		$content = str_replace("[blog_box", "[! removed shortcode to prevent endless loop blog_box", $content);
		return $content;
	}
}

if( ! function_exists("rt_get_page_count") ){
	/**
	 *  Get page count
	 * @return number $count
	 */
	function rt_get_page_count(){
		global $wp_query;	
		$count=array('page_count'=>$wp_query->max_num_pages,'post_count'=>$wp_query->post_count);
		return $count;
	}
}

if( ! function_exists("rt_is_theme_page") ){
	/**
	 * checks page reserved for blog, product, contanct or portfolio
	 * @return bool
	 */
	function rt_is_theme_page(){
		global $post, $rt_global_variables; 
		
		$post_id = is_object( $post ) ? rt_wpml_page_id( $post->ID ) : "";

		if( ! empty( $post_id )){	
			if( $post_id != $rt_global_variables['rt_blogpage'] && $post_id != $rt_global_variables['rt_productpage'] && $post_id != $rt_global_variables['rt_portfoliopage'] ){
			   return false;
			}else{
				return true;
			}
		}else{
			return false;
		}
	} 
}

if( ! function_exists("rt_is_blog_page") ){
	/**
	 * checks theme parts that reserved for blog
	 * @return bool
	 */
	function rt_is_blog_page(){

		global $rt_taxonomy, $rt_post_type, $post, $rt_global_variables; 
	 
		$post_id = is_object( $post ) ? rt_wpml_page_id( $post->ID ) : "";

		if( $rt_global_variables['rt_blogpage'] != "" && $post_id == $rt_global_variables['rt_blogpage'] ){
			return true;
		}	

		if( $rt_taxonomy == "category" || $rt_post_type == 'post' ){
			return true;
		}				
	}
}

if( ! function_exists("rt_is_product_page") ){
	/**
	 * checks theme parts that reserved for products
	 * @return bool
	 */	
	function rt_is_product_page(){
		global $rt_taxonomy, $rt_post_type, $post, $rt_global_variables; 
	 
		$post_id = is_object( $post ) ? rt_wpml_page_id( $post->ID ) : "";

		if( $rt_global_variables['rt_productpage'] != "" && $post_id == $rt_global_variables['rt_productpage'] ){
			return true;
		}

		if( $rt_taxonomy == "product_categories" || $rt_post_type == 'products' ){
			return true;
		}
	}
}

if( ! function_exists("rt_is_portfolio_page") ){
	/**
	 * checks theme parts that reserved for portfolio
	 * @return bool
	 */		
	function rt_is_portfolio_page(){
		global $rt_taxonomy, $rt_post_type, $post, $rt_global_variables; 
	 
		$post_id = is_object( $post ) ? rt_wpml_page_id( $post->ID ) : "";
		
		if( $rt_global_variables['rt_portfoliopage'] != "" && $post_id == $rt_global_variables['rt_portfoliopage'] ){
			return true;
		}

		if( $rt_taxonomy == "portfolio_categories" || $rt_post_type == 'portfolio' ){
			return true;
		}

	}
}

if( ! function_exists("rt_body_class_name") ){
	/**
	 * Append body classes
	 * @param array $classes
	 * @return array $classes
	 */
	function rt_body_class_name($classes) { 
 
 		// page loading
		$classes[] = get_theme_mod( RT_THEMESLUG.'_page_loading_effect' ) ? "rt-loading" : ""; 

 		// layout style
		$classes[] = $GLOBALS['rt_layout']; 

		// return the $classes array
		return $classes;
	}
}
add_filter('body_class','rt_body_class_name');

if( ! function_exists("rt_limit_search_results") ){
	/**
	 * Limit search results
	 * @param  string $query
	 * @return string $query
	 */
	function rt_limit_search_results($query) { 
		if ($query->is_search) {
				$query->set('posts_per_page', 10);
		}
		return $query; 
	}
}
add_filter('pre_get_posts','rt_limit_search_results');

if( ! function_exists("rt_HexToRGB") ){
	/**
	 * Convert Hex values to RGB
	 * @param  string $hex
	 * @return string $color
	 */
	function rt_HexToRGB($hex) {
		$hex = str_replace("#", "", $hex);
		$color = array();
	 
		if(strlen($hex) == 3) {
			$color['r'] = hexdec(substr($hex, 0, 1) . $r);
			$color['g'] = hexdec(substr($hex, 1, 1) . $g);
			$color['b'] = hexdec(substr($hex, 2, 1) . $b);
		}
		else if(strlen($hex) == 6) {
			$color['r'] = hexdec(substr($hex, 0, 2));
			$color['g'] = hexdec(substr($hex, 2, 2));
			$color['b'] = hexdec(substr($hex, 4, 2));
		}
		 
		return $color;
	}
}

if( ! function_exists("rt_rgba2hex") ){
	/**
	 * RGB Fallback color for RGBA colors for IE8
	 * 
	 * @param  string $rgb rgb value
	 * @return string hex value
	 */
	function rt_rgba2hex($rgb) {

		if( strpos( $rgb, "rgba" ) === false ){
			return $rgb;	
		} 
		
		$regex = '/[^\d\,|.]/i'; 
		$value_set = preg_replace($regex, "", $rgb);

		$hex = explode(",",$value_set);

		$r = dechex($hex[0]);
		$g = dechex($hex[1]);
		$b = dechex($hex[2]);

		return "#".$r.$g.$b;
	}
} 
 
if( ! function_exists("rt_search_highlight") ){
	/**
	 * Search Highlight
	 * @param  string $needle  
	 * @param  string $haystack
	 * @return string          
	 */
	function rt_search_highlight($needle, $haystack) {
		$ind = stripos($haystack, $needle);
		$len = strlen($needle);
			if($ind !== false) {
			return substr($haystack, 0, $ind) . '<span class="search_highlight">' . substr($haystack, $ind, $len) . "</span>" . rt_search_highlight($needle, substr($haystack, $ind + $len));
		} else {
			return $haystack;
		}
	}
}


/*

Deprecated with version 1.3

if( ! function_exists("rt_add_has_children_to_nav_items") ){
	/**
	 * Add hasSubMenu class, if a menu item has sub menu
	 * @param  array $items
	 * @return array $items
	
	function rt_add_has_children_to_nav_items( $items ){
		$parents = wp_list_pluck( $items, 'menu_item_parent');
		$out     = array ();

		foreach ( $items as $item )
		{
			in_array( $item->ID, $parents ) && $item->classes[] = 'hasSubMenu';
			$out[] = $item;
		}
		return $items;
	}
}
add_filter( 'wp_nav_menu_objects', 'rt_add_has_children_to_nav_items' );

*/

if( ! function_exists("rt_merge_featured_images") ){
	/**
	 * Merge Featured Images
	 * @param  array $rt_gallery_images
	 * @return array $rt_gallery_images
	 */
	function rt_merge_featured_images( $rt_gallery_images ){

		// wp - featured image 
		$featured_image_id     = get_post_thumbnail_id(); 
		$featured_image_url    = ! empty( $featured_image_id ) ? wp_get_attachment_image_src( $featured_image_id, "full" ) : ""; 
		
		if( is_array( $featured_image_url ) && isset( $featured_image_url[0] ) && is_array( $rt_gallery_images ) ){
			array_unshift($rt_gallery_images,  $featured_image_url[0] );
		}

		return $rt_gallery_images;
	}
}

if( ! function_exists("rt_post_meta") ){
	/**
	 * Post meta bar
	 * @param  array $atts
	 * @return html
	 */
	function rt_post_meta( $atts ){
		
		//defaults
		extract(shortcode_atts(array(  
			"show_author" => "true",
			"show_categories" => "true",
			"show_comment_numbers" => "true",
			"show_tags" => "false"
		), $atts));
	?>
		<!-- meta data -->
		<div class="post_data">
			
			<?php if( $show_author !== "false" ):?>
			<!-- user -->                                     
			<span class="icon-user user margin-right20"><?php the_author_posts_link();?></span>
			<?php endif;?>
				
			<?php 
			if( $show_categories !== "false" && get_the_category() ):?>
			<!-- categories -->
			<span class="icon-flow-cascade categories"><?php the_category(', ');?></span>
			<?php endif;?>

			<?php 
			if( $show_tags !== "false" && get_the_tags() ):?>
			<!-- categories -->
			<span class="icon-tag-1 tags"><?php the_tags("",", ","");?></span>
			<?php endif;?>

			<?php if( $show_comment_numbers !== "false" && comments_open() ):?>
			<!-- comments --> 
			<span class="icon-chat-empty comment_link"><a href="<?php comments_link(); ?>" title="<?php comments_number( __('0 Comment','rt_theme'), __('1 Comment','rt_theme'), __('% Comments','rt_theme') ); ?>" class="comment_link"><?php comments_number( __('0 Comment','rt_theme'), __('1 Comment','rt_theme'), __('% Comments','rt_theme') ); ?></a></span>
			<?php endif;?>

		</div><!-- / end div  .post_data -->
	<?php
	}
}
add_action( "post_meta_bar", "rt_post_meta", 10 );

if( ! function_exists("rt_get_min_resize_size") ){
	/**
	 *  Get min image resize size according to column width
	 * @param  string $column_width  
	 * @return number              
	 */
	function rt_get_min_resize_size( $column_width = "1/12" ){
		global $rt_global_variables;

		$column_width = $column_width == "" ? 1 : rt_column_count($column_width);
		$content_width = $rt_global_variables['sidebar_position'] == "left" || $rt_global_variables['sidebar_position'] == "right" ? $rt_global_variables["content_sidebar_width"] : $rt_global_variables["content_full_width"];		

		$max_image_width = $content_width; //max image size for the design
		$min_image_width = 480; //min image size for mobile view
		$resize_width = 0;		

		if( isset( $column_width ) && is_numeric( $column_width ) ){
			$resize_width = $max_image_width / ( $column_width );
			$resize_width = $resize_width > $min_image_width ? $resize_width : $min_image_width;
		}

		return intval( $resize_width );
	}
}

if( ! function_exists("rt_get_image_data") ){
	/**
	 * Get data of a resized image
	 * @param  array $args
	 * @return array      
	 */
	function rt_get_image_data($args){
		global $post;  
	   
		//args
		extract(shortcode_atts(array(  
			"image_id"  => "", 
			"image_url"  => "", 
			"w" => "",
			"h" => "",
			"crop" => false 
		), $args));


		//save the global post if any
		$save_post = $post;

		//find post id from src 
		if ( empty( $image_id ) && ! empty( $image_url ) ){
			$image_id = rt_get_attachment_id_from_src($image_url);			

		}

		//get the post attachment
		$attachment = ! empty ( $image_id ) ? get_post( $image_id ) : false ;	

		if( $attachment ){

			//attachment data
			$image_title =  esc_attr($attachment->post_title);			
			$image_caption =  esc_attr($attachment->post_excerpt);			
			$image_description =  $attachment->post_content;			
			$image_alternative_text = esc_attr(get_post_meta( $image_id , '_wp_attachment_image_alt', true));		

			//image url - if not provided
			$orginal_image_url = empty( $image_url ) ? $attachment->guid : esc_url($image_url) ;
 
			//resized img src - resize the image if $w and $h suplied 
			$thumbnail_url = ( ! empty( $w ) && ! empty( $h ) ) ? rt_vt_resize( $image_id, '', $w, $h, $crop ) : $orginal_image_url;	
			$thumbnail_url = is_array( $thumbnail_url ) ? $thumbnail_url["url"] : $thumbnail_url ;
	 
			// Tiny image thumbnail for lightbox gallery feature
			$lightbox_thumbnail = rt_vt_resize( $image_id, '', 75, 50, true ); 
			$lightbox_thumbnail = is_array( $lightbox_thumbnail ) ? $lightbox_thumbnail["url"] : $thumbnail_url ;		
		}


		//give back the global post
		$post = $save_post; 


		if( $attachment ){
			//output
			return array(
				"image_title"   => $image_title, 
				"image_caption" => $image_caption, 
				"image_alternative_text" => $image_alternative_text,
				"image_url" => $orginal_image_url,
				"thumbnail_url" => $thumbnail_url,
				"lightbox_thumbnail" => $lightbox_thumbnail
			);			
		}else{

			//output
			return array(
				"image_title"   => "", 
				"image_caption" => "", 
				"image_alternative_text" => "",
				"image_url" => $image_url,
				"thumbnail_url" => $image_url,
				"lightbox_thumbnail" => $image_url
			);			
		}

	}
}

if( ! function_exists("rt_create_lightbox_link") ){
	/**
	 * Create a link for lightbox
	 * @param  array $args
	 * @return html      
	 */
	function rt_create_lightbox_link($atts){

		//defaults
		extract(shortcode_atts(array(  
			"id"  => 'lightbox-'.rand(100000, 1000000), 
			"title" => "",
			"href" => "",
			"class" => "",
			"data_group" => "",
			"data_thumbnail" => "",
			"data_thumbTooltip" => "",
			"data_title" => "", 
			"data_description" => "", 
			"data_scaleUp" => "", 
			"data_href" => "", 
			"data_width" => "", 
			"data_height" => "", 
			"data_flashHasPriority" => "", 
			"data_poster" => "", 
			"data_autoplay" => "", 
			"data_audiotitle" => "", 
			"inner_content" => "",
			"tooltip" => false,
			"echo"=> true
		), $atts));

		//description id
		$data_description_id = ! empty( $data_description ) ? '#'.$id.'-description' : "";

		//description output
		$data_description_output = ! empty( $data_description ) ? sprintf('
			<div class="jackbox-description" id="%s-description">        
				<h3>%s</h3>
				%s
			</div>',
		$id, esc_attr($data_title), esc_attr($data_description)) : "";

		//tooltip
		$tooltip = $tooltip == "true" ? ' data-placement="top" data-toggle="tooltip"' : "";

		//output
		$lightbox_link = sprintf(
			'<a id="%s" class="%s" data-group="%s" title="%s" data-title="%s" data-description="%s" data-thumbnail="%s" data-thumbTooltip="%s" data-scaleUp="%s" data-href="%s" data-width="%s" data-height="%s" data-flashHasPriority="%s" data-poster="%s" data-autoplay="%s" data-audiotitle="%s" href="%s" %s>%s</a>%s',
			$id,
			$class,
			$data_group,
			esc_attr($title),
			esc_attr($data_title),
			$data_description_id,
			esc_url($data_thumbnail),
			$data_thumbTooltip,
			$data_scaleUp,
			esc_url($data_href),
			$data_width,
			$data_height,
			$data_flashHasPriority,
			$data_poster,
			$data_autoplay,
			$data_audiotitle,
			esc_url($href),
			$tooltip,
			$inner_content,
			$data_description_output
		);

		//echo 
		echo ( $echo ) ? $lightbox_link : "";

		return $lightbox_link;
	}
}
add_action( "create_lightbox_link", "rt_create_lightbox_link", 10, 1 );

if( ! function_exists("get_resized_image_output") ){
	/**
	 * Get html output of a resized image
	 * @param  array $atts
	 * @return html 
	 */
	function get_resized_image_output( $atts = array() ){

		//defaults
		extract(shortcode_atts(array(  
			"image_url" => "", 	   
			"image_id" => "", 	   
			"w" => "", 	   
			"h" => "", 	   
			"crop" => false,
			"class" => ""
		), $atts)); 

		
		if ( empty( $image_id ) && empty( $image_url ) ){
			return false;
		}else{

			$image_id = empty( $image_id ) && ! empty( $image_url ) ? rt_get_attachment_id_from_src( $image_url ) : $image_id ;

			$image_thumb = ! empty( $image_id ) ? rt_vt_resize( $image_id, '', $w, $h, $crop ) : rt_vt_resize( '', $image_url, $w, $h, $crop );

			$image_alternative_text = ! empty( $image_id ) ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : "";		

			$image_output = is_array($image_thumb) ? '<img src="'.esc_url($image_thumb['url']).'" alt="'.esc_attr($image_alternative_text).'" class="'.sanitize_html_class($class).'" />' : "";	

			return $image_output;
		}
	}
}

if( ! function_exists("rt_get_image_output") ){
	/**
	 * Get html output of an image
	 * @param  array $atts
	 * @return html 
	 */	
	function rt_get_image_output( $atts = array() ){

		//defaults
		extract(shortcode_atts(array(  
			"image_url" => "", 	   
			"image_id" => "", 	   
			"class" => "",
			"id" => ""
		), $atts)); 
		
		if ( empty( $image_id ) && empty( $image_url ) ){
			return false;
		}else{

			//find img id from src 
			if ( empty( $image_id ) && ! empty( $image_url ) ){
				$image_id = rt_get_attachment_id_from_src($image_url);
			}

			//image alt texx
			$image_alternative_text = ! empty( $image_id ) ? get_post_meta($image_id, '_wp_attachment_image_alt', true) : "";		

			//image src
			$image_src = ! empty( $image_id ) ? rt_get_attachment_image_src( $image_id ) : $image_url;

			//if img src couldn't found return false
			if( ! $image_src ){
				return ;
			}
	 	
	 		//image id attr
			$id = ! empty( $id ) ? 'id="'.sanitize_html_class($id).'"' : "";

			//the output
			$image_output = '<img '.$id.' itemprop="image" src="'.esc_url($image_src).'" alt="'.esc_attr($image_alternative_text).'" class="'.sanitize_html_class($class).'" />';	

			return $image_output;
		}
	}
}

if( ! function_exists("rt_get_pagination") ){
	/**
	 * 
	 * Get Pagination
	 * gets the WP pagination for the post list
	 *
	 * @param  boolean/object $wp_query
	 * @param  integer $range   
	 * @param  boolean $before  
	 * @param  boolean $after   
	 * @param  boolean $echo    
	 * @return html           
	 */
	function rt_get_pagination($wp_query = false, $range = 8, $before = false, $after = false, $echo = true ){
		global $paged;
		$max_page = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		$output = '<div class="paging_wrapper margin-t30 margin-b30">';
		$output .= paginate_links( array(
									'current' => max( 1, $paged ),
									'total' => $wp_query->max_num_pages,
									'type' => 'list',
									'show_all' => false,
									'prev_next' => true,
									'prev_text' => '<span class="icon-angle-left"></span>',
									'next_text' => '<span class="icon-angle-right"></span>',	
								) );
		$output .= '</div>'; 

		if( $echo ){
			echo $output;
		}else{
			return $output;
		}
	}
}

if( ! function_exists("rt_get_attachment_image_src") ){

	/**
	 * Get Attachment Image Source
	 * Returns url of the attachment image by using native WP function
	 * in some shortcode settins the image can be ID or URL. 
	 * This function only works when ID provided
	 *
	 * @since 1.0
	 *
	 * @param  string $image image id or url
	 * @param  string $size  thumbnail width
	 * @return array $url 
	 */
	function rt_get_attachment_image_src( $image = "", $size = "full" ) {

		$url = is_numeric(trim($image)) ? wp_get_attachment_image_src( $image, $size ) : $image ;
		$url = is_array( $url ) ? $url[0] : $url ;	

		return $url;
	}
}

if( ! function_exists("rt_content_container") ){

	/**
	 * Content Container
	 * Creates a content container 
	 *
	 * @since 1.0
	 *
	 * @param  array $atts {
	 *     @type key "action" can be "start" or "end"
	 *     @type key "echo" = boolean 
	 * }
	 * @return string $output html output
	 */
	function rt_content_container($atts) {
		global $rt_global_variables; 		

		$row_class = $wrapper_class = $col_class = $id = "";

 		if( isset( $atts["overlap"] ) && $atts["overlap"] == true ){
 			$row_class .= "overlap";
 		}

 		if( isset( $atts["fullwidth"] ) && $atts["fullwidth"] == true ){
 			$row_class .= ' '."fullwidth";
 			$wrapper_class .= ' '."fullwidth";
 		}

 		if( isset( $atts["class"] ) && ! empty( $atts["class"] )  ){
 			$row_class .= ' '.$atts["class"];
 		}

 		if( isset( $atts["wrapper_class"] ) && ! empty( $atts["wrapper_class"] )  ){
 			$wrapper_class .= ' '.$atts["wrapper_class"];
 		}

 		if( isset( $atts["col_class"] ) && ! empty( $atts["col_class"] )  ){
 			$col_class .= $atts["col_class"];
 		}

 		if( isset( $atts["id"] ) && ! empty( $atts["id"] )  ){
 			$id = 'id="'.$atts["id"].'"';
 		}


		if( $atts["action"] == "start" ){		
			$output = '<div '.$id.' class="content_row default-style no-composer '.$row_class.'"><div class="content_row_wrapper clearfix '.$wrapper_class.'"><div class="col col-sm-12 col-xs-12 '.$col_class.'">';


			if( isset( $atts["sidebar"] ) && $atts["sidebar"] != "" ){		
				if( $atts["sidebar"] == "left" ){
					$output .= '
						<div class="row fixed_heights">
						<div class="col col-sm-3 col-xs-12 sidebar left widgets_holder">
						'."\n";

							ob_start();	
							get_template_part("sidebar");
							$output .= ob_get_contents();
							ob_end_clean(); 

					$output .= '
						</div>
						<div class="col col-sm-9 col-xs-12">						
					'."\n";
				}else{
					$output .= '
						<div class="row fixed_heights">
						<div class="col col-sm-9 col-xs-12">
 					'."\n";
				}
			}
		}

		if( $atts["action"] == "end" ){

			$output = "";

			if( isset( $atts["sidebar"] ) && $atts["sidebar"] != "" ){		
				if( $atts["sidebar"] == "left" ){
					$output .= '
						</div></div>				
					'."\n";
				}else{
					$output .= '
						</div>
						<div class="col col-sm-3 col-xs-12 sidebar right widgets_holder">		
					'."\n";

							ob_start();	
							get_template_part("sidebar");
							$output .= ob_get_contents();
							ob_end_clean(); 

					$output .= '
						</div>		
						</div>		
					'."\n";	
				}
			}	


			$output .= '</div></div></div>';

		}



		if ( $atts["echo"] ){
			echo $output;
		}else{
			return $output;
		}

	}
}
add_action( 'rt_content_container', "rt_content_container", 1 ); 

if( ! function_exists("rt_sub_page_header_function") ){

	/**
	 * Sub page header
	 * Creates page title and breadcrumb menu html output for sub page headers
	 *
	 * @since 1.0
	 * 
	 * @global array $rt_global_variables
	 * @return string $output
	 */
	function rt_sub_page_header_function() {
		global $rt_global_variables;

		//title
		$title = ! $rt_global_variables["hide_page_title"] ? sprintf('<section class="page-title"><%2$s>%1$s</%2$s></section>', rt_get_title(), "h1" ) : "";

		//breadcrumb
		$breadcrumb = ! $rt_global_variables["hide_breadcrumb_menu"] && ! is_front_page() ? rt_breadcrumb( array("wrap_before" => '<div class="breadcrumb">', "wrap_after" => '</div>') ) : "";

		//stop if there is nothing to show
		if( $rt_global_variables["hide_page_title"] && $rt_global_variables["hide_breadcrumb_menu"] ){
			return ;
		}


		$style = $bg_style = $output = $wrapper_style = $wrapper_class  = $parallax = $class = "";

		//row background width
		$class .= $rt_global_variables["header_row_background_width"];
	 

		/*
		*	Background options  
		*/
		
		//background image
		$bg_image_url = $rt_global_variables["header_row_bg_image"] ?  rt_get_attachment_image_src( $rt_global_variables["header_row_bg_image"] ) : "" ; 		


		//classic bg values
		if( ! empty( $bg_image_url ) ){
			//background image
			$bg_style  .= 'background-image: url('.$bg_image_url.');';
			
			//background repeat
			$bg_style  .= ! empty( $rt_global_variables["header_row_bg_image_repeat"] ) ? 'background-repeat: '.$rt_global_variables["header_row_bg_image_repeat"].';': "";

			//background size
			$bg_style  .= ! empty( $rt_global_variables["header_row_bg_size"] ) ? 'background-size: '.$rt_global_variables["header_row_bg_size"].';': "";

			//background attachment
			$rt_global_variables["header_row_bg_attachment"] = $rt_global_variables["header_row_bg_effect"] != "parallax" ? $rt_global_variables["header_row_bg_attachment"] : "";
			$bg_style  .= ! empty( $rt_global_variables["header_row_bg_attachment"] ) ? 'background-attachment: '.$rt_global_variables["header_row_bg_attachment"].';': "";

			//background position
			$bg_style  .= ! empty( $rt_global_variables["header_row_bg_position"]  ) ? 'background-position: '.$rt_global_variables["header_row_bg_position"] .';': "";		
		}	

		//background color
		$bg_style  .= ! empty( $rt_global_variables["header_row_bg_color"] ) ? 'background-color: '.$rt_global_variables["header_row_bg_color"].';': "";


		//parallax  
		if( $rt_global_variables["header_row_bg_effect"] == "parallax" && ! empty( $bg_image_url ) ){
			
			$bg_style .= "width:100%;height:100%;top:0;";
			$parallax = ! empty( $bg_image_url ) && $rt_global_variables["header_row_bg_effect"] == "parallax" ? '<div class="rt-parallax-background" data-rt-parallax-direction="-1" data-rt-parallax-effect="vertical" style="'.$bg_style.'"></div>':"";		

			$bg_style = "";
			$style  .= "position:relative;overflow:hidden;";
		}

		//create styles
		$style .= $bg_style;
		$style_output = ! empty( $style ) ? 'style="'.$style.'"' : "";
		$wrapper_style = ! empty( $wrapper_style ) ? 'style="'.$wrapper_style.'"' : "";

		//content output
		$content_output = '<div class="content_row_wrapper '. $wrapper_class .' '. $rt_global_variables["header_row_content_width"] .'" '. $wrapper_style .'><div class="col col-sm-12">'.$breadcrumb.$title.'</div></div>';

		$output .= "\n".'<div class="content_row row sub_page_header '.$class.'" '.$style_output.'>';
		$output .= "\n\t".$parallax;
		$output .= "\n\t".$content_output;
		$output .= "\n".'</div>'."\n";

		echo $output;

	}
}
add_action( 'rt_sub_page_header', "rt_sub_page_header_function" ); 




if( ! function_exists("rt_get_title") ){

	/**
	 * Get title
	 * gets the title of current page according the content types
	 *
	 * @since 1.0
	 * 
	 * @global $post, $wp_query;
	 * @return string $title;
	 */
	function rt_get_title() {
		global $post, $wp_query;

		// the page title

		//frontpage
		if( is_front_page() ){
			$title = get_bloginfo('description');
		}

		//single
		if( is_single() || is_page() ){ 
			$title = get_the_title();
		}

		//single
		$blog_name = get_theme_mod(RT_THEMESLUG."_blog_page_name");
		if( is_single() && $post->post_type == "post" && $blog_name ){ 
			$title = $blog_name;
		} 		

		//categories
		if ( is_category() ) { 
			$title = single_cat_title("",false);
		}

		//taxamonies
		if ( is_tax() ) { 
			$title = single_term_title("",false);
		}

		//tags
		if ( is_tag() ) { 
			$title = single_tag_title("",false);
		}

		//authors
		if ( is_author() ) { 
			$title = get_the_author();
		}

		//search
		if ( is_search() ) { 
			$title = sprintf( __( 'Search Results for: %s', 'rt_theme' ), get_search_query() );
		}

		//woocommerce page title
		if ( class_exists( 'Woocommerce' ) ) { //woocommerce title
			if ( is_woocommerce() ){
				$title = get_woocommerce_page_title();
			}
		}

		//archive
		if ( is_archive() ){
			if ( is_day() ) {
				$title = sprintf( __( 'Daily Archives: %s', 'rt_theme' ), get_the_date() );
			} elseif ( is_month() ) {
				$title = sprintf( __( 'Monthly Archives: %s', 'rt_theme' ), get_the_date( __( 'F Y', 'rt_theme' ) ) );
			} elseif ( is_year() ) {
				$title = sprintf( __( 'Yearly Archives: %s', 'rt_theme' ), get_the_date( __( 'Y', 'rt_theme' ) ) );
			} elseif ( is_author() ) {
				$title = sprintf( __( 'All posts by: %s', 'rt_theme' ), get_the_author()  ); 
			} elseif ( is_tag() ) {
				$title = sprintf( __( 'Tag Archives: %s', 'rt_theme' ), single_tag_title( '', false ) );
			}
		}

		//posts page
		if ( is_home() && ! isset( $title ) ) { 
			$title = get_the_title( get_option( 'page_for_posts' ) );
		}

		//fallback
		if ( ! isset( $title ) || empty( $title ) ) { 
			$title = wp_title('|',false,"right"); 
		}

		return $title;
	}
}

if( ! function_exists("rt_column_class") ){

	/**
	 * Column Class Name
	 * returns the class name of the column by given number
	 *
	 * @since 1.0
	 * 
	 * @param  float/string $width if string provided, it will be converted to float for 12 columns. Ex: 4 will be 1/4
	 * @return string $class;
	 */
	function rt_column_class( $width = "1/1" ) {

		//the class list
		$class_list = array(
			"12/12" => "col-sm-12",			
			"1/1" => "col-sm-12",
			"11/12" => "col-sm-11",
			"10/12" => "col-sm-10",			
			"5/6" => "col-sm-10",
			"9/12" => "col-sm-9",
			"3/4" => "col-sm-9",			
			"8/12" => "col-sm-8",
			"2/3" => "col-sm-8",
			"7/12" => "col-sm-7",
			"6/12" => "col-sm-6",
			"1/2" => "col-sm-6",
			"5/12" => "col-sm-5",
			"1/3" => "col-sm-4",
			"4/12" => "col-sm-4",
			"1/4" => "col-sm-3", 
			"3/12" => "col-sm-3",
			"1/6" => "col-sm-2",
			"2/12" => "col-sm-2",
			"1/12" => "col-sm-1",
		);

		/* fix the provided width value if its not float */
		$width = strpos($width,"/") ? $width : "1/".intval($width);
		
		$class = array_key_exists( $width , $class_list ) ? $class_list[ $width ] : $class_list["1/1"];

		return $class;
	}
}

if( ! function_exists("rt_column_count") ){

	/**
	 * Column count according fractional number
	 *
	 * @since 1.0
	 * 
	 * @param  string $width 
	 * @return number $count;
	 */
	function rt_column_count( $width = "1/1" ) {

		$number = explode("/", $width);
		$number = is_array($number) && isset( $number[1] ) && isset( $number[0] ) && is_numeric( $number[0] ) && is_numeric( $number[1] ) ? $number[1]/$number[0] : 1;
		$number = is_numeric( $number ) ? $number : 1 ;

		return $number;
	}
}

if( ! function_exists( "get_attached_documents" ) ){ 
	/**
	 * Get Attached Documents of a Product
	 * 
	 * @param  string $rt_attached_documents
	 * @return string as a icon list shortcode
	 */
	function get_attached_documents( $rt_attached_documents = '' ){

			$rt_attached_documents_output = "";

			if(trim($rt_attached_documents)):
				$rt_attached_documents 	= trim(preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $rt_attached_documents));  
				$rt_attached_documents	= explode("\n", $rt_attached_documents);
			endif;
			
			if(is_array($rt_attached_documents)){
				
				$rt_attached_documents_output .= '[rt_icon_list list_style="style-1"]';

				foreach($rt_attached_documents as $a_file){
					if(strrpos($a_file,"|")) {
						$fileTarget = "";
						$a_file = explode("|", $a_file);
						$fileTarget = isset( $a_file[2] ) ? trim($a_file[2]) : "";
						$fileURL = isset( $a_file[1] ) ? trim($a_file[1]) : "";
						$fileName = isset( $a_file[0] ) ? trim($a_file[0]) : "";
					}else{
						$fileURL = trim( $a_file );
						$fileName  = "";
						$fileTarget = "_self";
					}

					//the download text
					if(strpos($fileURL, ".doc")){
						$file_text = __('Download Word File','rt_theme');
					}

					elseif(strpos($fileURL, ".xls")){
						$file_text = __('Download Excel File','rt_theme');								
					}

					elseif(strpos($fileURL, ".pdf")){
						$file_text = __('Download PDF File','rt_theme');
					}							

					elseif(strpos($fileURL, ".ppt")){
						$file_text = __('Download PowerPoint File','rt_theme');
					}							

					else{
						$file_text = __('Download File','rt_theme');
					}
					
					//fileTarget attr
					$fileTarget_attr = ! empty( $fileTarget ) ? 'target="'.$fileTarget.'"' : "";

					//the download link
					$download_link = ! empty( $fileName ) ? '<a href="'.$fileURL.'" title="'.$file_text.'" '.$fileTarget_attr.'>'.$fileName.'</a>' : '<a href="'.$fileURL.'" title="'.$file_text.'">'.$file_text.'</a>';
				
					//add to output
					$rt_attached_documents_output .= '[rt_icon_list_line icon_name="icon-download"]'.$download_link.'[/rt_icon_list_line]';

				}

				$rt_attached_documents_output .= "[/rt_icon_list]";


				return $rt_attached_documents_output;
			}
	}
}

if( ! function_exists("rt_create_carousel") ){
	/**
	 * Creates a carousel
	 *
	 * @since 1.0
	 * 
	 * @param  array $contents
	 * @param  string $id  
	 * @return output
	 */
	function rt_create_carousel( $contents = array(), $atts = array() ){
 
		//defaults
		extract(shortcode_atts(array(  
			"id"  => 'slider-'.rand(100000, 1000000), 
			"item_width"  => 4, 
			"class" => "",
			"dots" => "false",
			"nav" => "true",
			"margin" => 15,
			"autoplay" => "false",
			"timeout" => "5000" 
		), $atts));

		//id
		$id = "slider-".$id;
	
		$output = $contents_output  = "";

		//create carousel items
		foreach ( $contents as $content ) {
			$contents_output .= sprintf('<div>%s</div>',$content);
		} 

		//dots holder
		$dots_holder = ( $dots == "true" ) ? sprintf('
				<div id="%1$s-dots" class="dots-holder">
				</div>
			', $id) : "";


		//create final output
		$output = sprintf('
				<div id="%1$s" class="rt-carousel carousel-holder clearfix %2$s" data-item-width="%4$s" data-nav="%5$s" data-dots="%6$s" data-margin="%8$s" data-autoplay="%9$s" data-timeout="%10$s">
					<div class="owl-carousel">
						%3$s
					</div>
					%7$s
				</div>
			', $id, $class, $contents_output, $item_width, $nav, $dots, $dots_holder, $margin, $autoplay, $timeout); 		
  
		return $output;
	}
}

if( ! function_exists("rt_create_photo_gallery") ){
	/**
	 * Create photo gallery 
	 * by using provided image urls as an array
	 * 
	 * @param  array $atts 
	 * @return output
	 */
	function rt_create_photo_gallery( $atts ){

		//defaults
		extract(shortcode_atts(array(  
			"gallery_id"  => 'gallery-'.rand(100000, 1000000),   
			"crop" => false, 	   
			"h"	 => "",
			"image_urls" => array(),
			"image_ids" => array(),
			"lightbox" => false,
			"captions" => true,
			"item_width" => "1/6",
			"layout_style" => "grid"
		), $atts));

		//item width percentage
		$item_width = ! empty( $item_width ) ? $item_width : "1/3";

		//image array
		$image_array = ! empty( $image_urls ) ? $image_urls : $image_ids ;

		//create values
		$items_output = $caption_output = $lightbox_link = $image_effect = ""; 

		// Thumbnail width & height
		$w = rt_get_min_resize_size( $item_width );
		
		if( empty( $h ) ){
			$h = $crop ? $w / 1.5 : 10000;	
		}

		//layout style
		$add_holder_class = $item_width == "1/1" ? "" : ( $layout_style == "grid" ? " border_grid fixed_heights" : " masonry" ) ;

		//add column class
		$add_column_class = rt_column_class( $item_width );
		$add_column_class .= $layout_style == "masonry" ? " isotope-item" : "";
		
		//row count
		$column_count = rt_column_count( $item_width );

		//item counter
		$counter = 1;

		foreach ($image_array as $image) { 								 
 
			// Resize Image
			$image_data = is_numeric( $image ) ? rt_get_image_data( array( "image_id" => trim($image), "w" => $w, "h" => $h, "crop" => $crop )) : rt_get_image_data( array( "image_url" => trim($image), "w" => $w, "h" => $h, "crop" => $crop ) ); 	


			//create image html output
			if( $lightbox ){

				$image_output = rt_create_lightbox_link(
					array(
						'class' => 'lightbox_ zoom imgeffect',
						'href' => $image_data["image_url"],
						'title' => __('Enlarge Image','rt_theme'),
						'data_group' => $gallery_id,
						'data_title' => $image_data["image_title"],
						'data_description' => $image_data["image_caption"],
						'data_thumbnail' => $image_data["lightbox_thumbnail"],
						'echo' => false,
						'inner_content' => sprintf('<img src="%s" alt="%s">',$image_data["thumbnail_url"], $image_data["image_alternative_text"])
					)
				);

			}else{

				$image_output = sprintf('<img src="%s" alt="%s">',$image_data["thumbnail_url"], $image_data["image_alternative_text"] );

			}


			//create caption
			$caption_output = $captions && ! empty( $image_data["image_caption"] ) ? sprintf('
				<p class="gallery-caption-text">%s</p>
			', $image_data["image_caption"] ) : "";
		

			//open row block
			if(  $layout_style != "masonry" && $item_width != "1/1" && ( $counter % $column_count == 1 || $column_count == 1 ) ){
				$items_output .= '<div class="row clearfix">'."\n";
			}	

				//list items output
				$items_output .= sprintf('
					<div class="col %s">
						%s
						%s 	
					</div>
				', $add_column_class, $image_output, $caption_output);


			//close row block
			if( $layout_style != "masonry" && $item_width != "1/1" && ( $counter % $column_count == 0 || count($image_array) == $counter ) ){
				$items_output .= '</div>'."\n";  
			}

		$counter++;
		}

		//the gallery holder output
		$gallery_holder_output = sprintf('
			<div class="photo_gallery clearfix %s" id="%s" data-column-width="%s">%s</div> 
		',$add_holder_class, $gallery_id, $column_count, $items_output ); 

		echo $gallery_holder_output; 
	}
}
add_action( "create_photo_gallery", "rt_create_photo_gallery", 10, 1 );

if( ! function_exists("rt_ajax_loader") ){
	/**
	 * Load ajax products
	 *
	 * @since 1.0
	 * 
	 * @param  array $atts 
	 * @return output
	 */

	function rt_ajax_loader( $atts = array() )
	{
		global $rt_global_variables;
		
		if( ! isset( $rt_global_variables ) ){
			rt_global_variables();
		}

		$atts = unserialize(base64_decode( sanitize_text_field($_POST["atts"]) ) );
		$page = sanitize_text_field( $_POST["page"] );
		$atts["paged"] = $page;
		$atts["wpml_lang"] = $_POST["wpml_lang"];


		//current lang
		if( isset( $_POST["wpml_lang"] ) && ! empty( $_POST["wpml_lang"] ) ){
			global $sitepress;
			$sitepress->switch_lang( sanitize_text_field($_POST['wpml_lang']), true);
			load_theme_textdomain('rt_theme', get_template_directory().'/languages' );
		}

		//conditional contens
		if( $atts["purpose"] == "products" ){
			echo rt_product_post_loop( array(), $atts );	
		}elseif( $atts["purpose"] == "portfolio" ){
			echo rt_portfolio_post_loop( array(), $atts );				
		}else{
			echo rt_blog_post_loop( array(), $atts ); 
		}
		
		die();
	}
}
add_action( 'wp_ajax_rt_ajax_loader', 'rt_ajax_loader' );
add_action( 'wp_ajax_nopriv_rt_ajax_loader', 'rt_ajax_loader' );

if( ! function_exists("rt_get_ajax_loader_button") ){
	/**
	 * Get ajax load more button
	 *
	 * @since 1.0
	 * 
	 * @param  array $atts 
	 * @return output
	 */

	function rt_get_ajax_loader_button( $atts = array(), $page_count = 0 )
	{
		printf('<button href="#" class="load_more button_ medium default aligncenter" autocomplete="off" data-atts="%1$s" data-page_count="%2$s" data-current_page="%3$s" data-listid="%5$s"><span class="icon-angle-double-down"></span>%4$s</button>',
				base64_encode(serialize( $atts )),
				$page_count,
				1,
				__("LOAD MORE","rt_theme"),
				$atts["id"]
			);
	}
}

if( ! function_exists("rt_create_product_image_slider") ){
	/**
	 * Create slider for product images
	 *
	 * @since 1.0
	 * 
	 * @param  array $rt_gallery_images  
	 * @param  string $id  
	 * @return output html
	 */
	function rt_create_product_image_slider( $rt_gallery_images = array(), $id = "", $column_width = 12 ){

		//slider id
		$slider_id = "slider-".$id;


		//image dimensions for product image slider
		$w = rt_get_min_resize_size( $column_width );


		//create slides and thumbnails outputs
		$output  = array();


		foreach ($rt_gallery_images as $image) { 								 

			// Resize Image
			$image_output = is_numeric( $image ) ? rt_get_image_data( array( "image_id" => trim($image), "w" => $w, "h" => 1000, "crop" => "" )) : rt_get_image_data( array( "image_url" => trim($image), "w" => $w, "h" => 1000, "crop" => "" ) ); 	
	 
			//create lightbox link
			$lightbox_link = rt_create_lightbox_link(
				array(
					'class'            => 'icon-zoom-in single lightbox_',
					'href'             => $image,
					'title'            => __('Enlarge Image','rt_theme'),
					'data_group'       => 'group_product_slider',
					'data_title'       => $image_output["image_title"],
					'data_description' => $image_output["image_caption"],
					'data_thumbnail'   => $image_output["thumbnail_url"],
					'echo'             => false
				)
			);

			$output[] .= sprintf('					 
				<div class="imgeffect">								
					%s
					<img src="%s" alt="%s" itemprop="image">
				</div>  
			',$lightbox_link, $image_output["thumbnail_url"], $image_output["image_alternative_text"] );
 
		}
   
		//slider atts
		$atts = array(  
			"id"  => "product-image-carosel", 
			"item_width"  => 1, 
			"class" => "product-image-carosel",
			"nav" => "true",
			"dots" => "false"
		);

		//create slider
		echo rt_create_carousel( $output, $atts );

	}
}
add_action( "rt_product_image_slider", "rt_create_product_image_slider", 10, 3 );

if( ! function_exists("rt_create_image_carousel") ){
	/**
	 * Create a carousel from the provided images
	 *
	 * @since 1.0
	 * 
	 * @param  array $rt_gallery_images  
	 * @param  string $id  
	 * @return output html
	 */
	function rt_create_image_carousel( $atts = array() ){

		//defaults
		extract(shortcode_atts(array(  
			"id"  => 'carousel-'.rand(100000, 1000000),   
			"crop" => false, 	   
			"h" => 10000,
			"w" =>  10000,
			"rt_gallery_images" => array(),
			"column_width" => "1/1",
			"carousel_atts" => array(),
			"echo" => true,
			"lightbox" => "true"			
		), $atts));

		//slider id
		$slider_id = "slider-".$id; 

		//crop
		$crop = ($crop === "false") ? false : $crop;	

		//image dimensions for product image slider
		$w = empty( $w ) ? rt_get_min_resize_size( $column_width ) : $w;

		//height		
		if( empty( $h ) ){
			$h = $crop ? $w / 1.5 : 10000;	
		}

		//create slides and thumbnails outputs
		$output  = array();

		foreach ($rt_gallery_images as $image) { 								 

			// Resize Image
			$image_output = is_numeric( $image ) ? rt_get_image_data( array( "image_id" => trim($image), "w" => $w, "h" => $h, "crop" => $crop )) : rt_get_image_data( array( "image_url" => trim($image), "w" => $w, "h" => $h, "crop" => $crop ) ); 	

			if( $lightbox != "false" ){
				
				//create lightbox link
				$output[] = rt_create_lightbox_link(
					array(
						'class'            => 'imgeffect zoom lightbox_',
						'href'             => $image_output["image_url"],
						'title'            => __('Enlarge Image','rt_theme'),
						'data_group'       => $slider_id,
						'data_title'       => $image_output["image_title"],
						'data_description' => $image_output["image_caption"],
						'data_thumbnail'   => $image_output["lightbox_thumbnail"],
						'echo'             => false,
						'inner_content'    => sprintf('<img src="%s" alt="%s" itemprop="image">',$image_output["thumbnail_url"], $image_output["image_alternative_text"] )
					)
				);

			}else{
				$output[] = sprintf('<img src="%s" alt="%s" itemprop="image">',$image_output["thumbnail_url"], $image_output["image_alternative_text"] );
			}

		}

		//create slider
		if($echo){
			echo rt_create_carousel( $output, $carousel_atts );
		}else{
			return rt_create_carousel( $output, $carousel_atts );
		}

	}
}
add_action( "rt_create_image_carousel", "rt_create_image_carousel", 10, 1 );

if( ! function_exists("rt_structured_data") ){
	/**
	 * Google Structured Data for blog posts
	 * @return html
	 */
	function rt_structured_data(){

		global $rt_post_values;

		echo '
			<meta itemprop="name" content="'. $rt_post_values["title"] .'">
			<meta itemprop="datePublished" content="'. get_the_date() .'">
			<meta itemprop="url" content="'. $rt_post_values["permalink"] .'">
			<meta itemprop="image" content="'. $rt_post_values["featured_image_url"] .'">
			<meta itemprop="author" content="'. get_the_author() .'">
		';

	}
}
add_action( "post_meta_bar", "rt_structured_data", 20 );


if( ! function_exists("rt_action_buttons") ){
	/**
	 * Action buttons
	 * generates a pair of buttons
	 * first one is for lightbox link - requires entire html code
	 * second one is regular link - requires link and title
	 * 
	 * @param  array  $atts 
	 * @return string $buttons    
	 */
	function rt_action_buttons( $atts = array() ) { 

		$atts = shortcode_atts(array(	
			"lightbox_link" => "",
			"link" => "",
			"title" => "",
			"external_link" => "",
			"target" => "_self",
			"echo" => false
		),$atts);

		extract( $atts );


		if( empty( $external_link ) ){
			$lightbox_button = ! empty( $lightbox_link ) ? sprintf("<li>%s</li>",$lightbox_link) : "";
			$link_button = ! empty( $link ) ? sprintf('<li><a class="link" href="%s" title="%s" target="%s"></a></li>',$link,$title,$target) : "";
		}else{
			$lightbox_button = "";
			$link_button = sprintf('<li><a class="extlink" href="%s" title="%s" target="%s"></a></li>',$external_link,$title,$target);
		}

		$buttons = empty( $lightbox_button ) && empty( $link_button ) ? "" : sprintf('<ul class="action_buttons">%s%s</ul>',$lightbox_button,$link_button);

		if( $echo ){
			echo $buttons;
		}else{
			return $buttons;
		}
	
	}
}
add_action('action_buttons','rt_action_buttons',10,1);



if( ! function_exists("rt_get_selected_fonts_list") ){
	/**
	 * Get selected fotns 
	 * 
	 * @return array $selected_fonts 
	 */
	function rt_get_selected_fonts_list() { 

		//fonts
		$heading_font = get_theme_mod( RT_THEMESLUG.'_heading_font' );
		$body_font = get_theme_mod( RT_THEMESLUG.'_body_font' );
		$menu_font = get_theme_mod( RT_THEMESLUG.'_menu_font' );
		$sub_menu_font = get_theme_mod( RT_THEMESLUG.'_sub_menu_font' );
		$empty_font = array( 0 => "websafe", 1 => "arial" );

		$heading_font = ! empty( $heading_font ) ? explode("||", $heading_font ) : $empty_font;
		$body_font = ! empty( $body_font ) ? explode("||", $body_font ) : $empty_font;
		$menu_font = ! empty( $menu_font ) ? explode("||", $menu_font ) : $empty_font;
		$sub_menu_font = ! empty( $sub_menu_font ) ? explode("||", $sub_menu_font ) : $empty_font;

		$selected_fonts["heading"] = is_array( $heading_font ) ? array( "kind" => $heading_font[0], "family" => $heading_font[1],  "subset" => get_theme_mod( RT_THEMESLUG.'_heading_font_subset' ), "variant" => get_theme_mod( RT_THEMESLUG.'_heading_font_variant' )  ) : "";
		$selected_fonts["body"] = is_array( $body_font ) ? array( "kind" => $body_font[0], "family" => $body_font[1],  "subset" => get_theme_mod( RT_THEMESLUG.'_body_font_subset' ), "variant" => get_theme_mod( RT_THEMESLUG.'_body_font_variant' )  ) : "";
		$selected_fonts["menu"] = is_array( $menu_font ) ? array( "kind" => $menu_font[0], "family" => $menu_font[1],  "subset" => get_theme_mod( RT_THEMESLUG.'_menu_font_subset' ), "variant" => get_theme_mod( RT_THEMESLUG.'_menu_font_variant' )  ) : "";
		$selected_fonts["sub_menu"] = is_array( $sub_menu_font ) ? array( "kind" => $sub_menu_font[0], "family" => $sub_menu_font[1],  "subset" => get_theme_mod( RT_THEMESLUG.'_sub_menu_font_subset' ), "variant" => get_theme_mod( RT_THEMESLUG.'_sub_menu_font_variant' )  ) : "";


		return $selected_fonts;
	}
}
add_filter('template_redirect','rt_get_selected_fonts_list');

if( ! function_exists("rt_staff_media_links") ){
	/**
	 * Staff Social Media Icons List  
	 * @param  string $post_id  
	 * @return html
	 */
	function rt_staff_media_links( $post_id = "" ){
		global $rt_social_media_icons;

		$social_media_output ='';			
		$target = "";					
		foreach ($rt_social_media_icons as $key => $value){
			

			//get the option values
			$link = get_post_meta($post_id, RT_COMMON_THEMESLUG.'_'.$value, true); 
			$followText = get_post_meta($post_id, RT_COMMON_THEMESLUG.'_'.$value.'_text', true); 		 
				

			if($value=="mail"){//e-mail icon link 
				
				if(strpos($link, "@")){
					$link = 'mailto:'.str_replace("mailto:", "", $link);
				}else{
					$link = str_replace("mailto:", "", $link);				
				} 

				$target = "_self";	

			}else{
				$link = $link;
				$target = "_blank";	
			} 


			//all icons
			if($link){
				$social_media_output .= '<li class="'.$value.'">';
				$social_media_output .= '<a class="icon-'.$value.'" target="'.$target.'" href="'. $link .'" title="'. esc_attr( $key ) .'">';
				
				! empty( $followText )
				and	$social_media_output .= '<span>'. esc_attr( $followText ) .'</span>';

				empty( $followText )
				and	$social_media_output .= '<span>'. esc_attr( $key ) .'</span>';

				$social_media_output .= '</a>';
				$social_media_output .= '</li>';
			}
		}

		if($social_media_output){
			echo  '<div class="person_links_wrapper"><ul class="social_media">'.$social_media_output.'</ul></div>';
		}
	}
}
add_action( "rt_staff_media_links", "rt_staff_media_links", 10 , 1);


if( ! function_exists("rt_shortcut_buttons") ){

	/**
	 * RT Shortcut Buttons [Left-Side]
	 * 
	 * Creates the HTML output of the shortcut buttons on the left sidebar
	 * @return output
	 */
	function rt_shortcut_buttons() { 

		//visibilies 
		$show_shortcut_buttons = apply_filters("show_shortcut_buttons",true);

		if( ! $show_shortcut_buttons ){
			return ;
		}

		$show_woocommerce = false;
		$show_wpml_langs = false;
		$button_count = 0;

		if(class_exists( 'Woocommerce' )){
			$show_woocommerce = apply_filters("woocommerce_shortcut_buttons",true);
			$button_count = $show_woocommerce === true ? $button_count+2 : $button_count;
		}

		if(function_exists('icl_get_languages')){
			$show_wpml_langs = apply_filters("wpml_shortcut_button",true);
			$button_count = $show_wpml_langs === true ? $button_count+1 : $button_count;

		}

		$show_search = apply_filters("search_shortcut_button",true);
		$button_count = $show_search === true ? $button_count+1 : $button_count;


		//if only search active
		if( $button_count == 1 && $show_search ){			
			echo '<div id="tools" class="widgets_holder side-element sidebar-widgets">';
			the_widget('WP_Widget_Search');
			echo '</div>';
			return ;
		}

		//no buttons
		if( $button_count == 0 ){			
			return ;
		}

	?>
		<!-- shortcut buttons -->
		<div id="tools" class="sidebar-widgets" data-item-count="<?php echo $button_count;?>">
 
			<ul>

				<?php
				//woocommerce related shortcuts
				if( $show_woocommerce):
				global $woocommerce;
				?>

					<?php if ( is_user_logged_in() ) { ?>
						<li class="tool-icon" title="<?php _e('Your Account','rt_theme'); ?>"><span class="icon-user"></span>
							<div class="widget">

								<h5><?php _e('Your Account','rt_theme'); ?></h5>

								<p>
									<?php
										global $current_user;
										printf( __( 'Hello <strong>%1$s</strong>', 'rt_theme' ), $current_user->display_name );
									?>
									<br />
									<?php
										printf( __( '<a href="%s" title="account page">account page</a> | <a href="%s" title="logout">logout</a>', 'rt_theme' ), get_permalink( rt_wpml_translated_page_id(get_option('woocommerce_myaccount_page_id')) ), wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ) );
									?>
								</p> 

							</div>

						</li>
					<?php } else { ?>
						<li class="tool-icon" title="<?php _e('Login','rt_theme'); ?>"><span class="icon-login"></span>

							<div class="widget">
								<h5><?php _e('Login','rt_theme'); ?></h5>
						 
									<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ): ?>
										<?php _e("Not registered yet?",'rt_theme')?> <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Register','rt_theme'); ?>"><?php _e('Register','rt_theme'); ?></a></p>
									<?php endif;?>
 
										<form method="post" class="login" action="<?php echo get_permalink(get_option( 'woocommerce_myaccount_page_id' )); ?>">

											<?php do_action( 'woocommerce_login_form_start' ); ?>

											<p class="form-row form-row-wide">
												<label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
												<input type="text" class="input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
											</p>
											<p class="form-row form-row-wide">
												<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
												<input class="input-text" type="password" name="password" id="password" />
											</p>

											<?php do_action( 'woocommerce_login_form' ); ?>

											<p class="form-row">
												<?php wp_nonce_field( 'woocommerce-login' ); ?>
												<input type="submit" class="button" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" />
												<label for="rememberme" class="inline">
													<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
												</label>
											</p>
											<p class="lost_password">
												<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
											</p>

											<?php do_action( 'woocommerce_login_form_end' ); ?>

										</form>
										
							</div>
						</li>
					<?php } ?>				

					<li class="tool-icon cart" title="<?php _e('Cart','rt_theme'); ?>"><span class="icon-basket"><sub class="number empty"><?php echo $woocommerce->cart->cart_contents_count;?></sub></span>
						<div class="widget woocommerce widget_shopping_cart">

							<h5><?php _e('Cart','rt_theme'); ?></h5>
							<div class="widget_shopping_cart_content"></div>

						</div>
					</li>

				<?php endif;?>

				<?php
				//search
				if( $show_search):
				?>
					<li class="tool-icon search" title="<?php _e('Search','rt_theme'); ?>"><span class="icon-search"></span>
						<div class="widget">
							<?php
								get_template_part('searchform');
							?>
						</div>
					</li>

				<?php endif;?>

				<?php
				//woml langs
				if( $show_wpml_langs):
				?>
					<li class="tool-icon languages" title="<?php _e('Languages','rt_theme'); ?>"><span class="icon-globe"><sub><?php echo $button_count > 2 ? ICL_LANGUAGE_CODE : ICL_LANGUAGE_NAME;?></sub></span>
						<div class="widget">
							<h5><?php _e('Languages','rt_theme'); ?></h5>
							<?php rt_wpml_languages_list();?>	
						</div>
					</li>

				<?php endif;?>


			</ul>
		</div><!-- / end #tools -->

	<?php
	}
} 

if( ! function_exists("rt_display_shortcut_buttons") ){
	/**
	 * RT Display Position of the Shortcut Buttons [Left-Side]
	 * 
	 * Hooks rt_before_navigation or rt_after_navigation to display the shortcut buttons
	 * @return action
	 */
	function rt_display_shortcut_buttons() { 

		if( $GLOBALS["rt_layout"] == "layout1" ){
			$shortcut_buttons = get_theme_mod( RT_THEMESLUG.'_shortcut_buttons' );

			if( $shortcut_buttons == "after_logo" ){
				add_action( "rt_before_navigation", "rt_shortcut_buttons", 1);
			}elseif( $shortcut_buttons == "after_nav" ){
				add_action( "rt_after_navigation", "rt_shortcut_buttons", 1);
			}else{
				return ;
			}
		}
	}
} 
add_action( "template_redirect", "rt_display_shortcut_buttons");


if( ! function_exists("rt_top_shortcut_buttons") ){

	/**
	 * RT Shortcut Buttons [HEADER]
	 * 
	 * Creates the HTML output of the shortcut buttons on the header
	 * @return output
	 */
	function rt_top_shortcut_buttons() { 
 
		if( $GLOBALS["rt_layout"] != "layout2" ){
			return ;
		}

		$show_user = $show_cart = $show_wpml = $show_search = false;

		if( class_exists( 'Woocommerce' ) ){
			$show_user = get_theme_mod( RT_THEMESLUG.'_top_shortcut_buttons_user' ) ? true : false ;
			$show_cart = get_theme_mod( RT_THEMESLUG.'_top_shortcut_buttons_cart' ) ? true : false ;
		}

		if(function_exists('icl_get_languages')){
			$show_wpml = get_theme_mod( RT_THEMESLUG.'_top_shortcut_buttons_wpml' ) ? true : false ;
		}

		$show_search = get_theme_mod( RT_THEMESLUG.'_top_shortcut_buttons_serch' ) ? true : false ;


		//no buttons
		if( ! $show_user && ! $show_cart && ! $show_wpml && ! $show_search ){			
			return ;
		}

	?>
		<!-- shortcut buttons -->
		<div id="tools">
			<ul>
				<li class="tool-icon" title="<?php _e('Open','rt_theme'); ?>"><span class="icon-plus"></span></li>
			</ul> 
			<ul>

				<?php
				//woocommerce related shortcuts 
				global $woocommerce;
				?>

				<?php if( $show_user ): ?>
					<?php if ( is_user_logged_in() ) { ?>
						<li class="tool-icon" title="<?php _e('Your Account','rt_theme'); ?>"><span class="icon-user"></span>
							<div class="widget">

								<h5><?php _e('Your Account','rt_theme'); ?></h5>

								<p>
									<?php
										global $current_user;
										printf( __( 'Hello <strong>%1$s</strong>', 'rt_theme' ), $current_user->display_name );
									?>
									<br />
									<?php
										printf( __( '<a href="%s" title="account page">account page</a> | <a href="%s" title="logout">logout</a>', 'rt_theme' ), get_permalink( rt_wpml_translated_page_id(get_option('woocommerce_myaccount_page_id')) ), wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ) );
									?>
								</p> 

							</div>

						</li>
					<?php } else { ?>
						<li class="tool-icon" title="<?php _e('Login','rt_theme'); ?>"><span class="icon-login"></span>

							<div class="widget">
								<h5><?php _e('Login','rt_theme'); ?></h5>

									<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ): ?>
										<?php _e("Not registered yet?",'rt_theme')?> <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Register','rt_theme'); ?>"><?php _e('Register','rt_theme'); ?></a></p>
									<?php endif;?>
 
										<form method="post" class="login" action="<?php echo get_permalink(get_option( 'woocommerce_myaccount_page_id' )); ?>">

											<?php do_action( 'woocommerce_login_form_start' ); ?>

											<p class="form-row form-row-wide">
												<label for="username"><?php _e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
												<input type="text" class="input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
											</p>
											<p class="form-row form-row-wide">
												<label for="password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
												<input class="input-text" type="password" name="password" id="password" />
											</p>

											<?php do_action( 'woocommerce_login_form' ); ?>

											<p class="form-row">
												<?php wp_nonce_field( 'woocommerce-login' ); ?>
												<input type="submit" class="button" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" />
												<label for="rememberme" class="inline">
													<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
												</label>
											</p>
											<p class="lost_password">
												<a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
											</p>

											<?php do_action( 'woocommerce_login_form_end' ); ?>

										</form>

							</div>
						</li>
					<?php } ?>
				<?php endif;?>			

				<?php if( $show_cart ): ?>
					<li class="tool-icon cart" title="<?php _e('Cart','rt_theme'); ?>"><span class="icon-basket"><sub class="number empty"><?php echo $woocommerce->cart->cart_contents_count;?></sub></span>
						<div class="widget woocommerce widget_shopping_cart">

							<h5><?php _e('Cart','rt_theme'); ?></h5>
							<div class="widget_shopping_cart_content"></div>

						</div>
					</li> 
				<?php endif;?>

				<?php
				//search
				if( $show_search):
				?>
					<li class="tool-icon search" title="<?php _e('Search','rt_theme'); ?>"><span class="icon-search"></span>
						<div class="widget">
							<?php
								get_template_part('searchform');
							?>
						</div>
					</li>

				<?php endif;?>

				<?php
				//woml langs
				if( $show_wpml):
				?>
					<li class="tool-icon languages" title="<?php _e('Languages','rt_theme'); ?>"><span class="icon-globe"><sub><?php echo ICL_LANGUAGE_CODE ;?></sub></span>
						<div class="widget">
							<h5><?php _e('Languages','rt_theme'); ?></h5>
							<?php rt_wpml_languages_list();?>	
						</div>
					</li>

				<?php endif;?>
			</ul>
		</div><!-- / end #tools -->

	<?php
	}
} 
add_action( "rt_after_navigation", "rt_top_shortcut_buttons", 1);
 


if( ! function_exists("rt_is_composer_allowed") ){
	/**
	 * RT Is composer allowed
	 * 
	 * check if the current content allowed to use visual composer
	 * @return bool
	 */
	function rt_is_composer_allowed() { 
		global $rt_post_type;

		if ( ! class_exists( 'RT_Custom_Posts' ) ) {
			return false;
		}

		if ( is_page() ){
			return true;
		}

		if ( is_single() && $rt_post_type == 'portfolio' ){
			return true;
		}

		return false;
	}
} 
add_action( "init", "rt_is_composer_allowed");

if( ! function_exists("rt_remove_vc_button") ){
	/**
	 * Remove "Edit with Visual Composer" button from WP's top bar
	 * because it is broken
	 */
	function rt_remove_vc_button() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu( "vc_inline-admin-bar-link" ); 
	}
} 
add_action( 'wp_before_admin_bar_render', "rt_remove_vc_button" , 999 ); 

if( ! function_exists("rt_is_css_dir_writeable") ){
	/**
	 * Check if the css dir is writable
	 * 
	 * @return bool
	 */
	function rt_is_css_dir_writeable() { 
		return is_writable( rt_get_custom_css_dir() );
	}
} 

if( ! function_exists("rt_get_custom_css_dir") ){
	/**
	 * Get custom css dir
	 * 
	 * @return $dir
	 */
	function rt_get_custom_css_dir() { 

		$upload_path = wp_upload_dir();

		$dir = $upload_path['basedir'] ."/". strtolower(RT_THEMESLUG). "/";
		return $dir;
	}
} 

if( ! function_exists("rt_get_custom_css_url") ){
	/**
	 * Get custom css url
	 * 
	 * @return $dir
	 */
	function rt_get_custom_css_url() { 

		$upload_path = wp_upload_dir();

		$url = $upload_path['baseurl'] ."/". strtolower(RT_THEMESLUG). "/";
		return $url;
	}
} 

if( ! function_exists("rt_create_dir") ){
	/**
	 * Creates a new dir
	 * 
	 * @return $dir
	 */
	function rt_create_dir( $dir = "" ) { 

		if( $dir == "" ) {
			return ;
		}

		global $wp_filesystem;

		if (empty($wp_filesystem)) {
			require_once (ABSPATH . '/wp-admin/includes/file.php');
			WP_Filesystem();
		}

		if( ! $wp_filesystem->is_dir( $dir ) ) {
			@$wp_filesystem->mkdir( $dir );
		}

	}
} 

if( ! function_exists("rt_create_css_dir") ){
	/**
	 * Create the dynamic custom css dir
	 * 
	 * @return $dir
	 */
	function rt_create_css_dir() { 
		if( ! is_admin() ){
			return ;
		}

 		rt_create_dir(rt_get_custom_css_dir());
	}
} 
add_action( 'init','rt_create_css_dir' );

if( ! function_exists("rt_custom_oembed_filter") ){
	/**
	 * 
	 * Responsive Videos
	 * 
	 * @param  string $html 
	 * @param  string $url
	 * @param  array $attr 
	 * @param  number $post_ID
	 * @return html
	 */
	function rt_custom_oembed_filter($html, $url, $attr, $post_ID) {
		$return = '<div class="video-container">'.$html.'</div>';
		return $return;
	}
} 
add_filter( 'embed_oembed_html', 'rt_custom_oembed_filter', 10, 4 ) ;



if( ! function_exists("rt_social_share_shortcode_fallback") ){
	/**
	 * 
	 * Fallback function for the rt_social_share_shortcode action 
	 * replace the shortcode with an empty string when rt-19 extensions plugin not installed
	 * 
	 * @return void
	 */
	function rt_social_share_shortcode_fallback( $shortcode ) {

		if( ! class_exists( 'RT19_Extensions' ) ){
			return "";
		}else{
			return $shortcode;
		}
	}
} 
add_action( 'rt_social_share_shortcode', 'rt_social_share_shortcode_fallback' ) ;


if( ! function_exists("rt_get_theme") ){
	/**
	 * Get Theme Data 
	 *
	 * Returns the theme data of orginal theme only not childs
	 * 
	 * @return void
	 */
	function rt_get_theme(){ 

		$theme_data = wp_get_theme(); 
		$main_theme_data = $theme_data->parent(); 

		if( ! empty( $main_theme_data ) ){		
			return $main_theme_data;
		}else{		
			return $theme_data;
		}
	}
}	


if( ! function_exists("rt_body_background_video") ){
	/**
	 * Body background video 
	 * 
	 * @return void
	 */
	function rt_body_background_video(){ 

		global $post;
  
		$background_video_mp4 = $background_video_webm = "";

		if( isset( $post ) && is_singular() ){

			$background_video_mp4 = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_body_background_video_mp4', true )); 
			$background_video_webm = esc_attr(get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_body_background_video_webm', true )); 
		}

		if( empty( $background_video_mp4 ) ){
			$background_video_mp4 = esc_attr(get_theme_mod(RT_THEMESLUG.'_background_video_mp4'));
		}
 
		if( empty( $background_video_webm ) ){
			$background_video_webm = esc_attr(get_theme_mod(RT_THEMESLUG.'_background_video_webm'));
		}

		if( ! empty( $background_video_mp4 ) && ! empty( $background_video_webm ) ){
		echo '<div id="body-bg-video" data-vide-bg="mp4: '.$background_video_mp4.', webm: '.$background_video_webm.', poster: none" ata-vide-options="posterType: none, loop: true, muted: true, position: 0% 0%"></div>';
		}		

	}
}	
add_action("rt_after_body","rt_body_background_video");
 
?>