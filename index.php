<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <title>UniTas - Accomodation Booking System</title>

        <script>
            //JavaScript funtion to load page
            function load_page(page) 
            {
                document.getElementById("main_content").innerHTML='<object type="text/html" data="'+page+'" ></object>';
            }

           
        
        </script>

        <!-- Bootstrap CSS file -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="newstyles.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <!--Load font family from Google web fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">

    </head>

    <body>
        <!-- set up a div 'container_fluid' which display full width on any devices-->
        <div class="container_fluid">

            <!--set-up a section for UNITAS logo-->
            <div class="row menu_top">

                <div class='col-2'></div>
                <div class='col-8'>

                <h2>UNITAS</h2>
             
                </div>
                <div class='col-2'></div>

           </div>

           <!--set-up a seciton for main menu-->
           <div class="row menu_below_top">

                <div class='col-2'></div>
                <div class='col-8'>
                    <table>
                        <tr>
                            <!--button Home-->
                            <td>
                                <button onclick = "load_page('accomodation.html')">Home</button>
                            </td>
                            <td>
                            
                            <!--button Login-->
                              <!--click event to load login page by javascript-->
                              <button onclick="load_page('login.html')">Login</button>
                            
                            </td>
                            <td>
                                <!--button Register-->
                                <!--click event to load registration page by javascript-->
                                <button onclick="load_page('registration.html')">Register</button>
                                
                            </td>
                            <!--button Host Dashboard-->
                            <td><!--click event to load host page by javascript-->
                                <button onclick="load_page('host.php')">Host Dashboard</button>
                            </td>

                            <td>
                                <!--button Admin Dashboard-->
                                <!--click event to load manager page by javascript-->
                                <button onclick="load_page('manager.html')">Admin Dashboard</button>
                            </td>


                            <td class='welcome'>

                            <?php

                            if (isset($_SESSION['host']))
                            {
                                echo "Welcome ".$_SESSION['host'];
                            }
                            elseif (isset($_SESSION['customer']))
                            {
                                echo "Welcome ".$_SESSION['customer'];
                            }

                            ?>
                                
                            </td>   
                            
                           
                        </tr>
                        </table>



                </div>
                <div class='col-2'>
                </div>

           </div>



           <!-- section for main content to be appeared-->
           <div class="row row_main_content" >

                <div class='col-2'></div>

                <div class='col-8' id="main_content">
                    
                    <div class="row">
                    
                        <object data="accomodation.html"></object>
                    
                    </div>
                
                </div>
                <div class='col-2'></div>

           </div>

           <!--section for UNITAS about information-->
           <div class="row about">

            <div class='col-2'></div>
            <div class='col-8'>
                UNITAS - Accomodation Booking System <br>
                Email : accomodation@utas.edu.au  <br>
                Phone : 07819281332 </div><br>
                
            </div>
            <div class='col2'></div>

       </div>
        
    </body>
</html>