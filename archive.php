<?php get_header(); ?>
<?php include("header-nav.php"); ?>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/tiaozhuanyema.js"></script>

<div id="mbxdh">
	<div>
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

		<?php include("post-article.php"); ?>
		
	</section>

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
