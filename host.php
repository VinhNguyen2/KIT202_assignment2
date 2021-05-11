
        <!-- Bootstrap CSS file -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="newstyles.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <!--Load font family from Google web fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="newstyles.css">
        <link rel="stylesheet" href="icofont.min.css">

  <?php 
  include("db_conn.php");
  ?>


    <div class='addBtn'>
        <button class="admin_btn"  onclick="openAdmin('admin_accomodation')">Add New House</button>
    </div>

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
