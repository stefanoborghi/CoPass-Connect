<?php
session_start();

require_once( 'config.php' );				#	site configuration
require_once( 'include.php' );				#	define wich files ( classes and functions only!! ) to be included
require_once( 'starter.php' );				#	control code ( i.e. UAC ) to be done at startup

/**
 *	LOADING A PAGE
 *
 *	The web architecture force all pages to be files into DIR_THEME folder.
 *	The filename of a page must be page-{$page_name}.php
 *
 *	A page can be loaded with a $_POST['p'] or $_GET['p'] request. If any of
 *	those, the DEFAULT_PAGE is loaded.
 *
 *	If needed, a switch can be used to execute some functions / setup settings
 *	before a page is loaded.
 *		switch( $page ){
 *			case 'example_page' :
 *				#	here can be some control code specific to this page only
 *				break;
 *			default:
 *				break;
 *		}
 *
**/


$page = ( isset( $_REQUEST['p'] ) )
	?	sanitize_slug( $_REQUEST['p'] )
	:	DEFAULT_PAGE;


if ( file_exists( DIR_THEME . "/page-{$page}.php" ) )
	include( DIR_THEME . "/page-{$page}.php" );
else
	include( DIR_THEME . '/' . DEFAULT_404_PAGE . '.php' );

