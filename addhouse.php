<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Bootstrap CSS file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="newstyles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!--Load font family from Google web fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="newstyles.css">
</head>

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
                    
                    <div class = "form-body">
                          <form action="addhouse_process.php" method="post">

                            <table class="table table_addhouse">
                              <thead>
                                <br>
                              </thead>
                          
                                <tr>

                                  <td>
                                    <label for="htitle">Title</label>
                                    <input type="text" id="htitle" name="htitle" required/>
                                  </td>

                                  <td>


                                  Images:

                                  
                                  <input type='button' name='registerBtn' value='Upload'/>

                                    
                                  </td>

                                </tr>

                                <tr>

                                  <td>
                                    <label for="htitle">Address</label>
                                    <input type="text" id="haddress" name="haddress" required/>
                                  </td>

                                  <td>
                                  
                                  <select name="hcity" id="selectCity">
                                  <option value="">Select your city</option>
                                    <option value="Hobart">Hobart</option>
                                    <option value="Launceston">Launceston</option>
                                    <option value="Devonport">Devonport</option>
                                    </select>
                                    
                                  </td>

                                </tr>

                                <tr>
                                  <td><label for="htitle">Price per week</label>
                                    <input type="text" id="haddress" name="hprice" required/></td>

                                  <td>
                                  Available
                                  <input type="date" id="havailable" name="havailable">
                                  </td>
                                  </tr>
                                 
                               
                                
                                <tr>

                                <td>
                                  Description <br>

                                  <textarea id="desc" name="desc" rows="6" cols="40">
                                  
                                  </textarea>

                                </td>


                                <td>

                                 
                                <input type="checkbox" id="wifi" name="wifi" value="1"> Wifi
                                  <input type="checkbox" id="pet" name="pet" value="1"> Pet 
                                  <input type="checkbox" id="smoke" name="smoke" value="1"> Smoke <br>
                                  <table>
                                    <tr>
                                      <td>Living Room</td>
                                      <td><select name="lroom" id="lroom">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option></select></td>
                                    </tr>
                                    <tr>
                                      <td>Bath room</td>
                                      <td><select name="broom" id="lroom">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                  </select></td>
                                    </tr>
                                    <tr>
                                      <td>Max guests</td>
                                      <td><select name="max" id="max">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                  </select></td>
                                    </tr>

                                    <tr>
                                      <td>Parking Spots</td>
                                      <td><select name="park" id="lroom">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                  </select></td>

                                  
                                    </tr>

                                    
                                    </table>
                                  

                                </td>
      
                          
                                <tr>
                                  <td colspan="2" class="reg_btn">
                                    <br>
                                    <input type="submit" value = "Add Accomodation" name = "addhouseBtn"/>
                                  </td>
                                </tr>
                              
                            </table>
                          </form>
                          </div>



                    </div>
                
                </div>
                <div class='col-2'></div>

           </div>


           
           <!--section for UNITAS about information-->
           <div class="row about">

            </div>
        
    </body>
</html>