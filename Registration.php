

<?php
include('db_conn.php');
// check if the register button is clicked
if(isset($_POST['registerBtn'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
    $email = $_POST['email'];
	$phone = $_POST['mobile'];
	$password1 = $_POST['password'];
    $confirm_pass = $_POST['confirm_pwd'];
    $address = $_POST['address'];
	$city = $_POST['city'];
    $ABN = $_POST['abn'];

// check if entered email is used or not
    $query = "SELECT email FROM Customer WHERE email='$email'";
  //$query = "SELECT FROM Customer WHERE `email`='$email');";
	$result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) != 0) {
			$detailserror .= "Email already registered.<br>";
		}

    //check password
    if ($password1 != $confirm_pass) {
			$passworderror .= "Passwords do not match.<br>";
		}

    //$passworderror .= checkPassword($password1); will do
		$password = MD5($password1);

    // Attempt insert query execution
    $sql = 'INSERT INTO Customer (first_name, last_name, email, phone, password, address, city, ABN) VALUES (?, ?, ?, ?, ?, ?, ? ,?)';
		$query = $conn->prepare($sql );
		$query->bind_param($firstname, $lastname, $email, $phone, $password, $address, $city, $ABN );
    if ( ! $query->execute() ) {
			trigger_error( 'Error adding customer: ' . $query->error );
		}
    //mysqli_close();

    if( $ABN == ''){
      $access = 1;
      $description = 'Client';
    } elseif( $ABN != ''){
      $access = 2;
      $description = 'Host'; 
    }
    $query = "SELECT * FROM Customer ORDER BY customer_ID DESC LIMIT 1;";

    $result = mysqli_query($conn, $query);
//$row2 = mysqli_fetch_array($result);
    $row = mysqli_fetch_array($result);
    $id = $row['customer_ID'];

    $sql1 = 'INSERT INTO Levelaccess (level_code, description, Customer_ID) VALUES (?, ?, ?)';
		$query1 = $conn->prepare($sql1 );
		$query1->bind_param( 'ssi', $access, $description, $id);
    if ( ! $query1->execute() ) {
			trigger_error( 'Error adding Level access: ' . $query1->error );
		}
    
		header( 'Location: index.php' );
		die;
// Close connection 
mysqli_close();

}
?>
