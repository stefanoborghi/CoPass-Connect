<?php

#	■■■	HEADER ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■□

/**
 *	get_header will try to include:
 *		□	header-{$custom}.php
 *		□	header-{$page}.php
 *		□	header.php
 */
function get_header( $custom = null ){

	global $page;
	if ( $custom && file_exists( DIR_THEME . "/header-{$custom}.php" ) )	include( DIR_THEME . "/header-{$custom}.php" );
	elseif ( file_exists( DIR_THEME . "/header-{$page}.php" ) )				include( DIR_THEME . "/header-{$page}.php" );
	else																	include( DIR_THEME . '/header.php' );

}

#	■■■	FOOTER ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■□

/**
 *	get_footer will try to include:
 *		□	footer-{$custom}.php
 *		□	footer-{$page}.php
 *		□	footer.php
 */
function get_footer( $custom = null ){
	global $page;
	if ( $custom && file_exists( DIR_THEME . "/footer-{$custom}.php" ) )	include( DIR_THEME . "/footer-{$custom}.php" );
	elseif ( file_exists( DIR_THEME . "/footer-{$page}.php" ) )				include( DIR_THEME . "/footer-{$page}.php" );
	else																	include( DIR_THEME . '/footer.php' );

}


#	■■■	STYLES & SCRIPTS ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■□

/**
 *	load_style( $file ) and load_script( $file ) can simplify including
 *	stypes and scripts.
 */

function load_style( $file ){
	$slug = slugify( $file );
	echo "<link id='{$slug}' rel='stylesheet' type='text/css' href='" . URL_CSS . "{$file}' />\n";
}

function load_script( $file ){
	$slug = slugify( $file );
	echo "<script id='{$slug}' src='" . URL_JS . "{$file}' ></script>\n";
}


