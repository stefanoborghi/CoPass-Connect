<?php


add_action( 'admin_menu', 'copass_menu_pages' );

function copass_menu_pages() {

	remove_menu_page( 'index.php' );
	remove_menu_page( 'edit.php' );
	remove_menu_page( 'upload.php' );
	remove_menu_page( 'link-manager.php' );
	remove_menu_page( 'edit.php?post_type=page' );
	remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'themes.php' );
	remove_menu_page( 'plugins.php' );
	remove_menu_page( 'users.php' );
	remove_menu_page( 'tools.php' );
	remove_menu_page( 'options-general.php' );



	add_menu_page( 'CoPass', 'CoPass', 'read', 'dashboard', 'ab', plugins_url('copass/assets/img/favicon.png'), 1 );

}

function ab(){
echo 'siiiiiiii';
}

add_action( 'admin_enqueue_scripts', function(){
	wp_enqueue_style( 'bootstrap', plugins_url('copass/assets/css/bootstrap.css') );
	wp_enqueue_script( 'bootstrap', plugins_url('copass/assets/js/bootstrap.min.js') );
}
);
