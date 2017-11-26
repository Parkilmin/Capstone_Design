<?php
if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) exit;
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];
$members = array('admin'=>array('pw'=>'admin', 'name'=>'관리자'));

if(!isset($members[$user_id])){
	echo "<script>alert('관리자 아이디 또는 패스워드가 잘 못 되었습니다.');history.back();</script>";
	exit;
}
if($members[$user_id]['pw'] !=$user_pw){
	echo "<script>alert('관리자 아이디 또는 패스워드가 잘 못 되었습니다.');history.back();</script>";
	exit;
}

session_start();

$_SESSION['user_id'] = $user_id;
$_SESSION['user_name'] = $members[$user_id]['name'];
?>
<meta http-equiv="refresh" content="0;url=mainpage.php">
