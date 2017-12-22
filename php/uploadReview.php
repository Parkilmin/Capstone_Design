<?php
	require_once 'connection.php';

	session_start();

	$userName = $_POST['UserName'];
	$body = $_POST['Body'];
	$barcode = $_POST['Barcode'];
	$grade = $_POST['Grade'];

	$sql1 = "SELECT UserID From User Where UserName = '$userName'";
	$userResult = mysqli_query($connect, $sql1);
	if(!$userResult){
		die('Could not query');
		}
	$resc = mysqli_fetch_row($userResult);
	$R_UserID = $resc[0];

	$sql2 = "INSERT INTO Review(R_UserID, R_Barcode, Body, Grade) VALUES('$R_UserID', '$barcode','$body', '$grade')";
	$result = mysqli_query($connect, $sql2);

	if($result) echo "success";
	else 		echo "false";	
?>