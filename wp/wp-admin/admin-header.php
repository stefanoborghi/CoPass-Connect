<?php
/**
 * WordPress Administration Template Header
 *
 * @package WordPress
 * @subpackage Administration
 */

@header('Content-Type: ' . get_option('html_type') . '; charset=' . get_option('blog_charset'));
if ( ! defined( 'WP_ADMIN' ) )
	require_once( './admin.php' );

// In case admin-header.php is included in a function.
global $title, $hook_suffix, $current_screen, $wp_locale, $pagenow, $wp_version,
	$current_site, $update_title, $total_update_count, $parent_file;

// Catch plugins that include admin-header.php before admin.php completes.
if ( empty( $current_screen ) )
	set_current_screen();

get_admin_page_title();
$title = esc_html( strip_tags( $title ) );

if ( is_network_admin() )	$admin_title = __( 'Network Admin' );
elseif ( is_user_admin() )	$admin_title = __( 'Global Dashboard' );
else						$admin_title = get_bloginfo( 'name' );

if ( $admin_title == $title )	$admin_title = sprintf( __( '%1$s &#8212; WordPress' ), $title );
else							$admin_title = sprintf( __( '%1$s &lsaquo; %2$s &#8212; WordPress' ), $title, $admin_title );
$admin_title = apply_filters( 'admin_title', $admin_title, $title );

wp_user_settings();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>'>
<head>
<meta charset="<?php echo get_option('blog_charset'); ?>" />

<title><?php echo $admin_title; ?></title>
<?php
$admin_body_class = preg_replace('/[^a-z0-9_-]+/i', '-', $hook_suffix);
?>
<script type="text/javascript">
addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
var userSettings = {
		'url': '<?php echo SITECOOKIEPATH; ?>',
		'uid': '<?php if ( ! isset($current_user) ) $current_user = wp_get_current_user(); echo $current_user->ID; ?>',
		'time':'<?php echo time() ?>'
	},
	ajaxurl = '<?php echo admin_url( 'admin-ajax.php', 'relative' ); ?>',
	pagenow = '<?php echo $current_screen->id; ?>',
	typenow = '<?php echo $current_screen->post_type; ?>',
	adminpage = '<?php echo $admin_body_class; ?>',
	thousandsSeparator = '<?php echo addslashes( $wp_locale->number_format['thousands_sep'] ); ?>',
	decimalPoint = '<?php echo addslashes( $wp_locale->number_format['decimal_point'] ); ?>',
	isRtl = <?php echo (int) is_rtl(); ?>;
</script>
<?php

do_action('admin_enqueue_scripts', $hook_suffix);
do_action("admin_print_styles-$hook_suffix");
do_action('admin_print_styles');
do_action("admin_print_scripts-$hook_suffix");
do_action('admin_print_scripts');
do_action("admin_head-$hook_suffix");
do_action('admin_head');

if ( is_rtl() )
	$admin_body_class .= ' rtl';

$admin_body_class .= ' branch-' . str_replace( array( '.', ',' ), '-', floatval( $wp_version ) );
$admin_body_class .= ' version-' . str_replace( '.', '-', preg_replace( '/^([.0-9]+).*/', '$1', $wp_version ) );
$admin_body_class .= ' admin-color-' . sanitize_html_class( get_user_option( 'admin_color' ), 'fresh' );
$admin_body_class .= ' locale-' . sanitize_html_class( strtolower( str_replace( '_', '-', get_locale() ) ) );

if ( wp_is_mobile() )
	$admin_body_class .= ' mobile';
?>
</head>
<body class="wp-admin <?php echo apply_filters( 'admin_body_class', '' ) . " $admin_body_class"; ?>">


	<div class="navbar navbar-static-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="brand" href="#">CoPass Connect</a>
				<ul class="nav">
					<li>
						<a href="<?php admin_url( '?page=dashboard' ); ?>">Dashboard</a>
					</li>
                    <li class="dropdown">
						<a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Sites <b class="caret"></b></a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
							<li><a tabindex="-1" href="#">CO-SITE 1</a></li>
							<li><a tabindex="-1" href="#">CO-SITE 2</a></li>
							<li><a tabindex="-1" href="#">CO-SITE 3</a></li>
						</ul>
                    </li>
				</ul>
				<ul class="nav pull-right">
                    <li class="dropdown">
						<a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
							<li><a tabindex="-1" href="#" onclick="showmodal()">Add User</a></li>
						</ul>
                    </li>
					<li><a href="<?php echo wp_logout_url(); ?>">LogOut</a></li>
				</ul>
			</div>
		</div>
	</div>
	<script>jQuery(function($) { $(".dropdown-toggle").dropdown(); })</script>

	<header class="container">
		<?php
			if ( is_network_admin() )	do_action('network_admin_notices');
			elseif ( is_user_admin() )	do_action('user_admin_notices');
			else						do_action('admin_notices');
			do_action('all_admin_notices');
		?>
		<div class="page-header">
			<h1>CO-SITE</h1>
		</div>
	</header>

	<div id="container" class="container">
		<div>


