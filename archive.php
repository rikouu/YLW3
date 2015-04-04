		<?php get_header(); ?>

		<style type="text/css">
			#topheader + nav {
				margin-bottom: 5px;
			}
		</style>

		<div id="mbxdh">
			<div>
				<?php
				// $categorys = get_the_category();
				// $category = $categorys[0];
				// echo( get_category_parents($category->term_id,true,'') );
				?>
				<?php
					if( is_single() ){
					$categorys = get_the_category();
					$category = $categorys[0];
					echo( get_category_parents($category->term_id,true,' &raquo; ') );
					the_title();
					} 
					else 
					{
						echo "<a href=\"#\">";
						if ( is_page() ){
						the_title();
						} elseif ( is_category() ){
						single_cat_title();
						} elseif ( is_tag() ){
						single_tag_title();
						} elseif ( is_day() ){
						the_time('Y年Fj日');
						} elseif ( is_month() ){
						the_time('Y年F');
						} elseif ( is_year() ){
						the_time('Y年');
						} elseif ( is_search() ){
						echo $s.' 的搜索结果';
						}
						echo "</a>";
					}
				?>
			</div>
		</div>

		<div id="container">

			


			<section id="blog">

	    		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
				<article class="post" id="post-<?php the_ID(); ?>">
					
					<div class="post-thumb">
						<img src="<?php echo catch_first_image() ?>" alt="<?php the_title(); ?>" />
					</div>

					<div id="post-right">
						<h2 class="post-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" onclick="this.innerHTML='正在拼命加载中...'"><?php the_title(); ?></a>
						</h2>

						<div class="post-meta">
		                    <?php the_time('Y年n月j日')?>
						</div>

						<div class="post-content">
							<?php the_excerpt(); ?>
						</div>
					</div>
					
					
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