<?php

// For register_global on PHP settings
$name = $_POST['name'];
$email = $_POST['email'];
$code = $_POST['code']; 


// MySQL Connection Variables 
// Fill in your values for the next 4 lines
$hostname='localhost';
$user='diviner_Gofishus'; //'user name for MySQL database';
$pass='quest'; //'Password for database'; 
$dbase='diviner_Register'; //'database name';

$connection = mysql_connect("$hostname" , "$user" , "$pass") or die ("Can't connect to MySQL");
$db = mysql_select_db($dbase , $connection) or die ("Can't select database.");

// Check for empty fields
if (empty($name) || empty($email) || empty($code))
{
die ("Error. Please fill in all required fields."); // once a die statement is execute, the whole script stops executing
}

// Next check that the email address entered is a valid format
if (!(ereg ("^.+@.+\\..+$", $email)) )
{
die ("Error. $email does not look like a valid email address.");
}

// Now check if the code entered is correct
$qChk = "select code from membership where name='$name' and email='$email' and code='$code' ";
$rsChk = mysql_query($qChk);

$rowCount = mysql_num_rows($rsChk); // how many rows returned from our query

if ($rowCount != '1') // query return more than 1 row or none. ie code is wrong.
{
die ("Error. The activation code is wrong or your name or email is entered wrongly. Please try again.");
}

// User entered correct code since query return 1 row exact.
// Update member record 
$qUpdate = "update membership set status='Y' where name='$name' and email='$email' and code='$code' ";
$rsUpdate = mysql_query($qUpdate);

if ($rsUpdate)
{
echo "<p>Thank you $name. Your account has been activated. </p>";
echo "<p>Redirecting you to login in 3 secs.</p>";
?><meta http-equiv="refresh" content="3;URL=login.html"><?php

}
?>

