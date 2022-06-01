<?php
  include("connection.php");

  if(isset($_POST['update'])){

	// var_dump($_POST);
	// exit;

	//$ID = $id;
	$id = $_POST['id'];
	$Task = $_POST['task'];
	$Dateadded = $_POST['dateadded'];
	$DueDate = $_POST['duedate'];
	$Details = $_POST['details'];
	
	 $sql = "UPDATE eventdata SET Task = '$Task', DateAdded = '$Dateadded' , due_date= '$DueDate',
				Details='$Details' WHERE TaskID = '$id' ";
	
	
	mysqli_query($con, $sql);
	echo "<script>window.alert ('User Updated!'); window.location.href = 'view.php';</script>";

	mysqli_close($con);
  
  }
		
		
?>