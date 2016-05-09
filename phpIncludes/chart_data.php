<?php
include ("../phpIncludes/connectMySQL.php");
session_start();
$username = $_SESSION['username'];
$courseCode=$_SESSION['chartcoursecode'];
//the SQL query to be executed
$query = "SELECT * FROM marks WHERE course_code IN ( SELECT course_code FROM courses WHERE course_code='$courseCode' AND username='$username') ORDER BY regNO";
//storing the result of the executed query
$result = $link->query($query);
//initialize the array to store the processed data
$jsonArray = array();
//check if there is any data returned by the SQL Query
if (mysqli_num_rows($result)>0) {
  //Converting the results into an associative array
  while($row = mysqli_fetch_array($result)) {
    $jsonArrayItem = array();
    $jsonArrayItem['label'] = $row['regNo'];
    $jsonArrayItem['value'] = $row['midMarks']+$row['endMarks']+$row['internalMarks'];
    //append the above created object into the main array.
    array_push($jsonArray, $jsonArrayItem);
  }
}
//Closing the connection to DB

//set the response content type as JSON
header('Content-type: application/json');
//output the return value of json encode using the echo function. 
echo json_encode($jsonArray);
?>
<?php 
unset($_SESSION['chartcoursecode']); 
?>