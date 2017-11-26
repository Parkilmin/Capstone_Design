<?php
    include('dbconnect.php');
    session_start();
    mysqli_query($conn, "set session character_set_connection=utf8;");
    mysqli_query($conn, "set session character_set_results=utf8;");
    mysqli_query($conn, "set session character_set_client=utf8;");
    $query = "select * from User";
    $result = mysqli_query($conn, $query);

    $UserID = $_POST['UserID'];
   
    $sql = "delete from User where UserID='$UserID'";
    $res = mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo("<html>
        <head>
        <script name=javascript>
        location.href='userdelete.php';
        self.window.alert('유저 정보가 성공적으로 삭제 되었습니다. ');
        </script>
        </head>
        </html>
    ");

    mysql_close($conn);
?>