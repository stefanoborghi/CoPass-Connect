<?php get_header(); ?>
	<!--[if lt IE 9]>
		<div class="ui-state-error ui-corner-all">
			<p>
				Il tuo browser è <em>obsoleto!</em><br />
				Alcune delle funzionalità in area di amministrazione richiedono un browser più moderno.<br />
				Se non puoi aggiornare Internet Explorer alla versione 9 o successiva (su Windows XP non si può), puoi provare un browser gratuito come Firefox (<a href="http://www.mozilla.org/it/firefox/new/">link al sito)</a>.
			</p>
		</div>
	<![endif]-->

	<div id="loginbox" class="auto">
		<h2>Accesso area riservata</h2>
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
					<td><input class="ui-button ui-widget ui-state-default ui-button-text-only" type="submit" name="Submit" value=" Login " id="login" /></td>
				</tr>
			</table>
	</div>
	<script>

	$("input#login").click( function() {
		$.post( ajaxurl, { 'action': 'login', 'user': document.getElementById('username').value, 'pass': document.getElementById('password').value }, function(data) {
			if ( '1' == data ){ window.location.href = homeurl; }
			else { alert( 'Errore, riprovare.' ); }
		});
	});

	$(".ui-button").hover(
		function () { $(this).addClass("ui-state-hover"); },
		function () { $(this).removeClass("ui-state-hover"); }
	);
	</script>

<?php get_footer(); ?>