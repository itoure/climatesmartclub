<?php
# 
# rt-theme
# post content for audio post types in listing pages
# 
global $rt_post_values, $rt_blog_list_atts;
extract($rt_post_values);
extract($rt_blog_list_atts);
?> 

<!-- blog box-->
<article <?php post_class("loop")?> id="post-<?php the_ID(); ?>">
		
	
	<?php 
	//display featured image
	if( ! empty( $thumbnail_image_output ) && $audio_usage_listing == "only_featured_image"  ): ?>
	<section class="featured_image featured_media">
		<?php 
			//create lightbox link
			do_action("create_lightbox_link",
				array(
					"id"             => 'featured-image-'.get_the_ID(), 
					'class'          => 'imgeffect audio lightbox_ featured_image',
					'href'           => $audio_mp3,
					'title'          => __('Play Audio','rt_theme'),
					'data_group'     => 'image_'.$featured_image_id,
					'data_title'     => $title,													
					'data_thumbnail' => $lightbox_thumbnail,
					'inner_content'  => $thumbnail_image_output		
				)
			);
		?>
		<span class="format-icon icon-note"></span>
	</section> 
	<?php endif;?>

	<?php 
	//display the audio
	if( $audio_usage_listing == "same" && $audio_mp3 ) : ?>
	<section class="featured_audio featured_media">

		<?php
		//self hosted audio
		do_action("create_media_output",
			array(
				'id' => 'audio-'.get_the_ID(),
				'type' => "audio",
				'file_mp3' => $audio_mp3,
				'file_oga' => $audio_ogg,
				'poster'=> $featured_image_url					
			)
		);
		?>
	</section> 		
	<?php endif;?>


	<?php if($show_date !== "false"):?><section class="date"><?php the_date(); ?></section><?php endif;?> 
	<section class="text">

		<!-- blog headline-->
		<h2><a href="<?php echo $permalink ?>" rel="bookmark"><?php the_title(); ?></a></h2> 
			

		<?php 
			if( $use_excerpts !== "false" ){
				the_excerpt();
			}else{
				the_content( __( 'Continue reading', 'rt_theme' ) );
				wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'rt_theme' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
			}
		?>

		<?php 
			//post meta bar
			do_action( "post_meta_bar", array( "show_author"=> $show_author, "show_categories" => $show_categories, "show_comment_numbers" => $show_comment_numbers, "show_date" => $show_date) ); 
		?>

	</section> 

</article> 
<!-- / blog box-->