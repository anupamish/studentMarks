<?php
include ("../phpIncludes/connectMySQL.php");
function setGrade($totalMarks){
	if ($totalMarks>80){ return $multiplyingFactor=10;}
	else if ($totalMarks>65 && $totalMarks<80){return $multiplyingFactor=8;}
	else if ($totalMarks>50 && $totalMarks<65){ return $multiplyingFactor=6;}
	else if ($totalMarks>35 && $totalMarks<50){ return $multiplyingFactor=4;}
	else {return   $multiplyingFactor=2;}
}
?>