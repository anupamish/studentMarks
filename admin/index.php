<?php 
session_start();
if(isset($_POST['submit'])){
	$password = $_POST['password'];
	if($password=='admin'){
		$_SESSION['username']="Administrator";
		header("Location:http://localhost/studentMarks/admin/adminLanding.php");
	}else { $_SESSION['errMsg']="Incorrect Password";}
}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Admin Login into Student Result Processing System</title>   
        <link rel="stylesheet" href="http://localhost/studentMarks/css/styleLogin.css">
  </head>

  <body>

    <body>
    <form action="" method="post">
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
			<h2>Student Result Processing System - Admin Panel</h2>
			</div>
			<div class="login-form">
			<img height="154" width="155" align="center" src="http://localhost://studentMarks/imageResources/gbu.png">
			</div>
            
			<form action="" method="post">
			<div class="login-form">
				<p>Administrator</p>
				<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="Password" name="password" required>
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>
                <div id="errMsg">
                  <?php if(!empty($_SESSION['errMsg'])) { echo "<h5><font color='red'>".$_SESSION['errMsg']."</font></h5>"; } ?>
        </div>
        <?php unset($_SESSION['errMsg']); ?>
				
				<div class= "control-group">
				<button type="submit" class="btn btn-primary btn-large btn-block" name= "submit">Login</button>
				</div>
			</div></form>
		</div>
	</div>
     
   </body>
    
    
    
    
    
  </body>
</html>
