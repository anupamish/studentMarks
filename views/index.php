<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login into Student Result Processing System</title>   
        <link rel="stylesheet" href="http://localhost/studentMarks/css/styleLogin.css">
  </head>

  <body>

    <body>
    <form action="http://localhost/studentMarks/phpIncludes/loginAction.php" method="post">
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
			<h2>Student Result Processing System</h2>
			</div>
			<div class="login-form">
			<img height="154" width="155" align="center" src="http://localhost://studentMarks/imageResources/gbu.png">
			</div>
            <?php session_start();?>
			<form action="http://localhost/studentMarks/phpIncludes/loginAction.php" method="post">
			<div class="login-form">
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="Username" name="username" required>
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>
				
				<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="Password" name="password" required>
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>
                <div id="errMsg">
                  <?php if(!empty($_SESSION['errMsg'])) { echo "<h5><font color='red'>".$_SESSION['errMsg']."</font></h5>"; } ?>
        </div>
        <?php unset($_SESSION['errMsg']); ?>
				
				<div class= "control-group">
				<button type="submit" class="btn btn-primary btn-large btn-block" href="#">Login</button>
				</div>
               
				<div class= "control-group">
				<a class="btn1 btn-primary btn-large btn-block" href="http://localhost/studentMarks/views/register.php">Register Now</a>
				</div>
				<div>
				<a href="http://localhost/studentMarks/views/forgetPassword.php"> Forgot Password?</a>
				</div>
							</div></form>
		</div>
	</div>
     
   </body>
    
    
    
    
    
  </body>
</html>
