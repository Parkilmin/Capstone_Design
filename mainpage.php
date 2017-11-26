
<?php
	session_start();
	if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
		echo "<meta http-equiv='refresh' content='0;url=login_ing.php'>";
		exit;
	}
	$user_id = $_SESSION['user_id'];
	$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="ko">
	<head>
			<meta charset="utf-8" />
			<title> Admin page </title>
	</head>
	<body bgcolor="ffcc99">
		<table border:1px solid #fff; align=center>
		<tr align=center>
			<td><img src="../CapStone/mainpicture.png" width=1000 height=300></td>
			 <td><form name="frm" method="post"><font size="8">
                <br><div id="time" size="8"></div>
                </form>
                <br></td>
		</tr>

		</table>
		<br>
		<br>
		<br>
		<table width="500" height="250" bgcolor="EEEEEE" bordercolor="EEEEEE" bordercolorlight="777777" bordercolordark="777777" align="center">
			<tr>
	            <td bgcolor="66CCFF" align="center"><a href="foodmain.php" class="main_menu_first">사료정보 관리</a></td>
	            <td bgcolor="FFFF99" align="center"><a href="usermain.php" class="main_menu_first">유저 정보 관리</a></td>
	        </tr>
	        <tr>
	        	<td bgcolor="3399FF" align="center"><a href="petinfo.php" class="main_menu_first">펫정보 보기</a></td>
	            <td bgcolor="99ff99" align="center"><a href="reviewinfo.php" class="main_menu_first">리뷰 보기</a></td>
	        </tr>
        </table>
           </ul>
           <br>
           <br>
           <br>
           <br>
		<TABLE width= 60% float:right>
			<tr>
				<td><button><a href="logout.php" align=right>로그아웃</button>
						</a>
					</button>
				</td>
			</tr>
		</TABLE>
	</body>
</html>