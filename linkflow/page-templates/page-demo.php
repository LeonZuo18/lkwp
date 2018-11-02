<?php
/**
 * Template Name: Page - Demo
 *
 */

get_header(); ?>

	<div id="inner_header" class="inner_demo inner_header header_position" data-stellar-background-ratio="0.5">
		<div id="inner_title">即刻了解Linkflow</div>
    <div id="inner_title2"><span><?php //_e( "DM Hub让管理营销活动变得容易", 'linkflow' ); ?></span> <span></span><?php //_e( "让营销变得简单", 'linkflow' ); ?></div>
	</div>

	<div id="main" class="site-content wrapper main-demo">
		<div id="primary" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="entry-content">
				<div class="form-container">
					<?php the_content(); ?>
				</div>
			</div>
			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
			<?php endwhile; // end of the loop. ?>
		</div><!-- #primary -->
	</div><!-- #main -->
<script>

$(function(){
	//$("#gform_2").on("submit",function(){
	$("#gform_submit_button_2").on("click",function(){

		if (window.LFAPP) {
		    /**
		     * 匿名用户与实际用户关联
		     * window.LFAPP.identify(data: Object, success: Function, failure: Function);
		     *
		     * @param data[Object]
		     *        data.externalId[String] 必填参数，可以是客户方用户的唯一标志（手机号邮箱等等）
		     *        data.email[String] 选填参数，系统创建用户的时候设置的邮箱字段
		     *        data.phone[String] 选填参数，系统创建用户的时候设置的手机号字段
		     *        data.name[String] 选填参数，系统创建用户的时候设置的用户名字段
		     * @param success[Function] 成功回调
		     * @param failure[Function] 失败回调
		     */
		    var username = $('#input_2_1').val();
		    var userphone = $('#input_2_2').val();
		    var useremail = $('#input_2_7').val();
                    var usercompany = $('#input_2_3').val();

		    window.LFAPP.identify(
		      {
		        externalId: userphone,
		        name: username,
		        phone: userphone,
		        email: useremail,
                        company: usercompany
		      },
		      function() {
		        /**
		         * 创建事件，需要在系统内手动创建自定义事件
		         * http://app.linkflowtech.com/setting/customize/ude
		         *
		         * window.LFAPP.onEvent(data: Object, success: Function, failure: Function);
		         *
		         * @param data[Object]
		         *        data.event[String] 必填参数，手动创建的自定义事件的事件编码
		         *        data.attr1[String] 选填参数，手动创建的自定义事件的扩展属性1
		         *        data.attr2[String] 选填参数，手动创建的自定义事件的扩展属性2
		         *        data.attr3[String] 选填参数，手动创建的自定义事件的扩展属性3
		         *        data.attr4[String] 选填参数，手动创建的自定义事件的扩展属性4
		         *        data.attr5[String] 选填参数，手动创建的自定义事件的扩展属性5
		         * @param success [Function] 成功回调
		         * @param failure [Function] 失败回调
		         */
		        window.LFAPP.onEvent(
		          {
		            event: 'UDE_9WHCPBRJX',
		            attr1: username,
		            attr2: userphone,
		            attr3: useremail,
		            attr4: location.href,
                            attr5: usercompany
		          },
		          function(resp) {
		            //window.location.href = './index.html';
		          }
		        );
		      },
		      function() {
		        //window.location.href = './index.html';
		      }
		    );
		  }

	});

});

</script>
<?php get_footer(); ?>
