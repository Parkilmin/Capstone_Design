<?php
    include('dbconnect.php');
    session_start();
    mysqli_query($conn, "set session character_set_connection=utf8;");
    mysqli_query($conn, "set session character_set_results=utf8;");
    mysqli_query($conn, "set session character_set_client=utf8;");
    $query = "select * from Review";
    $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8" />
		<title> 리뷰 정보 보기 페이지 </title>
	</head>
	<body bgcolor="ffcc99">
		<form method='post' action='Reviewinfodo.php'>
		<table border="2" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align ="center">
			<tr><h1 style="color:FF0099;font-size:2em;" align="center">리뷰 정보 보기</h1>
				<td> 유저 번호 </td>
				<td><input type = 'text' name='R_UserID' tabindex='1'/></td>
				<td><button type="submit" /> 검색 </button></td>
			</tr>
		</table>
		</br>
		<table border="1" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align="center" text-align="center">
			<tr>
				<td align = "center">ReviewID</td>
				<td> 유저 번호 </td>
				<td> 바코드 </td>
				<td> Body </td>
				<?php
				$n=1;
				while($row=mysqli_fetch_array($result)){
		    		echo "<tr>";
		    		echo "<td>".$row['0']."</td>";
		    		echo "<td>".$row['1']."</td>";
		    		echo "<td>".$row['2']."</td>";
		    		echo "<td>".$row['3']."</td>";
		    		echo "</tr>";
		    		$n++;
			    	}
		   		?>
		    	</td>
		    </tr>
		</table>
		</br>
		<br>
		<br>
		<br>
		<button><a href ="mainpage.php" onclick="history.go(-1)">뒤로가기</button>
	</body>
</html>