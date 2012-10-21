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

add_filter('show_admin_bar', '__return_false'); 

include( 'admin/login.php' );
include( 'admin/menu.php' );


remove_action( $tag, $function_to_remove, $priority, $accepted_args ); 