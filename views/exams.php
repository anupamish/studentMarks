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
$lname = $rows['lastName'];}
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
                <a class="navbar-brand" href="http://localhost/studentMarks/views/landingPageMain.php">Student Result Processing System</a>
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
                    <li>
                        <a href="http://localhost/studentMarks/views/landingPageMain.php" ><i class="fa fa-book"></i>
 Courses</a>
                    </li>
                    <li>
                        <a href="http://localhost/studentMarks/views/student.php"><i class="fa fa-graduation-cap"></i> Students</a>
                    </li>
                    <li class="active">
                        <a href="http://localhost/studentMarks/views/exams.php"><i class="fa fa-file-excel-o"></i> Result Analysis</a>
                    </li>
                                  <li>
                            <a href="http://localhost/studentMarks/views/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li  >
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
            <br>
            <div class="row">
    <div class="col-xs-12">
      <div >
        <table class="table">
        
          <tbody>
            <tr>
			<form action="" method="get" >
			<td><label>Course:
                    </label></td>
             <td><select name="course">
			<?php 
			$sqlFill ="SELECT course_code,course_name FROM courses WHERE username like '%$username%'";
			$result = $link->query($sqlFill);
			while ($row = mysqli_fetch_array($result)){
				$courseCode= $row['course_code'];
				$courseName = $row['course_name'];
			echo '<option value="'.$courseCode.'">'.$courseCode.'-'.$courseName.'</option>';
			}
			?>
</select></td>
			<td><div class= "control-group">
                <button type="submit" name="submit" class="btn btn-primary btn-large btn-block">Show</button>
                </div></td>
			</form>
			</tr>
			</tbody>
			</table>
			<?php
			if(isset($_GET['submit'])){
				$_SESSION['chartcoursecode']=$_GET['course'];
			}
			?>
			</div>
			</div>
			</div>
			</div>
			<h4>You are viewing chart for course: <u><?php if(isset($_SESSION['chartcoursecode'])){ echo $_GET['course'];}else echo "Select course above.";?></u></h4>
			<hr>
            <br>
            <div id="chart-container">Your Chart will render here once you chose the desired course.</div>
  <script src="http://localhost/studentMarks/js/jquery-2.2.3.min.js"></script>
  <script src="http://localhost/studentMarks/js/fusioncharts.js"></script>
  <script src="http://localhost/studentMarks/js/fusioncharts.charts.js"></script>
  <script src="http://localhost/studentMarks/js/themes/fusioncharts.theme.zune.js"></script>
  <script src="http://localhost/studentMarks/js/app.js"></script>
  <br>
  
  </div>
            
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

