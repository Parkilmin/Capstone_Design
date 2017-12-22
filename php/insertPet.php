<?php
	require_once 'connection.php';
	
	session_start();
	$petowner = $_POST[userid];
	$pettype = $_POST[pettype];
	$petname = $_POST[petname];
	$petage = $_POST[petage];
	$petweight = $_POST[petweight];
	$petsex = $_POST[petsex];

	$sql = "SELECT UserID FROM User Where UserName = '$petowner'";
	$result = mysqli_query($connect, $sql);
	if($result){
		$row = mysqli_fetch_array($result);
		$ownerid = $row[0];
	} else{
		echo "no user exists";
	}
	
	$sql2 = "INSERT INTO Pet(P_UserID, PetName, PetAge, Weight, P_TypeID) VALUES('$ownerid', '$petname', '$petage', '$petweight', '$pettype')";
	$result2 = mysqli_query($connect, $sql2);
	if($result2)
		echo "success";
	else
	echo "false";
	
	mysqli_close($connect);

?>

