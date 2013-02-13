<?php

session_start();
session_destroy();
$name = $_COOKIE['member'];

// make the cookie expires instantly.
setcookie ("member",$name,time()-1957240,"/"); 

?>

