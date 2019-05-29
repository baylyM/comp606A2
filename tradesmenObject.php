<?php
  class Tradesmen {
    private $tradesmenid;
    private $tradesmenName;
    private $username;
    private $password;
    private $menemail;

    public function __construct($tradesmenName, $username, $password, $email){
      $this->tradesmenName = $customerName;
      $this->username = $username;
      $this->password = $password;
      $this->email = $email;


      $db = mysqli_connect('localhost', 'root', '', 'safetrade');
      $query = "INSERT INTO tradesmen (tradesmenName, username, password, email) VALUES('$tradesmenName', '$username', '$password', '$email')";
    	mysqli_query($db, $query);
      $query = "SELECT tradesmenid FROM tradesmen WHERE tradesmenName == $this->tradesmenName" ;
      $result = mysqli_query($db, $query);
      $this->tradesmenid = $result;
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
