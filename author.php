		<?php get_header(); ?>

		<style type="text/css">
			#topheader + nav {
				margin-bottom: 5px;
			}
			#authordiv{
				border: 5px solid #e0d4af;
				padding: 10px;
				margin: 10px 0 10px 0;
			}
			#authordiv h3{
				text-align: center;
			}
			.author_da {
				line-height: 200%;
			}
			.avatar{
				float: right;
			}
			#fixed{
				clear: both;
			}
		</style>

		<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/tiaozhuanyema.js"></script>

		<div id="container">

			
			<?php
				if(isset($_GET['author_name'])) :
				$curauth = get_userdatabylogin($author_name);
				else :
				$curauth = get_userdata(intval($author));
				endif;
			?>
			<div id="authordiv">
				<h3>作者档案</h3>
				<div class="author_da">

					<?php if($curauth->touxiang){ ?><div class="avatar"><img src="<?php echo $curauth->touxiang; ?>" /></div><?php } ?>
					<?php if($curauth->display_name){ ?><p><b>昵称：</b><?php echo $curauth->display_name; ?></p><?php } ?>
					<?php if($curauth->job){ ?><p><b>职业：</b><?php echo $curauth->job; ?></p><?php } ?>
					<?php if($curauth->addres){ ?><p><b>所在地：</b><?php echo $curauth->addres; ?></p><?php } ?>
					<?php if($curauth->user_url){ ?><p><b>主页：</b> <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p><?php } ?>
					<?php if($curauth->user_email){ ?><p><b>邮箱：</b><?php the_author_meta('email') ?></p><?php } ?>
					<?php if($curauth->qq){ ?><p><b>QQ：</b><?php echo $curauth->qq; ?></p><?php } ?>
					<?php if($curauth->description){ ?><p><b>个人简介：</b><?php echo $curauth->description; ?></p><?php } ?>
				</div>
				<div id="fixed"></div>
			</div>

			<section id="blog">

				<h3 style="margin-bottom: 50px;">该作者的所有文章：</h3>


	    		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<article class="post" id="post-<?php the_ID(); ?>">
					
					<h2 class="post-title">
						<?php   $custom_fields = get_post_custom_keys($post_id);
						if (!in_array ('copyright', $custom_fields)) : ?>
						<span class = "title-meta-yuanchuang title-meta-ico"></span>
						<?php else: ?>
						<span class = "title-meta-zhuanzai title-meta-ico"></span>
						<?php endif; ?>




						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" onclick="this.innerHTML='正在拼命加载中...'"><?php the_title(); ?></a>

						<?php   //$custom_fields = get_post_custom_keys($post_id);
						if (in_array ('recommend', $custom_fields)) : ?>
						<span class = "title-meta-recommend title-meta-ico"></span>
						<?php endif; ?>



						<?php $views = intval( get_post_meta( get_the_ID(), 'views', true ) );
						if ($views > 1000): ?>
						<span class = "title-meta-huo title-meta-ico"></span>
						<?php endif; ?>
					</h2>
					
						

					<div class="post-thumb">
					<img src="<?php echo catch_first_image() ?>" alt="<?php the_title(); ?>" />
					</div>

					<div class="post-content">
						<?php the_excerpt(); ?>
							<div class="post-meta">
		                    <?php //the_time('Y年n月j日')?>
		                    <span class="meta-time meta-ico"><?php the_modified_time('Y-m-d'); ?></span>

		                    
		                    <span class="meta-author meta-ico"><?php the_author_posts_link(); ?> </span>
		                    
		                    
		                    <span class="meta-view meta-ico"><?php if(function_exists('the_views')) { the_views(); } ?></span>
		                    <span class="meta-comment meta-ico"><?php comments_popup_link('0', '1', '%'); ?></span>

		                    <span class="meta-category meta-ico"><?php the_category(', ') ?> </span>

		                    <?php edit_post_link('Edit', ' &#124; ', ''); ?>
						</div>
					</div>
					<!-- <a href="<?php the_permalink() ?>">阅读全文</a> -->
					
					
				</article>
				<?php endwhile; ?>
				<div class="page_navi">
					<?php par_pagenavi(6); ?>
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