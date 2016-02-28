
<?php
include ("http://localhost/studentMarks/phpIncludes/connectMySQL.php");
extract($_POST);
if(isset($save))
{
$sql = $link->mysql_query("select email from users where email='$_POST['email']'");
$return=mysqli_num_rows($sql);
<span class="comments">//if $return returns true value it means user's email already exists</span>
if($return)
{
$msg="<font color='red'>".ucfirst($email)." already exists choose another email</font>";
}
else
{
$Insert_query="insert into users values('$_POST['email']','$_POST['password']','$_POST['fname']','$_POST['lname']','$_POST['school']','$_POST['designation']','$_POST['officeNum']','$_POST['gender']')";
$query_run = $link->query($Insert_query);
$msg= "<font color='blue'>Your data saved</font>";
}
}
?>
