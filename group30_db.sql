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

-- manager account table
CREATE TABLE IF NOT EXISTS Manager (
  manager_ID int(4) NOT NULL AUTO_INCREMENT,
  email varchar(50) NOT NULL,
  password varchar(225) NOT NULL,
  PRIMARY KEY (manager_ID)
);
-- insert defaul manager data exmaple
-- INSERT INTO Manager (manager_ID, email, password) VALUES ('manager@utas.edu.au', '');

-- House information table
CREATE TABLE IF NOT EXISTS House (
  house_ID int NOT NULL AUTO_INCREMENT,
  street_address varchar(225) NOT NULL,
  city varchar(255) NOT NULL,
  zip char(4) NOT NULL,
  
  num_bedrooms smallint(2) NOT NULL,
  num_bathrooms smallint(2) NOT NULL,
  garage smallint(2) NOT NULL,
  
  internet boolean NOT NULL default 0,
  pet_friendly boolean NOT NULL default 0,
  smoking boolean NOT NULL default 0,
  
  max_guests smallint(2) NOT NULL,
  available boolean NOT NULL default 1,
  
  price varchar(4) NOT NULL,

  image varchar(255) default "img/image_not_found.png",
  title varchar(255) NOT NULL,
  PRIMARY KEY (house_ID)
);

-- insert house information example
INSERT INTO House (street_address, city, zip, num_bedrooms, num_bathrooms, garage, internet, pet_friendly, smoking, max_guests, price, image, title)
VALUES ('114 Elizabeth St', 'Launceston', '7250', 3, 2, 2, 0, 0, 0, 4, '450', 'img/house1.jpg', 'Three bedroom house with parking slots');

INSERT INTO House (street_address, city, zip, num_bedrooms, num_bathrooms, garage, internet, pet_friendly, smoking, max_guests, price, image, title)
VALUES ('78 Queenstreet Mall', 'Hobart', '7000', 4, 2, 4, 0, 0, 1, 6, '550', 'img/house2.jpg', 'Comfy house with pets allowance');

INSERT INTO House (street_address, city, zip, num_bedrooms, num_bathrooms, garage, internet, pet_friendly, smoking, max_guests, price, image, title)
VALUES ('88 York St', 'Launceston', '7250', 3, 2, 2, 0, 1, 0, 3, '400', 'img/house3.jpg', 'Three bedroom house with pets');

INSERT INTO House (street_address, city, zip, num_bedrooms, num_bathrooms, garage, internet, pet_friendly, smoking, max_guests, price, image, title)
VALUES ('321 Brisbane St', 'Hobart', '7000', 5, 2, 3, 1, 1, 0, 8, '650', 'img/house4.jpg', 'Big house for big family');

INSERT INTO House (street_address, city, zip, num_bedrooms, num_bathrooms, garage, internet, pet_friendly, smoking, max_guests, price, image, title)
VALUES ('114 Elizabeth St', 'Launceston', '7250', 3, 2, 2, 1, 0, 0, 3, '450', 'img/house1.jpg', 'Cosy house with internet provided');

INSERT INTO House (street_address, city, zip, num_bedrooms, num_bathrooms, garage, internet, pet_friendly, smoking, max_guests, price, image, title)
VALUES ('78 Queenstreet Mall', 'Hobart', '7000', 4, 2, 4, 0, 1, 0, 5, '550', 'img/house2.jpg', '4 bedroom house with ocean view');

INSERT INTO House (street_address, city, zip, num_bedrooms, num_bathrooms, garage, internet, pet_friendly, smoking, max_guests, price, image, title)
VALUES ('128 Steele St', 'Devonport', '7310', 3, 2, 1, 1, 1, 0, 4, '550', 'img/house3.jpg', 'Cottage house with a big garden for pets');

INSERT INTO House (street_address, city, zip, num_bedrooms, num_bathrooms, garage, internet, pet_friendly, smoking, max_guests, price, image, title, available)
VALUES ('43 Victoria Parade', 'Devonport', '7310', 2, 1, 1, 1, 1, 0, 2, '550', 'img/house4.jpg', 'Small house with 5 minutes to the beach', 0);

-- Customer information table
CREATE TABLE IF NOT EXISTS Customer (
  customer_ID int(4) NOT NULL AUTO_INCREMENT,
  first_name varchar(8) NOT NULL,
  last_name varchar(8) NOT NULL,
  email varchar(225) NOT NULL,
  phone varchar(225) NOT NULL,
  password varchar(225) NOT NULL,
  address varchar(225) NOT NULL,
  abn varchar(10),
  PRIMARY KEY (customer_ID)
);

-- insert customer data example 
INSERT INTO Customer (first_name, last_name, email, phone, password, address, abn) 
VALUES ('Danh', 'Tran', 'dang.tran@utas.edu.au', '0495339300', '', '01 york street, launceston 7250', 234);

INSERT INTO Customer (first_name, last_name, email, phone, password, address, abn) 
VALUES ('Thong', 'Dang', 'thong.dang@utas.edu.au', '0495339311', '', '03 haha street, Hobart 7050', '');

INSERT INTO Customer (first_name, last_name, email, phone, password, address, abn) 
VALUES ('Vinh', 'Nguyen', 'vinh.nguyen@utas.edu.au', '0495339322', '', '02 hehehe street, launceston 7250', 665);

-- level access table
CREATE TABLE IF NOT EXISTS Levelaccess (
  level_code Int(4) NOT NULL,
  description varchar(225) NOT NULL,
  customer_ID int(4) NOT NULL,
  FOREIGN KEY (customer_ID) REFERENCES Customer(customer_ID)
);

-- insert data example access level
INSERT INTO Levelaccess(level_code, description, Customer_ID) 
VALUES (2, 'Host', 1);

INSERT INTO Levelaccess(level_code, description, Customer_ID) 
VALUES (2, 'Client', 2);

INSERT INTO Levelaccess(level_code, description, Customer_ID) 
VALUES (2, 'Host', 3);

-- Inbox list table
CREATE TABLE IF NOT EXISTS InboxList (
  inbox_ID Int(4) NOT NULL AUTO_INCREMENT,
  reason_rejected varchar(225) NOT NULL,
  client_messages varchar(225) NOT NULL,
  PRIMARY KEY (inbox_ID)
);

-- Booking rooms table
CREATE TABLE IF NOT EXISTS Booking (
  booking_number int(20) NOT NULL AUTO_INCREMENT,
  confirmed boolean,
  booking_time DATETIME NOT NULL,
  num_guests int(2) NOT NULL,
  house_ID int(4),
  customer_ID int(4),
  PRIMARY KEY (booking_number),
  FOREIGN KEY (house_ID) REFERENCES House(house_ID),
  FOREIGN KEY (customer_ID) REFERENCES Customer(customer_ID)
);

-- payment table
CREATE TABLE IF NOT EXISTS Payment (
  booking_number int(4) NOT NULL,
  cardNumber varchar(20) NOT NULL,
  expiry date, 
  verifyCode varchar(3),
  reviewLevel varchar(1),
  review varchar(225) NOT NULL,
  FOREIGN KEY (booking_number) REFERENCES Booking(booking_number)
);

-- Host list table
CREATE TABLE IF NOT EXISTS HostList (
  host_ID Int(4) NOT NULL,
  FOREIGN KEY (host_ID) REFERENCES Customer(customer_ID)
);

-- insert data example Host list
INSERT INTO HostList(host_ID) VALUES (1);

INSERT INTO HostList(host_ID) VALUES (2);
