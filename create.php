<?php

require 'db_connect.php';

// require above script
// change the path to match wherever you put it.


$table = "CREATE TABLE useronline (
`timestamp` int(15) NOT NULL default '0',
`ip` varchar(40) NOT NULL default '',
`file` varchar(100) NOT NULL default '',
PRIMARY KEY (`timestamp`),
KEY `ip` (`ip`),
KEY `file` (`file`)
) 
TYPE=MyISAM;

$create = $db_object->query($table);	//perform query

if(DB::isError($create)) {
	die($create->getMessage());
} else {
	echo 'Table created successfully.';

}

$db_object->disconnect();

?>