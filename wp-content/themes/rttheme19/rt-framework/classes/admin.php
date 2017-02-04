<?php
#-----------------------------------------
#	RT-Theme admin.php
#	version: 1.0
#-----------------------------------------

#
#	Admin Class
#

class RTThemeAdmin extends RTTheme{

	private $panel_pages = array(); 
	private $admin_notices = array();

	function admin_init(){ 

		// Load text domain
		load_theme_textdomain('rt_theme_admin', get_template_directory().'/languages' );

		//admin notices 
		add_action('admin_notices', array(&$this,'rt_admin_notices')); 	
 
		//Theme Version
		$this->rt_get_theme_version();

		//Load Admin Functions
		$this->load_admin_functions();
		 
		//Update Notifier
		//add_action('admin_menu', array(&$this,'update_notifier_menu'));		

		//Load Scripts
		add_action('admin_enqueue_scripts', array(&$this,'load_admin_scripts'));
		
		//Load Styles
		add_action('admin_enqueue_scripts', array(&$this,'load_admin_styles'));	 
		
		//Call Ajax function
		add_action('wp_ajax_my_action', array(&$this,'rt_admin_ajax') );

		// Hook into the 'wp_before_admin_bar_render' action
		add_action( 'wp_before_admin_bar_render', array(&$this,'custom_toolbar') , 999 ); 

	} 


	#
	#	Admin notices
	#
	function rt_admin_notices(){  

		if( is_array( $this->admin_notices ) ){
			foreach ( $this->admin_notices as $key => $value) {
				echo '<div id="notice" class="'.sanitize_html_class($value["type"]).'"><p>'.$value["text"].'</p></div>';
			}
		}
	}   


	#
	#	Add Toolbar Menus
	#
	function custom_toolbar() {
		global $wp_admin_bar;
 
		$args = array(
			'id'     => 'rt_icons',
			'title'  => '<div><span class="icon-rocket-1"></span>'.__( 'Icons', 'rt_theme_admin' ) .'</div>',		
			'group'  => false 
		);

		$wp_admin_bar->add_menu( $args ); 
	}
	 
	#
	#	Admin Ajax Process
	#

	function rt_admin_ajax() {

		if( isset( $_POST['iconSelector'] ) ){//icon selection
			$this->icon_selection();
		} 

		die();
		
	} 

	#
	#	Icon Selection
	#
	
	function icon_selection() {  
		
		echo'
			<div class="rt_modal icon-selection">
				<div class="window_bar">
					<div class="title">'. __('Icons', 'rt_theme_admin').'</div>
					<div class="left"><input type="text" name="icon_search" id="rt_icon_search" value="" placeholder="'. __('search', 'rt_theme_admin').'"><span id="rt_icon_search_result"></span></div>
					<div class="icon_selection_close rt_modal_control" title="'. __('Close', 'rt_theme_admin').'"><span class="icon-cancel"></span></div>
				</div>
			<div class="modal_content"><ul class="list-icons">
		';

		$json = "";

		//the json file of the fontello
		$fontello_json_file =  "/css/fontello/config.json";

		//get json file of the fontello font url with locate media file check if a json file is exist in the child theme
		$fontello_json_url = rt_locate_media_file( $fontello_json_file ) ; 

		//try with wp_remote_fopen first
		$json = wp_remote_fopen( $fontello_json_url ); 
 
		//try to include if no json returned
		if ( ! json_decode($json) ){
			ob_start(); 

			if( file_exists( get_stylesheet_directory(). $fontello_json_file ) ){
				include( get_stylesheet_directory(). $fontello_json_file ); 
			}else{
				include( get_template_directory() . $fontello_json_file  ); 
			}
				
			$json = ''.ob_get_contents().'';
			ob_end_clean(); 
		}

		//paste the list output
		if ( $json ){
			$json_output = json_decode($json);

			if( $json_output ){
				$icon_prefix = $json_output->css_prefix_text;

				$format = '<li class="%2$s%1$s"><span>%2$s%1$s</span></li>';
				echo sprintf($format, "blank", "");

				foreach ( $json_output->glyphs as $icon_name )
				{			     
					echo sprintf($format, $icon_name->css, $icon_prefix);
				}			
			}
		}	

		echo '</ul></div>';

	}


	#
	#	Load Admin Functions
	#
	
	function load_admin_functions() {		
		//include(RT_THEMEFRAMEWORKDIR . "/admin/functions/update_notifier.php");	
	}
	
	#
	#	Update Notifier
	#	
	
	/*
		function update_notifier_menu() {  
			global $rt_update_xml, $rt_themeupdatestatus;
				$rt_themeupdatestatus = get_option(RT_THEMESLUG.'_update_notifications');
				$update = ""; 
				
				if($rt_themeupdatestatus){
					$rt_update_xml 	= rt_get_latest_theme_version(RT_NOTIFIER_CACHE_INTERVAL); // Get the latest remote XML file on our server

					if( (float) $rt_update_xml->latest > (float) $this->version ) { // Compare current theme version with the remote XML version
						$update = '<span class="update-plugins count-1"><span class="update-count">'.$rt_update_xml->latest.'</span></span>';
					}
				}
					 
					$k = array('update_notifications' => __("Theme Updates ",'rt_theme_admin') .$update);
					array_merge($this->panel_pages, $k);
					$this->panel_pages = array_merge($this->panel_pages, $k);
		}
	*/		

 
 
	#
	#	Load Admin Scripts
	#

	function load_admin_scripts(){
		global $pagenow;

		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-droppable');
		wp_enqueue_script('jquery-ui-draggable'); 
		wp_enqueue_script('jquery-ui-tabs'); 
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('jquery-ui-mouse');  
		wp_enqueue_script('jquery-effects-core');  
		wp_enqueue_script('jquery-effects-scale');  
		wp_enqueue_script('jquery-effects-fade');  
		wp_enqueue_script('jquery-effects-highlight');  
		wp_enqueue_script('jquery-effects-transfer');  
		wp_enqueue_script('jquery-ui-button');  


		
		wp_enqueue_script('jquery-custom-select', RT_THEMEADMINURI.'/js/jquery.customselect.min.js');		
		wp_enqueue_script('spectrum', RT_THEMEADMINURI . '/js/spectrum/spectrum.min.js'); 
		wp_enqueue_script('jquery-tools', RT_THEMEADMINURI . '/js/rangeinput.min.js');
		wp_enqueue_script('jquery-amselect', RT_THEMEADMINURI . '/js/jquery.asmselect.min.js');  
		wp_enqueue_script('googlemaps','//maps.googleapis.com/maps/api/js?sensor=false','','',true);

		$min_extention = get_theme_mod(RT_THEMESLUG.'_optimize_css') ? ".min" : "";
		wp_enqueue_script('rt-google-maps', RT_THEMEADMINURI . '/js/rt_location_finder'.$min_extention.'.js','','',true);  
		wp_enqueue_script('admin-scripts', RT_THEMEADMINURI . '/js/script'.$min_extention.'.js','','',true);


		//localize js params
		$map_selector = array(
			'map_html' =>'
			<div class="rt_modal rt-location-selector">
				<div class="window_bar">
					<div class="title">'. __('Find Locations', 'rt_theme_admin').'</div>
					<div class="rt_modal_close rt_modal_control" title="'. __('Close', 'rt_theme_admin').'"><span class="icon-cancel"></span></div>
				</div>
				<div class="modal_content"> 
					<div class="gllpLatlonPicker">
							<ul>
								<li class="text_align_right">'.__('Search','rt_theme_admin').':</li>
								<li><input type="text" class="gllpSearchField"></li>
								<li><input type="button" class="gllpSearchButton button light" value="'.__('search','rt_theme_admin').'"></li>		
							</ul>
							<div class="gllpMap">'.__('Google Maps','rt_theme_admin').'</div>
							<ul>
								<li class="text_align_right">'.__('lat/lon','rt_theme_admin').':<input type="text" class="gllpLatitude" value="0"/>/<input type="text" class="gllpLongitude" value="0"/>
								<input type="button" class="select_map button light" value="'.__('select','rt_theme_admin').'">
								<input type="hidden" class="gllpZoom" value="3"/>
								<input type="hidden" class="selected_field" value="1"/>
								<input type="button" class="gllpUpdateButton" value="'.__('update map','rt_theme_admin').'">
							</ul>
					</div>
				</div>
			</div>

			',
		);
 
		wp_localize_script( 'jquery', 'rt_location_finder', $map_selector );

		$rt_variables=array( 
				"reset_theme" => __('Are you sure that you want reset the theme settings? ','rt_theme_admin'),
				"delete_image" => __('Are you sure that you want remove this image? ','rt_theme_admin'),
				"theme_slug" => RT_THEMESLUG
				);		

		wp_localize_script( 'jquery', 'rt_variables', $rt_variables );

	}

	#
	#	Load Admin Styles
	#
	
	function load_admin_styles(){
		
		if( ! get_theme_mod(RT_THEMESLUG.'_optimize_css') ){
			wp_enqueue_style('admin-style', RT_THEMEADMINURI . '/css/admin.css');   
		}else{
			wp_enqueue_style('admin-style', RT_THEMEADMINURI . '/css/admin.min.css');   
		}

		wp_enqueue_style('spectrum-style', RT_THEMEADMINURI . '/js/spectrum/spectrum.css'); 
		wp_enqueue_style('fontello', RT_THEMEURI . '/css/fontello/css/fontello.css');		
	}

	/**
	 * Get Theme Version 
	 *
	 * Returns the version number of the orginal theme
	 * 
	 * @return string version number
	 */
	function rt_get_theme_version(){ 

		$rt_theme_data = wp_get_theme(); 

		if( is_child_theme() ){
			$rt_theme_data = $rt_theme_data->parent(); 			
		}
		
		return $this->version = $rt_theme_data['Version'];
	}

	#
	#	Get Current Post Type
	#	 
 
	function get_current_post_type() {
		global $post, $typenow, $current_screen;
		
		if($post && $post->post_type) {
			return $post->post_type;
		}elseif($typenow) {
			return $typenow;
		}elseif($current_screen && $current_screen->post_type) {
			return $current_screen->post_type;
		}elseif(isset($_REQUEST['post_type'])) {
			return sanitize_key( $_REQUEST['post_type'] );
		}elseif(isset($_GET['post'])) {
			$thispost = get_post($_GET['post']);
			return $thispost->post_type;
		} else {
			return "post";
		}
	}

}
?>
