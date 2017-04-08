<?php get_header(); ?>
<?php include("header-nav.php"); ?>

<div id="mbxdh">
	<div>
		<a href="#"><?php the_title();?></a>				
	</div>
</div>
<div id="container">

	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
	<section class="whole_article" id="article-<?php the_ID(); ?>">
		<article <?php post_class(); ?> id="entry">
			<h2 id="article-title">

				<?php   $custom_fields = get_post_custom_keys($post_id);
				if (!in_array ('copyright', $custom_fields)) : ?>
				<span class = "title-meta-yuanchuang title-meta-ico"></span>
				<?php else: ?>
				<span class = "title-meta-zhuanzai title-meta-ico"></span>
				<?php endif; ?>

				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>

				<?php   //$custom_fields = get_post_custom_keys($post_id);
				if (in_array ('recommend', $custom_fields)) : ?>
				<span class = "title-meta-recommend title-meta-ico"></span>
				<?php endif; ?>



				<?php $views = intval( get_post_meta( get_the_ID(), 'views', true ) );
				if ($views > 1000): ?>
				<span class = "title-meta-huo title-meta-ico"></span>
				<?php endif; ?>


			</h2>
			

            <div class="post-meta">

                <span class="meta-author meta-ico"><?php the_author_posts_link(); ?> </span>
            	<?php //the_time('Y年n月j日')?>
                <span class="meta-time meta-ico"> 最后修改于 <?php the_modified_time('Y-m-d'); ?></span>
             	发表于 <?php the_time('Y-m-d'); ?>

                
                
                
                
                <span class="meta-view meta-ico"><?php if(function_exists('the_views')) { the_views(); } ?></span>
                <span class="meta-comment meta-ico"><?php comments_popup_link('0', '1', '%'); ?></span>

                <br><br>

                <span class="meta-category meta-ico">      <?php the_category(', ') ?> </span>
                <span class="meta-category meta-ico">      <?php the_tags(' ') ?> </span>

                <?php edit_post_link('Edit', ' &#124; ', ''); ?>


                
			</div>
			
			
            <div id="article-content">
				<?php the_content(); ?>
			</div>
		</article>

		<div class="social-main">
			<div class="post-like">
			    <a href="javascript:;" data-action="ding" data-id="<?php the_ID(); ?>" class="specsZan <?php if(isset($_COOKIE['specs_zan_'.$post->ID])) echo 'done';?>">点赞 <span class="count">
			        <?php if( get_post_meta($post->ID,'specs_zan',true) ){
			            		echo get_post_meta($post->ID,'specs_zan',true);
			                } else {
								echo '0';
							}?></span>
			    </a>
			</div>

			<div class="reward-button"><a href="http://www.yalewoo.com/denote" target="_blank">赏</a> 
				<span class="reward-code">
					<span class="alipay-code"> <img class="alipay-img wdp-appear" src="<?php bloginfo('template_directory'); ?>/img/alipay.png"><b>支付宝打赏</b> </span> <span class="wechat-code"> <img class="wechat-img wdp-appear" src="<?php bloginfo('template_directory'); ?>/img/wechatpay.png"><b>微信打赏</b> </span>
				</span>
			</div>

			<div class="bdsharebuttonbox"><div>分享到：</div><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_more" data-cmd="more"></a></div>
			
			<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
			

		</div>
		
		<div class="reward-notice">
			<p class="">如果文章对你有帮助，欢迎点赞或打赏（金额不限）。你的打赏将全部用于支付网站服务器费用和提高网站文章质量，谢谢支持。</p>
		</div>
		
			
		

		



		

		

		<div class="article-copyright">
            <?php   $custom_fields = get_post_custom_keys($post_id);
			if (!in_array ('copyright', $custom_fields)) : ?>
    			<b> 版权声明: </b>
    			<p> 本文由 <?php the_author_posts_link(); ?> 原创，商业转载请联系作者获得授权。 <br>非商业转载请注明作者 <?php the_author_posts_link(); ?> 或 <a href="http://www.yalewoo.com/" title="雅乐网" ?>雅乐网</a> ，并附带本文链接：<br><a href="<?php the_permalink()?>" title=<?php the_title(); ?>><?php the_permalink()?></a></p>
				<?php else: ?>
			<?php  $custom = get_post_custom($post_id);
       		$custom_value = $custom['copyright']; ?>
   				<b> 转载声明: </b> 
   				<p>本文来源于 <a rel="nofollow" target="_blank" href="/go.php?url=<?php echo $custom_value[0] ?>"><?php echo $custom_value[0] ?></a>
			<?php endif; ?>
		</div>

		<div class="post-navigation">
			<div class="post-previous">
				<p>上一页：</p>
				<?php previous_post_link("%link") ?>
			</div>
			<div class="post-next">
				<p>下一页：</p>
				<?php next_post_link("%link") ?>
			</div>
		</div>


		<div class="related_posts">
			<p>与 <?php the_tags(' ') ?> 相关的文章</p>
			<ul>
				<?php
				$post_num = 8;
				$exclude_id = $post->ID;
				$posttags = get_the_tags(); $i = 0;
				if ( $posttags ) {
					$tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->term_id . ',';
					$args = array(
						'post_status' => 'publish',
						'tag__in' => explode(',', $tags),
						'post__not_in' => explode(',', $exclude_id),
						'caller_get_posts' => 1,
						'orderby' => 'comment_date',
						'posts_per_page' => $post_num,
					);
					query_posts($args);
					while( have_posts() ) { the_post(); ?>
						<li><a rel="bookmark" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></li>
					<?php
						$exclude_id .= ',' . $post->ID; $i ++;
					} wp_reset_query();
				}
				if ( $i < $post_num ) {
					$cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';
					$args = array(
						'category__in' => explode(',', $cats),
						'post__not_in' => explode(',', $exclude_id),
						'caller_get_posts' => 1,
						'orderby' => 'comment_date',
						'posts_per_page' => $post_num - $i
					);
					query_posts($args);
					while( have_posts() ) { the_post(); ?>
						<li><a rel="bookmark" href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></li>
					<?php $i++;
					} wp_reset_query();
				}
				if ( $i  == 0 )  echo '<li>没有相关文章!</li>';
				?>
			</ul>
		</div>



		<div class="comments-template">
    		<?php comments_template('', true); ?>
		</div>  


        <?php endwhile; ?>

		
			<?php else : ?>
		<section class="whole_article">
    		<h2><?php _e("Not Found"); ?></h2>
		</section>

        <?php endif; ?>

	</section>
	


	<?//php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
