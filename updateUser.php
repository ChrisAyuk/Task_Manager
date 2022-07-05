<?php
  include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
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
			<h3>Dashboard</h3>
				<ul>
					<li><a href="manageUser.php">Manage User</a></li>
					<a href="manageteams.php"><li>Teams</li></a>
					<a href="view.php"><li>Manage task</li></a>
				</ul>
			</nav>
		</aside>  
		
		<section>
			<h2>Update User</h2>
			
			<?php 
				 
				$id = $_GET['id'];
				$row = mysqli_query($con, "SELECT * FROM intern where intern_id = '$id'");
				$st_row =mysqli_fetch_array($row);

				$tid=$_SESSION['login_user'];
				$trow = mysqli_query($con, "SELECT * from team where supervisor='$tid'");
			?>
			
			<form method = "post" action = "pupdateUser.php">
				 <input type = "hidden" name = "id" value = "<?php echo $st_row['intern_id'] ?>" readonly> 
				
				
				<p>
					<label>User name:
						<input type = "text" name = "username" value = "<?php echo $st_row['username'] ?>" required/></label>
				</p>
				<p>
					<label>User Email:
						<input type = "email" name = "userEmail"  value ="<?php echo $st_row['int_email'] ?>" required/></label>
				</p>
				<p>
					<label>User Password:
						<input type = "password" name = "userPass"  value ="<?php echo $st_row['int_pass'] ?>" required/></label>
				</p>

				<p>
					<label>Team:
						<select name="team" >
							<?php 
								while($t_row =mysqli_fetch_array($trow)){
									echo"<option value=",$t_row['team_id'],">",$t_row['teamName'],"</option>";
								}
							?>
						</select>
						<!-- <input type = "text" name = "team"  value ="" readonly required/></label> -->
				</p>
				
				</p>
				<p>
					<input type = "submit" value = "Update User" name = "btnupdateUser" class="append"/>
					<input type = "reset" value = "Clear" class="delete"/>
				
				</p>
			
			</form>	
		</section>
	</div><!--container end -->
	<div style="clear;both"></div>
	
</body>

</html>