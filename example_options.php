<?php
	$options = array();

	$options[] = array(
		'name' => __('基本设置', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('窄文本框', 'options_framework_theme'),
		'desc' => __('窄文本框输入字段。', 'options_framework_theme'),
		'id' => 'example_text_mini',
		'std' => '默认',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('文本框', 'options_framework_theme'),
		'desc' => __('文本框输入字段。', 'options_framework_theme'),
		'id' => 'example_text',
		'std' => '默认值',
		'type' => 'text');

	$options[] = array(
		'name' => __('文本域', 'options_framework_theme'),
		'desc' => __('文本域说明', 'options_framework_theme'),
		'id' => 'example_textarea',
		'std' => '默认文本',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('窄下拉列表', 'options_framework_theme'),
		'desc' => __('一个窄下拉列表', 'options_framework_theme'),
		'id' => 'example_select',
		'std' => 'three',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('宽下拉列表', 'options_framework_theme'),
		'desc' => __('一个宽下拉列表', 'options_framework_theme'),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array);

	if ( $options_categories ) {
	$options[] = array(
		'name' => __('选择分类', 'options_framework_theme'),
		'desc' => __('通过cat_ID和cat_name选择categories数组', 'options_framework_theme'),
		'id' => 'example_select_categories',
		'type' => 'select',
		'options' => $options_categories);
	}
	
	if ( $options_tags ) {
	$options[] = array(
		'name' => __('选择标签', 'options_check'),
		'desc' => __('通过trem_id和term_name选择tags数组', 'options_check'),
		'id' => 'example_select_tags',
		'type' => 'select',
		'options' => $options_tags);
	}

	$options[] = array(
		'name' => __('选择页面', 'options_framework_theme'),
		'desc' => __('通过ID和post_title选择pages', 'options_framework_theme'),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages);

	$options[] = array(
		'name' => __('单选框（one）', 'options_framework_theme'),
		'desc' => __('单选按钮选中时值为“one”', 'options_framework_theme'),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array);

	$options[] = array(
		'name' => __('示例信息', 'options_framework_theme'),
		'desc' => __('这是一条示例信息，你可以在设置面板中加入它', 'options_framework_theme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('复选框', 'options_framework_theme'),
		'desc' => __('复选框示例，默认为true', 'options_framework_theme'),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('高级设置', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('单击显示隐藏的文本框', 'options_framework_theme'),
		'desc' => __('单击这里看发生了什么', 'options_framework_theme'),
		'id' => 'example_showhidden',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('隐藏文本框', 'options_framework_theme'),
		'desc' => __('这是一个隐藏的文本框，选中复选框后显示', 'options_framework_theme'),
		'id' => 'example_text_hidden',
		'std' => '你好',
		'class' => 'hidden',
		'type' => 'text');

	$options[] = array(
		'name' => __('上传测试', 'options_framework_theme'),
		'desc' => __('预览图像将以全尺寸上传。', 'options_framework_theme'),
		'id' => 'example_uploader',
		'type' => 'upload');

	$options[] = array(
		'name' => "图片单选按钮",
		'desc' => "",
		'id' => "example_images",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => $imagepath . '1col.png',
			'2c-l-fixed' => $imagepath . '2cl.png',
			'2c-r-fixed' => $imagepath . '2cr.png')
	);

	$options[] = array(
		'name' =>  __('背景示例', 'options_framework_theme'),
		'desc' => __('修改背景CSS', 'options_framework_theme'),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __('复选框', 'options_framework_theme'),
		'desc' => __('复选框说明', 'options_framework_theme'),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array);

	$options[] = array(
		'name' => __('拾色器', 'options_framework_theme'),
		'desc' => __('默认未选择颜色', 'options_framework_theme'),
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color' );
		
	$options[] = array( 'name' => __('版式', 'options_framework_theme'),
		'desc' => __('版式示例', 'options_framework_theme'),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography' );
		
	$options[] = array(
		'name' => __('自定义版式', 'options_framework_theme'),
		'desc' => __('自定义版式设置', 'options_framework_theme'),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options );

	$options[] = array(
		'name' => __('文本编辑器', 'options_framework_theme'),
		'type' => 'heading' );

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // 默认
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options[] = array(
		'name' => __('默认文本编辑器', 'options_framework_theme'),
		'desc' => sprintf( __( '您可以设置编辑器，更多关于wp_editor的说明请阅读<a href="%1$s" target="_blank">the WordPress codex</a>', 'options_framework_theme' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
?>