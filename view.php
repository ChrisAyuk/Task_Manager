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
				<li class="menuitem"><a href="index.php"><img src = "pictures/iwomi-smaller.png" ></a></li>
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
					<a href="manageUser.php"><li>Manage Interns</li></a>
					<a href="manageteams.php"><li>Teams</li></a>
					<a href="view.php"><li>Manage Task</li></a>
				</ul>
			</nav>
		</aside>  
		
		<section>
		
		<div class="content-2">
		<table align=center>
		<tr align= 'center'>
			<thead>
				<th>TaskID</th>
				<th>Task</th>
				<th>DateAdded</th>
				<th>Due Date</th>
				<th>Details</th>
				<th>State</th>
				<th>Edit</th>
			</thead>
		</tr>
<?php
   
   $con = mysqli_connect('localhost','root','');
   
	mysqli_select_db($con, 'task');
	
	$sql = "SELECT * FROM eventdata";

	$info = mysqli_query($con, $sql);
	
	//$userid = $_SESSION['login_user']; //not sure whether this will work
   
	while($row= mysqli_fetch_array($info))
	{
	   echo "<tr>";
	   //echo "<td>".$row[php $userid]."</td>"; //not sure whether this will work
	   echo "<td>".$row['TaskID']."</td>";
	   echo "<td>".$row['Task']."</td>";
	   echo "<td>".$row['DateAdded']."</td>";
	   echo "<td>".$row['due_date']."</td>";
	   echo "<td>".$row['Details']."</td>";
	   echo "<td id='state'>".$row['status']."</td>";
	   echo "<td><a href=eventeditor.php?id=".$row['TaskID']." class='button'>Edit</a></td>";
	   echo "</tr>";
	}
	
	
   ?>
   
   </table>
   </div>

   <input type='button' value='Add Task' name='add' onclick="window.location.href='eventadder.php'">
			 
		</section>
	</div><!--container end -->
	<div style="clear;both"></div>
</body>
<!--<h1>Welcome  <?php echo $login_session; ?></h1>-->
</html>
