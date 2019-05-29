<?php ?>
<!DOCTYPE html>
<html>
<head>
  <!--title of page-->
  <title>Job Description</title>
  <link rel="stylesheet" type="text/css" href="formstyle.css">
</head>
<body>
  <!--block at top of form-->
  <div class="header">
    <!--title of form-->
  	<h2>Job Description</h2>
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
      <!--Submits form values-->
  		<button type="submit" class="btn" name="login_user">Login</button>

      <button type=submit  class="btn"><a href="index.php">Back Home page</a></button>
  	</div>
  </form>
</body>
</html>