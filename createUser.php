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
					<label>User name:	<input type = "text" name = "username" size="15" required/></label>
				</p>
				
				<p>
					<label>User Email:	<input type = "email" name = "userEmail" size="15" required/></label>
				</p>
				
				<p>
					<label>User Password:	<input type = "password" name = "userPass" size="15" required/></label>
				</p>
				
				<p>
					<label>Supervisor:	<input type="text" name="mentor" value="<?php echo $_SESSION['login_user'] ?>" readonly/>
					</select>
				</p>
				
				<p>
					<input type = "submit" value = "Create User" name = "btncreateUser" class="append"/>
					<input type = "reset" value = "Clear" class="delete"/>
				
				</p>
			
			</form>	
			
		</section>
	</div><!--container end -->
	<div style="clear;both"></div>

</body>
<!--<h1>Welcome  <?php echo $login_session; ?></h1>-->
</html>
