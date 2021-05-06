<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    //connect to mysql
    $db_host = 'localhost';
    $db_user = 'group30';
    $db_password = 'root';
    $db_db = 'group30_db';
    $db_port = 8889;


    $conn = new mysqli($db_host, $db_user, $db_password, $db_db);

    if ($conn -> connect_errno) {
        die("ERROR: Could not connect. " . $conn -> connect_error);
    }

    echo 'Success: A proper connection to MySQL was made.';
    echo '<br>';
    echo 'Host information: ' . $conn->host_info;
    echo '<br>';
    echo 'Protocol version: ' . $conn->protocol_version;

    /* Must close mysql connection in the files that include this
            $conn->close(); 
    */

    ?>
</body>

</html>