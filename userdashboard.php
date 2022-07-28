<?php
  include("connection.php");

  	//$con = mysqli_connect('localhost','root','');   
	//mysqli_select_db($con, 'task');
	$userid = $_SESSION['login_id']; //not sure whether this will work

	//print_r($info);

	//$taskx = "SELECT * FROM assign WHERE int_id = '$userid'";
	$tname = "SELECT * FROM team as t1 inner join grouping as t2 on t1.team_id=t2.team_id WHERE t2.intern_id = '$userid'";
	$team = mysqli_query($con, $tname);
	$t_row = mysqli_fetch_array($team);

	$aque = "SELECT *  FROM assign WHERE team_id = '".$t_row['team_id']."' ";
	$assign = mysqli_query($con, $aque);
	$as_row = mysqli_fetch_array($assign) or die(mysqli_error($con));
	$as =  $as_row['team_id'];

	$sql = "SELECT * FROM eventdata as t1 inner join assign as t2 on t1.TaskID=t2.task_id where t2.team_id= '".$t_row['team_id']."' ";
	$info = mysqli_query($con, $sql)or die(mysqli_error($con));
	$find = array(array());	
		
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
						<!-- <a href="#" class="button">View All</a> -->
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
						<?php 
							$i = 0;
							while($row= mysqli_fetch_array($info))
							{						
								if($row['status']=="NOT DONE"){$class = "undone";}else{$class="done";}																		
	  							echo "<tr class=".$class.">";
	   							//echo "<td>".$row['TaskID']."</td>";
	   							echo "<td>".$row['Task']."</td>"; $find[$i][0] = $row['Task'];
	   							echo "<td>".$row['DateAdded']."</td>";	$find[$i][1] = $row['DateAdded'];
	  							echo "<td>".$row['due_date']."</td>";	$find[$i][2] = $row['due_date']; 
	  							echo "<td>".$row['Details']."</td>";	$find[$i][3] = $row['Details'];
	   							echo "<td >".$row['status']."</td>";	$find[$i][4] = $row['status'];
	   							echo "<td><div id=".$i." class='button' onclick='appear(this)'>View</div></td>";
	   							echo "</tr>"; 
								//echo "<script>alert(".count($row).");</script>";
								$i++;
							}
							
						?>
					</table>
				</div>
			</div>
		</div>

		<div id="fltab" > 
			<form method="POST">
				<h1>Create a Team</h1>
				<br>
				
				<p>
					<h2>Task:	</h2> <input type="text" name="tname" value="<?php echo $find[0][0] ?>" readonly/>
				</p>
				<p>
					<h2>Date Added:	</h2> <input type="date" name="adate" value="<?php echo $find[0][1] ?>" readonly/>
				</p>
				<p>
					<h2>Due Date:	</h2> <input type="datetime-local" name="fdate" value="<?php echo $find[0][2] ?>" readonly>
				</p>
				<p>
					<h2>Details:	</h2> <textarea name="details" maxlength="20" readonly><?php echo $find[0][3] ?></textarea>
				</p>
			</form>
			<br>
				<input type="button" value="Mark Done!" onclick="disappear(this)"/>
		</div>
		<script>
			function appear(ev){
				let box = document.getElementById("fltab");
				if(ev){
					//box.removeAttribute("hidden");
					box.style.transition = "all 5s"
					box.style.display= "initial";
					//alert("Button has been pressed!");
				}
			}
			function disappear(ev){
				let box = document.getElementById("fltab");
				if(ev){
					box.style.display = "none"
				}
			}
		</script>

	</div>  <!--container end -->
	<div style="clear;both"></div>
</body>
<!--<h1>Welcome  <?php echo $login_session; ?></h1>-->
</html>