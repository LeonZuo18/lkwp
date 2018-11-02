<?php
/**
 * Template Name: Page - Scenes
 *
 */

get_header(); ?>

	<div id="inner_header" class="inner_header inner_scenes inner_header_big" data-stellar-background-ratio="0.5">
		<div id="inner_title">
			<span class="linebreak">像搭积木一样，</span><span class="linebreak">灵活构建各种客户场景</span><br/>
			<span class="linebreak">Linkflow帮您集中精力在客户需求，</span><span class="linebreak">而不是无意义的编程上。</span>
		</div>

	</div>

<div id="primary">
<div id="home_content" role="main">
	<div id="p-scenes-1" class="p-linesection">
		<div class="site-content entry-content wrapper">
			<ul class="list-scenes">
				<li><a href="<?php echo esc_url( home_url( '/scenes/ad-tracker' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/scenes/scenes-1.png" class="list-scenes-icon"><h3>广告追踪</h3></a></li>
				<li><a href="<?php echo esc_url( home_url( '/scenes/flow-conversion' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/scenes/scenes-2.png" class="list-scenes-icon"><h3>流量转化</h3></a></li>
				<li><a href="<?php echo esc_url( home_url( '/scenes/customer-care' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/scenes/scenes-3.png" class="list-scenes-icon"><h3>客户关怀</h3></a></li>
				<li><a href="<?php echo esc_url( home_url( '/scenes/conference-marketing' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/scenes/scenes-4.png" class="list-scenes-icon"><h3>会议营销</h3></a></li>
				<li><a href="<?php echo esc_url( home_url( '/scenes/ecommerce' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/scenes/scenes-5.png" class="list-scenes-icon"><h3>电商运营</h3></a></li>
				<li><a href="<?php echo esc_url( home_url( '/scenes/report-analysis' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/scenes/scenes-6.png" class="list-scenes-icon"><h3>报表分析</h3></a></li>
			</ul>
		</div>
	</div>

	<div id="p-scenes-2" class="p-linesection">
		<div class="site-content entry-content wrapper">
			<h2>合作伙伴火热招募中</h2>
			<h3>您还在等什么？</h3>

			<div class="mosaic" id="mosaic-scenes">
				<div class="mosaic-item mosaic-item-50 white" id="">
					<div class="table"><div class="cell">
						<h5>商务合作</h5>
						<h3>Linkflow助您拥有自己的营销云</h3>
						<p>如果您是Agency，代运营，系统集成商，<br/>
							而且不想再卖别人的产品了<br/>
							Linkflow可以帮到你</p>
						<a href="mailto:success@linkflowtech.com" class="">联系我们</a>
					</div></div>
				</div>
				<div class="mosaic-item mosaic-item-50 white" id="mosaic-chuanshen">
					<div class="table"><div class="cell">
						<h3>传声营销云</h3>
						<p>Linkflow的 连接能力赋予了我们定制B2B企业的 专属解决方案的可能性，在Linkflow的基础上， 我们推出了”传声营销云‘’系统，从此只需要专注于为客户提供增值服务，而不需要担心底层数据的连接了。</p>
						<p>Jacky 成俊杰<br/>
						传声网CEO</p>
					</div></div>
				</div>

			</div>
			<script>
			$(function(){
				if($(window).width()>=1024)
					$(".mosaic-item-50").height( $(".mosaic-item-50").width()/1.5 );
				$(window).on("scroll",function(){
					if($(window).width()>=1024)
						$(".mosaic-item-50").height( $(".mosaic-item-50").width()/1.5 );
				});
			});
		</script>

		</div>
	</div>

</div>
</div>

<?php get_footer(); ?>
