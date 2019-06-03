<?php

class Estimate {

  private $estimateid;
  private $tradesmenid;
  private $jobid;
  private $totalcost;
  private $labourcost;
  private $materialcost;
  private $transportcost;
  private $expireddate;
  private $accepted;


  public function __construct($tradesmenid, $jobid, $totalcost,$labourcost,$materialcost,$transportcost,$expireddate){
    $this->totalcost = $totalcost;
    $this->labourcost= $labourcost;
	$this->materialcost= $materialcost;
    $this->transportcost= $transportcost;
    $this->expireddate= $expireddate;
	$this->accepted=accepted;


	$db = mysqli_connect('localhost', 'root', '', 'safetrade');
      $query = "INSERT INTO estimates (tradesmenid, jobid, totalcost, labourcost, materialcost, transportcost, expireddate) VALUES('$tradesmenid', '$jobid','$totalcost', '$labourcost','$materialcost','$transportcost','$expireddate')";
    	mysqli_query($db, $query);
      $query = "SELECT estimateid FROM estimates WHERE tradesmenid == $this->tradesmenid AND jobid == $this->jobid" ;
      $result = mysqli_query($db, $query);
      $this->etimateid = $result;
  }

  public function getTotalCost(){
    return $this->totalcost;
  }

  public function getLabourCost(){
    return $this->labourcost;
  }
   public function getMaterialCost(){
    return $this->materialcost;
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
