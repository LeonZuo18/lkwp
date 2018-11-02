<style>
#blackBg{
	position: fixed;
	top:0;
	left:0;
	width:100%;
	height:100vh;
	z-index: -1;
	background-color: #000;
	background-color: rgba(0,0,0,0.8);
	
	background-position: center center;
	background-repeat: no-repeat;
	-webkit-opacity: 0;
	opacity: 0;
	-webkit-transition:all 0.3s;
	transition:all 0.3s;
	
	text-align: center;
	font-size: 16px;
	color: #fff;
	-webkit-text-shadow:1px 1px 1px #000;
	text-shadow:1px 1px 1px #000;
}
#blackBg.shown{
	z-index: 99;
	opacity: 1;
}
#blackBg h3{
	margin-top: 160px;
	font-size: 21px;
	font-size: 1.5rem;
	margin-bottom: 21px;
	margin-bottom: 1.5rem;
	-webkit-transition:all 0.3s;
	transition:all 0.3s;
}
#blackBg.shown h3{
	margin-top: 140px;
}
#blackBg img{
	margin-top: 21px;
	margin-top: 1.5rem;
	width:360px;
	height:auto;
	max-width: 90%;

}
</style>
<div id="blackBg">
	<h3>申请联否Linkflow账号</h3>
	<p>扫描下方二维码，关注Linkflow公众号，申请试用</p>
	<img src="<?php echo get_template_directory_uri(); ?>/images/qr-wx.jpg" />
</div>
<script>
$(function(){
	function qrPopup(){
		if ( $("#blackBg").hasClass("shown") )
			$("#blackBg").removeClass("shown");
		else
			$("#blackBg").addClass("shown");


	}
	$("#blackBg").on("click", function(){
			qrPopup()
	});
	$(".qrPopup").on("click", function(){
			qrPopup()
	});
});
</script>