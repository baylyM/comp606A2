<?php
class Customer {

  private $customerName;
  private $username;
  private $password;
  private $email;

  public function __construct($customerName, $username, $password, $email){
    $this->customerName = $customerName;
    $this->username = $username;
    $this->password = $password;
    $this->email = $email;
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

}
?>
