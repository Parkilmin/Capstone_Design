<?php
	require_once 'connection.php';
	
	session_start();

	$id = $_POST[userid];
	$pw = $_POST[userpw];
	$sql = "SELECT * FROM User WHERE UserName = '$id'";
	$result = mysqli_query($connect, $sql);
	$count = mysqli_num_rows($result);
	if($count >= 1) {
		echo "user exist";
		exit;
	}

	else{
		$sql = "INSERT INTO User(UserName,Password, CreatedAt) VALUES('$id', '$pw', NULL)";
		$result = mysqli_query($connect, $sql);
		if($result)
			echo "success";
		else
			echo "false";	
	}
	mysqli_close($connect);
?>

