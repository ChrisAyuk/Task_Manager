<?php
include("connection.php");


	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

    $sql = "SELECT * FROM supervisor where sup_email = '$email'";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); 
	$row = mysqli_fetch_assoc($result);
	//$user_email = $row['sup_email'];
	$count = mysqli_num_rows($result);
	
	if($count > 0){
		echo "<script>alert('User already exist');window.location.href = 'regUser.php';</script>";
	} else {	
			
		$sql = "INSERT into supervisor (username, sup_email, sup_pass)
		values ('$username', '$email', '$password')" ;
		$sql1 = "INSERT into user (username, user_email, user_password, user_type)
		values ('$username', '$email', '$password', '$type')" ;
		mysqli_query($con, $sql);
		mysqli_query($con, $sql1);
		echo "<script>alert('New record created succcessfully');window.location.href = 'index.php';</script>";
	}
	
	 
	
	mysqli_close($con);
?>
	