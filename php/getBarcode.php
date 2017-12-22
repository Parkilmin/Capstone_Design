<?php
	# Find food data by barcode.
	require_once 'connection.php';
	
	session_start();

	// Post 'barcode' data from user
	$barcode = $_POST['barcode'];

	// 
	$sql = "SELECT * FROM Food WHERE Barcode = '$barcode'";	
	$result = mysqli_query($connect, $sql);
	$return_arr = array();
	while($row = mysqli_fetch_array($result)){
		$row_array['FoodName'] = $row['FoodName'];
		$row_array['Prices'] = $row['Prices'];
		$row_array['FoodWeight'] = $row['FoodWeight'];
		$row_array['Origin'] = $row['Origin'];
		$row_array['Maker'] = $row['Maker'];
		$row_array['Whom'] = $row['Whom'];
		$row_array['BreedFrom'] = $row['BreedFrom'];
		$row_array['BreedTo'] = $row['BreedTo'];

		$row_array['PregnantFnt'] = $row['PregnantFnt'];
		$row_array['SmellFnt'] = $row['SmellFnt'];
		$row_array['TeethFnt'] = $row['TeethFnt'];
		$row_array['DietFnt'] = $row['DietFnt'];
		
		$row_array['AgeFrom'] = $row['AgeFrom'];
		$row_array['AgeTo'] = $row['AgeTo'];
		$row_array['Score'] = $row['Score'];
		#array_push($return_arr, $row_array);
	}

	$sql2 = "SELECT * FROM Analysis WHERE A_Barcode = '$barcode'";	
	$result2 = mysqli_query($connect, $sql2);
	while($row = mysqli_fetch_array($result2)){
		$row_array['Protein'] = $row['Protein'];
		$row_array['Fat'] = $row['Fat'];
		$row_array['Ash'] = $row['Ash'];
		$row_array['Fiber'] = $row['Fiber'];
		$row_array['Moisture'] = $row['Moisture'];
		$row_array['Calcium'] = $row['Calcium'];
		$row_array['Phosphorus'] = $row['Phosphorus'];
		$row_array['Omega3'] = $row['Omega3'];
		$row_array['Omega6'] = $row['Omega6'];
		$row_array['VitaminA'] = $row['VitaminA'];
		$row_array['VitaminD'] = $row['VitaminD'];
		$row_array['VitaminE'] = $row['VitaminE'];
		
		array_push($return_arr, $row_array);
	}

	// $sql3 = "SELECT * FROM Review WHERE R_Barcode = '$barcode' order by Grade desc limit 1";
	// $result3 = mysqli_query($connect, $sql3);
	// while($row = mysqli_fetch_array($result3)){
	// 	$row_array['Body'] = $row['Body'];
	// 	$userID = $row['R_UserID'];
	// 	$sql4 = "SELECT UserName From User Where UserID = '$userID'";
	// 	$result4 = mysqli_query($connect, $sql4);
	// 	if(!$result4){
	// 	die('Could not query');
	// 	}
	// 	$resc = mysqli_fetch_row($result4);
	// 	$row_array['UserName'] = $resc[0];
	// 	array_push($return_arr, $row_array);
	// }



	echo json_encode($return_arr, JSON_UNESCAPED_UNICODE);
?>