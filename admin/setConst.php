<?php
session_start();
include ("../phpIncludes/connectMySQL.php");
if(!isset($_SESSION['username'])){
	header("Location: http://localhost/studentMarks/admin/index.php");
}else{
	
}

?>
<?php
if(isset($_POST['addSem'])){
	$incQuery = "UPDATE student SET semester = semester+1 WHERE semester<10";
	$incresult = $link ->query($incQuery);
	if($incresult){
		$_SESSION['addSem']="Semester value changed successflly.";
	}else{
		$_SESSION['addSem']="Semester value couldnt be changed.";
	}
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
                <a class="navbar-brand" href="http://localhost/studentMarks/views/adminLanding.php">Student Result Processing System-Admin Panel</a>
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
                    <li >
                            <a href="http://localhost/studentMarks/admin/uploadData.php"><i class="fa fa-upload"></i> Upload Data</a>
                   </li>
                   <li class="active">
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
       		<h3>Set Constraints.</h3>
       		<hr>
       		<h4>1. Change the Semester (Odd/Even) for students in the system.</h4>
       		<table class="table table-striped">
       		<tr>
       		<form action=" " method="post" enctype="multipart/form-data">
       		<td><h5>Transfer students to the next semester: </h5>
       		</td>
       		<td>
       		<input type="submit" class= "btn btn-primary" value="Change Semester" name="addSem">
       		</td>
       		</form>
       		</tr>
       		</table>
       		<br>
       		<div id="addSem">
                  <?php if(!empty($_SESSION['addSem'])) { echo "<h4><font color='green'>".$_SESSION['addSem']."</font></h4>"; } ?>
        </div>
        <?php unset($_SESSION['addSem']); ?>
       		<hr>
       		<h4>2. Set last date for marks entry by Teacher.</h4>
       		<table class="table table-striped">
       		<form action="http://localhost/studentMarks/phpIncludes/addDate.php" method="post" enctype="multipart/form-data">
       		<tr>
       		<td><h5>Last Date: </h5>
       		</td>
       		<td>
       		<input type="date" name="dateLast">
       		</td>
       		<td>
       		<input type="submit" class= "btn btn-primary" value="Set Last Date" name="dateSubmit">
       		</td>
       		</tr>
       		</form>
       		</table>
       		
           <br>
           <div id="dateAdded">
                  <?php if(!empty($_SESSION['dateAdded'])) { echo "<h4><font color='green'>".$_SESSION['dateAdded']."</font></h4>"; } ?>
        </div>
        <?php unset($_SESSION['dateAdded']); ?>
            <br>
            <hr>
       		<h4>3. Prepare system for new semester.</h4>
       		<table class="table table-striped">
       		<form action="#" method="post" enctype="multipart/form-data">
       		<tr>
       		<td>
       		<input type="submit" class= "btn btn-primary" value="Truncate Tables" name="sysSubmit">
       		</td>
       		</tr>
       		</form>
       		</table>
           <br>
           
           <br>
                  
</div>
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
