<?php
  include("connection.php");

  if(isset($_POST['btnupdateUser'])){
	$id = $_POST['id'];
	$username = $_POST['username'];
	$email = $_POST['userEmail'];
	$password = $_POST['userPass'];
	$status = $_POST['status'];
	$type = $_POST['type']; 
	
	 $sql = "UPDATE user SET username = '$username', user_email = '$email' ,user_password= '$password',
				user_status='$status',user_type= '$type' WHERE user_id = '$id' ";
	
	
	mysqli_query($con, $sql);
	echo "<script>window.alert ('User Updated!');window.location.href = 'manageUser.php';</script>";

	
	mysqli_close($con);
  
  }
		
		
?>