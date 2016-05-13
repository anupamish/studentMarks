<?php
session_start();
include("../phpIncludes/connectMySQL.php");

//code to upload
$target_dir = "C://wamp/www/studentMarks/csv/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submitBranch"])|| isset($_POST['submitStudent'])) {
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
if($imageFileType != "csv") {
			$_SESSION['errormessage1']="Sorry, only CSV files are allowed.";
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
$filename=$_FILES['fileToUpload']['name'];
//Code to insert into table.
if (isset($_POST['submitBranch'])){
	$sql_query_2="LOAD DATA INFILE 'C://wamp/www/studentMarks/csv/".$filename."'
				  REPLACE INTO TABLE branch 
				  FIELDS TERMINATED BY ',' 
				  ENCLOSED BY ''
				  LINES TERMINATED BY '\n'
				  IGNORE 1 ROWS(
        			branch_name, 
        			branch,school
    			)
			";
	$result2 = $link->query($sql_query_2);
	if($result2){
		$_SESSION['querymessage']="Data Imported Successfully.";
		header("location: http://localhost/studentMarks/admin/uploadData.php");
	}else{
		$_SESSION['querymessage']="Data Import Unsuccessful.";
		header("location: http://localhost/studentMarks/admin/uploadData.php");
	}
}else if(isset($_POST['submitStudent'])){
	$sql_query_2="LOAD DATA INFILE 'C://wamp/www/studentMarks/csv/".$filename."'
				  REPLACE INTO TABLE student 
				  FIELDS TERMINATED BY ',' 
				  ENCLOSED BY ''
				  LINES TERMINATED BY '\n'
				  IGNORE 1 ROWS(
        			regNo, 
        			stuFirstName,stuLastName,college,branch,semester
    			)
			";
	$result2 = $link->query($sql_query_2);
	if($result2){
		$_SESSION['querymessage']="Data Imported Successfully.";
		header("location: http://localhost/studentMarks/admin/uploadData.php");
	}else{
		$_SESSION['querymessage']="Data Import Unsuccessful.";
		header("location: http://localhost/studentMarks/admin/uploadData.php");
	}
	
}
?>