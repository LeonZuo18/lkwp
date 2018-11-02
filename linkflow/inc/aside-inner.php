<div id="secondary" class="widget-area" role="complementary">
		<!--aside tabs start-->
		<aside id="aside_list_tabs" class="widget ">
			<h2 class="section-title aside-title">
				<i class="section-icon" id="section-icon-hot"></i>热门文章
			</h2>
			<div class="tab-cont" id="tab_aside_1"><!--热门-->
			<?
				$postInList=10;
				$myposts = get_posts( array( 
					'numberposts'=>$postInList,
					'posts_per_page'=>$postInList,
					'post_type' => 'post',
					'cat'      => 38,
					'orderby' => 'meta_value_num',
					'meta_key'=> 'views',
					'order' => 'DESC',
					'suppress_filters' => 0
				) );
				$postNum=0;
				foreach( $myposts as $post ) {
					setup_postdata( $post );
					$content = $post->post_content;
					$content = apply_filters( 'the_content', $content );
					$postNum++;
					if($postNum>$postInList){break;}

					require( get_template_directory() . '/inc/content-panel-post.php' );
				?>
				
				<?php
				}
				wp_reset_postdata();
				?>
				
			</div><!--热门-->

			<div class="tab-cont" id="tab_aside_2"><!--最新-->
			<?
				$postInList=5;
				$myposts = get_posts( array( 
					'numberposts'=>$postInList,
					'posts_per_page'=>$postInList,
					'post_type' => 'post',
					'cat' => -110,
					'orderby' => 'post_time',
					'order' => 'DESC',
					'suppress_filters' => 0
				) );
				$postNum=0;
				foreach( $myposts as $post ) {
					setup_postdata( $post );
					$content = $post->post_content;
					$content = apply_filters( 'the_content', $content );
					$postNum++;
					if($postNum>$postInList){break;}

					require( get_template_directory() . '/inc/content-panel-post.php' );
				?>
				
				<?php
				}
				wp_reset_postdata();
				?>
			</div><!--最新-->

			<div class="tab-cont tag-cloud-container" id="tab_aside_3"><!--标签-->
			<?php $cloud_args = array(
				'smallest'                  => 14, 
				'largest'                   => 14,
				'unit'                      => 'px', 
				'number'                    => 45,  
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
		</aside>
		<!--aside tabs end-->
	</div>