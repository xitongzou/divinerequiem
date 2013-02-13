	<td valign="top">
<div style="padding-bottom:4px;">
		<table width="242" class="mList" cellpadding="0" cellspacing="0">
			<tr>
				<td height="32" background="bg.gif" class="title2">Members Login </td>
			</tr>
			<tr>
				<td bgcolor="#ffffff">
				<!--- ##### START CATS MENU ##### --->
				<div style="padding-left:6px;padding-top:8px;padding-bottom:8px;">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
	<td>
<?php
if($users) {
$users = basename($users);
$users .= ".php";
if (is_file("./$users")) {
include($users);
} else {
echo "You have successfully logged in.";
}
} else {
include("users.php");
}
?><br>
<?php
// Configuration
$dbhost = "localhost";
$dbuser = "diviner_Gofishus"; // MySQL Username
$dbpass = "quest"; // MySQL Password
$dbname = "diviner_Register"; // Database Name
$timeoutseconds = 1200; // length of session, 20 minutes is the standard

$timestamp=time();
$timeout=$timestamp-$timeoutseconds;
$ip = substr($REMOTE_ADDR, 0, strrpos($REMOTE_ADDR,"."));

// Connect to MySQL Database
@mysql_connect($dbhost,$dbuser,$dbpass);
@mysql_select_db($dbname) or die("No db");

// Add this user to database
$loopcap = 0;
while ($loopcap<3 && @mysql_query("insert into useronline values('$timestamp','$ip','$PHP_SELF')"))
{ // in case of collision
$timestamp = $timestamp+$ip{0}; $loopcap++;
}

// Delete users that have been online for more then "$timeoutseconds" seconds
@mysql_query("delete from useronline where timestamp<$timeout"); 

// Select users online
$result = @mysql_query("select distinct ip from useronline"); 
$user = @mysql_num_rows($result);

mysql_free_result($result);
@mysql_close();

// Show all users online
if ($user==1) {echo $user.' user online';} else {echo $user.' users online';}
?>
</td>
</tr>
</table>
</td>
</tr>
</table>
        <table width="242" height="837" cellpadding="0" cellspacing="0" class="mList">
          <tr>
            <td height="32" background="bg.gif" class="title2">Search </td>
          </tr>
          <tr>
            <td bgcolor="#ffffff">
              <!--- ##### START CATS MENU ##### --->
              <div style="padding-left:6px;padding-top:8px;padding-bottom:8px;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>
                      <script type="text/javascript">
// Google Internal Site Search script- By JavaScriptKit.com (http://www.javascriptkit.com)
// For this and over 400+ free scripts, visit JavaScript Kit- http://www.javascriptkit.com/
// This notice must stay intact for use

//Enter domain of site to search.
var domainroot="www.divinerequiem.net/"

function Gsitesearch(curobj){
curobj.q.value="site:"+domainroot+" "+curobj.qfront.value
}

        </script>
                      <form action="http://www.google.com/search" method="get" onSubmit="Gsitesearch(this)">
                        <p>
                          <input name="q" type="hidden" />
                          <input name="qfront" type="text" style="width: 180px" /><br>
                          <input name="submit2" type="submit" value="Search" />
                          <br>
                  Powered by <a href="http://www.google.com">Google</a></p>
                    </form></td>
                  </tr>
                </table>
              </div>
			   <div style="padding-bottom:4px;">
	  <table width="242" class="mList" cellpadding="0" cellspacing="0">
			<tr>
				<td height="32" bgcolor="F7F7F8" class="title2">Most Recent Submissions </td>
			</tr>
			<tr>
				<td bgcolor="#ffffff">
				<!--- ##### START CATS MENU ##### --->
				


				<!--- ##### START CATS MENU ##### --->
				</td>
			</tr>
		</table>
</div>
 
<div style="padding-bottom:4px;">
		<table width="242" class="mList" cellpadding="0" cellspacing="0">
			<tr>
				<td height="32" bgcolor="F7F7F8" class="title2">Most Recent Posts </td>
			</tr>
			<tr>
				<td bgcolor="#ffffff">
					<!--- ##### START GFX MENU ##### --->
					
<script language="JavaScript" type="text/javascript" src="http://divinerequiem.net/forum/topics_anywhere.php?mode=show&f=a&n=5&sfn=y&fnl=y&r=y&sr=y&b=non&lpb=0&lpd=0&lpi=y"></script> 

					<!--- ##### START GFX MENU ##### --->
				</td>
			</tr>
		</table>
</div>
<div style="padding-bottom:4px;">
		<table width="242" class="mList" cellpadding="0" cellspacing="0">
			<tr>
				<td height="32" bgcolor="F7F7F8" class="title2">Current Poll </td>
			</tr>
			<tr>
				<td bgcolor="#ffffff">
					<!--- ##### START GFX MENU ##### --->
					
<table align="left">
  <tr>
    <td valign="top">&nbsp;&nbsp;<img src="images/bullet_arrow.gif" width="10" height="12" alt=""></td>
	<TD width="107"><a href="graphicstemplate.php?catid=CAT_001" class="lnLink" title="Business Graphic Template">Business</a></td>
		<td><p class="lnLink">(3)</p></TD>
  </tr>
  <tr>
    <td valign="top">&nbsp;&nbsp;<img src="images/bullet_arrow.gif" width="10" height="12" alt=""></td>
	<TD width="107"><a href="graphicstemplate.php?catid=CAT_003" class="lnLink" title="High-tech Graphic Template">High-tech</a></td>
		<td><p class="lnLink">(3)</p></TD>
  </tr>
  <tr>
    <td valign="top">&nbsp;&nbsp;<img src="images/bullet_arrow.gif" width="10" height="12" alt=""></td>
	<TD width="107"><a href="graphicstemplate.php?catid=CAT_007" class="lnLink" title="Freestyle Graphic Template">Freestyle</a></td>
		<td><p class="lnLink">(2)</p></TD>
  </tr>
</table>
					<!--- ##### START GFX MENU ##### --->
				</td>
			</tr>
		</table>
		</div>

		<div style="padding-bottom:4px;">
		<table width="242" class="mList" cellpadding="0" cellspacing="0">
			<tr>
				<td height="32" bgcolor="F7F7F8" class="title2">Subscribe to Updates </td>
			</tr>
			<tr>
				<td bgcolor="#ffffff">
				<div align="center">
				<?php 
// subscribe newsletter
// subscribe.php

// MySQL Connection Variables (Enter the values) 
$hostname='localhost';
$user='diviner_Gofishus'; 
$pass='quest'; 
$dbase='diviner_Register'; 

$connection = mysql_connect("$hostname" , "$user" , "$pass") or die ("Can't connect to MySQL");
$db = mysql_select_db($dbase , $connection) or die ("Can't select database.");


if(!isset($mode))
{
$mode = 'index';
}

switch ($mode)
{
case 'index':
// display default form
?>
<form action="<?php echo "$PHP_SELF?mode=process"; ?>" method="post">
<table width="54%" border="1" cellspacing="1" cellpadding="1">
<tr> 
<td>Name:*</td>
<td><input type="text" name="name" size="20"></td>
</tr>
<tr> 
<td>Email:*</td>
<td><input type="text" name="email" size="20"></td>
</tr>
<tr> 
<td>Format Preferred:*</td>
<td><input type="radio" name="format" value="h" checked>HTML <input type="radio" name="format" value="t">Plain Text</td>
</tr>
<tr> 
<td>Mode:*</td>
<td><input type="radio" name="smode" value="subscribe" checked>Subscribe <input type="radio" name="smode" value="unsubscribe">UnSubscribe</td>
</tr>
<tr> 
<td colspan="2"><input type="submit" name="Submit" value="Submit"></td>
</tr>
</table>
</form>
<?php
break;

case 'process':
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

}
?>
				</div>	
				<div style="padding-bottom:4px;">
		<table width="242" class="mList" cellpadding="0" cellspacing="0">
			<tr>
				<td height="32" bgcolor="F7F7F8" class="title2">Affiliates</td>
			</tr>
			<tr>
				<td bgcolor="#ffffff">
					<!--- ##### START GFX MENU ##### --->
					<script language="javascript">
<!--
	function nletter(enquiry)
	{
		if (enquiry.fname.value == '')
		{
		    alert("Please Enter Your Name!");
		    enquiry.fname.focus();
		    return false;
		}
		if (enquiry.email.value == '')
		{
		    alert("Please Enter Your Email Address!");
		    enquiry.email.focus();
		    return false;
		}
		if ((enquiry.email.value.indexOf('@') == -1) || (enquiry.email.value.indexOf('.') == -1))
		{
			alert("Please Enter Valid Email Address!");
			enquiry.email.focus();
			return false;
		}
		return true;
	}
//-->
</script>
<form method="POST" action="nLetter_signup.php" id=nlet name=nlet onSubmit="return nletter(this)">
<table>
<tr>
	<td>First Name</td>
	<td><input type="text" name="fname" size="20" value="First Name" onFocus="if(this.value=='First Name')this.value='';"></td>
</tr>
<tr>
	<td>Email Address</td>
	<td><input type="text" name="email" size="20" value="E-Mail Address" onFocus="if(this.value=='eMail Address')this.value='';"></td>
</tr>
<tr>
	<td>Sign me up!</td>
	<td><input type="radio" name="action" value="signup" checked></td>
</tr>
<tr>
	<td>Remove </td>
	<td><input type="radio" name="action" value="remove"></td>
</tr>
<tr>
	<td colspan="2"><input type="submit" name="submit" value="Sign-up" style="background-color:#FFFFFF; font-size: 10px; color:#000000; font-family: verdana, geneva, helvetica, arial;"></td>
</tr>
</table>

</form>
					<!--- ##### START GFX MENU ##### --->
				</td>
			</tr>
		</table>
		</div>
              <!--- ##### START CATS MENU ##### --->
<!--- ##### START CATS MENU ##### --->	</td>
  </tr>
</table>
		</div>
			</td>
		  </tr>
		</table>
  </div>
			</td>
</tr>
</table>
