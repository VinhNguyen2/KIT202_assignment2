<!DOCTYPE html>
<html>
    <!-- Bootstrap CSS file -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="newstyles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!--Load font family from Google web fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="newstyles.css">
<body>
<center>
<h2>System Over view </h2>
<button><a href="Manager_page.php">Go back to Manager page</a></button>
</center>
</body>
</html>
<?php
    
    include('db_conn.php');   //db connection
// total Customer
$sql2 = "SELECT * FROM Customer";
 
$mysqliStatus = mysqli_query($conn, $sql2);
 
$users = mysqli_num_rows($mysqliStatus);
$user = $users -1;
// Host
$query = "SELECT ABN FROM Customer WHERE ABN != '' ;";

$mysqliStatus = mysqli_query($conn, $query);
 
$host = mysqli_num_rows($mysqliStatus);
// Host
$query = "SELECT ABN FROM Customer WHERE ABN != '' ;";

$mysqliStatus = mysqli_query($conn, $query);
 
$client = mysqli_num_rows($mysqliStatus);
$client = ($user - $host);
//echo "Total of users: " $rows_count_value; 


// Total House
$sql2 = "SELECT * FROM House";

$mysqliStatus = mysqli_query($conn, $sql2);
 
$house = mysqli_num_rows($mysqliStatus);
 
//echo " Total of House: " $rows_count_value; 

// Total view
$sql2 = "SELECT review FROM Payment WHERE review != '' ;";

$mysqliStatus = mysqli_query($conn, $sql2);
 
$view = mysqli_num_rows($mysqliStatus);
//payment
$sql2 = "SELECT cardNumber FROM Payment WHERE cardNumber != '' ;";
$mysqliStatus = mysqli_query($conn, $sql2);
$payment = mysqli_num_rows($mysqliStatus);

//pending
$sql2 = "SELECT confirmed FROM Booking WHERE confirmed = 1 ;";
$mysqliStatus = mysqli_query($conn, $sql2);
$confirm = mysqli_num_rows($mysqliStatus);


$conn->close();

    echo "<table border = 1>
<tr>
<th> Total shared house
<th> Total of view
<th> Total of request
<th> New request
<th> Number of pending
<th> Total completed payment
<th> Total Users
<th> Host
<th> Client
</tr>
<tr>"; 

echo 
"<tr> 
    <td> $house
    <td> $view
    <td>  
    <td>   
    <td> $confirm 
    <td> $payment  
    <td> $user  
    <td> $host  
    <td> $client  
</tr>";

?>