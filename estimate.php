<?php

class job {

  private $estimateidid;
  private $jobid;
   private $tradesmenid;
  private $totalcost;
  private $labourcost;
  private $materialcost;
  private $transportcost;
  private $expireddate;
  private $accepted;


  public function __construct($totalcost,$labourcost,$materialcost,$transportcost,$expireddate,$accepted){
    $this->totalcost = $totalcost;
    $this->labourcost= $labourcost;
	$this->materialcost= $materialcost;
    $this->transportcost= $transportcost;
    $this->expireddate= $expireddate;
	$this->accepted=accepted;
	
	
	$db = mysqli_connect('localhost', 'root', '', 'safetrade');
      $query = "INSERT INTO estimate (tradesmenid, jobid, totalcost, labourcost,materialcost,transportcost,expireddate,accepted) VALUES('$tradesmenid', '$jobid','$totalcost', '$labourcost','$materialcost','$transportcost','$expireddate','$accepted')";
    	mysqli_query($db, $query);
      $query = "SELECT estimateid FROM estimate WHERE tradesmenid == $this->tradesmenid" ;
      $result = mysqli_query($db, $query);
      $this->tradesmenid = $result;
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
