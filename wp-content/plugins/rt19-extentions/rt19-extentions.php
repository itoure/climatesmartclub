<?php
/**
 * Plugin Name: RT-Theme 19 | Extensions Plugin
 * Plugin URI: http://themeforest.net/item/rttheme19-responsive-multipurpose-wp-theme/10730591
 * Description: Extensions plugin for RT-Theme 19
 * Author: RT-Themes
 * Author URI: http://rtthemes.com
 * Version: 1.5.1
 * Text Domain: rt_theme_admin
 * Domain Path: languages
 *
 * @author RT-Themes
 * @version 1.5.1
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'RT19_Extensions' ) ) :

/**
 * Main RT19_Extensions Class
 *
 * @since 1.0
 */
final class RT19_Extensions {

	/**
	 * @var string
	 */
	public $version = '1.5.1';

	/**
	 * @var string
	 */
	public $plugin_name = 'RT-Theme 19 | Extensions Plugin';

	/**
	 * @var string
	 */
	public $plugin_for = 'RT-Theme 19';

	/**
	 * @var string
	 */
	public $theme_data;

	/**
	 * @var RT19_Extensions
	 */
	private static $instance;

	/**
	 * @var Admin Notices
	 */
	public $admin_notices = array();

	/**
	 * Main Class
	 * @return RT19_Extensions
	 */
	public static function instance() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof RT19_Extensions ) ) {
			self::$instance = new RT19_Extensions; 

			//theme data
			self::$instance->rt_get_theme();

			//check
			$check = self::$instance->check_other_rt_themes();

			//actions
			add_action( 'admin_notices', array(self::$instance,'rt_admin_notices')); 	

			if( $check ){
				add_action( 'init', array( self::$instance, 'plugable_functions' ) );
				add_action( 'wp_enqueue_scripts', array(self::$instance,'load_scripts' ) );
				add_action( 'admin_enqueue_scripts', array(self::$instance,'load_admin_styles' ) );			
				add_action( 'widgets_init', array( self::$instance, 'load_widgets' ) );
				add_action( 'init', array(self::$instance,'create_metaboxes' ) ); 
				add_action( 'init', array( self::$instance, 'fallback_functions' ) );

				//definitions
				self::$instance->definitions();

				//includes
				self::$instance->includes();
			}
			
		}

		return self::$instance;
	}

	/**
	 * Check Other RT-Theme Themes
	 * @return bool
	 */
	public function check_other_rt_themes() {

		$theme = $this->theme_data;

		if ( strpos( $theme["Name"], "RT-Theme") === 0 && $theme["Name"] !=  $this->plugin_for ) {  			

				if( is_admin() ){ 
					//print admin notification
					array_push( $this->admin_notices , array("type" => "error", "text" => "<strong>". $this->plugin_name . "</strong> detected. Please deactivate the plugin to prevent possible conflicts between <strong>". $theme["Name"]."</strong>" ) ); 
				}

			return;
		}

		return true;
	} 

	/**
	 * Admin Panel Notices
	 * @return html 
	 */
	public function rt_admin_notices(){  

		if( is_array( $this->admin_notices ) ){
			foreach ( $this->admin_notices as $key => $value) {
				echo '<div id="notice" class="'.sanitize_html_class($value["type"]).'"><p>'.$value["text"].'</p></div>';
			}
		}
	}  

	/**
	 * Definitions
	 * @return void
	 */
	public function definitions() {

		if ( ! defined( 'RT_EXTENTIONS_SLUG' ) )  define('RT_EXTENTIONS_SLUG', 'rt_theme');
		if ( ! defined( 'RT_EXTENTIONS_PATH' ) )  define('RT_EXTENTIONS_PATH', plugin_dir_path( __FILE__ ) );
		if ( ! defined( 'RT_THEMENAME' ) )  define('RT_THEMENAME', "RT-Theme 19" );
		if ( ! defined( 'RT_THEMESLUG' ) )  define('RT_THEMESLUG', "rttheme19"); // a unique slugname for this theme
		if ( ! defined( 'RT_COMMON_THEMESLUG' ) )  define('RT_COMMON_THEMESLUG', "rttheme"); // a common slugnam for all rt-themes

	} 

	/**
	 * Include required files
	 *
	 * @access private
	 * @return void
	 */
	private function includes() { 
		require_once RT_EXTENTIONS_PATH  . '/inc/post-types.php';
		require_once RT_EXTENTIONS_PATH  . '/inc/shortcode_helper.php';

		if( class_exists( "Vc_Manager" ) ){
			require_once RT_EXTENTIONS_PATH  . '/inc/visual_composer_config.php';
			require_once RT_EXTENTIONS_PATH  . '/inc/vc_functions.php';
		}		

	}


	/**
	 * Include plugable functions
	 *
	 * @access private
	 * @return void
	 */
	public function plugable_functions() { 

		require_once RT_EXTENTIONS_PATH  . '/inc/shortcodes.php'; 
		require_once RT_EXTENTIONS_PATH  . '/inc/helper-functions.php'; 

	}

	/**
	 * Include Fallback Functions
	 *
	 * @access private
	 * @return void
	 */
	public function fallback_functions() { 
		if ( ! class_exists( 'RTTheme' ) ) {
			require_once RT_EXTENTIONS_PATH  . '/inc/fallback_functions.php'; 
			require_once RT_EXTENTIONS_PATH  . '/inc/rt_resize.php';
		}
	}

	/**
	 * Load Widgets
	 *
	 * @access public
	 * @return void
	 */
	public function load_widgets() { 
		include( RT_EXTENTIONS_PATH . "widgets/flickr.php"); //flickr
		include( RT_EXTENTIONS_PATH . "widgets/latest_posts.php"); //recent posts with thumbnails	
		include( RT_EXTENTIONS_PATH . "widgets/popular_posts.php"); //popular posts
		include( RT_EXTENTIONS_PATH . "widgets/contact_info.php"); //contact info
		include( RT_EXTENTIONS_PATH . "widgets/product_categories.php"); //contact info
 		include( RT_EXTENTIONS_PATH . "widgets/portfolio_categories.php"); //portfolio categories
 		include( RT_EXTENTIONS_PATH . "widgets/social_media.php"); //contact info
	}

	/**
	 * Create Metaboxes
	 * 
	 * @return void
	 */
	public function create_metaboxes() {			

		//check the current user access 
		if ( ! is_admin() || ! current_user_can( "edit_posts" ) ){
			return ;
		}

		//load metabox class
		include(RT_EXTENTIONS_PATH . "inc/metaboxes.php"); 

		//gallery upload options
		include(RT_EXTENTIONS_PATH . "inc/metabox-gallery.php"); 

		//portfolio
		include(RT_EXTENTIONS_PATH . "inc/metaboxes/portfolio_custom_fields.php"); 
		
		//staff
		include(RT_EXTENTIONS_PATH . "inc/metaboxes/staff_custom_fields.php"); 
		
		//testimonial
		include(RT_EXTENTIONS_PATH . "inc/metaboxes/testimonial_custom_fields.php"); 
		
		//products
		include(RT_EXTENTIONS_PATH . "inc/metaboxes/product_custom_fields.php"); 				
		include(RT_EXTENTIONS_PATH . "inc/metaboxes/single_product_custom_fields.php"); 

		//posts
		include(RT_EXTENTIONS_PATH . "inc/metaboxes/post_custom_fields.php"); 

		//design custom fields
		include(RT_EXTENTIONS_PATH . "inc/metaboxes/design_custom_fields.php"); 

	}

	/**
	 * Loading Extention Scripts
	 * @return void
	 */
	function load_scripts(){		
		if ( ! class_exists( 'RTTheme' ) ) {
			wp_enqueue_script('jflickrfeed', plugins_url( 'js/app.min.js', __FILE__ ), array('jquery'),  "", "true" );
		}
	}

	/**
	 * Loading Admin Styles
	 * @return void
	 */
	function load_admin_styles(){		
		if ( ! class_exists( 'RTTheme' ) ) {
			wp_register_style('admin-styles', plugins_url( 'css/admin.min.css', __FILE__ ) );  
			wp_enqueue_style('admin-styles');
		}
	}

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
			$this->theme_data=$main_theme_data;
		}else{		
			$this->theme_data=$theme_data;
		}
			
	}
}

endif;


/**
 * Returns the main instance 
 *
 * @return RT19_Extensions
 */
function RT19_Extensions() {
	return RT19_Extensions::instance();
}

// start
RT19_Extensions();