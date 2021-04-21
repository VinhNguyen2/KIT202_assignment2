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
  manager_ID int(4) NOT NULL auto_increment,
  email varchar(50) NOT NULL,
  password varchar(225) NOT NULL,
  PRIMARY KEY (manager_ID)
);
-- insert defaul manager data exmaple
INSERT INTO Manager (manager_ID, email, password) VALUES (1,'manager@utas.edu.au', '21b114482e0c92b7e3c10c96f3c2567f');

-- House information table
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
  image varchar(255) default "img/house3.jpg",
  smocking boolean NOT NULL DEFAULT 0,
  internet boolean NOT NULL DEFAULT 0,
  PRIMARY KEY (House_ID)
);

-- insert hounse information example
INSERT INTO House (House_ID, Name, address, city, price, max, num_room, num_bathroom, available, garage, image, smocking,internet) VALUES (
 1,'House2', '78 Queenstreet Mall,', 'Hobart 7000', '550', 8, 4, 2, now(), 4, 'img/house2.jpg', 0, 0);

 INSERT INTO House (House_ID, Name, address, city, price, max, num_room, num_bathroom, available, garage, image, smocking,internet) VALUES (
2,'House1', '114 Elizabeth St', 'Launceston 7250', '450', 6, 3, 2, now(), 3, 'img/house1.jpg', 0, 0);

-- Customer information table
CREATE TABLE IF NOT EXISTS Customer (
  customer_ID int(4) NOT NULL auto_increment,
  first_name varchar(8) NOT NULL,
  last_name varchar(8) NOT NULL,
  email varchar(225) NOT NULL,
  phone varchar(225) NOT NULL,
  password varchar(225) NOT NULL,
  address varchar(225) NOT NULL,
  city varchar(225) NOT NULL,
  ABN varchar(10), 
  PRIMARY KEY (Customer_ID)
) ;

-- insert customer data example password Assignment2~
INSERT INTO Customer (customer_ID, first_name, last_name, email, phone, password, address, city, ABN) VALUES (
1, 'Danh', 'Tran', 'dang.tran@utas.edu.au', '0495339300', '21b114482e0c92b7e3c10c96f3c2567f', '01 york street', 'launceston 7250', '234'
);
INSERT INTO Customer (customer_ID, first_name, last_name, email, phone, password, address, city, ABN) VALUES (
2, 'Thong', 'Dang', 'thong.dang@utas.edu.au', '0495339311', '21b114482e0c92b7e3c10c96f3c2567f', '03 haha street', 'Hobart 7050', NULL
);
INSERT INTO Customer (customer_ID, first_name, last_name, email, phone, password, address, city, ABN) VALUES (
3, 'Vinh', 'Nguyen', 'vinh.nguyen@utas.edu.au', '0495339322', '21b114482e0c92b7e3c10c96f3c2567f', '02 hehehe street', 'launceston 7250', '234'
);
INSERT INTO Customer (customer_ID, first_name, last_name, email, phone, password, address, city, ABN) VALUES (
4, 'Hung', 'Tran', 'hung.tran@utas.edu.au', '0495339322', '21b114482e0c92b7e3c10c96f3c2567f', '02 hoho street', 'launceston 7250', NULL
);
-- level access table
CREATE TABLE IF NOT EXISTS Levelaccess (
  level_code Int(4) NOT NULL,
  description varchar(225) NOT NULL,
  Customer_ID int(4) NOT NULL,
  FOREIGN KEY (Customer_ID) REFERENCES Customer(customer_ID)
);

-- insert data example access level
INSERT INTO Levelaccess(level_code, description, Customer_ID) VALUES (
2, 'Host', 1
);
INSERT INTO Levelaccess(level_code, description, Customer_ID) VALUES (
1, 'Client', 2
);
INSERT INTO Levelaccess(level_code, description, Customer_ID) VALUES (
2, 'Host', 3
);
INSERT INTO Levelaccess(level_code, description, Customer_ID) VALUES (
3, 'Manager', 4
);

-- Inbox list table
CREATE TABLE IF NOT EXISTS InboxList (
  inbox_ID Int(4) NOT NULL auto_increment,
  reason_rejected varchar(225) NOT NULL,
  Client_messages varchar(225) NOT NULL,
  PRIMARY KEY (inbox_ID)
);

-- Booking rooms table
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

-- payment table
CREATE TABLE IF NOT EXISTS Payment (
  Booking_number int(4) NOT NULL,
  cardNumber varchar(20) NOT NULL,
  Expiry date, 
  VerifyCode varchar(3),
  reviewLevel varchar(1),
  review varchar(225) NOT NULL,
  FOREIGN KEY (Booking_number) REFERENCES Booking(booking_number)
);

-- Host list table
CREATE TABLE IF NOT EXISTS HostList (
  Host_ID Int(4) NOT NULL,
  FOREIGN KEY (Host_ID) REFERENCES Customer(customer_ID)
);
-- insert data example Host list

INSERT INTO HostList(Host_ID) VALUES (
  1
);
INSERT INTO HostList(Host_ID) VALUES (
  2
);

ALTER TABLE `Customer`
  MODIFY `customer_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;