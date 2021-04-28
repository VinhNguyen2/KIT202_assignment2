<?php
    include('db_conn.php')
?>

    <?php

    if(isset($_POST['registerBtn']))
    {
      echo "<h3>have post</h3>";
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
      $sql = "INSERT INTO Customer (`first_name`, `last_name`, `email`, `phone`, `password`, `address`, `city`,`ABN`) VALUES ('$firstname', '$lastname', '$email', '$phone','$password','$address','$city','$ABN');";
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
