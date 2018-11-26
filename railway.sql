-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2016 at 03:20 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
create database railway;
use railway;

CREATE TABLE IF NOT EXISTS passengers (
  p_id int(30) NOT NULL AUTO_INCREMENT,
  p_fname varchar(30) DEFAULT NULL,
  p_lname varchar(30) DEFAULT NULL,
  p_age varchar(30) DEFAULT NULL,
  p_contact varchar(20) DEFAULT NULL,
  p_gender varchar(30) DEFAULT NULL,
  email varchar(30) NOT NULL,
  password varchar(30) NOT NULL,
  t_no int(11) DEFAULT NULL,
  Aadhar varchar(30) DEFAULT NULL,
  Account_number varchar(30) DEFAULT NULL,
  Balance     varchar(30) DEFAULT NULL,
  PRIMARY KEY (p_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;



INSERT INTO passengers (p_id, p_fname, p_lname, p_age, p_contact, p_gender, email, password, t_no,Aadhar,Account_number,Balance) VALUES
(1, 'Rahul', 'Dravid', '42', '9090909090', 'Male', 'rahul@dravid.com', '123123123', NULL,'123123123','123123123',500),
(2, 'Rahul', 'Dravid', '29', '1010101010', 'Male', 'qwe@w.cc', '123123123', NULL,'123123123','123123123',500),
(3, 'qwe', 'qwe', '19', '1010101010', 'Male', '123@123.cc', '123123123', NULL,'123123123','123123123',500),
(4, 'abc', 'sbc', '19', '9090909090', 'Male', 'abc@g.cc', '123123123', 12951,'123123123','123123123',500);


CREATE TABLE IF NOT EXISTS admin (
  id varchar(30) NOT NULL ,
  pass varchar(30),
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;
INSERT INTO admin values ('adminid','adminpass');

CREATE TABLE IF NOT EXISTS tickets (
  t_status varchar(20) NOT NULL DEFAULT 'Waiting',
  t_fare int(11) DEFAULT NULL,
  t_id int(20) NOT NULL AUTO_INCREMENT,
   train_no varchar(10),
   t_date varchar(10),
   p_email varchar(30),
   PRIMARY KEY(t_id)
) AUTO_INCREMENT = 1;


INSERT INTO tickets ( t_status, t_fare, t_id,train_no,t_date,p_email) VALUES
('Confirmed', 650, 1,'12626','28-11-2017','123@123.cc'),
('Waiting', 540, 2,'12626','28-11-2018','abc@g.cc');


CREATE TABLE IF NOT EXISTS trains (
  t_no decimal(5,0) NOT NULL,
  t_name varchar(30) DEFAULT NULL,
  t_source varchar(30) DEFAULT NULL,
  t_destination varchar(30) DEFAULT NULL,
  t_type varchar(30) DEFAULT NULL,
  t_status varchar(20) DEFAULT 'On time',
  no_of_seats int(11) DEFAULT NULL,
  t_duration int(11) DEFAULT NULL,
  PRIMARY KEY (t_no)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO trains (t_no, t_name, t_source, t_destination, t_type, t_status, no_of_seats, t_duration) VALUES
(4971, 'garibrath', 'Udaipurr', 'Jammu Tawi', 'Express', 'On time', 550, 20),
(12284, 'duronto', 'Mumbai central', 'Ernakulum', 'AC superfast', 'On time', 800, 24),
(12859, 'geetanjali', 'CST', 'Kolkata', 'express', 'On time', 500, 25),
(12951, 'rajdhani', 'Mumbai Central', 'Delhi', 'Superfast', 'On time', 700, 15),
(16205, 'mysoreexp', 'Talguppa', 'Mysore JN', 'Express', 'On time', 475, 21);

INSERT INTO trains VALUES(12626,'Kerala','Nzm','tvc','Superfast','Ontime',800,52);
INSERT INTO trains VALUES(12644,'Swarna Jayanti','Nzm','Ers','Superfast','Ontime',800,42);
INSERT INTO trains VALUES(12181,'Dayodaya','jbp','AII','Superfast','Ontime',800,17);
INSERT INTO trains VALUES(22621,'Rajyarani','dmo','bpl','Superfast','Ontime',300,5);
INSERT INTO trains VALUES(12192,'ShriDham','jbp','nzm','Superfast','Ontime',800,18);
INSERT INTO trains VALUES(14623,'Patalkot','cwa','dee','express','Ontime',500,20);
INSERT INTO trains VALUES(11015,'KhushiNagar','ltt','gkp','express','Late',600,33);
INSERT INTO trains VALUES(12173,'Udyognagri','ltt','Pbh','Superfast','Ontime',800,28);
INSERT INTO trains VALUES(12155,'Shaan-E-Bhopal','hbj','nzm','Superfast','Ontime',800,42);
INSERT INTO trains VALUES(12807,'Samta Super','vskp','nzm','Superfast','Ontime',800,42);
