<?php

// For register_global on PHP settings
$name = $_POST['name'];
$password = $_POST['password'];


// MySQL Connection Variables 
// Fill in your values for the next 4 lines
$hostname='localhost';
$user='diviner_Gofishus'; //'user name for MySQL database';
$pass='quest'; //'Password for database'; 
$dbase='diviner_Register'; //'database name';

$connection = mysql_connect("$hostname" , "$user" , "$pass") or die ("Can't connect to MySQL");
$db = mysql_select_db($dbase , $connection) or die ("Can't select database.");

// Check for empty fields
if (empty($name) || empty($password))
{
die ("Error. Please fill in all required fields."); // once a die statement is execute, the whole script stops executing
}

// Match Row in Database
$qChk = "select name from membership where name='$name' and password='$password' and status='Y' ";
$rsChk = mysql_query($qChk);

$rowCount = mysql_num_rows($rsChk);

if ($rowCount !='1') // query did not return 1 row, user is not verified
{
die ("Error. Your password does not match your username or your account was not yet activated. Please try again.");
}

// User is login. Let's give him a cookie. *Munch*
setcookie ("member",$name,time()+1957240,"/"); 
$member = $name;
session_register("member"); // set session, just in case cookie is blocked.

// Update Login timer
$qUpdate = "update membership set login = now() where name='$name' and password='$password' and status='Y' ";
$rsUpdate = mysql_query($qUpdate);

if ($rsUpdate)
{
header("Location: welcome.php"); // redirects members to a welcome member page
}

?>