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
				<li class="menuitem"><a href="index.php"><img src = "pictures/iwomi-smaller.png" ></a></li>
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
					<a href="manageUser.php"><li>Manage User</li></a>
					<a href="manageteams.php"><li>Teams</li></a>
					<a href="view.php"><li>Manage task</li></a>	 
				</ul>
			</nav>
		</aside>  
		
		<section>
		
			
		
			<h1>User Records</h1>
		 	
			<table> 
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
		 	$id = $_SESSION['login_id'];
			$query="SELECT * FROM intern as t1 INNER JOIN supervision as t2 ON t1.intern_id = t2.intern_id Where super_id= '$id'";
			$result=mysqli_query($con, $query);		
			
			while($row = mysqli_fetch_array($result)){
				$tid=$row['team_id'];
				$tque="SELECT teamName from team as t1 inner join intern as t2 on t1.team_id=t2.team_id where t1.team_id='$tid'";
				$tres=mysqli_query($con, $tque);
				if(!$tres){
					printf("Error: %s\n",mysqli_error($con));
					exit();
				}
				$tfet=mysqli_fetch_array($tres);
				
				echo "<tr>
						<td>",$row['intern_id'],"</td>
						<td>",$row['username'],"</td>
						<td>",$row['int_email'],"</td>
						<td>",$row['int_pass'],"</td>
						<td>",$tfet['teamName']?? null,"</td>
						<td><a href ='updateUser.php? epr=update&id=",$row['intern_id'],"' class='button'>Edit</a>	<div class='delete'>Delete</div></td> 
					</tr>";
				
			}
				
			?>
			
			</table>
			
			<p>
				<a href = "createUser.php"><input type = "button" value = "Create intern"/></a> 
				 
			</p>
			
		</section>
		
	</div><!--container end -->
	<div style="clear;both"></div>
</body>
<!--<h1> <?php echo $login_session; ?></h1>-->
</html>
