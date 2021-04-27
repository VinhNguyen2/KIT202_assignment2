<?php
include("db_conn.php");

// get data from customer table
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
// get data from house table
$sql1 = "SELECT * FROM House";
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
  // output data of each row
  while($row1 = mysqli_fetch_assoc($result1)) {
    echo "id: " . $row1["House_ID"]. " - Name: " . $row1["Name"]. " - address" . $row1["address"]. "- city" . $row1["city"]. "- price" . $row1["price"]. "- max pepole" . $row1["max"]. "- Number of room" . $row1["num_room"]. "- num bath" . $row1["num_bathroom"]."- available" . $row1["availabe"]. "- garage" . $row1["garage"]."<br>";
  }
} else {
  echo "0 results";

}

mysqli_close($conn);
?>