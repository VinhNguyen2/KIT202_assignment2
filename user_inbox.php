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
        <ul class="flex-container">
            <li><a href="user_profile.php">Profile</a></li>
            <li><a href="user_reviews.php">Reviews</a></li>
            <li class="current"><a href="user_inbox.php">Inbox</a></li>
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
    <h1>Inbox</h1>

</body>

</html>