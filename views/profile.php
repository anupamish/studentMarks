<?php
session_start();
include ("../phpIncludes/connectMySQL.php");
if(!isset($_SESSION['username'])){
	header("location: http://localhost/studentMarks/views/index.php");

}else {}
?>
<?php
// Section of code to fetch all the profile data.
$username = $_SESSION['username'];
$sql_query = "SELECT * FROM users WHERE email='$username'";
$result = $link->query($sql_query);
$rows= mysqli_fetch_array($result);
$fname = $rows['firstName'];
$lname = $rows['lastName'];
$email = $rows['email'];
$school= $rows['school'];
$designation= $rows['designation'];
$officeNumber = $rows['officeNumber'];
$gender = $rows['gender'];

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile: <?php echo $fname." ".$lname;?></title>
    <style type="text/css">
	.container {
    width: 600px;
	}
	.left {
    max-width: 100%;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
    -ms-text-overflow:ellipsis;
    float: left;
	}
	.left1 {
    max-width: 100%;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
    -ms-text-overflow:ellipsis;
    float: left;
}
.right {
    
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
    -ms-text-overflow:ellipsis;
    text-align: center;
}
.right1 {
    
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
    -ms-text-overflow:ellipsis;
    text-align: right;
}
	</style>

    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/studentMarks/sideBar/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/studentMarks/sideBar/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="http://localhost/studentMarks/sideBar/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/studentMarks/sideBar/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="../css/stylePicture.css" rel="stylesheet">
		<script src="../js2/jquery.min.js"></script>
		<script src="../js2/jquery.form.js"></script>
		<script>
		$(document).on('change', '#image_upload_file', function () {
			var progressBar = $('.progressBar'), bar = $('.progressBar .bar'), percent = $('.progressBar .percent');

			$('#image_upload_form').ajaxForm({
			    beforeSend: function() {
					progressBar.fadeIn();
			        var percentVal = '0%';
			        bar.width(percentVal)
			        percent.html(percentVal);
			    },
			    uploadProgress: function(event, position, total, percentComplete) {
			        var percentVal = percentComplete + '%';
			        bar.width(percentVal)
			        percent.html(percentVal);
			    },
			    success: function(html, statusText, xhr, $form) {		
					obj = $.parseJSON(html);	
					if(obj.status){		
						var percentVal = '100%';
						bar.width(percentVal)
						percent.html(percentVal);
						$("#imgArea>img").prop('src',obj.image_medium);			
					}else{
						alert(obj.error);
					}
			    },
				complete: function(xhr) {
					progressBar.fadeOut();			
				}	
			}).submit();		

			});
		</script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/studentMarks/views/landingPageMain.php">Student Result Processing System</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Welcome <?php echo $fname." ".$lname;?> </a>
                    <!--<ul class="dropdown-menu">-->
 <!--                       <li>
                            <a href="http://localhost/studentMarks/views/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="http://localhost/studentMarks/views/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a> -->
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                     <li >
                        <a href="http://localhost/studentMarks/views/landingPageMain.php" ><i class="fa fa-book"></i>
 Courses</a>
                    </li>
                    <li>
                        <a href="http://localhost/studentMarks/views/student.php"><i class="fa fa-graduation-cap"></i> Students</a>
                    </li>
                    <li>
                        <a href="http://localhost/studentMarks/views/exams.php"><i class="fa fa-file-excel-o"></i> Result Analysis</a>
                    </li>
                    <li class="active">
                            <a href="http://localhost/studentMarks/views/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                        <a href="http://localhost/studentMarks/views/activity.php"><i class="fa fa-terminal"></i> Class Reports</a>
                    </li>
                                                <li>
                            <a href="http://localhost/studentMarks/views/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
			<div id="container-fluid">
			<h1><?php echo $fname." ".$lname;?></h1>
			<hr>
			<br>
			<div class="container">
			<div class="left">
			<div id="imgContainer">
  <form enctype="multipart/form-data" action="../phpIncludes/image_upload_demo_submit.php" method="post" name="image_upload_form" id="image_upload_form">
    <div id="imgArea"><?php echo'<img src="../userImages/medium/'.$username.'.jpg">';?>
      <div class="progressBar">
        <div class="bar"></div>
        <div class="percent">0%</div>
      </div>
      <div id="imgChange"><span>Change Photo</span>
        <input type="file" accept="image/*" name="image_upload_file" id="image_upload_file">
      </div>
    </div>
  </form>
</div>
</div>
<div class="left1">
<form action="http://localhost/studentMarks/phpIncludes/editProfile.php"  method="post">
    <table class="table">
      <tr>
        <td width="20%" align="left">First Name:</td>
        <td width="80%"><label>
          <input align="left" name="product_name" type="text" name="fname" size="64" value="<?php echo $fname; ?>" required />
        </label></td>
      </tr>
      
      <tr>
        <td width="20%" align="left"">Last Name:</td>
        <td width="80%"><label>
          <input align="left" name="product_name" type="text"  size="64" value="<?php echo $lname; ?>" required/>
        </label></td>
      </tr>
      
      <tr>
        <td width="20%" align="left">E-Mail:</td>
        <td width="80%"><label>
        <label><?php echo $email;?></label>  
        </label></td>
      </tr>
      
       <tr>
        <td align="left">Designation</td>
        <td><select name="designation">
          <option value="<?php echo $designation; ?>" required><?php echo $designation; ?></option>
         <option value="pro">Professor
                        </option>
                        <option value="apro">Assistant Professor
                        </option>
                        <option value="aspro">Associate Professor
                        </option>
                        <option value="rfa">Research/Faculty Associate
                        </option>
          </select></td>
      </tr>
      
      <tr>
        <td align="left">School</td>
        <td><select name="school">
          <option value="<?php echo $school; ?>" required><?php echo $school; ?>
          </option>
             <option value="soe">School of Engineering
                        </option>
                        <option value="sovs">School of Vocational Studies and Applied Sciences
                        </option>
                        <option value="sobt">School of Biotechnology
                        </option>
                        <option value="som">School of Management
                        </option>
                        <option value="soict">School of Information and Communication Technology
                        </option>
                        <option value="sol">School of Law, Justice and Governance
                        </option>
                        <option value="sobsc">School of Buddhist Studies and Civilization
                        </option>
                        <option value="sohss">School of Humanities and Social Sciences
                        </option>
          </select></td>
      </tr>
      
       <tr>
        <td width="20%" align="left">Office Number:</td>
        <td width="80%"><label>
          <input name="officeNumber" type="text" size="64" value="<?php echo $officeNumber; ?>" required />
        </label></td>
      </tr>
       <tr>
        <td width="20%" align="left">Gender:</td>
        <td width="80%"><label>
          <label><?php echo strtoupper($gender)?></label>
        </td>
      </tr>
            
      <tr>
        <td>&nbsp;</td>
        <td ><label>
         <input type="submit" name="buttonSubmit"  class="btn btn-primary" value="Make Changes" />
        </label></td>
      </tr>
    </table>
    </form>
    <p><i>Note*:Profile picture will change on reloading the page.</i></p>
</div>
</div>
<br> 
			 
			
			</div>
          

               

          
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/studentMarks/sideBar/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="http://localhost/studentMarks/sideBar/js/plugins/morris/raphael.min.js"></script>
    <script src="http://localhost/studentMarks/sideBar/js/plugins/morris/morris.min.js"></script>
    <script src="http://localhost/studentMarks/sideBar/js/plugins/morris/morris-data.js"></script>

</body>

</html>
