<?php get_header(); ?>
<div class="mainContent">
<article>	
	<?php if (have_posts()) : ?>
    	<?php while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="separation"></div>
			<?php echo ('<h2>'.strip_tags(get_the_tag_list('', ' - ', '' )).'</h2>'); ?>
			<br/>
			<?php the_content(); ?>
			<br/>
		<?php endwhile; ?>
  	<?php endif; ?>
  	<div class="clear">&nbsp</div>
</article>
</div>
<?php get_sidebar(); ?>
<?php get_footer();?> 

