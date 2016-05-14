<?php
session_start();
include("../phpIncludes/connectMySQL.php");
$username =$_SESSION['username'];
if (isset($_POST['buttonSubmit']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$designation = $_POST['designation'];
	$school = $_POST['school'];
	$office = $_POST['officeNumber'];
	$updateQuery ="UPDATE users SET firstName='$fname',lastName='$lname',school='$school', designation='$designation',officeNumber='$office' WHERE email='$username'";
	$resupdateQuery = $link->query($updateQuery);
	if($resupdateQuery){
		header("location: http://localhost/studentMarks/views/profile.php");
	}else { echo "Couldnt make the changes.";
	}
}
?>