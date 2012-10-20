<?php

if ( isset( $_REQUEST['action'] ) )		define( 'DOING_AJAX', TRUE );
else									die( '0' );

session_start();

require_once( 'config.php' );				#	configurazione del sito
require_once( 'include.php' );				#	funzioni e classi
require_once( 'starter.php' );				#	controllo UAC

foreach ( glob( DIR_CONTENT . '/ajax/*.php' ) as $filename )
    include( $filename );

@header( 'Content-Type: text/html; charset=UTF-8' );
@header( 'X-Robots-Tag: noindex' );

$action = ( 1 )									# TRUE if user logged
	?	"ajax_{$_REQUEST['action']}"
	:	"ajax_nopriv_{$_REQUEST['action']}";

if ( is_callable( $action ) )
	$action();

die( '0' );