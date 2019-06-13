<?php
  session_start();
  include("server.php");
  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

?>

<!DOCTYPE html>
<html>
<!--This is the page where we will place the timetable
that customers can lookat-->
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css"><!--we will create a seperate style for the pages than we have for the forms-->
</head>
<body>
  <div class="header">
  	<h2>Home Page</h2>
    <p> <a href="jobform.php">Create Job</a> </p>
    <p> <a href="index.php?logout='1'">Logout</a> </p>
  </div>
  <div class="content">
    	<!-- notification message -->
    	<?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
        	<h3>
            <?php
            	echo $_SESSION['success'];
            	unset($_SESSION['success']);
            ?>
        	</h3>
        </div>
    	<?php endif ?>

      <!-- logged in user information -->

  </div>
  <div class="table">
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'safetrade');
    $result = mysqli_query($db,"SELECT * FROM jobs");

    echo "<table border='1'>
    <tr>
    <th>Job Name</th>
    <th>Description</th>
    <th>Start Date</th>
	<th>Details</th>
    <th></th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
      $location = $row['location'];
      $expectedcost = $row['expectedcost'];
      $enddate = $row['enddate'];
      $jobname = $row['jobname'];
      $description = $row['description'];
      $startdate = $row['startdate'];
    echo "<tr>";
    echo "<td>" . $row['jobname'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['startdate'] . "</td>";
    echo "<td><form id= \"jobDetail\" method=\"post\" action=\"index.php\">
    <input name= \"jobname\"type=\"hidden\" value=\"$jobname\">
    <input name= \"location\"type=\"hidden\" value=\"$location\">
    <input name= \"description\"type=\"hidden\" value=\"$description\">
    <input name= \"expectedcost\"type=\"hidden\" value=\"$expectedcost\">
    <input name= \"startdate\"type=\"hidden\" value=\"$startdate\">
    <input name= \"enddate\"type=\"hidden\" value=\"$enddate\">
    <input type=\"submit\" name=\"readmore\" value=\"Read More\">
    </form></td>
    </tr>";
    }

    echo "</table>";
    ?>
  </div>

</body>
</html>
