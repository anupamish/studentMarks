<?php
session_start();
include("../phpIncludes/connectMySQL.php");
$courseCode = $_GET['courseCode'];
$user = $_GET['username'];

$sql_delete_query="DELETE FROM courses WHERE username LIKE '%$user%' AND course_code LIKE '%$courseCode%'";
$result = $link->query($sql_delete_query);
if($result){
	$_SESSION['deleteMsg'] = "Course Deleted";
	header("Location: http://localhost/studentMarks/admin/courseAdmin.php");
}else{
	$_SESSION['deleteMsg'] = "Course could not be deleted. Try again.";
	header("Location: http://localhost/studentMarks/admin/courseAdmin.php");
}
?>