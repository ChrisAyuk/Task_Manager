<?php
  include("connection.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/dashboard.css" type="text/css">
	<title>Task Calendar</title>
	<script> 

			function goLastMonth(month, year){
					if(month == 1){
						--year;
						month = 12;
					}
				--month
				var monthstring=""+month+"";
				var monthlength= monthstring.length;
				if(monthlength <=1){
					monthstring ="0" + monthstring;
				}
				document.location.href="<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;
				
			}
			
			
			function goNextMonth(month, year){
				    if(month == 12){
						++year;
						month = 0;
					}
					++month
				var monthstring=""+month+"";
				var monthlength= monthstring.length;
				if(monthlength <=1){
					monthstring ="0" + monthstring;
				}
				document.location.href="<?php $_SERVER['PHP_SELF'];?>?month="+monthstring+"&year="+year;	
			}
			
			
			
		</script>
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
						<li class ="signup"><a href = "logout.php"><button class = "button buttongreen">Sign out</button></a>
						</li>
					</ul>		
				</li>
				
			</ul>
	    </nav>
		  
		 <aside>
			<nav id="leftmenu">
				<a href = "userdashboard.php"><h3>Dashboard</h3></a>
				<ul>
					<li><a href="view.php">Manage Task</a></li>
					<li><a href="manageteams.php">Teams</a></li>	
				</ul>
			</nav>
		</aside>  
		
		<section>
			
			 <?php
		if(isset($_GET['day'])){
			$day = $_GET['day'];
		}
		
			else{
				$day = date("j");
				}
				
		if(isset($_GET['month'])){
			$month = $_GET['month'];
		}
			else{
				$month = date ("n");
			}
		
		if(isset($_GET['year'])){
			$year = $_GET['year'];
		}
			else{
				$year = date("Y");
			}

		//calendar variable
		$currentTimeStamp = strtotime ( "$year-$month-$day");
		$monthName = date("F",$currentTimeStamp);
		$numDays = date("t", $currentTimeStamp);
		$counter = 0;
		?>
	
	
	<body bgcolor="#D0D0D1">
	<link href="style.css" rel="stylesheet" type="text/css" />
	
	
	<header>
	 <h2>Task Calendar <mark>Click the date to insert task</mark></h2>
	 
	</header>

		 
		<table id = "calendar">
			<tr>
			
				
				<td><input type='button' value='<' name='previousbutton' onclick="goLastMonth(<?php echo $month.",".$year?>)"></td>
				
				<td><input type='button' value='>' name='nextbutton' onclick="goNextMonth(<?php echo $month.",".$year?>)"></td>
				
				<td colspan= '3'> <?php echo $monthName.",".$year; ?> </td>
				
				<td><input type='button' value='View Task' name='viewtask' onclick="window.location.href='view.php'"></td>
				
				<td><input type='button' value='Print Task' name='downloadtask' onclick="window.location.href='download.php'"></td>
				
				
			</tr>
		
			<tr>
				<td>Sunday</td>
				<td>Monday</td>
				<td>Tuesday</td>
				<td>Wednesday</td>
				<td>Thursday</td>
				<td>Friday</td>
				<td>Saturday</td>
			</tr>
			
		
			<?php
				echo "<tr>";
				
				 for($i= 1; $i<$numDays+1; $i++, $counter++){
					$timeStamp =strtotime("$year-$month-$i"); 
					if($i == 1){
						
						$firstDay = date("w", $timeStamp);
						
					for($j = 0; $j<$firstDay; $j++, $counter++){
						echo "<td>&nbsp;</td>";
						}	
					}
					if($counter %7 == 0){
						echo "</tr><tr>";
					}
						$monthstring = $month;
						$monthlength = strlen($monthstring);
						
						$daystring = $i;
						$daylength = strlen($daystring);
						if($monthlength <=1){
							$monthstring = "0".$monthstring;
						}
						if($daylength<=1){
							$daylength = "0".$daystring;
						}
				echo "<td><a href= 'eventadder.php'>".$i."</a></td>";
					
				
				 }
				
				echo "</tr>";
			
			?>
		</table>
			
			 
		</section>
	</div><!--container end -->
	<div style="clear;both"></div>
</body>
<!--<h1>Welcome  <?php echo $login_session; ?></h1>-->
</html>
