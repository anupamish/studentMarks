<?php
session_start();
include ('connectMySQL.php');
$mysql_query=("SELECT * FROM users WHERE email='" . $_POST["username"] . "' and password = '". md5($_POST["password"])."'");
$result = $link->query($mysql_query);
$count  = mysqli_num_rows($result);
if($count==0) {
$_SESSION['errMsg'] = "Invalid Username or Password!";
header("Location:http://localhost/studentMarks/views/index.php");
} else {
$_SESSION['username']=$_POST['username'];
header("Location: http://localhost/studentMarks/views/landingPageMain.php");
}
?>