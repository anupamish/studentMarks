<?php  
$db_host = "localhost"; 
$db_username = "root";  
$db_pass = "";  
$db_name = "studentmarks"; 
$link =  new mysqli("$db_host","$db_username","$db_pass","$db_name");
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


?>