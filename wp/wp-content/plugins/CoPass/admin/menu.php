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



	add_menu_page( 'CoPass', 'CoPass', 'read', 'copass/copass_page.php', 'ab', plugins_url('copass/assets/img/favicon.png'), 6 );
}





return;


add_action( 'admin_menu', 'copass_remove_menu', 50 );

function copass_remove_menu(){
return;
echo '<pre>';
	global $menu, $submenu, $_wp_submenu_nopriv;
	print_r( $menu );
	print_r( $submenu );
$_wp_submenu_nopriv['index.php']['update-core.php'] = TRUE;
	print_r( $_wp_submenu_nopriv );



echo '</pre>';
}

/*

Array
(
    [index.php] => Array
        (
            [0] => Array
                (
                    [0] => Home
                    [1] => read
                    [2] => index.php
                )

            [10] => Array
                (
                    [0] => Updates 0
                    [1] => update_core
                    [2] => update-core.php
                )

        )

    [edit.php] => Array
        (
            [5] => Array
                (
                    [0] => All Posts
                    [1] => edit_posts
                    [2] => edit.php
                )

            [10] => Array
                (
                    [0] => Add New
                    [1] => edit_posts
                    [2] => post-new.php
                )

            [15] => Array
                (
                    [0] => Categories
                    [1] => manage_categories
                    [2] => edit-tags.php?taxonomy=category
                )

            [16] => Array
                (
                    [0] => Tags
                    [1] => manage_categories
                    [2] => edit-tags.php?taxonomy=post_tag
                )

        )

    [upload.php] => Array
        (
            [5] => Array
                (
                    [0] => Library
                    [1] => upload_files
                    [2] => upload.php
                )

            [10] => Array
                (
                    [0] => Add New
                    [1] => upload_files
                    [2] => media-new.php
                )

        )

    [link-manager.php] => Array
        (
            [5] => Array
                (
                    [0] => All Links
                    [1] => manage_links
                    [2] => link-manager.php
                )

            [10] => Array
                (
                    [0] => Add New
                    [1] => manage_links
                    [2] => link-add.php
                )

            [15] => Array
                (
                    [0] => Link Categories
                    [1] => manage_categories
                    [2] => edit-tags.php?taxonomy=link_category
                )

        )

    [edit.php?post_type=page] => Array
        (
            [5] => Array
                (
                    [0] => All Pages
                    [1] => edit_pages
                    [2] => edit.php?post_type=page
                )

            [10] => Array
                (
                    [0] => Add New
                    [1] => edit_pages
                    [2] => post-new.php?post_type=page
                )

        )

    [edit-comments.php] => Array
        (
            [0] => Array
                (
                    [0] => All Comments
                    [1] => edit_posts
                    [2] => edit-comments.php
                )

        )

    [themes.php] => Array
        (
            [5] => Array
                (
                    [0] => Themes
                    [1] => switch_themes
                    [2] => themes.php
                )

            [7] => Array
                (
                    [0] => Widgets
                    [1] => edit_theme_options
                    [2] => widgets.php
                )

            [10] => Array
                (
                    [0] => Menus
                    [1] => edit_theme_options
                    [2] => nav-menus.php
                )

            [11] => Array
                (
                    [0] => Theme Options
                    [1] => edit_theme_options
                    [2] => theme_options
                    [3] => Theme Options
                )

            [12] => Array
                (
                    [0] => Header
                    [1] => edit_theme_options
                    [2] => custom-header
                    [3] => Header
                )

            [13] => Array
                (
                    [0] => Background
                    [1] => edit_theme_options
                    [2] => custom-background
                    [3] => Background
                )

        )

    [plugins.php] => Array
        (
            [5] => Array
                (
                    [0] => Installed Plugins
                    [1] => activate_plugins
                    [2] => plugins.php
                )

            [10] => Array
                (
                    [0] => Add New
                    [1] => install_plugins
                    [2] => plugin-install.php
                )

            [15] => Array
                (
                    [0] => Editor
                    [1] => edit_plugins
                    [2] => plugin-editor.php
                )

        )

    [users.php] => Array
        (
            [5] => Array
                (
                    [0] => All Users
                    [1] => list_users
                    [2] => users.php
                )

            [10] => Array
                (
                    [0] => Add New
                    [1] => create_users
                    [2] => user-new.php
                )

            [15] => Array
                (
                    [0] => Your Profile
                    [1] => read
                    [2] => profile.php
                )

        )

    [tools.php] => Array
        (
            [5] => Array
                (
                    [0] => Available Tools
                    [1] => edit_posts
                    [2] => tools.php
                )

            [10] => Array
                (
                    [0] => Import
                    [1] => import
                    [2] => import.php
                )

            [15] => Array
                (
                    [0] => Export
                    [1] => export
                    [2] => export.php
                )

        )

    [options-general.php] => Array
        (
            [10] => Array
                (
                    [0] => General
                    [1] => manage_options
                    [2] => options-general.php
                )

            [15] => Array
                (
                    [0] => Writing
                    [1] => manage_options
                    [2] => options-writing.php
                )

            [20] => Array
                (
                    [0] => Reading
                    [1] => manage_options
                    [2] => options-reading.php
                )

            [25] => Array
                (
                    [0] => Discussion
                    [1] => manage_options
                    [2] => options-discussion.php
                )

            [30] => Array
                (
                    [0] => Media
                    [1] => manage_options
                    [2] => options-media.php
                )

            [35] => Array
                (
                    [0] => Privacy
                    [1] => manage_options
                    [2] => options-privacy.php
                )

            [40] => Array
                (
                    [0] => Permalinks
                    [1] => manage_options
                    [2] => options-permalink.php
                )

        )


*/