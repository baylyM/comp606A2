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

  public function changePassword($password){
    if (isStrongPassword($password)){
      $this->password = $password;
      return true;
    } else {
      return false;
    }
  }


  public function getName(){
      return $this->customerName;
  }

  public function getUsername(){
      return $this->username;
  }

  public function getPassword(){
      return $this->password;
  }
public function getEmail(){
      return $this->email;
  }
}

?>
