<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * RT-Theme Customizer Class
 *
 * Create theme customizer panel
 *
 * @class 		RT_Customize_Panel
 * @version		1.0
 * @author 		RT-Themes
 */

class RT_Customize_Panel extends RTTheme
{

	/**
	 * Options
	 */
	public $options = array();

	/**
	 * Skin Related Options
	 */
	public $skin_options = array();

	/**
	 * Theme Mods
	 */
	public $get_theme_mods = array();

	/**
	 * Capability
	 */
	public $capability = "edit_theme_options";

	/**
	 * Fonts
	 */
	public $fonts = array();
 

	/**
	 * Construct
	 */
	public function __construct()
	{

		//check the current user access 
		if ( ! current_user_can( $this->capability ) ){
			return ;
		}

		//load fonts
		$this->load_fonts(); 

		//customizer functions
		$this->customizer_functions(); 

		//Customizer Options 
		add_action('init', array(&$this, 'customizer_options'));  

		//load skin changer
		add_action('customize_controls_print_footer_scripts', array(&$this, 'skin_selector'));   


		add_action('admin_init', array(&$this, 'export_settings'));  
		add_action('admin_init', array(&$this, 'import_settings'));  
		add_action('admin_init', array(&$this, 'reset_settings')); 
		add_action('admin_init', array(&$this, 'custom_css'));  

		//init
		add_action('admin_menu', array(&$this, 'add_menu_item'));   
		add_action('after_switch_theme', array(&$this, 'save_defaults') ); 


		//get theme mods
		$this->get_theme_mods = get_theme_mods();


		add_action('customize_register', array(&$this, 'create_options')); 

		add_action( 'customize_preview_init', array(&$this, 'customize_preview_js'));
		add_action( 'admin_enqueue_scripts', array(&$this, 'customize_admin_js'));
		add_action( 'customize_controls_print_styles', array(&$this, 'customize_admin_css'));


		//skin loader actions
		add_action('wp_ajax_rt_ajax_skin_loader', array(&$this,'load_skins'));
		add_action('wp_ajax_nopriv_rt_ajax_skin_loader', array(&$this,'load_skins'));		
		add_action('wp_ajax_rt_ajax_get_skin_data', array(&$this,'get_skin_data_json'));
		add_action('wp_ajax_nopriv_rt_ajax_get_skin_data', array(&$this,'get_skin_data_json'));		

	}
 
	/**
	 * Load Fonts
	 */
	public function load_fonts()
	{

			/**
			 * Web Safe Fonts
			 * @var array
			 */
			$rt_websafe_fonts = array(
					"Arial, Helvetica, sans-serif",
					"Arial Black, Gadget, sans-serif",
					"Bookman Old Style, serif",
					"Comic Sans MS, cursive",
					"Courier, monospace", 
					"Garamond, serif",
					"Georgia, serif",
					"Impact, Charcoal, sans-serif",
					"Lucida Console, Monaco, monospace",
					"Lucida Sans Unicode, Lucida Grande, sans-serif",
					"MS Sans Serif, Geneva, sans-serif",
					"MS Serif, New York, sans-serif",
					"Palatino Linotype, Book Antiqua, Palatino, serif",
					"Tahoma, Geneva, sans-serif",
					"Times New Roman, Times, serif",
					"Trebuchet MS, Helvetica, sans-serif",
					"Verdana, Geneva, sans-serif",
					"Webdings, sans-serif",
					"Wingdings, Zapf Dingbats, sans-serif"
			);
	
			$this->fonts["#1_obt_start"] = __("Web Safe Fonts","rt_theme_admin");
			
				foreach ( $rt_websafe_fonts as $family_name )
				{
					$this->fonts[ '{"kind": "websafe","family": "'.$family_name.'", "subsets": [], "variants": [] }' ] = $family_name; 
				}

			$this->fonts["#1_obt_end"] = ""; //Web Safe Fotns


			/**
			 * Google Fonts
			 * @var array
			 */
			$google_fonts = array();

				//include the json file as string - this way is faster than the wp_remote_fopen
				include( RT_THEMEADMINDIR ."/inc/google_webfonts_json.php" );

				//paste the list output
				if ( $json ){
					
					$json_output = json_decode($json, true);

					if( $json_output ){
				
						foreach ( $json_output["items"] as $font )
						{
							$google_fonts[ '{"kind": "google","family": "'.$font["family"].'", "subsets": '.json_encode( $font["subsets"] ).', "variants": '.json_encode( $font["variants"] ).'}' ] = $font["family"]; 
						}
					}

					asort($google_fonts);
					
					$this->fonts["#2_obt_start"] = __("Google Fonts","rt_theme_admin");
					$this->fonts= array_merge(  $this->fonts, $google_fonts );
					$this->fonts["#2_obt_end"] = ""; //Google Safe Fotns
				}	 
				 
	}

	/**
	 * Add Admin Notices
	 */
	public function add_notices( $message = "", $type = "error" )
	{
		add_action( 'admin_notices', create_function('', 'echo "<div class=\"'.$type.'\"><p>'.$message.'</p></div>";') );			
	}
 

	/**
	 * Customizer Functions
	 */
	public function customizer_functions() {
		include( RT_THEMEADMINDIR . '/functions/rt_custom_controls.php');			
	}	


	/**
	 * Customizer Options
	 */
	public function customizer_options() {
		include( RT_THEMEADMINDIR . '/inc/rt_general_options.php');	 
		include( RT_THEMEADMINDIR . '/inc/rt_portfolio_options.php'); 
		include( RT_THEMEADMINDIR . '/inc/rt_product_options.php');	  
		include( RT_THEMEADMINDIR . '/inc/rt_blog_options.php');							
		include( RT_THEMEADMINDIR . '/inc/rt_social_media_options.php');				
		include( RT_THEMEADMINDIR . '/inc/rt_color_schemas.php');
		include( RT_THEMEADMINDIR . '/inc/rt_typography_options.php');		
		include( RT_THEMEADMINDIR . '/inc/rt_woocommerce_options.php');		

		//create skin related option set
		foreach ( $this->options as $panel => $atts ) {

			if( $panel == "rt_single_options" ){
				continue;
			}

			foreach ( $atts["sections"] as $section ) {
				foreach ( $section["controls"] as $control ) {
					if( isset($control["rt_skin"] )  ){
						$this->skin_options[] =  $control["id"];
					}
				}				
			}
		}

		//single sections
		foreach ( $this->options["rt_single_options"] as $section ) {
			foreach ( $section["controls"] as $control ) {
				if( isset($control["rt_skin"] )  ){
					$this->skin_options[] =  $control["id"];
				}
			}				
		}		

	}	

	/**
	 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	public function customize_preview_js() {
		$min_extention = get_theme_mod(RT_THEMESLUG.'_optimize_css') ? ".min" : ""; 
		wp_enqueue_script( 'rttheme_customizer', RT_THEMEADMINURI . '/js/customizer'.$min_extention.'.js', array( 'customize-preview' ), '20131205', true );

		//add js params
		$js_params = array("theme_slug" => RT_THEMESLUG);
		wp_localize_script( 'rttheme_customizer', 'rt_theme_params', $js_params );

	}

	/**
	 * Customizer Admin JS files
	 */
	public function customize_admin_js() {

		$min_extention = get_theme_mod(RT_THEMESLUG.'_optimize_css') ? ".min" : ""; 
		wp_register_script( 'customizer-rt-color-js', RT_THEMEADMINURI . '/js/rt-color-control'.$min_extention.'.js', array( 'jquery' ), NULL, true );
		wp_register_script( 'customizer-rt-fonts-js', RT_THEMEADMINURI . '/js/rt-font-control'.$min_extention.'.js', array( 'jquery' ), NULL, true );
		wp_register_script( 'customizer-rt-skins-js', RT_THEMEADMINURI . '/js/rt-skin-selector'.$min_extention.'.js', array( 'jquery' ), NULL, true );

		wp_enqueue_script( 'customizer-rt-color-js' );
		wp_enqueue_script( 'customizer-rt-fonts-js' );
		wp_enqueue_script( 'customizer-rt-skins-js' );

		//localize js params
		$js_params = array(
			"apply_skin" => __('Do you want to apply this skin? ','rt_theme_admin'), 
			"theme_slug" => RT_THEMESLUG
		);

		wp_localize_script( 'jquery', 'rt_theme_params', $js_params );

	}

	/**
	 * Customizer Admin CSS Files
	 */
	public function customize_admin_css() {
 
	}
 
	/**
	 * Add admin menu item
	 */
	public function add_menu_item()
	{
		add_menu_page( __('Customize','rt_theme_admin'), __('Customize','rt_theme_admin'), $this->capability, 'customize.php', NULL, NULL, 61 );
		add_submenu_page( 'customize.php', __('Customize','rt_theme_admin'), __('Customize','rt_theme_admin'), $this->capability , 'customize.php' );
		add_submenu_page( 'customize.php', __('Import','rt_theme_admin'), __('Import','rt_theme_admin'), $this->capability, 'rt_import', array(&$this,"import_page") );
		add_submenu_page( 'customize.php', __('Export','rt_theme_admin'), __('Export','rt_theme_admin'), $this->capability, 'rt_export', array(&$this,"export_page") );
		//add_submenu_page( 'customize.php', __('Backup','rt_theme_admin'), __('Backup','rt_theme_admin'), $this->capability, 'rt_backup', array(&$this,"backup_page") );
		add_submenu_page( 'customize.php', __('Reset','rt_theme_admin'), __('Reset','rt_theme_admin'), $this->capability, 'rt_reset', array(&$this,"reset_page") );
		add_submenu_page( 'customize.php', __('Custom CSS','rt_theme_admin'), __('Custom CSS','rt_theme_admin'), $this->capability, 'rt_custom_css', array(&$this,"custom_css_page") );
	}


	/**
	 * Import settings page
	 */
	public function import_page()
	{	

		//import form
		$file_byte     = wp_max_upload_size() ;
		$file_size     = size_format( $file_byte );
		$wp_upload_dir = wp_upload_dir();

		//check if multisite
		$multisite_notice = "";
		if ( is_multisite() ) { 
			$multisite_notice = __('
				<strong>NOTE 3: </strong>
				You need to add "txt" in your allowed file types list before upload the file if it does not exist. 
				For further reading: http://premium.wpmudev.org/blog/how-to-change-the-allowed-file-upload-types-in-wordpress-multisite/
			','rt_theme_admin');
		}

		if ( ! empty( $wp_upload_dir['error'] ) ){
			echo "<h3>"._e("ERROR","rt_theme_admin").":</h3><br />".$wp_upload_dir['error'];
		}else{

	 		echo '
	 			<div class="wrap" id="rt_import_settings">

					<h2>'.__('Import Customizations','rt_theme_admin').'</h2>
					
					<div class="import_desc">
						<p>
							'.__('Upload your exported settings (txt) file and to import.<br />  
									<strong>NOTE 1: </strong> This importer will overwrite to the current settings.<br />
									<strong>NOTE 2: </strong> This tool will only import the settings. You need to upload your images that used within settings and correct the image urls by manually after settings imported.<br />
								','rt_theme_admin').'
								'.$multisite_notice.'
						</p>
					</div>
	 
					<form class="wp-upload-form" action="" method="post" enctype="multipart/form-data">
						<p>
							<label for="upload">'.__('Choose a file from your computer','rt_theme_admin').':</label> ('.sprintf( __('Maximum size: %s', "rt_theme_admin" ), $file_size ).') <input type="file" size="25" name="import" id="upload">
							<input type="hidden" value="import" name="action">
						</p>

						<p class="submit"><input type="submit" value="'.__('Upload file and import','rt_theme_admin').'" class="button" name="submit"></p>

					</form>

				</div>
			';
		}


	}


	/**
	 * Get Skin List
	 * @return array $skin_list
	 */
	public function get_skin_list() {
		
		/**
		 * Skin list
		 */
		$skin_list = array();

		
		// to do : get user drafts / skins

			
		//get theme skins
		$theme_skins = array();

		$theme_skins[] = array(
							"type" => "theme",
							"id" => "1",
							"name" => "Default Skin"
						);

		$theme_skins[] = array(
							"type" => "theme",
							"id" => "2",
							"name" => "Skin 2"
						);

		$theme_skins[] = array(
							"type" => "theme",
							"id" => "3",
							"name" => "Skin 3"
						);

		$theme_skins[] = array(
							"type" => "theme",
							"id" => "4",
							"name" => "Skin 4"
						);

		$theme_skins[] = array(
							"type" => "theme",
							"id" => "5",
							"name" => "Skin 5"
						);
		
		$theme_skins[] = array(
							"type" => "theme",
							"id" => "6",
							"name" => "Skin 6"
						);

		$theme_skins[] = array(
							"type" => "theme",
							"id" => "7",
							"name" => "Skin 7 - Horizontal Navigation"
						);

		$theme_skins[] = array(
							"type" => "theme",
							"id" => "8",
							"name" => "Skin 8 - Horizontal Navigation"
						);

		$theme_skins[] = array(
							"type" => "theme",
							"id" => "9",
							"name" => "Skin 9 - Horizontal Navigation"
						);

		$theme_skins[] = array(
							"type" => "theme",
							"id" => "10",
							"name" => "Skin 10 - Horizontal Navigation"
						);

		return $theme_skins;
	}


	/**
	 * Get Skin Data Json
	 * @return json data $json
	 */
	public function get_skin_data_json() {

		$new_data = array(); 

		if(isset( $_POST["skin-id"] )){
			$skin_id = intval( sanitize_text_field( $_POST["skin-id"] ) );
		}
  
		require_once( RT_THEMEADMINDIR . '/inc/skins/'.$skin_id.'.php' );
		$skin_data = unserialize( base64_decode( $skin_data ) );
 
 		foreach ( $this->skin_options as $option_id ) {

 			if( ! isset( $skin_data[ $option_id ] )){
 				$new_data[ $option_id ] = "";
 				continue;
 			}

 			$new_data[ $option_id ] = str_replace("{{theme-image-directory}}", get_template_directory_uri()."/images/", $skin_data[ $option_id ] );
 		}

 		echo( json_encode($new_data) );

		die;

	}


	/**
	 * Skin & Draft Selector
	 */
	public function load_skins() {
 
		$skins = $this->get_skin_list();

		foreach ($skins as $k => $skin) {
				?>
				
					<div class="skin" data-skin-id="<?php echo $skin["id"]; ?>" data-skin-type="<?php echo $skin["type"]; ?>">
						<img class="skin-image" src="<?php echo RT_THEMEADMINURI; ?>/images/skins/<?php echo $skin["id"]; ?>.png">
						<p><?php echo $skin["name"]; ?></p>
					</div>

				<?php
				}

			die;
	}


	/**
	 * Skin & Draft Selector
	 */
	public function skin_selector() {

		echo '
		
			<div id="available-rt-skins">

				<img src="images/spinner.gif" class="skins-loading-spinner">
			
			</div><!-- #available-rt-skins -->

		';

	}

	/**
	 * Import Settings
	 */
	public function import_settings()
	{

		global $wp_filesystem;
		
		//check the current user access 
		if ( ! current_user_can( $this->capability ) ){
			return ;
		}

		//check
		if( ! isset( $_GET['page'] ) || ! isset( $_POST['action'] ) ){
			return ;
		}

		if( $_GET['page'] != "rt_import" || $_POST['action'] != "import" ){
			return ;
		}

		//include wp handle upload
		if ( ! function_exists( 'wp_handle_upload' ) ){
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
		}

		$uploadedfile = isset( $_FILES['import'] ) ? $_FILES['import'] : "";

		if ( ! $uploadedfile ) {
			$error = __("No file selected", "rt_theme_admin") . $uploadedfile["error"];

			$this->add_notices($error);			
			return false; 
		}

		//check upload error
		if ( $uploadedfile && $uploadedfile["error"] ) {
			$error = __("Error!", "rt_theme_admin") . $uploadedfile["error"];

			$this->add_notices($error);
			return false;
		}

		//check file type
		if ( $uploadedfile && $uploadedfile["type"] != "text/plain" ) {
			$error = __("Invalid file type!", "rt_theme_admin"); 

			$this->add_notices($error);
			return false;
		}

		$upload_overrides = array( 'test_form' => false );
		$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

		if ( isset( $movefile ) ) {

			//check file error
			if ( $movefile && isset( $movefile["error"] ) ) {
				$error = __("Error!", "rt_theme_admin") . $movefile["error"];
 
				$this->add_notices($error);
				return false;
			}

			//Get Credentials
			$url = wp_nonce_url('customize.php?page=rt_import&action=import','rt-theme-import');
			if (false === ( $creds = request_filesystem_credentials($url, '', false, false, null ) ) ) {
				return; // stop processing here
			}

			//Initialize WP_Filesystem_Base   
			if ( ! WP_Filesystem( $creds ) ) {
				request_filesystem_credentials($url, '', true, false, null);
				return;
			}

			$file_content = $wp_filesystem->get_contents( $movefile["file"] );			


			//check file content
			if( empty( $file_content ) ){
				$error = __("This file is empty!", "rt_theme_admin") . $movefile["error"];

				$this->add_notices($error);
				return false;
			}

			//decode
			$settings = unserialize( base64_decode( $file_content )); 

			if( ! is_array( $settings ) ){
				$error = __("This settings file is broken!", "rt_theme_admin") . $movefile["error"];

				$this->add_notices($error);			
				return false;
			}

			//import now
			foreach ($settings as $name => $value) {
				set_theme_mod( $name, str_replace("{{theme-image-directory}}", get_template_directory_uri()."/images/", $value ) );
			}

			$this->add_notices( __("Settings imported successfully.","rt_theme_admin") ,"updated" );

			//actions
			do_action( 'rt_after_reset' );

		} else {
			//Possible file upload attack!

			$error = __("File cannot be uploaded!", "rt_theme_admin");
			$this->add_notices($error);

			return false;
		}

	}


	/**
	 * Add admin menu item
	 */
	public function export_page()
	{	
		?>
			<div class="wrap" id="">
					<h2><?php _e( 'Export Theme Customizations', 'rt_theme_admin' ); ?></h2>

					<p><?php _e( 'Click to the export button to download the settings.', 'rt_theme_admin' ); ?></p>

					<form novalidate="novalidate" action="" method="post">
						<p class="submit"><input name="submit" id="submit" class="button button-primary" value="<?php _e( 'Export', 'rt_theme_admin' ); ?>" type="submit"></p>
						<input type="hidden" name="action" value="download">
					</form>

			</div>
		<?php
	}


	/**
	 * Export Settings
	 */
	public function export_settings()
	{

		//check
		if( ! isset( $_GET['page'] ) || ! isset( $_POST['action'] ) ){
			return ;
		}

		if( $_GET['page'] != "rt_export" || $_POST['action'] != "download" ){
			return ;
		}


		// server time 
		$file_time = date('y-M-d-H-i-s');

		// sent file to user
		header('Content-type: text/plain');  
		header('Content-Disposition: attachment; filename=" '.get_bloginfo('name').' Theme Settings '.$file_time.'.txt"'); 

		print base64_encode( serialize( $this->get_theme_mods ) ); 

		die();
	

	}


 	/**
	 * Backup Options Page
	 * todo
	 */
	public function backup_page()
	{	 
	}   

	/**
	 * Reset Options Page
	 */
	public function reset_page()
	{	
		?>
			<div class="wrap" id="rt_theme_reset_settings">
					<h2><?php _e( 'Reset Theme Customizations', 'rt_theme_admin' ); ?></h2>

					<p><?php printf( __( 'Click to the reset button to reset all the theme settings to default values that changed by using the %sCustomizer%s', 'rt_theme_admin' ), '<a href="'.wp_nonce_url(admin_url('customize.php')).'">', '</a>' ); ?></p>

					<p><strong><?php printf( __( 'Dont\' forget to %sExport%s the settings before if you want to save them.', 'rt_theme_admin' ), '<a href="'.wp_nonce_url(admin_url('customize.php?page=rt_export')).'">', '</a>' ); ?></strong></p>

					<form action="<?php echo wp_nonce_url(admin_url('customize.php?page=rt_reset')); ?>" method="post">
						<p class="submit"><input name="submit" id="submit" class="button button-primary" value="<?php _e( 'Reset', 'rt_theme_admin' ); ?>" type="submit"></p>
						<input type="hidden" name="action" value="reset_settings">
					</form>

			</div>
		<?php
	}


	/**
	 * Reset Theme Customize
	 */
	public function reset_settings()
	{		

		//check the current user access 
		if ( ! current_user_can( $this->capability ) ){
			return ;
		}		
		 
		//check
		if( ! isset( $_GET['page'] ) || ! isset( $_POST['action'] ) ){
			return ;
		}

		if( $_GET['page'] != "rt_reset" || $_POST['action'] != "reset_settings" ){
			return ;
		}

		$this->add_notices(__( 'Theme settings resetted to their default values.', 'rt_theme_admin' ),"update-nag");

		
		//remove_theme_mods();
		update_option( RT_THEMESLUG."_custom_css_output", "");
		$this->save_defaults("true"); 

	}



	/**
	 * Custom CSS Page
	 */
	public function custom_css_page()
	{	
		?>
			<div class="wrap" id="rt_theme_custom_css">
					<h2><?php _e( 'Custom CSS', 'rt_theme_admin' ); ?></h2>

					<p><?php _e( 'Enter your custom CSS into the text area below', 'rt_theme_admin' ); ?></p>

					<form action="<?php echo wp_nonce_url(admin_url('customize.php?page=rt_custom_css')); ?>" method="post" enctype="multipart/form-data">
						<p class="textarea"><textarea name="custom_css" id="css" class="textarea rt_custom_css" cols="120" rows="40"><?php echo stripcslashes( get_option( RT_THEMESLUG."_user_custom_css") ); ?></textarea></p>

						<p class="submit"><input name="submit" id="submit" class="button button-primary" value="<?php _e( 'Update', 'rt_theme_admin' ); ?>" type="submit"></p>
						<input type="hidden" name="action" value="save">
					</form>

			</div>
		<?php
	}


	/**
	 * Custom CSS Customize
	 */
	public function custom_css()
	{		

		//check the current user access 
		if ( ! current_user_can( $this->capability ) ){
			return ;
		}		
		 
		//check
		if( ! isset( $_GET['page'] ) || ! isset( $_POST['action'] ) ){
			return ;
		}

		if( $_GET['page'] != "rt_custom_css" || $_POST['action'] != "save" ){
			return ;
		}

		$this->add_notices(__( 'Custom CSS File Updated!', 'rt_theme_admin' ),"updated");

		if( isset( $_POST['custom_css'] ) ){
			update_option( RT_THEMESLUG."_user_custom_css", $_POST['custom_css'] );	
		}
		
		update_option( RT_THEMESLUG."_custom_css_output", "");
		
		//actions
		do_action( 'rt_after_user_custom_css' );

	}

	/**
	 * Add admin menu item
	 */
	public function create_options( $wp_customize )
	{			
		$section_count = $control_count = 1;

		//sections within panels
		foreach ( $this->options as $panel => $atts ) {


			//jump single options
			if( $panel == "rt_single_options" ){
				continue;
			}


			if ( class_exists( 'RT_Custom_Posts' ) ) {

				//jump portfolio options if disabled			
				if( ! RT_Custom_Posts::is_portfolio_active() && $panel == "rt_portfolio_options" ){
					continue;
				}

				//jump product options if disabled			
				if( ! RT_Custom_Posts::is_product_showcase_active() && $panel == "rt_product_options" ){
					continue;
				}
				
			}else{
				
				//jump portfolio or product options if the plugin not installed
				if( $panel == "rt_portfolio_options" || $panel == "rt_product_options" ){
					continue;
				}

			}


			//jump woocommerce options if not installed			
			if( ! class_exists( 'Woocommerce' ) && $panel == "rt_woocommerce_options" ){
				continue;
			}

			$atts["description"] = isset( $atts["description"] ) ? $atts["description"] : "";

			$this->add_panel( $wp_customize, array( "panel" => $panel, "title" => $atts["title"], "description" => $atts["description"], "priority" => $atts["priority"] )  );

			foreach ( $atts["sections"] as $section ) {
				$this->add_section( $wp_customize, array( "panel" => $panel, "options" => $section, "priority" =>  $section_count++ )  );
	
				foreach ( $section["controls"] as $control ) {
					$this->add_setting( $wp_customize, array( "setting" => $control["id"], "control" => $control )  );

					$control["priority"] = $control_count++;
					$this->add_control( $wp_customize, array( "section" => $panel .'_'. $section["id"], "options" => $control )  );
				}				
			}
		}

		//single sections
		foreach ( $this->options["rt_single_options"] as $section ) {
			$this->add_section( $wp_customize, array( "options" => $section, "priority" =>  $section_count++ )  );

			foreach ( $section["controls"] as $control ) {
				$this->add_setting( $wp_customize, array( "setting" => $control["id"], "control" => $control )  );

				$control["priority"] = $control_count++;
				$this->add_control( $wp_customize, array( "section" => $section["id"], "options" => $control )  );
			}				
		}

	}

	/**
	 * Add a panel
	 */
	public function add_panel( $wp_customize, $atts )
	{

		$wp_customize->add_panel( $atts["panel"], array(
			'priority' => $atts["priority"],
			'capability' => $this->capability,
			'theme_supports' => '',
			'title' => $atts["title"],
			'description' => isset( $atts['description'] ) ? $atts['description'] : "",
		) );
 
	}


	/**
	 * Add a section
	 */
	public function add_section( $wp_customize, $atts )
	{
		
		$section_id = isset( $atts["panel"] ) ? $atts["panel"].'_'.$atts["options"]["id"] : $atts["options"]["id"];

		$wp_customize->add_section( $section_id, array(
			'title' => $atts["options"]["title"],
			'description' => isset($atts["options"]["description"]) ? $atts["options"]["description"] : "",
			'panel' => isset( $atts["panel"] ) ? $atts["panel"] : "",
			'priority' => $atts["priority"]
		) );
 
	}


	/**
	 * Add a setting
	 */
	public function add_setting( $wp_customize, $atts )
	{

		//create the setting
		$wp_customize->add_setting( $atts["setting"], array(
			'default' => isset( $atts['control']['default'] ) ? $atts['control']['default'] : "",
            'type' => 'theme_mod',
            'capability' => $this->capability,
            'transport' => isset( $atts['control']['transport'] ) ? $atts['control']['transport'] : "postMessage",
            'sanitize_callback' => isset( $atts['control']['callback'] ) ? $atts['control']['callback'] : array(&$this, 'rt_sanitize_field')
		) );
 
	}


	 /**
	  * Default sanitization function for each custom setting
	  * 
	  * @param  string $val 
	  * @return string $val 
	  */
	public function rt_sanitize_field( $val = "" )
	{
		return $val;
	}


	/**
	  * Sanitize Number
	  * 
	  * @param  string $val 
	  * @return string $val 
	  */
	public function rt_sanitize_number( $val = "" )
	{	
		return ! empty( $val ) ? (int) $val : "";
	}

	/**
	 * Add a control
	 */
	public function add_control( $wp_customize, $atts )
	{

		$atts["options"]["section"] = $atts["section"];
		$atts["options"]["settings"] = $atts["options"]["id"]; 

		//add data-rt-control-type to postMessage items 
		if( ! isset($atts["options"]["transport"]) || ( isset($atts["options"]["transport"]) && $atts["options"]["transport"] == "postMessage" ) ){
			if( isset($atts["options"]["input_attrs"]) && is_array( $atts["options"]["input_attrs"] ) ){
				array_merge($atts["options"]["input_attrs"], array("data-rt-control-type"=>"postMessage"));	
			}else{
				$atts["options"]["input_attrs"] = array("data-rt-control-type"=>"postMessage");	
			}
		}

		//add the control 
		if( $atts["options"]["type"] == "color"){
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $atts["options"]["id"], $atts["options"] ) );	
		//add the rt media control 
		}elseif( $atts["options"]["type"] == "rt_media"){
			$wp_customize->add_control( new RT_Customize_Media_Control( $wp_customize, $atts["options"]["id"], $atts["options"] ) );						
		//add the alpha color control 
		}elseif( $atts["options"]["type"] == "rt_color"){
			$wp_customize->add_control( new RT_Color_Control( $wp_customize, $atts["options"]["id"], $atts["options"] ) );							
		//add the select control 
		}elseif( $atts["options"]["type"] == "rt_select"){
			$wp_customize->add_control( new RT_Select_Control( $wp_customize, $atts["options"]["id"], $atts["options"] ) );													
		//add the content control 
		}elseif( $atts["options"]["type"] == "rt_content"){
			$wp_customize->add_control( new RT_Content_Control( $wp_customize, $atts["options"]["id"], $atts["options"] ) );		
		//add the checkbox control 
		}elseif( $atts["options"]["type"] == "rt_checkbox"){
			$wp_customize->add_control( new RT_Checkbox_Control( $wp_customize, $atts["options"]["id"], $atts["options"] ) );	  
		//add the seperator control 
		}elseif( $atts["options"]["type"] == "rt_seperator"){
			$wp_customize->add_control( new RT_Seperator_Control( $wp_customize, $atts["options"]["id"], $atts["options"] ) );																			
		}else{
			$wp_customize->add_control( $atts["options"]["id"], $atts["options"] );	
		}
 
	} 

	/**
	 * 
	 * Save default value
	 * @param  boolean $reset 
	 * 
	 */
	public function save_defaults( $reset = "" )
	{

		//theme options resetted for the first time and detault vars installed
		$is_defaults_saved = get_option(RT_THEMESLUG.'_'.RT_UTHEME_NAME.'_defaults'); 

		if( $is_defaults_saved == "saved" && $reset !== "true" ){
			return ;
		}

		//sections within panels
		foreach ( $this->options as $panel => $atts ) {

			if( $panel == "rt_single_options" ){
				continue;
			}

			foreach ( $atts["sections"] as $section ) {			 
	
				foreach ( $section["controls"] as $control ) {

					//dont save the default value if save_default false
					if( isset( $control["save_default"] ) && $control["save_default"] == false ){
						continue;
					}

					//set the default value if there is one and if it is not saved before
					if( isset( $control["default"] ) ){
						set_theme_mod( $control["id"], $control["default"] );
					}
				}				
			}			
		}

		//single sections
		foreach ( $this->options["rt_single_options"] as $section ) {
				foreach ( $section["controls"] as $control ) {

					//dont save the default value if save_default false
					if( isset( $control["save_default"] ) && $control["save_default"] == false ){
						continue;
					}

					//set the default value if there is one and if it is not saved before
					if( isset( $control["default"] ) && ! empty( $control["default"] ) ){
						set_theme_mod( $control["id"], $control["default"] );
					}
				}						
		}	

		//add a db note
		update_option(RT_THEMESLUG.'_'.RT_UTHEME_NAME.'_defaults','saved'); 

		//actions
		do_action( 'rt_after_reset' );
	}
 
}

new RT_Customize_Panel();