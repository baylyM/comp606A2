<?php
  session_start();
  $jobname = $_SESSION['jobname'];
  $job = $_SESSION['job'];
  $accounttype = $_SESSION['accountype'];
  $username = $_SESSION['username'];
  $job = $job.setValues($jobname);
  $jobid = $job.getID();
  $location = $job.getLocation();
  $description = $job.getDescription();
  $expectedcost = $job.getExpectedCost();
  $startdate = $job.getStartDate();
  $enddate = $job.getEndDate();
  $customerid = $job.getCustID();
?>

<!DOCTYPE html>
<html>
<!--This is the page where we will place the timetable
that customers can lookat-->
<head>
	<title><?php echo $jobname?>></title>
	<link rel="stylesheet" type="text/css" href="style.css"><!--we will create a seperate style for the pages than we have for the forms-->
</head>
<body>
  <div class="header">
  	<h1>
    <span><a href="index.php">Home</a></span></h1>
    <p> <a href="estimateform.php">Create Estimate</a> </p>
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
  </div>
  <div>
    <h1 class="sectiontitle">LOCATION</h1>
    <h2><?php echo $location?></h2>
  </div>
  <div>
    <h1 class="sectiontitle">DESCRIPTION</h1>
    <h2><?php echo $description?></h2>
  </div>
  <div>
    <h1 class="sectiontitle">EXPECTED COST</h1>
    <h2><?php echo $expectedcost?></h2>
  </div>
  <div>
    <h1 class="sectiontitle">START DATE</h1>
    <h2><?php echo $startdate?></h2>
  </div>
  <div>
    <h1 class="sectiontitle">END DATE</h1>
    <h2><?php echo $enddate?></h2>
  </div>

      <div class="table">
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'safetrade');
        $result = mysqli_query($db,"SELECT tradesmenid, jobid, totalcost, expireddate FROM estimates WHERE jobid = '$jobid'");

        echo "<table border='1'>
        <tr>
        <th>Total Cost</th>
        <th>Estimate Valid Till</th>
        <th>Accept?</th>
        <th></th>
        </tr>";

        while($row = mysqli_fetch_array($result))
        {
          $tradesmenid = $row['tradesmenid'];
          $jobid = $row['jobid'];
        echo "<tr>";
        echo "<td>" . $row['jobname'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['startdate'] . "</td>";
        echo "<td><form id= \"$jobDetail\" method=\"post\" action=\"index.php\">
        <input name= \"tradesmenid\"type=\"hidden\" value=\"$tradesmenid\">
        <input name=\"jobid\" type=\"hidden\" value=\"$jobid\">
        <input name=\"acceptJob\" type=\"submit\" value=\"jobInfo.php\">
        </form></td>
        </tr>";
        }

        echo "</table>";
        ?>
      </div>
      <?php
    }

  }



  ?>



</body>
</html>
