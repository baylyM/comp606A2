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
