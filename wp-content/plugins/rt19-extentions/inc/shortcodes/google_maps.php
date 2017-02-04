<?php
/*
* 
* Google Map Shortcodes
* 	
*/ 

if( ! function_exists("rt_google_map") ){
	/**
	 * Google Map Holder Shortcode 
	 * 
	 * @param  array $atts  
	 * @param  string $content  
	 * @return html $google_map
	 */
	function rt_google_map( $atts, $content = null ) { 

	global $rt_map_id, $rt_total_location, $rt_location_count, $rt_locations_output, $rt_zoom; 

	extract(shortcode_atts(array(  
		"map_id" => "map-".rand(100000, 1000000),
		"height" => 300,
		"zoom" => 3
	), $atts));

	//fix map id if empty
	$map_id =  empty( $map_id ) ? 'map-'.rand(100000, 1000000) : $map_id ;
	
	//load google api
	wp_enqueue_script('googlemaps','//maps.googleapis.com/maps/api/js?sensor=false'); 
	
	//find total location number
	$total_location = substr_count($content,'[location');

	//global values
	$rt_map_id = $map_id;
	$rt_total_location = $total_location;
	$rt_location_count = 0; //reset counter
	$rt_locations_output = ""; //reset locations_output
	$rt_zoom = $zoom;

	//content
	$content = do_shortcode($content); 
	
	//output
	$google_map = sprintf('<div class="google_map_holder" data-height="%s" data-scope="#%s">%s</div>',$height, $map_id, $content); 

	return $google_map;
	}
}


if( ! function_exists("rt_map_location") ){
	/**
	 * Google Map Single Location
	 * 
	 * @param  array $atts  
	 * @param  string $content  
	 * @return html $js_output
	 */
	function rt_map_location( $atts, $content = null ) {
	global $rt_map_id, $rt_total_location, $rt_location_count, $rt_locations_output, $rt_zoom; 

	extract(shortcode_atts(array(  
		"title" => "",
		"lat" => 0,
		"lon" => 0,
	), $atts));

	$rt_location_count++;


	//locations_output
	$rt_locations_output .= ! empty( $lat ) && ! empty( $lon ) ?  sprintf('["%s", %s, %s, 4,"%s"],', addslashes($title), $lat, $lon, addslashes($content)) : "";	 		

	if ( $rt_total_location == $rt_location_count) {	 	

		//js script to run
		$js_output = sprintf('

			<div id="%s" class="google_map"></div>
			<script type="text/javascript">
			 /* <![CDATA[ */ 
				// Runs google maps	
					jQuery(function() {
						jQuery("#%s").rt_maps([%s],%s); 
					});
			/* ]]> */	
			</script>

		', $rt_map_id, $rt_map_id, $rt_locations_output,$rt_zoom);

		return $js_output;
	} 
	} 
}

add_shortcode('google_maps', 'rt_google_map'); 
add_shortcode('location', 'rt_map_location'); 