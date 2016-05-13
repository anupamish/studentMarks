<?php
session_start();
include("../phpIncludes/connectMySQL.php");

//code to upload
$target_dir = "C://wamp/www/studentMarks/csv/import/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submitMarks"])){
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
if (isset($_POST['submitMarks'])){
	$sql_query_1="LOAD DATA INFILE 'C://wamp/www/studentMarks/csv/import/".$filename."'
				  REPLACE INTO TABLE `marks_import`
    			  FIELDS TERMINATED BY ',' 
				  ENCLOSED BY ''
				  LINES TERMINATED BY '\n'
    			  (
        			course_code, 
        			regNo, midMarks,internalMarks,endMarks
    			)";
		$result1 = $link->query($sql_query_1);
	
	if($result1){
		$_SESSION['querymessage']="Data Imported Successfully.";
		
	}else{
		$_SESSION['querymessage']="Data Import Unsuccessful.";
		
	}
}
?>
<html>
<head>
<style type="text/css">
div {
    width: 500px;
    height: 100px;
    padding: 10px;
    border: 2px solid gray;
    background-color:#BBDEFB;
    margin: 0;
}
</style>
</head>
<body>
<div>
                  <?php if(!empty($_SESSION['errormessage1'])) { echo "<h4><font color='red'>".$_SESSION['errormessage1']."</font></h4>"; } ?>
                  <?php if(!empty($_SESSION['errormessage2'])) { echo "<h4><font color='red'>".$_SESSION['errormessage2']."</font></h4>"; } ?>
                  <?php if(!empty($_SESSION['querymessage'])) { echo "<h4><font color='green'>".$_SESSION['querymessage']."</font></h4>"; } ?>
                  <br> <a href="http://localhost/studentMarks/views/landingPageMain.php">Go Back</a>
</div>
        <?php unset($_SESSION['querymessage']); ?>
        <?php unset($_SESSION['errormessage1']); ?>
        <?php unset($_SESSION['errormessage2']); ?>
</body>
</html>