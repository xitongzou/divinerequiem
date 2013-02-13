<style type="text/css">
<!--
.style2 {font-size: 14px}
-->
</style>
<table wanimeth="100%" cellpadding="4" cellspacing="0" border="0" class="forumline">

  <tr>

 	  <th class="class="1"" align="left" colspan="2">Anime Archives</th>


  </tr>


  <tr>
	<td colspan="2" align="left" bordercolor="#070E12" class="row1"><p class="style2"><strong><a href="http://divinerequiem.net/index.php?id=archives&anime=ac">A-C</a></strong> (10) | <strong><a href="http://divinerequiem.net/index.php?id=archives&anime=df">D-F</a></strong> (10) |<strong> <a href="http://divinerequiem.net/index.php?id=archives&anime=gl">G-L</a> </strong> (10) | <strong><a href="http://divinerequiem.net/index.php?id=archives&anime=mo">M-O</a></strong> (7) | <strong><a href="http://divinerequiem.net/index.php?id=archives&anime=pr">P-R</a></strong> (4) | <strong><a href="http://divinerequiem.net/index.php?id=archives&anime=su">S-U</a></strong> (5) | <strong><a href="http://divinerequiem.net/index.php?id=archives&anime=vz">V-Z</a></strong> (4) | <a href="http://divinerequiem.net/index.php?id=archives&anime=movie"><strong>Movies</strong></a> (10) </p>
      <?php

$anime = $_GET["anime"];

if(!($anime=="")) {
$anime = basename($anime);
$anime .= ".php";
if (is_file("./$anime")) {
include($anime);
} else {
echo "The file you are looking for, index.php?anime=$anime is missing"; /* you can customize 
this part to display the error page in case your include page goes missing */
}
} 
?>    </td>
  </tr>


</table>