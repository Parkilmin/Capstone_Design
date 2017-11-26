<?php
    include('dbconnect.php');
    session_start();
    mysqli_query($conn, "set session character_set_connection=utf8;");
    mysqli_query($conn, "set session character_set_results=utf8;");
    mysqli_query($conn, "set session character_set_client=utf8;");
    $query = "select * from Pet";
    $result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8" />
		<title> 펫 정보 보기 페이지 </title>
	</head>
	<body bgcolor="ffcc99">
		<form method='post' action='petinfodo.php'>
		<table border="2" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align ="center">
			<tr><h1 style="color:FF0099;font-size:2em;" align="center">펫 전체 정보 보기</h1>
				<td> 애완동물의 이름 </td>
				<td><input type = 'text' name='PetName' tabindex='1'/></td>
				<td><button type="submit" /> 검색 </button></td>
				<td> 유저 번호 </td>
				<td><input type = 'text' name='P_UserID' tabindex='1'/></td>
				<td><button type="submit" /> 검색 </button></td>
			</tr>
		</table>
		</br>
		<table border="1" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align="center" text-align="center">
			<tr>
				<td align = "center">PetID</td>
				<td> 유저 번호 </td>
				<td> 애완동물의 이름</td>
				<td> Breed </td>
				<td> 애완동물의 나이 </td>
				<td align = "center"> 애완동물의 무게 </td>
				<td align = "center"> 애완동물의 종류 </td>
				<td> P_TypeID </td>
				<td> Pregnant </td>
				<td> stoolSmell </td>
				<td> Teeth </td>
				<td> Diet </td>
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
		    		echo "<td>".$row['7']."</td>";
		    		echo "<td>".$row['8']."</td>";
		    		echo "<td>".$row['9']."</td>";
		    		echo "<td>".$row['10']."</td>";
		    		echo "<td>".$row['11']."</td>";
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