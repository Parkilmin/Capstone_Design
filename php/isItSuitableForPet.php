<?php
	include('./Android/connection.php');
	
	session_start();
	$username = $_POST['P_UserID'];
	$sql_finduser = "SELECT UserID from User WHERE UserName = '$username'";

	$userresult = mysqli_query($connect, $sql_finduser);
	if(!$userresult){
		die('Could not query');
	}
	$resc = mysqli_fetch_row($userresult);
	$id = $resc[0];
	//$id = $_POST['P_UserID'];
	$PetName = $_POST['PetName'];
	$Barcode = $_POST['Barcode'];
	$sql_findbarcode = "SELECT FoodName from Food WHERE Barcode = '$Barcode'";

	$barcoderesult = mysqli_query($connect, $sql_findbarcode);
	if(!$barcoderesult){
		die('Could not query');
	}
	$resc2 = mysqli_fetch_row($barcoderesult);
	$foodname = $resc2[0];

	$return_arr = array(); //return value
	$return_arr['foodName'] = $foodname;
	$return_arr['check1'] = true;//성장 & 임신 성분 확인
	$return_arr['check2'] = true;//성견
	$return_arr['check3'] = true;//Dog OR Cat
	$return_arr['check4'] = true;//Age 확인
	$return_arr['check5'] = true;//Breed 확인
	$return_arr['check6'] = true;//치아 건강 관리 확인
	$return_arr['check7'] = true;//임신용 확인
	$return_arr['check8'] = true;//체중관리 OR 중성화용 확인
	$return_arr['check9'] = true;//변냄새 관리 확인
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
	// echo json_encode($pet_data);
	// echo("</br>");
	
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
	// echo json_encode($food_arr);
	// echo("</br>");
	$sql_anal = "SELECT * FROM Analysis WHERE A_Barcode = '$Barcode'";
	$result = mysqli_query($connect, $sql_anal);
	
	while($row = mysqli_fetch_array($result)){
	
		$analysis_arr['A_Barcode'] = $row['A_Barcode'];
		$analysis_arr['Protein'] = $row['Protein'];
		$analysis_arr['Fat'] = $row['Fat'];
		$analysis_arr['Ash'] = $row['Ash'];
		$analysis_arr['Fiber'] = $row['Fiber'];
		$analysis_arr['Moisture'] = $row['Moisture'];
		$analysis_arr['Calcium'] = $row['Calcium'];
		$analysis_arr['Phosphorus'] = $row['Phosphorus'];
		$analysis_arr['Omega3'] = $row['Omega3'];
		$analysis_arr['Omega6'] = $row['Omega6'];
	}//make analysis_arr
	// echo json_encode($analysis_arr);
	// echo("</br>");
	if($pet_data['PetAge'] <= 8 || $pet_data['Pregnant'] == 1){
		
		if($analysis_arr['Protein'] >= 22.5 && $analysis_arr['Fat'] >= 8.5 && $analysis_arr['Calcium'] >= 1.2 && $analysis_arr['Calcium'] <= 1.8 && $analysis_arr['Phosphorus'] >= 1.0 && $analysis_arr['Phosphorus'] <= 1.6);
		else{
			// echo "check1";
			// echo("</br>");
			$return_arr['check1'] = false;
		}
		
	}//성장 & 임신 성분 확인
	
	else{
		if($analysis_arr['Protein'] >= 18.0 && $analysis_arr['Fat'] >= 5.5 && $analysis_arr['Calcium'] >= 0.5 && $analysis_arr['Calcium'] <= 1.8 && $analysis_arr['Phosphorus'] >= 0.4 && $analysis_arr['Phosphorus'] <= 1.6);
		else{
			// echo "check2";
			// echo("</br>");
			$return_arr['check2'] = false;			
		}
	}//성견
	
	if($pet_data['Species'] != $food_arr['Whom']){
		// echo "check3";
		// echo("</br>");
		$return_arr['check3'] = false;
	}//Dog OR Cat
	
	if($pet_data['PetAge'] < $food_arr['AgeFrom'] || $pet_data['PetAge'] > $food_arr['AgeTo']){
		// echo "check4";
		// echo("</br>");
		$return_arr['check4'] = false;
	}//Age 확인
	
	if($pet_data['Breed'] < $food_arr['BreedFrom'] && $pet_data['Breed'] > $food_arr['BreedTo']){
		// echo "check5";
		// echo("</br>");
		$return_arr['check5'] = false;
	}//Breed 확인
	
	if($pet_data['Teeth'] == 1 && $food_arr['TeethFnt'] == 0){
		// echo "check6";
		// echo("</br>");
		$return_arr['check6'] = false;
	}//치아 건강 관리 확인
	if($pet_data['Pregnant'] == 1 && $food_arr['PregnantFnt'] == 0){
		// echo "check7";
		// echo("</br>");
		$return_arr['check7'] = false;
	}//임신용 확인
	if($pet_data['Diet'] == 1 && $food_arr['DietFnt'] == 0){
		// echo "check8";
		// echo("</br>");
		$return_arr['check8'] = false; 
	}//체중관리 OR 중성화용 확인
	if($pet_data['StoolSmell'] == 1 && $food_arr['SmellFnt'] == 0){
		// echo "check9";
		// echo("</br>");
		$return_arr['check9'] = false;
	}//변냄새 관리 확인
	
	echo json_encode($return_arr, JSON_UNESCAPED_UNICODE);
?>