<?php
include("connection.php");
 
if(isset($_POST['btnSignIn'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM user WHERE user_email='$email' and user_password='$password'"; 
  	
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); 
  	$row =  mysqli_fetch_assoc($result);
  	$active = $row['user_status'];
	$type = $row['user_type'];
  	$count = mysqli_num_rows($result);
  	if($count == 1){
		if($type == 1 && $active == 'active'){
			$_SESSION['login_user'] = $row['username'];
			$_SESSION['login_id'] = $row['user_id'];
			header("location:userdashboard.php");
		} elseif ($type== 1 && $active == 'inactive') {
			$error = "Your account innactive, please contact us for further details";
			echo "<script>alert('".$error."'); window.location.href = 'contact.php';</script>";
			
		} else {
		
			$_SESSION['login_user'] = $row['username'];
			$_SESSION['login_id'] = $row['user_id'];
			header("location:dashboard.php");
		}
		
	}else{
		$error = "Your login name or password is invalid";
		echo "<script>alert('".$error."'); window.location.href = 'signin.php';</script>";
		
	}
}
?>
	