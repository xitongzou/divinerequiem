<?php
// ======================================================
// PHP NEWSLETTER & MAILING LIST TUTORIAL PART II
// Tutorial files taken from http://www.daydreamgraphics.com/
// Only for illustration purposes, use as your own risk.
// Not for resale, profit-making, or distributed in anyway. Personal usage only.
// Copyrighted by Magdeline Ng, of http://www.daydreamgraphics.com/
// ======================================================


// Subscriber Administration
// sindex.php

// MySQL Connection Variables (Enter the values)
$hostname='localhost';
$user='diviner_Gofishus'; 
$pass='quest'; 
$dbase='diviner_Register'; 

$connection = mysql_connect("$hostname" , "$user" , "$pass") or die ("Can't connect to MySQL");
$db = mysql_select_db($dbase , $connection) or die ("Can't select database.");

if(!isset($mode))
{
$mode = 'list';		// set the default mode to list subscribers
}

?><p><strong>Subscriber Administration</strong></p><?php

switch ($mode)
{
	case 'list':
		$q = "select * from subscriber order by sid desc limit 35 ";
		$rs = mysql_query($q);
		
		?>
		<table cellpadding="1" cellspacing="1" border="1" >
		<tr><td><strong>Name</strong></td><td>Email</td><td>Commands</td></tr>
		<?php
		
		while ($row = mysql_fetch_array($rs))
		{
			extract ($row);
			// Display records into table rows.
			echo "<tr><td><strong>$name</strong></td><td>$email</td>
			<td><a href=\"$PHP_SELF?mode=edit&sid=$sid\">Edit</a>  | 
			<a href=\"$PHP_SELF?mode=delete&sid=$sid\">Delete</a></td></tr>";
		}
		?></table><?php
			
	
	break;
	
	case 'add':
	
		// Display Adding Form.
		?><form action="sindex.php?mode=insert" method="post">
		<table cellpadding="1"  border="1">
		<tr>
		<td><strong>Name:</strong></td>
		<td><input type="text" name="name" size="30" maxlength="25"></td>
		</tr>
		<tr>
		<td><strong>Email:</strong></td>
		<td><input type="text" name="email" size="30" maxlength="200"></td>
		</tr>
		<tr>
		<td><strong>Format:</strong></td>
		<td><input type="radio" name="format" value="h" checked>HTML 
		<input type="radio" name="format" value="t">Plain Text</td></tr>
		 <tr>
		<td>Mode:*</td>
		<td><input type="radio" name="smode" value="subscribe" checked>Subscribe <input type="radio" name="smode" value="unsubscribe">UnSubscribe</td>
		</tr>
		<tr><td colspan="2"><input type="submit" name="submit"></td></tr></table>
		</form> 
		<?php
	
	break;
	
	case 'insert':
		 // check that all fields are filled in
		if (empty($name) || empty($email))
		{
		die ("Error! Please fill in all required fields.");
		}
		// check for duplicate entry in database
		$qCheck = "select * from subscribers where name='$name' and email='$email' ";
		$rsCheck = mysql_query($qCheck);
		
		$countCheck = mysql_num_rows($rsCheck);
		
		// determine whether user wants to subscribe or unsubscribe
		if ($smode=='subscribe')
		{
		if ($countCheck != 0) // if entry already exists in database, do not add subscriber
		{
		die ("Error. Record already exist.");
		}
		else {
		$query = "insert into subscribers VALUES ('','$name','$email','$format')";
		$successmsg = "Thank you $name. Your email, $email has been recorded.";
		}
		}
		else { // smode= unsubscribe
		if ($countCheck == 0) // entry does not exist, cannot unsubscriber user
		{
		die ("No such record, cannot unsubscribe user.");
		}
		else {
		
		$query = "delete from subscribers where name='$name' and email='$email' ";
		$successmsg = "Thank you $name. Your email, $email has been unsubscribed.";
		}
		}
		
		// now execute the query
		$result = mysql_query($query);
		
		if ($result)
		{
			echo $successmsg;
		}
		
	break;
	
	case 'edit':
		$q = "select * from subscribers where sid=$sid ";
		$rs = mysql_query($q);
		
		while ($row = mysql_fetch_array($rs))
		{
			extract($row);
			// Display Editing Form.
			?>
			<form action="<?php echo "sindex.php?mode=update&sid=$sid"; ?>" method="post">
			<table cellpadding="1"  border="1">
			<tr>
			<td><strong>Name:</strong></td>
			<td><input type="text" name="name" size="30" maxlength="25" value="<?php echo "$name"; ?>"></td>
			</tr>
			<tr>
			<td><strong>Email:</strong></td>
			<td><input type="text" name="email" size="30" maxlength="200" value="<?php echo "$email"; ?>"></td>
			</tr>
			<tr>
			<td><strong>Format:</strong></td>
			<td><input type="radio" name="format" value="h" 
			<?php  if ($format == "h") { echo "checked"; } ?>>HTML 
			<input type="radio" name="format" value="t" <?php  if ($format == "t") { echo "checked"; } ?>>Plain Text</td></tr>
			 <tr>
			<td>Mode:*</td>
			<td><input type="radio" name="smode" value="subscribe" checked>Subscribe <input type="radio" name="smode" value="unsubscribe">UnSubscribe</td>
			</tr>
			<tr><td colspan="2"><input type="submit" name="Update"></td></tr></table>
			</form> 
			<?php	
		}
	
	break;
	
	case 'update':
		 // check that all fields are filled in
		if (empty($name) || empty($email))
		{
		die ("Error! Please fill in all required fields.");
		}
		// check for duplicate entry in database
		$qCheck = "select * from subscribers where name='$name' and email='$email' ";
		$rsCheck = mysql_query($qCheck);
		
		$countCheck = mysql_num_rows($rsCheck);
		
		// determine whether user wants to subscribe or unsubscribe
		if ($smode=='subscribe')
		{
		if ($countCheck != 0) // if entry already exists in database, do not add subscriber
		{
		die ("Error. Record already exist.");
		}
		else {
		$query = "update subscribers set  name='$name', email='$email', format='$format' where sid='$sid' ";
		$successmsg = "Success! Subscriber record has been updated.";
		}
		}
		else { // smode= unsubscribe
		if ($countCheck == 0) // entry does not exist, cannot unsubscriber user
		{
		die ("No such record, cannot unsubscribe user.");
		}
		else {
		
		$query = "delete from subscribers where name='$name' and email='$email' ";
		$successmsg = "Success. $email has been unsubscribed.";
		}
		}
		
		// now execute the query
		$result = mysql_query($query);
		
		if ($result)
		{
			echo $successmsg;
		}
	break;
	
	case 'delete':
		$q = "delete from subscribers where sid='$sid' ";
		$rs = mysql_query($q);
		
		if ($rs)
		{
			echo "Success. Record deleted.";
		}
	break;
	
	case 'search':
		// display search box.
		?>
		<form action="sindex.php?mode=results" method="post">
		<strong>Name:</strong> <input type="text" name="name" size="30" maxlength="20"><br>
		<strong>Email:</strong> <input type="text" name="email" size="30" maxlength="200"><br>
		<input type="submit" value="Search">
		</form>
		<?php
		
	
	break;
	
	case 'results':
		if (empty($name) && empty($email))
		{
			die ("Error. There is no search criteria.");
		}
		// if user enter both name & email search
		if ($name !="" && $email !="")
		{
			$q = "select * from subscribers where name like '$name%' and email like '$email%' ";
		}
		else {
			if (empty($name))
			{
				// user entered email option
				$q = "select * from subscribers  where email like '$email$' ";
			}
			else {
				// user chose name option
				$q = "select * from subscribers where name like '$name%' ";
			}
		}
		$rs = mysql_query($q);
		$rscount = mysql_num_rows($rs);
		
		// display results
		?>
		<table cellpadding="1" cellspacing="1" border="1" >
		<tr><td><strong>Name</strong></td><td>Email</td><td>Commands</td></tr>
		<?php
		if ($rscount != 0)
		{
			while ($row = mysql_fetch_array($rs))
			{
				extract ($row);
				// Display records into table rows.
				echo "<tr><td><strong>$name</strong></td><td>$email</td>
				<td><a href=\"$PHP_SELF?mode=edit&sid=$sid\">Edit</a>  | 
				<a href=\"$PHP_SELF?mode=delete&sid=$sid\">Delete</a></td></tr>";
			}
		}
		else {
			echo "<tr><td colspan =3>No Results returned.</td></tr>";
		}
		?></table><?php
			
	break;
}
	
?>