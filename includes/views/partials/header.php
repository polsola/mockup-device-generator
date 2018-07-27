<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mockup Device Generator</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="static/styles/style.css" />
	<script type="text/javascript" src="static/scripts/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="static/scripts/dropzone.min.js"></script>
	<script type="text/javascript" src="static/scripts/app.js"></script>
</head>
<body>
	<main class="app">
		<h1 class="app__brand">Device image generator</h1>
		<aside class="app__aside">
			<nav class="app__aside__nav">
				<ul class="page-nav">
					<li class="page-nav__item<?php if($page == 'index'):?> page-nav__item--active<?php endif; ?>"><a href="/" class="page-nav__item__link page-nav__item__link--devices">Devices</a></li>
					<li class="page-nav__item<?php if($page == 'compose'):?> page-nav__item--active<?php endif; ?>"><a href="/compose" class="page-nav__item__link page-nav__item__link--compose">Compose</a></li>
				</ul>
			</nav>
		</aside>
		<header class="app__header">
			<span class="app__header__title device_selected">Device image generator</span>
			<div class="app__header__size">Recommended size: <strong class="screen-width"></strong>x<strong class="screen-height"></strong> px</div>
			<!-- Place this tag where you want the button to render. -->
			<a class="github-button" href="https://github.com/polsola" data-size="large" aria-label="Follow @polsola on GitHub">Follow @polsola</a>
			<!-- Place this tag where you want the button to render. -->
			<a class="github-button" href="https://github.com/polsola/mockup-device-generator" data-icon="octicon-star" data-size="large" aria-label="Star polsola/mockup-device-generator on GitHub">Star</a>
		</header>
