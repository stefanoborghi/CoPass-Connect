<?php

#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	NAVIGAZIONE SULLE PAGINE DEL SITO
#
#	serve per richiamare delle funzioni al caricamento di particolari pagine
#	non è necessario se non si richiedono controlli personalizzati sulle pagine
#
#	tip: spaziare le pagine da un breakline
#
#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

switch( $page ){

		case 'pagina_di_esempio' :
			#	codice da eseguire, es: if ( ! not_logged() ) set_navigator( 'errore_autenticazione' );
			break;

		default:
			break;
	}

