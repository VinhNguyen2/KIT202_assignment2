<!DOCTYPE html>
<html>


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

            function abnDisabler() {
                var chkHost = document.getElementById("host");
                var divabn = document.getElementById("abntd");
                var divcity = document.getElementById("tdcity");
                divabn.style.display = chkHost.checked ? "block" : "none";
                divcity.style.display = chkHost.checked ? "block" : "none";
            }
    </script>

           
        
        </script>

        <!-- Bootstrap CSS file -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="newstyles.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <!--Load font family from Google web fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


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
                 
                            <td>
                                <button><a href='index.php'>Home</a></button>
                            </td>
                            <td>
                            
                            <!--button Login-->
                              <!--click event to load login page by javascript-->
                              <button><a href="login.php">Login</a></button>
                            
                            </td>
                           
                            <!--button Host Dashboard-->
                            
                            


                            <td class='welcome'>
                                <?php
                                   if(isset($_SESSION['host']))
                                   {
                                        echo "<div class='dropdown'>
                                        <button class='dropbtn'>Welcome ".$_SESSION['host']." <i class='fa fa-caret-down'></i></button>
                                        <div class='dropdown-content'>
                                            <a href='host.php'>Dash Board</a>
                                            <a href='addhouse.php'>Add New House</a>
                                            <a href='logout.php'>Log Out</a>
                                        </div>
                                        </div>";
    
                                   }
                                   elseif(isset($_SESSION['admin']))
                                   {
                                    echo "<div class='dropdown'>
                                    <button class='dropbtn'>Welcome ".$_SESSION['admin']." <i class='fa fa-caret-down'></i></button>
                                    <div class='dropdown-content'>
                                        <a href='#'>Dash Board</a>
                                        <a href='#'>Add User</a>
                                        <a href='logout.phh'>Log Out</a>
                                    </div>
                                    </div>";
                                   }
                                   elseif(isset($_SESSION['customer']))
                                   {
                                    echo "<div class='dropdown'>
                                    <button class='dropbtn'>Welcome ".$_SESSION['customer']." <i class='fa fa-caret-down'></i></button>
                                    <div class='dropdown-content'>
                                        
                                        <a href='#'>Check Bookings</a>
                                        <a href='logout.php'>Log Out</a>
                                    </div>
                                    </div>";
                                   }

                                ?>
                                    
                            </td>   
                            
                           
                        </tr>
                        </table> 




                 </div>
                 

           </div>

    </body>



</html>
    