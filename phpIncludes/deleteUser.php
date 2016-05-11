<?php
session_start();
include("../phpIncludes/connectMySQL.php");
$username = $_GET['userName'];
$sql_delete_query="DELETE FROM users WHERE email LIKE '%$username%'";
$result = $link->query($sql_delete_query);
if($result){
	$sql_delete_query1="DELETE FROM courses WHERE username LIKE '%$username%'";
	$result1 = $link->query($sql_delete_query1);
	$_SESSION['deleteMsg'] = "User Deleted";
	header("Location: http://localhost/studentMarks/admin/adminLanding.php");
}else{
	$_SESSION['deleteMsg'] = "User could not be deleted. Try again.";
	header("Location: http://localhost/studentMarks/admin/adminLanding.php");
}
?>