<?php
require_once("./dbconfig.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$id=$_GET['id'];
$table_name = "user";
$sql  = "
    DELETE FROM $table_name
    WHERE id = '$id';
    ";

if($result = mysqli_query($db, $sql))
{
	echo "<script>alert('삭제 되었습니다. 페이지를 새로 고침 해주세요 ');</script>";
	echo "<script>window.close();</script>";
}
else{
	echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>
