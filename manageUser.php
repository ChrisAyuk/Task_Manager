<?php
  include("connection.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/dashboard.css" type="text/css">
	<title>Manage User</title>
	
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
						<li class ="signup"><a href = "index.php"><button class = "button buttongreen">Sign out</button></a>
						</li>
					</ul>		
				</li>
				
			</ul>
	    </nav>
		  
		 <aside>
			<nav id="leftmenu">
				<a href = "dashboard.php"><h3>Dashboard</h3></a>
				<ul>
					<li><a href="manageUser.php">Manage User</a></li>
					<li><a href="manageteams.php">Teams</a></li>
					<li><a href="view.php">Manage task</a></li>	 
				</ul>
			</nav>
		</aside>  
		
		<section>
		
			
		
			<h1>User Records</h1>
		 	
			<table border= "1"> 
				<tr>
				<thead>
					<th>Intern ID</th>
					<th>User Name</th>
					<th>Email</th>
					<th>Password</th>
					<th>Team</th>
					<th>Action</th>
				</thead>
				</tr>
			
			
			<?php
		 
			$query="SELECT * FROM intern";
			$result=mysqli_query($con, $query);
			
			mysqli_close($con);
			
			while($row = mysqli_fetch_array($result)){
				echo "<tr>
						<td>",$row['intern_id'],"</td>
						<td>",$row['username'],"</td>
						<td>",$row['int_email'],"</td>
						<td>",$row['int_pass'],"</td>
						<td>",$row['team_id'],"</td>
						<td><a href ='updateUser.php? epr=update&id=",$row['intern_id'],"'>Edit</a></td> 
					</tr>";
				
			}
				
			?>
			
			</table>
			
			<p>
				<a href = "createUser.php"><input type = "button" value = "Create intern"/></a> 
				 
			</p>
			
		</section>
		
	</div><!--container end-->
	<div style="clear;both"></div>
</body>
<!--<h1>Welcome  <?php echo $login_session; ?></h1>-->
</html>
