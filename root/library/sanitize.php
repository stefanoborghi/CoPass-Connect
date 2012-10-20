<?php

#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
#	SANITIZE
#■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■□


#	■■■	SLUG ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

function slugify( $string ){
	$slug = preg_replace( '/[^a-z0-9]+/', '-', strtolower( $string ) );
	$slug = trim( $slug, '-' );
	return $slug;
}


function sanitize_slug( $string ){
	$slug = preg_replace( '/[^a-z0-9_\-]/', '', strtolower( $string ) );
	return $slug;
}

function sanitize_email( $email ){
	$pattern = "°[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[A-Z]{2}|com|org|net|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|museum)°i";
	if ( preg_match( $patter, $email ) )
		return TRUE;
	return FALSE;
}