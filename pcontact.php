<?php
include("connection.php");

	if(isset($_POST['feedbackbtn'])){
	 $email_to = $_POST['recipient'];
    $email_subject = $_POST['subject'];
	$name = $_POST['name'];
	$comment = $_POST['comments'];
	$email = $_POST['email'];
	$rating = $_POST['rating'];
	$headers = 'From:'. $email  . "\r\n" ; 
	$formcontent=" From: $name \n Comment: $comment \n Email: $email  \n Rating: $rating";
	$test = "chris88chris88@hotmail.com";
	
    // this line need to comment because XAMPP didnt include mail server so it will cause an error when button submit clicked. If the
	//website hosted, then the mail server error message will dissappear and work successfully.
	//mail($test,  $email_subject , $formcontent ,$headers ) or die("Error!");
	
	
	
		 echo "<script>alert('Your feedback submitted. Thank you');window.location.href = 'index.php';</script>";
	}
	
	
	
	mysql_close($con);
?>
	