<?php
    include('dbconnect.php');
    session_start();
        mysqli_query($conn, "set session character_set_connection=utf8;");
    mysqli_query($conn, "set session character_set_results=utf8;");
    mysqli_query($conn, "set session character_set_client=utf8;");
    $query = "select * from Food";
    $result = mysqli_query($conn, $query);

    $Barcode = $_POST['Barcode'];
    $FoodName = $_POST['FoodName'];
    $Price = $_POST['Price'];
    $FoodWeight = $_POST['FoodWeight'];
    $Origin = $_POST["Origin"];
    $Maker = $_POST['Maker'];
    $SalesOrImport = $_POST['SalesOrImport'];
    $Whom = $_POST['Whom'];
    $BreedFrom = $_POST['BreedFrom'];
    $BreedTo = $_POST['BreedTo'];
    $PregnantFnt = $_POST['PregnantFnt'];
    $SmellFnt = $_POST['SmellFnt'];
    $TeethFnt = $_POST['TeethFnt'];
    $DietFnt = $_POST['DietFnt'];
    $AgeFrom = $_POST['AgeFrom'];
    $AgeTo = $_POST['AgeTo'];
    $Score = $_POST['Score'];

    $sql = "insert into Food VALUES('$Barcode', '$FoodName', '$Price', '$FoodWeight', '$Origin', '$Maker', '$SalesOrImport', '$Whom', '$BreedFrom', '$BreedTo', '$PregnantFnt', '$SmellFnt', '$TeethFnt', '$DietFnt', '$AgeFrom', '$AgeTo', '$Score')";
    $res = mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo("<html>
    	<head>
    	<script name=javascript>
    	location.href='foodmain.php';
    	self.window.alert('사료 정보가 성공적으로 업데이트 되었습니다. ');
    	</script>
    	</head>
    	</html>
	");
	mysql_close($conn);
?>