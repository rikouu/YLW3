<?php get_header(); ?>
<?php include("header-nav.php"); ?>



<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/tiaozhuanyema.js"></script>

<div id="container">

	<section id="blog">
        <?php /*$posts = query_posts($query_string . '&orderby=modified');*/?>
		
        <?php include("post-article.php"); ?>

	</section>

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
