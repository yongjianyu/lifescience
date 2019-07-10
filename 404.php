<?php get_header(); ?>
<!-- Error begin -->
<div class="error404">
    <h4>抱歉，您访问的页面不存在!</h4>
    <span>The requested URL was not found on this server. </span>
    <strong>您可以尝试以下操作：</strong>
    <ol>
            <li>检查输入的网址是否正确；</li>
            <li>进入<a href="<?php bloginfo('siteurl');?>/">网站首页</a>，浏览更多精彩内容；</li>
            <li>使用站内搜索查找内容。</li>
        </ol>
    <!-- Search begin -->
    <?php get_template_part('searchform'); ?>
    <!-- Search end -->
</div>
<!-- Error end -->
<?php get_footer(); ?>