<?php
session_start();
include ("../phpIncludes/connectMySQL.php");
include("../phpIncludes/calculateGrade.php");
if(!isset($_SESSION['username'])){
	header("Location: http://localhost/studentMarks/admin/index.php");
}else{
	
}
?>
<!-- -Fetch Data -->

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
                    <li>
                        <a href="http://localhost/studentMarks/admin/calculateGPA.php"><i class="fa fa-calculator"></i> Calculate CGPA</a>
                    </li>
                    <li class="active">
                            <a href="http://localhost/studentMarks/admin/printMarksheet.php"><i class="fa fa-print"></i> Print Marksheet</a>
                   </li>
                    <li>
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
       		<h3>Print Marksheet for Students</h3>
       		<hr>
       		<div class="row">
    <div class="col-xs-12">
      <div >
        <table class="table">
        
          <tbody>
            <tr>
			<form action="" method="get" >
			<td><label>Semester:
                    </label></td>
             <td><select name="semester">
			<option value="1">1</option>;
			<option value="2">2</option>;
			<option value="3">3</option>;
			<option value="4">4</option>;
			<option value="5">5</option>;
			<option value="6">6</option>;
			<option value="7">7</option>;
			<option value="8">8</option>;
			<option value="9">9</option>;
			<option value="10">10</option>;
			</select></td>
<td><label>Branch:
                    </label></td>
             <td><select name="branch">
			<?php 
			$sqlFill = "SELECT branch,branch_name FROM branch ";
			$result = $link->query($sqlFill);
			while ($row = mysqli_fetch_array($result)){
				$branch= $row['branch'];
				$branchName = $row['branch_name'];
				
			echo '<option value="'.$branch.'">'.$branchName.'</option>';
			}
			?>
</select></td>
			<td><div class= "control-group">
                <button type="submit" name="submit" class="btn btn-primary">Show</button>
                </div></td>
			</form>
			</tr>
			</tbody>
			</table>
			<hr>
			<table class="table table-bordred table-striped">

        <thead>

            <tr>

              <th><center>Registration No.</center></th>  
              <th><center>Student Name</center></th>
              <th><center>CGPA</center></th>
              		  	
            </tr>
           
        </thead>

        <tbody>
        <?php
        if(isset($_GET['submit'])){
        	$semester = $_GET['semester'];
        	$branch = $_GET['branch'];
 			$sqlDetail = "SELECT regNo,stuFirstName,stuLastName FROM student where semester='$semester'AND branch='$branch'";
			 global $link;
                $result1 = $link -> query($sqlDetail);           
              if (mysqli_num_rows($result1) > 0) {
               while($row2 = mysqli_fetch_array($result1)) {
                $reg= $row2['regNo'];
                $sfname =$row2['stuFirstName'];
                $slname = $row2['stuLastName'];
				$sqlMarks ="SELECT cgpa FROM cgpa WHERE regNo='$reg'";
				$result2 = $link->query($sqlMarks);
				$rows3 = mysqli_fetch_array($result2);
				$cgpa=$rows3['cgpa'];
				
               echo "<tr>";
       echo "<td>"."<center>".'<a href="http://localhost/studentMarks/admin/studentMarksheet.php?reg=' . $reg . '">'.$reg.'</a>'."</center>"."</td>";
        echo "<td>"."<center>".$sfname." ".$slname."</center>"."</td>";
		 echo "<td>"."<center>".$cgpa."</center>"."</td>";
		 echo "</tr>";
    }
}else {
	echo "<tr>";
    echo "<td>"."<center>"."No rows found!"."</center>"."</td>";
	echo "</tr>";
      
}}else {
	echo "<tr>";
    echo "<td>"."<center>"."No rows found!"."</center>"."</td>";
	echo "</tr>";}

?>

        </tbody>

    </table>
			</div>
			</div>
			</div>
			</div>
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
