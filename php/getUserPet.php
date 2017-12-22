<?php
require_once 'connection.php';

session_start();

$username = $_POST['username'];
$sql = "SELECT UserID FROM User WHERE UserName = '$username'";	
$result = mysqli_query($connect, $sql);
if(!$result){
	die('Could not query');
}
#resc[0]가 원하는 사람의 UserID;
$resc = mysqli_fetch_row($result);
$userid = $resc[0];
$sql = "SELECT * FROM Pet WHERE P_UserID = '$userid'";
$result = mysqli_query($connect, $sql);

$return_arr = array();
while($row = mysqli_fetch_array($result)){
	$row_array['PetName'] = $row['PetName'];
	$row_array['Breed'] = $row['Breed'];
	$row_array['PetAge'] = $row['PetAge'];
	$row_array['Weight'] = $row['Weight'];
	$row_array['Species'] = $row['Species'];
	$row_array['P_TypeID'] = $row['P_TypeID'];
	$P_TypeID = $row['P_TypeID'];
	$sql = "SELECT TypeName FROM Type Where TypeID = '$P_TypeID'";
	$typeresult = mysqli_query($connect, $sql);
	$typeresc = mysqli_fetch_row($typeresult);
	$row_array['TypeName'] = $typeresc[0];
	$row_array['Pregnant'] = $row['Pregnant'];
	$row_array['StoolSmell'] = $row['StoolSmell'];
	$row_array['Teeth'] = $row['Teeth'];
	$row_array['Diet'] = $row['Diet'];
	$row_array['image'] = $row['image'];
	array_push($return_arr, $row_array);
}
echo json_encode($return_arr, JSON_UNESCAPED_UNICODE);

?>