<?php
require_once("./dbconfig.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$id=$_GET['id'];
$act=$_GET['act'];
$num=$_GET['grade'];

if ($act == 'u'){
    $num = $num - 1; 
    if ($num < 1) {// 사장아래로 낮출떄
        $num = 1;
    }
}
else{
    $num = $num + 1; 
    if ( $num > 3 ){
            $num = 3; // 거래처 이상으로 낮출때
    }
}

$table_name = "user";
$sql  = "
    UPDATE $table_name
    SET
    isVerify = '$num'
    WHERE id = '$id';
    ";

if($result = mysqli_query($db, $sql))
{
	echo "<script>alert('수정 되었습니다. 페이지를 새로 고침 해주세요 ');</script>";
	echo "<script>window.close();</script>";
}
else{
	echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>
