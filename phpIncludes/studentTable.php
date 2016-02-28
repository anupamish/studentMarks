<?php
include('connectMySQL.php');
$sql = "SELECT regNo,stuFirstName,stuLastName,oddMidMarks,oddEndMarks,evenMidMarks,evenEndMarks FROM student";
$results = $link->query($sql);
$row1= mysqli_fetch_array($results);

// see if any rows were returned
if (mysqli_num_rows($results) > 0) {
    echo "<table cellpadding=10 border=1>";
    echo '<tr>'; // start first row

while ($row1 = mysql_fetch_array($results))
{ $col++;
  if ($col == COLS) // have filled the last row
  { $col = 1;
    echo '</tr><tr>'; // start a new one
  }
  echo '<td>', '<center>', '<img src="', $rows[7], '" width="150px"/>', '<br>', $rows[2],'<br>', $rows[0],'<br>', $rows[3],'<br>', $rows[4],'<br>', $rows[8], '</center>', '</td>';
  print ($col);
}

echo '</tr>'; 
    echo "</table>";
}
else {
    // no
    // print status message
    echo "No rows found!";
}

?>