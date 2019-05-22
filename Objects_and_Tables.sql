
--OBJECTS TO CREATE



--Customer
--construct_user
--change_password
--getName
	----Job
	----construct_job
	----close_job
	----choose_worker
	----send_message



--Tradesmen
--construct_user
--change_password
--getName
------Estimate
	----construct_estimate
	----close_estimate
	----send_message






CREATE TABLE customers(
customerid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
customerName varcher(100),
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


CREATE TABLE job(
jobid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
customerid int,
jobName varchar(100),
location varchar(100),
description text,
expectedcost decimal(4,2),
startdate date,
enddate date,
tradesmenid int
)


CREATE TABLE estimate(
estimateid int NOT NULL PRIMARY KEY AUTO_INCREMENT,
tradesmenid int,
jobid int,
totalcost decimal(4,2),
laborcost decimal(4,2),
materialscost decimal(4,2),
transportcost decimal(4,2),
expiredate date
)

CREATE TABLE message(
messageid int,
username varchar(20),
jobid int,
tradesmenid int,
customerid int,
message text
)
