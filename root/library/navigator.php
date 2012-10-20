<?php

#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	NAVIGATOR
#	contiene le funzioni utili alla gestione della navigazione sul sito
#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■□

function set_navigator( $page = NULL, $base = DIR_THEME ){

	global $HTML;

	if ( $page )
		$HTML->page = sanitize_slug( $page );

	if ( file_exists( "{$base}/page-{$HTML->page}.php" ) ){
		$HTML->error404 = FALSE;
		$HTML->file = "{$base}/page-{$HTML->page}.php";
	}
	else{
		$HTML->error404 = TRUE;
		$HTML->file = "{$base}/" . FALLBACK_PAGE . '.php';
	}

}
