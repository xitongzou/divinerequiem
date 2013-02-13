<?php
$host = 'localhost';
$user = 'diviner_Gofishus';
$password = 'quest';
$database = 'diviner_Register';

$connection = mysql_connect($host,$user,$password)
or die ("couldn't connect to server"); $db = mysql_select_db($database,$connection)
or die ("Couldn't select database");

$cat = $_GET["cat"];

if ($cat=="")
{
$query = "select * from `layouts` order by id desc ";
}
else
{
$query = "select * from `layouts` where `category`='$cat' order by id desc ";
}

$result = mysql_query($query, $connection) or die
("Could not execute query : $query ." . mysql_error());
$rows = mysql_num_rows($result);
if ($rows=="0") { echo "No layouts found."; } //This is the message that shows up if your table is empty.


//CODE A
// Start paging variables
$screen = $_GET['screen'];
$PHP_SELF = $_SERVER['PHP_SELF'];
$rows_per_page=5; // number of records per page
$total_records=mysql_num_rows($result);
$pages = ceil($total_records / $rows_per_page); // calculate number of pages required

if (!isset($screen))
$screen=0;
$start = $screen * $rows_per_page; // determine start record
$query .= "LIMIT $start, $rows_per_page";
$result= mysql_query($query) or die
("Could not execute query : $query ." . mysql_error());
while ($row=mysql_fetch_array($result))
{

$id=$row["id"];
$name=$row["name"];
$artist=$row["artist"];
$artisturl=$row["artisturl"];
$series=$row["series"];
$category=$row["category"];
$date=$row["date"];
$extras=$row["extras"];
$previewimage=$row["previewimage"];
$download=$row["download"];
$viewhtml=$row["viewhtml"];


echo "
<center>
<div class=\"head\">$name</div>
<div class=\"blog\">
<BR><img src=\"$previewimage\" border=\"1px solid #000000\" valign=\"top\" align=\"left\">
<b>ID:</b> $id<br>
<b>Name:</b> $name <br>
<b>Artist:</b> <a href=\"$artisturl\">$artist</a><br>
<b>Series:</b> $series<br>
<b>Category:</b> $category <br>
<b>Date:</b> $date <br>
<b>Extras:</b> $extras <br>
<br>
<br><br><br>
<table width=\"100%\"><tr><td><center>
<a href=\"$viewhtml\" target=\"_blank\">Preview</a> | <a href=\"$download\">Download</a>
</td></tr>
</table>
</div>
<br><br>";

}
//CODE B
// create the dynamic links
if ($screen > 0) {
$j = $screen - 1;
$url = "$PHP_SELF?x=layout&screen=$j";
echo "<a href=\"$url\">«</a> |"; // generate the prev text link so long as page is not first page
}

// page numbering links now
$p = 5; // number of links to display per page
$lower = $p; // set the lower limit to $p
$upper = $screen+$p; // set the upper limit to current page + number of links per page


while($upper>$pages){
$p = $p-1;
$upper = $screen+$p;
}
if($p<$lower){
$y = $lower-$p;
$to = $screen-$y;
while($to<0){
$to++;
}
}
if(!empty($to))
{ for ($i=$to;$i<$screen;$i++){
$url = "$PHP_SELF?x=layout&screen=" . $i;
$j = $i + 1;
echo " <a href=\"$url\">$j</a> ";
}
}
for ($i=$screen;$i<$upper;$i++) {
$url = "$PHP_SELF?x=layout&screen=" . $i;
$j = $i + 1;
echo " <a href=\"$url\">$j</a> ";
}

if ($screen < $pages-1) {
$j = $screen + 1;
$url = "$PHP_SELF?x=layout&screen=$j";
echo " | <a href=\"$url\">» </a>";
}
?>