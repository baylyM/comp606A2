<?php
  class Tradesmen {

    private $tradesmenName;
    private $username;
    private $password;
    private $email;

    public function __construct($tradesmenName, $username, $password, $email){
      $this->tradesmenName = $customerName;
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
      return $this->tradesmenName;
  }

  public function getUsername(){
      return $this->username;
  }

  public function getPassword(){
      return $this->password;
  }

  }
  ?>
