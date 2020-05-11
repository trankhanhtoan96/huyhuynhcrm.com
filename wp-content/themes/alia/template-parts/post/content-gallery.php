<?php
$post_classes = array('blog_post_container');
$post_position = '';
if (!isset($alia_post_position) || $alia_post_position != 'related_posts') {
	// add customhentry not hentry, because the hentry class will be deleted in the filter
	// later in alia_remove_hentry() function will check for customentry first then decide to remove hentry or not
	$post_classes[] = 'customhentry';
	$post_position = 'normalhentry';
}
if ( !is_single() && alia_cross_option('alia_blog_show_all_content', '', 0) && isset($alia_content_width) && $alia_content_width == "wide" ) {
	$post_classes[] = 'show_all_content_blog';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>

	<?php if (is_single(get_the_ID())): ?>
		<div class="single_post_body">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
			  yoast_breadcrumb( '
			<p class="single_breadcrumbs" id="breadcrumbs">','</p>
			' );
			}
			?>

			<div class="post_header post_header_single">
				<?php
				the_title( '<h1 class="entry-title title post_title">', '</h1>' );
				?>
			</div>

			<?php if (alia_cross_option('alia_meta_info_posts', '', 1)): ?>
			<div class="post_meta_container post_meta_container_single clearfix">

				<?php
					alia_post_meta($post_position);
				?>
			</div>
			<?php endif; ?>
		</div>
	<?php endif ?>


		<?php
		$post_banner_class = 'no_post_banner';
		$num = 0;

		if ( ! is_single(get_the_ID()) ) {
			// echo '<pre>';
			// print_r(get_post_gallery('', false));
			// echo '</pre>';

			$total_gallery_items = 0;
			if ( get_post_gallery() && array_key_exists('ids', get_post_gallery('', false)) ){
				$gallery_images_ids = get_post_gallery('', false)['ids'];
				$gallery_images_ids = explode(',', $gallery_images_ids);
				$gallery_images_srcs = get_post_gallery('', false)['src'];
				$total_gallery_items = count($gallery_images_ids);
			}

			if ( has_post_thumbnail() && ("wide" != $alia_content_width || $total_gallery_items < 3) ):
				$alia_post_banner = 'alia_grid_banner';
				if (
					!alia_cross_option('alia_crop_banner_post_list', '', 1) && !is_single(get_the_ID())
					|| !alia_cross_option('alia_crop_banner_inside_post', '', 0) && is_single(get_the_ID())
					) {
						$alia_post_banner = 'alia_grid_banner_uncrop';
				}
				if (isset($alia_content_width) && $alia_content_width == 'grid3col') {
				 $alia_post_banner = 'alia_grid_banner_3col';
				 if (
					 !alia_cross_option('alia_crop_banner_post_list', '', 1) && !is_single(get_the_ID())
					 || !alia_cross_option('alia_crop_banner_inside_post', '', 0) && is_single(get_the_ID())
					 ) {
						 $alia_post_banner = 'alia_grid_banner_3col_uncrop';
				 }
			 }
				?>
					<figure class="post_banner">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( $alia_post_banner ); ?>
						</a>
					</figure>
					<?php $post_banner_class = 'has_post_banner'; ?>
				<?php
			else:

				// If not a single post, highlight the gallery.
				if ( get_post_gallery() && array_key_exists('ids', get_post_gallery('', false)) ) {

					if (count($gallery_images_ids) > 1) {
						echo '<figure class="post_banner">';
							echo '<div class="entry-gallery row gallery_items_'.count($gallery_images_ids).'">';


										echo '<a href="'.get_permalink().'">';
										foreach ($gallery_images_ids as $id) {

											$num++;
											$image_alt = get_post_meta( $id, '_wp_attachment_image_alt', true);

											if ( isset($alia_content_width) && "wide" == $alia_content_width && $num > 3) {
												break;
											} elseif (	( isset($alia_content_width) && "grid" == $alia_content_width )
															|| ( isset($alia_content_width) && "two_coloumns_list" == $alia_content_width )
															|| ( isset($alia_content_width) && "grid3col" == $alia_content_width )
													 ) {
												if (count($gallery_images_ids) == 3 && $num == 3) {
													// if loop reachs 3, draw wide gallery image and breadk.
													echo '<div class="gallery_single_image col item'.esc_attr($num).'">
														<img src="'.wp_get_attachment_image_src($id, 'alia_wide_thumbnail')[0].'" alt="'.esc_attr($image_alt).'" />
													</div>';
													break;
												} elseif ($num > 4) {
													break;
												}

											}

											echo'<div class="gallery_single_image col item'.esc_attr($num).'">
												<img src="'.wp_get_attachment_image_src($id, 'alia_large_thumbnail')[0].'" alt="'. esc_attr($image_alt).'" />
											</div>';

										} // end foreach
										echo '</a>';


							echo '</div>'; // end entry-gallery
						echo '</figure>';
						$post_banner_class = 'has_post_banner';
					} // end check if gallery items is more than 1

				};
			endif;
		};
		?>

	<div class="post_body <?php echo esc_attr($post_banner_class); ?>">

		<?php if (!is_single(get_the_ID())): ?>
			<div class="post_header">
				<?php
				if ( is_front_page() && is_home() ) {
					the_title( '<h3 class="entry-title title post_title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				} else {
					the_title( '<h2 class="entry-title title post_title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
				?>
			</div>


			<?php if (alia_cross_option('alia_meta_info_posts', '', 1)): ?>
			<div class="post_meta_container clearfix">

				<?php
					alia_post_meta($post_position);
				?>
			</div>
			<?php endif; ?>
		<?php endif ?>

		<div class="post_info_wrapper">
			<?php if ( is_single(get_the_ID()) ||
				( alia_cross_option('alia_blog_show_all_content', '', 0) && isset($alia_content_width) && $alia_content_width == "wide" )
			) {
				echo '<div class="entry-content blog_post_text blog_post_description clearfix">';
					// Only show content if is a single post, or if there's no featured image.
					/* translators: %s: Name of current post */
					the_content( sprintf( '<div class="blog_post_control_item blog_post_readmore"><a href="%1$s" class="more-link">%2$s<span class="continue_reading_dots"><span class="continue_reading_squares"><span></span><span></span><span></span><span></span></span><i class="fas fa-chevron-right readmore_icon"></i></span></a></div>',
						esc_url( get_permalink( get_the_ID() ) ),
						esc_attr__( 'Continue reading', 'alia' )

					) );

					wp_link_pages( array(
						'before'      => '<div class="single_post_pagination"><div class="page-links">' . esc_attr__( 'Pages:', 'alia' ),
						'after'       => '</div></div>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					) );

					if (is_single() || !strpos($post->post_content, '<!--more-->')) {
						if ( alia_cross_option('alia_show_tags_posts', '', 1) && get_the_tags() ) {
							echo '<div class="tagcloud single_tagcloud clearfix">';
							the_tags('', '', '');
							echo '</div>';
						}
					}

					if (( alia_cross_option('alia_blog_show_all_content', '', 0) && isset($alia_content_width) && $alia_content_width == "wide" ) && !strpos($post->post_content, '<!--more-->')) {
						echo '<div class="blog_post_control_item blog_post_readmore">';
							if ( !post_password_required() && comments_open(get_the_ID()) ) {
								echo '<span class="blog_list_comment_link">';
									$comments_num = '';
									if (get_comments_number() != 0) {
										$comments_num = '<span class="comment_num">'.get_comments_number().'</span>';
									}
									printf('<a href="%1$s">%2$s%3$s</a>',
											get_comments_link(),
											'<i class="far fa-comment-alt"></i>',
											$comments_num
									);

								echo '</span>';
							}

							if (function_exists('alia_blog_list_share_icons') ) {
								alia_blog_list_share_icons();
							}
						echo '</div>'; // end blog_post_control_item
					}

				echo '</div>'; // close .entry-content
			} elseif (!isset($alia_content_layout) || $alia_content_layout != 'layout_with_sidebar') {
				echo '<div class="entry-summary blog_post_text blog_post_description">';
					if ( ($alia_content_width == 'two_coloumns_list' || $alia_content_width == 'grid' || $alia_content_width == 'grid3col' ) && ($num < 3 || has_post_thumbnail() ) ) {
						echo alia_excerpt(20);
					}else{
						echo alia_excerpt(40);
					}

					echo '<div class="blog_post_control_item blog_post_readmore">';
						// read more link
						echo sprintf( '<a href="%1$s" class="more-link">%2$s<span class="continue_reading_dots"><span class="continue_reading_squares"><span></span><span></span><span></span><span></span></span><i class="fas fa-chevron-right readmore_icon"></i></span></a>',
							esc_url( get_permalink( get_the_ID() ) ),
							esc_attr__( 'Continue reading', 'alia' )

						);

						if ( !post_password_required() && comments_open(get_the_ID()) ) {
							echo '<span class="blog_list_comment_link">';
								$comments_num = '';
								if (get_comments_number() != 0) {
									$comments_num = '<span class="comment_num">'.get_comments_number().'</span>';
								}
								printf('<a href="%1$s">%2$s%3$s</a>',
										get_comments_link(),
										'<i class="far fa-comment-alt"></i>',
										$comments_num
								);

							echo '</span>';
						}

						if (function_exists('alia_blog_list_share_icons') ) {
							alia_blog_list_share_icons();
						}


					echo '</div>'; // end blog_post_control_item
				echo '</div>'; // close .entry-summary
			}
			?>

		</div> <!-- end post_info_wrapper -->
	</div> <!-- end post_body -->
</article>