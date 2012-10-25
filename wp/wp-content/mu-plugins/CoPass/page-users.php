<?php
	$table_latest_coworkers = array();
	$table_latest_coworkers[] = array(
		'name'		=>	'Stefano Borghi',
		'from'		=>	'Cowo360',
		'credit'	=>	'190',
	);
	$table_latest_coworkers[] = array(
		'name'		=>	'Benjamin',
		'from'		=>	'Betahaus',
		'credit'	=>	'75',
	);
	$table_latest_coworkers[] = array(
		'name'		=>	'Nathanael',
		'from'		=>	'Cantine Paris',
		'credit'	=>	'-10',
	);
	$table_latest_coworkers[] = array(
		'name'		=>	'Eric',
		'from'		=>	'Mutinerie',
		'credit'	=>	'200',
	);
	$table_latest_coworkers[] = array(
		'name'		=>	'Mario Rossi',
		'from'		=>	'Mutinerie',
		'credit'	=>	'150',
	);

	$table_balance = array();
	$table_balance[] = array(
		'name'		=>	'Cowo360',
		'owe'		=>	'450',
		'owed'		=>	'10',
		'balance'	=>	'-440',
		'change'	=>	'12/09/2012',
		''			=>	'pay',
	);
	$table_balance[] = array(
		'name'		=>	'Betahaus',
		'owe'		=>	'0',
		'owed'		=>	'10',
		'balance'	=>	'-10',
		'change'	=>	'5/09/2012',
		''			=>	'pay',
	);
	$table_balance[] = array(
		'name'		=>	'La Cantine Paris',
		'owe'		=>	'100',
		'owed'		=>	'0',
		'balance'	=>	'100',
		'change'	=>	'12/02/2012',
		''			=>	'ask',
	);
	$table_balance[] = array(
		'name'		=>	'La Cantine Lille',
		'owe'		=>	'300',
		'owed'		=>	'300',
		'balance'	=>	'0',
		'change'	=>	'25/09/2012',
		''			=>	'',
	);

?>

<div class="row">
	<div class="span4">
		<table id="table_latest_coworkers" class="table table-striped table-hover">
			<thead>
				<tr>
					<th>NAME</th>
					<th>FROM</th>
					<th>CREDIT</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ( $table_latest_coworkers as $k => $array ){
					echo "<tr id='table_latest_coworkers_{$k}'>";
					foreach ( $array as $key => $value ){
						if ( 'credit' == $key )
							$value = copass_nice_credit( $value );
						echo "<td>{$value}</td>";
					}
					echo '</tr>';
				}
			?>
			</tbody>
		</table>
	</div>
	<div class="span8">
		<table id="table_balance" class="table table-hover">
			<thead>
				<tr>
					<th>NAME</th>
					<th>OWE</th>
					<th>OWED</th>
					<th>BALANCE</th>
					<th>LAST CHANGE</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ( $table_balance as $k => $array ){
					echo "<tr id='table_balance_{$k}'>";
					foreach ( $array as $key => $value ){
						if ( 'credit' == $key ){
							$value = ( 0 <= $value )
								?	"<span class='pull-right'>$value €</span>"
								:	"<span class='pull-right text-error'><b>$value €</b></span>";
						}
						if( ! $key )
							if ( 'pay' == $value )
								$value = '<button class="btn btn-mini btn-danger" type="button">PAY</button>';
							if ( 'ask' == $value )
								$value = '<button class="btn btn-mini btn-info" type="button">ASK</button>';
						echo "<td>{$value}</td>";
					}
					echo '</tr>';
				}
			?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="3"><span class="pull-right">General Balance<span></td>
					<td>-350 €</td>
					<td></td>
					<td></td>
				</tr>
			</tfoot>

		</table>
	</div>
	<div class="span12">
		<div id="bottom"></div>
	</div>
</div>


<script>
	$(function() {
		$("#table_latest_coworkers tbody tr").on("click", function(event){
			var text = $(this).attr('id').slice( 23 );
			$('#bottom').addClass('hero-unit').html( '(dummy) loading CoWorker <span class="label label-warning">' + text + '</span> data' );
		});

		$("#table_balance tbody tr").on("click", function(event){
			var text = $(this).attr('id').slice( 14 );
			$('#bottom').addClass('hero-unit').html( '(dummy) loading CoSite <span class="label label-warning">' +  text + '</span> data' );
		});

});
</script>