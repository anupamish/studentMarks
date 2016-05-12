<?php
session_start();
include ("../phpIncludes/connectMySQL.php");
if(!isset($_SESSION['username'])){
	header("Location: http://localhost/studentMarks/admin/index.php");
}else{
	
}
?>
<?php
// to perfrom search
if (isset($_POST['search'])){
	 $searchString= $_POST['searchQuery'];
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
                        <a href="http://localhost/studentMarks/admin/adminLanding.php" ><i class="fa fa-book"></i>
 View Users</a>
                    </li>
                    <li>
                        <a href="http://localhost/studentMarks/admin/courseAdmin.php"><i class="fa fa-graduation-cap"></i> View Courses</a>
                    </li>
                    <li>
                        <a href="http://localhost/studentMarks/admin/calculateGPA.php"><i class="fa fa-file-excel-o"></i> Calculate CGPA</a>
                    </li>
                    <li>
                            <a href="http://localhost/studentMarks/admin/uploadData.php"><i class="fa fa-fw fa-user"></i> Upload Data</a>
                   </li>
                   <li>
                            <a href="http://localhost/studentMarks/admin/setConst.php"><i class="fa fa-fw fa-user"></i> Set Constraints</a>
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
            <h3>Viewing all Users in the system.</h3>
            <hr>
            
            <table class="table table-striped">
            <form action="" method="post">
            <tr>
            <td><input type="text" name="searchQuery" placeholder="Enter either First Name,Last Name or Email to perform Search!" size="70"></td>
            <td> <input type="submit" name="search" class="btn btn-primary" value="Search"></td>
            </tr>
            </form>
            </table>
            
            <hr>
            <br>
<table class="table  table-striped">

        <thead>

            <tr>

              <th><center>Email</center></th>  
              <th><center>First Name</center></th>
              <th><center>Last Name</center></th>
              <th><center>School</center> </th>
              <th><center> Delete User</center></th>              
                
            </tr>
           
        </thead>

        <tbody>
        <?php
			if(!isset($_POST['search'])){
            $sqlDetail = "SELECT email,firstName,lastName,school FROM users";
             global $link;
                $result1 = $link -> query($sqlDetail);           
              if (mysqli_num_rows($result1) > 0) {
               while($row2 = mysqli_fetch_array($result1)) {
                $email= $row2['email'];
                $fname =$row2['firstName'];
                $lname = $row2['lastName'];
                $school = $row2['school'];
               echo "<tr>";
         echo "<td>"."<center>".$email."</center>"."</td>";
        echo "<td>"."<center>".$fname."</center>"."</td>";
         echo "<td>"."<center>".$lname."</center>"."</td>";
         echo "<td>"."<center>".strtoupper($school)."</center>"."</td>";
         echo "<td><center>".'<a href="http://localhost/studentMarks/phpIncludes/deleteUser.php?userName='.$email.'">'.'<button class="btn btn-default">Delete</button>'.'</a></center></td>';
        echo "</tr>";
    }
}else {
    echo "<tr>";
    echo "<td>"."<center>"."No rows found!"."</center>"."</td>";
    echo "</tr>";
      
}}else{
	$sqlDetail = "SELECT email,firstName,lastName,school FROM users WHERE firstName='$searchString' OR lastName='$searchString' OR email='$searchString'";
	global $link;
	$result1 = $link -> query($sqlDetail);
	if (mysqli_num_rows($result1) > 0) {
		while($row2 = mysqli_fetch_array($result1)) {
			$email= $row2['email'];
			$fname =$row2['firstName'];
			$lname = $row2['lastName'];
			$school = $row2['school'];
			echo "<tr>";
			echo "<td>"."<center>".$email."</center>"."</td>";
			echo "<td>"."<center>".$fname."</center>"."</td>";
			echo "<td>"."<center>".$lname."</center>"."</td>";
			echo "<td>"."<center>".strtoupper($school)."</center>"."</td>";
			echo "<td><center>".'<a href="http://localhost/studentMarks/phpIncludes/deleteUser.php?userName='.$email.'">'.'<button class="btn btn-default">Delete</button>'.'</a></center></td>';
			echo "</tr>";
		}
	}else {
		echo "<tr>";
		echo "<td>"."<center>"."No rows found!"."</center>"."</td>";
		echo "</tr>";
	
	}
}

?>

        </tbody>

    </table>
       	<p><i>Note: Deleting the user will result in deletion of all the data being held by the user in the system.</i></p>
    
           <br>
           <div id="deleteMsg">
                  <?php if(!empty($_SESSION['deleteMsg'])) { echo "<h5><font color='red'>".$_SESSION['deleteMsg']."</font></h5>"; } ?>
        </div>
        <?php unset($_SESSION['deleteMsg']); ?>
           <br>
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
