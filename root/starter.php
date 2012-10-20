<?php

/*	CODING NEEDS
 *	questa parte va rimossa al momento in cui il DB sarà liberamente accessibile,
 *	altrimenti rende impossibile lo sviluppo parallelo delle pagine web
 */


if ( isset( $_GET['db'] ) ){
	unset( $_SESSION['nodb'] );
}
if ( isset( $_GET['nodb'] ) ){
	$_SESSION['nodb'] = 1;
	return;
}
if ( isset( $_SESSION['nodb'] ) ) return;



$object_database = new database(DB_USER, DB_PASS, DB_HOST,DB_NAME, database::TYPE_MYSQL);
