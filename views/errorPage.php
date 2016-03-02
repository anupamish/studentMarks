<?php
session_start();
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Student Result Processing System</title>   
        <link rel="stylesheet" href="http://localhost/studentMarks/css/styleLogin.css">
  </head>

  <body>

    <body>
    <form action="http://localhost/studentMarks/phpIncludes/loginAction.php" method="post">
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
			<div align="right">
            <a href="http://localhost/studentMarks/views/index.php"><img height="20" width="20" src="http://localhost://studentMarks/imageResources/Close.png"></a>
            </div>
			<h2>Student Result Processing System</h2>
			</div>
			<div class="login-form">
			<img height="154" width="155" align="center" src="http://localhost://studentMarks/imageResources/gbu.png">
			</div>
			<br>
			<?php
			if(isset($_SESSION['error1'])){
				echo "<center><h4>Please use only University Provided E-Mail Id (e.g. username@gbu.ac.in)</center></h4>";
				}
		   if(isset($_SESSION['error2'])){
			echo "<center> <h4>Password and Repeat Password don't match.</h4></center>";
		  }
		   ?>
            <br>
			<br>
			
            <div class= "control-group">
				<a class="btn1 btn-primary btn-large btn-block" href="http://localhost/studentMarks/views/register.php"><center>Try Registering Again</center> </a>
				</div>
		</div>
	</div>
     
   </body>
    
    
    
    
    
  </body>
  <?php session_destroy()?>
</html>
