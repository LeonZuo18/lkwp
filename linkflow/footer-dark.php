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
		<div class="site-info">
			<div class="site-content">

				<div id="footer-left">
<br/>
					<?php //_e( "地址", 'linkflow' ); ?> <?php //_e( "上海市乐山路33号1号楼605室", 'linkflow' ); ?>
					<a href="https://www.linkflowtech.com/linkflow-introduce" title="Linkflow连接云公司简介">Linkflow连接云公司简介</a>
				</div>
				<div id="footer-right">
					<?php //do_action( 'twentytwelve_credits' ); ?>
					<?php //wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'foot-menu' ) ); ?>
					&copy; <?php echo date('Y'); ?> <?php _e( "上海源犀信息科技有限公司", 'linkflow' ); ?> &nbsp; <br/>
					<a href="http://www.miitbeian.gov.cn/">沪ICP备17014327号</a>

				</div>
			</div>
		</div><!-- .site-info -->
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
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97713112-1', 'auto');
  ga('send', 'pageview');

</script>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?9184aa9617873d9271b6f8bb4f69dfbb";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</body>
</html>