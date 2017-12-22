<?php
	
	require_once 'connection.php';
		
	session_start();

	$id = $_POST[userid];
	$pw = $_POST[userpw];

	$sql = "SELECT * FROM User WHERE UserName = '$id' AND Password = '$pw'";

	$result = mysqli_query($connect, $sql);
	$resc = mysqli_fetch_row($result);
	if($resc){
		echo "success";
	}
	else
		echo "false";
	
	mysqli_close($connect);

?>
