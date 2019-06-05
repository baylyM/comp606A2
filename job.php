<?php

class Job {

  private $jobid;
  private $customerid;
  private $jobName;
  private $location;
  private $description;
  private $expectedcost;
  private $startdate;
  private $enddate;
  private $tradesmenid;
  private $accepted;

  public function __construct($customerid, $jobName,$location,$description,$expextedcost,$startdate,$enddate ){
    $this->customerid = $customerid;
    $this->jobname = $jobname;
    $this->location= $location;
	 $this->description= $description;
    $this->expectedcost= $expectedcost;
	$this->startdate= $startdate;
    $this->enddate= $enddate;

  $db = mysqli_connect('localhost', 'root', '', 'safetrade');
  $query = "INSERT INTO jobs (customerid, jobName, location, description, expectedcost, startdate, enddate) VALUES($customerid, $jobName, $location, $description, $expectedcost, $startdate, $enddate)";
  mysqli_query($db, $query);
  $query = "SELECT jobid FROM jobs WHERE jobName == $this->jobName" ;
  $result = mysqli_query($db, $query);
  $this->jobid = $result;

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
