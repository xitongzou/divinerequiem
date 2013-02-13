<style type="text/css">
<!--
.style2 {font-size: 14px}
-->
</style>
<table wtutth="100%" cellpadding="4" cellspacing="0" border="0" class="forumline">

  <tr>

 	  <th class="class="1"" align="left" colspan="2">Tutorials</th>


  </tr>


  <tr>
	<td colspan="2" align="left" bordercolor="#070E12" class="row1"><p class="style2"><strong>HTML/CSS</strong> (0) | <strong>VB/ASP</strong> (0) | <a href="http://divinerequiem.net/index.php?id=tut&tut=phptut"><strong>PHP/MySQL</strong></a> (2) | <strong>Photoshop</strong> (0) | <strong>PSP</strong> (0) | <strong>Flash MX</strong> (0) | <strong>Misc</strong> (0) </p>
    <?php

$tut = $_GET["tut"];

if(!($tut=="")) {
$tut = basename($tut);
$tut .= ".php";
if (is_file("./$tut")) {
include($tut);
} else {
echo "The file you are looking for, index.php?tut=$tut is missing"; /* you can customize 
this part to display the error page in case your include page goes missing */
}
} 
?>    </td>
  </tr>


</table>