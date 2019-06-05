<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <!--title of page-->
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="formstyle.css">
</head>
<body>
  <!--block at top of form-->
  <div class="header">
    <!--title of form-->
  	<h2>Login</h2>
  </div>
  <!--form-->
  <form method="post" action="login.php">
    <!--tells form to include errors.php
        which is empty and invisible until
        form is unsuccessfully submitted-->
  	<?php include('errors.php'); ?>
    <!--input group used as class name as it is vauge
        enough to use for all instances and input was
        better used for input line itself-->
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
    <div class="input-group"
    <label>Account Type?</label>
    <select name="accountType">
      <option value="">Select...</option>
      <option value="Customer">Customer</option>
      <option value="Tradesmen">Tradesmen</option>
    </select>
  </div>

  	<div class="input-group">
      <!--Submits form values-->
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
    <p>
      <!--changes to Sign In page-->
  		<a href="customerForm.php">Create Customer Account </a>  <a href="tradesmenForm.php">Create Tradesmen Account </a>
  	</p>
  </form>
</body>
</html>
