<?php get_header(); ?>

	<div id="loginbox" class="auto box">
		<h2>ERRORE 404</h2>
		<h2>Accesso area riservata</h2>
		<form id="loginForm" name="loginForm" method="post" action="index.php?p=login">
			<table width="" border="0" align="center" cellpadding="2" cellspacing="2">
				<tr>
					<td width="112"><b>Utente</b></td>
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
					<td><input type="submit" name="Submit" value=" Login " /></td>
				</tr>
			</table>
		</form>
	</div>

<?php get_footer(); ?>