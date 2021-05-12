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
                      
                        if(isset($_POST['loginBtn']))
                        {
                            
                            $email = $conn -> real_escape_string($_POST['email']);
                        
                            $password = md5($conn -> real_escape_string($_POST['password']));
                            
                            $level = (int)$conn -> real_escape_string($_POST['level']);


                            $sql_query = "SELECT customer_ID, first_name, email from Customer where email='".$email."' and password='".$password."' and level='".$level."';";

                            $result = mysqli_query($conn,$sql_query);

                            $row = mysqli_fetch_array($result);

                            $username = $row['first_name'];

                            $hostid = $row['customer_ID'];

                            if(mysqli_num_rows($result) == 1)
                            {


                                if($level == 2)
                                {

                                $_SESSION['host'] = $username;

                                $_SESSION['hostid'] = $hostid;

                                $_SESSION['host_email'] = $row['email'];

                                echo "<div class='phpmessage'>
                                <p><img src='./img/checked.png'> <br>
                                Welcome back ".$username."<p>
                                </div>";

                                header( "refresh:4;url=host.php" );
                                }

                                elseif($level == 3){

                                $_SESSION['customer'] = $username;
                                $_SESSION['customerid'] = $row['customer_ID'];
                                

                                echo "<div class='phpmessage'>
                                <p><img src='./img/checked.png'> <br>
                                Welcome back ".$username."<p>
                                </div>";


                                header( "refresh:4;url=accomodation.html" );
                                }

                                elseif($level == 1){

                                $_SESSION['admin'] = $username;
                                $_SESSION['admin_email'] = $row['email'];

                                echo "<div class='phpmessage'>
                                <p><img src='./img/checked.png'> <br>
                                Welcome back ".$username."<p>
                                </div>";


                                header( "refresh:4;url=manager.php" );
                                }
                            }
                            else{
                                echo "<div class='phpmessage'>
                                
                                <p>
                                <img src='./img/failed.png'><br>
                                Login failed! <br>
                                Please check your details
                                </div>";;
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