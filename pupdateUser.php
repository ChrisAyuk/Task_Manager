<?php
  include("connection.php");

  if(isset($_POST['btnupdateUser'])){
	$id = $_POST['id'];
	$username = $_POST['username'];
	$email = $_POST['userEmail'];
	$password = $_POST['userPass'];
	$team = $_POST['team'];
	
	$sql = "UPDATE intern SET username = '$username', int_email = '$email' ,int_pass= '$password', team_id = '$team'
				 WHERE intern_id = '$id' ";
	mysqli_query($con, $sql);

	$sql1 = "UPDATE grouping SET team_id = '$team' WHERE intern_id = '$id' ";
	mysqli_query($con, $sql1);


	echo "<script>window.alert ('User Updated!');window.location.href = 'manageUser.php';</script>";

	
	mysqli_close($con);
  
  }
		
		
?>