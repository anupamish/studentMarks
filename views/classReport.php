<?php
session_start();
include("../phpIncludes/connectMySQL.php");
$courseCode= $_GET['id'];
$course_query = "SELECT * FROM courses WHERE course_code='$courseCode'";
$result = $link -> query($course_query);
$row = mysqli_fetch_array($result);
$courseName = $row['course_name'];
$courseSemester = $row['semester'];
$courseCredits = $row['credits'];
function setGrade($totalMarks){
	if ($totalMarks>80) return 'Ex';
	else if ($totalMarks>65 && $totalMarks<80) return 'A';
	else if ($totalMarks>50 && $totalMarks<65) return 'B';
	else if ($totalMarks>35 && $totalMarks<50) return 'C';
	else return 'F';
}
?>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<title> Class Report for <?php echo $courseCode; ?></title>
<style type="text/css" media="print">
  @page { size: landscape; }
</style>
<!-- Bootstrap Core CSS -->
    <link href="http://localhost/studentMarks/sideBar/css/bootstrap.min.css" rel="stylesheet">

   

    <!-- Morris Charts CSS -->
    <link href="http://localhost/studentMarks/sideBar/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/studentMarks/sideBar/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
<center>
<img src="http://localhost/studentMarks/imageResources/gbu.png" width="100" height="101"/>
<h1><strong><u>GAUTAM BUDDHA UNIVERSITY</u></strong></h1>
<h3> Gautam Budh Nagar, Uttar Pradesh-201312 (INDIA)</h3>
<h3>Class Report (2015-2016)</h3>
<u><h3>Course Code: <?php echo $courseCode;?>, Course Name: <?php echo $courseName;?>, Course Semester: <?php echo $courseSemester;?>, Course Credits: <?php echo $courseCredits;?></u></h3>
<table class="table table-striped">
<thead class="thead-inverse">
<tr>
<th><center>Registration Number</center></th>
<th><center>Mid Semester Marks(25)</center></th>
<th><center>End Semester Marks(50)</center></th>
<th><center>Internal Examination Marks(25)</center></th>
<th>Grade</th>
</tr>
</thead>
<tbody>
<?php

			 $sqlDetail = "SELECT regNo FROM student where regNo IN(SELECT regNo FROM marks WHERE course_code='$courseCode') ORDER BY regNO";
			 global $link;
                $result1 = $link -> query($sqlDetail);           
              if (mysqli_num_rows($result1) > 0) {
               while($row2 = mysqli_fetch_array($result1)) {
                $reg= $row2['regNo'];
                $sqlMarks ="SELECT midMarks,endMarks,internalMarks FROM marks WHERE regNo like '%$reg%' AND course_code='$courseCode'";
				$result2 = $link->query($sqlMarks);
				$rows3 = mysqli_fetch_array($result2);
				$midMarks=$rows3['midMarks'];
				$endMarks=$rows3['endMarks'];
				$internalMarks=$rows3['internalMarks'];
				$totalMarks = $midMarks+$endMarks+$internalMarks;
				 
				
               echo "<tr>";
         echo "<td>"."<center>".$reg."</center>"."</td>";
  		 echo "<td>"."<center>".$midMarks."</center>"."</td>";
		 echo "<td>"."<center>".$endMarks."</center>"."</td>";
		 echo "<td>"."<center>".$internalMarks."</center>"."</td>";
		 echo "<td>"."<center>".setGrade($totalMarks)."</center>"."</td>";
		 echo "</tr>";
    }
}else {
	echo "<tr>";
    echo "<td>"."<center>"."No records for the corresponding course found."."</center>"."</td>";
    echo "<td>"."<center>"."-"."</center>"."</td>";
    echo "<td>"."<center>"."-"."</center>"."</td>";
    echo "<td>"."<center>"."-"."</center>"."</td>";
    echo "<td>"."<center>"."-"."</center>"."</td>";
	echo "</tr>";
      
}

?>
</tbody>
</table>
<br>
<hr>
<a href="javascript: window.print()"><span class="glyphicon glyphicon-print" ></span></a>
</center>
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