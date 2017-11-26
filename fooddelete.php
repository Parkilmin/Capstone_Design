<?php
    include('dbconnect.php');
    session_start();
    mysqli_query($conn, "set session character_set_connection=utf8;");
	mysqli_query($conn, "set session character_set_results=utf8;");
	mysqli_query($conn, "set session character_set_client=utf8;");
    $query = "select * from Food";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="ko">
	<head>
			<meta charset="utf-8" />
			<title> 사료 정보 지우기 페이지 </title>
	</head>
	<body bgcolor="ffcc99">
		<form method='post' action='deletefooddelete.php'>
		<table border="2" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align ="center">
			<tr><h1 style="color:FF0099;font-size:2em;" align="center">펫의 사료 정보 보기</h1>
				<td>바코드 번호</td>
				<td><input type = 'text' name='Barcode' tabindex='1'/></td>
				<td><button type ="submit" /> 검색하기 </td>
				<td>사료의 이름</td>
				<td><input type = 'text' name='FoodName' tabindex='1'/></td>
				<td><button type ="submit" /> 검색하기 </td>
			</tr>
		</table>
		</td>
		</br>
		<table border="2" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align ="center">
			<tr>
				<td>바코드 숫자</td>
				<td>사료 이름</td>
				<td>가격</td>
				<td>사료 무게</td>
				<td>원산지</td>
				<td>메이커</td>
				<td>판매원 또는 수입원 </td>
				<td>강아지 또는 고양이</td>
				<td>BreedFrom</td>
				<td>BreedTo</td>
				<td>PregnantFnt</td>
				<td>SmellFnt</td>
				<td>TeethFnt</td>
				<td>DietFnt</td>
				<td>복용 가능 최소 나이</td>
				<td>복용 가능 최대 나이</td>
				<td>점수</td>
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
		    		echo "<td>".$row['12']."</td>";
		    		echo "<td>".$row['13']."</td>";
		    		echo "<td>".$row['14']."</td>";
		    		echo "<td>".$row['15']."</td>";
		    		echo "<td>".$row['16']."</td>";
		    		echo "</tr>";
		    		$n++;
			    	}
		   		?>
		    	</td>
		    </tr>
		</table>
		<br>
		<Br>
		<button><a href="foodmain.php" onclick="history.go(-1)">뒤로가기</button>
		</form>
	</body>
</html>