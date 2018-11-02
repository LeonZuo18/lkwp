<?php
/**
 * Template Name: Page - Blog
 *
 */

get_header(); ?>
<div id="inner_header" class="inner_header inner_blog" data-stellar-background-ratio="0.5">
	<div id="inner_title">
		<h2>Linkflow 博客</h2>
		<ul class="list-categories">
			<?php wp_list_categories( array(
				'orderby' => 'name',
				'title_li' => '',
			) ); ?> 
		</ul>
	</div>
</div>
<div id="primary">
	<div id="p-blog-1" class="p-linesection">
		<div class="site-content entry-content wrapper">
			<div class="inner_content_full">
				
					<div class="col-raw blog-content-1">
						<div class="col-8 col-n entry-content">
								<?php 
								$postInList=1;
								$myposts = get_posts( array( 
									'numberposts'=>$postInList,
									'posts_per_page'=>$postInList,
									'post_type' => 'post', 
									'orderby' => 'post_time', 
									'order' => 'DESC',
									//'post__in'=>get_option('sticky_posts'),
									'suppress_filters' => 0
								) );
								$postNum=0;
								foreach( $myposts as $post ) {
									setup_postdata( $post );
									$content = $post->post_content;
									$content = apply_filters( 'the_content', $content );
									$postNum++;
									if($postNum>$postInList){break;}
								?>
									<div class="panel-post-container post_<?php echo $postNum ?>" >
										<a href="<?php the_permalink(); ?>" class="panel-post-thumbnail">
											<?php if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail('',array( 'alt' => get_the_title() )); ?>
											<?php } else {
												$thumbnail_url = get_post_first_img();
												if(empty($thumbnail_url))
													$thumbnail_url= get_template_directory_uri()."/images/default_website.png";
												 ?>
												<img src="<?php echo $thumbnail_url; ?>" alt="<?php echo the_title(); ?>" />
											<?php } ?>
										</a>
										<div class="panel-post-txt">
											<a href="<?php the_permalink(); ?>" class="panel-post-title"><?php echo the_title(); ?></a>
											<div class="panel-post-sub">
												<i class="icon-article icon-article-time"></i><?php
												printf( '<time class="entry-date" datetime="%3$s">%4$s</time>',
													esc_url( get_permalink() ),
													esc_attr( get_the_time() ),
													esc_attr( get_the_date( 'c' ) ),
													esc_html( get_the_date() )
												); ?>
												&nbsp; <i class="icon-article icon-article-view"></i><?php
												if(function_exists('the_views')) the_views();
												?>
												&nbsp; <i class="icon-article icon-article-folder"></i><?php the_category( ', ' ); ?>

												<!--  ・ <i class="fa fa-commenting-o"></i>  -->
												<?php //comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
											</div><!-- .panel-post-sub -->
											<div class="panel-post-content">
												<?php
													$content = mb_strimwidth(strip_tags($content), 0, 220,"...");
													$content = preg_replace('/(http)(.)*([a-z0-9\-\.\_])+/i','',$content);
													$content = preg_replace('/(www)(.)*([a-z0-9\-\.\_])+/i','',$content);
													echo $content;
												?>
											</div>
										</div>
									</div>

								<?php
								}
								wp_reset_postdata();

								?>
						</div>
						<div class="col-4 col-n entry-content">
							<h2>推荐标签</h2>
							<div class="tab-cont tag-cloud-container"><!--标签-->
							<?php $cloud_args = array(
								'smallest'                  => 14, 
								'largest'                   => 14,
								'unit'                      => 'px', 
								'number'                    => 31,  
								'format'                    => 'flat',
								'separator'                 => "\n",
								'orderby'                   => 'name', 
								'order'                     => 'ASC',
								'exclude'                   => null, 
								'include'                   => null, 
								'topic_count_text_callback' => default_topic_count_text,
								'link'                      => 'view', 
								'taxonomy'                  => 'post_tag', 
								'echo'                      => true,
								'child_of'                  => null,
							);
							wp_tag_cloud( $cloud_args );
							?>
							</div><!--标签-->
							<h2>推荐文章</h2>
							<ul class="list-simple">
							<?php
								$postInList=6;
								$myposts = get_posts( array( 
									'numberposts'=>$postInList,
									'posts_per_page'=>$postInList,
									'post_type' => 'post',
									'orderby' => 'post_time',
									'order' => 'DESC',
									'suppress_filters' => 0
								) );
								$postNum=0;
								foreach( $myposts as $post ) {
									setup_postdata( $post );
									$postNum++;
									if($postNum>$postInList){break;}
								?>
								<li>
									<a href="<?php the_permalink(); ?>" class="post-title"><?php echo the_title(); ?></a>
								</li>
							<?php
								}
								wp_reset_postdata();
							?>
							
							<?php //endif; endfor; ?>
						</ul>
						</div>
					</div>


					<div class="col-raw">
					<?php
						$postInList=7;
						$myposts = get_posts( array( 
							'numberposts'=>$postInList,
							'posts_per_page'=>$postInList,
							'post_type' => 'post', 
							'orderby' => 'post_time', 
							'order' => 'DESC',
							//'post__in'=>get_option('sticky_posts'),
							'suppress_filters' => 0
						) );
						$postNum=0;
						foreach( $myposts as $post ) {

							setup_postdata( $post );
							$content = $post->post_content;
							$content = apply_filters( 'the_content', $content );
							$postNum++;
							if($postNum==1){continue;}
							if($postNum>$postInList){break;}
						?>
						<div class="col-4 col-n entry-content">
							<?php require( get_template_directory() . '/inc/content-panel-post.php' ); ?>
						</div>
					<?php }
						wp_reset_postdata();
					?>
					</div>
					<div class="blog-footer">
						<a href="/blog/all-posts" class="button3" title="全部文章">全部文章</a>
					</div>
			</div><!--.inner_content_full-->

		</div>
	</div>
</div>

<?php get_footer(); ?>
