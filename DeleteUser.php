<!DOCTYPE html>
<html>
<body>

<center>
<h2>Delete users </h2>
</center>
    <form action ="" method = "post">
    ID: <input type = "text" name= "customer_ID"/>
     
        <input type= "submit" name="delete" value="delete">
        <button><a href="Manager_page.php">Go back to Manager page</a></button>
    </form>
   <!--  the director can delete a food from master list from this page--> 
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
         if (isset($_POST['delete'])){
             //$ID=$_POST["customer_ID"];

             // delete data from Levelaccess table
             $query1 = "delete from Levelaccess where Customer_ID='$_POST[customer_ID]'";
             $conn->query($query1);
            
             // delete data from customer tabele
             $query = "delete from Customer where customer_ID ='$_POST[customer_ID]'";
             $conn->query($query);
             header( 'Location: DeleteUser.php' ); 
             
         }
  $conn->close();
?>
</body>
</html>