<?php
    session_start();
	include('connectMySQL.php');
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password))
    {
                 $mysql_query = ("SELECT * FROM users WHERE email=".mysql_real_escape_string($username)." and password = ".mysql_real_escape_string($password));
		$query=$link->query($mysql_query);		 
         $numrows = mysqli_num_rows($query);

         if($numrows == 1)
         {
            $_SESSION['username'] = $username; //Store username to session for futher authorization 
            header("Location: http://localhost/studentMarks/views/landindPageMain.php"); //Redirect user to home page
         }
         else {
                $_SESSION['errMsg'] = "Invalid Username or Password!";
         }
        header("Location: http://localhost/studentMarks/views/index.php"); //Redirect user back to your login form
     }
     else {
        die("Please enter username and/or password!");
      }

    ?>