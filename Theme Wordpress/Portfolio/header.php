<html lang="fr">
	<head>
	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?></title>
	<meta name="description" content="Portfolio d'un Factotum Multimedia">
	<meta name="keywords" content="Factotum, Tommy Cornilleau, Portfolio, Multimedia">
	<meta name="author" content="Tommy Cornilleau">
	<meta property="og:title" content="<?php bloginfo('name'); ?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="http://tommycornilleau.fr/"/>
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favico_Tommy_Cornilleau.ico" />
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favico_Tommy_Cornilleau.png" />
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.0.3.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider-min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.33164.js"></script>
	
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
	</head>
	<body>
		<header>
			<a href="http://tommycornilleau.fr">
				<h1>Tommy Cornilleau</h1>
				<div class="separationTitleMenu"></div>
				<h2>Factotum -<br/>multimédia</h2>
				<div class="separation"></div>
				<h3>Portfolio</h3>
			</a>

			<?php if(isMobile()) echo "portable!";?>
		</header>