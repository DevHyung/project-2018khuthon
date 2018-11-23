<?php
require_once("./dbconfig.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$u_id = $_SESSION['u_id'];
$m_id = $_SESSION['m_id'];
$m_point = $_SESSION['m_point'];

$point=$_POST['usingPoint'];
$nowPoint=$_POST['nowPoint'];
$remainPoint = $nowPoint - $point;
$afterPoint = $m_point+$point;
$_SESSION['m_point'] = $afterPoint;

$table_name = "user";
$sql  = "
    UPDATE $table_name
    SET
    point = '$remainPoint'
    WHERE id = '$u_id';
    ";

$result = mysqli_query($db, $sql);

$table_name = "market";
$sql  = "
    UPDATE $table_name
    SET
    point = '$afterPoint'
    WHERE idx = '$m_id';
    ";
if($result = mysqli_query($db, $sql))
{
	echo "<script>alert('사용 되었습니다. 사장님한테 확인 받으세요');</script>";
	echo "<script>window.history.go(-2);</script>";
}
else{
	echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>
