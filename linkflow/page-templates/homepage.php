<?php
/**
 * Template Name: Homepage
 *
 */
wp_register_script( 'stellar', get_template_directory_uri().'/js/jquery.stellar.min.js' , '', '', false);
wp_enqueue_script( 'stellar');

get_header(); ?>
<!-- <div style="overflow:hidden; width:0; height:0;">
	<img src="<?php echo get_template_directory_uri(); ?>
	/images/icon.png" width="200" height="200" alt="LINKFLOW" />
</div> -->
<div id="home_header" data-stellar-background-ratio="0.5">
	<div class="site-content entry-content wrapper">
		
		<div id="home-line-1" class="home-line-header">Linkflow 连接云</div>
		<div id="home-line-2" class="home-line-header">所见即所得的客户数据平台</div>
		<div id="home-line-3" class="home-line-header">只需一个小时，组合最适合您的运营工具箱</div>
		<div id="home-line-4" class="home-line-header">
			<a href="<?php echo esc_url( home_url( '/demo' ) ); ?>" class="">即刻体验 <i class="homepage-arraw"></i></a>
		</div>
	</div>
</div>
<script>
$(function(){
	if($(window).width()>=1200){
		$('#home_header').stellar();
		$.stellar({
			horizontalOffset: 80,
			verticalOffset: 0

		});
	}
});
</script>

<div id="primary">
<div id="home_content" role="main">
	<div id="p-identify" class="p-linesection" >
		<div class="site-content entry-content wrapper">
			<h2>Linkflow是为运营人员打造的<br/>所见即所得的“客户数据平台(CDP)”</h2>
			<h3>让不懂代码的您瞬间拥有编程能力</h3>
			<div class="p-identify-wrap">
				<div class="p-identify-item">
					<img src="<?php echo get_template_directory_uri(); ?>/images/homepage-icon1.svg" class="icon-identify" />
					<h3>对接上百种常用营销工具</h3>
					<p>无须任何编程能力，<br/>
					即可连接上百种云端系统<br/>
					和客户触点。<br/>
					开盒即用，所见即所得。<br/>
					<span>构建最适合您的营销工具栈</span></p>
				</div>
				<div class="p-identify-item">
					<img src="<?php echo get_template_directory_uri(); ?>/images/homepage-icon2.svg" class="icon-identify" />
					<h3>个性化客户体验</h3>
					<p>预先设置客户旅程，<br/>
					判断条件，<br/>
					自动化进行全程无忧。<br/><br/>
					<span>自动跟进，提升客户体验！</span></p>
				</div>
				<div class="p-identify-item">
					<img src="<?php echo get_template_directory_uri(); ?>/images/homepage-icon3.svg" class="icon-identify" />
					<h3>客户全景画像</h3>
					<p>连接整合跨平台数据，<br/>
					及时洞察客情，<br/>
					分析整合两不误。<br/><br/>
					<span>了解客户，洞察先机！</span></p>
				</div>
				<div class="p-identify-item">
					<img src="<?php echo get_template_directory_uri(); ?>/images/homepage-icon4.svg" class="icon-identify" />
					<h3>统一用户生命周期洞察</h3>
					<p>从各个客户触点收集数据，<br/>
					清洗数据，<br/>
					并传送到您的大数据工具。<br/><br/>
					<span>让您的大数据工具活起来！</span></p>
				</div>
			</div>

			<a href="https://www.linkflowtech.com/demo" class="button3 button-large">了解更多信息</a>
		</div>

	</div>

	<div id="p-dataflow" class="p-linesection">
		<div class="site-content entry-content wrapper">
			<h2>一个平台，50+数据源</h2>
			<h3>无须开发，从各类客户触点取得数据<br/>并让这些数据自由流动到最有价值的地方去</h3>
			<div id="dataflow-canvas">
				<div id="dataflow-desc-1" class="dataflow-desc">
					<strong>数据采集</strong><br/>
					Linkflow与大量的SaaS工具与数据源完成预链接，只需要简单配置即可将数据导入Linkflow
				</div>
				<ul id="dataflow-canvas-top">
					<li><i class="dataflow-icon dataflow-icon-1"></i>微信</li>
					<li><i class="dataflow-icon dataflow-icon-2"></i>网站</li>
					<li><i class="dataflow-icon dataflow-icon-3"></i>私有化系统</li>
					<li><i class="dataflow-icon dataflow-icon-4"></i>云端工具</li>
				</ul>
				<div id="dataflow-canvas-bg">
					<div id="dataflow-canvas-logo"></div>
					<img src="<?php echo get_template_directory_uri(); ?>/images/dataflow-bg.svg" />
				</div>
				<ul id="dataflow-canvas-bottom">
					<li><span class="dataflow-icon-bg"><i class="dataflow-icon dataflow-icon-5"></i></span>短信、邮件</li>
					<li><span class="dataflow-icon-bg"><i class="dataflow-icon dataflow-icon-6"></i></span>CRM</li>
					<li><span class="dataflow-icon-bg"><i class="dataflow-icon dataflow-icon-7"></i></span>客服</li>
					<li><span class="dataflow-icon-bg"><i class="dataflow-icon dataflow-icon-8"></i></span>标签系统</li>
					<li><span class="dataflow-icon-bg"><i class="dataflow-icon dataflow-icon-9"></i></span>大数据分析</li>
				</ul>
				
				<div id="dataflow-desc-2" class="dataflow-desc">
					<strong>数据传输</strong><br/>
					通过Linkflow，可以将数据标准化，并且传输到各类目的地系统
				</div>
			</div>
		</div>
	</div>

	<div id="p-progress" class="p-linesection">
		<div class="site-content entry-content wrapper">
			<h2>几个点击，搭建运营场景</h2>
			<h3>所见即所得，提升客户体验</h3>
			<ul class="progress">
				<li class="current" data-index="1">获客</li>
				<li class="arrow"><i class="fa fa-angle-right"></i></li>
				<li data-index="2">培育</li>
				<li class="arrow"><i class="fa fa-angle-right"></i></li>
				<li data-index="3">成长</li>
			</ul>
			<div class="progress-cont-out">
				<div id="progress-cont1" class="progress-cont current">
					<h2><?php _e( "自动获取客户与收入", 'linkflow' ); ?></h2>
					<h3><?php _e( "打通线上线下营销工具，自动捕获销售线索并构建独特的购买体验", 'linkflow' ); ?><br/>
						<?php _e( "同时将数据转回后台CRM或者分析系统", 'linkflow' ); ?></h3>
				</div>
				<div id="progress-cont2" class="progress-cont">
					<h2><?php _e( "培育潜在客户群体", 'linkflow' ); ?></h2>
					<h3><?php _e( "80%的客户暂时尚未决定购买怎么办？", 'linkflow' ); ?><br/>
						<?php _e( "通过自动化手段培育他们的兴趣，赢得他们的信任，并最终形成购买", 'linkflow' ); ?></h3>
				</div>
				<div id="progress-cont3" class="progress-cont">
					<h2><?php _e( "帮助客户成功，预防客户流失", 'linkflow' ); ?></h2>
					<h3><?php _e( "及时获取客户的反馈，提高客户满意度，预防客户流失", 'linkflow' ); ?><br/>
						<?php _e( "让客户成为粉丝，为您带来新的商机", 'linkflow' ); ?></h3>
				</div>
				<div class="progress-cont-place"></div>
			</div>
		</div>
		<div id="progress-timeline-countainer">
			<div id="progress-head"></div>
			<div id="progress-bg"></div>
			<div id="progress-timeline"></div>
		</div>
	</div>
<script>
$(function(){
	$(".progress-cont-place").height( $("#progress-cont3").height() );
	$(".progress li").on("click",function(){
		var progressPos=[ 0 , 1760 , 2500 , 3520 ];
		var progressHeadPos=[ 183 , 163 , 123 , 62 ];
		$(".progress li").removeClass("current");
		
		$(this).addClass("current");
		var protressIndex=$(this).data("index");
		//console.log(protressIndex);

		$(".progress-cont").removeClass("current");
		$("#progress-cont"+protressIndex).addClass("current");

		headPos = $("#progress-timeline").width()/2 - progressPos[protressIndex];
		//console.log(progressHeadPos);
		$("#progress-timeline").css("background-position", headPos+"px 0" );
		$("#progress-head").css("top", progressHeadPos[protressIndex]+"px" );

		$("#progress-bg").css("top", (progressHeadPos[protressIndex]-45)+"px" );
		$("#progress-bg").css("background-image", "url(<?php echo get_template_directory_uri(); ?>/images/progress-animBg"+protressIndex+".png)" );
	});


	addEvent(window,"scroll",function(){
		if (isInView( document.getElementById("progress-timeline") ) ){
			$(".progress li.current").click();
		}
		
	});
	

});

</script>
	<div id="p-market" class="p-linesection">
		<div class="site-content entry-content wrapper">
				<div id="p-market-img">
					<img src="<?php echo get_template_directory_uri(); ?>/images/home-feature.png" />
				</div>
				<div id="p-market-txt">
					<h2><?php _e( "客户全景画像", 'linkflow' ); ?></h2>
					<h3><?php _e( "无需编程，通过内、外部数据结合和大数据技术，获得更多客户行为数据，构建客户画像", 'linkflow' ); ?></h3>
				</div>
		</div>
	</div>
	<div id="p-market-2"  class="p-linesection">
		<div class="site-content entry-content wrapper">
				<div id="p-market-txt-2">
					<h2><?php _e( "统一用户生命周期洞察", 'linkflow' ); ?></h2>
					<h3><?php _e( "在客户画像的基础上，构建更加高级、更加完善的分析功能。对客户深入理解，洞悉先机", 'linkflow' ); ?></h3>
				</div>
				<div id="p-market-txt-3">
					<ul class="timeline">
						<li><i class="fa fa-wpforms"></i>
							<div class="timeline-inner">
								<span><span class="user">韦小宝</span>提交了申请演示的表单</span>
								<time>1分钟前</time>
							</div>
						</li>
						<li><i class="fa fa-envelope-o"></i>
							<div class="timeline-inner">
								<span><span class="user">墨子</span>点击了邮件培育旅程中的第二封邮件</span>
								<time>3分钟前</time>
							</div>
						</li>
						<li><i class="fa fa-television"></i>
							<div class="timeline-inner">
								<span><span class="user">貂蝉</span>访问了双十一特价化妆品会场</span>
								<time>10分钟前</time>
							</div>
						</li>
						<li><i class="fa fa-calendar-check-o"></i>
							<div class="timeline-inner">
								<span><span class="user">牛顿</span>成为了CRM系统中的一个销售线索</span>
								<time>1小时前</time>
							</div>
						</li>
						<li><i class="fa fa-comments"></i>
							<div class="timeline-inner">
								<span><span class="user">哥伦布</span>关注了微信号</span>
								<time>2小时前</time>
							</div>
						</li>
					</ul>
				</div>
		</div>
	</div>

	<div id="p-feature" class="p-linesection">
		<div class="site-content entry-content wrapper">
			<!-- <h5>我们在做什么</h5>
			<h2>连接您的数字工具，并自动化工作流</h2> -->
			<div class="mosaic">
				<!-- <div class="mosaic-item mosaic-item-2" id="feature-item-1">
					<img src="<?php echo get_template_directory_uri(); ?>/images/home-feature-1.jpg" class="mosaic-img-full" />
				</div>
				<div class="mosaic-item mosaic-item-1 white" id="feature-item-2">
					<div class="table"><div class="cell">
						<h5>商务合作</h5>
						<h3>合作伙伴募集中</h3>
						<p>如果您是系统集成商、代运营、SaaS开发者请联系我们。</p>
						<a href="mailto:hello@linkflowtech.com">联系我们</a>
					</div></div>
				</div> -->
				<div class="mosaic-item mosaic-item-1" id="feature-item-3">
					<div class="table"><div class="cell">
						<h3><span>通过Linkflow</span>
						<span>可以灵活构建</span>
						<span>各种场景和解决方案</span></h3>
					</div></div>
				</div>
				<div class="mosaic-item mosaic-item-1 white" id="feature-item-4">
					<div class="table"><div class="cell">
						<h5>互联网公司运营</h5>
						<h3>客户路径分析</h3>
						<p>轻松分析客户在APP、网站、微信上的行为轨迹，并且洞察其中的规律。用数据驱动增长！</p>
						<a href="<?php echo esc_url( home_url( '/demo' ) ); ?>" class="">了解更多</a>
					</div></div>
				</div>
				<div class="mosaic-item mosaic-item-1" id="feature-item-5">
					<div class="table"><div class="cell">
						<img src="<?php echo get_template_directory_uri(); ?>/images/home-feature-3.png"/>
						<p>数据从收集到分析的完整解决方案</p>
					</div></div>
				</div>
				<div class="mosaic-item mosaic-item-1 white" id="feature-item-6">
					<div class="table"><div class="cell">
						<h5>B2B公司市场部门</h5>
						<h3>提升销售线索转化率</h3>
						<p>管理好各类微信渠道与工具，并且让微信客户数据轻松与多种CRM链接。将粉丝转化为实实在在的商机！</p>
						<a href="<?php echo esc_url( home_url( '/demo' ) ); ?>" class="">了解更多</a>
					</div></div>
				</div>
				<div class="mosaic-item mosaic-item-1" id="feature-item-7">
					<div class="table"><div class="cell">
						<img src="<?php echo get_template_directory_uri(); ?>/images/home-feature-4.png"/>
						<p>最好的开放性：快速接入各种SaaS与私有化系统</p>
					</div></div>
				</div>
				<div class="mosaic-item mosaic-item-1 white" id="feature-item-8">
					<div class="table"><div class="cell">
						<h5>新零售</h5>
						<h3>全渠道数据整合</h3>
						<p>整合各个渠道的订单数据与行为数据，与大数据系统结合，提供最多的分析维度。构建360度全景客户画像。</p>
						<a href="<?php echo esc_url( home_url( '/demo' ) ); ?>" class="">了解更多</a>
					</div></div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(function(){
			$(".mosaic-item-1").height( $(".mosaic-item-1").width() );
			$(window).on("scroll",function(){
				$(".mosaic-item-1").height( $(".mosaic-item-1").width() );
			});
		});
	</script>

	
	<!-- <div id="p-client">
		<div class="site-content entry-content wrapper">
			<h1><?php _e( "众多企业正在提供个性化客户体验", 'linkflow' ); ?></h1>
			<h3><?php _e( "客户来自SaaS、金融、互联网、B2B、教育、零售等行业", 'linkflow' ); ?></h3>
			<ul>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-sap.png" /></li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-microsoft.png" /></li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-chinatelecom.png" /></li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-shujutang.png" /></li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-spearhead.png" /></li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-tcl.png" /></li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-10000dt.png" /></li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-age.png" /></li>
			</ul>
		</div>
	</div> -->
	<!-- <div id="p-contact" class="p-linesection">
		<h2><?php _e( "构建客户旅程，提升用户体验", 'linkflow' ); ?></h2>
		<a href="<?php echo esc_url( home_url( '/demo' ) ); ?>" class="button2" id="contact_b1" title="<?php _e( "免费试用LINKFLOW", 'linkflow' ); ?>"><?php _e( "免费试用LINKFLOW", 'linkflow' ); ?></a>
	</div> -->

	<?php //while ( have_posts() ) : the_post(); ?>
	<?php //get_template_part( 'content', 'page' ); ?>
	<?php //endwhile; // end of the loop. ?>
	</div><!-- #home_content -->
</div><!-- #primary -->

<?php get_footer(); ?>