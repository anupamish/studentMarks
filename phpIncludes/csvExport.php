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
	echo "The Excel File has been exported successfully to the location C:/CSV/";
	echo '<br> <a href="http://localhost/studentMarks/views/landingPageMain.php">Go Back</a>';
}else{
echo "The Excel File could not be exported.";
	echo '<br> <a href="http://localhost/studentMarks/views/landingPageMain.php">Go Back</a>';
}
?>