<?php
/**
 * Template Name: Homepage - dark
 *
 */
wp_register_script( 'stellar', get_template_directory_uri().'/js/jquery.stellar.min.js' , '', '', false);
wp_enqueue_script( 'stellar');

get_header(); ?>
<!-- <div style="overflow:hidden; width:0; height:0;">
	<img src="<?php echo get_template_directory_uri(); ?>
	/images/icon.png" width="200" height="200" alt="NAZAIO" />
</div> -->
<div id="home_header" data-stellar-background-ratio="0.5">
	
	<div id="home_slogan1">
		<span><?php _e( "无编程", 'linkflow' ); ?></span>
	</div>
	<div id="home_slogan2">
		<span><?php _e( "客户旅程管理平台", 'linkflow' ); ?></span>
	</div>
	<div id="home_slogan3"><?php _e( "个性化客户体验，", 'linkflow' ); ?>
		<span id="rotate-txt">
			<?php _e( "提升", 'linkflow' ); ?><span id="rotate-txt1"><?php _e( "客户满意度", 'linkflow' ); ?></span>
			<span id="rotate-txt2"><?php _e( "客户留存率", 'linkflow' ); ?></span>
		</span>
	</div>

	<div id="home_header_b">
		<!-- <a target="_blank" href="https://www.wenjuan.com/s/r63aAr/" id="home_header_b1" class="button2"><?php _e( "开始提升", 'linkflow' ); ?></a> -->
		<a href="###" id="home_header_b1" class="button2"><?php _e( "开始提升", 'linkflow' ); ?></a>
	</div>
	<!-- <div id="home_header_icons">
		<div id="home_header_icon1" class="home_header_icon"><?php //_e( "发掘", 'linkflow' ); ?></div>
		<span class="dot"></span>
		<span class="dot"></span>
		<span class="dot"></span>
		<div id="home_header_icon2" class="home_header_icon"><?php //_e( "转化", 'linkflow' ); ?></div>
		<span class="dot"></span>
		<span class="dot"></span>
		<span class="dot"></span>
		<div id="home_header_icon3" class="home_header_icon"><?php //_e( "连接", 'linkflow' ); ?></div>
	</div> -->

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

	var rotateTxtHeight = $("#rotate-txt").height();
	var rotateTxtCont1 = $("#rotate-txt1");
	var rotateTxtCont2 = $("#rotate-txt2");
	var rotateTxt = [
		"<?php _e( "客户满意度", 'linkflow' ); ?>",
		"<?php _e( "客户留存率", 'linkflow' ); ?>",
		"<?php _e( "平均利润率", 'linkflow' ); ?>",
		"<?php _e( "客户转化率", 'linkflow' ); ?>",
		"<?php _e( "响应速度", 'linkflow' ); ?>",
		"<?php _e( "服务规范性", 'linkflow' ); ?>",
		"<?php _e( "平均客单价", 'linkflow' ); ?>",
		"<?php _e( "销售效率", 'linkflow' ); ?>"
		];

	var rotateTxtCurrent = 0;
	var rotateTxtChange = setInterval(function(){
			rotateTxtCont1.css("transition-duration","0.5s");
			rotateTxtCont2.css("transition-duration","0.5s");

			rotateTxtCont1.text(rotateTxt[ rotateTxtCurrent ]);
			if(rotateTxtCurrent == rotateTxt.length-1){
				rotateTxtCont2.text(rotateTxt[0]);
				rotateTxtCurrent=0;
			}else{
				rotateTxtCont2.text(rotateTxt[ rotateTxtCurrent + 1 ] );
				rotateTxtCurrent++;
			}
			rotateTxtCont1.css("top","-38px");
			rotateTxtCont2.css("top","0");
			setTimeout(function(){
				rotateTxtCont1.css("transition-duration","0s");
				rotateTxtCont2.css("transition-duration","0s");
				rotateTxtCont1.text( rotateTxtCont2.text() );
				rotateTxtCont1.css("top","0");
				rotateTxtCont2.css("top","38px");
			} ,600);
	},3500);
});
</script>

<div id="primary">
<div id="home_content" role="main">
	<div id="p-progress" >
		<div class="site-content entry-content wrapper">
			<h2>个性化客户体验，大幅提升满意度</h2>
			<ul class="progress">
				<li class="current" data-index="1">获客</li>
				<li class="arrow"><i class="fa fa-angle-right"></i></li>
				<li data-index="2">激活</li>
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
		var progressHeadPos=[ 183 , 163 , 133 , 67 ];
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
	<div id="p-market" >
		<div class="site-content entry-content wrapper">
				<div id="p-market-img">
					<img src="<?php echo get_template_directory_uri(); ?>/images/home-feature.png" />
				</div>
				<div id="p-market-txt">
					<h2><?php _e( "连接不同应用，自动化客户旅程", 'linkflow' ); ?></h2>
					<h3><?php _e( "集成表单、网站和手机App，获取更丰富的客户视图并且通过客户行为触发跟进动作", 'linkflow' ); ?></h3>
				</div>
		</div>
	</div>
	<div id="p-market-2" >
		<div class="site-content entry-content wrapper">
				<div id="p-market-txt-2">
					<h2><?php _e( "客户全景画像", 'linkflow' ); ?></h2>
					<h3><?php _e( "无需编程，通过内、外部数据结合和大数据技术，获得更多客户行为数据，构建客户画像", 'linkflow' ); ?></h3>
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

	<div id="p-feature" >
		<div class="site-content entry-content wrapper">
			<h5>我们在做什么</h5>
			<h2>链接您的客户应用，并且自动化工作流</h2>
			<div class="mosaic">
				<div class="mosaic-item mosaic-item-2" id="feature-item-1">
					<img src="<?php echo get_template_directory_uri(); ?>/images/home-feature-1.jpg" class="mosaic-img-full" />
				</div>
				<div class="mosaic-item mosaic-item-1 white" id="feature-item-2">
					<div class="table"><div class="cell">
						<h5>商务合作</h5>
						<h3>合作伙伴募集中</h3>
						<p>如果您是系统集成商、代运营、SaaS开发者请联系我们。</p>
						<a href="mailtto:hello@linkflowtech.com">联系我们</a>
					</div></div>
				</div>
				<div class="mosaic-item mosaic-item-1" id="feature-item-3">
					<img src="<?php echo get_template_directory_uri(); ?>/images/home-feature-2.jpg" class="mosaic-img-full" />
				</div>
				<div class="mosaic-item mosaic-item-1 white" id="feature-item-4">
					<div class="table"><div class="cell">
						<h5>互联网公司运营</h5>
						<h3>客户路径分析</h3>
						<p>轻松分析客户在APP、网站、微信上的行为轨迹，并且洞察其中的规律。用数据驱动增长！</p>
						<a href="mailtto:hello@linkflowtech.com">了解更多</a>
					</div></div>
				</div>
				<div class="mosaic-item mosaic-item-1" id="feature-item-5">
					<div class="table"><div class="cell">
						<img src="<?php echo get_template_directory_uri(); ?>/images/home-feature-3.png"/>
						<p>数据从收集到分析的完整节约方案</p>
					</div></div>
				</div>
				<div class="mosaic-item mosaic-item-1 white" id="feature-item-6">
					<div class="table"><div class="cell">
						<h5>B2B公司市场部门</h5>
						<h3>提升销售线索转化率</h3>
						<p>管理好各类微信渠道与工具，并且让微信客户数据轻松与多种CRM链接。将粉丝转化为实实在在的商机！</p>
						<a href="mailtto:hello@linkflowtech.com">了解更多</a>
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
						<a href="mailtto:hello@linkflowtech.com">了解更多</a>
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
	<div id="p-contact">
		<h2><?php _e( "构建客户旅程，提升用户体验", 'linkflow' ); ?></h2>
		<!-- <a target="_blank" href="https://www.wenjuan.com/s/r63aAr/" class="button2" id="contact_b1" title="<?php _e( "免费试用LINKFLOW", 'linkflow' ); ?>"><?php _e( "免费试用LINKFLOW", 'linkflow' ); ?></a> -->
		<a href="###" class="button2" id="contact_b1" title="<?php _e( "免费试用LINKFLOW", 'linkflow' ); ?>"><?php _e( "免费试用LINKFLOW", 'linkflow' ); ?></a>
	</div>

	<?php //while ( have_posts() ) : the_post(); ?>
	<?php //get_template_part( 'content', 'page' ); ?>
	<?php //endwhile; // end of the loop. ?>
	</div><!-- #home_content -->
</div><!-- #primary -->

<?php get_footer(); ?>