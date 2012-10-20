<?php

#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	NAVIGATOR
#	contiene le funzioni utili alla gestione della navigazione sul sito
#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■□

function set_navigator( $new_page = NULL, $base = DIR_THEME ){
	global $page, $error404;

	if ( $new_page )
		$page = sanitize_slug( $new_page );

	$error404 = ( file_exists( "{$base}/page-{$page}.php" ) )
		?	FALSE
		:	TRUE;
}



#	DA RIVEDERE L'UTILITA' ( provengono da un'progetto precedente )


function navigator_direction( $capabilty, $fallback, $page_slug = null ){
	if ( current_user_can( $capabilty ) )	set_navigator( $page_slug );
	else									set_navigator( $fallback );
}

function navigator_exec_and_die( $capabilty, $function, $die = null ){
	if ( current_user_can( $capabilty ) && is_callable( $function ) )
		$function();
	die( $die );
}

function call_if_capability( $capabilty, $function, $parameters = array(), $callback = null ){
	if ( current_user_can( $capabilty ) && is_callable( $function ) ){
		if ( $parameters )	call_user_func_array( $function, $parameters );
		else				call_user_func( $function );
		return TRUE;
	}
	else{
		if ( $callback && is_callable( $callback ) )
			call_user_func( $callback );
		return FALSE;
	}
}

function page_privileges_forbidden(){
	die( "<!DOCTYPE html><html><head><meta charset='UTF-8' /><title>Error Page</title><style>html{background:#f9f9f9;}body{background:#fff;color:#333;font-family:sans-serif;margin:50px auto 2em;padding:1em 2em;-webkit-border-radius:3px;border-radius:3px;border:1px solid #dfdfdf;max-width:700px;}p{font-size:14px;line-height:1.5;margin:25px 0 20px;}</style></head><body><p>You do not have sufficient permissions to access this page.</p></body></html>" );

}