<?php

class job {

  private $estimateidid;
  private $jobid;
   private $tradesmanid;
  private $totalcost;
  private $labourcost;
  private $materialcost;
  private $transportcost;
  private $expireddate;


  public function __construct($totalcost,$labourcost,$materialcost,$transportcost,$expireddate){
    $this->jobname = $totalcost;
    $this->location= $labourcost;
	 $this->description= $materialcost;
    $this->expectedcost= $transportcost;
    $this->expireddate= $expireddate;
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
