
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
<h2> Booking List </h2>
</center>
    <form action ="" method = "post">
    Booking ID: <input type = "text" name= "booking_ID"/>
     
        <input type= "submit" name="cancel" value="cancel">
        <button><a href="Manager_page.php">Go back to Manager page</a></button>
    </form>
   <!--  the director can delete a food from master list from this page--> 
   <?php
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
echo "<link rel='stylesheet' type='text/css' href='newstyles.css'>";

include ("session.php");
include("db_conn.php");

// get data from customer table
$sql = "SELECT * FROM Booking";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    
    echo "<table border = 1 >
    <tr>
    <th> Booking ID
    <th> Booking status
    <th> number of guest
    <th> House Name
    <th> Check in
    <th> Check out
    <th> Payment status
    </tr>";
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    // get house name from database
    $sql1 = "SELECT * FROM House WHERE House_ID = $row[house_ID]";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    // get payment status from database
    $sql1 = "SELECT cardNumber FROM Payment WHERE Booking_number = $row[booking_number]";
    $result1 = mysqli_query($conn, $sql1);
    $row2 = mysqli_fetch_assoc($result1);
    $booking_status;
    if ($row2){
        $booking_status = 'confirmed';
    }else{
        $booking_status = 'pending';
    }
    echo 
    "<tr> 
        <td>" . $row["booking_number"]. 
        " <td> " . $row["confirmed"]. 
        "<td> " . $row["num_guests"]. 
        "<td> " . $row1["Name"]. 
        "<td> " . $row["check_in"]. 
        "<td> " . $row["check_out"]. 
        "<td> " . $row2["cardNumber"]. 
    "</tr>";
  }
  echo"</br>";
} else {
  echo "0 results";
}   
         if (isset($_POST['cancel'])){
             
             $query = "delete from Booking where booking_number ='$_POST[booking_ID]'";
             $conn->query($query);
             header( 'Location: Booking_list.php');
             
         }
  $conn->close();
?>
</body>
</html>