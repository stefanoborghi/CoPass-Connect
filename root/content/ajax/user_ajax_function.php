<?php

function ajax_user_balance(){
	$isError = 0;
	$error = '';
	
	$id_user = isset($_REQUEST['id_user']) ? intval($_REQUEST['id_user']) : NULL;
	
	if(!empty($id_user)){
		$userData = array('id' => $id_user);
		
		$balanceData = array();
		$balanceData[] = array('where' => 'cowo360', 'payee' => 'acquisto credito', 'status' => 2, 'amount' => 100, 'date' => '12/08/2012', 'credit' => 300);
		$balanceData[] = array('where' => 'mutinerie', 'payee' => '2 days', 'status' => 2, 'amount' => -20, 'date' => '5/09/2012', 'credit' => 280);
		$balanceData[] = array('where' => 'cowo360', 'payee' => '2 days', 'status' => 1, 'amount' => -30, 'date' => '7/09/2012', 'credit' => 250);
	}else{
		$error = 'KO - User identification not possible';
	}
	
	if(!empty($error))
		$isError = 1;
	$errorData = array('isError' => $isError, 'message' => $error);
	
	$output = array('user' => $userData, 'balance' => $balanceData, 'error' => $errorData);
	
	echo json_encode($output);
	exit();
}

