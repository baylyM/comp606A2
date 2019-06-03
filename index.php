<?php
  session_start();
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
    <p> <a href="index.php?logout='1'">Logout</a> </p>
    <a href="booking.php">All Jobs</a>
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
    $db = mysqli_connect('localhost', 'root', '', 'db_booking');
    $result = mysqli_query($db,"SELECT timeslot, therapistname
      FROM timeslots, therapists
      WHERE timeslots.therapistid = therapists.therapistid");

    echo "<table border='1'>
    <tr>
    <th>Time</th>
    <th>Therapist</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['timeslot'] . "</td>";
    echo "<td>" . $row['therapistname'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    ?>
  </div>

</body>
</html>
