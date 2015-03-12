<?php
get_header();
get_sidebar();?>
<div class="main">
  <h1>Catégorie : <?php single_cat_title(); ?></h1>
  <?php get_template_part('loop'); ?>
</div>
<?php get_footer();
?>
