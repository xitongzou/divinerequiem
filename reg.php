<?php 
// For register_global on PHP settings 
$name = $_POST['name']; 
$email = $_POST['email']; 
$password = $_POST['password']; 


// MySQL Connection Variables                                 
// Fill in your values for the next 4 lines 
$hostname='localhost'; 
$user='diviner_Gofishus';    //user name for MySQL database 
$pass='quest';    //Password for database 
$dbase='diviner_Register';    //database name 

$connection = mysql_connect("$hostname" , "$user" , "$pass") or die ("Can't connect to MySQL"); 
$db = mysql_select_db($dbase , $connection) or die ("Can't select database."); 

// Check for empty fields 
if (empty($name) || empty($email) || empty($password)) 
{ 
    die ("Error. Please fill in all required fields.");        // once a die statement is execute, the whole script stops executing 
} 

// Next check that the email address entered is a valid format 
if (!(ereg ("^.+@.+\..+$", $email))    ) 
{ 
    die ("Error. $email does not look like a valid email address."); 
} 

//  This is the function I will use to generate the 6 digit code 
// Function taken from Php.Net srand 
function randomstring($len) 
{ 
   srand(date("s")); 
   while($i<$len) 
     { 
       $str.=chr((rand()%26)+97); 
       $i++; 
   } 
  
   $str=$str.substr(uniqid (""),0,22); 
   return $str; 
} 

// Now generate the 6-digit code 
$code = randomstring(6);    // 6 for a 6-digit code 
$code = substr("$code", 0, 6);    // added to fix bug. 

// Now email the user his registration details 
    $from = "admin@divinerequiem.net"; 
    $subject = "Your Registration Details for divinerequiem.net";  

    $headers = "MIME-Version: 1.0\r\n";  
    $headers = "From: Admin<$from>\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";  

    $message = "Hi $name, <br><br> Thank you for registering an account with us. Here's the information you registered:- <br><br>"; 
    $message .= "Username: $name<br> Password: $password <br> "; 
    $message .= " Your account is not yet activated, please use the activation code <strong>$code</strong> to activate your account.<br><br>"; 
    $message .= "Activate your account <a href=\"http://www.daydreamgraphics.com\">here</a>."; 
     
     if (mail($email,$subject,$message,$headers))    // if mail is successful 
    { 
        // Store data into database 
        $q = "insert into membership (id, name, email, status,code, joindate,password) VALUES ('','$name','$email','N','$code', now(), '$password' )"; 
        $rs = mysql_query($q) or die     ("Could not execute query : $q." . mysql_error()); 
         
        if ($rs) 
        { 
            echo "<p>Thank you $name. An email has been send to $email with the activation code to activate your account.</p>"; 
        } 
     
    } 


?>