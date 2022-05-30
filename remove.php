

<?php

	$con = mysqli_connect('localhost','root','');
   
	mysqli_select_db($con, 'task');
	
	$sql = "DELETE FROM eventdata WHERE TaskID='$_GET[id]'";

	if(mysqli_query($con, $sql))
	header("refresh:1; url=view.php");


?>