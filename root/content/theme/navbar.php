<?php
/**
 *	NAVIGATION MENU
 *
 *	This file should be included after <body> tag in each header file.
 *	To improve it, please refer to bootstrap nav menu:
 *		http://twitter.github.com/bootstrap/components.html#navbar
 *
**/

?>

	<div class="navbar navbar-inverse navbar-static-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="<?php echo URL_HOME; ?>">CoPass Connect</a>
			<ul class="nav pull-right">
<?php
/**
 *	CODE TO DISPLAY ALL PAGES - SHOULD BE REMOVED IN PRODUCTION
 *
**/
if ( defined( 'ENVIRONMENT' ) && 'test' == ENVIRONMENT ) :

?>
				<li class="dropdown">
					<a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">All Pages (testing site) <b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
					<?php
						foreach ( glob( DIR_THEME . '/page-*.php' ) as $filename ){
							$page = substr( basename( $filename, '.php'), 5 );
							echo "<li><a href='?p={$page}'>{$page}</a></li>";
						}
					?>
					</ul>
				</li>
<?php
endif;
/**
 *	CODE TO DISPLAY ALL PAGES - END
 *
**/
?>
			</ul>
			</div>
		</div>
	</div>
	<script>jQuery(function($) { $(".dropdown-toggle").dropdown(); })</script>
