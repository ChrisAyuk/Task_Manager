<?php
  include("connection.php");

   
  $name = $_SESSION['login_user'];
  $id = $_SESSION['login_id'];
  $teams="SELECT * FROM team as t1 inner join supervisor as t2 on t1.supervisor=t2.username where supervisor= '$name'";
  $intern="SELECT * FROM intern as t1 inner join supervision as t2 on t1.intern_id=t2.intern_id where t2.super_id= '$id'";
  
  $irow = mysqli_query($con, $intern);if (!$irow) {
	 printf("Error: %s\n", mysqli_error($con));
	 exit();
 };
  $trow = mysqli_query($con, $teams);if (!$trow) {
	 printf("Error: %s\n", mysqli_error($con));
	 exit();
 };

  //$st_row =mysqli_fetch_array($trow);
  //$si_row =mysqli_fetch_array($irow);

  //printf("Array: %s\n", $trow);
   

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="css/dashboard.css" type="text/css">
	<title>User Home</title>
</head>
 <body>
      
	<div id="container">
	  
		<nav id="menu">
			<ul>
				<li class="menuitem"><a href="index.php"><img src = "pictures/iwomi-smaller.png" ></a></li>
				<li class="menuitem"><a href="about.php">About Us</a></li>
				<li class="menuitem"><a href="contact.php">Contact Us</a></li>
				<li class ="signup"><a href = "logout.php"><button class = "button buttongreen">Sign out</button></a>
		
				</li>
				
			</ul>
	    </nav>
		  
		 <aside>
			<nav id="leftmenu">
				<a href = "dashboard.php"><h3>Dashboard</h3></a>
				<ul>
					<li><a href="manageUser.php">Manage Interns</a></li>
					<li><a href="manageteams.php">Teams</a></li>
					<li><a href="view.php">Manage Task</a></li>					
				</ul>
			</nav>
		</aside>  
		
		<section>
			
			
<form name = 'eventadder' method ='POST' action ="insert.php">

	<header>
	 <h2>Create Task</h2>
	</header>
	
	   <table width = '100%'>
	   
	    <tr>
		 <td width= '200px'>Task</td>
		 <td width= '300px'><input type='text' name='task' maxlength='55' id='name' required></td>
		</tr>
		
		<tr>
		 <td width= '200px'>Assign to</td>
		 <td width= '300px'><input type='radio' value='team' onchange='swap(this.value)' name='choice' selected><b>Team</b>
							<input type='radio' value='intern' onchange='swap(this.value)' name='choice'><b>Intern</b>
							<select id="team" hidden='hidden' name ='team' >
								<option selected value=''>Select an team</option>
								<?php
								while($st_row =mysqli_fetch_array($trow)){

									echo "<option value='",$st_row['team_id'],"'>",$st_row['teamName'],"</option>";
								}
								?>
							</select>
							<select id="intern" hidden='hidden' name="intern" >
								<option selected value=''>Select an intern</option>
								<?php
								while($si_row =mysqli_fetch_array($irow)){
									echo "<option value='",$si_row['intern_id'],"'>",$si_row['username'],"</option>";
								}
								?>
							</select>
			</td>
		</tr>

		<tr>
		 <td width= '200px'>Date Added</td>
		 <td width= '300px'><input type='date' value="<?php echo date('Y-m-d'); ?>" name='dateadded' readonly>
		</tr>
		
		<tr>
		<td width ='200px'>Due Date</td>
		<td width ='300px'><input type ='datetime-local' onload= "getDate" name='duedate' required>
			
		</tr>
		
		
		<tr>
		 <td width= '200px'>Details</td>
		 <td width='700px'><textarea name='details'></textarea></td>
		</tr>
		
		
		<tr>
		 <td><input type = 'submit' value='Submit' class='append' /></td> 
		 <td><input type = 'reset'  value='Clear' class='delete'/></td>
		 <td><input type = 'button'  value='Back'  onclick=history.back();return true;  color='red'/></td>
		</tr>
		
		
		
		</table>
		
		<script>
			function swap(event) {

				let team = document.getElementById("team");
				let intern = document.getElementById("intern");
				
				if (event== "intern") {
					intern.removeAttribute("hidden");
					team.setAttribute("hidden", "hidden");
				} 
				else if (event== "team"){
					team.removeAttribute("hidden");
					intern.setAttribute("hidden", "hidden");
				}
			}
			
		</script>
			
</form>
			 
		</section>
	</div><!--container end -->
	<div style="clear;both"></div>

</body>
<!--<h1>Welcome  <?php echo $login_session; ?></h1>-->
</html>
