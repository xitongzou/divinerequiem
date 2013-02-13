<?php if ($master_page == true) { ?>

<?php
/************************************************************************************************
 * FLAM Player ADMINISTRATION - Section 1: Only Message - Musics dir empty or Cannot reach      *
 * Copyright (C) 2005 - DualBase Design s.e.n.c.                                                *
 ************************************************************************************************
 * Author:  DualBase Design                                                                     *
 * Email:   info@dualbase.com                                                                   *
 * Website: http://www.dualbase.com                                                             *
 * Support: http://www.dualbase.com/forum                                                       *
 ************************************************************************************************
 * FLAM Player is not Open Source, FLA and PHP codes are copyrighted and cannot be sold         *
 *                                                                                              *
 * YOU CAN :                                                                                    *
 * - Install FLAM Player where you want, for personal or commercial use                         *
 *   (The FLAM Player footer with links must stay visible)                                      *
 *                                                                                              *
 * YOU CANNOT :                                                                                 *
 * - Sell FLAM Player or any portion of it, as a product or a service                           *
 * - Copy / Modify / Rename / Decompile SWF / Redistribute FLAM Player's files wihout           *
 *   prior authorisation of Dualbase s.e.n.c.                                                   *
 * - Use FLAM Player to broadcast illegal MP3 files                                             *
 ************************************************************************************************/
?>

<div id="block_add_quickscan">
	<div id="block_title">
		<h2><?php echo $text[26][$langage]; ?></h2><h3> <?php echo $text[27][$langage]; ?></h3>
	</div>
	
	<table width="730" border="0" align="center" cellspacing="2" cellpadding="0" id="add_form_table">
		<tr>
			<td height="110" align="center">
				
				<?php 
					if($musics_dir == false){
						echo $message[212][$langage];}
					else { if ($message[$mode[2]]) {echo $message[$mode[2]][$langage];}}
				?>
				
			</td>
		</tr>
	</table>
	</form>
</div>

<?php } else { echo "<font color=\"#FF0000\" size=\"7\">Forbidden</font>"; } ?>