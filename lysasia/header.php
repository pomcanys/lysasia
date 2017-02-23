<!DOCTYPE html>
<html lang="de-ch">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="robots" content="index, follow">

		<title><?php
			// Print the <title> tag based on what is being viewed.
			global $page, $paged;
			wp_title( '-', true, 'right' );
			// Add the blog name.
			bloginfo( 'name' );
			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " - $site_description";
		?></title>

		 <!-- Favicons -->
		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo( 'template_url' ); ?>/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="<?php bloginfo( 'template_url' ); ?>/favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php bloginfo( 'template_url' ); ?>/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?php bloginfo( 'template_url' ); ?>/favicons/manifest.json">
		<link rel="mask-icon" href="<?php bloginfo( 'template_url' ); ?>/favicons/safari-pinned-tab.svg" color="#ab0651">
		<meta name="theme-color" content="#ffffff">

		<!-- Social Media -->
	<?php if (is_front_page()) { ?>
		<meta property="og:url"         content="https://lys-asia.ch">
		<meta property="og:type"        content="website"> <!-- website, article, blog, ... http://ogp.me/#types -->
		<meta property="og:title"       content="LY'S ASIA"> <!-- title of article without site name -->
		<meta property="og:description" content="Asia Restaurant &amp; Take Away &amp; Prime Dine beim Prime Tower in Zürich">
		<meta property="og:image"       content="<?php bloginfo( 'template_url' ); ?>/screenshot_og.jpg"> <!-- min 600 x 315 / max 1200 x 630) -->
		<meta property="og:site_name"   content="LY'S ASIA">
	<?php } ?>

	<?php if (is_single()) {
		$image_id = get_post_thumbnail_id();
		$ogimageurl = wp_get_attachment_image_src($image_id,'full', true);?>
		<meta property="og:url"         content="<?php the_permalink() ?>">
		<meta property="og:title"       content="<?php single_post_title(''); ?>"> <!-- title of article without site name -->
		<meta property="og:type"        content="article">
		<meta property="og:image"       content="<?php echo $ogimageurl[0]; ?>">
		<meta property="og:site_name"   content="LY'S ASIA">
	<?php } ?>

		<!-- Custom styles for this template -->
		<link href="<?php bloginfo( 'template_url' ); ?>/css/styles.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
        <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/jquery.formstyler.css">
        <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/woocommerce.css">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- WP-Head
		================================================== -->
		<?php wp_head(); ?>

	</head>
	<?php if (is_front_page()) { ?>
	<body <?php body_class('front'); ?> >
	<?php } else { ?>
	<body <?php body_class('page'); ?> >
	<?php } ?>

	<body class="front">
		<div class="page-wrap">
			<div id="main" class="clearfix">
				<div class="container">
							
					<header class="header">
						<nav class="navbar navbar-default">
							<div class="container">
								<div class="navbar-header">
								<div class="col-xs-6 col-md-2 col-lg-3">
									<div class="logo">
										<a href="/"><img src="<?php bloginfo( 'template_url' ); ?>/img/lys-asia-logo.svg" alt="LY's ASIA Logo" width="48" height="73" /></a>
									</div>
									<h1 class="sr-only">LY’s Asia</h1>
								</div>

								<!-- Cart -->
                <div class="warenkorb">
                  <span class="cart">
                    <img src="img/cart.svg" alt="Warenkorb" width="24" height="18" />0 
                  </span>
                  <span class="login">
                    <a href="#">Login</a>
                  </span>
                </div>

								<div class="col-xs-6 col-md-10 col-lg-9">
									<div class="menu-btn icon-menu" role="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
										<span class="menu-text">MENU</span>
									</div>
								</div>

								<div id="navbar" class="navbar-collapse collapse nav-wrap">

																							<?php
																wp_nav_menu( array(
																		'menu'              => 'primary',
																		'theme_location'    => 'primary',
																		'depth'             => 1,
																		'container'         => 'false',
																		'menu_id'           => 'line',
																		'menu_class'        => 'navbar-nav navbar-right group ',
																		'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
																		'walker'            => new wp_bootstrap_navwalker()
																		)
																);
														?>
								</div>


								<!--/.nav-collapse -->
							</div><!--/.container -->
						</nav>
					</header><!-- /.header -->

		
