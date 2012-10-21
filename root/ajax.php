<?php

if ( isset( $_REQUEST['action'] ) )		define( 'DOING_AJAX', TRUE );
else									die( '0' );

session_start();

require_once( 'config.php' );				#	site configuration
require_once( 'include.php' );				#	define wich files ( classes and functions only!! ) to be included
require_once( 'starter.php' );				#	control code ( i.e. UAC ) to be done at startup

foreach ( glob( DIR_CONTENT . '/ajax/*.php' ) as $filename )
    include( $filename );					#	include all files in ajax functions directory


/**
 *	Output is forced to be standard text only.
**/
@header( 'Content-Type: text/html; charset=UTF-8' );
@header( 'X-Robots-Tag: noindex' );

$action = ( 1 )										#	THIS SHOULD BE A CONTROL QUESTION: {IS USER LOGGED IN ?}
	?	"ajax_{$_REQUEST['action']}"				#		YES	: function ajax_{$name} will be called
	:	"ajax_nopriv_{$_REQUEST['action']}";		#		NO	: function ajax_nopriv_{$name} will be called

if ( is_callable( $action ) )						#	if above function cannot be called, skip it to end
	$action();

die( '0' );