
   
   
 <?php
   
   include("psignin.php");
   $con = mysqli_connect('localhost','root','');
   
   if(!$con){
	   echo 'NOT CONNECTED' ;
   }
   
   if(!mysqli_select_db($con, 'task')){
	   echo 'not selected';
   }
   
   
   $TaskID = $_POST['id'];
   $Task = $_POST['task'];
   $DateAdded = $_POST['dateadded'];
   $DueDate =$_POST['duedate'];
   $Details =$_POST['details'];
   //$userid = $_session['login_user']; //not sure
   //insert part after the details
   $sql = "INSERT INTO eventdata (TaskID,Task,DateAdded,due_date,Details) VALUES ('$TaskID','$Task','$DateAdded','$DueDate','$Details')";
   
   if(!mysqli_query($con, $sql))
   {
    echo("Error description: " . mysqli_error($con));
   }
   else{
	   echo '<h1> <center>sucessfully inserted,Redirecting to calendar page....</center></h1>';
   }
   
   header("refresh:1; url=view.php");
   
   
   ?>