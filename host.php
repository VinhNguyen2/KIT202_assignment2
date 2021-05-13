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

                      $sql_query = "SELECT house_ID, title, address, city, price, max, num_room, num_bathroom, available, garage, image, smoking, internet, description from House where hostedby='".$_SESSION['hostid']."';";

                      $result = mysqli_query($conn,$sql_query);

                      $row = mysqli_fetch_array($result);


                      if(mysqli_num_rows($result) > 0)
                      {
                          $_SESSION['houseid'] = $row['house_ID'];
                          while($row = $result->fetch_assoc()) {

                            if($row['internet'] ==1)
                            {
                                $internet = "<i class='fa fa-wifi'></i>";
                            }
                            else{

                                $internet = "";
                            }


                            echo '
                                <form >
                                <div class="house-container">
                                    <div id="house-image-div" class="item-container">
                                        <img class="house-image" src="' . $row['image'] . '" alt="house-image">
                                    </div>

                                    <div id="house-details-div" class="item-container">
                                        <a href="" class="accommodation_title">' . $row['title'] . '</a>
                                        <br>
                                        Address: ' . $row['address'] . '
                                        <br>'.$row['description'].'<br>

                                        $ ' . $row['price'] . ' PW
                                        &nbsp; ' . $row['num_room'] . ' <i class="fa fa-bed"></i>
                                        &nbsp; ' . $row['num_bathroom'] . ' <i class="fa fa-shower"></i>
                                        &nbsp; ' . $row['garage'] . '  <i class="fa fa-car"></i>
                                        &nbsp; ' . $internet . '
                                        &nbsp; ' . $smoking . '
                                        <br /> 
                                        
                                        <button class="review-btn" name="heditBtn">Edit</button>
                                        <button class="review-btn" name="hremoveBtn">Remove</button>                     
                                    </div>
                                </div>
                                </form>
                            ';



                          }

                        }

                    else{
                        
                        echo "You have no house! List your house here";
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





