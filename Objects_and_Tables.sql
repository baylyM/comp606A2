
--OBJECTS TO CREATE



--Customer
--construct_user
--change_password
--getName
--getPostedJobs

	----Job
	----construct_job
	----close_job
	----choose_worker
  ----accept_estimate
	----send_message



--Tradesmen
--construct_user
--change_password
--getName
--getPostedEstimates
------Estimate
	----construct_estimate
	----close_estimate
	----send_message






CREATE TABLE customers(
customerid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
customerName varcher(100) UNIQUE,
username varchar(20),
password varchar(20),
email varchar(50)
)



CREATE TABLE tradesmen(
tradesmenid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
tradesmenName varcher(100),
username varchar(20),
password varchar(20),
email varchar(50)
)


CREATE TABLE jobs(
jobid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
customerid int,
jobname varchar(100),
location varchar(100),
description text,
expectedcost decimal(4,2),
startdate date,
enddate date,
tradesmenid int,
accepted boolean
)


CREATE TABLE estimates(
estimateid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
tradesmenid int,
jobid int,
totalcost decimal(4,2),
labourcost decimal(4,2),
materialscost decimal(4,2),
transportcost decimal(4,2),
expireddate date,
accepted boolean
)

CREATE TABLE message(
messageid int,
username varchar(20),
jobid int,
tradesmenid int,
customerid int,
message text
)
