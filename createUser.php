<?php
  include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/dashboard.css" type="text/css">
	<title>Create User</title>
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
				<a href="dashboard.php"><h3>Dashboard</h3></a>
				<ul>
					<li><a href="manageUser.php">Manage User</a></li>
					<li><a href="manageteams.php">Teams</a></li>
					<li><a href="view.php">Manage Task</a></li>
				</ul>
			</nav>
		</aside>  
		
		<section>
		
			<h2>Create Itern</h2>
			<form method = "post" action = "pcreateUser.php">
				<p>
					<label>User name:
					<input type = "text" name = "username" required/></label>
				</p>
				
				<p>
					<label>User Email:
					<input type = "email" name = "userEmail" required/></label>
				</p>
				
				<p>
					<label>User Password:
					<input type = "password" name = "userPass" required/></label>
				</p>
				
				<p>
					<label>Supervisor:
					<select name = "status">
						<option value ="">		</option>
						<?php
		 
							$query="SELECT username FROM supervisor";
							$result=mysqli_query($con, $query);
							$supname= $row['username'];
			
							mysqli_close($con);
			
							while($row = mysqli_fetch_array($result)){
								echo "<option value=",$row['username'],">",$row['username'],"</option>";
				
							}
				
						?>
					</select>
				</p>
				
				<p>
					<input type = "submit" value = "Create User" name = "btncreateUser"/>
					<input type = "reset" value = "Clear"/>
				
				</p>
			
			</form>	
			
		</section>
	</div><!--container end-->
	<div style="clear;both"></div>
	<footer>
		Copyright &copy; 2016, Daily Task Planner
	</footer>
</body>
<!--<h1>Welcome  <?php echo $login_session; ?></h1>-->
</html>
