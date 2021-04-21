<?php
//connect to mysql

$conn = new mysqli('localhost', 'root', 'root', 'group30_db');
if (mysqli_connect_error()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
        echo "<script type='text/javascript'>alert('".addslashes($error)."');</script>";
	    exit();
	}
?>