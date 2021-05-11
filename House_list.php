
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
<h2> House List </h2>
</center>
    <form action ="" method = "post">
    ID: <input type = "text" name= "House_ID"/>
     
        <input type= "submit" name="delete" value="delete">
        <button><a href="Manager_page.php">Go back to Manager page</a></button>
    </form>
   <!--  the director can delete a food from master list from this page--> 
   <?php
   echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
   echo "<link rel='stylesheet' type='text/css' href='newstyles.css'>";
include ("session.php");
include("db_conn.php");

echo "Welcome to House List";
// get data from customer table
$sql = "SELECT * FROM House";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    
    echo "<table border = 1>
    <tr>
    <th> House ID
    <th> Name
    <th> Address
    <th> City
    <th> price
    <th> Max people
    <th> Number of room
    <th> Number of bathroom
    <th> Available 
    <th> Number of garage
    <th> Image
    <th> Smooking 
    <th> Internet
    <th> Edit
    </tr>";
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo 
    "<tr> 
        <td>" . $row["House_ID"]. 
        " <td> " . $row["Name"]. 
        "<td> " . $row["address"]. 
        "<td> " . $row["city"]. 
        "<td> " . $row["price"]. 
        "<td> " . $row["max"]. 
        "<td> " . $row["num_room"]. 
        "<td> " . $row["num_bathroom"]. 
        " <td> " . $row["available"]. 
        " <td> " . $row["garage"].
        "<td> " . $row["image"]. 
        " <td> " . $row["smocking"]. 
        " <td> " . $row["internet"].
        ' <td>  <a href= "./Update_House.php"> Edit </a> </td>';
    "</tr>";
  }
  echo"</br>";
} else {
  echo "0 results";
}   
         if (isset($_POST['delete'])){
             
             $query = "delete from House where House_ID ='$_POST[House_ID]'";
             $conn->query($query);
             header( 'Location: House_list.php');
             
         }
  $conn->close();
?>
</body>
</html>