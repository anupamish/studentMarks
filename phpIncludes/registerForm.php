<?php 
session_start(); 
include('connectMySQL.php');   
$password1 =md5($_POST['password']) ;
$password2= md5($_POST['rpassword']);
if( $password1 == $password2)
	{
		$allowed_hostnames = array("gbu.ac.in");
		$good_hostname = false;
        foreach ($allowed_hostnames as $hn)
			{
				if (strstr($_POST['email'],$hn))
				{
					$good_hostname = true;
					$sql_query="INSERT INTO users(email,password,firstName,lastName,school,designation,officeNumber,gender) VALUES ('".$_REQUEST['email']."','".$password1."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['school']."','".$_REQUEST['designation']."','".$_REQUEST['officeNumber']."','".$_REQUEST['gender']."')";
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

<?php //requires changes to make it work.
//code to upload
$target_dir = "C://wamp/www/studentMarks/userImages/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["register"])&&$_SESSION["error1"]!=1) {
	$check = filesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false) {
		$uploadOk = 1;
	} else {
		$uploadOk = 0;
	}
}
// Check if file already exists
if (file_exists($target_file)) {
	$_SESSION['errormessage1']="Sorry, file already exists.";
	$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg,png") {
			$_SESSION['errormessage1']="Sorry, only JPG,PNG files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$_SESSION['errormessage2']="Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				$_SESSION['errormessage2']= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				$_SESSION['errormessage2']= "Sorry, there was an error uploading your file.";
			}
		}
?>