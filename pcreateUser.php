<?php
  include("connection.php");
 

  if(isset($_POST['btncreateUser'])){
	$username = $_POST['username'];
	$email = $_POST['userEmail'];
	$password = $_POST['userPass'];
	//$status = $_POST['status'];
	$type = "1"; 
	
	 $sql = "INSERT INTO intern (username, int_email, int_pass)
				VALUES ('$username','$email','$password')";

	 $sql1 = "INSERT INTO user (user_type)
			VALUES ('$type')";

	//$sql2 = "INSERT INTO supervision (supervisor,intern)
	//VALUES ('$_SESSION['login_id'],'$username')";

	mysqli_query($con, $sql);
	mysqli_query($con, $sql1);
	//mysqli_query($con, $sql2);
	echo "<script>window.alert ('User created!');</script>";
	 
	 

	
	mysqli_close($con);
  
  }
		
		
?>