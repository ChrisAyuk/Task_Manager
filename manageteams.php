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
					<li><a href="view.php">Manage Task</a></li>
				</ul>
			</nav>
		</aside>  
		
	</div><!--container end-->
	<div style="clear;both"></div>
</body>
<!--<h1>Welcome  <?php echo $login_session; ?></h1>-->
</html>
