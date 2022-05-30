<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<title>Register user</title>
</head>
<body>
	<div id="container">
		<header>
			<a href = "index.php"><h1>Daily Task Planner</h1></a>
			
		</header>
		 
		
		<nav id="menu">
			<ul>
				<li class="menuitem"><a href="index.php">Home</a></li>
				<li class="menuitem"><a href="about.php">About Us</a></li>
				<li class="menuitem"><a href="contact.php">Contact Us</a></li>
				<li>
					<ul>
						<li class ="signup"><a href = "regUser.php"><button class = "button buttongreen">Sign up</button></a>
						</li>
						<li class ="signin"><a href = "signin.php"><button class = "button buttongreen">Sign in</button></a>
						</li>
					</ul>		
				</li>
				
			</ul>
	    </nav>
		
		<section id="about">
			<h1>Create Free Account</h1>
			
			<form class ="form" method = "post" action = "pregUser.php">
				 
				<input type = "hidden" name = "redirect" value = "main.php">
				
				<p><label>Username:</label>
					<input type = "text" name = "username" maxlength = "30" autofocus required/></p>
				
				<p><label>Password:</label>
					<input type = "password" name = "password" id ="password" required/></p>
				
				<p><label>Confirm password</label>
					<input type = "password" name = "conPassword" id = "conPassword" required/></p>
					
	            
											
				<p><label>Your email address:</label>
					<input type = "email"  name ="email" placeholder = "name@domain.com" required/></p>
				
				<p>
					<input type = "submit" value = "Register"  onclick="return validatePassword()">
					<input type = "reset" value = "Clear">
				</p>
			
			</form>
			
			
			<script>
						
				function validatePassword(){
									
					var password = document.getElementById("password").value;
					var confirm_password = document.getElementById("conPassword").value;
								
					if(password != confirm_password) {
						alert("Password not match!");
						return false;
					 }  
					
					return true;
					
				}
						
			</script>
			
		</section>
	</div><!--container end-->
	<div style="clear;both"></div>
	<footer>
		Copyright &copy; 2016, Daily Task Planner
	</footer>
	</body>
</html>