DROP DATABASE IF EXISTS group30_db;
CREATE DATABASE group30_db;
USE group30_db;

/*
DROP TABLE Manager;
DROP TABLE Levelaccess;
DROP TABLE InboxList;
DROP TABLE Payment;
DROP TABLE Hostlits;
DROP TABLE House;
DROP TABLE Customer;
DROP TABLE Booking;
*/

CREATE TABLE IF NOT EXISTS Manager (
  manager_ID int(4) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(225) NOT NULL,
  PRIMARY KEY (manager_ID)
);

CREATE TABLE IF NOT EXISTS House (
  House_ID Int(4) NOT NULL auto_increment,
  Name varchar(225) NOT NULL,
  address varchar(225) NOT NULL,
  city varchar(225) NOT NULL,
  price decimal(6,2) NOT NULL,
  max int(4) NOT NULL,
  num_room int(2) NOT NULL,
  num_bathroom int(2) NOT NULL,
  available datetime NOT NULL,
  garage int(2),
  image varchar(225),
  smocking boolean NOT NULL DEFAULT 0,
  internet boolean NOT NULL DEFAULT 0,
  PRIMARY KEY (House_ID)
);

CREATE TABLE IF NOT EXISTS Customer (
  customer_ID int(4) NOT NULL auto_increment,
  first_name varchar(8) NOT NULL,
  last_name varchar(8) NOT NULL,
  email varchar(225) NOT NULL,
  phone varchar(225) NOT NULL,
  password varchar(225) NOT NULL,
  address varchar(225) NOT NULL,
  city varchar(225) NOT NULL,
  ABN varchar(10) NOT NULL,
  PRIMARY KEY (customer_ID)
);

CREATE TABLE IF NOT EXISTS Levelaccess (
  level_code Int(4) NOT NULL,
  description varchar(225) NOT NULL,
  Customer_ID int(4) NOT NULL,
  FOREIGN KEY (Customer_ID) REFERENCES Customer(customer_ID)
);

CREATE TABLE IF NOT EXISTS InboxList (
  inbox_ID Int(4) NOT NULL auto_increment,
  reason_rejected varchar(225) NOT NULL,
  Client_messages varchar(225) NOT NULL,
  PRIMARY KEY (inbox_ID)
);

CREATE TABLE IF NOT EXISTS Booking (
  booking_number int(20) NOT NULL auto_increment,
  confirmed bool,
  booking_time DATETIME NOT NULL,
  num_guests int(2) NOT NULL,
  house_ID int(4),
  Customer_ID int(4),
  PRIMARY KEY (booking_number),
  FOREIGN KEY (house_ID) REFERENCES House(House_ID),
  FOREIGN KEY (Customer_ID) REFERENCES Customer(customer_ID)
);

CREATE TABLE IF NOT EXISTS Payment (
  Booking_number int(4) NOT NULL,
  cardNumber varchar(20) NOT NULL,
  Expiry date, 
  VerifyCode varchar(3),
  reviewLevel varchar(1),
  review varchar(225) NOT NULL,
  FOREIGN KEY (Booking_number) REFERENCES Booking(booking_number)
);

CREATE TABLE IF NOT EXISTS HostList (
  Host_ID Int(4) NOT NULL,
  FOREIGN KEY (Host_ID) REFERENCES Customer(customer_ID)
);



