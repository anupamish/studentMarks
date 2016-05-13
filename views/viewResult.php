<?php 
session_start();
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>View Student Result</title>   
        <link rel="stylesheet" href="http://localhost/studentMarks/css/styleLogin.css">
  </head>

  <body>

    <body>
    
	<div class="login">
		<div class="login-screen">
		<div align="right">
            <a href="http://localhost/studentMarks/views/index.php"><img height="20" width="20" src="http://localhost://studentMarks/imageResources/Close.png"></a>
            </div>
			<div class="app-title">
			<h2>Student Result Processing System - View Student Result</h2>
			</div>

			<div class="login-form">
			<img height="154" width="155" align="center" src="http://localhost://studentMarks/imageResources/gbu.png">
			</div>
            
			<form action="http://localhost/studentMarks/admin/studentMarksheet.php" method="get">
			<div class="login-form">
				<p>Enter Roll No</p>
				<div class="control-group">
				<input type="text" class="login-field" placeholder="12ics000" name="reg" required>
				<label class="login-field-icon fui-lock" for="login-name"></label>
				</div>
                <div class= "control-group">
				<button type="submit" class="btn btn-primary btn-large btn-block" name="submit" href="#">Check Result</button>
				</div>
				
			</div></form>
		</div>
	</div>
     
   </body>
 </body>
</html>
