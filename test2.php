<?php

include("session.php");

include("db_conn.php");

if(isset($_POST['registerBtn']))
    {
        
      echo "button clicked";
      
      $email = $conn -> real_escape_string($_POST['email']);
      
      $password = md5($conn -> real_escape_string($_POST['password']));
      
      $level = (int)$conn -> real_escape_string($_POST['level']);

      $sql = "SELECT firstname, email, password from Customer where email = '$email' and password = '$password' and level ='$level'"; // query to retrieve login information

      $result = mysqli_query($conn,$sql); //excute login command

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $active = $row['active'];

      $count = mysqli_num_rows($result);
      
     if($count == 1){


         $_SESSION['username'];

         

        
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
     }

    }

    ?>


