		<?php get_header(); ?>
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
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h2>
					
	                <div class="post-meta">
	                    最近更新：<?php the_modified_time('Y年n月j日')?>

	                    <?php _e('分类&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?>
	                    <?php comments_popup_link('快抢沙发 &#187;', '沙发被抢 &#187;', '% 评论 &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
	                     <?php if(function_exists('the_views')) { the_views(); } ?>
					</div>
					<div id="article-excerpt">
						<?php the_excerpt(); ?>
					</div>
	                <div id="article-content">
						<?php the_content(); ?>
					</div>
				</article>
				<div id="otherdata">
					<?php link_pages('<p><strong>Pages:</strong>', '</p>', 'number'); ?>

	                
	            <?php   $custom_fields = get_post_custom_keys($post_id);
    			if (!in_array ('copyright', $custom_fields)) : ?>
				<div class="article-copyright">
	    			<p><b> 声明: </b> 本文由(<a href="<?php bloginfo('home'); ?>"> <?php the_author(); ?> </a>)原创，转载请保留本文链接: <a href="<?php the_permalink()?>" title=<?php the_title(); ?>><?php the_permalink()?></a></p>
				</div>
   				<?php else: ?>
				<?php  $custom = get_post_custom($post_id);
           		$custom_value = $custom['copyright']; ?>
				<div class="article-copyright">
	   				<p><b> 声明: </b> 本文来源于 <a rel="nofollow" target="_blank" href="/go.php?url=<?php echo $custom_value[0] ?>"><?php echo $custom_value[0] ?></a> ，由(<a href="<?php bloginfo('home'); ?>"> <?php the_author(); ?> </a>) 整编。</p>
	  				<p><b> 本文链接: </b><a href="<?php the_permalink()?>" title=<?php the_title(); ?>><?php the_permalink()?></a> .</p>
    			</div>
    			<?php endif; ?>

	    			

	    			<div class="comments-template">
	            		<?php comments_template('', true); ?>
	        		</div>  

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