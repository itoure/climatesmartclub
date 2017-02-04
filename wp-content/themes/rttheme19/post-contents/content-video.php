<?php
# 
# rt-theme
# post content for video post types in listing pages
# 
global $rt_post_values, $rt_blog_list_atts;
extract($rt_post_values);
extract($rt_blog_list_atts);
?> 

<!-- blog box-->
<article <?php post_class("loop")?> id="post-<?php the_ID(); ?>">
		
	
	<?php 
	//display featured image
	if( ! empty( $thumbnail_image_output ) && $video_usage_listing == "only_featured_image"  ): ?>
	<section class="featured_image featured_media">
		<?php 
			//create lightbox link
			do_action("create_lightbox_link",
				array(
					"id"             => 'featured-image-'.get_the_ID(), 					
					'class'          => 'imgeffect video lightbox_ featured_image',
					'href'           => $video_mp4 ? $video_mp4 : $external_video,
					'title'          => __('Play Video','rt_theme'),
					'data_group'     => 'image_'.$featured_image_id,
					'data_title'     => $title,
					'data_thumbnail' => $lightbox_thumbnail,
					'inner_content'  => $thumbnail_image_output			
				)
			);
		?>
		<span class="format-icon icon-videocam"></span>
	</section> 
	<?php endif;?>

	<?php 
	//display the video
	if( $video_usage_listing == "same" && ( $external_video || $video_mp4 ) ) : ?>
	<section class="featured_video featured_media">
		<?php
		//self hosted videos
		if( $video_mp4 ){
			do_action("create_media_output",
				array(
					'id' => 'video-'.get_the_ID(),
					'type' => "video",
					'file_mp4' => $video_mp4,
					'file_webm' => $video_webm,
					'poster'=> $featured_image_url
				)
			);
		}

		//external videos
		if ($external_video){
			 
			if( strpos($external_video, 'youtube')  ) { //youtube
				echo '<div class="video-container embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="//www.youtube.com/embed/'.rt_find_tube_video_id($external_video).'" allowfullscreen></iframe></div>';
			}
			
			if( strpos($external_video, 'vimeo')  ) { //vimeo
				echo '<div class="video-container embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="//player.vimeo.com/video/'.rt_find_tube_video_id($external_video).'?color=d6d6d6&title=0&amp;byline=0&amp;portrait=0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>';
			}			
		}
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