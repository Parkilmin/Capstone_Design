<?php

	require_once 'connection.php';

	session_start();

	$barcodeQuery = "SELECT Barcode FROM Food";
	$result = mysqli_query($connect, $barcodeQuery);

	$return_arr = array();
	$barcode_return = array();
	while($row = mysqli_fetch_array($result)){
		$row_array['Barcode'] = $row['Barcode'];
		$C_Barcode = $row['Barcode'];
		$barcode_arr['Barcode'] = $row['Barcode'];
		$containQuery = "SELECT * FROM Contain WHERE C_Barcode = '$C_Barcode'";
		$containResult = mysqli_query($connect, $containQuery);
		while($row2 = mysqli_fetch_array($containResult)){
			$row_array['IgOrder'] = $row2['IgOrder'];
			$row_array['C_IngrdtID'] = $row2['C_IngrdtID'];
			$IngrdtID = $row2['C_IngrdtID'];
			$ingrdtQuery = "SELECT grade FROM Ingredient WHERE IngrdtID = '$IngrdtID'";
			$ingrdtResult = mysqli_query($connect, $ingrdtQuery);
			$ingrdt = mysqli_fetch_row($ingrdtResult);
			$row_array['Grade'] = $ingrdt[0];
			array_push($return_arr, $row_array);
			
		}
		array_push($barcode_return, $barcode_arr);
	}
	$barcodeMax = sizeof($barcode_return);
	$returnMax = sizeof($return_arr);


	for($i=0; $i< $barcodeMax; $i++){
		$grade = array();
		$idx = 1;
		$score = 0;
		$idxMax = 0;
		for($j=0;$j<$returnMax;$j++){
			if($barcode_return[$i]['Barcode'] == $return_arr[$j]['Barcode']){
				$grade[$idx] = $return_arr[$j]['Grade'];
				$idx++;
			}			
		}
		$containMax = $idx;
		$idx -= 1;
		for($k = 1; $k <$containMax;$k++){
			$score += $grade[$k] * $idx * $idx;
			$idxMax += $idx * $idx;
			$idx--;
			
		}
		$scorePercent = $score / $idxMax;
		$barcode = $barcode_return[$i]['Barcode'];
		$scoreQuery = "UPDATE Food SET Score = '$scorePercent' WHERE Barcode = '$barcode'";
		$scoreResult = mysqli_query($connect, $scoreQuery);
	}

	
?>