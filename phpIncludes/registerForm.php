<?php     
include('connectMySQL.php');
$sql_query="INSERT INTO
			 users(email,password,firstName,lastName,school,designation,officeNumber,gender) 
			 VALUES ('".$_REQUEST['email']."','".$_REQUEST['password']."','".$_REQUEST['fname']."','".$_REQUEST['lname'].			"','".$_REQUEST['school']."','".$_REQUEST['designation']."','".$_REQUEST['officeNumber']."','".$_REQUEST['gender']."')";
$res = $link->query($sql_query);
if($res){
echo "Record successfully inserted";
}else{
echo "There is some problem in inserting record";
}
?>