<?php
session_start();
include ('connectMySQL.php');
$mysql_query=("SELECT * FROM users WHERE email='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
$result = $link->query($mysql_query);
$count  = mysqli_num_rows($result);
if($count==0) {
$message = "Invalid Username or Password!";
echo $message;
} else {
$_SESSION['username']=$_POST['username'];
header("Location: http://localhost/studentMarks/views/landingPageMain.php");
}

?>