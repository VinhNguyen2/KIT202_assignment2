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
                    
                                                    
                            <form action="login_process.php" method="post">
                                <!--table in which contains all login elements-->
                                <table class="table table_reg">
                                    <thead>
                                    <br>
                                    </thead>

                                    <tbody>
                                    <tr>
                                    <!--Area contains login as selection-->
                                    <td class="reg_as" colspan="2">


                                        Login as: <input type="radio" id="cus" name="level" value="3" checked="checked">
                                            &nbsp;Client
                                            <input  type="radio" id="host" name="level" value="2">
                                            &nbsp;Host
                                            <input  type="radio" id="admin" name="level" value="1">
                                            &nbsp;Manager
                                            
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
                                            <text><a href="registration.php">Do not have an account?</a></text>
                                        </td>
                                    </tr>



                                    </tbody>

                                </table>


                            </form> 

                    
                    </div>
                
                </div>
                <div class='col-2'></div>

           </div>


           
           <!--section for UNITAS about information-->
           <div class="row about">

         

            </div>
        
    </body>
</html>