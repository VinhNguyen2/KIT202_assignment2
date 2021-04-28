<?php
include('db_conn.php')
?>
<!


<?php
include('db_conn.php');
if(isset($_POST['register'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
  $email = $_POST['email'];
	$phone = $_POST['mobile'];
	$password1 = $_POST['password'];
  $confirm_pass = $_POST['confirm_pwd'];
  $address = $_POST['address'];
	$city = $_POST['city'];
  $ABN = $_POST['abn'];

// verify email
  $query = "SELECT FROM Customer WHERE `email`='$email');";
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
		$query->bind_param( 'ssssssss', $firstname, $lastname, $email, $phone, $password, $address, $city, $ABN );
    if ( ! $query->execute() ) {
			trigger_error( 'Error adding customer: ' . $query->error );
		}
    mysqli_close();

    if( $ABN == ''){
      $access = 1;
      $description = 'Client';
    } elseif( $ABN != ''){
      $access = 2;
      $description = 'Host'; 
    }
    $query = "SELECT * FROM Customer ORDER BY customer_ID DESC LIMIT 1;";

    $result = mysqli_query($conn, $query);
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

<div class = "form-body">
<form method = "post" id="signupform" onsubmit="return validate();"  >
<table>
    <thead>
      <br>
    </thead>
    <body>
      <tr>
        <td class="reg_as" colspan="2">
          Register as: <input type="radio" id="cus" name="cus_type" value="cus" checked="checked">
          &nbsp;Client
          <input type="radio" id="host" name="cus_type" value="host">
          &nbsp;Host

        </td>
      </tr>
      <tr>
        <td>
          <label for="fname">First name</label>
          <input type="text" id="fname" name="firstname" required>
        </td>
        <td>
          <label for="lname">Last name</label>
          <input type="text" id="lname" name="lastname" required>
        </td>
      </tr>
      <tr>
        <td>
          <label for="abn">ABN (host only)</label>
          <input type="text" id="abn" name="abn">
        </td>

      </tr>
      <tr>
        <td>
          <label for="email">Email</label>
          <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            title="email must be in the following order: characters@characters.domain" required>
        </td>
        <td>
          <label for="email">Mobile</label>
          <input type="mobile" id="mobile" name="mobile" >
        </td>
      </tr>
      <tr>
        <td>
          <label for="pwd">Password</label>
          <input type="password" id="pwd" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[~!#$]).{6,12}" title="Password must contains at least 1 lower case letter, 1 uppercase letter, 1 number and one of the
                    following special characters ~ ! # $" required>
        </td>

        <td>
          <label for="confirm_pwd">Confirm Password</label>
          <input type="password" id="confirm_pwd" name="confirm_pwd" required>
        </td>
      </tr>
      <tr>
        <td>
        <label for="address">Address</label>
          <input type="text" id="address" name="address" required>
        </td>

        <td>
        <label for="city">City</label> &ensp;
    <select name="city" id="selectCity" required>
        <option value="">Select your city</option>
          <option value="Hobart">Hobart</option>
          <option value="Launceston">Launceston</option>
          <option value="Devonport">Devonport</option>
    </select>
        </td>

        </td>
      </tr>
      <tr>
        <td colspan="2" class="agree">
          <input type="checkbox" id="terms" name="terms" value="terms" required>
          I agree to the term and conditions
        </td>
      </tr>

      <tr>
        <td colspan="2" class="reg_btn">
          <br>
          <input type="submit" value = "Submit", class="btn btn-primary float-right", name = "register"/>
        </td>
      </tr>
    </body>
  </table>
</form>
</div>

