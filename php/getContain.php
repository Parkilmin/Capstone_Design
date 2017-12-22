<?php
	require_once 'connection.php';
	
	session_start();

	$barcode = "5060189111930";
	$sql = "SELECT * FROM Contain WHERE C_Barcode = '$barcode'";	
	$result = mysqli_query($connect, $sql);
	$return_arr = array();
	while($row = mysqli_fetch_array($result)){
		$row_array['C_Barcode'] = $row['C_Barcode'];
		$row_array['C_IngrdtID'] = $row['C_IngrdtID'];
		$row_array['Note'] = $row['Note'];
		array_push($return_arr, $row_array);
	}


	echo json_encode($return_arr, JSON_UNESCAPED_UNICODE);
?>