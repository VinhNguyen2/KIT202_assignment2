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

                                    //echo $_SESSION['hostid'];

                                    $sql_query = "SELECT title, address, city, price, max, num_room, num_bathroom, available, garage, image, smoking, internet, description from House where hostedby='".$_SESSION['hostid']."';";

                                    $result = mysqli_query($conn,$sql_query);

                                    $row = mysqli_fetch_array($result);

                                 

                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        echo $_SESSION['hostid'];
                                        while($row = $result->fetch_assoc()) {


                                            echo"<div class='row'>

                                                <div class='col-6'>

                                                    <div class='row'>
                                
                                                        <!-- Accomodation images will be showed here-->
                                                        <div class='col-4 accomodation_img'>
                                
                                                            <img class='img-fluid' src='".$row['image']."'/>
                                                        </div>

                                                        <div class='col-8'>

                                                        <label>".$row['title']."</label> <br>
                                                        
                                                        Address: ".$row['address']."<br>

                                                         ".$row['price']."&nbsp;".$row[num_room]." <i class='icofont-bed'></i> &nbsp;".$row[num_bathroom]." <i class='icofont-bathtub'></i>&nbsp; ".$row[garage]."<i class='icofont-car'></i> <br>

                                                    
                                                        <!-- List of buttons include Approve - Edit - Remove-->

                                                        <input type='button' class='accomodation_btn' value='Approve'>
                                                        <input type='button' class='accomodation_btn' value='Edit'> 
                                                        <input type='button' class='accomodation_btn' value='Remove'> 

                                                        </div>


                                                    </div>

                                                


                                
                                                </div>




                                            </div>
                                            ";


                                        }
                                    }
                                    else
                                    {
                                        echo "<a ref='addhouse.php'>List your house now</a>";
                                    }


                                    ?>
                    
                    </div>
                
                </div>
                <div class='col-2'></div>

           </div>


           
           <!--section for UNITAS about information-->
           <div class="row about">

          

            </div>
        
    </body>
</html>





