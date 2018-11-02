<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_register_script( 'swiper', get_template_directory_uri().'/js/swiper-3.3.1.min.js' , '', '', false);
wp_register_style( 'swiper', get_template_directory_uri().'/css/swiper-3.3.1.min.css' , '', '', false);
wp_enqueue_script( 'swiper');
wp_enqueue_style( 'swiper');
get_header(); ?>
<?php while ( have_posts() ) { the_post();
$lf_app_title = get_post_meta( get_the_ID(), 'lf_app_title', true );
$lf_app_subtitle = get_post_meta( get_the_ID(), 'lf_app_subtitle', true );
$lf_app_icon = get_post_meta( get_the_ID(), 'lf_app_icon', true );
$lf_app_color = get_post_meta( get_the_ID(), 'lf_app_color', true );
$lf_app_id = get_the_ID();
if(empty($lf_app_color)) {$lf_app_color = "#666666";}
$lf_app_content = $post->post_content;
$lf_app_content = apply_filters( 'the_content', $lf_app_content );

?>
	<div id="inner_header" class="intergration_header">
		<div class="site-content wrapper">
			<div class="intergration_header_txt">
				<div class="title_small"><a href="<?php echo esc_url( home_url( '/integration' ) ); ?>">集成</a> > <?php the_title();?></div>
				<div class="title_big"><?php echo $lf_app_title;?></div>
				<div class="title_desc"><?php echo $lf_app_subtitle;?></div>
				<a href="<?php echo esc_url( home_url( '/demo' ) ); ?>" class="button3">申请试用</a>
			</div>
			<div class="app_logo_shapes">
				<div class="app_logo_shape_1 app_logo_shape" style="background-color:<?php echo $lf_app_color;?>"></div>
				<div class="app_logo_shape_2 app_logo_shape" style="background-color:<?php echo $lf_app_color;?>"></div>
				<div class="app_logo_shape_3 app_logo_shape"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="" style="width:100%;height:100%;top:0.3rem;left:-3.4rem;fill:<?php echo $lf_app_color;?>;">
					<path d="M70.7 0H29.3L0 29.3v41.3L29.3 100h41.3L100 70.7V29.3L70.7 0z"></path>
				</svg></div>
				<div class="app_logo_shape_4 app_logo_shape" style="background-color:<?php echo $lf_app_color;?>">
					<img src="<?php echo $lf_app_icon;?>" class="app_logo_icon" />
				</div>
			</div>
		</div>
	</div>
	<div class="intergration_usage p-linesection entry-content" id="intergration_usage">
		<h3 class="margin-up"><?php the_title();?>常用场景</h3>
		<div class="swiper-container" id="intergration_usage_swiper">
			<div class="swiper-wrapper">
			<?php
			$postInList=20;
			$myposts = get_posts( array( 
				'numberposts'=>$postInList,
				'posts_per_page'=>$postInList,
				'post_type' => 'lf_template', 
				'orderby' => 'post_time', 
				'order' => 'DESC',
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key' => 'lf_template_app_1',
						'value' => $lf_app_id
					),
					array(
						'key' => 'lf_template_app_2',
						'value' => $lf_app_id
					)
				),
				'suppress_filters' => 0
				)
			);
			$postNum=0;
			foreach( $myposts as $post ) {
				$postNum++;
				if($postNum>$postInList){break;}
				setup_postdata( $post );
				//$obj_lf_template_subtitle = get_post_meta( $post->ID, 'lf_template_subtitle', true );
				$obj_lf_template_title =get_post_meta( $post->ID, 'lf_template_title', true );
				$obj_lf_template_app_1 = get_post_meta( $post->ID, 'lf_template_app_1', true );
				$obj_lf_template_app_1_icn = get_post_meta( $obj_lf_template_app_1, 'lf_app_icon', true );
				$obj_lf_template_app_1_color = get_post_meta( $obj_lf_template_app_1, 'lf_app_color', true );
				$obj_lf_template_app_2 =  get_post_meta( $post->ID, 'lf_template_app_2', true );
				$obj_lf_template_app_2_icn = get_post_meta( $obj_lf_template_app_2, 'lf_app_icon', true );
				$obj_lf_template_app_2_color = get_post_meta( $obj_lf_template_app_2, 'lf_app_color', true );
				$obj_lf_template_shape_1 = get_post_meta( $post->ID, 'lf_template_shape_1', true );
				$obj_lf_template_shape_2 = get_post_meta( $post->ID, 'lf_template_shape_2', true );
			?>
			<div class="lf_template-item swiper-slide">
				<div class="lf_template-icons">
					<div class="lf_template-icon-1 lf_template-icon shape-<?php echo $obj_lf_template_shape_1;?>" style="background-color:<?php echo $obj_lf_template_app_1_color;?>"><img src="<?php echo $obj_lf_template_app_1_icn;?>" class="icn" /></div>
					<div class="lf_template-icon-2 lf_template-icon shape-<?php echo $obj_lf_template_shape_2;?>" style="background-color:<?php echo $obj_lf_template_app_2_color;?>"><img src="<?php echo $obj_lf_template_app_2_icn;?>" class="icn" /></div>
					<span class="ui-shape-card-arrow"></span>
				</div>
				<div class="lf_template-txt">
					<?php echo $obj_lf_template_title; ?>
					<a href="<?php echo esc_url( home_url( '/demo' ) ); ?>" class="button3">申请试用</a>
				</div>
			</div>
			<?php
				}
				wp_reset_postdata();
			?>
			</div><!--.swiper-wrapper-->
			<a href="###" id="swiper-prev" class="swiper-nav"><i class="fa fa-angle-left"></i></a>
			<a href="###" id="swiper-next" class="swiper-nav"><i class="fa fa-angle-right"></i></a>
		</div>

		<div class="site-content wrapper">
			
			<div class="col-raw lf_app_content">
				<div class="col-6 col-n align-left">
					<h3><?php the_title();?>简介</h3>
					<?php echo $lf_app_content;?>
				</div>
				<div class="col-6 col-n align-left">
					<h3>Linkflow简介</h3>
					<p>Linkflow是一个“所见即所得的客户数据平台（CDP）”。无须编程，即可自由组合营销运营场景。让运营人员根据需求选择自己想要的工具或者数据源，所见即所得，快速响应市场变化。不管是数据驱动，还是个性化客户体验，企业都需要同样的数据：谁是你的客户？他们在做什么？但数据分散在不同的数据孤岛中，当您使用10个工具管理客户时，客户数据就分散在10个不同的Excel中。您需要工程师团队去整合他们。Linkflow收集、存储您的各类用户数据，只需要几个点击，即可将其推送到各种内外部系统，比如CRM，OA，ERP，客服以及BI系统等。Linkflow大幅度降低了数据驱动的门槛，让您可以更加专注在您的业务上。</p>
				</div>
			</div>
		</div>
	</div>
	<script>
	$(function(){
	var mySwiperIntergration = new Swiper ('#intergration_usage_swiper', {
		loop: true,
		slidesPerView: 'auto',
		spaceBetween: 36,
		autoplay : 3000,
		centeredSlides: true,
		paginationClickable: true,
		nextButton: '#swiper-next',
	    prevButton: '#swiper-prev',
	    preventClicks: false,
	    preventClicksPropagation: false
		});
	});
	</script>

	<div id="comp-video" class="site-content wrapper ">
		<div class="col-raw">
			<div class="col-6 col-n entry-content">
				<h3>Linkflow链接云</h3>
				<p>所见即所得的“客户数据平台（CDP）”</p>
				<p>Linkflow（联否）连接各类有客户数据的系统，无需编程，三步构建运营场景。Linkflow让您的数据流动起来，大幅度降低企业数据驱动的门槛。</p>

				<p>Linkflow（联否）对接企业客户运营相关的所有系统应用，如微信、短信/邮件、金数据、展视互动等前端客户触点，企业CRM、ERP、BI等后端管理系统。运营人员通过简单配置即可在前后端系统中共享客户数据。</p>

				<p>同时，在Linkflow（联否）中运营人员只需通过简单的托拉拽即可根据运营策略搭建跨系统应用的客户运营场景，并自动执行，提升客户运营效率。</p>
			</div>
			<div class="col-6 col-n">
				<video id="lf-video" class="video-js vjs-default-skin" controls preload="auto" width="100%" height="" poster="<?php echo get_template_directory_uri();?>/images/video-poster.png" data-setup='{"aspectRatio":"16:9"}'>
					<source src="http://pgqmy7xut.bkt.clouddn.com/Linkflow%E4%BA%A7%E5%93%81%E5%AE%A3%E4%BC%A0%E8%A7%86%E9%A2%91.mp4" type='video/mp4'></video>
			</div>
		</div>
	</div>

	<div id="" class="site-content wrapper">
				<ul class="lf_app_list">
				<?php
				$postInList=999;
				$appList = [];
				$myposts = get_posts( array( 
					'numberposts'=>$postInList,
					'posts_per_page'=>$postInList,
					'post_type' => 'lf_link', 
					'orderby' => 'post_time', 
					'order' => 'DESC',
					'meta_query' => array(
						'relation' => 'OR',
						array(
							'key' => 'lf_link_app_1',
							'value' => $lf_app_id
						),
						array(
							'key' => 'lf_link_app_2',
							'value' => $lf_app_id
						)
					),
					'suppress_filters' => 0
					)
				);
				$postNum=0;
				foreach( $myposts as $post ) {
					$postNum++;
					if($postNum>$postInList){break;}
					setup_postdata( $post );
					$content = $post->post_content;
					$content = apply_filters( 'the_content', $content );

					$lf_link_app_1 = get_post_meta( $post->ID, 'lf_link_app_1', true );
					$lf_link_app_2 = get_post_meta( $post->ID, 'lf_link_app_2', true );
					if($lf_app_id == $lf_link_app_1){
						$lf_link_app_item_icn = get_post_meta( $lf_link_app_2, 'lf_app_icon', true );
						$lf_link_app_item_color = get_post_meta( $lf_link_app_2, 'lf_app_color', true );
						$lf_link_app_item_name = get_the_title( $lf_link_app_2);
						$lf_link_app_id = $lf_link_app_2;
						$lf_link_reverse = 0;
					}else{
						$lf_link_app_item_icn = get_post_meta( $lf_link_app_1, 'lf_app_icon', true );
						$lf_link_app_item_color = get_post_meta( $lf_link_app_1, 'lf_app_color', true );
						$lf_link_app_item_name = get_the_title( $lf_link_app_1);
						$lf_link_app_id = $lf_link_app_1;
						$lf_link_reverse = 1;
					}
					array_push($appList,$lf_link_app_id);

				?>
				
					<li class="lf_app_list_item">
						<a href="<?php the_permalink($post->ID); ?><?php if($lf_link_reverse) echo "?rv=1";?>" class="lf_app_list_link">
							<div class="lf_link-icon-1 lf_link-icon" style="background-color:<?php echo $lf_link_app_item_color;?>"><img src="<?php echo $lf_link_app_item_icn;?>" class="icn" /></div>
							<?php echo $lf_link_app_item_name; ?>
						</a>
					</li>

				<?php
				}
				wp_reset_postdata();
				?>
				
				<!-- <li class="lf_app_list_item">...<?php //var_dump( $appList );?></li> -->
				
				<?php //显示不相关的APP
				$postInList=9999;
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
					$lf_app_id = $post->ID;
					$lf_app_item_icn = get_post_meta( $post->ID, 'lf_app_icon', true );
					$lf_app_item_color = get_post_meta( $post->ID, 'lf_app_color', true );
					$lf_app_item_name = get_the_title( $post->ID);
					if(!in_array( $lf_app_id , $appList )){
				?>
					<li class="lf_app_list_item">
						<a href="<?php the_permalink($post->ID); ?>" class="lf_app_list_link">
							<div class="lf_link-icon-1 lf_link-icon" style="background-color:<?php echo $lf_app_item_color;?>"><img src="<?php echo $lf_app_item_icn;?>" class="icn" /></div>
							<?php echo $lf_app_item_name;?>
						</a>
					</li>

				<?php
					}
				}
				wp_reset_postdata();
				?>

				</ul>
	</div><!-- #main -->
<?php } //endwhile; // end of the loop. ?>
<div id="home_content">
<div id="p-contact" class="p-linesection">
	<h2><?php _e( "Linkflow还能为您做什么？", 'linkflow' ); ?></h2>
	<a target="_blank" href="mailto:success@linkflowtech.com" class="button2" title="<?php _e( "联系我们", 'linkflow' ); ?>"><?php _e( "联系我们", 'linkflow' ); ?></a>
	<a href="<?php echo esc_url( home_url( '/demo' ) ); ?>" class="button2 button-white" title="<?php _e( "免费试用", 'linkflow' ); ?>"><?php _e( "免费试用LINKFLOW", 'linkflow' ); ?></a>
</div>
</div>
<?php get_footer(); ?>