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
<h2>Change user level access </h2>
</center>
    <form action ="" method = "post">
    ID: <input type = "text" name= "customer_ID"/>
    ABN: <input type = "text" name= "ABN"/>
    LEVEL: <input type = "text" name= "Level"/> 
    
    DESCRPTION: <select name="Description" id="selectDescription">
          <option value="">Select type of user</option>
            <option value="Host">Host</option>
            <option value="Client">Cilent</option>
        <input type= "submit" name="update" value="update">
        <button><a href="Manager_page.php">Go back to Manager page</a></button>
    </form>
   <!--  the director can delete a food from master list from this page--> 
<?php

echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
echo "<link rel='stylesheet' type='text/css' href='newstyles.css'>";
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
        "<td> " . $row["ABN"]. 
        " <td> " . $row1["level_code"]. 
        " <td> " . $row1["description"].

    "</tr>";
  }
  echo"</br>";
} else {
  echo "0 results";
}   
         if (isset($_POST['update'])){
             $ID=intval($_POST["customer_ID"]) ;
             $Level = $_POST["Level"];
             $description = $_POST["Description"];
             $ABN = $_POST["ABN"];

             // Update user's access level in the table Levelaccess
             $sql = 'UPDATE Levelaccess SET level_code = ?, description = ? WHERE Customer_ID = ?';
             $query = $conn->prepare($sql );
             $query->bind_param( 'ssi', $Level, $description, $ID);
            if ( ! $query->execute() ) {
                trigger_error( 'Error updating accesslevel : ' . $query->error );
            }

            // Update ABN for user in tabble Customer 
            $sql1 = 'UPDATE Customer SET ABN = ? WHERE customer_ID = ?';
            $query1 = $conn->prepare($sql1 );
		        $query1->bind_param( 'si', $ABN, $ID );
            if ( ! $query1->execute() ) {
			        trigger_error( 'Error updating ABN ' . $query1->error );
		        }
            
             header( 'Location: ./ChangeLevelAccess.php' );
             
         }
         
  $conn->close();
?>
</body>
</html>