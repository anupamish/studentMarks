<?php
session_start();
include ("../phpIncludes/connectMySQL.php");
if(!isset($_SESSION['username'])){
	header("location: http://localhost/studentMarks/views/index.php");

}else{
$username = $_SESSION['username'];
$sql_query = "SELECT firstName, lastName FROM users WHERE email='$username'";
$result = $link->query($sql_query);
$rows= mysqli_fetch_array($result);
$fname = $rows['firstName'];
$lname = $rows['lastName'];

$courseCode= $_GET['id'];}
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <a class="navbar-brand" href="http://localhost/studentMarks/admin/adminLanding.php">Student Result Processing System</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Welcome <?php echo $fname." ".$lname;?> </a>
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
                    <li class="active">
                        <a href="http://localhost/studentMarks/views/landingPageMain.php" ><i class="fa fa-book"></i>
 Courses</a>
                    </li>
                    <li>
                        <a href="http://localhost/studentMarks/views/student.php"><i class="fa fa-graduation-cap"></i> Students</a>
                    </li>
                    <li >
                        <a href="http://localhost/studentMarks/views/exams.php"><i class="fa fa-file-excel-o"></i> Result Analysis</a>
                    </li>
                                  <li>
                            <a href="http://localhost/studentMarks/views/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li  >
                        <a href="http://localhost/studentMarks/views/activity.php"><i class="fa fa-bar-chart"></i> Class Reports</a>
                    </li>
                                                <li>
                            <a href="http://localhost/studentMarks/views/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div id="container-fluid">
                <p>
        <a href="http://localhost/studentMarks/views/landingPageMain.php" class="btn btn-default ">
          <span class="glyphicon glyphicon-circle-arrow-left"></span> All Courses
        </a>
      	</p>
            <?php echo'<h3>Currently you are viewing details for: '.$courseCode.'</h3>';
            	$_SESSION['courseCode']=$courseCode;
            ?>
            <hr>
            <div class="container">
			<?php
				$sql_course_query="SELECT * FROM courses WHERE course_code like '%$courseCode%'";
				$resultCourse = $link -> query($sql_course_query);
				$rowCourse = mysqli_fetch_array($resultCourse);
				$courseName = $rowCourse['course_name'];
				$courseSemester = $rowCourse['semester'];
				$courseCredits = $rowCourse['credits'];
			?>
			<h3><u>Course Details</u></h3>
			<h4><u> Course Name:</u> <?php echo $courseName ; ?></h4>	
			<h4><u> Course Semester:</u> <?php echo $courseSemester ; ?></h4>	
			<h4><u> Course Credits:</u> <?php echo $courseCredits ; ?></h4>		
			<br>
			<hr>
			<h3><u>Course Actions</u></h3>
			<br>
			<table class="table table-bordred table-striped table-hover">
			<tbody>
			<tr>
			<td><a href="http://localhost/studentMarks/views/courseEntry.php">Enter Marks for Students</a></td></tr>
			<tr>
			<td><a href="http://localhost/studentMarks/views/viewMarksCourse.php">View Marks Entered</a></td>
			</tr>
			<tr>
			<td><a href="http://localhost/studentMarks/phpIncludes/csvExport.php">Export Data in Excel Sheet</a></td>
			</tr>
			<tr>
			<form action="http://localhost/studentMarks/phpIncludes/uploadCSVmarks.php" method="post" enctype="multipart/form-data">
       		<td><h5>Select CSV file to upload marks: </h5>
       		</td>
       		<td> <input type="file" name="fileToUpload" id="fileToUpload">
       		</td>
       		<td>
       		<input type="submit" class= "btn btn-primary" value="Upload CSV" name="submitMarks">
       		</td>
       		</tr>
       		</tbody>
			</table>
			<br>
			 
			<br>
			                 

          </div>
            <!-- /.container-fluid -->
			
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
