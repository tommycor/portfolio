<?php
$firstParents = array();
$secondParents = array();
?>

<nav>
	<div class="menu">
	<div class="mainMenu">
		<ul>
			<?php
			$args = array(
				'parent'	=>0,
				'hide_empty'=>0,
				'hierarchical'	=>0,
				'exclude'	=>1,
				'order'     => 'desc'
			);
			$categories = get_categories($args);
			foreach ($categories as $category) {
				if ($category->slug == "profil"){
					echo '<a href="'.get_permalink("176").'">';
					echo '<li id="'.$category->slug.'">';
					echo '<h1>'.$category->name.'</h1>';
					echo '<div class="separationTitleMenu"></div><p>';
					echo $category->description;
					echo '</p></li>';
					echo '</a>';
					echo $link;
					$firstParents[] = $category->cat_ID;
				}
				else{
					echo '<li id="'.$category->slug.'">';
					echo '<h1>'.$category->name.'</h1>';
					echo '<div class="separationTitleMenu"></div><p>';
					echo $category->description;
					echo '</p></li>';
					$firstParents[] = $category->cat_ID;
				}
			}
			?>
		</ul>
	</div>


		<div class="subMenu1">
			<?php
			$args = array(
				'parent '	=>implode(",", $firstParents),
				'hide_empty'=>1,
				'hierarchical'	=>0,
				'exclude'	=>1,
				'order'     => 'desc'
			);
			$categories = get_categories($args);
			
			echo '<ul>';
				foreach ($categories as $category) {
					$parent = get_category($category->category_parent);
					echo '<li id="'.$category->slug.'" class="'.$parent->slug.'">';
					echo 	'<h1>'.$category->name.'</h1>';
					echo 	'<div class="separationTitleMenu"></div><p>';
					echo 	$category->description;
					echo '</p></li>';
					$secondParents[] = $category->cat_ID;
				}
				?>
			</ul>
		</div>


			<div class="subMenu2">
				<?php
				wp_reset_postdata();
				  
				query_posts('cat='.implode(",", $secondParents));

				// The Loop
				if ( have_posts() ) {
			        echo '<ul>';					/////////////////////////////////
					while ( have_posts()) : the_post();
						$parents = get_the_category(get_the_ID());
						echo '<a href="';
						the_permalink();
						echo '">';
						echo '<li class="'.$parents[0]->slug.'">';		
							if(get_the_title() == "Partager le regard"){
								echo '<h1>PLR</h1>';
							}		
							else if(get_the_title() == "Dancing Interface"){
								echo '<h1>DI</h1>';
							}	
							else if(get_the_title() == "Cuir A Paris"){
								echo '<h1>CAP</h1>';
							}
							else if(get_the_title() == "Mosaïque de DOM"){
								echo '<h1>Mosaïque DOM</h1>';
							}
							else{
								echo the_title('<h1>','</h1>');
							}
							echo '<div class="separationTitleMenu"></div><p>';
							echo strip_tags(get_the_tag_list('', '-', '' ));
						echo '</p></li>';
						echo '</a>';
					endwhile;
				    echo '</ul>';
				    echo '<div class="clear">&nbsp;</div>';
				}
				wp_reset_postdata();
				?>
			</div>
	</div>
		<div class="clear">&nbsp</div>

	<div class="separation"></div>
</nav>



		<div class="clear">&nbsp</div>