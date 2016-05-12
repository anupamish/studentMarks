<?php
session_start();
include("../phpIncludes/connectMySQL.php");
$regNo= $_GET['reg'];
$queryCGPA = "SELECT cgpa from cgpa WHERE regNo='$regNo'";
$resultCGPA = $link->query($queryCGPA);
$rowCGPA = mysqli_fetch_array($resultCGPA);
$cgpa = $rowCGPA['cgpa'];
function setGrade($totalMarks){
	if ($totalMarks>80) return 'Ex';
	else if ($totalMarks>65 && $totalMarks<80) return 'A';
	else if ($totalMarks>50 && $totalMarks<65) return 'B';
	else if ($totalMarks>35 && $totalMarks<50) return 'C';
	else return 'F';
}
$studentDetails = "SELECT * FROM student WHERE regNo='$regNo'";
$resultStudentDetails = $link ->query($studentDetails);
$rowStudentDetails = mysqli_fetch_array($resultStudentDetails);
$studentName = $rowStudentDetails['stuFirstName']." ".$rowStudentDetails['stuLastName'];
$studentBranch = $rowStudentDetails['branch'];
$studentSchool= $rowStudentDetails['college'];
?>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<title> Marksheet for <?php echo $regNo; ?></title>
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
<h3>STATEMENT OF GRADES (2015-2016)</h3>
<u><h4>Name of Student: <?php echo $studentName;?>, Enrollment Number: <?php echo $regNo;?>, Branch: <?php echo $studentBranch;?>, Name of School: <?php echo $studentSchool;?></u></h4>
<table class="table table-striped">
<thead class="thead-inverse">
<tr>
<th><center>Serial No.</center></th>
<th><center>Course Code & Name</center></th>
<th><center>Credits</center></th>
<th><center>Grade</center></th>
</tr>
</thead>
<tbody>
<?php
			$serial=0;
			 $sqlDetail = "SELECT credits,course_code,course_name FROM courses WHERE course_code IN (SELECT course_code FROM marks WHERE regNo='$regNo')";
			 global $link;
                $result1 = $link -> query($sqlDetail);           
              if (mysqli_num_rows($result1) > 0) {
               while($row2 = mysqli_fetch_array($result1)) {
               	$serial +=1;
                $courseCode= $row2['course_code'];
                $courseName = $row2['course_name'];
                $courseCredits=$row2['credits'];
                $sqlMarks ="SELECT midMarks,endMarks,internalMarks FROM marks WHERE regNo like '%$regNo%' AND course_code='$courseCode'";
				$result2 = $link->query($sqlMarks);
				if (mysqli_num_rows($result2) > 0) {
					while($rows3 = mysqli_fetch_array($result2)) {
			
				$midMarks=$rows3['midMarks'];
				$endMarks=$rows3['endMarks'];
				$internalMarks=$rows3['internalMarks'];
				$totalMarks = $midMarks+$endMarks+$internalMarks;
				 
				
               echo "<tr>";
         echo "<td>"."<center>".$serial."</center>"."</td>";
  		 echo "<td>"."<center>".$courseCode." ".$courseName."</center>"."</td>";
		 echo "<td>"."<center>".$courseCredits."</center>"."</td>";
		 echo "<td>"."<center>".setGrade($totalMarks)."</center>"."</td>";
		 echo "</tr>";
    }
}}}else {
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
<table class="table table-striped">
<thead>
<tr><th><center>CGPA: <?php echo $cgpa;?></center></th></tr>
</thead>
</table>
</center>
<h5>Issued on: <?php echo date("d-m-Y")?></h5>
<center>
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