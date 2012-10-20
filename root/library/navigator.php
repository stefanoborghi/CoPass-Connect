<?php

#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	NAVIGATOR
#	contiene le funzioni utili alla gestione della navigazione sul sito
#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■□

function set_navigator( $new_page = NULL, $base = DIR_THEME ){
	global $page, $error404;

	if ( $new_page )
		$page = sanitize_slug( $new_page );

	$error404 = ( file_exists( "{$base}/page-{$page}.php" ) )
		?	FALSE
		:	TRUE;
}
