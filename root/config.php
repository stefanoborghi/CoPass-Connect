<?php
#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	FILE DI CONFIGURAZIONE del sito
#
#	per un backup completo del sito deve essere salvato insieme a DIR_CONTENT !
#
#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□

#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	ENVIRONMENT
#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□

define( 'ENVIRONMENT', 'test' );                                                    #   ENVIRONMENT prod-test

#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	PATHs ( finiscono senza la / finale )
#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□

define( 'ABSPATH',			dirname( __FILE__ ) );									#	PRODUCTION #	__DIR__ if phpversion() > 5.3.0
define( 'DIR_ADMIN',		ABSPATH . '/admin' );
define( 'DIR_CONTENT',		ABSPATH . '/content' );
define( 'DIR_LIBRARY',		ABSPATH . '/library' );
define( 'DIR_DATABASE',		DIR_LIBRARY . '/database' );

define( 'DIR_THEME',		DIR_CONTENT . '/theme' );
define( 'DIR_LOG',	        DIR_CONTENT . '/log' );


#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	URLs ( finiscono con la / finale )
#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□


define( 'URL_HOME',		substr( $_SERVER['REQUEST_URI'], 0, strrpos( $_SERVER['SCRIPT_NAME'], '/') + 1 ) );
define( 'URL_ADMIN',	URL_HOME	. 'admin/' );
define( 'URL_CONTENT',	URL_HOME	. 'content/' );

define( 'URL_THEME',	URL_CONTENT	. 'assets/theme/' );
define( 'URL_CSS',		URL_CONTENT	. 'assets/css/' );
define( 'URL_JS',		URL_CONTENT	. 'assets/js/' );

#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	WEB CONFIGURATION
#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□

define( 'SITE_NAME',		'COWO' );
define( 'DEFAULT_TITLE',	'COWO' );
define( 'DEFAULT_PAGE',		'home' );
define( 'FALLBACK_PAGE',	'404' );

define( 'DEFAULT_LANG',			'it' );
define( 'DEFAULT_CHARSET',		'UTF-8' );
define( 'DEFAULT_AUTHOR',		'' );
define( 'DEFAULT_DESCRIPTION',	'' );
define( 'DEFAULT_KEYWORDS',		'' );


#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	SQL SETTINGS
#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□

define( 'DB_TYPE', 'MySQL' );   #NON MODIFICARE

define( 'DB_NAME', '' );        #INSERIRE VALORI ALL'OCCORRENZA
define( 'DB_USER', '' );
define( 'DB_PASS', '' );
define( 'DB_HOST', '' );

