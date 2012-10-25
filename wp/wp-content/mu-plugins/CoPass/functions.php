<?php

function copass_nice_credit( $credit ){
	if ( ! $credit ) return '0';
	$credit = ( 0 <= $credit )
		?	"<span class='pull-right'>{$credit} €</span>"
		:	"<span class='pull-right text-error'><b>{$credit} €</b></span>";
	return $credit;
}