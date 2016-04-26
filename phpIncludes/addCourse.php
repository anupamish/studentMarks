<?php
session_start();
include ("connectMySQL.php");
$username = $_SESSION['username'];
if(isset($_POST['submit'])){
	
$sql_query = "INSERT INTO courses(course_code,course_name,semester,credits,username) VALUES('$_POST[courseCode]','$_POST[courseName]','$_POST[courseSemester]','$_POST[courseCredits]','$_SESSION[username]')";
$query = $link->query($sql_query);
if (!$query)
{
$_SESSION['courseMsg'] = "Course could not be added try again.";
header("Location:http://localhost/studentMarks/views/landingPageMain.php");
}else{
$_SESSION['courseMsg'] = "Course added auccessfully.";
header("Location:http://localhost/studentMarks/views/landingPageMain.php");
}
}
?>