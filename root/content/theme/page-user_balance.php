<?php get_header(); ?>

	<div>
		<h2>User balance</h2>
			<input type="text" value="1" id="user" />
			<table width="80%" border="0" align="center" cellpadding="2" cellspacing="2" id="user_balance">
				<thead>
					<tr>
						<th>where</th>
						<th>payee</th>
						<th>status</th>
						<th>amount</th>
						<th>date</th>
						<th>credit</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
	</div>
	<script>
	$(document).ready(function() {
		
		getUserBalance();

	});
	
	function getUserBalance(){
		
		$.getJSON(
         ajaxurl,
		 { 'action': 'user_balance', 'id_user': $('#user').val() },
         function(data){
			console.log(data);
			var balance = data.balance;
            // ciclo l'array
            for(i=0; i<balance.length; i++){
               var  content  = '<tr><td>';
                   content +=  balance[i].where + '</td><td>';
				   content +=  balance[i].payee + '</td><td>';
                   content +=  balance[i].status + '</td><td>';
				   content +=  balance[i].amount + '</td><td>';
				   content +=  balance[i].date + '</td><td>';
				   content +=  balance[i].credit + '</td>';
                   content += '</tr>';
 
               $('#user_balance tbody').append(content);
            }
 
         }
       );
		
	}
	
	</script>

<?php get_footer(); ?>