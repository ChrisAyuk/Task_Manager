<?php
  include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<title>Sign in</title>
</head>
<body>
<nav id="menu">
			<ul>
				<li class="homepic"><a href = "index.php"><h1><img src = "pictures/iwomi.png"></h1></a></li>
				<li class="menuitem"><a href="index.php">Home</a></li>
				<li class="menuitem"><a href="about.php">About Us</a></li>
				<li class="menuitem"><a href="contact.php">Contact Us</a></li>
				<li>
					<ul>
						<li class ="signup" ><a href = "regUser.php"><button class = "button buttongreen">Sign up</button></a>
						</li>
						<li class ="signin" style="color='#54782E'"><a href = "signin.php"><button class = "button buttongreen">Sign in</button></a>
						</li>
					</ul>		
				</li>
				
			</ul>
	    </nav>
	<div id="container">
	
		
	<section id="about">
		<div>
			<h2>Sign in</h2>
			<form class = "form" method = "post" action = "psignin.php">
				
				<!--<input type = "hidden" name = "redirect" value = "main.php">-->
				
				<p><label>Email address:</label>
					<input type = "email" name = "email"  placeholder = "name@domain.com" required/></p>
				
				<p><label>Password:</label>
					<input type = "password" name = "password" required/></p>
				
				<p>
					<input type = "submit" value = "Sign in" name = "btnSignIn">
					<input type = "reset" value = "Clear">
				</p>
			
			</form>
			
			<p>
				 
				 No Account ? <a href = "regUser.php">Create Account</a>
			</p>
		</div>
		
	</section>
	</div><!--container end -->
	<div style="clear;both"></div>
	<footer>
		Copyright &copy; 2016, IWOMI TASKING
	</footer>
</body>
</html>	