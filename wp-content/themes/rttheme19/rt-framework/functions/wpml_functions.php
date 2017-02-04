<?php
#-----------------------------------------
#	RT-Theme wpml_functions.php 
#-----------------------------------------



if( ! function_exists("rt_wpml_get_current_language") ){
	/**
	 * rt_wpml_get_current_language
	 * @return string language
	 */
	function rt_wpml_get_current_language(){
		if(function_exists('icl_object_id')) {
			global $sitepress;
			return $sitepress->get_current_language();
		}
	}
}


#
# WPML match page id 
# returns the page of default language
# @returns $id 
#
if( ! function_exists("rt_wpml_page_id") ){
	function rt_wpml_page_id($id){	 
		if(function_exists('icl_object_id')) {
			global $sitepress;
			$get_default_language =  $sitepress->get_default_language();

			return icl_object_id($id,'page',true,$get_default_language);
		} else {
			return $id;
		}
	}
}

#
# WPML match page id 
# returns the current language version of the page
# @returns $id 
#
if( ! function_exists("rt_wpml_translated_page_id") ){
	function rt_wpml_translated_page_id($id){	 
		if(function_exists('icl_object_id')) {
			return icl_object_id($id,'page',true);
		} else {
			return $id;
		}
	}
}


#
# WPML match post id
#
if( ! function_exists("rt_wpml_post_id") ){
	function rt_wpml_post_id($id){
		if(function_exists('icl_object_id')) {
			global $sitepress, $post;
			$get_default_language =  $sitepress->get_default_language();
			$post_type = isset( $post->post_type ) ? $post->post_type : "post" ; 
			return icl_object_id($id,$post_type,true,$get_default_language);
		} else {
			return $id;
		}
	}
}

#
# WPML match category id
#
if( ! function_exists("rt_wpml_category_id") ){
	function rt_wpml_category_id($id){
		if(function_exists('icl_object_id')) {
			global $sitepress;
			$get_default_language =  $sitepress->get_default_language();

			return icl_object_id($id,'category',true,$get_default_language);
		} else {
			return $id;
		}
	}
}


#
# WPML match product category id
#
if( ! function_exists("rt_wpml_product_category_id") ){
	function rt_wpml_product_category_id($id){
		if(function_exists('icl_object_id')) {
			global $sitepress;
			$get_default_language =  $sitepress->get_default_language();

			return icl_object_id($id,'product_categories',true,$get_default_language);
		} else {
			return $id;
		}
	}
}

#
# WPML match portfolio category id
#
if( ! function_exists("rt_wpml_portfolio_category_id") ){
	function rt_wpml_portfolio_category_id($id){
		if(function_exists('icl_object_id')) {
			global $sitepress;
			$get_default_language =  $sitepress->get_default_language();

			return icl_object_id($id,'portfolio_categories',true,$get_default_language);
		} else {
			return $id;
		}
	}
}


#
# WPML match categories
#
if( ! function_exists("rt_wpml_lang_object_ids") ){
	function rt_wpml_lang_object_ids($ids_array = array(), $type = "", $language = "") {
		if(function_exists('icl_object_id')) {
			global $sitepress;
			

			if( empty( $language ) ){
				$language =  $sitepress->get_default_language();
			}

			//if provided ids is an array
			if( is_array( $ids_array ) ){
				$res = array();
				foreach ($ids_array as $id) {
					$xlat = icl_object_id($id,$type,false,$language);
					if(!is_null($xlat)) $res[] = $xlat;
				}
				return $res;				
			}else{

				$res = array();
				$ids_array = explode(",", $ids_array); 

				foreach ($ids_array as $id) {
					$xlat = icl_object_id($id,$type,false,$language);
					if(!is_null($xlat)) $res[] = $xlat;
				}

				return implode($res, ",");				
			}

		} else {
			return $ids_array;
		}
	}
}

#
# Get WPML Plugin Flags
#
if( ! function_exists("rt_wpml_languages_list") ){
	function rt_wpml_languages_list(){
	    $languages = icl_get_languages('skip_missing=0&orderby=code'); 

		if(!empty($languages)){
			
				echo '<ul class="flags">';
				foreach($languages as $l){
					echo '<li>';
					if($l['country_flag_url']){
						echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" /> <a href="'.$l['url'].'" title="'.$l['native_name'].'"><span>'.$l['native_name'].'</span></a>';
					}
					echo '</li>';
				}
			echo '</ul>';
			
		}
	}
}


#
#	WPML Home URL
#
if( ! function_exists("rt_wpml_get_home_url") ){
	function rt_wpml_get_home_url(){
		if(function_exists('icl_get_home_url')){
			return icl_get_home_url();
		}else{
			return rtrim(esc_url( home_url() ) , '/') . '/';
		}
	}
}

#
#	WPML String Register
#
if( ! function_exists("rt_wpml_register_string") ){
	function rt_wpml_register_string($context, $name, $value){
		if(function_exists('icl_register_string') && trim($value)){
			icl_register_string($context, $name, $value);
		}    
	}
}

#
#	WPML Get Registered String

if( ! function_exists("rt_wpml_t") ){
	/**
	 * Get string translation of a theme mod value
	 * @return string 
	 */
	function rt_wpml_t($name="", $field="", $value=""){
		if(function_exists('icl_translate')) {			
			return icl_translate($name, $field, $value);
		}

		return $value;
	}
}
?>