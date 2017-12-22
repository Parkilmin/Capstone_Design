<?php
	require_once 'connection.php';
	
	session_start();

	$barcode = $_POST['barcode'];
	$sql = "SELECT * FROM Contain WHERE C_Barcode = '$barcode'";	
	$result = mysqli_query($connect, $sql);
	$return_arr = array();
	while($row = mysqli_fetch_array($result)){
		$row_array['IgOrder'] = $row['IgOrder'];
		$row_array['C_IngrdtID'] = $row['C_IngrdtID'];
		$row_array['Note'] = $row['Note'];
		$C_IngrdtID = $row['C_IngrdtID'];
		$sql2 = "SELECT Information FROM Ingredient Where IngrdtID = '$C_IngrdtID'";
		$sql3 = "SELECT grade FROM Ingredient Where IngrdtID = '$C_IngrdtID'";
		$information = mysqli_query($connect,$sql2);
		$grade = mysqli_query($connect,$sql3);
		$row_information = mysqli_fetch_array($information);
		$row_grade = mysqli_fetch_array($grade);
		$row_array['Information'] = $row_information[0];
		$row_array['Grade'] = $row_grade[0];
		array_push($return_arr, $row_array);
	}

	echo json_encode($return_arr, JSON_UNESCAPED_UNICODE);
?>