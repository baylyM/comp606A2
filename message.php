<?php

class message {

  private $messageid;
  private $username;
   private $jobid;
  private $tradesmenid;
  private $customerid;
  private $message;
  private $accepted;
  


  public function __construct($username,$message,$accepted){
    $this->usename = $username;
    $this->message= $message;
	 $this->accepted= $accepted;
   
   
   $db = mysqli_connect('localhost', 'root', '', 'safetrade');
      $query = "INSERT INTO message (username,jobid, trademenid,customerid,message,accepted) VALUES('$username', '$jobid', '$tradesmenid', '$customerid','$message','$accepted')";
    	mysqli_query($db, $query);
      $query = "SELECT messageid FROM message WHERE message == $this->message" ;
      $result = mysqli_query($db, $query);
      $this->messageid = $result;
  }

  public function getUserName(){
    return $this->username;
  }

  public function getMessage(){
    return $this->message;
  }
   public function getAccepted(){
    return $this->accepted;
  }

  public function getTransportCost(){
    return $this->transportcost;
  }
    public function getExpiredDate(){
    return $this->expireddate;
  }

	public function closeEstimate()
	{
		
	}

	public function sendMessage()
	{
		
	}
	
 

}

?>
