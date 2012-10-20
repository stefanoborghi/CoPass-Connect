<?php
session_start();

require_once( 'config.php' );				#	configurazione del sito
require_once( 'include.php' );				#	funzioni e classi
require_once( 'starter.php' );				#	controllo UAC - NON IMPLEMENTATO

#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	NAVIGATOR
#
#	Il file navigator.php (nella directory CONTENT) serve a gestire gli
#	accessi alle pagine riservate ( <> dalle pagine in amministrazione).
#	Il file *deve* essere presente - nel caso limite, è vuoto.
#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□

$page	= ( isset( $_REQUEST['p'] ) )
	?	sanitize_slug( $_REQUEST['p'] )
	:	DEFAULT_PAGE;

include_once( DIR_CONTENT . '/navigator.php' );
set_navigator( $page );

( $error404 )
	?	include( "{$base}/" . FALLBACK_PAGE . '.php' )
	:	include( "{$base}/page-{$page}.php" );

