<?php
    include('dbconnect.php');
    session_start();
    mysqli_query($conn, "set session character_set_connection=utf8;");
    mysqli_query($conn, "set session character_set_results=utf8;");
    mysqli_query($conn, "set session character_set_client=utf8;");
    $query = "select * from Food";
    $result = mysqli_query($conn, $query);

    $FoodName = $_POST['FoodName'];
    $Barcode = $_POST['Barcode'];
    
    $sql = "select * from Food where FoodName='$FoodName' or Barcode='$Barcode'";

    $res = mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo "검색 완료 !";

?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8" />
        <title> 사료 정보 보기 </title>
    </head>
    <body bgcolor="ffcc99">
    <form method='post' action='deletecomplete.php'>
        <table border="2" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align ="center">
            <tr><h1 style="color:FF0099;font-size:2em;" align="center">검색 결과 사료 정보</h1>
                <td>삭제하기 원하는 사료의 이름을 입력해 주세요.</td>
                <td><input type = 'text' name='FoodName' tabindex='1'/></td>
                <td><button type ="submit" /> 삭제하기 </button></td>
            </tr>
        </table>
        <br>
        <br>
        <table border="2" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align ="center">
                <td>바코드 숫자</td>
                <td>사료 이름</td>
                <td>가격</td>
                <td>사료 무게</td>
                <td>원산지</td>
                <td>메이커</td>
                <td>생산자</td>
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
                while($row=mysqli_fetch_array($res)){
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
                    echo "</tr>";
                    $n++;
                    }
                ?>
                </td>
        </table>
        </form>
        <button><a href ="foodinfo.php" onclick="history.go(-1)">전체목록보기</button>
    </body>
</html>