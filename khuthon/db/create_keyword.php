<?php
require_once("./dbconfig.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$keyword=$_POST['keyword'];
$keywordClient=$_POST['keywordClient'];

$table_name = "keyword";
$sql  = "
INSERT INTO $table_name
(
`keyword`,
`client`,
`pSearchCnt`,
`mSearchCnt`,
`pKinTongCnt`,
`mKinTongCnt`,
`kinTotalCnt`,
`pBlogTongCnt`,
`mBlogTongCnt`,
`blogTotalCnt`,
`pCafeTongCnt`,
`mCafeTongCnt`,
`cafeTotalCnt`,
`registerDate`)

VALUES
(
    '$keyword',
    '$keywordClient',
    '0',
    '0',
    '0',
    '0',
    '0',
    '0',
    '0',
    '0',
    '0',
    '0',
    '0',
    now()
);
";
if($result = mysqli_query($db, $sql))
{
	echo "<script>alert('등록되었습니다. ');</script>";   
	echo "<script>window.location.replace('../page/keyword_list.php');</script>";
}
else{
	echo mysqli_error($db);
}
mysqli_free_result($result);
mysqli_close($db);
?>
