<?php 
session_start();    
include('connectMySQL.php');
$allowed_hostnames = array("gbu.ac.in");

    $good_hostname = false;
    foreach ($allowed_hostnames as $hn)
    {
        if (strstr($_POST['email'], $hn))
        {
             $good_hostname = true;
        }else{
           }
    }

    if (($good_hostname==true)==false)
    {
       $_SESSION['error1']="Please use only University Provided E-Mail Id (e.g. username@gbua.ac.in)";
	   header("Location: http://localhost/studentMarks/views/erorrPage.php");
    }
if( $_POST['password'] == $_POST['rpassword']){
$sql_query="INSERT INTO
			 users(email,password,firstName,lastName,school,designation,officeNumber,gender) 
			 VALUES ('".$_REQUEST['email']."','".$_REQUEST['password']."','".$_REQUEST['fname']."','".$_REQUEST['lname'].			"','".$_REQUEST['school']."','".$_REQUEST['designation']."','".$_REQUEST['officeNumber']."','".$_REQUEST['gender']."')";
$res = $link->query($sql_query);
if($res){
header("Location:http://localhost/studentMarks/views/index.php");
}else{
echo "There is some problem in inserting record";
}} else{
	$_SESSION['error2']="Password and Repeat Password dont match.";
	header("Location: http://localhost/studentMarks/views/errorPage.php");
}
?>