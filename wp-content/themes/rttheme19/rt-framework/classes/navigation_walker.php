<?php
/**
 * 
 * This is the customized version of the code for RT-Themes
 *
 */

/**
 * Create HTML list of nav menu items.
 * Replacement for the native Walker, using the description.
 *
 * @see    http://wordpress.stackexchange.com/q/14037/
 * @author toscho, http://toscho.de
 */


class RT_Menu_Class_Walker extends Walker_Nav_Menu
{
	/**
	 * Start the element output.
	 *
	 * @param  string $output Passed by reference. Used to append additional content.
	 * @param  object $item   Menu item data object.
	 * @param  int $depth     Depth of menu item. May be used for padding.
	 * @param  array $args    Additional strings.
	 * @return void
	 */
	
	
	function start_el(&$output, $item, $depth=0, $args =array(), $id = 0)
	{
		if( ! is_object( $args )) { 
			return ;
		}

		global $first_item_counter; 
		if( !isset ($first_item_counter) ) $first_item_counter = 0; 
		
		$classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

		$class_names = join(
			' '
		,   apply_filters(
				'nav_menu_css_class'
			,   array_filter( $classes ), $item
			)
		);

		$sub_title = esc_attr( $item->description ); 
		$title = apply_filters( 'the_title', $item->title, $item->ID );


		//add class name to li if item has description 
		$class_names .= ! empty( $sub_title ) ? " has-sub-title" : "";

		//find if an icon used as class name - remove from li - use for a 
		if( ! empty ( $class_names ) ){ 
 
			if ( strpos( $class_names, "icon-" ) !== false ) { 
  
				$new_class_names = "";
				$icon_name = "";

				foreach (explode(" ", $class_names) as $value) {
					if ( strpos(  $value, "icon-" ) === false ) {
						$new_class_names .= " ". $value ;
					}else{
						$icon_name = $value;
					}
				}

				$class_names = ' class="'. esc_attr( $new_class_names ) . '"';

			}else{
				$class_names = ' class="'. esc_attr( $class_names ) . '"';
			}
		} 

		$output .= "<li id='menu-item-$item->ID' $class_names>";
 
		$attributes  = '';  

		! empty( $icon_name )
			and $attributes .= ' class="'  . esc_attr( $icon_name ) .'"'; 
 
		! empty( $item->attr_title )
			and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';				 

		! empty( $item->target )
			and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';

		! empty( $item->xfn )
			and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';

		! empty( $item->url )
			and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';


			if( ! empty($sub_title) ){			
				$item_output = $args->before
					. "<a $attributes>"
					. $args->link_before
					. $title
					. '<span>'.$sub_title.'</span>'
					. '</a> '
					. $args->link_after 
					. $args->after;				
			}else{
				$item_output = $args->before
					. "<a $attributes>"
					. $args->link_before
					. $title                
					. '</a> '
					. $args->link_after 
					. $args->after;               
			} 
	 






			// Since $output is called by reference we don't need to return anything.
			$output .= apply_filters(
				'walker_nav_menu_start_el'
			,   $item_output
			,   $item
			,   $depth
			,   $args
			);
			 
		

	} 
	
}
?>