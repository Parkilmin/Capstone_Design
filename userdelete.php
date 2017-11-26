<?php
    include('dbconnect.php');
    session_start();
    mysqli_query($conn, "set session character_set_connection=utf8;");
    mysqli_query($conn, "set session character_set_results=utf8;");
    mysqli_query($conn, "set session character_set_client=utf8;");
    $query = "select * from User";
    $result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="ko">
	<head>
			<meta charset="utf-8" />
			<title> 사료 정보 지우기 페이지 </title>
	</head>
	<body bgcolor="ffcc99">
		<form method='post' action='userdeletedo.php'>
		<table border="2" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align ="center">
			<tr>유저의 정보 보기
				<td>몇 번에 저장된 유저를 탈퇴시키시겠습니까? </td>
				<td><input type = 'text' name='UserID' tabindex='1'/></td>
			<tr>
		</table>
		<table border="2" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align ="center">
				<td>유저 넘버</td>
				<td>유저 이름</td>
				<td>Password</td>
				<td>애완동물의 숫자</td>
				<td>애완동물 경험</td>
				<td>생성 날짜</td>
				<td>업데이트 날짜</td>
				<?php
				$n=1;
				while($row=mysqli_fetch_array($result)){
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
		    	</br>
		    	<tr>
		</table>
		</br>
		<table border="2" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align ="center">
		<tr>
			<td><button type="submit">삭제하기</button></td>
			</tr>
		</table>
		</br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<button><a href="usermain.php" onclick="history.go(-1)">뒤로가기</button>
		</form>
	</body>
</html>