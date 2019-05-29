<?php

class tradesman {

  private $id;
  private $name;
  private $email;
  private $username;
  private $password;

  public function __construct($name, $id ){
    $this->name = $name;
    $this->studentId = $id;
  }

  public function getName(){
    return $this->name;
  }

  public function getId(){
    return $this->studentId;
  }

  private function isValidEmail($email){
    return true;
  }
 

  public function changePassword($password){
    if (isStrongPassword($password)){
      $this->password = $password;
      return true;
    } else {
      return false;
    }
  }

  public function checkPassword($password){
    if ($this->password == $password) {
      return true;
    } else {
      return false;
    }
  }

}

?>