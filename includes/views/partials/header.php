<?php
	$title = 'Mockup Device Generator - Pol Solà';
	$description = 'Generate mockups from your designs with the device you want';
	$image = 'http://mockups.polsola.com/static/images/mockups-polsola.jpg';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/static/images/favicon.png" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php echo $description; ?>" />
	<meta name="description" content="<?php echo $description; ?>"/>
	<meta property="og:url" content="http://mockups.polsola.com" />
	<meta property="og:site_name" content="<?php echo $title; ?>" />
	<meta property="og:image" content="<?php echo $image; ?>" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="800" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:description" content="<?php echo $description; ?>" />
	<meta name="twitter:title" content="<?php echo $title; ?>" />
	<meta name="twitter:image" content="<?php echo $image; ?>" />
	<!-- Apple Devices Icons -->
	<link rel="apple-touch-icon-precomposed" href="http://mockups.polsola.com/static/images/apple-touch-icon.png" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="Mockups">
	<!-- END Apple Devices Icons -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="static/styles/style.css" />
	<script type="text/javascript" src="static/scripts/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="static/scripts/dropzone.min.js"></script>
	<script type="text/javascript" src="node_modules/file-saver/FileSaver.min.js"></script>
	<script type="text/javascript" src="node_modules/jszip/dist/jszip.min.js"></script>
	<script type="text/javascript" src="static/scripts/app.js"></script>
</head>
<body>
	<main class="app">
		<h1 class="app__brand"><a class="app__brand__link" href="http://www.polsola.com/" target="_blank">Mockup Device Generator - Pol Solà</a></h1>
		<aside class="app__aside">
			<nav class="app__aside__nav">
				<ul class="page-nav">
					<li class="page-nav__item<?php if($page == 'index'):?> page-nav__item--active<?php endif; ?>">
						<a href="/" class="page-nav__item__link page-nav__item__link--devices">
							<img src="/static/images/icons/devices.svg" alt="Devices">
							Devices
						</a>
					</li>
					<li class="page-nav__item<?php if($page == 'compose'):?> page-nav__item--active<?php endif; ?>">
						<a href="/compose" class="page-nav__item__link page-nav__item__link--compose">
							<img src="/static/images/icons/compose.svg" alt="Compose">
							Compose
						</a>
					</li>
				</ul>
			</nav>
		</aside>
		<header class="app__header">
			<span class="app__header__title device_selected">Device image generator</span>
			<?php if( $page == 'index'): ?>
				<div class="app__header__size">Recommended size: <strong class="screen-width"></strong>x<strong class="screen-height"></strong> px</div>
			<?php endif; ?>
			
			<div class="app__header__buttons">
				<!-- Place this tag where you want the button to render. -->
				<a class="github-button" href="https://github.com/polsola" data-size="large" aria-label="Follow @polsola on GitHub">Follow @polsola</a>
				<!-- Place this tag where you want the button to render. -->
				<a class="github-button" href="https://github.com/polsola/mockup-device-generator" data-icon="octicon-star" data-size="large" aria-label="Star polsola/mockup-device-generator on GitHub">Star</a>
			</div>
		</header>
