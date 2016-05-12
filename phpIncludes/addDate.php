<?php
session_start();
include("../phpIncludes/connectMySQL.php");
if(isset($_POST['dateSubmit'])){
	$dateLast = $_POST['dateLast'];
	$dateQuery = "UPDATE date SET date='$dateLast' WHERE name='date_last'";
	if($link->query($dateQuery)){
		$_SESSION['dateAdded']="Date has been set successfully.";
		header("Location: http://localhost/studentMarks/admin/setConst.php");
	}else {
		$_SESSION['dateAdded']="Date could not be set.";
		header("Location: http://localhost/studentMarks/admin/setConst.php");
	}
	
}else {
		header("Location: http://localhost/studentMarks/admin/setConst.php");
	}

?>