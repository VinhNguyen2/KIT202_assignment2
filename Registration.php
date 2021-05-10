<?php
include('db_conn.php')
?>

<?php
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>";
echo "<link rel='stylesheet' type='text/css' href='/stylesheet.css'/>";

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
$query = "SELECT FROM Customer WHERE email='$email'";
  //$query = "SELECT FROM Customer WHERE `email`='$email');";
		$result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) != 0) {
		//	$detailserror .= "Email already registered.<br>";
      header('Location: Registration.php?error=Email already registered');
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
    
		header( 'Location: login.php' );
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
            <font color="red"><?php echo $detailserror; ?></font>
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


<script type="text/javascript">
            
            //validate all the input
            function validate(){
	           if ($("#fname").val()==""){
                   alert("Please enter your first name.");
                   return false;
	           }
                else if (!/[A-Za-z/s]$/.test($("#fname").val())) {
                    alert("Wrong name format.");
                    return false;   
                }
                else if($("#lname").val()=="") {
                    alert("Please enter your last number.");
                    return false;
                }
               else if( !/^[A-Za-z0-9\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~\;]+[A-Za-z0-9\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~\;\.]*[A-Za-z0-9\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~\;]@([A-Za-z0-9/-]+[.])+[A-Za-z0-9/-]{1,}$/.test($("#email").val()) || /([\S]{65,})@([\S])/.test($("#email").val()) || /([\S])@([\S]{256,})/.test($("#email").val()) || /([\.])\1/.test($("#email").val().match(/(\S*)@/)[1]) ) {
                    alert("Wrong format of email"); 
                    return false;
                }  
                else if($("#mobile").val()=="") {
                    alert("Please enter your Phone number."); 
                    return false;
                }  
                else if (/([^0-9])/.test($("#mobile").val())) {
                    alert("Wrong phone number format."); 
                    return false;    
                }   
      
                else if ($("#password").val().length<6 || $("#password").val().length>12 ) {
                    alert("your password should within 6 to 12 characters.");
                    return false;   
                }    
                else if (!/([0-9])/.test($("#password").val()) || !/([a-z])/.test($("#password").val()) || !/([A-Z])/.test($("#password").val())|| !/([\!\#\$\~])/.test($("#password").val())) {
                    alert("your password should contain at least 1 lower case letter, 1 uppercase letter, 1 number and one of the following special characters ~ ! # $ .");
                    return false;   
                }

	              else if ($("#password").val()!= $("#confirm_pwd").val()) {
                   alert("Password does not match.");
                   return false;	
	              }
                else if($("#selectCity").val()=="") {     
                    alert("Please select your city."); 
                    return false;
                }
                else if($("#address").val()=="") {     
                    alert("Please enter your address."); 
                    return false;
                }

                else if($("#terms").val()=="") {     
                    alert("Please confirm the temr and conditions."); 
                    return false;
                }

                return true;
            }
        
    $(document).ready(function(){
        
        //show hint when user input thier information
        $("#signupform").on("input",function() {
            
            if ($("#fname").val()=="" || !/[A-Za-z/s]$/.test($("#fname").val())){
                
            $("#fname").parent().find(".hint_wrong, .hint_right").remove();
               $("#fname").after("<span  class='hint_wrong'>✘");
            } 
            else  {
                $("#fname").parent().find(".hint_wrong, .hint_right").remove();
                $("#fname").after("<span  class='hint_right'>✔</span>");
            }
            
            if ($("#lname").val()=="" || !/[A-Za-z/s]$/.test($("#lname").val())){
                
                $("#lname").parent().find(".hint_wrong, .hint_right").remove();
                   $("#lname").after("<span  class='hint_wrong'>✘");
                } 
                else  {
                    $("#lname").parent().find(".hint_wrong, .hint_right").remove();
                    $("#lname").after("<span  class='hint_right'>✔</span>");
                }


            if( !/^[A-Za-z0-9\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~\;]+[A-Za-z0-9\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~\;\.]*[A-Za-z0-9\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~\;]@([A-Za-z0-9/-]+[.])+[A-Za-z0-9/-]{1,}$/.test($("#email").val()) || /([\S]{65,})@([\S])/.test($("#email").val()) || /([\S])@([\S]{256,})/.test($("#email").val()) || /([\.])\1/.test($("#email").val().match(/(\S*)@/)[1]) ) {
               $("#email").parent().find(".hint_wrong, .hint_right").remove();
               $("#email").after("<span  class='hint_wrong'>✘ you@example.com</span>");
           } 
            else  {
                $("#email").parent().find(".hint_wrong, .hint_right").remove();
                $("#email").after("<span  class='hint_right'>✔</span>");
            }
            
            if($("#mobile").val()=="" || /([^0-9])/.test($("#mobile").val())) {
                $("#mobile").parent().find(".hint_wrong, .hint_right").remove();
                $("#mobile").after("<span  class='hint_wrong'>✘");
            } 
            else  {
                $("#mobile").parent().find(".hint_wrong, .hint_right").remove();
                $("#mobile").after("<span  class='hint_right'>✔</span>");
            }
            
            if ($("#password").val().length<6 || $("#password").val().length>12 || !/([0-9])/.test($("#password").val()) || !/([a-z])/.test($("#password").val()) || !/([A-Z])/.test($("#password").val())|| !/([\!\#\$\~])/.test($("#password").val())  ) {
                
                $("#password,#confirm_pwd").parent().find(".hint_wrong, .hint_right").remove();
                $("#password,#confirm_pwd").after("<span  class='hint_wrong'>✘ 6﹤nCc(!#$~)﹤12");
            } 
            else  {
                $("#password,#confirm_pwd").parent().find(".hint_wrong, .hint_right").remove();
                $("#password,#confirm_pwd").after("<span  class='hint_right'>✔</span>");
            } 
            
            if ($("#password").val()!= $("#confirm_pwd").val()) {
                $("#confirm_pwd").parent().find(".hint_wrong, .hint_right").remove();
                $("#confirm_pwd").after("<span  class='hint_wrong'>✘ 6﹤nCc(!#$~)﹤12");
            }
            else {
                $("#confirm_pwd").parent().find(".hint_wrong, .hint_right").remove();
                $("#confirm_pwd").after("<span  class='hint_right'>✔</span>");
            }
            
            if ($("#address").val()=="" || !/[A-Za-z/s]$/.test($("#address").val())){
                
                $("#address").parent().find(".hint_wrong, .hint_right").remove();
                   $("#address").after("<span  class='hint_wrong'>✘");
                } 
                else  {
                    $("#address").parent().find(".hint_wrong, .hint_right").remove();
                    $("#address").after("<span  class='hint_right'>✔</span>");
                }

                if ($("#selectCity").val()=="" || !/[A-Za-z/s]$/.test($("#selectCity").val())){
                
                $("#selectCity").parent().find(".hint_wrong, .hint_right").remove();
                   $("#selectCity").after("<span  class='hint_wrong'>✘");
                } 
                else  {
                    $("#selectCity").parent().find(".hint_wrong, .hint_right").remove();
                    $("#selectCity").after("<span  class='hint_right'>✔</span>");
                }    
        }); 
    });
    </script>