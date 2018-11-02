<?php
/**
 * Template Name: Page - Pricing - 申请
 *
 */
get_header(); ?>

<div id="inner_header" class="inner_pricing"></div>
<div id="primary">
	<div id="p-pricing-1" class="p-linesection">
		<div class="site-content entry-content wrapper">
			<div class="form-container" id="pricing-form-1">
				<?php if( empty( $_GET["sp1id"]) ){ ?>
					<!-- <p>请填写以下必要资料，我们的客户运营专家会很快来联系您</p> -->
				<?php 
					gravity_form( 3, false, true, false, '', false);
				}else{?>
					<!-- <p>请进一步填写信息，以便我们的销售人员核对</p> -->
				<?php
					gravity_form( 4, false, true, false, '', false);
					$entryId = (int)$_GET["sp1id"];
					$entry = GFAPI::get_entry( $entryId );
					$apply_user_name = rgar( $entry, '1' );
					$apply_user_tel = rgar( $entry, '2' );
					$apply_user_apps = rgar( $entry, '7' );
					$apply_user_MAU = rgar( $entry, '8' );

					$apply_user_info = $apply_user_name." | ".$apply_user_tel." | ".$apply_user_apps." | MAU:".$apply_user_MAU;
				?>
					<script>$("#input_4_6").val("<?php echo $apply_user_info; ?>");</script>
				<?php }
				?>

			</div>

		</div>
	</div>

</div>

<script>
$(function(){
	$(".pricing-app-box .lf_app_list_item").on("click",function(){
		$(this).hasClass("checked")?$(this).removeClass("checked"):$(this).addClass("checked");
		var appname=[];
		$(".pricing-app-box .lf_app_list_item.checked").each(function(){
			appname.push($(this).data("appname"));
		});
		//console.log(appname);
		$("#input_3_7").val(appname);
	});
});
</script>
<?php get_footer(); ?>
