<!DOCTYPE html>
<html>
<body>

<center>
<h2>Manage Page </h2>
</center>
   <!--  the manage can some acction  from user list from this page--> 
		<fieldset>
			<legend>Manager Acction</legend>

            <a href="ChangeLevelAccess.php">
			      <button class="btn btn-dark" type="button" name="button">Change Access Level</button>
			      </a>

            <a href="DeleteUser.php">
			      <button class="btn btn-dark" type="button" name="button">Delete User</button>
			      </a>

            <a href="AddUser.php">
			      <button class="btn btn-dark" type="button" name="button">Add User</button>
			      </a>

            <a href="House_list.php">
			      <button class="btn btn-dark" type="button" name="button">House List</button>
			      </a>

            <a href="information.php">
			      <button class="btn btn-dark" type="button" name="button">System over view</button>
			      </a>

            <a href="Booking_list.php">
			      <button class="btn btn-dark" type="button" name="button">Booking List</button>
			      </a>
		</fieldset>

<?php
include('db_conn.php');   //db connection
 
    // get data from customer table
$sql = "SELECT * FROM Customer";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0){
    
    echo "<table border = 1>
    <tr>
    <th> Customer ID
    <th> First Name
    <th> Last Name
    <th> email
    <th> Phone
    <th> address
    <th> city
    <th> ABN
    <th> Level access
    <th> Description
    </tr>";
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $sql1 = "SELECT * FROM Levelaccess WHERE Customer_ID = $row[customer_ID]";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    echo 
    "<tr> 
        <td>" . $row["customer_ID"]. 
        " <td> " . $row["first_name"]. 
        "<td> " . $row["last_name"]. 
        "<td> " . $row["email"]. 
        "<td> " . $row["phone"]. 
        "<td> " . $row["address"]. 
        "<td> " . $row["city"]. 
        "<td> " . $row["ABN"]. 
        " <td> " . $row1["level_code"]. 
        " <td> " . $row1["description"].
    "</tr>";
  }
  echo"</br>";
} else {
  echo "0 results";
}   

  $conn->close();
?>
</body>
</html>