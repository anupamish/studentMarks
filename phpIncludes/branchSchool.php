<?php
include("../phpIncludes/connectMySQL.php");
global $link;
function decideSchool($school){
	if ($school=='SOE') return "School of Engineering";
	else if ($school=='SOBT') return "School of Biotechnology";
	else if ($school=='SOVS') return "School of Vocational Studies and Applied Sciences";
	else if ($school=='SOM') return "School of Management";
	else if ($school=='SOICT') return "School of Information and Communication Technology";
	else if ($school=='SOBSC') return "School of Buddhist Studies and Civilization";
	else if ($school=='SOHSS') return "School of Humanities and Social Sciences";
	else if ($school=='SLGJ') return "School of Law, Justice and Governance";
}

function decideFaculty($school){
	if ($school=='apro') return "Assistant Professor";
	else if ($school=='aspro') return "Associate Professor";
	else if ($school=='rfa') return "Research/Faculty Associate";
	else if ($school=='pro') return "Professor";
	
}
function decideBranch($branch){
	$sqlQuery="SELECT branch_name FROM branch WHERE branch='$branch'";
	global $link;
	$result= $link->query($sqlQuery);
	$row = mysqli_fetch_array($result);
	return $row['branch_name'];
}
?>