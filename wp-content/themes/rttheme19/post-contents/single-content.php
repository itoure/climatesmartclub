<?php
# 
# rt-theme
# single post content for standart post types
# 
global $rt_post_values, $rt_global_variables;
extract($rt_post_values);
?> 

<article itemscope itemtype="http://schema.org/Article" <?php post_class("single")?> id="post-<?php the_ID(); ?>">
	
	<?php if( ! empty( $thumbnail_image_output ) && $featured_image_single_page ):?>
	<section class="featured_image featured_media">
		<?php 
			//create lightbox link
			do_action("create_lightbox_link",
				array(
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
		<span class="format-icon icon-pencil"></span>
	</section> 
	<?php endif;?>

	<section class="post-title-holder row">


			<?php if($show_share_buttons):?>
				<div class="col col-sm-7 col-xs-12">
			<?php else:?>
				<div class="col col-sm-12 col-xs-12">
			<?php endif;?>

				<?php if( $show_date !== "false" ):?><section class="date"><?php the_date(); ?></section><?php endif;?>
				<!-- blog headline--> 
				<?php printf('<%2$s>%1$s</%2$s>', get_the_title(), $rt_global_variables["heading_tag"] ) ?>
			
			<?php if($show_share_buttons):?>
				</div> 
				<div class="col col-sm-5 col-xs-12">
				<?php 
					//Social Share buttons
					echo do_shortcode( apply_filters("rt_social_share_shortcode","[rt_social_media_share]") );
				?>
			<?php endif;?>		
			</div><!-- / .col --> 

	</section>

	<section itemprop="articleBody" class="text">		
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'rt_theme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</section> 


	<?php 
		//post meta bar
		do_action( "post_meta_bar", array( "show_author"=> $show_author, "show_categories" => $show_categories, "show_comment_numbers" => $show_comment_numbers, "show_date" => $show_date, "show_tags" => $show_tags) ); 
	?>

</article>