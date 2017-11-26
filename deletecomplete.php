<?php
    include('dbconnect.php');
    session_start();

    $query = "select * from Food";
    $result = mysqli_query($conn, $query);

    $FoodName = $_POST['FoodName'];
   
    $sql = "delete from Food where FoodName='$FoodName'";
    $res = mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo("<html>
    	<head>
    	<script name=javascript>
    	location.href='fooddelete.php';
    	self.window.alert('사료 정보가 성공적으로 삭제 되었습니다. ');
    	</script>
    	</head>
    	</html>
	");

	mysql_close($conn);
?>