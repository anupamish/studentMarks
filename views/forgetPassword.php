<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login into Student Result Processing System</title>   
        <link rel="stylesheet" href="http://localhost/studentMarks/css/styleLogin.css">
  </head>

  <body>

    <body>
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
            <form action="http://localhost/studentmarks/phpIncludes/resetPassword.php" method="post">
            <div class="login-form">
                <div class="control-group">
                <input type="text" class="login-field" value="" placeholder="Email" name ="email">
                <label class="login-field-icon fui-user" for="login-name"></label>
                </div>
            
                <div class= "control-group">
                <button type="submit" class="btn btn-primary btn-large btn-block">Recover Password </button>
                </div>
                            </div>
                            </form>
        </div>
    </div>
   </body>
  
  </body>
</html>
