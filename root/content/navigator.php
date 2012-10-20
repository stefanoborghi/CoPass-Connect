<?php

#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	NAVIGAZIONE SUL SITO
#
#	Imposta la variabile globale $page, legata a $_REQUEST['p'] o in caso alla
#	variabile DEFAULT_PAGE
#
#	Tramite uno switch è possibile eseguire delle funzioni prima del
#	caricamento delle pagine. Eventualmente si può anche cambiare la pagina
#	di destinazione tramite la funzione set_navigator( 'nuova_pagina' ); E'
#	opportuno separare le pagine nello switch da un breakline.
#
#	Non è necessario includere tutte le pagine nello switch.
#
#	La funzione finale set_navigator() controlla l'esistenza del file
#	richiesto e eventualmente imposta l'errore $error404;
#
#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

$HTML->page = ( isset( $_REQUEST['p'] ) )
	?	sanitize_slug( $_REQUEST['p'] )
	:	DEFAULT_PAGE;

switch( $HTML->page ){

	case 'pagina_di_esempio' :
		#	codice da eseguire, es: if ( ! not_logged() ) set_navigator( 'errore_autenticazione' );
		break;

	default:
		break;
}

set_navigator();
