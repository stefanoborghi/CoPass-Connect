<?php get_header(); ?>

	<div>
		<h2>Login</h2>
		<div class="alert alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			This is an example of a simple login page, with ajax post call (look at the code ;) )
		</div>

		<table width="" border="0" align="center" cellpadding="2" cellspacing="2">
			<tr>
				<td width="112"><b>User</b></td>
				<td width="188"><input name="username" type="text" class="textfield" id="username" /></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr>
				<td><b>Password</b></td>
				<td><input name="password" type="password" class="textfield" id="password" /></td>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr>
				<td>&nbsp;</td>
				<td><button id="login" class="btn">Login</button></td>
			</tr>
		</table>
	</div>
	<script>
		$("#login").click( function() {
			$.post( ajaxurl, { 'action': 'login', 'user': document.getElementById('username').value, 'pass': document.getElementById('password').value }, function(data) {
				if ( '1' == data ){ window.location.href = homeurl; }
				else { alert( 'Error' ); }
			});
		});
	</script>

<?php get_footer(); ?>