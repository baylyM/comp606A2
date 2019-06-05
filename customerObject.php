<?php
class Customer {
  private $customerid;
  private $customerName;
  private $username;
  private $password;
  private $email;

  public function __construct($customerName, $username, $password, $email){
    $this->customerName = $customerName;
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;

    $db = mysqli_connect('localhost', 'root', '', 'safetrade');
    $query = "INSERT INTO customers (customerName, username, password, email) VALUES('$customerName', '$username', '$password', '$email')";
  	mysqli_query($db, $query);
    $query = "SELECT customerid FROM customers WHERE customerName == $this->customerName" ;
    $result = mysqli_query($db, $query);
    $this->customerid = $result;

  }

  public function setValues($username){
    $query = "SELECT customerid FROM customers WHERE username == $username" ;
    $result = mysqli_query($db, $query);
    $this->customerid = $result;
    $query = "SELECT customerName FROM customers WHERE username == $username" ;
    $result = mysqli_query($db, $query);
    $this->customerName = $result;
    $query = "SELECT username FROM customers WHERE username == $username" ;
    $result = mysqli_query($db, $query);
    $this->username = $result;
    $query = "SELECT password FROM customers WHERE username == $username" ;
    $result = mysqli_query($db, $query);
    $this->password = $result;
    $query = "SELECT email FROM customers WHERE username == $username" ;
    $result = mysqli_query($db, $query);
    $this->email = $result;
  }

  public function getID(){
    return $this->customerid;
  }
  public function getName(){
    return $this->customerName;
  }
  public function getUserName(){
    return $this->username;
  }
  public function getPassword(){
    return $this->password;
  }
  public function getEmail(){
    return $this->email;
  }

  public function makeJob($customerid, $jobname, $location, $description, $expectedcost, $startdate, $enddate){
    Job ($job = new Job($customerid, $jobname, $location, $description, $expectedcost, $startdate, $enddate));
  }
}
?>
