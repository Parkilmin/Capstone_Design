<?php
    include('dbconnect.php');
    session_start();
    mysqli_query($conn, "set session character_set_connection=utf8;");
    mysqli_query($conn, "set session character_set_results=utf8;");
    mysqli_query($conn, "set session character_set_client=utf8;");
    $query = "select * from User";
    $result = mysqli_query($conn, $query);

    $UserID = $_POST['UserID'];
    $UserName = $_POST['UserName'];
    $sql = "select * from User where UserID='$UserID' or UserName='$UserName'";

    $res = mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo "<script>alert('검색완료 !');</script>";

?>
<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8" />
		<title> 유저 정보 보기 페이지 </title>
	</head>
	<body bgcolor="ffcc99">
		<form method='post' action='usermain.php'>
		<table border="2" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align ="center">
			<tr><h1 style="font-size:2em;" align="center">유저 전체 정보 보기</h1>
			</tr>
				<td>번호</td>
				<td>유저 이름</td>
				<td>Password</td>
				<td>펫의 숫자</td>
				<td>Experience</td>
				<td>가입 날짜</td>
				<td>갱신 날짜</td>
				<?php
				$n=1;
				while($row=mysqli_fetch_array($res)){
		    		echo "<tr>";
		    		echo "<td>".$row['0']."</td>";
		    		echo "<td>".$row['1']."</td>";
		    		echo "<td>".$row['2']."</td>";
		    		echo "<td>".$row['3']."</td>";
		    		echo "<td>".$row['4']."</td>";
		    		echo "<td>".$row['5']."</td>";
		    		echo "<td>".$row['6']."</td>";
		    		echo "</tr>";
		    		$n++;
			    	}
		   		?>
		    	</td>
		</table>
		<button><a href ="usermain.php" onclick="history.go(-1)">뒤로가기</button>
	</body>
</html>