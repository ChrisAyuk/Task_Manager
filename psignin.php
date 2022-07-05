<?php
include("connection.php");
 
if(isset($_POST['btnSignIn'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql1 = "SELECT * FROM intern WHERE int_email='$email' and int_pass='$password'";
	$sql2 = "SELECT * FROM supervisor WHERE sup_email='$email' and sup_pass='$password'"; 

	$result1 = mysqli_query($con, $sql1) or die(mysqli_error($con));
	$result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));
  	$row1 =  mysqli_fetch_assoc($result1);
	$row2 =  mysqli_fetch_assoc($result2);

  	//$active = $row['user_status'];
	//$type = $row['user_type'];
  	$count1 = mysqli_num_rows($result1);
	$count2 = mysqli_num_rows($result2);

  	if($count1 == 1 || $count2 == 1){
		if($count1 == 1 ){
			$_SESSION['login_user'] = $row1['username'];
			$_SESSION['login_id'] = $row1['intern_id'];
			header("location:userdashboard.php");	
		} elseif($count2 == 1) {
		
			$_SESSION['login_user'] = $row2['username'];
			$_SESSION['login_id'] = $row2['sup_id'];
			header("location:dashboard.php");
		}
		
	}else{
		$error = "Your login name or password is invalid";
		echo "<script>alert('".$error."'); window.location.href = 'signin.php';</script>";
		
	}
}
?>
	