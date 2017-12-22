<?php
	require_once 'connection.php';
	
	session_start();

	$id = $_POST[userid];
	$pw = $_POST[userpw];

	$sql = "SELECT * FROM User";
	$result = mysqli_query($connect, $sql);
	$return_arr = array();
	while($row = mysqli_fetch_array($result)){
		$row_array['UserName'] = $row['UserName'];
		printf ("%s (%s)\n", $row[0], $row["UserName"]);
		array_push($return_arr, $row_array);
	}
	$sql2 = "SELECT * FROM $return_arr WHERE UserName = 'wonsik'";

	mysqli_close($connect);
?>
s
