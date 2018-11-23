<?php
require_once("./dbconfig.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$userId=$_POST['userId'];
$userPw=$_POST['userPw'];
$userName=$_POST['userName'];
$userVerify=$_POST['userVerify'];

$table_name = "user";
$sql  = "
    INSERT INTO $table_name (
        id,
        pw,
        name,
        isVerify
    ) VALUES (
        '$userId',
        '$userPw',
        '$userName',
        '$userVerify'
    )";
if($result = mysqli_query($db, $sql))
{
	echo "<script>alert('등록되었습니다. ');</script>";
	echo "<script>window.location.replace('../page/user_list.php');</script>";
}
else{
	echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>
