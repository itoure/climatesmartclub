<?php
# 
# rt-theme
# post content for standart post types in listing pages
# 
global $rt_post_values, $rt_blog_list_atts;
extract($rt_post_values);
extract($rt_blog_list_atts);
?> 

<!-- blog box-->
<article <?php post_class("loop")?> id="post-<?php the_ID(); ?>">
		
	
	<?php if( ! empty( $thumbnail_image_output )  ):?>
	<section class="featured_image featured_media">
		<?php 
			//create lightbox link
			do_action("create_lightbox_link",
				array(
					"id"             => 'featured-image-'.get_the_ID(), 
					'class'          => 'imgeffect zoom lightbox_ featured_image',
					'href'           => $featured_image_url,
					'title'          => __('Enlarge Image','rt_theme'),
					'data_group'     => 'image_'.$featured_image_id,
					'data_title'     => $title,
					'data_thumbnail' => $lightbox_thumbnail,
					'inner_content'  => $thumbnail_image_output
				)
			);
		?>
		<span class="format-icon icon-megaphone-1"></span>
	</section> 
	<?php endif;?>


	<?php if($show_date !== "false"):?><section class="date"><?php the_date(); ?></section><?php endif;?> 
	<section class="text">

		<!-- blog headline-->
		<h2><?php the_title(); ?></h2> 
			

		<?php 
			if( $use_excerpts !== "false" ){
				the_excerpt();
			}else{
				the_content( __( 'Continue reading', 'rt_theme' ) );
				wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'rt_theme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
			}
		?>

		<?php do_action( "post_meta_bar", array( "show_author"=> $show_author, "show_categories" => $show_categories, "show_comment_numbers" => "false", "show_date" => $show_date) ); ?>

	</section> 

</article> 
<!-- / blog box-->
