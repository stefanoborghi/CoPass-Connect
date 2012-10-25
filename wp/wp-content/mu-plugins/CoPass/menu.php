<?php


add_action( 'admin_enqueue_scripts', function(){
	wp_enqueue_style( 'bootstrap', plugins_url( 'CoPass/assets/css/bootstrap.css', __DIR__ ) );
	wp_deregister_script( 'jquery' );
	wp_deregister_script( 'utils' );
	wp_deregister_script( 'admin-bar' );
	wp_deregister_script( 'jquery-color' );
	wp_enqueue_script( 'jquery', plugins_url( 'CoPass/assets/js/jquery-1.8.2.min.js', __DIR__ ) );
	wp_enqueue_script( 'bootstrap', plugins_url( 'CoPass/assets/js/bootstrap.min.js', __DIR__ ), array( 'jquery' ) );
} );
