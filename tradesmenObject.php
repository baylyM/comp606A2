<?php
  class Tradesmen {
    private $tradesmenid;
    private $tradesmenName;
    private $username;
    private $password;
    private $email;

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

    public function setValues($username){
      $query = "SELECT tradesmenid FROM tradesmen WHERE username == $username" ;
      $result = mysqli_query($db, $query);
      $this->tradesmenid = $result;
      $query = "SELECT tradesmenName FROM tradesmen WHERE username == $username" ;
      $result = mysqli_query($db, $query);
      $this->tradesmenName = $result;
      $query = "SELECT username FROM tradesmen WHERE username == $username" ;
      $result = mysqli_query($db, $query);
      $this->username = $result;
      $query = "SELECT password FROM tradesmen WHERE username == $username" ;
      $result = mysqli_query($db, $query);
      $this->password = $result;
      $query = "SELECT email FROM tradesmen WHERE username == $username" ;
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

    public function makeEstimate($tradesmenid, $jobid, $totalcost,$labourcost,$materialcost,$transportcost,$expireddate){
      Estimate $estimate = new Estimate($tradesmenid, $jobid, $totalcost,$labourcost,$materialcost,$transportcost,$expireddate)
    }
  ?>
