
 <?php
   
   include("psignin.php");
   $con = mysqli_connect('localhost','root','');
   
   if(!$con){
	   echo 'NOT CONNECTED' ;
   }
   
   if(!mysqli_select_db($con, 'task')){
	   echo 'not selected';
   }
   
   
   $Task = $_POST['task'];
   $DateAdded = $_POST['dateadded'];
   $DueDate =$_POST['duedate'];
   $Details =$_POST['details'];
   $team = $_POST['team']; 
   $intern = $_POST['intern'];
   $sup = $_SESSION['login_user'];
   $supid = $_SESSION['login_id'];

   $sql = "INSERT INTO eventdata (Task,DateAdded,due_date,Details) VALUES ('$Task','$DateAdded','$DueDate','$Details')";
   
   if(!mysqli_query($con, $sql))
   {
    echo("Error description: " . mysqli_error($con));
   }
   else{
	   echo "<script>alert('Task Created Successfully')</script>";
   }

   $sqlf = "SELECT * from eventdata where Task = '$Task'";
   $fque = mysqli_query($con, $sql) or die (mysqli_error($con));
   $fetch = (mysqli_fetch_array($fque));

   $sql2 = "INSERT into assign (task_id,supervisor_id,int_id,team_id) values ('".$fetch['TaskID']."','$supid','$intern','$team')";
   $que2 = mysqli_query($con,$sql2) or die (mysqli_error($con));
   
   //header("refresh:1; url=view.php");
   
   
   ?>