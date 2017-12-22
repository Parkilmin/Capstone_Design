<?php
	require_once 'connection.php';
	
	session_start();

	$sql = "SELECT * FROM Type";	
	$result = mysqli_query($connect, $sql);
	$return_arr = array();
	while($row = mysqli_fetch_array($result)){
		$row_array['TypeID'] = $row['TypeID'];
		$row_array['TypeName'] = $row['TypeName'];
		array_push($return_arr, $row_array);
	}

	echo json_encode($return_arr, JSON_UNESCAPED_UNICODE);
?>