<?php
session_start();
include ("../phpIncludes/connectMySQL.php");
$username = $_SESSION['username'];
$sql_query = "SELECT firstName, lastName FROM users WHERE email='$username'";
$result = $link->query($sql_query);
$rows= mysqli_fetch_array($result);
$fname = $rows['firstName'];
$lname = $rows['lastName'];
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
    <style type="text/css">
       .frmDronpDown {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:20px;}
.demoInputBox {padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 100%;}
.row{padding-bottom:5px;}
th { text-align: center;}
td {padding:5px; }
    </style>

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
                    <li class="active">
                        <a href="http://localhost/studentMarks/views/student.php"><i class="fa fa-graduation-cap"></i> Students</a>
                    </li>
                    <li>
                        <a href="http://localhost/studentMarks/views/exams.php"><i class="fa fa-file-excel-o"></i> Exams</a>
                    </li>
                                  <li>
                            <a href="http://localhost/studentMarks/views/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                        <a href="http://localhost/studentMarks/views/activity.php"><i class="fa fa-terminal"></i> Activity Log</a>
                    </li>
                                                <li>
                            <a href="http://localhost/studentMarks/views/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div id="container-fluid">
            <div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class=".table-striped">
        
          <tbody>
            <tr>
			<form action="" method="get" >
              <td><label>School:
                    </label></td>
              <td><select  name="school" class = "demoInputBox" onChange="getState(this.value);">
						<option value="">All</option>
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
                    <td><label>Branch:</label></td>
              <td><select name="branch" class="demoInputBox">
                <option value="">-------Select Branch-------</option>
                </select></td>
                <td><label>Subject:</label></td>
              <td><select name="subject" class="demoInputBox">
                <option value="">-------Select Subject-------</option>
                </select></td>
                <td><div class= "control-group">
                <button type="submit" class="btn btn-primary btn-large btn-block">Show</button>
                </div></td>
			</form>
            </tr>
          </tbody>
          
        </table>
      </div>
    </div>
  </div>
</div>


    <table class="table table-bordered">

        <thead>

            <tr>

              <th>Registration No.</th>  
              <th>Student Name</th>
              <th colspan="2" scope='colgroup'>Odd Semester Result</th>
              <th colspan="2" scope='colgroup'>Even Semester Result</th>

            </tr>
            <tr>
                <th></th>
                <th></th>
                <th>Mid-term Marks</th>
                <th>Mid-term Marks</th>
                <th>End-term Marks</th>
                <th>End-term Marks</th>

            </tr>
        </thead>

        <tbody>
        <?php

			if(isset($_GET['school']))
			 $school = $_GET['school'];
			 else $school = '';
             $sqlTable = "SELECT regNo,stuFirstName,stuLastName,oddMidMarks,oddEndMarks,evenMidMarks,evenEndMarks FROM student where college like '%$school%' ";
             global $link;
                $resultTable = $link -> query($sqlTable);           
              if (mysqli_num_rows($resultTable) > 0) {
               while($row2 = mysqli_fetch_array($resultTable)) {
                $reg= $row2['regNo'];
                $sfname =$row2['stuFirstName'];
                $slname = $row2['stuLastName'];
                $omidmark = $row2['oddMidMarks'];
                $oendmark = $row2['oddEndMarks'];
                $emidmark = $row2['evenMidMarks'];
                $eendmark = $row2['evenEndMarks'];
        echo "<tr>";
         echo "<td>"."<center>".$reg."</center>"."</td>";
        echo "<td>"."<center>".$sfname." ".$slname."</center>"."</td>";
        echo "<td>"."<center>".$omidmark."</center>"."</td>";
        echo "<td>"."<center>".$oendmark."</center>"."</td>";
        echo "<td>"."<center>".$emidmark."</center>"."</td>";
        echo "<td>"."<center>".$eendmark."</center>"."</td>";
        echo "</tr>";
    }
}else {
      echo "No rows found!";
}

?>
        </tbody>

    </table>    
    <br>   
    <br>   
    <br>   
    <br>   
    <br>   
    <br>   
    <br>   
    <br>   
    <br>   
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
