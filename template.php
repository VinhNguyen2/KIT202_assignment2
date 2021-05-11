<?php
include("session.php");
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
                    
                        <!--your content goes here

                        -->
                    
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