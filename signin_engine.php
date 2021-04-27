<?php

include("session.php");

include("db_conn.php");


$email=$_POST['email'];

$password=$_POST['password'];
$encryptedPassword=md5($password);// encrypt the password so that it becomes unreadable.

// get data from Customer table
$query = "SELECT email, password, ABN, customer_ID FROM Customer WHERE email='$email'";


$result = mysqli_query($conn, $query);


	//$row=$result->fetch_array(MYSQLI_ASSOC);
    $row = mysqli_fetch_assoc($result);

// get data from levelaccess table
$query1 = "SELECT level_code, Customer_ID FROM levelaccess WHERE Customer_ID= '$row[customer_ID]' ";

    $result1 = mysqli_query($conn, $query1);

    //$row1=$result1->fetch_array(MYSQLI_ASSOC);
    $row1 = mysqli_fetch_assoc($result1);
// get data from Manager table
$query2 = "SELECT email, password FROM Manager WHERE email='$email'";

    $result2 = mysqli_query($conn, $query2);

    //$row2=$result2->fetch_array(MYSQLI_ASSOC);
    $row2 = mysqli_fetch_assoc($result2);
    
    echo "email is :" .$row2['email'] ;
    // checks if the email is in the database
if($row['email']!=$email || $email=="")
{
	
	header('Location: login.php?error=invalid_email');
}

else {
	// checks if the passowrd matches with the password in the database
	if($row['password']==$encryptedPassword )
    {
        $session_email=$row['email'];
        $_SESSION['session_email']=$session_email;
        // asigning different access level to different users
        if($row1['level_code'] ==1)
        {
            header('location:./Client_page.php');
          
        }
      else if($row1 == 2)
      {
        header('location:./Host_page.php');
      }
	  else if($row2['email']== $email || $row1['level_code'] ==3 )
      {
            header('location:./Manager_page.php'); 
      }
      else
      {
	  header('Location: ./loggedIn.php');
          
      }
    }
	else{
		
		header('Location: login.php?error=invalid_password');
      
	}
}
?>