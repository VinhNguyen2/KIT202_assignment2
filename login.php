<!-- Bootstrap CSS file -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="newstyles.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<!--Load font family from Google web fonts-->
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="newstyles.css">

<!--Form login-->

<?php
include("session.php");
include("db_conn.php");

//if there is any received error message 
if(isset($_GET['error']))
{
	$errormessage=$_GET['error'];
	//show error message using javascript alert
	echo "<script>alert('$errormessage');</script>";
}

?>
<form action="./signin_engine.php" method="post">
    <!--table in which contains all login elements-->
    <table class="table table_reg">
        <thead>
         <br>
        </thead>

        <tbody>
          <tr>
          <!--Area contains login as selection-->
           <td class="reg_as" colspan="2">


            Login as: <input type="radio" id="cus" name="gender" value="cus" checked="checked">
                &nbsp;Client
                <input  type="radio" id="host" name="gender" value="host">
                &nbsp;Host
           </td>

          </tr>


          <tr>
            <!--Area contains email field-->

            <td>
            <label for="email">Email</label>
            <input type="text" name="email" required><br><br>
            

            </td>
        
            <!--Area contains password field-->
            
            <td>
                
              <label for="pwd">Password</label>
              <input type="password"  name="password" required>
            

            </td>

          </tr>


          <tr>
            <!--Area contains Login button-->
           
            <td colspan="2" class="reg_btn">
                <br>
                <input id="loginId" type="submit" name="loginBtn" value="Login"><br><br>
                <br>
                <br>
                <text><a href="">Do not have an account?</a></text>
            </td>
          </tr>
        </tbody>
      </table>
</form> 