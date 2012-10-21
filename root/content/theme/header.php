<!DOCTYPE html>
<html lang='<?php echo DEFAULT_LANG ?>'>
<head>
	<title><?php echo DEFAULT_TITLE; ?></title>

	<meta charset='<?php echo DEFAULT_CHARSET; ?>' />
	<meta name='author' content='<?php echo DEFAULT_AUTHOR; ?>' />
	<meta name='description' content='<?php echo DEFAULT_DESCRIPTION; ?>' />
	<meta name='keywords' content='<?php echo DEFAULT_KEYWORDS; ?>' />

	<link rel='icon' href='favicon.ico' type='image/vnd.microsoft.icon' />

	<!-- styles -->
	<?php load_style( 'bootstrap.css' ); ?>

	<script>
		homeurl='<?php echo URL_HOME; ?>';
		ajaxurl='<?php echo URL_HOME; ?>ajax.php';
	</script>

	<!-- scripts -->
	<?php load_script( 'jquery-1.8.2.min.js' ); ?>
	<?php load_script( 'bootstrap.min.js' ); ?>
	<?php load_script( 'jquery.easing-1.3.pack.js' ); ?>

</head>

<body>

	<?php include( 'navbar.php' ); ?>

	<header class="container">
		<div class="page-header">
			<h1>HELLO CO-PASS!</h1>
		</div>
	</header>

	<div id="container" class="container">
		<div>


