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

function set_head( $head, $content, $replace = FALSE ){
	$HTML->head[$head] = ( $replace )
		?	$content
		:	trim( $HTML->head[$head] . ' ' . $content );
}

function get_head( $head ){
	global $HTML;
	switch( $head ){
		case 'title'		:	return "\t<title>{$HTML->head['title']}</title>\n";
		case 'charset'		:	return "\t{$HTML->head['charset']}\n";
		case 'author'		:	return "\t<meta name='author' content='{$HTML->head['author']}' />\n"; break;
		case 'description'	:	return "\t<meta name='description' content='{$HTML->head['description']}' />\n"; break;
		case 'keywords'		:	return "\t<meta name='keywords' content='{$HTML->head['keywords']}' />\n"; break;
		case 'favicon'		:	return "\t<link rel='icon' href='{$HTML->head['favicon']}' type='image/vnd.microsoft.icon' />\n"; break;
		default				:	return "<!-- {$head} -->\n";
	}
	return "\n";
}

function print_heads(){
	global $HTML;
	do_action( 'before_print_heads' );
	do_action( "before_print_heads-{$HTML->page_slug}" );

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

	do_action( 'print_heads' );
	do_action( "print_heads-{$HTML->page_slug}" );

}