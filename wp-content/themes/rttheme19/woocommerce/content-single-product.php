<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $layout;
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	do_action( 'woocommerce_before_single_product' );

	if ( post_password_required() ) {
		echo get_the_password_form();
		return;
	}


	//single content layout
	$single_content_layout = get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_product_content_layout_options', true);
	$content_width         = $single_content_layout == "new" ? get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_product_content_width', true) : get_theme_mod( RT_THEMESLUG."_woo_content_width" );
	$content_style         = $single_content_layout == "new" ? get_post_meta( $post->ID, RT_COMMON_THEMESLUG.'_product_content_style', true) : get_theme_mod( RT_THEMESLUG."_woo_content_style" );
	$content_width         = ! empty( $content_width ) ? $content_width : "1/1" ;
	$content_style         = ! empty( $content_style ) ? $content_style : "1" ;

	//layout
	$layout = apply_filters("woo_single_products_layout", array( "share_buttons" => true, "content_width" => $content_width, "content_style" => $content_style ) ) ;

	extract( $layout ) ;

	//calculate tabs content width
	$slider_width = explode("/", $content_width);
	$slider_width = $slider_width[1] - $slider_width[0] ."/". $slider_width[1];

	//add row class
	$add_class = "row border_grid single-product";
	$add_class .= $layout["content_width"] != "1/1" ? ' fixed_heights' : '';
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class( $add_class ); ?>>	

	<div class="col <?php echo rt_column_class( $content_width ) ?> col-xs-12">

			<?php
			/**
			 * Force this row to be 1/1 when content_width (tabs) is not 1/1
			 * if content_width is 1/1 make the columns 12/5 (slider) to 12/7 (short info)
			 */
			?>
			<div class="row <?php echo $content_width == "1/1" ? 'fixed_heights' : '';?> ">
				
				<?php if( $content_width == "1/1" ): ?>
					<div class="col col-sm-5 col-xs-12">
				<?php else:?>
					<div class="col col-sm-12 col-xs-12">
				<?php endif;?>

						<?php
							/**
							 * woocommerce_before_single_product_summary hook
							 *
							 * @hooked woocommerce_show_product_sale_flash - 10
							 * @hooked woocommerce_show_product_images - 20
							 */
							do_action( 'woocommerce_before_single_product_summary' );
						?>

				<?php if( $content_width == "1/1" ): ?>
					</div><!-- end .col -->
					<div class="col col-sm-7 col-xs-12">
				<?php endif;?>

						<div class="summary entry-summary">

							<?php
								/**
								 * woocommerce_single_product_summary hook
								 *
								 * @hooked woocommerce_template_single_title - 5
								 * @hooked woocommerce_template_single_rating - 10
								 * @hooked woocommerce_template_single_price - 10
								 * @hooked woocommerce_template_single_excerpt - 20
								 * @hooked woocommerce_template_single_add_to_cart - 30
								 * @hooked rt_woocommerce_template_single_sharing - 35
								 * @hooked woocommerce_template_single_meta - 40
								 * @hooked woocommerce_template_single_sharing - 50						 
								 */
								do_action( 'woocommerce_single_product_summary' );
							?>

						</div><!-- .summary -->

				</div><!-- end .col -->	

			</div><!-- end .row -->

	</div><!-- end .col -->	

<?php if( $content_width == "1/1" ): ?>
</div>
<div class="row product_content_row">
<?php endif;?>

	<div class="col <?php echo rt_column_class( $slider_width ) ?>  col-xs-12">

 		<?php
			/**
			 * woocommerce_after_single_product_summary hook
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>
	</div><!-- end .col -->	
<meta itemprop="name" content="<?php echo get_the_title();?>">
</div><!-- #product-<?php the_ID(); ?> -->

<?php 

/**
 * woocommerce_after_single_product hook
 *
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
do_action( 'woocommerce_after_single_product' ); ?>