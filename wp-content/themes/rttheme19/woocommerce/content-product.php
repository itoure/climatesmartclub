<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop, $products, $woo_product_layout, $page_product_count, $first_row, $last_row, $new_row; 


$first_row = isset( $first_row ) ? $first_row : "first-row" ;
$last_row = isset( $last_row ) ? $last_row : "";



// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ){

	$woo_product_layout = get_theme_mod(RT_THEMESLUG."_woo_layout");
	$woo_product_layout = $woo_product_layout ? $woo_product_layout : 3; //default 3 	

	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', rt_column_count( $woo_product_layout ) );
}



// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;



// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ){
	$classes[] = 'first';
	$first_row = $first_row == "first-row" && $woocommerce_loop['loop'] != 1 ? "" : $first_row; //add first row clas to boxes  
	$last_row = $page_product_count - $woocommerce_loop['loop'] < $woocommerce_loop['columns'] ? "last-row" : ""; //add last row clas to boxes 
}

if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] || $page_product_count == $woocommerce_loop['loop'] ){
	$classes[] = 'last';
}

$classes[] =  $first_row;
$classes[] =  $last_row;


/*
*	add rt class namems
*/
$woo_column_class_name = "col ".  rt_column_class( $woocommerce_loop['columns'] ) ;
$classes[] = $woo_column_class_name;


//open row block 
if(  $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 1 || $woocommerce_loop['columns'] == 1 ){
	$new_row = true;
	echo '<div class="row clearfix">';
}	

?>

<div <?php post_class( $classes ); ?>>

	<div class="product_item_holder">
		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

			<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
			?>

			<div class="product_info">
				<h5 class="clean_heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

				<?php
					/**
					 * woocommerce_after_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_template_loop_price - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item_title' );
				?>

				<div class="product_info_footer clearfix">
				<?php
					/**
					 * rt_product_info_footer hook
					 *
					 * @hooked woocommerce_template_loop_add_to_cart - 10
					 */
					do_action( 'rt_product_info_footer' );
				?>
				</div>

			</div> 
		<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
			
	</div>

</div>


<?php
//close row block 
if( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 || $page_product_count == $woocommerce_loop['loop'] ){
	echo '</div>';  
	$new_row = false;
}?>
