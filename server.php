<?php
include("customerObject.php");
include("tradesmenObject.php");
include("estimate.php");
include("job.php");
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
  $namecheck_query = "SELECT * FROM customers WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $namecheck_query);
  $namecheck = mysqli_fetch_assoc($result);

  if ($namecheck) { // if appointment exists
    if ($namecheck == $username) {
      array_push($errors, "Username Allready Taken");
    }
  }

  // registers user if there are no errors
  if (count($errors) == 0) {
    $password = $password_1;
  	$customer = new Customer($name, $username, $password, $email);
    $customer.saveUser();
    $customer.setValues($username);
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
  $namecheck_query = "SELECT * FROM tradesmen WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $namecheck_query);
  $namecheck = mysqli_fetch_assoc($result);

  if ($namecheck) { // if appointment exists
    if ($namecheck == $username) {
      array_push($errors, "Username Allready Taken");
    }
  }

  // registers user if there are no errors
  if (count($errors) == 0) {
    $password = $password_1;
    $tradesman = new Tradesmen($name, $username, $password, $email);
    $tradesman.saveUser();
    $tradesman.setValues($username);
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
      $customer.setValues($username);
  	  header('location: index.php');
  	}elseif($accountType = "Tradesmen"){;
    	$query = "SELECT * FROM tradesmen WHERE username='$username' AND password='$password'";
    	$results = mysqli_query($db, $query);
    	if (mysqli_num_rows($results) == 1) {
    	  $_SESSION['username'] = $username;
    	  $_SESSION['success'] = "You are now logged in";
        $tradesman.setValues($username);
    	  header('location: index.php');
      }
      else{
        array_push($errors, "Wrong username/password combination");
      }
    }
  	}
  }


if (isset($_POST['create_job'])) {
  $jobname = mysqli_real_escape_string($db, $_POST['jobname']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $expectecost = mysqli_real_escape_string($db, $_POST['username']);
  $startdate = mysqli_real_escape_string($db, $_POST['startdate']);
  $enddate = mysqli_real_escape_string($db, $_POST['enddate']);



  if (empty($jobname)) {array_push($errors, "Jobname is required");}
  if (empty($location)) {array_push($errors, "Location is required");}
  if (empty($description)) {array_push($errors, "Description is required");}
  if (empty($expectedcost)) {array_push($errors, "Expected Cost is required");}
  if (empty($startdate)) {array_push($errors, "Start Date is required");}
  if (empty($enddate)) {array_push($errors, "End Date is required");}


  $namecheck_query = "SELECT * FROM jobs WHERE jobname='$jobname' LIMIT 1";
  $result = mysqli_query($db, $namecheck_query);
  $namecheck = mysqli_fetch_assoc($result);

  if ($namecheck) { // if appointment exists
    if ($namecheck == $jobname) {
      array_push($errors, "Jobname Allready Taken");
    }
  }

  if (count($errors) == 0) {
    $customerid = $customer.getID();
    $job = new Job($customerid, $jobname, $location, $description, $expectecost, $startdate, $enddate);
    $job.saveJob();
    $job.setValues($username);
  }

}

if (isset($_POST['create_estimate'])) {
	 $totalcost = mysqli_real_escape_string($db, $_POST['totalcost']);
  $labourcost = mysqli_real_escape_string($db, $_POST['labourcost']);
  $materialcost = mysqli_real_escape_string($db, $_POST['materialcost']);
  $transportcost = mysqli_real_escape_string($db, $_POST['transportcost']);
  $expireddate = mysqli_real_escape_string($db, $_POST['expireddate']);

  if (empty($totalcost)) { array_push($errors, "Total cost is required"); }
  if (empty($labourcost)) { array_push($errors, "labourcost is required"); }
  if (empty($materialcost)) { array_push($errors, "Material cost is required"); }
  if (empty($transportcost)) { array_push($errors, "Transport cost is required"); }
  if (empty($expireddate)) { array_push($errors, "Expired Date is required"); }

  if (count($errors) == 0) {
    $tradesmenid = $tradesman.getID();
    $jobid = $job.getID();
    $estimate = new Estimate($tradesmenid, $jobid, $totalcost, $labourcost, $materialcost, $transportcost,$expireddate);
    $estimate.saveEstimate();
    $estimate.setValues($tradesmenid, $jobid);
  }


}

?>
