<?php
require_once("./dbconfig.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$userId=$_POST['userStdId'];
$userPw=$_POST['userPw'];
$table_name = "user";
$sql = "SELECT * FROM $table_name WHERE id='$userId'";
// 
if($result = mysqli_query($db, $sql))
{
	if(mysqli_num_rows($result) == 0)
	{
		echo "<script>alert('No matched ID.');</script>";
		echo "<script>window.history.go(-1);</script>";
	}
	else
	{
		$row = mysqli_fetch_assoc($result);
		if($row["pw"] == $userPw) // 로그인 성공
		{
			$_SESSION['u_id'] = $row['id'];
			$_SESSION['u_name'] = $row['name'];
			$_SESSION['name'] = $row['name'];
			echo "<script>alert('로그인 성공');</script>";
			echo "<script>window.location.replace('../qr/menu.php');</script>";
		}
		else
		{
			echo "<script>alert('Wrong Password.');</script>";
			echo "<script>window.history.go(-1);</script>";
		}
	}
}
mysqli_free_result($result);
mysqli_close($db);
?>