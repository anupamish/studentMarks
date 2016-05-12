<?php
session_start();
include ("../phpIncludes/connectMySQL.php");
if(!isset($_SESSION['username'])){
	header("Location: http://localhost/studentMarks/admin/index.php");
}else{
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Result Processing System</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/studentMarks/sideBar/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/studentMarks/sideBar/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="http://localhost/studentMarks/sideBar/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/studentMarks/sideBar/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="http://localhost/studentMarks/admin/adminLanding.php">Student Result Processing System-Admin Panel</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Welcome <?php echo $_SESSION['username'];?></a>
                 <!--   <ul class="dropdown-menu">
                        <li>
                            <a href="http://localhost/studentMarks/views/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="http://localhost/studentMarks/views/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>-->
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="http://localhost/studentMarks/admin/adminLanding.php" ><i class="fa fa-fw fa-user"></i>
 View Users</a>
                    </li>
                    <li>
                        <a href="http://localhost/studentMarks/admin/courseAdmin.php"><i class="fa fa-book"></i> View Courses</a>
                    </li>
                    <li >
                        <a href="http://localhost/studentMarks/admin/calculateGPA.php"><i class="fa fa-calculator"></i> Calculate CGPA</a>
                    </li>
                    <li>
                            <a href="http://localhost/studentMarks/admin/printMarksheet.php"><i class="fa fa-print"></i> Print Marksheet</a>
                   </li>
                    <li class="active">
                            <a href="http://localhost/studentMarks/admin/uploadData.php"><i class="fa fa-upload"></i> Upload Data</a>
                   </li>
                   <li>
                            <a href="http://localhost/studentMarks/admin/setConst.php"><i class="fa fa-cogs"></i> Set Constraints</a>
                   </li>
                    <li>
                            <a href="http://localhost/studentMarks/admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
			<div id="container-fluid">
            <div class="container">
            <div>
       		<h3>Upload data for various Tables.</h3>
       		<hr>
       		<h4>1. Upload data into the <u>"branch"</u> table.</h4>
       		<table class="table table-striped">
       		<form action="http://localhost/studentMarks/phpIncludes/uploadCSV.php" method="post" enctype="multipart/form-data">
       		<tr>
       		<td><h5>Select CSV file to upload: </h5>
       		</td>
       		<td> <input type="file" name="fileToUpload" id="fileToUpload">
       		</td>
       		<td>
       		<input type="submit" class= "btn btn-primary" value="Upload CSV" name="submitBranch">
       		</td>
       		</tr>
       		</form>
       		</table>
       		<hr>
       		<h4>2. Upload data into the <u>"student"</u> table.</h4>
       		<table class="table table-striped">
       		<form action="http://localhost/studentMarks/phpIncludes/uploadCSV.php" method="post" enctype="multipart/form-data">
       		<tr>
       		<td><h5>Select CSV file to upload: </h5>
       		</td>
       		<td> <input type="file" name="fileToUpload" id="fileToUpload">
       		</td>
       		<td>
       		<input type="submit" class= "btn btn-primary" value="Upload CSV" name="submitStudent">
       		</td>
       		</tr>
       		</form>
       		</table>
           <br>
           <div id="errormessage">
                  <?php if(!empty($_SESSION['errormessage1'])) { echo "<h4><font color='red'>".$_SESSION['errormessage1']."</font></h4>"; } ?>
        </div>
        <div id="errormessage2">
                  <?php if(!empty($_SESSION['errormessage2'])) { echo "<h4><font color='red'>".$_SESSION['errormessage2']."</font></h4>"; } ?>
        </div>
        <div id="querymessage">
                  <?php if(!empty($_SESSION['querymessage'])) { echo "<h4><font color='green'>".$_SESSION['querymessage']."</font></h4>"; } ?>
        </div>
        <?php unset($_SESSION['querymessage']); ?>
        <?php unset($_SESSION['errormessage1']); ?>
        <?php unset($_SESSION['errormessage2']); ?>
        
           <br>
           <hr>
           <p><i>Note*: Before uploading data through files. Please check that the format of your CSV files matches the format specified by the Developer. Also keep constraints like Primary Keys, Unique Keys,etcetra in check.</i></p>
           <br>
            <br>
           <br>
           <br>
                  

         </div> 
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="http://localhost/studentMarks/sideBar/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/studentMarks/sideBar/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="http://localhost/studentMarks/sideBar/js/plugins/morris/raphael.min.js"></script>
    <script src="http://localhost/studentMarks/sideBar/js/plugins/morris/morris.min.js"></script>
    <script src="http://localhost/studentMarks/sideBar/js/plugins/morris/morris-data.js"></script>

</body>

</html>
