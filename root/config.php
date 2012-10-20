<?php
#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	FILE DI CONFIGURAZIONE del sito
#
#	per un backup completo del sito deve essere salvato insieme a DIR_CONTENT !
#
#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□

#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	PATHs ( finiscono senza la / finale )
#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□

define( 'ABSPATH',			dirname( __FILE__ ) );									#	PRODUCTION #	__DIR__ if phpversion() > 5.3.0
define( 'DIR_ADMIN',		ABSPATH . '/admin' );
define( 'DIR_CONTENT',		ABSPATH . '/content' );
define( 'DIR_LIBRARY',		ABSPATH . '/library' );

define( 'DIR_THEME',		DIR_CONTENT . '/theme' );
define( 'DIR_PIECES',		DIR_CONTENT . '/pieces' );
define( 'DIR_MODULES',		DIR_CONTENT . '/modules' );
define( 'DIR_PROTECTED',	DIR_CONTENT . '/protected' );


#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	URLs ( finiscono con la / finale )
#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□

define( 'URL_HOME',		$_SERVER['REQUEST_URI'] );
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
define( 'DEFAULT_CHARSET',		'<meta charset="UTF-8" />' );
define( 'DEFAULT_AUTHOR',		'Nicola Scotti di Uccio' );
define( 'DEFAULT_DESCRIPTION',	'' );
define( 'DEFAULT_KEYWORDS',		'' );


#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	SQL SETTINGS
#
#	la classe HTML istanzia il database in $HTMl->db
#	MYSQL
#		define( 'DB_TYPE', 'MySQL' );
#		define( 'DB_NAME', 'CMS' );
#		define( 'DB_USER', 'root' );
#		define( 'DB_PASS', 'usbw' );
#		define( 'DB_HOST', '127.0.0.1' );
#
#	SQLite
#		define( 'DB_TYPE', 'SQLite' );
#		define( 'DB_FILE', DIR_PROTECTED . '/database.db' );
#▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬□

define( 'DB_TYPE', 'SQLite' );
define( 'DB_FILE', DIR_PROTECTED . '/database.db' );

