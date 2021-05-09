<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="user_page.css" />
</head>

<body>
    <!-- Nav bar -->
    <header class="page-nav-bar">
        <ul>
            <li class="current"><a href="user_profile.php">Profile</a>
            <li>
            <li><a href="user_reviews.php">Reviews</a></li>
            <li><a href="user_inbox.php">Inbox</a></li>
        </ul>
    </header>

    <!-- Check if user is logged in -->
    <?php
    session_start();

    // Check if the user session called 'login' set + if it is a blank string
    if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
        // header("location: login.html");
        echo '
            <h1>You need to login to view your details</h1>
            <button class="btn" onclick="location.href = \'registration.html\';">Register</button>
            <button class="btn" onclick="location.href = \'login.html\';">Login</button>
        ';
        // die(); // Comment this to see content
    }
    ?>

    <!-- Main area -->
    <h1>Profile</h1>

    

    <div class="container">
        <div class="user-detail">
            <strong>Name:</strong> php code here
            <?php //echo $_SESSION["first_name"] . " " . $_SESSION["last_name"]; 
            ?>
        </div>
        <div class="user-detail">
            <strong>Email:</strong> php code here
            <?php //echo $_SESSION["email"]; 
            ?>
        </div>
        <div class="user-detail">
            <strong>Mobile phone: </strong> php code here
            <?php //echo $_SESSION["phone"]; 
            ?>
        </div>
        <div class="user-detail">
            <strong>Postal address:</strong> php code here
            <?php //echo $_SESSION["address"]; 
            ?>
        </div>

        <!-- Show ABN number if it is host -->
        <!-- php code here -->
        <?php
        /*
        if ($_SESSION["level"] === 2) {
            echo '
                <div class="user-detail">
                    <strong>ABN:</strong> ' . $_SESSION["abn"] . '
                </div>
                ';
        }
            */
        ?>

    </div>

    <div class="container">
        <h2>Change details</h2>
        <p>Enter details you want to change</p>
        <form action="change_details.php" method="POST">
            <!-- Change First name -->
            <div class="change-detail">
                New First Name: <input type="text" name="new_fname" placeholder="New First Name">
            </div>
            <!-- Change Last name -->
            <div class="change-detail">
                New Last Name: <input type="text" name="new_lname" placeholder="New Last Name">
            </div>
            <!-- Change Email-->
            <div class="change-detail">
                New Email: <input type="email" name="new_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="New Email" />
            </div>
            <!-- Change Mobile -->
            <div class="change-detail">
                New Mobile: +61<input type="tel" name="new_mobile" pattern="[0-9]{9}" placeholder="New Mobile">
            </div>
            <!-- Change Address -->
            <div class="change-detail">
                New Address: <input type="text" name="new_address" placeholder="New Address">
            </div>

            <!-- Change Password -->
            <div class="change-detail">
                New Password:
                <input type="password" id="new_password" name="new_password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" placeholder="New Password" title="Minimum 8 characters and must contain at least 1 lowercase letter, 1 uppercase letter and 1 number">
                Confirm Password:
                <input type="password" id="confirm_password" placeholder="Confirm Password" />
            </div>

            <!-- Script to check if 2 passwords are matched -->
            <script>
                var new_password = document.getElementById("new_password"),
                    confirm_password = document.getElementById("confirm_password");

                function validatePassword() {
                    if (new_password.value != confirm_password.value) {
                        confirm_password.setCustomValidity("Passwords Don't Match");
                    } else {
                        confirm_password.setCustomValidity('');
                    }
                }

                new_password.onchange = validatePassword;
                confirm_password.onkeyup = validatePassword;
            </script>


            <button type="submit" name="submit_btn">Submit</button>
        </form>
    </div>





</body>

</html>