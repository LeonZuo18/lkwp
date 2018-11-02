<?php
/**
 * Template Name: Page - Integration
 *
 */

get_header(); ?>

<div id="inner_header" class="inner_header inner_integration inner_header_big" data-stellar-background-ratio="0.5">
	<div id="inner_title"><span class="linebreak">生命宝贵，</span><span class="linebreak">不要再浪费时间自己做集成了！</span> </div>
	<h3>您最常用的SaaS工具已经在此</h3>
	<div id="logos-intergration"></div>
	<h3><span class="linebreak">没看到您最常用的SaaS工具?</span> <span class="linebreak">请 <a href="/demo">联系我们</a></span></h3>
<div id="inner_title2"><span><?php //_e( "DM Hub让管理营销活动变得容易", 'linkflow' ); ?></span> <span></span><?php //_e( "让营销变得简单", 'linkflow' ); ?></div>
</div>
<div id="p-intergration-1" class="p-linesection">
	<div id="" class="site-content wrapper">
		<div class="col-raw">
			<div class="col-10 col-n">
				<ul class="lf_app_list">
						<?php
						$postInList=999;
						$myApps = [];
						$myposts = get_posts( array( 
							'numberposts'=>$postInList,
							'posts_per_page'=>$postInList,
							'post_type' => 'lf_app', 
							'orderby' => 'post_time', 
							'order' => 'DESC',
							'suppress_filters' => 0
							)
						);
						$postNum=0;
						foreach( $myposts as $post ) {
							$postNum++;
							if($postNum>$postInList){break;}
							setup_postdata( $post );
							$lf_app_item_icn = get_post_meta( $post->ID, 'lf_app_icon', true );
							$lf_app_item_color =  get_post_meta( $post->ID, 'lf_app_color', true );
							$lf_app_category = "";
							$terms = get_the_terms( $post->ID , 'lf_app_category' );
							foreach ( $terms as $term ) {
								$lf_app_category = $lf_app_category." appcat-".$term->term_id;
							}
						?>
						
							<li class="lf_app_list_item <?php echo $lf_app_category;?>">
								<a href="<?php echo get_the_permalink();?>" class="lf_app_list_link">
									<div class="lf_link-icon-1 lf_link-icon" style="background-color:<?php echo $lf_app_item_color;?>"><img src="<?php echo $lf_app_item_icn;?>" class="icn" /></div>
									<?php echo get_the_title(); ?>
									<?php //echo $post->ID;?>
								</a>
							</li>

						<?php
						}
						wp_reset_postdata();
						?>
				</ul>
			</div>
			<div class="col-2 col-n col-aside">
				<h2>查看分类</h2>
				<?php
				$args = array(
					'taxonomy' => 'lf_app_category',
					'order' => 'ASC',
					'hide_empty' => true,
				);
				$terms = get_terms( $args );
				$termsCount = 0;
				if ( $terms && !is_wp_error( $terms ) ) {
					echo '<ul class="lf_app_category_list">';
					echo '<li class="current lf_appterm" data-termid="0"><a href="###" >全部</a></li>';
					foreach ( $terms as $term ) {
						echo '<li class="lf_appterm" data-termid='.$term->term_id.'><a href="###">' . $term->name . '</a></li>';
						$termsCount += $term->count;
					}
					echo '</ul>';
				}

				?>
			</div>
		</div>
	</div>
</div>
<script>
	$(function(){
		$(".lf_appterm").on("click",function(){
			$(this).siblings(".lf_appterm").removeClass("current");
			$(this).addClass("current");
			var termid = $(this).data("termid");
			//console.log( termid );
			if(termid==0){
				$(".lf_app_list_item").show();
			}else{
				$(".lf_app_list_item").hide();
				$(".lf_app_list_item.appcat-"+termid).show();
			}
		});
	});
</script>

	<div id="home_content" role="main">
		<div id="p-contact" class="p-linesection">
			<h2><?php _e( "Linkflow还能为您做什么？", 'linkflow' ); ?></h2>
			<a target="_blank" href="mailto:success@linkflowtech.com" class="button2" title="<?php _e( "联系我们", 'linkflow' ); ?>"><?php _e( "联系我们", 'linkflow' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/demo' ) ); ?>" class="button2 button-white" title="<?php _e( "免费试用", 'linkflow' ); ?>"><?php _e( "免费试用LINKFLOW", 'linkflow' ); ?></a>
		</div>
	</div>

<?php get_footer(); ?>
