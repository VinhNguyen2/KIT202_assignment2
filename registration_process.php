<?php
include("session.php");
include("db_conn.php");
?>
<!DOCTYPE html>
<html lang="en">

    <body>
        <!-- set up a div 'container_fluid' which display full width on any devices-->
        <div class="container_fluid">

          <?php

          include("header.php");
          

          ?>
         


           <!-- section for main content to be appeared-->
           <div class="row row_main_content" >

                <div class='col-2'></div>

                <div class='col-8' id="main_content">
                    
                    <div class="row">
                    
                    <?php

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
                                $level = $conn -> real_escape_string($_POST['level']);

                                $sql = "INSERT INTO Customer (first_name, last_name, email, phone, password, address, city, ABN, level) VALUES ('$firstname', '$lastname', '$email', '$phone','$password','$address','$city','$abn','$level');";
                                
                                if(mysqli_query($conn, $sql)){

                                    echo "<div class='phpmessage'>
                                    <p><img src='./img/checked.png'> <br>
                                    Registration is completed! <br>
                                    Now you will be re-directed to login page<p>
                                    </div>";

                                    header( "refresh:4;url=login.php" );
                                } else{
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
                    
                    </div>
                
                </div>
                <div class='col-2'></div>

           </div>


           
           <!--section for UNITAS about information-->
           <div class="row about">

            <?php include("footer.php")?>

            </div>
        
    </body>
</html>