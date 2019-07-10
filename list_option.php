<?php

$wp_editor_settings_4 = array(
					'wpautop' => true, // 默认
					'textarea_rows' => 4,
					'tinymce' => array( 'plugins' => 'wordpress' )
				);
$wp_editor_settings_3 = array(
					'wpautop' => true, // 默认
					'textarea_rows' => 3,
					'tinymce' => array( 'plugins' => 'wordpress' )
				);
$wp_editor_settings_2 = array(
					'wpautop' => true, // 默认
					'textarea_rows' => 2,
					'tinymce' => array( 'plugins' => 'wordpress' )
				);

$radio_chose = array(
					'0' => __('否','options_framework_theme'),
					'1' => __('是','options_framework_theme','options_framework_theme'),
				);

$select_friendlink = array(
					'0' => __('不显示','options_framework_theme'),
					'1' => __('首页显示','options_framework_theme'),
					'2' => __('全站显示','options_framework_theme'),
				);




//后台基础设置栏目
$options[] = array(
	'name' => __('YU基本设置','options_framework_theme'),
	'type' => 'heading',
);

$options[] = array(
	'name' => __('logo设置','options_framework_theme'),
	'desc' =>sprintf(__('设置logo内容,高度不要太高，背景为透明为好','options_framework_theme')),
	'id' => 'logo',
	'type' => 'upload',
);

$options[] = array(
	'name' => __('头部左侧内容设置','options_framework_theme'),
	'desc' =>sprintf(__('设置网页头部左侧内容','options_framework_theme')),
	'id' => 'topbar_left',
	'type' => 'editor',
	'settings' => $wp_editor_settings_4
);

$options[] = array(
	'name' => __('头部右侧侧内容设置','options_framework_theme'),
	'desc' =>sprintf(__('设置网页头部右侧内容','options_framework_theme')),
	'id' => 'topbar_right',
	'type' => 'editor',
	'settings' => $wp_editor_settings_4
);






//后台基础设置栏目
$options[] = array(
	'name' => __('YU首页设置','options_framework_theme'),
	'type' => 'heading'
);
$options[] = array(
				'name' => __('轮播图展开','options_framework_theme'),
				'id' => 'is_spread',
				'desc' => __('将轮播图展开，不再外扩','options_framework_theme'),
				'type' => 'radio',
				'std' => '0',
				'options' => $radio_chose
			);
$options[] = array(
	'name' => __('是否开启幻灯片','options_framework_theme'),
	'desc' => sprintf(__('选择是否开启幻灯片，如果关闭则下列列表的填写均无效','options_framework_theme')),
	'id' => 'is_banner',
	'type' => 'radio',
	'std' => '1',
	'options' => $radio_chose
);

$options[] = array(
	'name' => __('选择幻灯片1','options_framework_theme'),
	'desc' => __('4个轮播图应选择统一格式大小','options_framework_theme'),
	'id' => 'banner1',
	'type' => 'upload'
);

$options[] = array(
	'name' => __('选择幻灯片2','options_framework_theme'),
	'id' => 'banner2',
	'type' => 'upload'
);

$options[] = array(
	'name' => __('选择幻灯片3','options_framework_theme'),
	'id' => 'banner3',
	'type' => 'upload'
);

$options[] = array(
	'name' => __('选择幻灯片3','options_framework_theme'),
	'id' => 'banner4',
	'type' => 'upload'
);
$options[] = array(
	'name' => __('幻灯片左侧图片','options_framework_theme'),
	'id' => 'bannner_left',
	'type' => 'upload'
);
$options[] = array(
	'name' => __('幻灯片右侧图片','options_framework_theme'),
	'id' => 'bannner_right',
	'type' => 'upload'
);

//底部设置
$options[] = array(
				'name' => __('YU底部设置','options_framework_theme'),
				'type' => 'heading',
			);

$options[] = array(
	'name' => __('是否开启底部栏目','options_framework_theme'),
	'id' => 'is_bottom',
	'desc' => __('选择是否开启底部栏目，如果关闭则下列列表的填写均无效','options_framework_theme'),
	'type' => 'radio',
	'std' => '1',
	'options' => $radio_chose
);

$options[] = array(
				'name' => __('友情链接显示方式','options_framework_theme'),
				'id' => 'is_friendlink',
				'type' => 'select',
				'std' => '2',
				'class' => 'mini',
				'options' => $select_friendlink
			);

$options[] = array(
				'name' => __('友情链接1的标题','options_framework_theme'),
				'id' => 'friendlink1_title',
				'type' => 'text',
				'class' => 'mini',
				'std' => __('校园文化','options_framework_theme'),
			);
$options[] = array(
				'name' => __('友情链接1的内容','options_framework_theme'),
				'id' => 'friendlink1_content',
				'type' => 'editor',
				'std' => '<div>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
						</div>',
				'settings' => $wp_editor_settings_2,
			);
$options[] = array(
				'name' => __('友情链接2的标题','options_framework_theme'),
				'id' => 'friendlink2_title',
				'type' => 'text',
				'class' => 'mini',
				'std' => __('校园文化','options_framework_theme'),
			);
$options[] = array(
				'name' => __('友情链接2的内容','options_framework_theme'),
				'id' => 'friendlink2_content',
				'type' => 'editor',
				'std' => '<div>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
						</div>',
				'settings' => $wp_editor_settings_2,
			);

$options[] = array(
				'name' => __('友情链接3的标题','options_framework_theme'),
				'id' => 'friendlink3_title',
				'type' => 'text',
				'class' => 'mini',
				'std' => __('校园文化','options_framework_theme'),
			);
$options[] = array(
				'name' => __('友情链接3的内容','options_framework_theme'),
				'id' => 'friendlink3_content',
				'type' => 'editor',
				'std' => '<div>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
						</div>',
				'settings' => $wp_editor_settings_2,
			);

$options[] = array(
				'name' => __('友情链接4的标题','options_framework_theme'),
				'id' => 'friendlink4_title',
				'type' => 'text',
				'class' => 'mini',
				'std' => __('校园文化','options_framework_theme'),
			);
$options[] = array(
				'name' => __('友情链接4的内容','options_framework_theme'),
				'id' => 'friendlink4_content',
				'type' => 'editor',
				'std' => '<div>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
							<a href="">友情链接</a>
						</div>',
				'settings' => $wp_editor_settings_2,
			);

$options[] = array(
				'name' => __('友情链接5的标题','options_framework_theme'),
				'id' => 'friendlink5_title',
				'type' => 'text',
				'class' => 'mini',
				'std' => __('校园文化','options_framework_theme'),
			);
$options[] = array(
				'name' => __('友情链接5的内容','options_framework_theme'),
				'id' => 'friendlink5_content',
				'type' => 'editor',
				'std' => '
							<img src="http://pdlmhfn5b.bkt.clouddn.com/weibo.png">
							<img src="http://pdlmhfn5b.bkt.clouddn.com/weibo.png">
						',
				'settings' => $wp_editor_settings_2,
			);
$options[] = array(
	'name' => __('版权内容设置','options_framework_theme'),
	'id' => 'content_copyright',
	'desc' => __('设置版权栏目内容','options_framework_theme'),
	'std' => 'Copyright © 2018 yongjian yu All Rights Reserved',
	'type' => 'editor',
	'settings' => $wp_editor_settings_2
);

$options[] = array(
				'name' => __('版权右侧内容设置','options_framework_theme'),
				'id' => 'copyright_right',
				'desc' => __('设置版权右侧栏目内容','options_framework_theme'),
				'type' => 'editor',
				'settings' => $wp_editor_settings_2
			);


		
//后台SEO设置
$options[] = array(
				'name' => __('SEO设置','options_framework_theme'),
				'type' => 'heading'
			);


$options[] =array(
				'name' => __('SEO关键字','options_framework_theme'),
				'desc' => __('搜索引擎搜索相应关键字是会与网站关键字决心匹配,不同关键字之间用逗号隔开','options_framework_theme'),
				'id' => 'keywords',
				'type' => 'text'
			);

$options[] = array(
				'name' => __('网站描述','options_framework_theme'),
				'desc' => __('对网站描述内容进行编辑','options_framework_theme'),
				'id' => 'description',
				'type' => 'textarea'

			);

//全站设置
$options[] = array(
				'name' => __('YU全站设置','options_framework_theme'),
				'type' => 'heading',
			);

$options[] = array(
				'name' => __('分类页文章数量','options_framework_theme'),
				'desc' => __('设置分类页每个分类显示的文章数目','options_framework_theme'),
				'id' => 'cat_num',
				'type' => 'text',
				'class' => 'mini',
				'std' => 10,

			);
$options[] = array(
				'name' => __('分类页文章是否显示时间','options_framework_theme'),
				'desc' => __('设置分类页每个分类显示的文章是否要显示时间','options_framework_theme'),
				'id' => 'is_cat_date',
				'type' => 'radio',
				'std' => '1',
				'options' =>$radio_chose 

			);

$options[] = array(
				'name' => __('分页显示的个数','options_framework_theme'),
				'id' => 'pagination_num',
				'type' => 'text',
				'class' => 'mini',
				'std' => 3,
			);

$options[] = array(
				'name' => __('侧边栏导航是否显示','options_framework_theme'),
				'desc' => __('除了首页','options_framework_theme'),
				'id' => 'is_sidebarnavigation',
				'type' => 'select',
				'class' => 'mini',
				'std' => '1',
				'options' => $radio_chose,
			);
$options[] = array(
				'name' => __('侧边栏最新文章是否显示','options_framework_theme'),
				'desc' => __('除了首页','options_framework_theme'),
				'id' => 'is_sidebarlastest',
				'type' => 'select',
				'class' => 'mini',
				'std' => '1',
				'options' => $radio_chose,
			);
$options[] = array(
				'name' => __('侧边栏随机文章是否显示','options_framework_theme'),
				'desc' => __('除了首页','options_framework_theme'),
				'id' => 'is_sidebarrandom',
				'type' => 'select',
				'class' => 'mini',
				'std' => '1',
				'options' => $radio_chose,
			);

//关于作者
$content = "本主题是参考网上众多主题而成，前台是只用bootstraps4搭建而成，然后与wordpress进行对接，后台选择设置是使用options framework进行使用。后期我会进行迭代，进行更新的。";
$options[] = array(
			'name' => __('关于主题'),
			'type' => 'heading',
		);

$options[] = array(
		'name' => __('关于主题', 'options_framework_theme'),
		'desc' => __($content, 'options_framework_theme'),
		'type' => 'info'
	);

?>