		<?php get_header(); ?>

		<style type="text/css">
			#topheader + nav {
				margin-bottom: 20px;
			}
			#slideshow{position:relative;height:400px;width:960px;border:0px solid #ddd;}
			#slideshow div{position:absolute;top:0;left:0;z-index:8;opacity:0.0;height:400px;overflow:hidden;background-color:#FFF;}
			#slideshow div.current{z-index:10;}
			#slideshow div.current span{z-index:11;}
			#slideshow div.prev{z-index:9;}
			#slideshow div img{display:block;border:0;margin-bottom:10px;height:400px;width:960px;}
			#slideshow div span{display:none;position:absolute;top:10%;left:20%;height:50px;line-height:50px;font-size:50px;/*background:#000;*/color:#fff;/*width:100%;*/}
			#slideshow div.current span{display:block;}
		</style>
		
		<div id="container">

			<div id="slideshow" class="picShow" id="picShow">
			    <div class="current">
			        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/slide/1.jpg" alt="" /></a>
			        <span>快乐学车，安全驾驶</span>
			    </div>
			    <div>
			        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/slide/2.jpg" alt="" /></a>
			        <span>快乐学车，安全驾驶</span>
			    </div>
			    <div>
			        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/slide/3.jpg" alt="" /></a>
			        <span>快乐学车，安全驾驶</span>
			    </div>
			    <div>
			        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/slide/4.jpg" alt="" /></a>
			        <span>快乐学车，安全驾驶</span>
			    </div>
			    <div>
			        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/slide/5.jpg" alt="" /></a>
			        <span>快乐学车，安全驾驶</span>
			    </div>
			</div>


			<section id="blog">
				<div id="news">
					<div class="mhq">
						<h3>驾校动态</h3>
						<sub></sub>
					</div>
				</div>
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

<script type="text/javascript" src="http://libs.baidu.com/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
function slideSwitch() {
	var $current = $("#slideshow div.current");
	// 判断div.current个数为0的时候 $current的取值
	if ( $current.length == 0 ) $current = $("#slideshow div:last");
	// 判断div.current存在时则匹配$current.next(),否则转到第一个div
	var $next =  $current.next().length ? $current.next() : $("#slideshow div:first");
	$current.addClass('prev');
	$next.css({opacity: 0.0}).addClass("current").animate({opacity: 1.0}, 1000, function() {
			//因为原理是层叠,删除类,让z-index的值只放在轮转到的div.current,从而最前端显示
			$current.removeClass("current prev");
		});
}
$(function() {
	$("#slideshow span").css("opacity","0.7");
	$(".current").css("opacity","1.0");
	// 设定时间为3秒(1000=1秒)
    setInterval( "slideSwitch()", 3000 ); 
});


</script>


	</body>
</html>