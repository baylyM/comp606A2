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

  public function __construct($customerid, $jobName,$location,$description,$expectedcost,$startdate,$enddate ){
    $this->customerid = $customerid;
    $this->jobName = $jobName;
    $this->location= $location;
    $this->description= $description;
    $this->expectedcost= $expectedcost;
    $this->startdate= $startdate;
    $this->enddate= $enddate;
  }
   public function __destruct(){
   }
  public function saveJob(){
    $db = mysqli_connect('localhost', 'root', '', 'safetrade');
    $query = "INSERT INTO jobs (customerid, jobName, location, description, expectedcost, startdate, enddate) VALUES('$this->customerid', '$this->jobName', '$this->location', '$this->description', '$this->expectedcost', '$this->startdate', '$this->enddate')";
    mysqli_query($db, $query);
  }

  public function setValues($jobname){
    $db = mysqli_connect('localhost', 'root', '', 'safetrade');
    $query = "SELECT jobid FROM jobs WHERE jobname = '$jobname'";
    $result = mysqli_query($db, $query);
    $this->jobid = $result;
    $query = "SELECT customerid FROM jobs WHERE jobname = '$jobname'" ;
    $result = mysqli_query($db, $query);
    $this->customerid = $result;
    $query = "SELECT jobname FROM jobs WHERE jobname = '$jobname'" ;
    $result = mysqli_query($db, $query);
    $this->jobname = $result;
    $query = "SELECT location FROM jobs WHERE jobname = '$jobname'" ;
    $result = mysqli_query($db, $query);
    $this->location = $result;
    $query = "SELECT description FROM jobs WHERE jobname = '$jobname'" ;
    $result = mysqli_query($db, $query);
    $this->description = $result;
    $query = "SELECT expectedcost FROM jobs WHERE jobname = '$jobname'" ;
    $result = mysqli_query($db, $query);
    $this->expectedcost = $result;
    $query = "SELECT startdate FROM jobs WHERE jobname = '$jobname'" ;
    $result = mysqli_query($db, $query);
    $this->startdate = $result;
    $query = "SELECT enddate FROM jobs WHERE jobname = '$jobname'" ;
    $result = mysqli_query($db, $query);
    $this->enddate = $result;
    $query = "SELECT tradesmenid FROM jobs WHERE jobname = '$jobname'" ;
    $result = mysqli_query($db, $query);
    $this->tradesmenid = $result;
    $query = "SELECT accepted FROM jobs WHERE jobname = '$jobname'" ;
    $result = mysqli_query($db, $query);
    $this->accepted = $result;
  }

  public function getID(){
    return $this->jobid;
  }

  public function getCustID(){
    return $this->customerid;
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

  public function getExpectedCost(){
    return $this->expectedcost;
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
