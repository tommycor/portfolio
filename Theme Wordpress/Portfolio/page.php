<?php get_header(); ?>
<div class="mainContent">
<article>	
	<?php if (have_posts()) : ?>
    	<?php while (have_posts()) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="separation"></div>
			<h2>Qu'est-ce qu'un factotum-multimédia?</h2>
			<br/>
			<?php the_content(); ?>
			<br/>
			<form id="contact" method="post" action="http://tommycor.cluster014.ovh.net/php/contact.php">
				<h3>Contactez moi</h3>
				<strong>Nom</strong><br/>
				<input type="text" name="name" id="name" >
				<br/>
				<br/>
				<strong>Email</strong>
				<br/>
				<input type="text" name="email" id="email" >
				<br/>
				<br/>
				<strong>Message</strong>
				<br/>
				<textarea name="message" id="message" rows="20" cols="200"></TEXTAREA>
				<br/><br/><br/><br/><br/><br/><br/><br/><br/>
				<div style="position: absolute; visibility: hidden; left: -5000; top : -5000">
                    <input type="checkbox" name="robot1" id="robot1" value="1" style="visibility: hidden;"><!--input anti robot-->
                    <input type="checkbox" name="robot2" id="robot2" value="1" checked style="visibility: hidden;">
            	</div>
				<input type="submit" value="Envoyer" id="envoyer">
				<!--div id="envoyer">Envoyer</div-->
			</form>
		<?php endwhile; ?>
		
  	<?php endif; ?>
  	<div class="clear">&nbsp</div>
</article>
</div>
<?php get_sidebar(); ?>
<?php get_footer();?> 

