<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <!--title of page-->
  <title>Create Customer Account</title>
  <!--tells page to link to style.css for formating-->
  <link rel="stylesheet" type="text/css" href="formstyle.css">
</head>
<body>
  <div class="header">
    <!--title of form-->
  	<h2>Create Login</h2>
  </div>
  <!--form-->
  <form method="post" action="booking.php">
    <!--tells form to include errors.php
        which is empty and invisible until
        form is unsuccessfully submitted-->
  	<?php include('errors.php'); ?>
    <!--input group used as class name as it is vauge
        enough to use for all instances and input was
        better used for input line itself-->
    <div class="input-group">
      	<label>Name</label>
      	<input type="text" name="tradesmenname">
    </div>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="name" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
      <!--Submits form values-->
  	  <button type="submit" class="btn" name="reg_appointment">Make Appointment</button>
  	</div>
  	<p>
      <!--changes to Sign In page-->
  		Want to cancel an Appointment? <a href="cancelbooking.php">Cancel Here</a>
  	</p>
    <p>
      <!--changes to Sign In page-->
      <a href="index.php">Home Page</a>
    </p>
  </form>
</body>
