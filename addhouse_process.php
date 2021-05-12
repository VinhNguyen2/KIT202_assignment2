<?php

include("db_conn.php");

include("session.php");

include("header.php");

?>


<?php



if(isset($_POST['addhouseBtn']))
{

    $title = $conn -> real_escape_string($_POST['htitle']);
    $address = $conn -> real_escape_string($_POST['haddress']);
    
    $city = $conn -> real_escape_string($_POST['hcity']);
    $price = $conn -> real_escape_string($_POST['hprice']);

    $available = $conn -> real_escape_string($_POST['havailable']);

    $desc = $conn -> real_escape_string($_POST['desc']);

    if(isset($_POST['wifi']))
    {
        $wifi = $conn -> real_escape_string($_POST['wifi']);
    }
    else
    {
        $wifi=0;
    }

    if(isset($_POST['smoke']))
    {
        $smoke = $conn -> real_escape_string($_POST['smoke']);
    }
    else
    {
        $smoke=0;
    }

    
  

    $lroom = $conn -> real_escape_string($_POST['lroom']);
    $broom = $conn -> real_escape_string($_POST['broom']);
    $max = $conn -> real_escape_string($_POST['max']);
    $parking = $conn -> real_escape_string($_POST['park']);

    $image = "img/house1.jpg";

    $host = $_SESSION['hostid'];



    $sql = "INSERT INTO House (title, address, city, price, max, num_room, num_bathroom, available, garage, image, smoking, internet, description, hostedby ) 
                              VALUES ('$title', '$address', '$city', '$price','$max','$lroom','$broom','$available','$parking','$image','$smoke','$wifi','$desc','$host');";
    
   if(mysqli_query($conn, $sql)){

        echo "<div class='phpmessage'>
        <p><img src='./img/checked.png'> <br>
        New house has been added! <br>
        Now you will be re-directed to the Dash board<p>
        </div>";

        header( "refresh:4;url=host.php" );
    } else{
        echo "ERROR: Could not able to execute";
   }

}
else{

    echo "No submit button!";

}


?>


<?php
include("footer.php");

?>