<?php
include('./Android/connection.php');
	
	session_start();
	$sql_food = "SELECT * FROM Food";
	$result = mysqli_query($connect, $sql_food);
	
	$food_arr = array();
	$idx = 0;
	while($row = mysqli_fetch_array($result)){
		$food_arr[$idx] = array();
	
		$food_arr[$idx]['Barcode'] = $row['Barcode'];
		$food_arr[$idx]['FoodName'] = $row['FoodName'];
		$food_arr[$idx]['Prices'] = $row['Prices'];
		$food_arr[$idx]['FoodWeight'] = $row['FoodWeight'];
		$food_arr[$idx]['Origin'] = $row['Origin'];
		$food_arr[$idx]['Maker'] = $row['Maker'];
		$food_arr[$idx]['Whom'] = $row['Whom'];
		$food_arr[$idx]['BreedFrom'] = $row['BreedFrom'];
		$food_arr[$idx]['BreedTo'] = $row['BreedTo'];
		$food_arr[$idx]['PregnantFnt'] = $row['PregnantFnt'];
		$food_arr[$idx]['SmellFnt'] = $row['SmellFnt'];
		$food_arr[$idx]['TeethFnt'] = $row['TeethFnt'];
		$food_arr[$idx]['DietFnt'] = $row['DietFnt'];
		$food_arr[$idx]['AgeFrom'] = $row['AgeFrom'];
		$food_arr[$idx]['AgeTo'] = $row['AgeTo'];
		$food_arr[$idx]['Score'] = $row['Score'];
		$idx++;
	}//make food_arr
	$sql_analysis = "SELECT * FROM Analysis";
	$result = mysqli_query($connect, $sql_analysis);
	
	$analysis_arr = array();
	$idx_anal = 0;
	while($row = mysqli_fetch_array($result)){
		$analysis_arr[$idx_anal] = array();
	
		$analysis_arr[$idx_anal]['A_Barcode'] = $row['A_Barcode'];
		$analysis_arr[$idx_anal]['Protein'] = $row['Protein'];
		$analysis_arr[$idx_anal]['Fat'] = $row['Fat'];
		$analysis_arr[$idx_anal]['Ash'] = $row['Ash'];
		$analysis_arr[$idx_anal]['Fiber'] = $row['Fiber'];
		$analysis_arr[$idx_anal]['Moisture'] = $row['Moisture'];
		$analysis_arr[$idx_anal]['Calcium'] = $row['Calcium'];
		$analysis_arr[$idx_anal]['Phosphorus'] = $row['Phosphorus'];
		$analysis_arr[$idx_anal]['Omega3'] = $row['Omega3'];
		$analysis_arr[$idx_anal]['Omega6'] = $row['Omega6'];
		$idx_anal++;
	}//make analysis_arr
	$username = $_POST['P_UserID'];
	$PetName = $_POST['PetName'];
	$sql_finduser = "SELECT UserID from User WHERE UserName = '$username'";

	$userresult = mysqli_query($connect, $sql_finduser);
	if(!$userresult){
		die('Could not query');
	}
	$resc = mysqli_fetch_row($userresult);
	$id = $resc[0];
	//userID, petName 받음
	
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
	$idx = count($food_arr); // idx = size of food_arr
	
	if($pet_data['PetAge'] <= 8 || $pet_data['Pregnant'] == 1){
		for($i = 0; $i<$idx_anal; $i++){
			if($analysis_arr[$i]['Protein'] >= 22.5 && $analysis_arr[$i]['Fat'] >= 8.5 ) continue;
			//&& $analysis_arr[$i]['Calcium'] >= 1.2 && $analysis_arr[$i]['Calcium'] <= 1.8 && $analysis_arr[$i]['Phosphorus'] >= 1.0 && $analysis_arr[$i]['Phosphorus'] <= 1.6
			else{
				for($j = 0; $j<$idx; $j++){
					if($analysis_arr[$i]['A_Barcode'] == $food_arr[$j]['Barcode']){
						unset($food_arr[$j]);
						unset($analysis_arr[$i]);
						break;
					}	
				}
			}
		}
	}//성장 & 임신 성분 확인
	else{
		for($i = 0; $i<$idx_anal; $i++){
			if($analysis_arr[$i]['Protein'] >= 18.0 && $analysis_arr[$i]['Fat'] >= 5.5) continue;
			// && $analysis_arr[$i]['Calcium'] >= 0.5 && $analysis_arr[$i]['Calcium'] <= 1.8 && $analysis_arr[$i]['Phosphorus'] >= 0.4 && $analysis_arr[$i]['Phosphorus'] <= 1.6
			else{
				for($j = 0; $j<$idx; $j++){
					if($analysis_arr[$i]['A_Barcode'] == $food_arr[$j]['Barcode']){
						unset($food_arr[$j]);
						unset($analysis_arr[$i]);
						break;
					}	
				}
			}
		}
	}//성견
	for($i = 0; $i<$idx; $i++){
		if($food_arr[$i]['Whom'] != $pet_data['Species']){
			unset($food_arr[$i]);
		}
	}//Dog OR Cat
	
	for($i = 0; $i<$idx; $i++){
		if($pet_data['PetAge'] >= $food_arr[$i]['AgeFrom'] && $pet_data['PetAge'] <= $food_arr[$i]['AgeTo']) continue;
		else{
		 	unset($food_arr[$i]);
		}
	}//Age 확인
	
	for($i = 0; $i<$idx; $i++){
		if($pet_data['Breed'] >= $food_arr[$i]['BreedFrom'] && $pet_data['Breed'] <= $food_arr[$i]['BreedTo']) continue;
		else{
		 	unset($food_arr[$i]);
		}
	}//Breed 확인
	if($pet_data['Teeth'] == 1){
		for($i = 0; $i<$idx; $i++){
			if($food_arr[$i]['TeethFnt'] == 0){
			 	unset($food_arr[$i]);
			}
		}
	}//치아 건강 관리 확인
	if($pet_data['Pregnant'] == 1){
		for($i = 0; $i<$idx; $i++){
			if($food_arr[$i]['PregnantFnt'] == 0){
			 	unset($food_arr[$i]);
			}
		}
	}//임신용 확인
	if($pet_data['Diet'] == 1){
		for($i = 0; $i<$idx; $i++){
			if($food_arr[$i]['DietFnt'] == 0){
			 	unset($food_arr[$i]);
			}
		}
	}//체중관리 OR 중성화용 확인
	if($pet_data['StoolSmell'] == 1){
		for($i = 0; $i<$idx; $i++){
			if($food_arr[$i]['SmellFnt'] == 0){
			 	unset($food_arr[$i]);
			}
		}
	}//변냄새 관리 확인
	$arrlength = count($food_arr);
	for($i = 0; $i<$idx; $i++){
		for($j = $i+1; $j<$idx; $j++){
			if($food_arr[$i]['FoodName'] == $food_arr[$j]['FoodName']){
				unset($food_arr[$j]);
			}
		}
	}
	$food_arr = array_values($food_arr);
	foreach ($food_arr as $key => $row){
      $Score[$key] = $row['Score'];
   	}
 
   	array_multisort($Score, SORT_DESC, $food_arr);
   	$arrlength = count($food_arr);
	if($arrlength>4){
		for($i = 5; $i<$arrlength; $i++){
			unset($food_arr[$i]);
		}
	}
//적합사료 정보 리턴
	echo json_encode($food_arr, JSON_UNESCAPED_UNICODE);
?>