<?php

if(!isset($mode))
{
$mode = 'list'; // set the default mode to list subscribers
}

?><p><strong>Newsletter Administration</strong></p><?php

switch ($mode)
{
case 'list':
$q = "select * from newsletter order by postdate desc ";
$rs = mysql_query($q);

?>
<table cellpadding="1" cellspacing="1" border="1" >
<tr><td><strong>Newsletter Title</strong></td><td>Post Date</td><td>Commands</td></tr>
<?php

while ($row = mysql_fetch_array($rs))
{
extract ($row);
// Display records into table rows.
echo "<tr><td><strong>$title</strong></td><td>$postdate</td>
<td><a href=\"$PHP_SELF?mode=edit&news_id=$news_id\">Edit</a> | 
<a href=\"$PHP_SELF?mode=delete&news_id=$news_id\">Delete</a></td></tr>";
}
?></table><?php

break;

case 'add':
// Display Adding Form.
?><form action="nindex.php?mode=insert" method="post">
<table cellpadding="1" border="1">
<tr>
<td><strong>Newsletter Title:*</strong></td>
<td><input type="text" name="title" size="30" maxlength="250"></td>
</tr>
<tr>
<td><strong>Content:*</strong><br>HTML Code okay.</td>
<td><textarea name="content" rows="10" cols="35"></textarea></td>
</tr>
<tr><td colspan="2">
Dispatch Newsletter?<input type="checkbox" name="dispatch" value="yes">
<p><input type="submit" name="submit"></p></td></tr>
</table>
</form> 
<?php

break;

case 'insert':

// check that all fields are filled in
if (empty($title) || empty($content))
{
die ("Error! Please fill in all required fields.");
}

// insert into database
$newRecord = "insert into newsletter (news_id, title, content, postdate) 
VALUES ('','$title','$content', now()) ";
$rsRecord = mysql_query($newRecord);

if ($rsRecord && $dispatch == 'yes') // administrator wants to send newsletter out
{
$lastid= mysql_insert_id();
// redirect administrator to dispatch mode
header("Location: nindex.php?mode=dispatch&news_id=$lastid");
}
else {
echo "Success! Newsletter recorded.";
}

break;

case 'delete':
$remove = "delete from newsletter where news_id='$news_id' ";
$rs = mysql_query($remove);

if ($rs)
{
echo "Success, newsletter deleted.";
}


break;

case 'edit':

$q = "select * from newsletter where news_id=$news_id ";
$rs = mysql_query($q);

while ($row = mysql_fetch_array($rs))
{
extract($row);
// Display Editing Form.
?>
<form action="<?php echo "nindex.php?mode=update&news_id=$news_id"; ?>" method="post">
<table cellpadding="1" border="1">
<tr>
<td><strong>Title:</strong></td>
<td><input type="text" name="title" size="30" maxlength="250" value="<?php echo "$title"; ?>"></td>
</tr>
<tr>
<td><strong>Content:*</strong><br>HTML Code okay.</td>
<td><textarea name="content" rows="10" cols="35"><?php echo "$content"; ?></textarea></td>
</tr>
<tr><td colspan="2">
Dispatch Newsletter?<input type="checkbox" name="dispatch" value="yes">
<p><input type="submit" name="submit"></p></td></tr>
</table>
</form>
<?php
}
break;

case 'update':
// check that all fields are filled in
if (empty($title) || empty($content))
{
die ("Error! Please fill in all required fields.");
}

// Update query
$update = "update newsletter set title='$title', content='$content' where news_id='$news_id' ";
$rsUpdate = mysql_query($update);

if ($rsUpdate && $dispatch=='yes')
{
// Administrator wants to dispatch newsletter, redirect to dispatch mode
header("Location: nindex.php?mode=dispatch&news_id=$news_id");

}
else {
echo "Success, Newsletter updated.";
}

break;


} 
?>