<?php
require_once 'connection.php';
$server_ip = "18.216.142.72";
$upload_path = 'uploads/';
$upload_url = 'http://'.$server_ip.'/AndroidImageUpload/'.$upload_path;
mysqli_query($connect, "set character_set_connection='utf8';");
mysqli_query($connect, "set character_set_results='utf8';");
mysqli_query($connect, "set character_set_client='utf8';");

if($_SERVER['REQUEST_METHOD'] == POST){
	if(isset($_POST['name']) and isset($_FILES['image']['name'])){

		$username = $_POST['username'];
		$usersql = "SELECT UserID FROM User Where UserName = '$username'";
		$userresult = mysqli_query($connect, $usersql);
		if($userresult){
			$row = mysqli_fetch_array($userresult);
			$userid = $row[0];
		}
		$name = $_POST['name'];
		$petage = $_POST['age'];
		$weight = $_POST['weight'];
		$Species = $_POST['spicies'];
		$breed = $_POST['breed'];
		$typeID = $_POST['typeID'];
		$fileinfo = pathinfo($_FILES['image']['name']);
		$extension = $fileinfo['extension'];
		$file_url = $upload_url. $name .'.' .$extension;
		$file_path = $upload_path. $name.'.'.$extension;
		try{
			move_uploaded_file($_FILES['image']['tmp_name'], $file_path);
			$sql = "INSERT INTO Pet(P_UserID, PetName, Breed, PetAge, Weight, Species, P_TypeID, image) VALUES('$userid', '$name', '$breed', '$petage', '$weight', '$spicies', '$typeID', '$file_url');";
 			//adding the path and name to database 
			if(mysqli_query($connect,$sql)){

 			//filling response array with values 
				$response['error'] = false; 
				$response['url'] = $file_url; 
				$response['name'] = $name;
			}
		} catch(Exception $e){
			$response['error']= true;
			$response['message'] = $e->getMessage();
		}
		echo json_encode($response);
		mysqli_close($connect);

	}else{
		$response['error']=true;
		$response['message']='Please choose a file';
	}
}



?>
