<?php
require_once("./dbconfig.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$m_id = $_SESSION['m_id'];
$u_id = $_SESSION['u_id'];
$review=$_POST['review'];
$rating=$_POST['rating'];


$table_name = "review";
$sql  = "
INSERT INTO $table_name
(`m_id`,
`u_id`,
`content`,
`score`,
`registerDate`)
VALUES
('$m_id',
'$u_id',
'$review',
'$rating',
now());
";
if($result = mysqli_query($db, $sql))
{
	echo "<script>alert('등록되었습니다. ');</script>";   
	echo "<script>window.history.go(-2);</script>";
}
else{
	echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>
