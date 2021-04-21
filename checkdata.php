<?php
include("db_conn.php");

$sql = "SELECT customer_ID, first_name, email FROM Customer";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["customer_ID"]. " - Name: " . $row["first_name"]. " " . $row["email"]. "<br>";
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>