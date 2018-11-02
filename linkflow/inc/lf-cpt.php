<?php
//custom type - lf_app 
add_action('init', 'create_lf_app_post_type', 0);
function create_lf_app_post_type() {	
	register_post_type('lf_app', array(
		'label' => '应用',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'integration'),
		'query_var' => true,
		'supports' => array('title','editor'),
		'labels' => array (
			'name' => '所有应用',
			'singular_name' => '应用',
			'menu_name' => '应用',
			'add_new' => '增加应用',
			'add_new_item' => '增加新的应用',
			'edit' => '编辑',
			'edit_item' => '编辑应用',
			'new_item' => '新的应用',
			'view' => '查看',
			'view_item' => ' 查看应用',
			'search_items' => '搜索'
			),
		'menu_icon'   => 'dashicons-cloud',
		'show_in_rest' => true, //使这个CPT支持REST API
		)
	);
}
add_action( 'init', 'create_lf_app_taxonomies', 0 );//lf_app自定义分类
function create_lf_app_taxonomies() {
	register_taxonomy(
		'lf_app_category',
		'lf_app',
		array(
			'labels' => array(
				'name' => '应用分类',
				'add_new_item' => '增加新应用分类',
				'new_item_name' => "新应用分类"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			'show_in_rest' => true, //使这个分类支持REST API
		)
	);
}

add_filter( 'manage_edit-lf_app_columns', 'add_lf_app_columns' );//在后台的lf_app列表中添加分类一列
add_filter( 'manage_edit-lf_app_sortable_columns', 'add_lf_app_columns' );//排序
function add_lf_app_columns( $columns ) {
	$columns['lf_app_category'] = '应用分类';
	$columns['lf_app_icon'] = '图标';
	return $columns;
}

add_action( 'manage_posts_custom_column', 'set_lf_app_populate_columns' );//在后台的lf_app列表中添加分类一列的数据
function set_lf_app_populate_columns( $column ) {
	if( get_post_type() == "lf_app"){
		if ( 'lf_app_category' == $column ) {
			$lf_app_category =  get_the_term_list(get_the_ID(), 'lf_app_category', '','<br/>') ;
			echo $lf_app_category;
		}
		if ( 'lf_app_icon' == $column ) {
			$lf_app_icon =  get_post_meta( get_the_ID(),'lf_app_icon', true );
			$lf_app_color =  get_post_meta( get_the_ID(),'lf_app_color', true );
			echo '<div id="lf_app_preview" class="lf_app_preview lf_app_preview_small" style="background-color:'.$lf_app_color.'"><img src="'.$lf_app_icon.'" class="lf_app_preview_icon" /></div>';
		}
	}
}

add_action( 'admin_init', 'set_lf_app_meta_box' );
function set_lf_app_meta_box() {
	add_meta_box( 'lf_app_meta_box',
		'应用信息',
		'display_lf_app_meta_box',
		'lf_app', 'normal', 'high'
	);
}

function display_lf_app_meta_box( $lf_app ) {
	$lf_app_title =  get_post_meta( $lf_app->ID, 'lf_app_title', true );
	$lf_app_subtitle =  get_post_meta( $lf_app->ID, 'lf_app_subtitle', true );
	$lf_app_url =  get_post_meta( $lf_app->ID, 'lf_app_url', true );
	$lf_app_icon =  get_post_meta( $lf_app->ID, 'lf_app_icon', true );
	$lf_app_color =  get_post_meta( $lf_app->ID, 'lf_app_color', true );
	?>
	<table width="100%" class="custom-meta-box">
		<tr>
			<td>标题</td>
			<td><input type="text" name="lf_app_title" value="<?php echo $lf_app_title; ?>" class="input_long" /></td>
		</tr>
		<tr>
			<td>副标题</td>
			<td><input type="text" name="lf_app_subtitle" value="<?php echo $lf_app_subtitle; ?>" class="input_long" /></td>
		</tr>
		<!-- <tr>
			<td>链接(+http://)</td>
			<td><input type="text" name="lf_app_url" value="<?php echo $lf_app_url; ?>" class="input_long" /></td>
		</tr> -->
		<tr>
			<td>图标 <small>PNG/SVG</small><br><small>200*200 白色透明背景</small></td>
			<td><input type="text" class="custom_media_url" name="lf_app_icon" id="lf_app_icon" value="<?php echo $lf_app_icon; ?>" style="width:75%" />
				<input type="button" value="选择文件" class="custom_media_upload" />
			</td>
		</tr>
		<tr>
			<td>颜色(#FFFFFF)</td>
			<td><input type="text" name="lf_app_color" value="<?php echo $lf_app_color; ?>" class="input_short" /></td>
		</tr>
	</table>
	<div id="lf_app_preview" class="lf_app_preview" style="background-color:<?php echo $lf_app_color;?>"><img src="<?php echo $lf_app_icon;?>" class="lf_app_preview_icon" /></div>
	<script>
	jQuery('.custom_media_upload').click(function() {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var clickField=jQuery(this);
		wp.media.editor.send.attachment = function(props, attachment) {
			clickField.prev('.custom_media_url').val(attachment.url);
			wp.media.editor.send.attachment = send_attachment_bkp;
			setTimeout(function(){clickField.prev('.custom_media_url').focus();},200);
		}
		wp.media.editor.open();
		return false;
	});
	</script>
	<?php
}

add_action( 'save_post', 'add_lf_app_fields', 10, 2 );
function add_lf_app_fields( $lf_app_id, $lf_app ) {
	// Check post type for lf_app
	if ( $lf_app->post_type == 'lf_app' ) {
		// Store data in post meta table if present in post data
		if ( isset( $_POST['lf_app_title'] ) ) {
			update_post_meta( $lf_app_id, 'lf_app_title', $_POST['lf_app_title'] );
		}
		if ( isset( $_POST['lf_app_subtitle'] ) ) {
			update_post_meta( $lf_app_id, 'lf_app_subtitle', $_POST['lf_app_subtitle'] );
		}
		if ( isset( $_POST['lf_app_url'] ) ) {
			update_post_meta( $lf_app_id, 'lf_app_url', $_POST['lf_app_url'] );
		}
		if ( isset( $_POST['lf_app_icon'] ) ) {
			update_post_meta( $lf_app_id, 'lf_app_icon', $_POST['lf_app_icon'] );
		}
		if ( isset( $_POST['lf_app_color'] ) ) {
			update_post_meta( $lf_app_id, 'lf_app_color', $_POST['lf_app_color'] );
		}
	}//end if
}

//custom type - lf_link 
add_action('init', 'create_lf_link_post_type', 0);
function create_lf_link_post_type() {	
	register_post_type('lf_link', array(
		'label' => '连接',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'integration'),
		'query_var' => true,
		'supports' => array('title','editor'),
		'labels' => array (
			'name' => '所有连接',
			'singular_name' => '连接',
			'menu_name' => '连接',
			'add_new' => '增加连接',
			'add_new_item' => '增加新的连接',
			'edit' => '编辑',
			'edit_item' => '编辑连接',
			'new_item' => '新的连接',
			'view' => '查看',
			'view_item' => ' 查看连接',
			'search_items' => '搜索'
			),
		'menu_icon'   => 'dashicons-admin-links',
		'show_in_rest' => true, //使这个CPT支持REST API
		)
	);
}
add_action( 'init', 'create_lf_link_taxonomies', 0 );//lf_link自定义分类
function create_lf_link_taxonomies() {
	register_taxonomy(
		'lf_link_category',
		'lf_link',
		array(
			'labels' => array(
				'name' => '连接分类',
				'add_new_item' => '增加新连接分类',
				'new_item_name' => "新连接分类"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			'show_in_rest' => true, //使这个分类支持REST API
		)
	);
}

add_filter( 'manage_edit-lf_link_columns', 'add_lf_link_columns' );//在后台的lf_link列表中添加分类一列
add_filter( 'manage_edit-lf_link_sortable_columns', 'add_lf_link_columns' );//排序
function add_lf_link_columns( $columns ) {
	$columns['lf_link_category'] = '连接分类';
	return $columns;
}

add_action( 'manage_posts_custom_column', 'set_lf_link_populate_columns' );//在后台的lf_link列表中添加分类一列的数据
function set_lf_link_populate_columns( $column ) {
	if( get_post_type() == "lf_link"){
		if ( 'lf_link_category' == $column ) {
			$lf_link_category =  get_the_term_list(get_the_ID(), 'lf_link_category', '','<br/>') ;
			echo $lf_link_category;
		}
	}
}

add_action( 'admin_init', 'set_lf_link_meta_box' );
function set_lf_link_meta_box() {
	add_meta_box( 'lf_link_meta_box',
		'连接信息',
		'display_lf_link_meta_box',
		'lf_link', 'normal', 'high'
	);
}

function display_lf_link_meta_box( $lf_link ) {
	$lf_link_title =  get_post_meta( $lf_link->ID, 'lf_link_title', true );
	$lf_link_subtitle =  get_post_meta( $lf_link->ID, 'lf_link_subtitle', true );
	$lf_link_app_1 =  get_post_meta( $lf_link->ID, 'lf_link_app_1', true );
	$lf_link_app_2 =  get_post_meta( $lf_link->ID, 'lf_link_app_2', true );
	$lf_link_desc_title =  get_post_meta( $lf_link->ID, 'lf_link_desc_title', true );
	$lf_link_desc_cont =  get_post_meta( $lf_link->ID, 'lf_link_desc_cont', true );
	?>
	<table width="100%" class="custom-meta-box">
		<tr>
			<td>标题</td>
			<td><input type="text" name="lf_link_title" value="<?php echo $lf_link_title; ?>" class="input_long" /></td>
		</tr>
		<tr>
			<td>副标题</td>
			<td><input type="text" name="lf_link_subtitle" value="<?php echo $lf_link_subtitle; ?>" class="input_long" /></td>
		</tr>

		<tr>
			<td valign="top">应用1</td>
			<td id="appList"><?php
					$postArgs = array( 'post_type' => 'lf_app', 
										//'orderby' => 'date',
										'numberposts' => 9999,
										'order' => 'DESC' );
					$appPosts = get_posts( $postArgs );
					foreach ( $appPosts as $appPost ) : setup_postdata( $appPost ); ?>
						<label class="lf_link_app_label">
							<input type="radio" value="<?php echo $appPost->ID; ?>" name="lf_link_app_1" class="lf_link_app_item_1"
							<?php if($appPost->ID == $lf_link_app_1)  echo "checked"; ?> />
							<?php echo $appPost->post_title; ?>
						</label>
					<?php endforeach; 
					wp_reset_postdata();
				?>
				</td>
		</tr>

		<tr>
			<td valign="top">应用2</td>
			<td id="appList"><?php
					$postArgs = array( 'post_type' => 'lf_app', 
										//'orderby' => 'date',
										'numberposts' => 9999,
										'order' => 'DESC' );
					$appPosts = get_posts( $postArgs );
					foreach ( $appPosts as $appPost ) : setup_postdata( $appPost ); ?>
						<label class="lf_link_app_label">
							<input type="radio" value="<?php echo $appPost->ID; ?>" name="lf_link_app_2" class="lf_link_app_item_2"
							<?php if($appPost->ID == $lf_link_app_2)  echo "checked"; ?> />
							<?php echo $appPost->post_title; ?>
						</label>
					<?php endforeach; 
					wp_reset_postdata();
				?>
				</td>
		</tr>
		<tr>
			<td colspan="2"><hr/></td>
		</tr>

		<tr>
			<td>简介标题<br/><small>(应用1和应用2相同时填写)</small></td>
			<td><input type="text" name="lf_link_desc_title" value="<?php echo $lf_link_desc_title; ?>" class="input_long" /></td>
		</tr>
		<tr>
			<td>简介描述</td>
			<td><input type="text" name="lf_link_desc_cont" value="<?php echo $lf_link_desc_cont; ?>" class="input_long" /></td>
		</tr>
	</table>
	<script>
	jQuery(".flexable-ctrl").on("click",function(){
		var obj = $(this).prev(".flexable");
		if( obj.hasClass("expanded") )
			obj.removeClass("expanded");
		else
			obj.addClass("expanded");
	});
	jQuery('.custom_media_upload').click(function() {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var clickField=jQuery(this);
		wp.media.editor.send.attachment = function(props, attachment) {
			clickField.prev('.custom_media_url').val(attachment.url);
			wp.media.editor.send.attachment = send_attachment_bkp;
			setTimeout(function(){clickField.prev('.custom_media_url').focus();},200);
		}
		wp.media.editor.open();
		return false;
	});
	</script>
	<?php
}

add_action( 'save_post', 'add_lf_link_fields', 10, 2 );
function add_lf_link_fields( $lf_link_id, $lf_link ) {
	// Check post type for lf_link
	if ( $lf_link->post_type == 'lf_link' ) {
		// Store data in post meta table if present in post data
		if ( isset( $_POST['lf_link_app_1'] ) ) {
			update_post_meta( $lf_link_id, 'lf_link_app_1', $_POST['lf_link_app_1'] );
		}
		if ( isset( $_POST['lf_link_app_2'] ) ) {
			update_post_meta( $lf_link_id, 'lf_link_app_2', $_POST['lf_link_app_2'] );
		}
		if ( isset( $_POST['lf_link_title'] ) ) {
			update_post_meta( $lf_link_id, 'lf_link_title', $_POST['lf_link_title'] );
		}
		if ( isset( $_POST['lf_link_subtitle'] ) ) {
			update_post_meta( $lf_link_id, 'lf_link_subtitle', $_POST['lf_link_subtitle'] );
		}
		if ( isset( $_POST['lf_link_desc_title'] ) ) {
			update_post_meta( $lf_link_id, 'lf_link_desc_title', $_POST['lf_link_desc_title'] );
		}
		if ( isset( $_POST['lf_link_desc_cont'] ) ) {
			update_post_meta( $lf_link_id, 'lf_link_desc_cont', $_POST['lf_link_desc_cont'] );
		}

	}//end if
}


//custom type - lf_template 
add_action('init', 'create_lf_template_post_type', 0);
function create_lf_template_post_type() {	
	register_post_type('lf_template', array(
		'label' => '短模板',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => 'integration'),
		'query_var' => true,
		'supports' => array('title','editor'),
		'labels' => array (
			'name' => '所有短模板',
			'singular_name' => '短模板',
			'menu_name' => '短模板',
			'add_new' => '增加短模板',
			'add_new_item' => '增加新的短模板',
			'edit' => '编辑',
			'edit_item' => '编辑短模板',
			'new_item' => '新的短模板',
			'view' => '查看',
			'view_item' => ' 查看短模板',
			'search_items' => '搜索'
			),
		'menu_icon'   => 'dashicons-feedback',
		'show_in_rest' => true, //使这个CPT支持REST API
		)
	);
}
add_filter( 'manage_edit-lf_template_columns', 'add_lf_template_columns' );//在后台的lf_template列表中添加分类一列
//add_filter( 'manage_edit-lf_template_sortable_columns', 'add_lf_template_columns' );//排序
function add_lf_template_columns( $columns ) {
	$columns['lf_template_shape'] = '短模板类型';
	return $columns;
}

add_action( 'manage_posts_custom_column', 'set_lf_template_populate_columns' );//在后台的lf_template列表中添加分类一列的数据
function set_lf_template_populate_columns( $column ) {
	if( get_post_type() == "lf_template"){
		if ( 'lf_template_shape' == $column ) {
			$obj_lf_template_shape_1 = get_post_meta( get_the_ID(), 'lf_template_shape_1', true );
			$obj_lf_template_shape_2 = get_post_meta( get_the_ID(), 'lf_template_shape_2', true );
			echo $obj_lf_template_shape_1.' -> '.$obj_lf_template_shape_2;
		}
	}
}
add_action( 'admin_init', 'set_lf_template_meta_box' );
function set_lf_template_meta_box() {
	add_meta_box( 'lf_template_meta_box',
		'短模板信息',
		'display_lf_template_meta_box',
		'lf_template', 'normal', 'high'
	);
}

function display_lf_template_meta_box( $lf_template ) {
	$lf_template_title =  get_post_meta( $lf_template->ID, 'lf_template_title', true );
	$lf_template_subtitle =  get_post_meta( $lf_template->ID, 'lf_template_subtitle', true );
	$lf_template_app_1 =  get_post_meta( $lf_template->ID, 'lf_template_app_1', true );
	$lf_template_app_2 =  get_post_meta( $lf_template->ID, 'lf_template_app_2', true );
	$lf_template_shape_1 =  get_post_meta( $lf_template->ID, 'lf_template_shape_1', true );
	$lf_template_shape_2 =  get_post_meta( $lf_template->ID, 'lf_template_shape_2', true );
	?>
	<table width="100%" class="custom-meta-box">
		<tr>
			<td>标题</td>
			<td><input type="text" name="lf_template_title" value="<?php echo $lf_template_title; ?>" class="input_long" /></td>
		</tr>
		<!-- <tr>
			<td>副标题</td>
			<td><input type="text" name="lf_template_subtitle" value="<?php echo $lf_template_subtitle; ?>" class="input_long" /></td>
		</tr> -->

		<tr>
			<td valign="top">应用1</td>
			<td id="appList"><?php
					$postArgs = array( 'post_type' => 'lf_app', 
										//'orderby' => 'date',
										'numberposts' => 9999,
										'order' => 'DESC' );
					$appPosts = get_posts( $postArgs );
					foreach ( $appPosts as $appPost ) : setup_postdata( $appPost ); ?>
						<label class="lf_template_app_label">
							<input type="radio" value="<?php echo $appPost->ID; ?>" name="lf_template_app_1" class="lf_template_app_item_1"
							<?php if($appPost->ID == $lf_template_app_1)  echo "checked"; ?> />
							<?php echo $appPost->post_title; ?>
						</label>
					<?php endforeach; 
					wp_reset_postdata();
				?>
				</td>
		</tr>
		<tr>
			<td valign="top">应用1类型</td>
			<td valign="top">
				<label class="lf_template_app_label"><input type="radio" value="trigger" name="lf_template_shape_1" class="lf_template_app_item_1" <?php if($lf_template_shape_1 == "trigger") echo "checked"; ?> /> Trigger</label>
				<label class="lf_template_app_label"><input type="radio" value="action" name="lf_template_shape_1" class="lf_template_app_item_1" <?php if($lf_template_shape_1 == "action") echo "checked"; ?> /> Action</label>
				<label class="lf_template_app_label"><input type="radio" value="command" name="lf_template_shape_1" class="lf_template_app_item_1" <?php if($lf_template_shape_1 == "command") echo "checked"; ?> /> Command</label>
			</td>
		</tr>

		<tr>
			<td valign="top">应用2</td>
			<td id="appList"><?php
					$postArgs = array( 'post_type' => 'lf_app', 
										//'orderby' => 'date',
										'numberposts' => 9999,
										'order' => 'DESC' );
					$appPosts = get_posts( $postArgs );
					foreach ( $appPosts as $appPost ) : setup_postdata( $appPost ); ?>
						<label class="lf_template_app_label">
							<input type="radio" value="<?php echo $appPost->ID; ?>" name="lf_template_app_2" class="lf_template_app_item_2"
							<?php if($appPost->ID == $lf_template_app_2)  echo "checked"; ?> />
							<?php echo $appPost->post_title; ?>
						</label>
					<?php endforeach; 
					wp_reset_postdata();
				?>
				</td>
		</tr>

		<tr>
			<td valign="top">应用2类型</td>
			<td valign="top">
				<label class="lf_template_app_label"><input type="radio" value="trigger" name="lf_template_shape_2" class="lf_template_app_item_1" <?php if($lf_template_shape_2 == "trigger") echo "checked"; ?> /> Trigger</label>
				<label class="lf_template_app_label"><input type="radio" value="action" name="lf_template_shape_2" class="lf_template_app_item_1" <?php if($lf_template_shape_2 == "action") echo "checked"; ?> /> Action</label>
				<label class="lf_template_app_label"><input type="radio" value="command" name="lf_template_shape_2" class="lf_template_app_item_1" <?php if($lf_template_shape_2 == "command") echo "checked"; ?> /> Command</label>
			</td>
		</tr>

		<tr>
			<td colspan="2"><hr/></td>
		</tr>
	</table>
	<script>
	jQuery(".flexable-ctrl").on("click",function(){
		var obj = $(this).prev(".flexable");
		if( obj.hasClass("expanded") )
			obj.removeClass("expanded");
		else
			obj.addClass("expanded");
	});
	jQuery('.custom_media_upload').click(function() {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var clickField=jQuery(this);
		wp.media.editor.send.attachment = function(props, attachment) {
			clickField.prev('.custom_media_url').val(attachment.url);
			wp.media.editor.send.attachment = send_attachment_bkp;
			setTimeout(function(){clickField.prev('.custom_media_url').focus();},200);
		}
		wp.media.editor.open();
		return false;
	});
	</script>
	<?php
}

add_action( 'save_post', 'add_lf_template_fields', 10, 2 );
function add_lf_template_fields( $lf_template_id, $lf_template ) {
	// Check post type for lf_template
	if ( $lf_template->post_type == 'lf_template' ) {
		// Store data in post meta table if present in post data
		if ( isset( $_POST['lf_template_app_1'] ) ) {
			update_post_meta( $lf_template_id, 'lf_template_app_1', $_POST['lf_template_app_1'] );
		}
		if ( isset( $_POST['lf_template_app_2'] ) ) {
			update_post_meta( $lf_template_id, 'lf_template_app_2', $_POST['lf_template_app_2'] );
		}
		if ( isset( $_POST['lf_template_title'] ) ) {
			update_post_meta( $lf_template_id, 'lf_template_title', $_POST['lf_template_title'] );
		}
		if ( isset( $_POST['lf_template_subtitle'] ) ) {
			update_post_meta( $lf_template_id, 'lf_template_subtitle', $_POST['lf_template_subtitle'] );
		}
		if ( isset( $_POST['lf_template_shape_1'] ) ) {
			update_post_meta( $lf_template_id, 'lf_template_shape_1', $_POST['lf_template_shape_1'] );
		}
		if ( isset( $_POST['lf_template_shape_2'] ) ) {
			update_post_meta( $lf_template_id, 'lf_template_shape_2', $_POST['lf_template_shape_2'] );
		}
	}//end if
}
//css for backend
function brain1981_admin_styles(){
	global $typenow;
	if( $typenow == 'lf_app' || $typenow == 'lf_link' || $typenow == 'post' || $typenow == 'lf_template' ) {
		wp_enqueue_style( 'brain1981_meta_box_styles', get_template_directory_uri() . '/css/backend.css' );
	}
}
add_action( 'admin_print_styles', 'brain1981_admin_styles' );


/**
 * 设置各种自定义文章类型的固定链接结构为 ID.html 
 */
add_filter('post_type_link', 'custom_type_link', 1, 3);
function custom_type_link( $link, $post = 0 ){
	if ( $post->post_type == 'lf_app' ){
		return home_url( 'integration/' . $post->ID .'.html' );
	}
	elseif ( $post->post_type == 'lf_link' ){
		return home_url( 'integration/link/' . $post->ID .'.html' );
	} else {
		return $link;
	}
}
add_action( 'init', 'custom_type_rewrites_init' );
function custom_type_rewrites_init(){
	add_rewrite_rule(
		'integration/([0-9]+)?.html$',
		'index.php?post_type=lf_app&p=$matches[1]',
		'top' );
	add_rewrite_rule(
		'integration/link/([0-9]+)?.html$',
		'index.php?post_type=lf_link&p=$matches[1]',
		'top' );

}

/*调用指定的模板文件*/
add_filter( 'template_include', 'include_template_function', 1 );
function include_template_function( $template_path ) {
	if ( get_post_type() == 'lf_app' ) {
		if ( is_single() ) {
			if ( $theme_file = locate_template( array ( 'single-lf_app.php' ) ) ) {
				$template_path = $theme_file;
			}
		}elseif ( is_archive() ) {
			if ( $theme_file = locate_template( array ( 'archive-lf_app.php' ) ) ) {
				$template_path = $theme_file;
			}
		}
	}else if ( get_post_type() == 'lf_link' ) {
		if ( is_single() ) {
			if ( $theme_file = locate_template( array ( 'single-lf_link.php' ) ) ) {
				$template_path = $theme_file;
			}
		}elseif ( is_archive() ) {
			if ( $theme_file = locate_template( array ( 'archive-lf_link.php' ) ) ) {
				$template_path = $theme_file;
			}
		}
	}
	
	return $template_path;
}

//order the back-end menu items
function custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
	return array(
		'index.php', // “仪表盘”菜单
		'separator1',
		'edit.php?post_type=lf_app',
		'edit.php?post_type=lf_link',
		'edit.php?post_type=lf_template',
		'edit.php', // “文章”菜单
		'separator2',
		'edit.php?post_type=page', // “页面”菜单
		'admin.php?page=slider-settings',//首页管理
		'edit-comments.php', //“评论”菜单

		'upload.php', //“多媒体”菜单
		//'plugins.php', //“插件”菜单
		//'themes.php', //“主题”菜单
	);
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');

