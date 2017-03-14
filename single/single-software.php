		<?php get_header(); ?>
		<style>
            #article-content ul:nth-last-child(1){
                border: 2px solid #c9dd22;
                filter:progid:DXImageTransform.Microsoft.Shadow(color=#909090,direction=120,strength=4);/*ie*/
				-moz-box-shadow: 2px 2px 10px #909090;/*firefox*/
				-webkit-box-shadow: 2px 2px 10px #909090;/*safari或chrome*/
				box-shadow:2px 2px 10px #909090;/*opera或ie9*/

                list-style: none;
                line-height: 1.5;
                padding: 5px;
                margin-top: 25px;
                text-indent: 2em;
                

            }
            #article-content ul:nth-last-child(1) li:first-child{
            	color: #ff8936;
            	font-weight: bold;
            	text-align: center;
            }
            
		</style>
		<div id="mbxdh">
				<div>
					
					<?php
					$categorys = get_the_category();
					$category = $categorys[0];
					echo( get_category_parents($category->term_id,true,' &raquo; ') );
					the_title();
					?>
				</div>
		</div>
		<div id="container">

    		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			<section class="whole_article" id="article-<?php the_ID(); ?>">
				<article id="entry">
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
	                    <span class="meta-time meta-ico"><?php the_time('Y-m-d'); ?></span>
	                     - <?php the_modified_time('Y-m-d'); ?>

	                    
	                    
	                    
	                    
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

				<?php   //$custom_fields = get_post_custom_keys($post_id);
				if (in_array ('recommend', $custom_fields)) : ?>
					<div class="reward-button">赏 
						<span class="reward-code">
							<span class="alipay-code"> <img class="alipay-img wdp-appear" src="<?php bloginfo('template_directory'); ?>/img/alipay.png"><b>支付宝打赏</b> </span> <span class="wechat-code"> <img class="wechat-img wdp-appear" src="<?php bloginfo('template_directory'); ?>/img/wechatpay.png"><b>微信打赏</b> </span>
						</span>
					</div>
					<p class="reward-notice">如果文章对你有帮助，欢迎点击上方按钮打赏作者(<?php the_author_posts_link(); ?>)。你的打赏将全部用于网站服务器费用以及网站文章的更新</p>
				<?php endif; ?>

				



				

				

				<div class="article-copyright">
		            <?php   $custom_fields = get_post_custom_keys($post_id);
	    			if (!in_array ('copyright', $custom_fields)) : ?>
		    			<b> 版权声明: </b>
		    			<p> 本文由(<?php the_author_posts_link(); ?>)原创，转载请注明作者 <?php the_author_posts_link(); ?> 或 <a href="http://www.yalewoo.com/" title="雅乐网" ?>雅乐网</a> ，并附带原文链接: <a href="<?php the_permalink()?>" title=<?php the_title(); ?>><?php the_permalink()?></a></p>
	   				<?php else: ?>
					<?php  $custom = get_post_custom($post_id);
	           		$custom_value = $custom['copyright']; ?>
		   				<b> 转载声明: </b> 
		   				<p>本文来源于 <a rel="nofollow" target="_blank" href="/go.php?url=<?php echo $custom_value[0] ?>"><?php echo $custom_value[0] ?></a>
	    			<?php endif; ?>
				</div>

				<div class="post-navigation">
					<div class="post-previous">
						<p>上一篇：</p>
						<?php previous_post_link("%link") ?>
					</div>
					<div class="post-next">
						<p>下一篇：</p>
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
	</body>
</html>