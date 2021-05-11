
    <!-- Bootstrap CSS file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="newstyles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!--Load font family from Google web fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="newstyles.css">
    <script>

     //javascript function to disable textfield when client and host radio button change
   
    function abnDisabler() {
        var chkHost = document.getElementById("host");
        var divabn = document.getElementById("abntd");
        var divcity = document.getElementById("tdcity");
        divabn.style.display = chkHost.checked ? "block" : "none";
        divcity.style.display = chkHost.checked ? "block" : "none";
      }
    </script>
    


<div class = "form-body">
  <form action="" method="post">

    <table class="table table_reg">
      <thead>
        <br>
      </thead>
   
        <tr>
          <td class="reg_as" colspan="2">
            Register as: <input type="radio" id="cus" name="level" value="3" checked="checked" onclick="abnDisabler()">
            &nbsp;Client
            <input type="radio" id="host" name="level" value="2" onclick="abnDisabler()">
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
          <td id="abntd" style="display: none;">
            <label for="abn">ABN</label>
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
            <input type="password" id="pwd" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}" title="Password must contains at least 1 lower case letter, 1 uppercase letter" required>
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
  
          <td id="tdcity" style="display: none;">
          <label for="city">City</label> &ensp;
      <select name="city" id="selectCity">
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
            I agree to the terms and conditions
          </td>
        </tr>
  
        <tr>
          <td colspan="2" class="reg_btn">
            <br>
            <input type="submit" value = "Register" name = "registerBtn"/>
          </td>
        </tr>
      
    </table>
  </form>
  </div>