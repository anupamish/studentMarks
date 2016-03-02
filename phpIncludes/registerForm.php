<?php 
session_start(); 
include('connectMySQL.php');   
$password1 = $_POST['password'];
$password2= $_POST['rpassword'];
if( $password1 == $password2)
	{
		$allowed_hostnames = array("gbu.ac.in");
		$good_hostname = false;
        foreach ($allowed_hostnames as $hn)
			{
				if (strstr($_POST['email'],$hn))
				{
					$good_hostname = true;
					$sql_query="INSERT INTO users(email,password,firstName,lastName,school,designation,officeNumber,gender) VALUES ('".$_REQUEST['email']."','".$_REQUEST['password']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['school']."','".$_REQUEST['designation']."','".$_REQUEST['officeNumber']."','".$_REQUEST['gender']."')";
$res = $link->query($sql_query);
					if($res){
						header("Location:http://localhost/studentMarks/views/index.php");
						}else
							{ 
								echo "There is some problem in inserting record";
							}
				}
			}
			if ($good_hostname==false)
			{
				$_SESSION['error1']=1;
	   			header("Location: http://localhost/studentMarks/views/errorPage.php");
			}
			
	}
	else
	{
		$_SESSION['error2'] =1;
		$allowed_hostnames = array("gbu.ac.in");
		$good_hostname = false;
        foreach ($allowed_hostnames as $hn)
			{
				if (strstr($_POST['email'],$hn))
				{
					$good_hostname = true;
				}
				if ($good_hostname==false)
				{
				 $_SESSION['error1']=1;
	   			}
			}
				
		header("Location: http://localhost/studentMarks/views/errorPage.php");
	}
?>