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
                    <li class="active">
                        <a href="http://localhost/studentMarks/admin/viewUsers.php" ><i class="fa fa-book"></i>
 View Users</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-graduation-cap"></i> Page 2</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-file-excel-o"></i> Page 3</a>
                    </li>
                    <li>
                            <a href=""><i class="fa fa-fw fa-user"></i> Page 4</a>
                   </li>
                    <li>
                            <a href="http://localhost/studentMarks/admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
			<div id="container-fluid">
            <?php echo'<h3>Enter Marks for: '.$courseCode.'</h3>'; ?>
            <div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class=".table-striped">
        
          <tbody>
            <tr>
            <form action="" method="get" >
              <td><label>Semester:
                    </label></td>
             <td><select name="semester">
            <?php 
            $sqlFill ="SELECT semester FROM courses WHERE username like '%$username%' AND course_code like '%$courseCode%'";
            $result = $link->query($sqlFill);
            while ($row = mysqli_fetch_array($result)){
                $courseSemester= $row['semester'];
                
            echo '<option value="'.$courseSemester.'">'.$courseSemester.'</option>';
            }
            ?>
</select></td>
                    <td><label>Branch:</label></td>
              <td><select name="branch" class = "demoInputBox">
             <?php 
            $sqlFill ="SELECT branch,branch_name FROM branch";
            $result = $link->query($sqlFill);
            while ($row = mysqli_fetch_array($result)){
                $branchName= $row['branch_name'];
                $branchCode = $row['branch'];
                
            echo '<option value="'.$branchCode.'">'.$branchName.'</option>';
            }
            ?>
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
<table class="table table-bordred table-striped">

        <thead>

            <tr>

              <th>Registration No.</th>  
              <th>Student Name</th>
              <th>Mid Semester Marks (25)</th>
              <th>End Semester Marks (50)</th>
              <th>Internal Assesment (25)</th>
              <th>Enter Marks</th>
              <th>Edit Marks</th>
              
                
            </tr>
           
        </thead>

        <tbody>
        <?php

            if(isset($_GET['semester'])&& isset($_GET['branch'])){
             $semester =$_GET['semester'];
             $branch = $_GET['branch'];}else{
                  $semester = '';
                  $branch='';}
             $sqlDetail = "SELECT regNo,stuFirstName,stuLastName FROM student where semester='$semester'AND branch='$branch'";
             global $link;
                $result1 = $link -> query($sqlDetail);           
              if (mysqli_num_rows($result1) > 0) {
               while($row2 = mysqli_fetch_array($result1)) {
                $reg= $row2['regNo'];
                $sfname =$row2['stuFirstName'];
                $slname = $row2['stuLastName'];
                $sqlMarks ="SELECT midMarks,endMarks,internalMarks FROM marks WHERE regNo like '%$reg%' AND course_code='$courseCode'";
                $result2 = $link->query($sqlMarks);
                $rows3 = mysqli_fetch_array($result2);
                $midMarks=$rows3['midMarks'];
                $endMarks=$rows3['endMarks'];
                $internalMarks=$rows3['internalMarks'];
                
               echo "<tr>";
         echo "<td>"."<center>".$reg."</center>"."</td>";
        echo "<td>"."<center>".$sfname." ".$slname."</center>"."</td>";
         echo "<td>"."<center>".$midMarks."</center>"."</td>";
         echo "<td>"."<center>".$endMarks."</center>"."</td>";
         echo "<td>"."<center>".$internalMarks."</center>"."</td>";
         echo "<td><center>".'<a href="http://localhost/studentMarks/views/studentIndividualEnter.php?regNo='.$reg.'">'.'<button class="btn btn-default">Enter</button>'.'</a></center></td>';
         echo "<td><center>".'<a href="http://localhost/studentMarks/views/studentIndividualEntry.php?regNo='.$reg.'">'.'<button class="btn btn-default">Edit</button>'.'</a></center></td>';
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
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>

           
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
