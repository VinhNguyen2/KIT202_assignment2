<?php
//connect to mysql
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'group30_db';
$db_port = 8889;


$conn = mysqli_connect($db_host,$db_user,$db_password,$db_db);
	
  if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  echo 'Success: A proper connection to MySQL was made.';
  echo '<br>';
  echo 'Host information: '.$conn->host_info;
  echo '<br>';
  echo 'Protocol version: '.$conn->protocol_version;

  //$mysqli->close(); 


  //$sql = "INSERT INTO Customer (first_name, last_name, email, phone, password, address, city,ABN) VALUES ('Tim', 'Tam', 'timtam@choco.com', '234432','23424','123 Street','Hobart','23424');";
      
  //    if(mysqli_query($conn, $sql)){
  //        echo "Records added successfully.";
  //    } else{
  //        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  //    }



 
  
?>