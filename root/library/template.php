<?php

#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	HEADER & FOOTER & HEAD
#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■□

#	■■■	HEADER ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

function get_header( $custom = null ){
	#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□
	#	cerca di caricare nell'ordine:
	#		□	header-{$custom}.php
	#		□	header-{$page}.php
	#		□	header.php
	#▬□

	global $page;
	if ( $custom && file_exists( DIR_THEME . "/header-{$custom}.php" ) )	include( DIR_THEME . "/header-{$custom}.php" );
	elseif ( file_exists( DIR_THEME . "/header-{$page}.php" ) )				include( DIR_THEME . "/header-{$page}.php" );
	else																	include( DIR_THEME . '/header.php' );

}

#	■■■	FOOTER ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

function get_footer( $custom = null ){
	#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□
	#	funziona allo stesso modo di get_header
	#▬□

	global $page;
	if ( $custom && file_exists( DIR_THEME . "/footer-{$custom}.php" ) )	include( DIR_THEME . "/footer-{$custom}.php" );
	elseif ( file_exists( DIR_THEME . "/footer-{$page}.php" ) )				include( DIR_THEME . "/footer-{$page}.php" );
	else																	include( DIR_THEME . '/footer.php' );

}

#	■■■	HEAD ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

function set_head( $head, $content, $append = FALSE ){
	global $HTML;

	if ( isset( $HTML->head[$head] ) && $append )
		$HTML->head[$head] = trim( $HTML->head[$head] . ' ' . $content );
	else
		$HTML->head[$head] = $content;
}

function get_head( $head ){
	global $HTML;
	switch( $head ){
		case 'title'		:	return "\t<title>{$HTML->head['title']}</title>\n";
		case 'charset'		:	return "\t<meta charset='{$HTML->head['charset']}' />\n";
		case 'author'		:	return "\t<meta name='author' content='{$HTML->head['author']}' />\n"; break;
		case 'description'	:	return "\t<meta name='description' content='{$HTML->head['description']}' />\n"; break;
		case 'keywords'		:	return "\t<meta name='keywords' content='{$HTML->head['keywords']}' />\n"; break;
		case 'favicon'		:	return "\t<link rel='icon' href='favicon.ico' type='image/vnd.microsoft.icon' />\n"; break;
		default				:	return "<!-- {$head} -->\n";
	}
	return "\n";
}

function print_heads(){
	$head =		"\n";
	$head .=	get_head( 'title' );
	$head .=	"\n";
	$head .=	get_head( 'charset' );
	$head .=	get_head( 'author' );
	$head .=	get_head( 'description' );
	$head .=	get_head( 'keywords' );
	$head .=	"\n";
	$head .=	get_head( 'favicon' );
	echo $head;
}



#	■■■	STYLES & SCRIPTS ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■


function load_style( $file ){
	$slug = slugify( $file );
	echo "<link id='{$slug}' rel='stylesheet' type='text/css' href='" . URL_CSS . "{$file}' />\n";
}

function load_script( $file ){
	$slug = slugify( $file );
	echo "<script id='{$slug}' src='" . URL_JS . "{$file}' ></script>\n";
}


