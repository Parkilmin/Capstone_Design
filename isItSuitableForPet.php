<?php
	include('./Android/connection.php');
	
	session_start();

	$id = $_POST['P_UserID'];
	$PetName = $_POST['PetName'];
	$Barcode = $_POST['Barcode'];

	$sql_pet = "SELECT * FROM Pet WHERE P_UserID = '$id' AND PetName = '$PetName'";
	$result = mysqli_query($connect, $sql_pet);	
	
	while($row = mysqli_fetch_array($result)){
		
		$pet_data['Breed'] = $row['Breed'];
		$pet_data['PetAge'] = $row['PetAge'];
		$pet_data['Weight'] = $row['Weight'];
		$pet_data['Species'] = $row['Species'];
		$pet_data['P_TypeID'] = $row['P_TypeID'];
		$pet_data['Pregnant'] = $row['Pregnant'];
		$pet_data['StoolSmell'] = $row['StoolSmell'];
		$pet_data['Teeth'] = $row['Teeth'];
		$pet_data['Diet'] = $row['Diet'];
	}//해당 pet data 가져오기
	echo json_encode($pet_data);
	echo("</br>");
	
	$sql_food = "SELECT * FROM Food WHERE Barcode = '$Barcode'";
	$result = mysqli_query($connect, $sql_food);
	
	while($row = mysqli_fetch_array($result)){
	
		$food_arr['Barcode'] = $row['Barcode'];
		$food_arr['FoodName'] = $row['FoodName'];
		$food_arr['Prices'] = $row['Prices'];
		$food_arr['FoodWeight'] = $row['FoodWeight'];
		$food_arr['Origin'] = $row['Origin'];
		$food_arr['Maker'] = $row['Maker'];
		$food_arr['Whom'] = $row['Whom'];
		$food_arr['BreedFrom'] = $row['BreedFrom'];
		$food_arr['BreedTo'] = $row['BreedTo'];
		$food_arr['PregnantFnt'] = $row['PregnantFnt'];
		$food_arr['SmellFnt'] = $row['SmellFnt'];
		$food_arr['TeethFnt'] = $row['TeethFnt'];
		$food_arr['DietFnt'] = $row['DietFnt'];
		$food_arr['AgeFrom'] = $row['AgeFrom'];
		$food_arr['AgeTo'] = $row['AgeTo'];
		$food_arr['Score'] = $row['Score'];
	}//make food_arr

	echo json_encode($food_arr);
?>