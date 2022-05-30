<?php
	$servername="localhost";
	$username="root";
	$password="";
	$db = "task";
	
	$con = mysqli_connect($servername,$username,$password);
	mysqli_select_db($con, $db);
	
	$sql = "SELECT * FROM user";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con)); 
  	$row =  mysqli_fetch_assoc($result);
	$_SESSION['login_user'] = $row['username'];
	
	/*
	//create database
	$sql = "CREATE DATABASE task";
	
	if(!mysqli_query($con, $sql))
	 die("Connection failed: " .  mysqli_error($con));
		else
	 echo "";
 
	
	
	//create user table
	  
		 $sql = "CREATE TABLE user(
				user_id INT (10) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
				username VARCHAR(30) NOT NULL,
				user_email VARCHAR(30) NOT NULL,
				user_password VARCHAR(15) NOT NULL,
				user_status ENUM('active','inactive') NOT NULL DEFAULT 'active' , 
				user_type ENUM('1','2') NOT NULL DEFAULT '1' )";
			 
			 
			  if (mysqli_query($sql)) {
					echo "Table user created successfully.<br>";
			} else {
					echo "Error creating table: " . mysqli_error() . "<br>";
			}
	
	//create task table
	  
		 $sql = "CREATE TABLE eventdata ( TaskID INT(10) NOT NULL AUTO_INCREMENT , 
				 Task VARCHAR(55) NOT NULL , 
				DateAdded DATE NOT NULL ,TimeStart TIME(6) NOT NULL , 
				 TimeEnd TIME(6) NOT NULL , 
				 Details VARCHAR(255) NOT NULL , 
				 user_id INT (10),
				 PRIMARY KEY (TaskID)),
				user_id INT (10) FOREIGN KEY REFERENCES user(user_id) )";
			 
			 
			  if (mysqli_query($sql)) {
					echo "Table taskcalendar created successfully.<br>";
			} else {
					echo "Error creating table: " . mysqli_error() . "<br>";
			}
	 
*/
	
	
	//start a session for the new user to recognize user who have already logged in
	//and carry that session over to the next page
	session_start();
	if($con){
	echo " ";
	}else{
	 die("Connection failed: " .  mysqli_error());
}
?>