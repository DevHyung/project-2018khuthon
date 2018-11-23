<?php
require_once("./dbconfig.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$u_id = $_SESSION['u_id'];

$nowPoint=$_POST['nowPoint'];
$pay=$_POST['pay'];
// 이제 적립해야함
$afterPoint = $nowPoint + $pay/100;

$table_name = "user";
$sql  = "
    UPDATE $table_name
    SET
    point = '$afterPoint'
    WHERE id = '$u_id';
    ";

if($result = mysqli_query($db, $sql))
{
	echo "<script>alert('적립 되었습니다.');</script>";
	echo "<script>window.history.go(-2);</script>";
}
else{
	echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>
