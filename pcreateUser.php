<?php
  include("connection.php");
 

  if(isset($_POST['btncreateUser'])){
	$username = $_POST['username'];
	$email = $_POST['userEmail'];
	$password = $_POST['userPass'];
	$sup = $_SESSION['login_id'];
	$type = "1"; 
	
	$sql = "INSERT INTO intern (username, int_email, int_pass)
				VALUES ('$username','$email','$password')";
	mysqli_query($con, $sql);

	$sql1 = "SELECT intern_id from intern where username='$username'";
	$int=mysqli_query($con, $sql1);
	if(!$int){
		printf("Error: %s\n",mysqli_error($con));
		exit();
	}
	$fint=mysqli_fetch_assoc($int);
	$nid=$fint['intern_id'];
	//printf("%s\n",$i_id);

	$sql2 = "INSERT INTO supervision (super_id,intern_id) values ('$sup','$nid')";
	mysqli_query($con, $sql2);
	echo "<script>window.alert ('User created!');  window.location.href = 'manageuser.php';</script>";
	 
	 

	
	mysqli_close($con);
  
  }
		
		
?>