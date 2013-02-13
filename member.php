 <tr>
			  <td colspan="1" width="330" height="60"><img src="DR1.jpg" alt="Divine Requiem" border="0" usemap="#Map">
                <map name="Map">
                  <area shape="rect" coords="3,4,322,54" href="http://www.divinerequiem.net">
            </map></td>
			<td colspan="1" width="472" height="60" background="DR2.jpg">
				<?php
if ($logged_in == 1) {
	echo 'Logged in as '.$_SESSION['username'].', <a href="logout.php">logout</a>';
} else {
	include ("connect.php");
}
?>
			</td>
		  </tr>