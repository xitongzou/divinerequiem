<?PHP

// The MySQL Connection Variables Edit With Your Connection Details.

$dbh = mysql_connect ("localhost", "diviner_Gofishus", "quest") or die ('Unable to Connect: ' . mysql_error());
mysql_select_db ("diviner_Register");

// Layout Folder Path.

$path = 'http://divinerequiem.net/layouts/';

// Admin Panel Username.

$adminusername ='Gofishus';

// Admin Panel Password - Different From Your Normal One - Suggested.

$adminpassword = 'quest';

// Activate Preview Frame. Yes or No. No = Preset.

$activeframe = 'No';

// Frame Path.

$framepath = 'http://domain.com/previewing.php';

// Automatically Extract .ZIP file Yes or No. No = Preset.

$extractzip = 'No';

// Extract Zip File Path
$zippath = '';


// // // // // // // // // // // // // // // // // // // // // // // // // // //


// Begin The Table Coding

$begintable ='<center><table border="1" bordercolor="#000000" width="90%">';

// The Title Field (Name Of Layout).

$begintitle = '<tr><td align="center" colspan="2"><b><i>';

// The End Of Title Field Usually Ends </b></i></td></tr> tags etc.

$endtitle = '</b></u></td></tr>';

// Begin The Image Usually a <td valign="left" width="100">.

$beginimage = '<tr><td valign="left" width="100">';

// End The Image Section Usually </td>.

$endimage = '</td>';

// Begin The Stats Series, Type, Artist etc.

$beginstats = '<td valign="top">';

// End The Preview Image And Stats row </TD>.

$endcenter = '</td></tr>';

// Beging The Preview/Download area.

$beginpd = '<tr><td colspan="2" align="center">';

// End The Preview/Download Area, And Table.

$endpd = '</td></tr></table></center><BR>';


// // // // // // // // // // // // // // // // // // // // // // // // // // //

// Admin Panel Border Color
$adminbordercolor = '#000000';

// Admin Panel Border Width
$adminborderwidth = '1';

// Admin Background Color One > #C0C0C0 = Grey
$adminbackgroundone = '#C0C0C0';

// Admin Backgroung Color Two > #FFFFFF = White
$adminbackgroundtwo = '#FFFFFF';


// // // // // // // // // // // // // // // // // // // // // // // // // // //


// Top Template
$sitetop = '<html> <head> <title> DFScripts.info Layout Database V1.0 </title> <link

rel="stylesheet" type="text/css" href="style.css"> </head> <body>


<table border="0" cellspacing="0" cellpadding="0">
<tr><td>
<img src="indeximage.gif"></td><td>&nbsp; <iframe src="http://dfscripts.info/updates.php?version=V1.0" border="0" style="BORDER: 1PX SOLID #808080" height="150" width="400"></iframe></td></tr></table>



<BR>

<table style="border-collapse: collapse;" border="1" bordercolor="#808080"

cellpadding"3" cellspacing="2" width="95%">
<tr><td>
';

// Bottom Template


// DONT REMOVE THIS AS IT VIOLATES OUR TERMS OF SERVICE, WANNA REMOVE IT PURCHASE THE LICENSE ONLY $5.00.
// http://residentfantasy.com/terms.php > http://residentfantasy.com/license


$sitebottom = '</td></tr></table><br><center>Layout Database © <a href="http://residentfantasy.com">ResidentFantasy</a>
              |
              Site © <a href="mailto:admin@divinerequiem.net">Gofishus</a></center></body></html>';


// // // // // // // // // // // // // // // // // // // // // // // // // // //

              

// // // /IMAGE GALLERY/ // /UNAVALIABLE/ // /AT/ // /THE/ // /MOMENT/ // // //


// Have You Installed The Image Gallery? Yes or No. No = Preset.

$imagegallery = 'No';

// Image Gallery Path

$gallerypath = 'http://domain.com/gallery/';



?>
