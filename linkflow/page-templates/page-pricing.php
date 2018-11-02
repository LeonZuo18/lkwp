<?php
/**
 * Template Name: Page - Pricing
 *
 */
wp_register_script( 'dragObj-js', get_template_directory_uri().'/js/dragObj.js' , '', '', false);
wp_enqueue_script( 'dragObj-js');

get_header(); ?>

<!-- 	<div id="inner_header" class="inner_header inner_pricing" data-stellar-background-ratio="0.5">
		<div id="inner_title">
			<h2>报价</h2>
			<p><span class="linebreak"></span></p>
		</div>
	</div> -->
<div id="inner_header" class="inner_pricing"></div>
<div id="primary">
	<div id="p-pricing-1" class="p-linesection">
		<div class="site-content entry-content wrapper">
			<h2>我们遵从公平计费原则</h2>
			<p>很多软件是按照您系统的客户数量来收费的，即使那些客户是不活跃的。<br/>
				我们觉得这样做不公平。在Linkflow中，我们按照“月活跃用户数Monthly Active Users(MAU)”来计费。<br/>
				*MAU是指由Linkflow追踪的实名或者匿名用户（也可以理解为UV）。即使一个用户在Linkflow上多次产生交互，一个月我们也只记录一次，不活跃的客户绝不计费。</p>

			<div class="col-raw" id="pricing-tools">
				<div class="col-10 col-n">
					<div id="pricing-container">
						<div id="pricing-point" class="untouched"><img src="<?php echo get_template_directory_uri(); ?>/images/pricing-point-note.png" id="pricing-point-note" /></div>

						<div class="pricing-rular">
							<div class="pricing-meter pricing-meter1">10K</div>
							<div class="pricing-meter pricing-meter2">50K</div>
							<div class="pricing-meter pricing-meter3">100K</div>
							<div class="pricing-meter pricing-meter4">150K</div>
							<div class="pricing-meter pricing-meter5">200K</div>
							<div class="pricing-meter pricing-meter6">250K</div>
							<div class="pricing-meter pricing-meter7">500K</div>
							<div class="pricing-meter pricing-meter8">1M</div>
						</div>
					</div>
				</div>
				<div class="col-2 col-n">
					<div id="pricing-count-container"><input type="text" pattern="[0-9]*" name="pricing-count" id="pricing-count" placeholder="e.g.100" value=""><span>月活用户数</span></div>
				</div>
			</div>
		</div>
	</div>

	<div id="p-pricing-2" class="p-linesection">
		<div class="site-content entry-content wrapper">
			<div class="col-raw pricing-groups">
				<div class="col-3 col-n">
					<div class="pricing-group pricing-group1">
						<h3>基础版</h3>
						<p>每月赠送 10,000 MAU</p>
						<ul>
							<li>全渠道客户数据整合</li>
							<li>客户画像</li>
							<li>基础用户旅程</li>
							<li>基础的动态标签</li>
							<li>常用App</li>
							<li>邮件客服</li>
						</ul>
						<p class="price">￥<span class="num">6,800/年</span> 起</p>

						<div class="pricing-group-check"><i class="fa fa-check"></i></div>
					</div>
				</div>
				<div class="col-3 col-n">
					<div class="pricing-group pricing-group2">
						<h3>专业版</h3>
						<p>每月赠送 100,000 MAU</p>
						<ul>
							<li>基础版的所有功能</li>
							<li>分支等高级用户旅程</li>
							<li>基于事件等动态标签</li>
							<li>Premium App</li>
							<li>一键导出到数据仓库</li>
							<li>自定义的灵活报表</li>
							<li>专属客户成功经理</li>
						</ul>
						<p class="price">￥<span class="num">68,000/年</span> 起</p>

						<div class="pricing-group-check"><i class="fa fa-check"></i></div>
					</div>
				</div>
				<div class="col-3 col-n">
					<div class="pricing-group pricing-group3">
						<h3>企业版</h3>
						<p>每月赠送 250,000 MAU</p>
						<ul>
							<li>包含专业版所有功能</li>
							<li>数据源调研以及数据梳理</li>
							<li>标签体系构建与咨询</li>
							<li>IT架构咨询</li>
							<li>专属客户成功经理</li>
						</ul>
						<p class="price-contact"><a href="###" class="button3">联系销售</a></p>

						<div class="pricing-group-check"><i class="fa fa-check"></i></div>
					</div>
				</div>

				<div class="col-3 col-n">
					<div class="pricing-group pricing-group4">
						<h3>本地化部署</h3>
						<p>企业专属的客户数据平台</p>
						<ul>
							<li>确保数据安全</li>
							<li>全自动部署方案</li>
							<li>海量数据处理能力</li>
							<li>完善的运维体系</li>
							<li>丰富的部署经验</li>
						</ul>
						<p class="price-contact"><a href="###" class="button3">联系销售</a></p>

						<div class="pricing-group-check"><i class="fa fa-check"></i></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="p-pricing-3" class="p-linesection">
		<div class="site-content entry-content wrapper">
			<h2><i class="icon-leaf"></i>放心采购，我们无条件退款！</h2>
			<p>Linkflow深信，帮助客户达到业务目标，才是我们产品的成功。<br/>
			销售业绩的一时狂欢，远不及客户对产品、团队的认可。<br/>
			为了消除您开始使用产品的顾虑，放心地把业务问题交给Linkflow，即日起，购买企业版的客户，一个月内可随时退款！<br/>
			Linkflow已准备就绪，从售前到售后，从产品到服务，为您提供更好的使用体验！</p>
			<p class="pricing-signature">
				—— Linkflow 创始人<br/>
				<img src="<?php echo get_template_directory_uri(); ?>/images/signature-shengxia.png"></p>
		</div>
	</div>

	<div id="p-pricing-4" class="p-linesection">
		<div class="site-content entry-content wrapper">
			<h2>常见问题</h2>
			<div class="col-raw">
				<div class="col-n col-6">
					<p><strong>请问我如何估算我的MAU？</strong><br/>
					MAU指的是Linkflow追踪的实名或者匿名用户。一个月中即使发生多次交互，也只记录1次。<br/>
					在网页环境下，MAU往往约等于您网站或者App的UV。<br/>
					在微信环境下，一般是服务号总粉丝量的10%-20%（这个数字可能根据您粉丝的活跃度有变化）。</p>

					<p><strong>有免费试用吗？</strong><br/>
						是的。我们为所有收费版本提供14天的免费试用。如果有需求，请联系客服。</p>

					<p><strong>Linkflow是否支持按月付费？</strong><br/>
					目前不支持按月付费的方式。</p>
				</div>
				<div class="col-n col-6">
					<p><strong>报价中包含Linkflow对接系统的账号费用吗？</strong><br/>
					不包含。Linkflow的报价指的是直接使用我们产品的费用，对接的外部系统需要您自行注册使用，并前往相应平台付费。</p>

					<p><strong>使用Linkflow，我需要会写代码吗？</strong><br/>
					不需要。Linkflow帮助您在没有编程能力的情况下，可以处理日常的系统对接和数据处理问题。在整个过程中，您也许需要配置一些账户登陆信息，系统里的导引会指导您如何设置。我们也有客服人员可以回答您的问题。</p>

					
					<p><strong>现在Linkflow有哪些客户了？</strong><br/>
					Linkflow目前已经服务了上千家公司。我们的客户中不乏世界500强公司，比如雅培、安联、塞拉尼斯，也有轻轻家教、轻松筹、摩天轮票务等互联网新秀。</p>
				</div>
			</div>
		</div>
	</div>



<div id="pricing-footer">
	<div class="site-content entry-content wrapper">
		<div class="col-raw">
			<div class="col-n col-n-mb col-6 col-6-mb">
				月活跃用户数(MAU)
				<div id="pricing-count-mau"><span>0</span></div>
			</div>
			<div class="col-n col-n-mb col-4 col-6-mb">
				限时特价
				<div id="pricing-count-price"><span>0</span> 元/年</div>
			</div>
			<div class="col-n col-n-mb col-2">
				<a href="###" class="button4 pricing-submit disabled" id="pricing-submit" title="联系销售">联系销售</a>
			</div>
		</div>
	</div>
</div>

</div>
<script>
var stepsMAU=[10000,20000,30000,40000,50000,60000,70000,80000,90000,100000,110000,120000,130000,140000,150000,160000,170000,180000,190000,200000,210000,220000,230000,240000,250000];
var stepsPrice=[6800,16800,26800,36800,46800,56800,66800,68000,68000,68000,76000,84000,92000,100000,108000,116000,124000,132000,140000,148000,156000,164000,172000,180000,"-"]
var contactBtnCont = "<a href='###'/>联系销售</a>";
$(function(){
	d1=new dragObj(document.getElementById("pricing-point"), true);
	document.getElementById("colophon").style.marginBottom="150px";
});
</script>
<?php get_footer(); ?>
