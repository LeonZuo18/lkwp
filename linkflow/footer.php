<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<footer id="colophon" role="contentinfo">
		<div class="site-content footer-top ">
			<div class="col-raw">
				<div class="col-n col-2 foot-list-container">
					<h3>关于我们</h3>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-about', 'menu_class' => 'foot-list', 'container'=>'' ) ); ?>
				</div>
				<div class="col-n col-2 foot-list-container">
					<h3>精选场景</h3>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-scenes', 'menu_class' => 'foot-list', 'container'=>'' ) ); ?>
				</div>
				<div class="col-n col-5 foot-list-container">
					<h3>媒体报道</h3>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-reports', 'menu_class' => 'foot-list', 'container'=>'','before'=>'- ' ) ); ?>
				</div>
				<div class="col-n col-3 foot-apps-container">
					<div class="foot-apps">
						<a href="http://author.baidu.com/home/1598954119912194" class="foot-app foot-app-baidu" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/apps/app-baidu.png" /></a>
						<a href="https://weibo.com/u/6534839824" class="foot-app foot-app-weibo" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/apps/app-weibo.png" /></a>
						<a href="###" class="foot-app foot-app-wechat"><img src="<?php echo get_template_directory_uri(); ?>/images/apps/app-wechat.png" /></a>
						<a href="https://www.toutiao.com/c/user/104810047697/#mid=1613836152146952" class="foot-app foot-app-toutiao" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/apps/app-toutiao.png" /></a>
					</div>
					<h2>构建客户旅程，提升用户体验</h2>
					<a href="/demo" class="button3" title="免费试用Linkflow">免费试用Linkflow</a>
				</div>
			</div>
		</div>
		<?php if(is_page_template( 'page-templates/homepage.php' ) ){ ?>
		<div class="site-content footer-middle ">
			友情链接: <?php wp_nav_menu( array( 'theme_location' => 'footer-links', 'menu_class' => 'foot-links', 'container'=>'' ) ); ?>
		</div>
		<?php } ?>
		<div class="site-content footer-footer">
			<div id="footer-left">
				<img src="<?php echo get_template_directory_uri(); ?>/images/LFlogo.svg" class="footer-logo" />
			</div>
			<div id="footer-right">
				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'foot-menu', 'container'=>'' ) ); ?>					
				版权所有 &copy; <?php echo date('Y'); ?> <?php _e( "上海源犀信息科技有限公司", 'linkflow' ); ?> &nbsp; <br/>
				<a href="http://www.miitbeian.gov.cn/">沪ICP备17014327号</a>

			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
//GA

//Baidu

</script>
<!-- Start of KF5 supportbox script -->
<!-- <script type="text/javascript">
	document.write('<script src="\/\/assets-cdn.kf5.com\/supportbox\/main.js?' + (new Date).getDay() + '" id="kf5-provide-supportBox" kf5-domain="linkflow.kf5.com" charset="utf-8"><\/script>');
</script> -->
<!-- End of KF5 supportbox script -->
<?php require( get_template_directory() . '/inc/qr.php' ); ?>

<script>
(function(a,h,c,b,f,g){a["UdeskApiObject"]=f;a[f]=a[f]||function(){(a[f].d=a[f].d||[]).push(arguments)};g=h.createElement(c);g.async=1;g.charset="utf-8";g.src=b;c=h.getElementsByTagName(c)[0];c.parentNode.insertBefore(g,c)})(window,document,"script","https://assets-cli.udesk.cn/im_client/js/udeskApi.js","ud");
ud({
    "code": "2j49bee3",
    "link": "https://linkflow.udesk.cn/im_client/?web_plugin_id=56385"
});
</script>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?909fb34cb4c66f12c2f6f237d4840f49";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-2683743-39"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-2683743-39');
</script>
</body>
</html>