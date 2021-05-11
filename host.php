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

                    <?php




                    $sql_query = "SELECT * from House where hostedby='".$_SESSION['hostid']."';";

                    $result = mysqli_query($conn,$sql_query);

                    $row = mysqli_fetch_array($result);

                    $title = $row['title'];
                    $address = $row['address'];
                    $city = $row['city'];
                    $price = $row['price'];
                    $max = $row['max'];
                    $num_room = $row['num_room'];
                    $num_bathroom = $row['num_bathroom'];
                    $available = $row['available'];
                    $garage = $row['garage'];
                    $image = $row['image'];
                    $smoking = $row['smoking'];
                    $internet = $row['internet'];
                    $description = $row['description'];
                    $hostedby = $row['hostedby'];

                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = $result->fetch_assoc()) {


                            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";


                          }
                    }
                    else
                    {
                        echo "error!";
                    }



                    ?>
                    
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









<div class="row accomodation_section">
        
        <div class="col-6 acomodation_1st_col">

            <div class='row accomodation_info'>

                <!-- Accomodation images will be showed here-->
                <div class="col-4 accomodation_img">

                    <img class="img-fluid" class="img-fluid" class="img-fluid" class="img-fluid" src='./img/house1.jpg'>

                </div>


                 <!-- Accomodation details will be showed here-->

                <div class="col-8 accomodation_details">

                <label class='accomodation_title'>Three bed room house with parking slots</label> <br>
                
                Address: 114 Elizabeth St, Launceston 7250 <br>

                $450/w &nbsp; 3 <i class="icofont-bed"></i> &nbsp; 2 <i class="icofont-bathtub"></i>&nbsp;  2 <i class="icofont-car"></i> <br>

                Status: Pending for approval <br>

                <!-- List of buttons include Approve - Edit - Remove-->

                <input type="button" class="accomodation_btn" value="Approve" onclick="">
                <input type="button" class="accomodation_btn" value="Edit" onclick=""> 
                <input type="button" class="accomodation_btn" value="Remove" onclick=""> 

                </div>

            </div>

        </div>

        <div class="col-6 accomodation_2nd_col">
            

            <div class='row accomodation_info'>
                <!-- Accomodation images will be showed here-->

                <div class="col-4 accomodation_img">

                    <img class="img-fluid" class="img-fluid" class="img-fluid" src='./img/house2.jpg'>

                </div>
                <!-- Accomodation details will be showed here-->

                <div class="col-8 accomodation_details">

                <label class='accomodation_title'>Comfy house with pets allowance</label> <br>
                Address: 78 Queenstreet Mall, Hobart 7000 <br>
                
                $550/w &nbsp; 4 <i class="icofont-bed"></i> &nbsp; 2 <i class="icofont-bathtub"></i>&nbsp;  4 <i class="icofont-car"></i> <br>

                Status: Approved <br>
                <!-- List of buttons include Edit - Remove-->
                <input type="button" class="accomodation_btn" value="Edit" onclick=""> 
                <input type="button" class="accomodation_btn" value="Remove" onclick=""> 

                </div>

            </div>
            
        </div>

    </div> 