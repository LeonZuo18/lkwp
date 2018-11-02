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
<?php while ( have_posts() ) : the_post();
$lf_link_title = get_post_meta( get_the_ID(), 'lf_link_title', true );
$lf_link_subtitle = get_post_meta( get_the_ID(), 'lf_link_subtitle', true );
$lf_link_app_1 = get_post_meta( get_the_ID(), 'lf_link_app_1', true );
$lf_link_app_2 = get_post_meta( get_the_ID(), 'lf_link_app_2', true );
$lf_link_desc_title =  get_post_meta(get_the_ID(), 'lf_link_desc_title', true );
$lf_link_desc_cont =  get_post_meta(get_the_ID(), 'lf_link_desc_cont', true );

$lf_app_id = get_the_ID();

$lf_link_app_1_icon = get_post_meta( $lf_link_app_1, 'lf_app_icon', true );
$lf_link_app_1_color = get_post_meta( $lf_link_app_1, 'lf_app_color', true );
if(empty($lf_link_app_1_color)) $lf_link_app_1_color = "#666666";
$linkPost = get_post( $lf_link_app_1 );
$lf_link_app_1_content =  apply_filters( 'the_content', $linkPost->post_content );
$lf_link_app_1_title =  get_the_title( $lf_link_app_1 );


$lf_link_app_2_icon = get_post_meta( $lf_link_app_2, 'lf_app_icon', true );
$lf_link_app_2_color = get_post_meta( $lf_link_app_2, 'lf_app_color', true );
if(empty($lf_link_app_2_color)) $lf_link_app_2_color = "#666666";
$linkPost = get_post( $lf_link_app_2 );
$lf_link_app_2_content =  apply_filters( 'the_content', $linkPost->post_content );
$lf_link_app_2_title =  get_the_title( $lf_link_app_2 );


if($_GET['rv']==1){//交换值
	$tempV = $lf_link_app_1_icon;
	$lf_link_app_1_icon = $lf_link_app_2_icon;
	$lf_link_app_2_icon = $tempV;

	$tempV = $lf_link_app_1_color;
	$lf_link_app_1_color = $lf_link_app_2_color;
	$lf_link_app_2_color = $tempV;

	$tempV = $lf_link_app_1_content;
	$lf_link_app_1_content = $lf_link_app_2_content;
	$lf_link_app_2_content = $tempV;

	$tempV = $lf_link_app_1_title;
	$lf_link_app_1_title = $lf_link_app_2_title;
	$lf_link_app_2_title = $tempV;
}
?>
	<div id="inner_header" class="intergration_header">
		<div class="site-content wrapper">
			<div class="intergration_header_txt">
				<div class="title_small"><a href="<?php echo esc_url( home_url( '/integration' ) ); ?>">集成</a> > <?php echo $lf_link_app_1_title;?>连接<?php echo $lf_link_app_2_title;?></div>
				<div class="title_big">
					<?php //echo $lf_link_title;?>
					<?php echo $lf_link_app_1_title;?>+<?php echo $lf_link_app_2_title;?>集成</div>
				<div class="title_desc">
					<?php //echo $lf_link_subtitle;?>
					通过linkflow整合<?php echo $lf_link_app_1_title;?>和<?php echo $lf_link_app_2_title;?>，并将两者的运营流程自动化
				</div>
				<a href="<?php echo esc_url( home_url( '/demo' ) ); ?>" class="button3">申请试用</a>
			</div>
			<div class="app_logo_shapes app_logo_shapes_2">
				<div class="app_logo_shape_1 app_logo_shape" style="background-color:<?php echo $lf_link_app_1_color;?>"></div>
				<div class="app_logo_shape_2 app_logo_shape" style="background-color:<?php echo $lf_link_app_1_color;?>"></div>
				<div class="app_logo_shape_3 app_logo_shape"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="" style="width:100%;height:100%;top:0.3rem;left:-3.4rem;fill:<?php echo $lf_link_app_1_color;?>;">
					<path d="M70.7 0H29.3L0 29.3v41.3L29.3 100h41.3L100 70.7V29.3L70.7 0z"></path>
				</svg></div>
				<div class="app_logo_shape_4 app_logo_shape" style="background-color:<?php echo $lf_link_app_1_color;?>">
					<img src="<?php echo $lf_link_app_1_icon;?>" class="app_logo_icon" />
				</div>

				<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" class="app_logo_cross" style="width:36px;height:36px;fill:#E9EDF0;">
					<path d="M17 14L3 0 0 3l14 14L0 31l3 3 14-14 14 14 3-3-14-14L34 3l-3-3z"></path>
				</svg>
				
				<div class="app_logo_shape_1 app_logo_shape app_logo_shape_reverse" style="background-color:<?php echo $lf_link_app_2_color;?>"></div>
				<div class="app_logo_shape_2 app_logo_shape app_logo_shape_reverse" style="background-color:<?php echo $lf_link_app_2_color;?>"></div>
				<div class="app_logo_shape_3 app_logo_shape app_logo_shape_reverse"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="" style="width:100%;height:100%;top:0.3rem;left:-3.4rem;fill:<?php echo $lf_link_app_2_color;?>;">
					<path d="M70.7 0H29.3L0 29.3v41.3L29.3 100h41.3L100 70.7V29.3L70.7 0z"></path>
				</svg></div>
				<div class="app_logo_shape_4 app_logo_shape app_logo_shape_reverse" style="background-color:<?php echo $lf_link_app_2_color;?>">
					<img src="<?php echo $lf_link_app_2_icon;?>" class="app_logo_icon" />
				</div>
			</div>
		</div>
	</div>
	<div class="intergration_usage p-linesection entry-content" id="intergration_usage">
		<h3 class="margin-up"><?php echo $lf_link_app_1_title;?>连接<?php echo $lf_link_app_2_title;?>常用场景</h3>
		<div class="swiper-container" id="intergration_usage_swiper">
			<div class="swiper-wrapper">
			<?php
			$postInList=20;
			$myposts1 = get_posts( array( 
				'numberposts'=>$postInList,
				'posts_per_page'=>$postInList,
				'post_type' => 'lf_template', 
				'orderby' => 'post_time', 
				'order' => 'DESC',
				'meta_query' => array(
					'relation' => 'AND',
					array(
						'key' => 'lf_template_app_1',
						'value' => $lf_link_app_1
					),
					array(
						'key' => 'lf_template_app_2',
						'value' => $lf_link_app_2
					)
				),
				'suppress_filters' => 0
				)
			);

			$myposts2 = get_posts( array( 
				'numberposts'=>$postInList,
				'posts_per_page'=>$postInList,
				'post_type' => 'lf_template', 
				'orderby' => 'post_time', 
				'order' => 'DESC',
				'meta_query' => array(
					'relation' => 'AND',
					array(
						'key' => 'lf_template_app_1',
						'value' => $lf_link_app_2
					),
					array(
						'key' => 'lf_template_app_2',
						'value' => $lf_link_app_1
					)
				),
				'suppress_filters' => 0
				)
			);

			$myposts3 = get_posts( array( 
				'numberposts'=>$postInList,
				'posts_per_page'=>$postInList,
				'post_type' => 'lf_template', 
				'orderby' => 'post_time', 
				'order' => 'DESC',
				'meta_query' => array(
					'relation' => 'OR',
					array(
						'key' => 'lf_template_app_1',
						'value' => $lf_link_app_1
					),
					array(
						'key' => 'lf_template_app_2',
						'value' => $lf_link_app_1
					),
					array(
						'key' => 'lf_template_app_1',
						'value' => $lf_link_app_2
					),
					array(
						'key' => 'lf_template_app_2',
						'value' => $lf_link_app_2
					),
				),
				'suppress_filters' => 0
				)
			);
			$myposts = array_merge($myposts1, $myposts2);
			$myposts = array_merge($myposts, $myposts3);
			$myposts = more_array_unique($myposts);
			$postNum=0;
			foreach( $myposts as $post ) {
				$postNum++;
				if($postNum>$postInList){break;}
				setup_postdata( $post );
				//$obj_lf_template_subtitle = get_post_meta( $post->ID, 'lf_template_subtitle', true );
				$obj_lf_template_title = get_post_meta( $post->ID, 'lf_template_title', true );
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
		<?php
			//echo count($myposts1) ;echo "<br/>";
			//echo count($myposts2) ;echo "<br/>";
			//echo count($myposts3) ;echo "<br/>";
		?>
		<div class="site-content wrapper">
			
			<div class="col-raw lf_app_content">
				<div class="col-6 col-n align-left">
					<h3><?php echo $lf_link_app_1_title;?>简介</h3>
					<?php echo $lf_link_app_1_content ;?>
				</div>
				<div class="col-6 col-n align-left">
					<?php if($lf_link_app_1==$lf_link_app_2){?>
						<h3><?php echo $lf_link_desc_title;?>简介</h3>
						<?php echo $lf_link_desc_cont ;?>
					<?php } else { ?>
						<h3><?php echo $lf_link_app_2_title;?>简介</h3>
						<?php echo $lf_link_app_2_content ;?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<script>
$(function(){
var mySwiperIntergration = new Swiper ('#intergration_usage_swiper', {
	loop: true,
	//initialSlide: 1,
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
				$myApps = [];
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
							'value' => $lf_link_app_1
						),
						array(
							'key' => 'lf_link_app_2',
							'value' => $lf_link_app_1
						),
						array(
							'key' => 'lf_link_app_1',
							'value' => $lf_link_app_2
						),
						array(
							'key' => 'lf_link_app_2',
							'value' => $lf_link_app_2
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

					$obj_lf_link_app_1 = get_post_meta( $post->ID, 'lf_link_app_1', true );
					$obj_lf_link_app_2 =  get_post_meta( $post->ID, 'lf_link_app_2', true );

					if($post->ID==$lf_app_id ){//跳过本链接
						continue;
					}
					if($obj_lf_link_app_1==$obj_lf_link_app_2){//两个app相同
						continue;
					}

					if($obj_lf_link_app_1 == $lf_link_app_1 || $obj_lf_link_app_1 == $lf_link_app_2){
						$lf_link_app_item_icn = get_post_meta( $obj_lf_link_app_2, 'lf_app_icon', true );
						$lf_link_app_item_color = get_post_meta( $obj_lf_link_app_2, 'lf_app_color', true );
						$lf_link_app_item_name = get_the_title( $obj_lf_link_app_2);
						$lf_link_app_item_link = get_the_permalink( $obj_lf_link_app_2);
					}else if($obj_lf_link_app_2 == $lf_link_app_1 || $obj_lf_link_app_2 == $lf_link_app_2){
						$lf_link_app_item_icn = get_post_meta( $obj_lf_link_app_1, 'lf_app_icon', true );
						$lf_link_app_item_color = get_post_meta( $obj_lf_link_app_1, 'lf_app_color', true );
						$lf_link_app_item_name = get_the_title( $obj_lf_link_app_1);
						$lf_link_app_item_link = get_the_permalink( $obj_lf_link_app_1);
					}

					if(!in_array($lf_link_app_item_link, $myApps)){
						array_push($myApps, $lf_link_app_item_link);
					}else{
						continue;
					}
				?>
				
					<li class="lf_app_list_item">
						<a href="<?php echo $lf_link_app_item_link;?>" class="lf_app_list_link">
							<div class="lf_link-icon-1 lf_link-icon" style="background-color:<?php echo $lf_link_app_item_color;?>"><img src="<?php echo $lf_link_app_item_icn;?>" class="icn" /></div>
							<?php echo $lf_link_app_item_name; ?>
							<?php //echo $post->ID;?>
						</a>
					</li>

				<?php
				}
				wp_reset_postdata();
				?>
				</ul>
	</div><!-- #main -->
<?php endwhile; // end of the loop. ?>
<div id="home_content">
<div id="p-contact" class="p-linesection">
	<h2><?php _e( "Linkflow还能为您做什么？", 'linkflow' ); ?></h2>
	<a target="_blank" href="mailto:success@linkflowtech.com" class="button2" title="<?php _e( "联系我们", 'linkflow' ); ?>"><?php _e( "联系我们", 'linkflow' ); ?></a>
	<a href="<?php echo esc_url( home_url( '/demo' ) ); ?>" class="button2 button-white" title="<?php _e( "免费试用", 'linkflow' ); ?>"><?php _e( "免费试用LINKFLOW", 'linkflow' ); ?></a>
</div>
</div>
<?php get_footer(); ?>