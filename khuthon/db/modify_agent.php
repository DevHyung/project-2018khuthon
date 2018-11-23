<?php
require_once("./dbconfig.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$idx=$_POST['idx'];
$agentName=$_POST['agentName'];
$agentManager=$_POST['agentManager'];
$agentTel=$_POST['agentTel'];
$agentMessenger=$_POST['agentMessenger'];
$agentStartDate=$_POST['agentStartDate'];
$agentEndDate=$_POST['agentEndDate'];
$isSave=$_POST['customRadio'];

$agentCategory=$_POST['agentCategory'];
$agentEtc=$_POST['agentEtc'];


$table_name = "agent";
$sql  = "
    UPDATE $table_name
    SET
    name = '$agentName',
    manager = '$agentManager',
    tel = '$agentTel',
    messenger = '$agentMessenger',
    sDate = '$agentStartDate',
    eDate = '$agentEndDate',
    isSave = '$isSave',
    category = '$agentCategory',
    etc = '$agentEtc'
    WHERE idx = '$idx';
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
