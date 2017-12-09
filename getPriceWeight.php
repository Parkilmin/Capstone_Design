<?php
	include('./Android/connection.php');
	
	session_start();
	$FoodName = $_POST['FoodName'];

	$sql_food = "SELECT * FROM Food WHERE FoodName = '$FoodName'";
	$result = mysqli_query($connect, $sql_food);

	$food_arr = array();
	$idx = 0;
	while($row = mysqli_fetch_array($result)){
		$food_arr[$idx] = array();
		
		$food_arr[$idx]['Prices'] = $row['Prices'];
		$food_arr[$idx]['FoodWeight'] = $row['FoodWeight'];

		$idx++;
	}//make food_arr

	echo json_encode($food_arr, JSON_UNESCAPED_UNICODE);
?>