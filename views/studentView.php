<?php
session_start();
include ("../phpIncludes/connectMySQL.php");
$username = $_SESSION['username'];
$sql_query = "SELECT firstName, lastName FROM users WHERE email='$username'";
$result = $link->query($sql_query);
$rows= mysqli_fetch_array($result);
$fname = $rows['firstName'];
$lname = $rows['lastName'];
$reg= $_GET['reg'];
?>
<?php
$sql_query_student = "SELECT stuFirstName,stuLastName,college,branch,semester FROM student WHERE regNo='$reg'";
$result2 = $link -> query($sql_query_student);
$rows2 = mysqli_fetch_array($result2);
$studentFirstName = $rows2['stuFirstName'];
$studentLastName = $rows2['stuLastName'];
$college = $rows2['college'];
$branch = $rows2['branch'];
$semester = $rows2['semester'];

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
                    <li >
                        <a href="http://localhost/studentMarks/views/landingPageMain.php" ><i class="fa fa-book"></i>
 Courses</a>
                    </li>
                    <li class="active">
                        <a href="http://localhost/studentMarks/views/student.php"><i class="fa fa-graduation-cap"></i> Students</a>
                    </li>
                    <li >
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
            <?php echo'<h3>Student Details: '.$reg.'</h3>'; ?>
            <hr>
            <?php
				echo "<h5> Student Name: ".$studentFirstName." ".$studentLastName;
				echo "<h5> College: ".$college;
				echo "<h5> Branch: ".$branch;
				echo "<h5> Semester: ".$semester;
			?>
            <hr>
            <h3> Marks Details </h3>
            <hr>
            <table class="table  table-striped">

        <thead>

            <tr>

              <th>Course Code</th>  
              <th>Course Name</th>
              <th>Mid Semester Marks (25)</th>
              <th>End Semester Marks (50)</th>
              <th>Internal Assesment (25)</th>

            </tr>
           
        </thead>
        <tbody>
         <?php

			$sql_query_marks = "SELECT course_code,midMarks,endMarks,internalMarks FROM marks WHERE course_code IN ( SELECT course_code FROM courses WHERE username='$username') AND regNo='$reg'";
             global $link;
              $result3= $link ->query($sql_query_marks);         
              if (mysqli_num_rows($result3) > 0) {
               while($rows3 = mysqli_fetch_array($result3)) {
                $course_code=$rows3['course_code'];
				$midMarks=$rows3['midMarks'];
				$endMarks=$rows3['endMarks'];
				$internalMarks=$rows3['internalMarks'];
				$sql_query_course_name = "SELECT course_name FROM courses WHERE course_code='$course_code'";
				$result4= $link ->query($sql_query_course_name);
				$rows4= mysqli_fetch_array($result4);
				$course_name=$rows4['course_name'];
               echo "<tr>";
         echo "<td>"."<center>".$course_code."</center>"."</td>";
        echo "<td>"."<center>".$course_name."</center>"."</td>";
		 echo "<td>"."<center>".$midMarks."</center>"."</td>";
		 echo "<td>"."<center>".$endMarks."</center>"."</td>";
		 echo "<td>"."<center>".$internalMarks."</center>"."</td>";
        echo "</tr>";
    }
}else {
	echo "<tr>";
    echo "<td>"."<center>"."No rows found!"."</center>"."</td>";
	echo "</tr>";
      
}

?>
        </tbody>
        </table>
            <br>
            <br>
            <br>
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
