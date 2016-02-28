<?php
session_start();
session_destroy();
echo  $_SESSION['username']." ,you have been logged out. Redirecting to the login page";
usleep(3000000);
header("Location:http://localhost/studentMarks/views/index.php");
?>