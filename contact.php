<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<title>Contact</title>
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
						<li class ="signup"><a href = "regUser.php"><button class = "button buttongreen">Sign up</button></a>
						</li>
						<li class ="signin"><a href = "signin.php"><button class = "button buttongreen">Sign in</button></a>
						</li>
					</ul>		
				</li>
				
			</ul>
	    </nav>
		 
	<div id="container">

		 <!--<aside>
			<nav id="leftmenu">
			<h3>Dashboard</h3>
				<ul>
					<li><a href="browse.php">Manage User</a></li>
					 
					 
				</ul>
			</nav>
		</aside> -->
		
		<section id= "about">
			<h1>Feedback Form</h1>
			<p>Your suggestions and ideas are important to us.Though we can't respond to everyone
			who submits feedback, we review many of the ideas people send us and use them to
			improve the best experience for everyone.<p>
			
			<form class ="form" method = "post" action = "pcontact.php" autocomplete = "on" required>
				<input type = "hidden" name = "recipient" value = "chris88chris88@hotmail.com">
				<input type = "hidden" name = "subject" value = "Feedback form">
				<input type = "hidden" name = "redirect" value = "main.php">
				
				<p><label>Name:</label>
					<input type = "text" name = "name" maxlength = "30"></p>
				
				<p><label>Comments: <br>
					<textarea name = "comments"
						rows = "4" cols = "36" placeholder = "Enter your comments here." name = "comment"></textarea>		
					</label></p>
					 
				<p><label>Email:</label>
					<input type = "email" placeholder = "name@domain.com" name ="email"></p>
				
				<p><label>Rate our site:
					<select name = "rating">
						<option selected>Amazing</option>
						<option>5</option>
						<option>4</option>
						<option>3</option>
						<option>2</option>
						<option>1</option>
						<option>Awful</option>
					</select>
					</label>
				</p>
				
				<p>
					<input type = "submit" value = "Submit"  name = "feedbackbtn"> 
					<input type = "reset" value = "Clear">
				</p>
			</form>
			 
			 
		</section>
		
		
		
		 
		
	</div><!--container end -->
	<div style="clear;both"></div>
	<footer>
		Copyright &copy; 2016, IWOMI TASKING
	</footer>
</body>
</html>
