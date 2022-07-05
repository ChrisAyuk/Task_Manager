<?php
  include("connection.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/dashboard.css" type="text/css">
	<title>Admin Home</title>
</head>
 <body>
      
	<div id="container">
	   
		 <aside>
			<nav id="leftmenu">
				<a href = "dashboard.php"><h3>Dashboard</h3></a>
				<ul>
					<li><a href="manageUser.php">Manage Intern</a></li>
					<li><a href="manageteams.php">Teams</a></li>
					<li><a href="view.php">Manage Task</a></li>
				</ul>
			</nav>
		</aside>  

		<nav id="menu">
			<ul>
				<li class="menuitem"><a href = "index.php"><h1><img src = "pictures/iwomi-smaller.png" ></li>
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
		<section>
			<h1>
			
			<img src = "pictures/user.png" alt = "pictures/user.png" width ="45px" height = "45px">
				
			<?php 
			echo"Welcome ".$_SESSION['login_user']."</h1>";
			?>
			</h1>	
			 
		</section>

		<div class="grid">
			<a href="manageUser.php"><div class="grid-item" ><img src="pictures/internship.png" width ="70" height = "70">	Manage Interns</div></a>
			<a href="manageteams.php"><div class="grid-item" ><img src="pictures/group.png" width ="70" height = "70">	Control Teams</div></a>
			<a href="view.php"><div class="grid-item"><img src="pictures/task.png" width ="78" height = "78">	View Tasks</div></a>
		</div>

	</div><!--container end -->
	<div style="clear;both"></div>

</body>
<!--<h1>Welcome  <?php echo $login_session; ?></h1>-->
</html>
