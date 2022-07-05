<?php
  include("connection.php");

  $con = mysqli_connect('localhost','root','');
   
  mysqli_select_db($con, 'task');
  $userid = $_SESSION['login_user']; //not sure whether this will work
  
  $sql = "SELECT * FROM team";
  $sql2 = mysqli_query($con, "SELECT * FROM team as t1 INNER JOIN supervisor as t2 ON t1.supervisor = t2.username WHERE username = '$userid'");

  $info = mysqli_query($con, $sql);

  $irow = mysqli_fetch_array($sql2);
  
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
					<a href="view.php"><li>Manage Task</li></a>
				</ul>
			</nav>
		</aside>

		<section>
			<table align=center>
				<tr align= 'center'>
					<thead>
						<th>Team</th>
						<th>Capacity</th>
						<th>Supervisor</th>
						<th>Option</th>
					</thead>
				</tr>
				<?php
				
					while($row= mysqli_fetch_array($info))
					{
					echo "<tr>";
					//echo "<td>".$row[php $userid]."</td>"; //not sure whether this will work
					echo "<td>".$row['teamName']."</td>";
					echo "<td>".$row['capacity']."</td>";
					echo "<td>".$row['supervisor']."</td>";
					echo "<td><a href=eventeditor.php class='button'>View</a></td>";
					echo "</tr>";
					}
				?>
			</table>
		</section>

		<div class="content">
			<div class="cards">
				<div class="card" id="card">
					<div class="box">
						<h3>Team:</h3>
						<h2><?php echo $irow['teamName'] ?></h2>
						<br>
						<h3>Capacity:</h3>
						<h2><?php echo $irow['capacity'] ?></h2>
						<br>
						<img src="pictures/user.png" alt="#" width="80px" height="80px">
						<h1><?php echo $userid ?></h1>
					</div>
					<div class="icon">
						<h1>Hi User</h1>
					</div>
				</div>				
			</div>
		</div>
		
		<div id="newtm">
			<p>New Team</p>
		</div>
		
	</div><!--container end -->
	<div style="clear;both"></div>
</body>
<!--<h1>Welcome  <?php echo $login_session; ?></h1>-->
</html>
