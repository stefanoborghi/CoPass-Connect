<?php
session_start();

require_once( 'config.php' );				#	configurazione del sito
require_once( 'include.php' );				#	funzioni e classi
require_once( 'starter.php' );				#	controllo UAC - NON IMPLEMENTATO






#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	L'oggetto $HTML contiene le informazioni necessarie al caricamento dei file
#	del template.
#	Il file navigator.php (in DIR_CONTENT) gestisce gli accessi alle pagine.
#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□



$HTML = new stdClass();

include_once( DIR_CONTENT . '/navigator.php' );



/*	PAGE ATTRIBUTES !!
 *	
 *	in questo punto andrebbero inserite la/le funzioni di controllo
 *	( eventualmente incluse all'interno di un file ) che modificano l'output
 *	della pagina. Ad esempio, cambiando la lingua.
 *	
 *	Al momento sono fatte a mano prendendole dal config.php! :)
 */

set_head( 'lang',		DEFAULT_LANG );
set_head( 'title',		DEFAULT_TITLE );
set_head( 'charset',	DEFAULT_CHARSET );
set_head( 'author',		DEFAULT_AUTHOR );
set_head( 'description',DEFAULT_DESCRIPTION );
set_head( 'keywords',	DEFAULT_KEYWORDS );



#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	Tutte le variabili sono impostate, si può visualizzare il template.
#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□

include( $HTML->file );