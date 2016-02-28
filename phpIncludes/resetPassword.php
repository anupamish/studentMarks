<?php session_start();
include ('connectMysql.php'); //connects to the database
if (isset($_POST['email'])){
    $username = $_POST['email'];
    $sql_query="select * from users where email='$username'";
    $result   = $link->query($sql_query);
    $count= mysqli_num_rows($result);
    // If the count is equal to one, we will send message other wise display an error message.
    if($count==1)
    {
        $rows=mysqli_fetch_array($result);
        $pass  =  $rows['password'];//FETCHING PASS
        //echo "your pass is ::".($pass)."";
        $to = $rows['email'];
        //echo "your email is ::".$email;
        //Details for sending E-mail
        $from = "SMPS Admin";
        $url = "http://www.gmail.com/";
        $body  =  "SMPS password recovery Script
        -----------------------------------------------
        URL: $url;
        E-Mail: $to;
        Your password  : $pass;
        Sincerely,
        Student Marks Processing System";
        $from = "shubh.shukla17@gmail.com";
        $subject = "Student Marks Processing System Password recovery.";
        $headers1 = "From: $from\n";
        $headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
        $sentMail = mail($to,$subject,$body,$headers1);
    } else {
    if ($_POST ['email'] != "") {
    echo " Not found your email in our database";
        }
        }
    //If the message is sent successfully, display sucess message otherwise display an error message.
    if($sentMail)
    {
      header("Location:http://localhost/studentMarks/views/recoverPasswordSuccess.php");
    }
        else
        {
        if($_POST['email']!="")
        echo "<span style='color: #ff0000;'> Cannot send password to your e-mail address.Problem with sending mail...</span>";
    }

}
?>