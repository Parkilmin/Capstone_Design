<?php
    include('dbconnect.php');
    session_start();

    $query = "select * from Pet";
    $result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8" />
		<title> 사료 정보 보기 페이지 </title>
	</head>
	<body>
		<form method='post' action='getSuitableFood.php'>
		<table border="2">
			<tr>펫의 사료 정보 보기
				<td>찾으시려는 사료의 이름을 입력해 주세요 </td>
				<td><input type = 'text' name='P_UserID' tabindex='1'/></td>
				<td>찾으시려는 사료의 이름을 입력해 주세요 </td>
				<td><input type = 'text' name='PetName' tabindex='1'/></td>
				<td><input type="submit" />
			</tr>
		</table>
	</body>
</html>