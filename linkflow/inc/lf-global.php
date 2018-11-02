<?php

//Hide WP version number
function wpbeginner_remove_version() {
	return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

function more_array_unique($array){//数组去重
	$out = array();
	foreach ($array as $key=>$value) {
		if (!in_array($value, $out)){
			$out[$key] = $value;
		}
	}
	return $out;
} 

// function redirect_search() {
// 	if (is_search() && !empty($_GET['s'])) {
// 		$keywords=mb_convert_encoding( get_query_var('s'), "UTF-8", "GBK" );
// 		$keywords=urlencode( $keywords );	
// 		wp_redirect(home_url("/search/").$keywords);
// 		exit();
// 	}
// }
// add_action('template_redirect', 'redirect_search' );


//禁止wp自带的jquery
// if ( !is_admin() ) { // 后台不禁止
// 	function my_init_method() {
// 		wp_deregister_script( 'jquery' );  // 取消原有的 jquery 定义
// 	}
// 	add_action('init', 'my_init_method'); 
// }
// wp_deregister_script( 'l10n' );

if ( !is_admin() ){
	function brain1981_replace_jquery() {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_template_directory_uri().'/js/jquery.min.js' );
		wp_enqueue_script( 'jquery');
	}
	add_action( 'init', 'brain1981_replace_jquery' );
}

//编辑器增强
function add_editor_buttons($buttons) {
	//$buttons[] = 'cleanup';
	//$buttons[] = 'styleselect';
	$buttons[] = 'subscript';
	$buttons[] = 'superscript';
	$buttons[] = 'strikethrough';
	//$buttons[] = 'underline';
	$buttons[] = 'copy';
	$buttons[] = 'paste';
	$buttons[] = 'cut';
	//$buttons[] = 'undo';
	$buttons[] = 'image';
	$buttons[] = 'anchor';
	
	//$buttons[] = 'wp_page';

	$buttons[] = 'emoticons';
	//$buttons[] = 'charmap';
	return $buttons;
}
add_filter("mce_buttons_2", "add_editor_buttons");

function add_editor_buttons1($buttons) {
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'forecolor';
	$buttons[] = 'backcolor';
	return $buttons;
}
add_filter("mce_buttons", "add_editor_buttons1");

function appthemes_add_quicktags() {
?> 
<script type="text/javascript"> 
QTags.addButton( 'hr', 'hr', '<hr />', '' );
QTags.addButton( 'h2', 'h2', '<h2>', '</h2>' );
QTags.addButton( 'h3', 'h3', '<h3>', '</h3>' );
QTags.addButton( 'span', 'span', '<span>', '</span>' );
QTags.addButton( 'newsinfo', 'newsinfo', '<div class="newsinfo">', '</div>' );
</script>
<?php
}
//add_action('admin_print_footer_scripts', 'appthemes_add_quicktags' ); 
add_action('after_wp_tiny_mce', 'appthemes_add_quicktags');
//使用SSl Gavatar头像
// function get_ssl_avatar($avatar) {
//    $avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','<img src="https://secure.gravatar.com/avatar/$1?s=$2" class="avatar avatar-$2" height="$2" width="$2">',$avatar);
//    return $avatar;
// }
// add_filter('get_avatar', 'get_ssl_avatar');


//判断移动端
function is_mobile(){ 
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
    {
        return true;
    } 
    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
    { 
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    } 
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT']))
    {
        $clientkeywords = array ('nokia',
            'sony',
            'ericsson',
            'mot',
            'samsung',
            'htc',
            'sgh',
            'lg',
            'sharp',
            'sie-',
            'philips',
            'panasonic',
            'alcatel',
            'lenovo',
            'iphone',
            'ipod',
            'blackberry',
            'meizu',
            'android',
            'netfront',
            'symbian',
            'ucweb',
            'windowsce',
            'palm',
            'operamini',
            'operamobi',
            'openwave',
            'nexusone',
            'cldc',
            'midp',
            'wap',
            'mobile'
            ); 
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
        {
            return true;
        } 
    } 
    // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT']))
    { 
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
        {
            return true;
        } 
    } 
    return false;
} 

//*get the attachment thumbnail URL from image URL
function get_attachment_thumbnail_url_from_src($link) {
	global $wpdb;
	$ori_link = $link;
	$link = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $link);
	$attachmentID = $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE guid='$link'");

	$thumbnail_img = wp_get_attachment_image_src( $attachmentID, 'thumbnail');
	//wp_get_attachment_image_src() is a wordpress function that returns an array with {src, width,height}.
	if( empty($thumbnail_img[0]) ) { $thumbnail_img[0]=$ori_link; }
	return $thumbnail_img[0];
}
//*get the attachment medium URL from image URL
function get_attachment_medium_url_from_src($link) {
	global $wpdb;
	$ori_link = $link;
	$link = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $link);
	$attachmentID = $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE guid='$link'");

	$medium_img = wp_get_attachment_image_src( $attachmentID, 'medium');
	//wp_get_attachment_image_src() is a wordpress function that returns an array with {src, width,height}.
	if( empty($medium_img[0]) ) { $medium_img[0]=$ori_link; }
	return $medium_img[0];
}

function get_post_first_img() {
	global $post, $posts, $wpdb;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	//获取文章中第一张图片的路径并输出
	$first_img = $matches [1] [0];
	//如果文章无图片，获取自定义图片
	if(empty($first_img)){ //Defines a default image
		$first_img = get_template_directory_uri()."/images/default.jpg";
		//请自行设置一张default.jpg图片
	}else{
		$link = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $first_img);
		$attachmentID = $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE guid='$link'");
		$first_img = wp_get_attachment_image_src( $attachmentID, 'post-size');
		$first_img = $first_img[0];
	}
	return $first_img;
}

add_filter( 'body_class', 'custom_class', 99 );
function custom_class( $classes ) {
	if ( is_page_template( 'page-templates/homepage.php' ) || is_page_template( 'page-templates/page-pricing.php' ) || is_page_template( 'page-templates/page-pricing-apply.php' ) || get_post_type() == 'lf_app' || get_post_type() == 'lf_link' ) {
		$classes[] = 'white-top';
	}
	return $classes;
}


//add mobile format
add_filter( 'gform_phone_formats', 'brain1981_phone_format' );
function brain1981_phone_format( $phone_formats ) {
	$phone_formats['china mobile'] = array(
		'label'       => '手机号码',
		'mask'        => false,
		'regex'       => '/^1(?:3\d|4[4-9]|5[0-35-9]|6[67]|7[013-8]|8\d|9\d)\d{8}$/', //手机号码正则
		'instruction' => "11位手机号码",
	);
	return $phone_formats;
}
//midify pricing forms
add_filter( 'gform_field_content_3_6', 'brain1981_pricing_form_1', 10, 5 );
function brain1981_pricing_form_1( $content, $field, $value, $lead_id, $form_id ) {

	//避免在查询后台看到页面内容
	if ( $field->is_entry_detail_edit() ) {
		$value = esc_attr( $value );
		$name  = 'input_' . esc_attr( $field->id );
		return "<input type='hidden' name='{$name}' value='{$value}'>";
	} elseif ( $field->is_entry_detail() ) {
		return '';
	}


	$content ='<label class="gfield_label">请勾选您正在使用的app（大部分人会选3个以上哦）</label>';
	$content =$content."<div class='pricing-app-box'><ul>";
	$postInList=999;
	$myposts = get_posts( array( 
		'numberposts'=>$postInList,
		'posts_per_page'=>$postInList,
		'post_type' => 'lf_app', 
		'orderby' => 'post_time', 
		'order' => 'DESC',
		'suppress_filters' => 0
		)
	);
	$postNum=0;
	foreach( $myposts as $post ) {
		$postNum++;
		if($postNum>$postInList){break;}
		setup_postdata( $post );
		$lf_app_item_icn = get_post_meta( $post->ID, 'lf_app_icon', true );
		$lf_app_item_color =  get_post_meta( $post->ID, 'lf_app_color', true );
		$lf_app_category = "";
		$terms = get_the_terms( $post->ID , 'lf_app_category' );
		foreach ( $terms as $term ) {
			$lf_app_category = $lf_app_category." appcat-".$term->term_id;
		}
	

		$content = $content.'<li class="lf_app_list_item '.$lf_app_category.'" data-appname="'.get_the_title($post->ID).'">';
		$content = $content.'<a href="###" class="lf_app_list_link">';
		$content = $content.'<div class="lf_link-icon-1 lf_link-icon" style="background-color:'.$lf_app_item_color.'"><img src="'.$lf_app_item_icn.'" class="icn" /></div>';
		$content = $content.get_the_title($post->ID);
		$content = $content.'</a></li>';
	}
	wp_reset_postdata();

	$content=$content."</ul></div>";
	return $content;
}
?>