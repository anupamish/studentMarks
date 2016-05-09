<?php
session_start();
unset($_SESSION['courseMsg']);
usleep(1000000);
header("Location: http://localhost/studentMarks/views/landingPageMain.php");
?>