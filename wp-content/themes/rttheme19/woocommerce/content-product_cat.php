<?php
/**
 * The template for displaying product category thumbnails within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $woocommerce_loop,$woo_cat_counter;

$term 			= get_queried_object();
$parent_id 		= empty( $term->term_id ) ? 0 : $term->term_id;

$product_categories = get_categories( apply_filters( 'woocommerce_product_subcategories_args', array(
	'parent'       => $parent_id,
	'menu_order'   => 'ASC',
	'hide_empty'   => 0,
	'hierarchical' => 1,
	'taxonomy'     => 'product_cat',
	'pad_counts'   => 1
) ) );

$category_count = count($product_categories);
$woo_cat_counter = $woo_cat_counter > 1 ? $woo_cat_counter : 1 ;


// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Increase loop count
$woocommerce_loop['loop']++;
?>

<?php
	if ( ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] == 0 || $woocommerce_loop['columns'] == 1){
		echo ' <div class="row">';
	}
?>

<div class="col col-sm-3 product-category product">

	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>


	
		<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
		<?php
			/**
			 * woocommerce_before_subcategory_title hook
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
		?>
		</a>
		
		<h3><a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
			<?php
				echo $category->name;

				if ( $category->count > 0 )
					echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">' . $category->count . '</mark>', $category );
			?></a>
		</h3>

		<?php
			/**
			 * woocommerce_after_subcategory_title hook
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );
		?>

	
	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>

</div>

<?php
	if ( $woocommerce_loop['loop'] % $woocommerce_loop['columns'] == 0 || $woo_cat_counter == $category_count ){
		echo '</div>';
	}
	
	$woo_cat_counter++;
?>