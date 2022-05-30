<?php
  include("connection.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/dashboard.css" type="text/css">
	<title>User Home</title>
</head>
 <body>
      
	<div id="container">
	  
		<nav id="menu">
			<ul>
				<li class="menuitem"><a href="index.php">Daily Task Planner</a></li>
				<li class="menuitem"><a href="about.php">About Us</a></li>
				<li class="menuitem"><a href="contact.php">Contact Us</a></li>
				<li>
					<ul>
						<li class ="signup"><a href = "logout.php"><button class = "button buttongreen">Sign out</button></a>
						</li>
					</ul>		
				</li>
				
			</ul>
	    </nav>
		  
		 <aside>
			<nav id="leftmenu">
				<a href = "dashboard.php"><h3>Dashboard</h3></a>
				<ul>
					<li><a href="view.php">Manage Task</a></li>
					<li><a href="manageteams.php">Teams</a></li>
				</ul>
			</nav>
		</aside>  
		
		<section>
			
		<table id = "view" border='1' cellspacing='0' cellpadding='0' align=center>
		<tr align= 'center'>
			<th>TaskID</th>
			<th>Task</th>
			<th>DateAdded</th>
			<th>Due Date</th>
			<th>Details</th>
			<th>Delete</th>
		</tr>
<?php
   
   $con = mysqli_connect('localhost','root','');
   
	mysqli_select_db($con, 'task');
	
	$sql = "SELECT * FROM eventdata";

	$info = mysqli_query($con, $sql);
	
	//$userid = $_session['login_user']; //not sure whether this will work
   
	while($row= mysqli_fetch_array($info))
	{
	   echo "<tr>";
	   //echo "<td>".$row[php $userid]."</td>"; //not sure whether this will work
	   echo "<td>".$row['TaskID']."</td>";
	   echo "<td>".$row['Task']."</td>";
	   echo "<td>".$row['DateAdded']."</td>";
	   //echo "<td>".$row['TimeStart']."</td>";
	   echo "<td>".$row['due_date']."</td>";
	   echo "<td>".$row['Details']."</td>";
	   echo "<td><a href=remove.php?id=".$row['TaskID'].">Delete</a></td>";
	   echo "</tr>";
	}
	
	
   ?>
   <tr>
   <td><input type='button' value='Return' name='back' onclick="window.location.href='view.php'"></td>
   </tr>
   
   </table>
			 
		</section>
	</div><!--container end-->
	<div style="clear;both"></div>
	<footer>
		Copyright &copy; 2016, Daily Task Planner
	</footer>
</body>
<!--<h1>Welcome  <?php echo $login_session; ?></h1>-->
</html>
