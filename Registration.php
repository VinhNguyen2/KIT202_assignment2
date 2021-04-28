    <?php
    include('db_conn.php');

    if(isset($_POST['registerBtn']))
    {
      $firstname = $conn -> real_escape_string($_POST['firstname']);
      $lastname = $conn -> real_escape_string($_POST['lastname']);
      $email = $conn -> real_escape_string($_POST['email']);
      $phone = $conn -> real_escape_string($_POST['mobile']);
      $password = md5($conn -> real_escape_string($_POST['password']));
      $address = $conn -> real_escape_string($_POST['address']);
      $city = $conn -> real_escape_string($_POST['city']);
      $abn = $conn -> real_escape_string($_POST['abn']);

      $sql = "INSERT INTO Customer (first_name, last_name, email, phone, password, address, city,ABN) VALUES ('$firstname', '$lastname', '$email', '$phone','$password','$address','$city','$abn');";
      
     if(mysqli_query($conn, $sql)){
          echo "Records added successfully.";
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
     }



    }

    ?>
    


