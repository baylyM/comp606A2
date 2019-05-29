<?php
session_start();
include("customerObject.php");
include("tradesmenObject.php");
// initiates variables
$userid = "";
$name = "";
$username = "";
$password = "";
$email    = "";
$errors = array();

// connects to the database
$db = mysqli_connect('localhost', 'root', '', 'safetrade');

// this code is for handling the appointment form
if (isset($_POST['create_customer'])) {
  // receives all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // ensures form has been correctly filled
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // Checks if Username has allready been Taken
  $appointment_check_query = "SELECT * FROM customers WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $appointment_check_query);
  $namecheck = mysqli_fetch_assoc($result);

  if ($namecheck) { // if appointment exists
    if ($namecheck['timeslot'] === $username) {
      array_push($errors, "Username Allready Taken");
    }
  }

  // registers user if there are no errors
  if (count($errors) == 0) {
    $password = $password_1
  	Customer $username = new Customer($name, $username, $password, $email)
  }
}


if (isset($_POST['create_tradesmen'])) {
  // receives all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // ensures form has been correctly filled
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // Checks if Username has allready been Taken
  $appointment_check_query = "SELECT * FROM tradesmen WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $appointment_check_query);
  $namecheck = mysqli_fetch_assoc($result);

  if ($namecheck) { // if appointment exists
    if ($namecheck['timeslot'] === $username) {
      array_push($errors, "Username Allready Taken");
    }
  }

  // registers user if there are no errors
  if (count($errors) == 0) {
    $password = $password_1
  	Tradesmen $username = new Tradesmen($name, $username, $password, $email)
  }
}
// this code is for logging(loging?) in
if (isset($_POST['login_user'])) {
  // receives input values from form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $accountType = mysqli_real_escape_string($db, $_POST['accountType']);

// checks form has been filled out
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if(!isset($_POST['accountType']))
  {
    array_push($errors, "Account Type is required</li>");
  }

// checks database for corresponding user and password
  if (count($errors) == 0) {
    if($accountType = "Customer")
  	$query = "SELECT * FROM customers WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}elseif{
      if($accountType = "Tradesmen")
    	$query = "SELECT * FROM tradesmen WHERE username='$username' AND password='$password'";
    	$results = mysqli_query($db, $query);
    	if (mysqli_num_rows($results) == 1) {
    	  $_SESSION['username'] = $username;
    	  $_SESSION['success'] = "You are now logged in";
    	  header('location: index.php');
      }
      else{
        array_push($errors, "Wrong username/password combination");
      }
    }
  	}
  }
};



// this code is for handling the cancellation form
if (isset($_POST['cancel_appointment'])) {
  // receives all input values from the form



  $time = mysqli_real_escape_string($db, $_POST['time']);
  $username = mysqli_real_escape_string($db, $_POST['name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  // ensures form has been correctly filled
  if (empty($time)) { array_push($errors, "Time is required"); }
  if (empty($username)) { array_push($errors, "Name is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  // Checks if appointment exists
  if (count($errors) == 0) {
  	$password = md5($password);
    //retrieves current datetime
    $newdate = date('Y/m/d H:i:s');
    $date = date_create_from_format($format, $time);
    $date = $date->format('Y-m-d H:i:s');
    $query = "SELECT * FROM appointments WHERE timeslot= '$date' AND password= '$password'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) == 1) {
      //deletes appointment
      $diff = strtotime($date) - strtotime($newdate);
      $query = "DELETE * FROM appointments WHERE timeslot= '$date' AND password='$password'";
      mysqli_query($db, $query);

      if ($diff <= 86400){
        $_SESSION['success'] = "Your appointmennt is cancelled and you have been charged a small fee for late cancellation";
      }

  	  $_SESSION['success'] = "Appointment Cancelled";
  	  header('location: index.php');
  	}else {
      // if username or password is incorrect displays error
  		array_push($errors, "Wrong time/name/password combination");
    }
  }
}

?>
