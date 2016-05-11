<?php
session_start();
include("../phpIncludes/connectMySQL.php");
$courseCode= $_SESSION['courseCode'];
$export_query = "SELECT * INTO OUTFILE 'C:/csv/marks".$courseCode.".csv'
FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY ''
LINES TERMINATED BY '\n'
FROM marks WHERE course_code='$courseCode'";
$result = $link -> query($export_query);
if($result){
	echo "<div>";
	echo "The Excel File has been exported successfully to the location C:/CSV/";
	echo '<br> <a href="http://localhost/studentMarks/views/landingPageMain.php">Go Back</a>';
	echo "</div>";
}else{
	echo "<div>";
	echo "The Excel File could not be exported. Please remove duplicate file from C:/CSV/ and try again.";
	echo '<br> <a href="http://localhost/studentMarks/views/landingPageMain.php">Go Back</a>';
	echo "</div>";
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
</html>