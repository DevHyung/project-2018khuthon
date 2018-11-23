<?php
require_once("./dbconfig.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

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
    INSERT INTO $table_name (
        name,
        manager,
        tel,
        messenger,
        sDate,
        eDate,
        category,
        etc,
        isSave,
        registerDate
    ) VALUES (
        '$agentName',
        '$agentManager',
        '$agentTel',
        '$agentMessenger',
        '$agentStartDate',
        '$agentEndDate',
        '$agentCategory',
        '$agentEtc',
        '$isSave',
        NOW()
    )";
if($result = mysqli_query($db, $sql))
{
	echo "<script>alert('등록되었습니다. ');</script>";
	echo "<script>window.location.replace('../page/agent_list.php');</script>";
}
else{
	echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>
