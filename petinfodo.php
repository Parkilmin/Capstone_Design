<?php
    include('dbconnect.php');
    session_start();
    mysqli_query($conn, "set session character_set_connection=utf8;");
    mysqli_query($conn, "set session character_set_results=utf8;");
    mysqli_query($conn, "set session character_set_client=utf8;");
    $query = "select * from Pet";
    $result = mysqli_query($conn, $query);

    $PetName = $_POST['PetName'];
    $P_UserID = $_POST['P_UserID'];
    $sql = "select * from Pet where PetName='$PetName' or P_UserID='$P_UserID'";

    $res = mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo "<script>alert('검색완료 !');</script>";
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8" />
        <title> 펫 정보 보기 페이지 </title>
    </head>
    <body bgcolor="ffcc99">
        <h1 style="font-size:2em;" align="center">검색 결과 보기</h1>
        </br>
        <table border="1" bgcolor="EEEEEE" bordercolor="777777" bordercolorlight="777777" bordercolordark="777777" align="center">
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
        <br>
        <br>
        <button><a href ="petinfo.php" onclick="history.go(-1)"> 재검색 하기 </button>
    </body>
</html>