<?php

include("session.php");

include("db_conn.php");

if(isset($_POST['loginBtn']))
    {
        
        $email = $conn -> real_escape_string($_POST['email']);
      
        $password = md5($conn -> real_escape_string($_POST['password']));
        
        $level = (int)$conn -> real_escape_string($_POST['level']);
  
  
        $sql_query = "SELECT first_name, email from Customer where email='".$email."' and password='".$password."' and level='".$level."';";

        $result = mysqli_query($conn,$sql_query);

        $row = mysqli_fetch_array($result);

        $username = $row['first_name'];

        if(mysqli_num_rows($result) == 1)
        {

        $_SESSION['username'] = $username;
        
        echo "OK";

            if($level == 2)
            {

            
            $_SESSION['host_email'] = $row['email'];

            echo "<div class='phpmessage'>
            <p><img src='./img/checked.png'> <br>
            Login successful!<p>
            </div>";
  
            header( "refresh:4;url=host.php" );
            }

            elseif($level == 3){

            
            $_SESSION['customer_email'] = $row['email'];

            echo "<div class='phpmessage'>
            <p><img src='./img/checked.png'> <br>
            Login successful!<p>
            </div>";
  
            header( "refresh:4;url=accomodation.html" );
            }

            elseif($level == 1){

           
            $_SESSION['admin_email'] = $row['email'];

            echo "<div class='phpmessage'>
            <p><img src='./img/checked.png'> <br>
            Login successful!<p>
            </div>";
  
            header( "refresh:4;url=manager.html" );
            }
        }
        else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

  }

  

 ?>

 <style>

        .phpmessage
        {
            font-size: 25px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            font-family: "Work Sans", sans-serif;
            color: #013580;
            text-align: center;

        }

        .phpmessage img
        {
            width: 50px;
         
        
        }

    </style>
