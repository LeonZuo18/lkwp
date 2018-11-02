<div id="top-note" >
	<a href="###" id="top-note-close">X</a>
	<a href="http://www.1meeting.cn/activedetail/934" target="_blank"></a></div>
<?php if(is_front_page() ):?>
<script>
$(function(){
	setTimeout(function(){
		$('#top-note').addClass("stay");

		$("#top-note-close").on("click",function(){
			$('#top-note').removeClass("stay");
		})
	},2000);
	
});
</script>
<?php endif; ?>