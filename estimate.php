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
  }

   public function __destruct(){
   }

  public function saveEstimate(){
    $db = mysqli_connect('localhost', 'root', '', 'safetrade');
    $query = "INSERT INTO estimates (tradesmenid, jobid, totalcost, labourcost, materialcost, transportcost, expireddate) VALUES('$tradesmenid', '$jobid','$totalcost', '$labourcost','$materialcost','$transportcost','$expireddate')";
    mysqli_query($db, $query);
  }

  public function setValues($tradesmenid, $jobid){
    $query = "SELECT estimateid FROM estimates WHERE tradesmenid == $tradesmenid AND jobid == $jobid" ;
    $result = mysqli_query($db, $query);
    $this->estimateid = $result;
    $query = "SELECT tradesmenid FROM estimates WHERE tradesmenid == $tradesmenid AND jobid == $jobid" ;
    $result = mysqli_query($db, $query);
    $this->tradesmenid = $result;
    $query = "SELECT jobid FROM estimates WHERE tradesmenid == $tradesmenid AND jobid == $jobid" ;
    $result = mysqli_query($db, $query);
    $this->jobid = $result;
    $query = "SELECT totalcost FROM estimates WHERE tradesmenid == $tradesmenid AND jobid == $jobid" ;
    $result = mysqli_query($db, $query);
    $this->totalcost = $result;
    $query = "SELECT labourcost FROM estimates WHERE tradesmenid == $tradesmenid AND jobid == $jobid" ;
    $result = mysqli_query($db, $query);
    $this->labourcost = $result;
    $query = "SELECT materialcost FROM estimates WHERE tradesmenid == $tradesmenid AND jobid == $jobid" ;
    $result = mysqli_query($db, $query);
    $this->materialcost = $result;
    $query = "SELECT transportcost FROM estimates WHERE tradesmenid == $tradesmenid AND jobid == $jobid" ;
    $result = mysqli_query($db, $query);
    $this->transportcost = $result;
    $query = "SELECT expireddate FROM estimates WHERE tradesmenid == $tradesmenid AND jobid == $jobid" ;
    $result = mysqli_query($db, $query);
    $this->expireddate = $result;
    $query = "SELECT accepted FROM estimates WHERE tradesmenid == $tradesmenid AND jobid == $jobid" ;
    $result = mysqli_query($db, $query);
    $this->accepted = $result;
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

  public function accepted(){
    $query = "UPDATE estimates SET accepted = 'true' WHERE estimateid = '$this->estimateid'";
    mysqli_query($db, $query);
  }

	public function closeEstimate()
	{

	}

	public function sendMessage()
	{

	}



}

?>
