<?php
/*
Plugin Name: CoPass
Plugin URI: 
Description: 
Version: 0.1
Author: Nicola Scotti di Uccio
Author URI: 
License: GPLv3 or later
*/

$concatenate_scripts = FALSE;
#add_filter('show_admin_bar', '__return_false'); 

include( 'CoPass/functions.php' );
include( 'CoPass/login.php' );
include( 'CoPass/menu.php' );


if ( 'CoPass' != get_option( 'blogname' ) )
	update_option( 'blogname', 'CoPass' );
if ( 'copass' != get_option( 'stylesheet' ) )
	update_option( 'stylesheet', 'copass' );
if ( 'copass' != get_option( 'template' ) )
	update_option( 'template', 'copass' );