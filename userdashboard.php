<?php
  include("connection.php");

  	//$con = mysqli_connect('localhost','root','');   
	//mysqli_select_db($con, 'task');
	$userid = $_SESSION['login_id']; //not sure whether this will work

	$sql = "SELECT * FROM eventdata";
	$info = mysqli_query($con, $sql);

	//print_r($info);

	//$taskx = "SELECT * FROM assign WHERE int_id = '$userid'";
	$assign = mysqli_query($con, "SELECT *  FROM assign WHERE int_id = '$userid'");
	$as_row = mysqli_fetch_array($assign);
	$as =  $as_row['team_id'];
	$tname = "SELECT teamName FROM team WHERE team_id = '".$as_row['team_id']."'";
	$team = mysqli_query($con, $tname);
	$t_row = mysqli_fetch_array($team);

	$num = mysqli_query($con, "SELECT COUNT(status) AS total FROM eventdata WHERE status = 'DONE'");
	$numrow = mysqli_fetch_array($num);

	$sup = mysqli_query($con, "SELECT username
				FROM supervisor as T1
				INNER JOIN supervision as T2
				ON T1.sup_id = T2.super_id
				WHERE T2.intern_id = $userid;");
	$suprow = mysqli_fetch_array($sup);
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/userdashboard.css" type="text/css">
	<title>User Home</title>
</head>
 <body >
      
	<div id="container">
	  
		<nav id="menu">
			<ul>
				<li class="menuitem"><a href = "index.php"><h1><img src = "pictures/iwomi-smaller.png"></li>
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
		
		<section >
			<h1>
			
			<img src = "pictures/user.png" alt = "pictures/user.png" width ="45px" height = "45px">
				
			<?php 
			echo"".$_SESSION['login_user']."";
			?>
			</h1>	
			 
		</section>
		
		<div class="content">
			<div class="cards">
				<div class="card">
					<div class="box">
						<h1><?php echo $t_row['teamName'] ?></h1>
						<h3>Team</h3>
					</div>
					<div class="icon">
						<img src="pictures/team.png" alt="#" width="70px" height="70px">
					</div>
				</div>
				<div class="card">
					<div class="box">
						<h1><?php echo $numrow['total'] ?></h1>
						<h3>Task Completed</h3>
					</div>
					<div class="icon">
						<img src="pictures/clip.png" alt="#" width="70px" height="70px">
					</div>
				</div>
				<div class="card">
					<div class="box">
						<h1><?php echo $suprow['username'] ?></h1>
						<h3>Supervisor</h3>
					</div>
					<div class="icon">
						<img src="pictures/supervise.png" alt="#" width="70px" height="70px">
					</div>
				</div>
			</div>
			<div class="content-2">
				<div class="table1">
					<div class="tblhd">
						<h2>Tasks</h2>
						<a href="#" class="button">View All</a>
					</div>
					<table>
						<tr>
							<th>Task</th>
							<th>Date Added</th>
							<th>Due Date</th>
							<th>Details</th>
							<th>State</th>
							<th>Action</th>
						</tr>
						<tr>
							<td>Basic Java</td>
							<td>07-06-2022</td>
							<td>15-06-2022</td>
							<td>Learn basuc java in just a week!</td>
							<td>NOT DONE</td>
							<td><a href="#" class="button">Edit</a></td>
						</tr>
						<?php 
							while($row= mysqli_fetch_array($info))
							{
	  							echo "<tr>";
	  							//echo "<td>".$row[php $userid]."</td>"; //not sure whether this will work
	   							//echo "<td>".$row['TaskID']."</td>";
	   							echo "<td>".$row['Task']."</td>";
	   							echo "<td>".$row['DateAdded']."</td>";
	  							echo "<td>".$row['due_date']."</td>";
	  							echo "<td>".$row['Details']."</td>";
	   							echo "<td id='state'>".$row['status']."</td>";
	   							echo "<td><a href=eventeditor.php?id=".$row['TaskID']." class='button'>Edit</a></td>";
	   							echo "</tr>";
							}
						?>
					</table>
				</div>
			</div>
		</div>

	</div>  <!--container end -->
	<div style="clear;both"></div>
</body>
<!--<h1>Welcome  <?php echo $login_session; ?></h1>-->
</html>
