<?php

class job {

  private $jobid;
  private $customerid;
  private $jobname;
  private $location;
  private $description;
  private $expectedcost;
  private $startdate;
  private $enddate;
  private $tradesmanid;
  private $accepted;

  public function __construct($jobname,$location,$description,$expextedcost,$startdate,$enddate,$accepted ){
    $this->jobname = $jobname;
    $this->location= $location;
	 $this->description= $description;
    $this->expectedcost= $expectedcost;
	$this->startdate= $startdate;
    $this->enddate= $enddate;
	$this->accepted= $accepted;
	
  }

  public function getJobName(){
    return $this->jobname;
  }

  public function getLocation(){
    return $this->location;
  }
   public function getDescription(){
    return $this->description;
  }

  public function getStartDate(){
    return $this->startdate;
  }
    public function getEndDate(){
    return $this->enddate;
  }
 public function getAccepted(){
    return $this->accepted;
  }
	public function closeJob()
	{
		
	}
	public function chooseWorker()
	{
		
	}
	
	public function sendMessage()
	{
		
	}
	
	
 

}

?>
