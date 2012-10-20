<?php global $HTML; ?>
<!DOCTYPE html>
<html lang='<?php echo $HTML->head['lang']; ?>'>
<head>
	<?php print_heads(); ?>

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
			<h1>HELLO WORLD!</h1>
		</div>
	</header>

	<div id="container" class="container">
		<div>


