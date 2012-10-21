<?php
/**
 * WordPress Administration Template Footer
 *
 * @package WordPress
 * @subpackage Administration
 */

// don't load directly
if ( !defined('ABSPATH') )
	die('-1');
?>

		</div>
	</div>

	<footer id="footer" class="container" style="display:none;">
		<?php do_action( 'in_admin_footer' ); ?>
			<p id="footer-upgrade" class="alignright"></p>
		<div class="clear"></div>
	</footer>
<?php
	do_action('admin_footer', '');
	do_action('admin_print_footer_scripts');
	do_action("admin_footer-" . $GLOBALS['hook_suffix']);
?>
</body>
</html>
