<?php
include('db_conn.php')
?>

<?php
if(isset($_POST['register'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
  $email = $_POST['email'];
	$phone = $_POST['mobile'];
	$password = $_POST['password'];
  $address = $_POST['address'];
	$city = $_POST['city'];
  $ABN = $_POST['abn'];

    // Escape user inputs for security

$firstname = mysql_real_escape_string($firstname);
$lastname = mysql_real_escape_string($lastname);
$email = mysql_real_escape_string($email);
$phone = mysql_real_escape_string($phone);
$password = mysql_real_escape_string($password);
$address= mysql_real_escape_string($address);
$city = mysql_real_escape_string($city);
$ABN = mysql_real_escape_string($ABN);

    // Attempt insert query execution
$sql = "INSERT INTO Customer (`customer_ID`, `first_name`, `last_name`, `email`, `phone`, `password`, `address`, `city`,`ABN`) VALUES (NULL,'$firstname', '$lastname', '$email', '$phone','$email','$password','$address','$city','$ABN');";
mysqli_query($conn, $sql);
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
 
// Close connection
//mysqli_close();
}
?>
<div class = "form-body">
<form method = "post" >
  <table class="table table_reg">
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
          <input type="submit" value = "Register", class="btn btn-primary float-right", name = "register"/>
        </td>
      </tr>
    </body>
  </table>
</form>
</div>