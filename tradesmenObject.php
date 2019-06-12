<?php
  class Tradesmen {
    private $tradesmenid;
    private $tradesmenName;
    private $username;
    private $password;
    private $email;

    public function __construct($tradesmenName, $username, $password, $email){
      $this->tradesmenName = $tradesmenName;
      $this->username = $username;
      $this->password = $password;
      $this->email = $email;
    }


    public function saveUser(){
      $db = mysqli_connect('localhost', 'root', '', 'safetrade');
      $query = "INSERT INTO tradesmen (tradesmenName, username, password, email) VALUES('$this->tradesmenName', '$this->username', '$this->password', '$this->email')";
    	mysqli_query($db, $query);
    }

    public function setValues($username){
      $db = mysqli_connect('localhost', 'root', '', 'safetrade');
      $query = "SELECT tradesmenid FROM tradesmen WHERE username == '$username'" ;
      $result = mysqli_query($db, $query);
      $this->tradesmenid = $result;
      $query = "SELECT tradesmenName FROM tradesmen WHERE username == '$username'" ;
      $result = mysqli_query($db, $query);
      $this->tradesmenName = $result;
      $query = "SELECT username FROM tradesmen WHERE username == '$username'" ;
      $result = mysqli_query($db, $query);
      $this->username = $result;
      $query = "SELECT password FROM tradesmen WHERE username == '$username'" ;
      $result = mysqli_query($db, $query);
      $this->password = $result;
      $query = "SELECT email FROM tradesmen WHERE username == '$username'" ;
      $result = mysqli_query($db, $query);
      $this->email = $result;
    }

    public function getID(){
      return $this->tradesmenid;
    }
    public function getName(){
      return $this->tradesmenName;
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
  }
  ?>
