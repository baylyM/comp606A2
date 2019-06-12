<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <!--title of page-->
  <title>Create Job</title>
  <link rel="stylesheet" type="text/css" href="formstyle.css">
</head>
<body>
  <!--block at top of form-->
  <div class="header">
    <!--title of form-->
  	<h2>Create Job</h2>
  </div>
  <!--form-->
  <form method="post" action="jobform.php">


    <!--input group used as class name as it is vauge
        enough to use for all instances and input was
        better used for input line itself-->
  	<div class="input-group">
  		<label>Job Name</label>
  		<input type="text" name="jobname" >
  	</div>
  	<div class="input-group">
  		<label>Location</label>
  		<input type="text" name="location">
  	</div>
	<div class="input-group">
  		<label>Description</label>
  		<input type="text" name="description">
  	</div>
	<div class="input-group">
  		<label>Expected Cost</label>
  		<input type="number" name="expectedcost">
  	</div>
	<div class="input-group">
  		<label>Start Date</label>
  		<input type="date" name="startdate">
  	</div>
	<div class="input-group">
  		<label>End Date</label>
  		<input type="date" name="enddate">
  	</div>

  	<div class="input-group">
      <button type="submit" class="btn" name="create_job">Submit Job</button>
  	</div>
    <p>
      <!--changes to Sign In page-->
      <a href="index.php">Home Page</a>
    </p>
  </form>
</body>
</html>
