		<?php get_header(); ?>

		
		<div id="container">

			<div class="picShow" id="picShow">
                <div class="ps-cont">
				    <a href="http://www.infinitus.com.cn/zt/2015dream/" target="_blank"><img src="http://wwwimg.infinitus.com.cn/up/2015/0216/orig_1424077966174.jpg" /></a>    
				</div>

			</div>


			<section id="blog">
	    		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<article class="post" id="post-<?php the_ID(); ?>">
					
					<h2 class="post-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" onclick="this.innerHTML='正在拼命加载中...'"><?php the_title(); ?></a>
					</h2>
					<div class="post-meta">
	                    <?php the_time('Y年n月j日')?>

	                    <?php _e('分类&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?>
	                    <?php comments_popup_link('快抢沙发 &#187;', '沙发被抢 &#187;', '% 评论 &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
	                     <?php if(function_exists('the_views')) { the_views(); } ?>
					</div>

					

						

					<div class="post-thumb">
					<img src="<?php echo catch_first_image() ?>" alt="<?php the_title(); ?>" />
					</div>

					<div class="post-content">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink() ?>">阅读233全文</a>
					
					
				</article>
				<?php endwhile; ?>
				<div class="article_nav">
	            	<?php posts_nav_link(); ?>
	        	</div>
	    
	   			<?php else : ?>
	        		<div class="post">
	            	<h2><?php _e("Not Found"); ?></h2>
	        	</div>
				<?php endif; ?>
	    	</section>

	    	<?php get_sidebar(); ?>
	    </div>
    	<?php get_footer(); ?>
	</body>
</html>