<?php

#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	CARICAMENTO DI FUNZIONI E CLASSI
#
#	■	i files qui richiesti devono contenere solo le definizioni di funzioni
#		e classi
#	■	unica eccezione ammessa: codice procedurale necessario alle funzioni
#		e classi definite nel file stesso. Questi files saranno identificati
#		dal simbolo #
#		es: require_once( 'file.php' ); #
#
#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■□

require_once( DIR_LIBRARY	.	'/KLogger.php' );
/* CLASSI INTEFACCIA DATABASE */
require_once( DIR_DATABASE	.	'/database.class.php' );
require_once( DIR_DATABASE	.	'/object.abstract.php' );

//ENTITIES
require_once( DIR_DATABASE	.	'/skeleton.entity.php' );

/* UTILITA' */
require_once( DIR_LIBRARY	.	'/sanitize.php' );
/* TEMPLATE */
require_once( DIR_LIBRARY	.	'/template.php' );
