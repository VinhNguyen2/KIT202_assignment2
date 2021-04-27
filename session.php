<?php
//starting session when someone login
session_start();

//if the session for email has not been set, initialise it
if(!isset($_SESSION['session_email'])){
	$_SESSION['session_email']="";
    
}
//save email in the session 
$session_email=$_SESSION['session_email']; 
?>