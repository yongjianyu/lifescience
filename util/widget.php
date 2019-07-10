<?php
/**
 * descrption:这是wordpress中小工具的代码
 * version:1.0
 * author:yu
 */

/**
 * 创建小工具类的主要格式
 * class My_Widget extends WP_Widget { //继承了 WP_Widget 这个类来创建新的小工具(Widget) 
	    function My_Widget() { 
	        // 主要内容方法 
	    } 
	    function form($instance) { 
	         // 给小工具(widget) 添加表单内容 
	    } 
	    function update($new_instance, $old_instance) { 
	         // 进行更新保存 
	    } 
	    function widget($args, $instance) { 
	        // 输出显示在页面上 
	    } 
	} 
	register_widget('My_Widget'); 
 */


/**
 * 指定分类文章
 * 对指定分类，在界面显示其文章列表
 */
class ClassifiedArticle extends WP_Widget {

    function __construct(){
    	parent::__construct(

			'ClassifiedArticle',
			'YU指定分类文章',
			array(
				'description' => '对指定分类，在界面显示其文章列表'	
			)
		); 
        
    } 

    function form($instance) { 
    	 $defaults = array(
    	 				'is_date'=>1,
    	 				'Articlenum'=>5,
    	 				'block'=>1
    	 			);
    	 $instance = wp_parse_args((array)$instance,$defaults);

    	 //赋值并过滤
	     $Articlenum = htmlspecialchars($instance['Articlenum']);
	     $title = htmlspecialchars($instance['title']);
	     $id = htmlspecialchars($instance['id']);
	     $is_date = htmlspecialchars($instance['is_date']);
	     $block = htmlspecialchars($instance['block']);
	     $arg = array(
	     			'orderby' => 'id',
        			'order' => 'ASC',
	     		);
	     $cats = get_categories($arg);
	     ?>
	    <p>
	     	<label for="<?php echo $this->get_field_id('title'); ?>">
	     		<span>标题：</span>
	     		<input class="title" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" type="text" />
	     	</label>
	    </p>
			
		<p>
			<label for="<?php echo $this->get_field_id('id');?>">
				<span>选择分类：</span>
				<select class="id" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>">
					<?php 
					foreach ($cats as $cat) {
						if($cat->term_id == esc_attr($id)){
							echo "<option value=".$cat->term_id." selected>".$cat->name."</option>";
						}else{
							echo "<option value=".$cat->term_id.">".$cat->name."</option>";
						}
					}
					?>
				</select>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('Articlenum'); ?>">
				<span>显示文章数量:</span>
				<input type="text" name="<?php echo $this->get_field_name('Articlenum');?>" id="<?php echo $this->get_field_id('Articlenum');?>"   value="<?php echo esc_attr($Articlenum); ?>" />
			</label>
		</p>

		<P>
			<label for="<?php echo $this->get_field_id('is_date'); ?>">
				<span>是否显示时间:</span>
				<select id="<?php echo $this->get_field_id('is_date'); ?>" name="<?php echo $this->get_field_name('is_date'); ?>">
					<option value="1" <?php if($is_date==1) echo "selected" ?>;>是</option>
					<option value="0" <?php if($is_date==0) echo "selected" ?>>否</option>
				</select>
			</label>
		</P>

		<p>
			<label for="<?php echo $this->get_field_id('block'); ?>">
				<span>分区:</span>
				<input type="text" name="<?php echo $this->get_field_name('block');?>" id="<?php echo $this->get_field_id('block');?>"   value="<?php echo esc_attr($block); ?>" />
			</label>
		</p>

	     <?php

    } 

    function update($new_instance, $old_instance) { 
           	$instance = $old_instance;
           	//赋值并过滤
	        $instance['Articlenum'] = strip_tags($new_instance['Articlenum']);
		    $instance['title'] = strip_tags($new_instance['title']);
		    $instance['id'] = strip_tags($new_instance['id']);
		    $instance['is_date'] = strip_tags($new_instance['is_date']);
		    $instance['block'] = strip_tags($new_instance['block']);
		    return $instance;
    } 

    function widget($args, $instance) { 
        $Articlenum = htmlspecialchars($instance['Articlenum']);
	    $title = htmlspecialchars($instance['title']);
	    $id = htmlspecialchars($instance['id']);
	    $is_date = htmlspecialchars($instance['is_date']);
	    $block = htmlspecialchars($instance['block']);
	    global $wp_query;
		$args = array('cat'=>$id,'posts_per_page'=>$Articlenum);
		$wp_query = new WP_Query( $args );
		?>
		<div class="art"  style="<?php if($block==2) echo "width:100%;" ?>">
			<div class="art-title">
				<span><a href="<?php echo get_category_link($id);?>"><?php echo $title;?></a></span>
				<a href="<?php echo get_category_link($id);?>">+更多</a>
			</div>
			<div class="art-content">
				<ul>
		<?php
		if($wp_query->have_posts()){
			while ( $wp_query -> have_posts() ) : $wp_query ->the_post();
				?>
				<li>
					<?php if($is_date == 1){
						echo "<span>";
						the_time('Y-n-j');
						echo "</span>";
					} ?>
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title();?></a>
				</li>
				<?php
        	endwhile;
		}
		wp_reset_query();

		?>

				</ul>
			</div>
		</div>
		<?php
    } 
} 




/**
 * 指定分类首篇图片文章
 *
 * 对指定分类，在界面显示其文章列表，并且第一篇文章显示图片及其部分内容
 */
class Begainpic extends WP_Widget { //继承了 WP_Widget 这个类来创建新的小工具(Widget) 
    function __construct() { 
        // 主要内容方法 
        parent::__construct(
        					'Begainpic',
							'YU首篇图片文章',
							array(
								'description' => '对指定分类，在界面显示其文章列表，并且第一篇文章显示图片及其部分内容'	
							)
        				);
    } 
    function form($instance) { 
         // 给小工具(widget) 添加表单内容 
        $defaults = array(
         				'Articlenum' => 6,
         				'is_date' => 1,
         				'fontnum' => 100
         			);
        $instance = wp_parse_args((array)$instance,$defaults);
        $title = htmlspecialchars($instance['title']);
        $Articlenum = htmlspecialchars($instance['Articlenum']);
        $is_date = htmlspecialchars($instance['is_date']);
        $id = htmlspecialchars($instance['id']);
        $fontnum = htmlspecialchars($instance['fontnum']);
        $args = array(
        			'orderby' => 'id',
        			'order' => 'ASC',
        		);
		$cats = get_categories($args);
        ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<span>标题：</span>
				<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr($title); ?>">
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('id');?>">
				<span>选择分类：</span>
				<select class="id" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>">
					<?php 
					foreach ($cats as $cat) {
						if($cat->term_id == esc_attr($id)){
							echo "<option value=".$cat->term_id." selected>".$cat->name."</option>";
						}else{
							echo "<option value=".$cat->term_id.">".$cat->name."</option>";
						}
					}
					?>
				</select>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('Articlenum'); ?>">
				<span>显示文章数量:</span>
				<input type="text" name="<?php echo $this->get_field_name('Articlenum');?>" id="<?php echo $this->get_field_id('Articlenum');?>"   value="<?php echo esc_attr($Articlenum); ?>" />
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('fontnum'); ?>">
				<span>首篇文字摘要字数：</span>
				<input type="text" name="<?php echo $this->get_field_name('fontnum'); ?>" id="<?php echo $this->get_field_id('fontnum'); ?>" value="<?php echo esc_attr($fontnum); ?>">
			</label>
		</p>

		<P>
			<label for="<?php echo $this->get_field_id('is_date'); ?>">
				<span>是否显示时间:</span>
				<select id="<?php echo $this->get_field_id('is_date'); ?>" name="<?php echo $this->get_field_name('is_date'); ?>">
					<option value="1" <?php if($is_date==1) echo "selected" ?>;>是</option>
					<option value="0" <?php if($is_date==0) echo "selected" ?>>否</option>
				</select>
			</label>
		</P>

        <?php
    } 
    function update($new_instance, $old_instance) { 
        // 进行更新保存 
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['Articlenum'] = strip_tags($new_instance['Articlenum']);
        $instance['id'] = strip_tags($new_instance['id']);
        $instance['is_date'] = strip_tags($new_instance['is_date']);
        $instance['fontnum'] = strip_tags($new_instance['fontnum']);
        return $instance; 
    } 
    function widget($args, $instance) { 
        // 输出显示在页面上 
        $title = htmlspecialchars($instance['title']);
        $id = htmlspecialchars($instance['id']);
        $Articlenum = htmlspecialchars($instance['Articlenum']);
        $is_date = htmlspecialchars($instance['is_date']);
        $fontnum = htmlspecialchars($instance['fontnum']);
        global $wp_query;
		$args = array('cat'=>$id,'posts_per_page'=>$Articlenum);
		$wp_query = new WP_Query( $args );
	    $index = 1;
	    ?>
			<div class="begainpic ">
				<div class="begainpic-title">
					<span><a href="<?php echo get_category_link($id);?>"><?php echo $title; ?></a></span>
					<a href="<?php echo get_category_link($id);?>">+更多</a>
				</div>
			
			<?php
			if($wp_query->have_posts()){
				while($wp_query->have_posts()):$wp_query->the_post();
					if($index == 1){
						$img = catch_first_pic();
					?>
						<div class="begainpic-start">
							<div class="begainpic-start-left">
								<img src="<?php echo $img; ?>">
							</div>
							<div class="begainpic-start-right">
								<div class="begainpic-start-right-title">
									<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
								</div>
								<div class="begainpic-start-right-content">
									<P><?php get_limitcontent($fontnum); ?></P>
								</div>
							</div>
						</div>
						<div class="begainpic-start-list">
							<ul>
					<?php
					}
					?>
					<li>
						<?php if($is_date == 1){
							echo "<span>";
							the_time('Y-n-j');
							echo "</span>";
						} ?>
						<a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</li>
					<?php

					$index++;
				endwhile;
				?>
						</ul>
					</div>
				</div>
				<?php
			}
			wp_reset_query();	
			?>
	    <?php 
    } 
}


/**
 * 滚动图片文章
 */
class ScrollPicture extends WP_Widget { //继承了 WP_Widget 这个类来创建新的小工具(Widget) 
    function __construct() { 
        // 主要内容方法 
        parent::__construct(
        				'ScrollPicture',
        				'YU滚动图片文章',
        				array(
        					'description'=>'对指定分类文章，将文章显示其图片，并且进行滚动'
        				)
        			);
    } 
    function form($instance) { 
        // 给小工具(widget) 添加表单内容
        $defaults = array(
        				'Articlenum' => 7,
        			);
       	$instance = wp_parse_args((array)$instance,$defaults); 
       	$title = htmlspecialchars($instance['title']);
       	$id = htmlspecialchars($instance['id']);
       	$Articlenum = htmlspecialchars($instance['Articlenum']);
       	$args = array(
       				'orderby' => 'id',
       				'order' => 'ASC',
       			);
       	$cats = get_categories($args);
       	?>
		<P>
			<label for="<?php echo $this->get_field_id('title') ?>">
				<span>标题：</span>
				<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr($title); ?>">
			</label>
		</P>

		<p>
			<label for="<?php echo $this->get_field_id('id'); ?>">
				<span>选择分类：</span>
				<select name="<?php echo $this->get_field_name('id'); ?>" id="<?php echo $this->get_field_id('id'); ?>">
					<?php
					foreach ($cats as $cat) {
						if($cat->term_id == esc_attr($id)){
							echo "<option value=".$cat->term_id." selected>".$cat->name."</option>";
						}else{
							echo "<option value=".$cat->term_id.">".$cat->name."</option>";
						}
					}	
					?>
				</select>
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('Articlenum'); ?>">
				<span>文章数量：</span>
				<input type="text" name="<?php echo $this->get_field_name('Articlenum'); ?>" id="<?php echo $this->get_field_id('Articlenum'); ?>" value="<?php echo esc_attr($Articlenum); ?>" />
			</label>
		</p>


       	<?php

    } 
    function update($new_instance, $old_instance) { 
        // 进行更新保存 
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['id'] = strip_tags($new_instance['id']);
        $instance['Articlenum'] = strip_tags($new_instance['Articlenum']);
        return $instance; 
    } 
    function widget($args, $instance) { 
        // 输出显示在页面上 
        $title = htmlspecialchars($instance['title']);
        $id = htmlspecialchars($instance['id']);
        $Articlenum = htmlspecialchars($instance['Articlenum']);
        global $wp_query;
		$args = array('cat'=>$id,'posts_per_page'=>$Articlenum);
		$wp_query = new WP_Query( $args );
        ?>
		<div class="slidepic">
			<div class="slidepic-title">
				<span><a href="<?php echo get_category_link($id); ?>"><?php echo $title; ?></a></span>
				<a href="<?php echo get_category_link($id); ?>">+更多</a>
			</div>
			<div class="slidepic-slide">
				<span class="leftmove">&#12288;</span>
					<span class="rightmove">&#12288;</span>
					<div class="slidepic-slide-img">
						<ul>
		<?php 
			if($wp_query->have_posts()){
				while ($wp_query->have_posts()):$wp_query->the_post();
					?>
					<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo catch_first_pic(); ?>"><span><?php the_title();?></span></a></li>
					<?php
				endwhile;	
			}
		?>
					</ul>
				</div>
			</div>
		</div>
        <?php
        wp_reset_query();
    } 
}




/**
 * 小图片文章
 */
class SmallPic extends WP_Widget { //继承了 WP_Widget 这个类来创建新的小工具(Widget) 
    function __construct() { 
        // 主要内容方法 
        parent::__construct(
        				'SmallPic',
        				'YU小图片文章',
        				array(
        					'description' => '小图片文章，对指定分类，按照小图片展示'
        				)
        			);
    } 
    function form($instance) { 
        // 给小工具(widget) 添加表单内容
        $defaults = array(
        				'Articlenum' => 6,
        			); 
        $instance = wp_parse_args((array)$instance,$defaults);
        $title = htmlspecialchars($instance['title']);
        $id = htmlspecialchars($instance['id']);
        $Articlenum = htmlspecialchars($instance['Articlenum']);
        $args = array('orderby'=>'id','order'=>'ASC');
        $cats = get_categories($args);
        ?>
        <p>
        	<label for="<?php echo $this->get_field_id('title'); ?>">
        		<span>标题：</span>
        		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title');?>" value="<?php echo esc_attr($title); ?>" />
        	</label>
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('id'); ?>">
        		<span>选择分类：</span>
        		<select id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>">
        			<?php
        			foreach ($cats as $cat) {
        				# code...
        				if($cat->term_id == esc_attr($id)){
							echo "<option value=".$cat->term_id." selected>".$cat->name."</option>";
						}else{
							echo "<option value=".$cat->term_id.">".$cat->name."</option>";
						}
        			}
        			?>
        		</select>
        	</label>
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('Articlenum'); ?>">
        		<span>文章数量：</span>
        		<input type="text" name="<?php echo $this->get_field_name('Articlenum'); ?>" id="<?php echo $this->get_field_id('Articlenum'); ?>" value="<?php echo esc_attr($Articlenum); ?>">
        	</label>
        </p>
        <?php
    } 
    function update($new_instance, $old_instance) { 
        // 进行更新保存 
        $instance = $old_instance;
        $instance['title'] = htmlspecialchars($new_instance['title']);
        $instance['id'] = htmlspecialchars($new_instance['id']);
        $instance['Articlenum'] = htmlspecialchars($new_instance['Articlenum']);
        return $instance;
    } 
    function widget($args, $instance) { 
        // 输出显示在页面上 
        $title = htmlspecialchars($instance['title']);
        $id = htmlspecialchars($instance['id']);
        $Articlenum = htmlspecialchars($instance['Articlenum']);
        global $wp_query;
        $args = array('cat'=>$id,'posts_per_page'=>$Articlenum);
        $wp_query = new WP_Query($args);
        ?>
    	<div class="smallpic">
			<div class="smallpic-title">
				<span><a href="<?php echo get_category_link($id); ?>"><?php echo $title; ?></a></span>
				<a href="<?php echo get_category_link($id); ?>">+更多</a>
			</div>
			<div class="smallpic-content">
				<ul>
        <?php
        if($wp_query->have_posts()){
        	while ($wp_query->have_posts()):$wp_query->the_post();
        		?>
				<li>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<div class="contentbox">
							<img src="<?php echo catch_first_pic(); ?>">
							<span><?php the_title(); ?></span>
						</div>
						
					</a>
				</li>
        		<?php	
        	endwhile;
        }
        ?>
				</ul>
			</div>
		</div>
        <?php
        wp_reset_query();
    } 
}    


/**
 * 大图片文章
 */
class BigPic extends WP_Widget { //继承了 WP_Widget 这个类来创建新的小工具(Widget) 
    function __construct() { 
        // 主要内容方法 
        parent::__construct(
        				'BigPic',
        				'YU大图片文章',
        				array(
        					'description' => '对指定的分类，按照大图片进行显示'
        				)
        			);
    } 
    function form($instance) { 
        // 给小工具(widget) 添加表单内容 
        $defaults = array(
        				'Articlenum' => 6,
        			);
       	$instance = wp_parse_args((array)$instance,$defaults);
        $title = htmlspecialchars($instance['title']);
        $id = htmlspecialchars($instance['id']);
        $Articlenum = htmlspecialchars($instance['Articlenum']);
        $args = array('orderby'=>'id','order'=>'ASC');
        $cats = get_categories($args);
        ?>
        <p>
        	<label for="<?php echo $this->get_field_id('title'); ?>">
        		<span>标题：</span>
        		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title');?>" value="<?php echo esc_attr($title); ?>" />
        	</label>
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('id'); ?>">
        		<span>选择分类：</span>
        		<select id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>">
        			<?php
        			foreach ($cats as $cat) {
        				# code...
        				if($cat->term_id == esc_attr($id)){
							echo "<option value=".$cat->term_id." selected>".$cat->name."</option>";
						}else{
							echo "<option value=".$cat->term_id.">".$cat->name."</option>";
						}
        			}
        			?>
        		</select>
        	</label>
        </p>

        <p>
        	<label for="<?php echo $this->get_field_id('Articlenum'); ?>">
        		<span>文章数量：</span>
        		<input type="text" name="<?php echo $this->get_field_name('Articlenum'); ?>" id="<?php echo $this->get_field_id('Articlenum'); ?>" value="<?php echo esc_attr($Articlenum); ?>">
        	</label>
        </p>
        <?php
    } 
    function update($new_instance, $old_instance) { 
        // 进行更新保存 
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['id'] = strip_tags($new_instance['id']);
        $instance['Articlenum'] = strip_tags($new_instance['Articlenum']);
        return $instance;
    } 
    function widget($args, $instance) { 
        // 输出显示在页面上
        $title = htmlspecialchars($instance['title']);
        $id = htmlspecialchars($instance['id']);
        $Articlenum = htmlspecialchars($instance['Articlenum']);
        global $wp_query;
        $args = array('cat'=>$id,'posts_per_page'=>$Articlenum);
        $wp_query = new WP_Query($args);
        ?>
		<div class="bigpic">
			<div class="bigpic-title">
				<span><a href="<?php echo get_category_link($id); ?>"><?php echo $title; ?></a></span>
				<a href="<?php echo get_category_link($id); ?>">+更多</a>
			</div>
			<div class="bigpic-content">
				<ul>
        <?php
   		if($wp_query->have_posts()){
   			while($wp_query->have_posts()):$wp_query->the_post();
   				?>
				<li>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<div class="contentbox">
							<img src="<?php echo catch_first_pic(); ?>">
							<span><?php the_title(); ?></span>
						</div>						
					</a>
				</li>
   				<?php
   			endwhile;
   		}
   		?>
				</ul>
			</div>
		</div>
   		<?php
   		wp_reset_query();

    } 
}





/**
 * 最新文章
 */
class LasterArt extends WP_Widget { //继承了 WP_Widget 这个类来创建新的小工具(Widget) 
	    function __construct() { 
	        // 主要内容方法 
	        parent::__construct(
	        				'LasterArt',
	        				'YU最新文章',
	        				array(
	        					'description' => '显示最新的几篇文章'
	        				)
	        			);
	    } 
	    function form($instance) { 
	        // 给小工具(widget) 添加表单内容 
	        $defaults = array(
	        				'Articlenum' => 10,
	        				'day' => 7,
	        			);
	        $instance = wp_parse_args((array)$instance,$defaults);
	        $title = htmlspecialchars($instance['title']);
	        $Articlenum = htmlspecialchars($instance['Articlenum']);
	        $day = htmlspecialchars($instance['day']);

	        ?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">
					<span>标题：</span>
					<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr($title); ?>" />
				</label>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('day'); ?>">
					<span>时间范围：</span>
					<input type="text" name="<?php echo $this->get_field_name('day'); ?>" id="<?php echo $this->get_field_id('day'); ?>"  value="<?php echo esc_attr($day); ?>" />
				</label>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('Articlenum') ?>">
					<span>文章数量：</span>
					<input type="text" name="<?php echo $this->get_field_name('Articlenum'); ?>" id="<?php echo $this->get_field_id('Articlenum') ?>" value="<?php echo esc_attr($Articlenum); ?>">
				</label>
			</p>

		
	        <?php

	    } 
	    function update($new_instance, $old_instance) { 
	        // 进行更新保存 
	        $instance = $old_instance;
	        $instance['title'] = htmlspecialchars($new_instance['title']);
	        $instance['day'] = htmlspecialchars($new_instance['day']);
	        $instance['Articlenum'] = htmlspecialchars($new_instance['Articlenum']);
	        return $instance;
	    } 
	    function widget($args, $instance) { 
	        // 输出显示在页面上
	        global $wpdb;
	        $day = htmlspecialchars($instance['day']);
	        $Articlenum = htmlspecialchars($instance['Articlenum']);
	        $title = htmlspecialchars($instance['title']);
	        $today = date("Y-m-d H:i:s");
	        $dayago = date("Y-m-d H:i:s",(strtotime($today)-($day*24*60*60)));
	        $sql = "SELECT comment_count, ID, post_title, post_date FROM $wpdb->posts WHERE post_date BETWEEN '$dayago' AND '$today' ORDER BY post_date ASC LIMIT 0 , $Articlenum";
	        $result = $wpdb->get_results($sql);
	        $output = "";
	        ?>
			<div class="innerbar">
					<div class="innerbar-title">
						<span><?php echo $title ?></span>
					</div>
					<div class="innerbar-content">
						<ul>
	        <?php
	        if(empty($result)){
	        	$output = " ";
	        }else{
	        	foreach ($result as $re) {
	        		?>
					<li><a href="<?php echo get_permalink($re->ID); ?>" title="<?php echo $re->post_title; ?>"><?php echo $re->post_title; ?></a></li>
	        		<?php
	        	}

	        }

	        ?>
					</ul>
				</div>
			</div>
	        <?php
	    } 
	}


/**
 * 随机文章
 */
class RandomArt extends WP_Widget { //继承了 WP_Widget 这个类来创建新的小工具(Widget) 
    function __construct() { 
        // 主要内容方法 
        parent::__construct(
        				'RandomArt',
        				'YU随机文章',
        				array(
        					'description' => '随机输出文章，每次刷新都会改变文章',
        				)
        			);
    } 
    function form($instance) { 
        // 给小工具(widget) 添加表单内容
        $defaults = array(
        				'Articlenum' => 7,
        			); 
        $instance = wp_parse_args((array)$instance,$defaults);
        $title = htmlspecialchars($instance['title']);
        $Articlenum = htmlspecialchars($instance['Articlenum']);
        ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<span>标题：</span>
				<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr($title); ?>" />
			</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('Articlenum') ?>">
				<span>文章数量：</span>
				<input type="text" name="<?php echo $this->get_field_name('Articlenum'); ?>" id="<?php echo $this->get_field_id('Articlenum') ?>" value="<?php echo esc_attr($Articlenum); ?>">
			</label>
		</p>

        <?php
    } 
    function update($new_instance, $old_instance) { 
        // 进行更新保存 
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['Articlenum'] = strip_tags($new_instance['Articlenum']);
        return $instance;
    } 
    function widget($args, $instance) { 
        // 输出显示在页面上 
        $title = htmlspecialchars($instance['title']);
        $Articlenum = htmlspecialchars($instance['Articlenum']);
        $args = array(
        			'ignore_sticky_posts'=>1,
        			'showposts'=>$Articlenum,
        			'orderby'=>'rand'
        		);
        global $wp_query;
        $wp_query = new WP_Query($args);
        if($wp_query->have_posts()){
        	?>
        	<div class="innerbar">
					<div class="innerbar-title">
						<span><?php echo $title ?></span>
					</div>
					<div class="innerbar-content">
						<ul>
        	<?php
        	while($wp_query->have_posts()):$wp_query->the_post();
        		?>
				<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
        		<?php
        	endwhile;
        	?>
					</ul>
				</div>
			</div>
        	<?php
        }
        wp_reset_query();
    } 
}

function YU_widgets(){
	register_widget('ClassifiedArticle');
	register_widget('Begainpic');
	register_widget('ScrollPicture');
	register_widget('SmallPic');
	register_widget('BigPic');
	register_widget('LasterArt');
	register_widget('RandomArt');
}
add_action( 'widgets_init','YU_widgets');



?>