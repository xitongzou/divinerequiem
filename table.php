<?php

require 'db_connect.php';

// require above script
// change the path to match wherever you put it.


$table = "CREATE TABLE users (
id int(10) DEFAULT '0' NOT NULL auto_increment, 
username varchar(40),
password varchar(50), 
regdate varchar(20),
email varchar(100),
website varchar(150),
location varchar(150),
show_email int(2) DEFAULT '0',
last_login varchar(20),
PRIMARY KEY(id))";

$create = $db_object->query($table);	//perform query

if(DB::isError($create)) {
	die($create->getMessage());
} else {
	echo 'Table created successfully.';

}

$db_object->disconnect();

?>