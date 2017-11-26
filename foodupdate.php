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
		<meta charset="utf-8">
		<title> 사료 업데이트 페이지 </title>
	</head>
	<body bgcolor="ffcc99">
		<form method='post' action='insertfoodupdate.php'>
		<table border="2" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align ="center">
			<tr><h1 style="color:FF0099;font-size:2em;" align="center">펫의 사료 업데이트</h1>
				<td>Barcode </td>
				<td><input type = 'text' name='Barcode' tabindex='1'/></td>
				<td> 사료의 바코드 </td>
			</tr>
			<tr>
				<td> FoodName </td>
				<td><input type = 'text' name='FoodName' tabindex='1'/></td>
				<td> 사료의 이름 </td>
			</tr>
			<tr>
				<td>Price </td>
				<td><input type = 'text' name='Price' tabindex='1'/></td>
				<td> 사료의 가격</td>
			</tr>
			<tr>
				<td>FoodWeight </td>
				<td><input type = 'text' name='FoodWeight' tabindex='1'/></td>
				<td> 사료의 무게 ( 단위 : kg)</td>
			</tr>
			<tr>
				<td>Origin </td>
				<td><input type = 'text' name='Origin' tabindex='1'/></td>
				<td> 사료의 원산지 </td>
			</tr>
			<tr>
				<td>Maker </td>
				<td><input type = 'text' name='Maker' tabindex='1'/></td>
				<td> 사료의 제조사 </td>
			</tr>
				<tr>
				<td>SalesOrImport</td>
				<td><input type = 'text' name='SalesOrImport' tabindex='1'/></td>
				<td> 판매원 또는 수입원</td>
			</tr>
			<tr>
				<td>Whom </td>
				<td><input type = 'text' name='Whom' tabindex='1'/></td>
				<td> 급여 대상 ( 강아지 : 0 , 고양이 : 1 )</td>
			</tr>
			<tr>
				<td>BreedFrom </td>
				<td><input type = 'text' name='BreedFrom' tabindex='1'/></td>
				<td> 강아지의 크기 분류 ( 소형 : 0 , 중형 : 1 , 대형 : 2 )</td>
			</tr>
			<tr>
				<td>BreedTo </td>
				<td><input type = 'text' name='BreedTo' tabindex='1'/></td>
				<td> 강아지의 크기 분류 ( 소형 : 0 , 중형 : 1 , 대형 : 2 )</td><
			</tr>
			<tr>
				<td>PregnantFnt </td>
				<td><input type = 'text' name='PregnantFnt' tabindex='1'/></td>
				<td> 임신 여부 ( 임신 중 급여 불가 사료 : 0 , 임신 중 급여가능 사료 : 1 )</td>
			</tr>
			<tr>
				<td>SmellFnt </td>
				<td><input type = 'text' name='SmellFnt' tabindex='1'/></td>
				<td> 변 냄새 제거를 위한 사료 ( 제거 기능 X : 0, 제거 기능 O : 1 )</td>
			</tr>
			<tr>
				<td>TeethFnt </td>
				<td><input type = 'text' name='TeethFnt' tabindex='1'/></td>
				<td> 치아 건강에 피해를 끼치는 지에 대한 여부 ( 끼치면 : 0 , 안끼치면 : 1 )</td>
			</tr>
			<tr>
				<td>DietFnt </td>
				<td><input type = 'text' name='DietFnt' tabindex='1'/></td>
				<td> 다이어트용 사료 ( 맞으면 : 1 , 아니면 : 0 )</td>
			</tr>
			<tr>
				<td>AgeFrom </td>
				<td><input type = 'text' name='AgeFrom' tabindex='1'/></td>
				<td> 급여 연령  ~  부터 ( 단위 : month ) </td>
			</tr>
			<tr>
				<td>AgeTo </td>
				<td><input type = 'text' name='AgeTo' tabindex='1'/></td>
				<td> 급여 연령  ~  까지 ( 단위 : month ) ( 단, 10개월 이상은 1000 기입 )</td>
			</tr>
			<tr>
				<td>Score </td>
				<td><input type = 'text' name='Score' tabindex='1'/></td>
				<td> 사료의 점수 </td>
			</tr>
			</form>
		</table>
		<br> 
		<table border="1" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align="center"> 
		<tr>
		<td><button type="submit"> 업데이트 </button></td></tr>
		</table>
		<button><a href="foodmain.php" onclick="history.go(-1)">뒤로가기</button>
	</body>
</html>