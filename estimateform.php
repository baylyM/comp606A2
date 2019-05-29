<?php
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <!--title of page-->
  <title>Estimate</title>
  <link rel="stylesheet" type="text/css" href="formstyle.css">
</head>
<body>
  <!--block at top of form-->
  <div class="header">
    <!--title of form-->
  	<h2>Create Estimate</h2>
  </div>
  <!--form-->
  <form method="post" action="estimateform.php">


    <!--input group used as class name as it is vauge
        enough to use for all instances and input was
        better used for input line itself-->

	<div class="input-group">
  		<label>Total Cost</label>
  		<input type="number" name="totalcost">
  	</div>
	<div class="input-group">
  		<label>Labour Cost</label>
  		<input type="number" name="laborcost">
  	</div>

	<div class="input-group">
  		<label>Material Cost</label>
  		<input type="number" name="materialcost">
  	</div>

	<div class="input-group">
  		<label>Transport Cost</label>
  		<input type="number" name="transportcost">
  	</div>

	<div class="input-group">
  		<label>Expired Date</label>
  		<input type="date" name="expireddate">
  	</div>

  	<div class="input-group">
      <!--Submits form values-->
  		<button type="submit" class="btn" name="create_estimate">Submit Estimate</button>

      <button type=submit  class="btn"><a href="index.php">Back to Home page</a></button>
  	</div>
  </form>
</body>
</html>
