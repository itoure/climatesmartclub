<?php
#-----------------------------------------
#	RT-Theme theme.php
#	version: 1.2
#-----------------------------------------

#
#	Site Class
#
 
class RTThemeSite extends RTTheme {
 
	function theme_init(){ 

		//Loading Theme Scripts
		add_action('wp_enqueue_scripts', array(&$this,'load_scripts'));

		//Loading Theme Styles
		add_action('wp_enqueue_scripts', array(&$this,'load_styles'),10);

		//Loading WP Style
		add_action('wp_enqueue_scripts', array(&$this,'load_wp_style'),20);

		//Loading Google Fonts 
		add_action('wp_enqueue_scripts', array(&$this,'rt_load_google_fonts'),40);	

		//Remove no-js
		add_action('wp_head', array(&$this,'rt_page_loading'),1);

		//Loading html5_shiv
		add_action('wp_head', array(&$this,'add_html5_shiv'));  

		//Loading html5_shiv
		add_action('wp_head', array(&$this,'add_ie9_filter'));  

	}  


	#
	# Loading Theme Scripts
	#
	
	function load_scripts(){

		if( ! get_theme_mod(RT_THEMESLUG.'_optimize_js') ){
			wp_enqueue_script('pace', RT_THEMEURI  . '/js/pace.js', 1, "", false );
			wp_enqueue_script('modernizr', RT_THEMEURI  . '/js/modernizr.min.js', 1, "", false );
			wp_enqueue_script('jquery');
			wp_enqueue_script('bootstrap', RT_THEMEURI  . '/js/bootstrap.min.js', array('jquery'), "", "true" );
			wp_enqueue_script('jquery-isotop', RT_THEMEURI . '/js/isotope.pkgd.min.js', array('jquery'),  "", "true" );	
			wp_enqueue_script('imagesloaded', RT_THEMEURI . '/js/imagesloaded.min.js', array('jquery'),  "", "true" );
			wp_enqueue_script('owl-carousel', RT_THEMEURI . '/js/owl.carousel.min.js', array('jquery'),  "", "true" );
			wp_enqueue_script('jflickrfeed', RT_THEMEURI . '/js/jflickrfeed.min.js', array('jquery'),  "", "true" );
			wp_enqueue_script('customselect', RT_THEMEURI . '/js/customselect.min.js', array('jquery'),  "", "true" );
			wp_enqueue_script('jackbox', RT_THEMEURI  . '/js/lightbox/js/jackbox-packed.min.js', array('jquery'), "", "true"  );
			wp_enqueue_script('placeholder_polyfill', RT_THEMEURI  . '/js/placeholders.min.js', array('jquery'), "", "true" );
			wp_enqueue_script('waypoints', RT_THEMEURI  . '/js/waypoints.min.js', array('jquery'), "", "true"  );
			wp_enqueue_script('jquery-vide', RT_THEMEURI  . '/js/jquery.vide.min.js', array('jquery'), "", "true"  );
			wp_enqueue_script('mediaelement');
			wp_enqueue_script('rt-theme-scripts', RT_THEMEURI  . '/js/scripts.js', 10000, "", "true" );
		}else{
			wp_enqueue_script('jquery');
			wp_enqueue_script('jackbox', RT_THEMEURI . '/js/lightbox/js/jackbox-packed.min.js', array('jquery'), "", "true" );
			wp_enqueue_script('mediaelement');
			wp_enqueue_script('rt-theme-scripts', RT_THEMEURI . '/js/app.min.js', array('jquery'), "", "true" );
		}	

		//ajax url depended WPML plugin
		$ajax_url = function_exists('icl_object_id') ? admin_url('admin-ajax.php?lang='.ICL_LANGUAGE_CODE.'') : admin_url('admin-ajax.php');

		//localize js params
		$js_params = array(
				'ajax_url' => $ajax_url,
				'rttheme_template_dir' => RT_THEMEURI,
				'popup_blocker_message' => __('Please disable your pop-up blocker and click the "Open" link again.','rt_theme'),
				'wpml_lang' =>	rt_wpml_get_current_language(),
				"theme_slug" => RT_THEMESLUG
		);

		wp_localize_script( 'rt-theme-scripts', 'rt_theme_params', $js_params );

		//thread comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}


	#
	# Replace no-js class with js
	# It must be inline script to prevent flickering
	#
	function rt_page_loading() { 
		echo '<script type="text/javascript">/*<![CDATA[ */ var html = document.getElementsByTagName("html")[0]; html.className = html.className.replace("no-js", "js"); window.onerror=function(e,f){var body = document.getElementsByTagName("body")[0]; body.className = body.className.replace("rt-loading", ""); var e_file = document.createElement("a");e_file.href = f;console.log( e );console.log( e_file.pathname );}/* ]]>*/</script>'."\n";
	}

	
	#
	# Loading Theme Styles
	#	
	function load_styles(){ 

		if( ! get_theme_mod(RT_THEMESLUG.'_optimize_css') ){

			wp_register_style('bootstrap', RT_THEMEURI . '/css/bootstrap.css');
			wp_register_style('fontello', rt_locate_media_file( '/css/fontello/css/fontello.css' )); 
			wp_register_style('theme-style-all', RT_THEMEURI . '/css/'. $GLOBALS['rt_layout'] .'/style.css');  
			wp_register_style('jquery-owl-carousel', RT_THEMEURI . '/css/owl-carousel.css');  
			wp_register_style('jackbox', RT_THEMEURI . '/js/lightbox/css/jackbox.min.css');		 
			wp_register_style('mediaelement-skin', RT_THEMEURI . '/css/mejs-skin.css');		  

			if(is_rtl()){
				wp_register_style('theme-style-rtl', RT_THEMEURI . '/css/'. $GLOBALS['rt_layout'] .'/rtl.css');		  				
			}

			if ( class_exists( 'Woocommerce' ) ) { 				
				wp_register_style('rt-woocommerce', RT_THEMEURI.'/css/woocommerce/rt-woocommerce.css');
				
				if(is_rtl()){
					wp_register_style('rt-woocommerce-rtl', RT_THEMEURI.'/css/woocommerce/rt-woocommerce-rtl.css');	
				}

			}

			wp_enqueue_style('bootstrap'); 		
			wp_enqueue_style('theme-style-all');
			wp_enqueue_style('rt-woocommerce');			
			wp_enqueue_style('mediaelement-skin');
			wp_enqueue_style('fontello');  
			wp_enqueue_style('jquery-owl-carousel'); 
			wp_enqueue_style('jackbox');

			//ie9
			wp_register_style('theme-ie9',RT_THEMEURI . '/css/ie9.css');
			$GLOBALS['wp_styles']->add_data( 'theme-ie9', 'conditional', 'IE 9' );
			wp_enqueue_style('theme-ie9'); 

			//rtl
			wp_enqueue_style('theme-style-rtl');
			wp_enqueue_style('rt-woocommerce-rtl');

		}else{

			wp_register_style('theme-style-all', RT_THEMEURI . '/css/'. $GLOBALS['rt_layout'] .'/app.min.css');  	
			wp_register_style('fontello', rt_locate_media_file( '/css/fontello/css/fontello.css' )); 	
			wp_register_style('jackbox', RT_THEMEURI . '/js/lightbox/css/jackbox.min.css');
			wp_register_style('mediaelement-skin', RT_THEMEURI . '/css/mejs-skin.min.css');		 

			if(is_rtl()){
				wp_register_style('theme-style-rtl', RT_THEMEURI . '/css/'. $GLOBALS['rt_layout'] .'/rtl.min.css');		  				
			}

		 	if ( class_exists( 'Woocommerce' ) ) { 
		 		wp_register_style('rt-woocommerce', RT_THEMEURI.'/css/woocommerce/rt-woocommerce.min.css');

				if(is_rtl()){
					wp_register_style('rt-woocommerce-rtl', RT_THEMEURI.'/css/woocommerce/rt-woocommerce-rtl.min.css');	
				}		 		
		 	}

			wp_enqueue_style('theme-style-all');  			
			wp_enqueue_style('rt-woocommerce');	
			wp_enqueue_style('mediaelement-skin');		
			wp_enqueue_style('fontello');  
			wp_enqueue_style('jackbox');		

			//ie9
			wp_register_style('theme-ie9',RT_THEMEURI . '/css/ie9.min.css');
			$GLOBALS['wp_styles']->add_data( 'theme-ie9', 'conditional', 'IE 9' );
			wp_enqueue_style('theme-ie9'); 		

			//rtl
			wp_enqueue_style('theme-style-rtl');	
			wp_enqueue_style('rt-woocommerce-rtl');			
		}


		//if it is customizer preview window and theme is not activated yet
		if( is_customize_preview() ) {
			if( ! get_theme_mods() ){
				wp_enqueue_style('theme-preview', RT_THEMEURI . '/css/preview-style.css');	
			}
		}


				
	}


	#
	# Loading WP default stylesheet 
	#	
	function load_wp_style(){ 
			wp_register_style('theme-style', get_bloginfo( 'stylesheet_url' ));		
			wp_enqueue_style('theme-style');
	}

	#
	#   Load Google Fonts
	#
	function rt_load_google_fonts(){

		$selected_fonts = rt_get_selected_fonts_list();

		$group_fonts = array();
		$subsets = array();
		$include_string = "";

		//import google fonts
		foreach( $selected_fonts as $purpose => $data) {
			if( is_array( $data ) && $data["kind"] == "google" ){ //check if it is a google font

				if( ! isset( $group_fonts[ $data["family"] ] ) ){
					$group_fonts[ $data["family"] ] = $data["family"] ;
					$group_fonts[ $data["family"] ] = array();
					$group_fonts[ $data["family"] ]["variants"] = array( $data["variant"] );
				}else{
					array_push( $group_fonts[ $data["family"] ]["variants"] , $data["variant"] );
				}

				$subsets = is_array( $data["subset"] ) ? array_merge( $subsets, $data["subset"] ) : $subsets ;
				
			}
		}

		//create include list
		foreach( $group_fonts as $family => $extend ) {
			$include_string .= ! empty( $include_string ) ? "|" : "";
			$include_string .= urlencode( $family ).':'. implode( array_unique( $extend["variants"] ) , "," ); 			
		}

		$include_string .= ! empty( $subsets ) ? '&amp;subset='. implode( array_unique( $subsets ) ,"," ) : "" ; 

		if( ! empty( $include_string ) ){
			wp_register_style( "rt-google-fonts", '//fonts.googleapis.com/css?family='.$include_string); 	
		}

		wp_enqueue_style( "rt-google-fonts" );

	}

	
	#
	#  HTML5 SHIV
	# 
	function add_html5_shiv(){ echo "\n".'<!--[if lt IE 9]><script src="'.RT_THEMEURI  . '/js/html5shiv.min.js"></script><![endif]-->'."\n";}


	#
	#  IE 9 FILTER
	# 
	function add_ie9_filter(){ echo '<!--[if gte IE 9]> <style type="text/css"> .gradient { filter: none; } </style> <![endif]-->'."\n";} 

}


?>