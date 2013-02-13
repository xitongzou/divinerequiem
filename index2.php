<?php
$phpbb_root_path = 'main/';
define ('IN_PHPBB', true);
if (!file_exists($phpbb_root_path . 'extension.inc'))
{
	die ('<tt><b>phpBB Fetch All:</b>
		$phpbb_root_path is wrong and does not point to your forum.</tt>');
}
//
// phpBB related files
//
include "poll/db/poll_cookie.php";
include_once ($phpbb_root_path . 'extension.inc');
include_once ($phpbb_root_path . 'common.' . $phpEx);
include_once ($phpbb_root_path . 'includes/bbcode.' . $phpEx);
include_once ($phpbb_root_path . 'mods/phpbb_fetch_all/common.' . $phpEx);
include_once ($phpbb_root_path . 'mods/phpbb_fetch_all/stats.' . $phpEx);
include_once ($phpbb_root_path . 'mods/phpbb_fetch_all/users.' . $phpEx);
include_once ($phpbb_root_path . 'mods/phpbb_fetch_all/polls.' . $phpEx);
include_once ($phpbb_root_path . 'mods/phpbb_fetch_all/posts.' . $phpEx);
include_once ($phpbb_root_path . 'mods/phpbb_fetch_all/forums.' . $phpEx);

//
// start session management
//
if (isset($HTTP_GET_VARS['start']) or isset($HTTP_POST_VARS['start']))
{
	$CFG['posts_span_pages_offset'] = isset($HTTP_GET_VARS['start'])
	? $HTTP_GET_VARS['start'] : $HTTP_POST_VARS['start'];
	if (!intval($CFG['posts_span_pages_offset']))
	{
		$CFG['posts_span_pages_offset'] = 0;
	}
	if (!is_numeric($CFG['posts_span_pages_offset']))
	{
		$CFG['posts_span_pages_offset'] = 0;
	}
	if ($CFG['posts_span_pages_offset'] < 0) {
		$CFG['posts_span_pages_offset'] = 0;
	}
}
// fetch new posts since last visit
$new_posts = phpbb_fetch_new_posts();
// fetch user online, total posts, etc
$stats = phpbb_fetch_stats();
// fetch online users
$online = phpbb_fetch_online_users();
// fetch five users by total posts
$top_poster = phpbb_fetch_top_poster();
// fetch a random user
$random_user = phpbb_fetch_random_user();
// fetch forum structure
$forums = phpbb_fetch_forums();
// fetch a poll
$poll = phpbb_fetch_poll();
// fetch a single topic by topic id
// You will need to specify a certain topic id to use this function.
// The first post of that topic will be displayed in a box to the upper right.
#$topic = phpbb_fetch_topics();
// fetch latest postings
$CFG['posts_trim_topic_number'] = 25;
$recent = phpbb_fetch_posts(null, POSTS_FETCH_LAST);
// fetch postings
$CFG['posts_trim_topic_number'] = 0;
$CFG['posts_span_pages']        = true;
$news = phpbb_fetch_posts();
//
// disconnect from the database
//
phpbb_disconnect();
?>
<html>
<head>
<title>Divine Requiem - The Ultimate Anime/Graphics Resource Community</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META name="Description" content="The ultimate anime & graphics resource community!">
<META name="Keywords" content="DBZ, pokemon, graphics, icons, avatars, buttons, banners, backgrounds, layouts, manga, PNGs, templates, textures, digimon, evangelion, escaflowne, naruto, cowboy bebop, gundam wing, japanese anime, medabots, yu-gi-oh, beyblade, sailor moon, trigun, monster rancher, reviews, designs, forums, community">
<META NAME="Generator" CONTENT="Microsoft Word 2000">
<meta name="distribution" content="Global">
<meta name="Rating" content="General">
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="English">
<META HTTP-EQUIV="EXPIRES" CONTENT="">  
<meta name="language" content="en-us">  
<title>Divine Requiem</title>
<link rel="stylesheet" href="BBTech.css" type="text/css">
<LINK REL="SHORTCUT ICON" HREF="favicon.ico">
<style type="text/css">
<!--
.helpline { 
BORDER-RIGHT: #47475D 1px solid; 
BORDER-TOP: #121316 2px solid; 
BORDER-BOTTOM: #47475D 1px solid;
BORDER-LEFT: #121316 2px solid;
background:#0D0E13; 
}


#dropmenudiv{
position:absolute;
background-color: #1E1E2A;
border:1px solid black;
border-bottom-width: 0;
font:normal 12px Verdana;
line-height:18px;
z-index:100;
}

#dropmenudiv a{
width: 100%;
display: block;
text-indent: 3px;
border-bottom: 1px solid black;
padding: 1px 0;
text-decoration: none;
font-weight: bold;
}

#dropmenudiv a:hover{ /*hover background color*/
background-color: #9999CC;
}

/* Sample CSS definition for the example list. Remove if desired */
.navlist li {
list-style-type: square;
width: 135px;
background-color: #FFFFB9;
}

.style1 {font-size: 14px}
a {
	font-weight: bold;
	color: #CCCCCC;
	text-decoration: none;
}
.news {
	font-family: Arial, Helvetica, sans-serif;
	color: #E4E4E4;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}

-->

</style>
<script language="javascript" src="menu.js"></script>
<script language="javascript" src="image.js"></script>
</head>
<body bgcolor="#1E1E2A" text="#e4e4e4" link="#0000FF" vlink="#0000FF" LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>
<!--
<TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0>
<tr><td width="100%"><img src="images/bg1.jpg" width="100%" height="200"></td>
</tr></table> -->
<TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0>
<TR>
<TD COLSPAN=2>
<img src="main/templates/BBTech/images/BBTech-hd_01.gif" WIDTH=348 HEIGHT=10></TD>
<TD ROWSPAN=5 background="main/templates/BBTech/images/BBTech-hd_full.gif" WIDTH=100% HEIGHT=144></TD>
<TD COLSPAN=8 ROWSPAN=3>
<script language="javascript">
showImage();
</script></TD>
<TD>
<img src="main/templates/BBTech/images/spacer.gif" WIDTH=1 HEIGHT=10></TD>
</TR>
<TR>
<TD ROWSPAN=4>
<img src="main/templates/BBTech/images/BBTech-hd_04.gif" WIDTH=18 HEIGHT=134></TD>
<TD>
<!-- UNCOMMENT THIS LINE IF YOU WISH TO USE GIF INSTEAD OF FLASH<img src="main/templates/BBTech/images/BBTech-hd_logo.gif" WIDTH=330 HEIGHT=72>-->
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="330" height="72" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="main/templates/BBTech/images/logo.swf" />
<param name="menu" value="false" />
<param name="quality" value="high" />
<param name="scale" value="exactfit" />
<param name="wmode" value="transparent" />
<param name="bgcolor" value="#ffffff" />
<embed src="main/templates/BBTech/images/logo.swf" menu="false" quality="high" scale="exactfit" wmode="transparent" bgcolor="#ffffff" width="330" height="72" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
</TD>
<TD>
<img src="main/templates/BBTech/images/spacer.gif" WIDTH=1 HEIGHT=72></TD>
</TR>
<TR>
<TD ROWSPAN=3>
<img src="main/templates/BBTech/images/BBTech-hd_06.gif" WIDTH=330 HEIGHT=62></TD>
<TD>
<img src="main/templates/BBTech/images/spacer.gif" WIDTH=1 HEIGHT=10></TD>
</TR>
<TR>
<TD ROWSPAN=2>
<img src="main/templates/BBTech/images/BBTech-hd_07.gif" WIDTH=20 HEIGHT=52></TD>
<TD>
<A HREF="http://divinerequiem.net/main/faq.php">
<img src="main/templates/BBTech/images/BBTech-hd_08.gif" WIDTH=39 HEIGHT=22 BORDER=0 ALT="FAQ"></A></TD>
<TD>
<A HREF="http://divinerequiem.net/main/search.php">
<img src="main/templates/BBTech/images/BBTech-hd_09.gif" WIDTH=59 HEIGHT=22 BORDER=0 ALT="Search"></A></TD>
<TD>
<A HREF="http://divinerequiem.net/main/memberlist.php">
<img src="main/templates/BBTech/images/BBTech-hd_10.gif" WIDTH=91 HEIGHT=22 BORDER=0 ALT="Memberlist"></A></TD>
<TD>
<A HREF="http://divinerequiem.net/main/groupcp.php">
<img src="main/templates/BBTech/images/BBTech-hd_11.gif" WIDTH=90 HEIGHT=22 BORDER=0 ALT="Usergroups"></A></TD>
<TD>
<A HREF="http://divinerequiem.net/main/profile.php?mode=editprofile">
<img src="main/templates/BBTech/images/BBTech-hd_12.gif" WIDTH=63 HEIGHT=22 BORDER=0 ALT="Profile"></A></TD>
<TD>
<A HREF="http://divinerequiem.net/main/privmsg.php?folder=inbox">
<img src="main/templates/BBTech/images/BBTech-hd_13.gif" WIDTH=35 HEIGHT=22 BORDER=0 ALT="Log in to check your private messages"></A></TD>
<TD ROWSPAN=2>
<img src="main/templates/BBTech/images/BBTech-hd_14.gif" WIDTH=21 HEIGHT=52></TD>
<TD>
<img src="main/templates/BBTech/images/spacer.gif" WIDTH=1 HEIGHT=22></TD>
</TR>
<TR>
<TD COLSPAN=6 align=right valign=bottom background="main/templates/BBTech/images/BBTech-hd_button.gif" WIDTH=377 HEIGHT=30>
<a href="http://divinerequiem.net/main/index.php">
<img src="main/templates/BBTech/images/home.gif" border="0" alt="Divine Requiem Forum Index"/></a>&nbsp;
<a href="http://divinerequiem.net/main/login.php"><img src="main/templates/BBTech/images/logout.gif" border="0" alt="Log in"/></a>&nbsp;
<a href="http://divinerequiem.net/main/profile.php?mode=register"><img src="main/templates/BBTech/images/register.gif" border="0" alt="Register"></a>
</TD>
<TD>
<img src="main/templates/BBTech/images/spacer.gif" WIDTH=1 HEIGHT=30></TD>
</TR>
</TABLE>
<TABLE WIDTH="100%" height=100% align=center BORDER="0" CELLPADDING=0 CELLSPACING=0><TR>
<TD WIDTH="15" valign=top background="main/templates/BBTech/images/lt.gif">
<img src="main/templates/BBTech/images/spacer.gif" WIDTH="15" HEIGHT="1"></TD>
<TD WIDTH="100%" bgcolor="#1E1E2A" valign=top>

<table border="0" cellspacing="4" cellpadding="0" width="100%"><tr valign="top"><td width="160" ><table width="160" cellpadding="4" cellspacing="0" border="0" class="forumline" >
  		<tr>
 	 		 <th class="class="1"" align="left" colspan="2">Navigation</th>
  		</tr>
		<tr>
  	  <td class="row1" valign="center" colspan="2"><span class="genmed"><a href="http://divinerequiem.net/main/viewforum.php?f=4" onMouseover="dropdownmenu(this, event, menu1, '165px')" onMouseout="delayhidemenu()"><img src="images/folder.gif" width="19" height="18" border="0">Site</a></span></td>
		</tr>
		<tr>
  	  <td class="row1" valign="center" colspan="2"><span class="genmed"><a href="http://divinerequiem.net/main/viewforum.php?f=15" onMouseover="dropdownmenu(this, event, menu2, '165px')" onMouseout="delayhidemenu()"><img src="images/folder.gif" width="19" height="18" border="0">Anime</a></span></td>
		</tr>
		<tr>
  	  <td class="row1" valign="center" colspan="2"><span class="genmed"><a href="http://divinerequiem.net/main/viewforum.php?f=8" onMouseover="dropdownmenu(this, event, menu3, '165px')" onMouseout="delayhidemenu()"><img src="images/folder.gif" width="19" height="18" border="0">Graphics</a></span></td>
		</tr>
		<tr>
  	  <td class="row1" valign="center" colspan="2"><span class="genmed"><a href="http://divinerequiem.net/main/viewforum.php?f=9"><img src="images/folder.gif" width="19" height="18" border="0">Layouts</a></span></td>
		</tr>
		<tr>
  	  <td class="row1" valign="center" colspan="2"><span class="genmed"><a href="http://divinerequiem.net/main/viewforum.php?f=26"><img src="images/folder.gif" width="19" height="18" border="0">Entertainment</a></span></td>
		</tr>
		<tr>
  	  <td class="row1" valign="center" colspan="2"><span class="genmed"><a href="http://divinerequiem.net/main/viewforum.php?f=19" onMouseover="dropdownmenu(this, event, menu6, '165px')" onMouseout="delayhidemenu()"><img src="images/folder.gif" width="19" height="18" border="0">Literature</a></span></td>
		</tr>
		<tr>
  	  <td class="row1" valign="center" colspan="2"><span class="genmed"><a href="http://divinerequiem.net/main/viewforum.php?f=23" onMouseover="dropdownmenu(this, event, menu7, '165px')" onMouseout="delayhidemenu()"><img src="images/folder.gif" width="19" height="18" border="0">Tutorials</a></span></td>
		</tr>
		<tr>
  	  <td class="row1" valign="center" colspan="2"><span class="genmed"><a href="http://divinerequiem.net/main/viewforum.php?f=7" onMouseover="dropdownmenu(this, event, menu8, '165px')" onMouseout="delayhidemenu()"><img src="images/folder.gif" width="19" height="18" border="0">Downloads</a></span></td>
		</tr>
		<tr>
  	  <td class="row1" valign="center" colspan="2"><span class="genmed"><A href="javascript:window.external.AddFavorite('http://www.divinerequiem.net','Divine Requiem')"><img src="images/folder.gif" width="19" height="18" border="0">Favorites+</a></span></td>
		</tr>
 </table>

<br clear="all" />
<table width="160" cellpadding="4" cellspacing="0" border="0" class="forumline" >
<tr>
  <th class="class="1"" align="left" >&nbsp;Log in&nbsp;</th>
</tr>
  <tr>
     <td class="row1" valign="middle" height="28"><span class="gensmall">
<form method="post" action="http://divinerequiem.net/main/login.php?sid=e19dba55521badb41ebdb256b72f8c31">
  Username:<br />
  <input class="post" type="text" name="username" size="10" /><br />
     Password:<br /><input class="post" type="password" name="password" size="10" /><br />
     <input class="text" type="checkbox" name="autologin" value="ON" />&nbsp;Log me on automatically each visit<br />
      <input type="submit" class="mainoption" name="login" value="Log in" /> or <a href="http://divinerequiem.net/main/profile.php?mode=register&sid=ca79d0ab0c6f3466ef26732c0d824f88">Register</a>
</form>
     </td>
  </tr>
</table>
<br clear="all" />

<table width="160" cellpadding="4" cellspacing="0" border="0" class="forumline">
	<tr>
		<th class="class="1"" align="left">&nbsp;Surveys/Polls&nbsp;</th>
	</tr>
	<tr>
		<td class="row1">
<?php

/* path */ 
$poll_path = "/home/diviner/public_html/poll/db";

require $poll_path."/include/config.inc.php";
require $poll_path."/include/$POLLDB[class]";
require $poll_path."/include/class_poll.php";
require $poll_path."/include/class_pollcomment.php";
require $poll_path."/include/class_plist.php";
$CLASS["db"] = new polldb_sql;
$CLASS["db"]->connect(); 
$php_poll = new plist();
/* poll */
if (isset($HTTP_GET_VARS['poll_id'])) {
   echo $php_poll->poll_process($HTTP_GET_VARS['poll_id']);
} else {
   echo $php_poll->poll_process("random");
}
/* poll list 
$php_poll->set_template("poll_list");
$php_poll->set_date_format("m/d/Y");
echo $php_poll->view_poll_list();
echo $php_poll->get_list_pages(); */

?>		</td>
	</tr>
</table>
<br clear="all" />
<table width="160" cellpadding="4" cellspacing="0" border="0" class="forumline">
	<tr>
		<th class="class="1"" align="left">&nbsp;Advertisements</th>
	</tr>
	<tr>
		<td class="row1">
		<!-- Begin: AdBrite -->
<style type="text/css">
.adHeadline {font: bold 10pt Arial; text-decoration: underline; color: blue;}
.adText {font: normal 10pt Arial; text-decoration: none; color: white;}
</style>
<script type="text/javascript" src="http://4.adbrite.com/mb/text_group.php?sid=78279&br=1&dk=706572736f6e616c735f355f31"></script>
<p />
<div><a class="adHeadline" target="_top" href="http://www.adbrite.com/mb/commerce/purchase_form.php?opid=78279&afsid=1">Your Ad Here</a></div>
<!-- End: AdBrite -->
		</td>
	</tr>
</table>
<br clear="all" />
</td><td width="100%" >
<table width="100%" cellpadding="4" cellspacing="0" border="0" class="forumline">

  <tr>

 	  <th class="class="1"" align="left" colspan="2">&nbsp;Conception of Divine Requiem</th>


  </tr>


  <tr>
	<td colspan="2" align="left" bordercolor="#070E12" class="row1"><span class="genmed">Divine Requiem was concieved in February of 2006, an mere idea in the mind of Gofishus. After browsing and observing all the various anime and graphics sites out there, he figured that there many redundant and stereotypical attributes of everyone of them. He found sites like daydreamgraphics.com or celestial-star.net and found that they allowed the common community to become involved in the development. He found this idea really unique and took his inspiration from those sites. Divine Requiem's goal is to be a fully functional forum-driven site. What this means is that the entire site was going to be on the forums. While some people frowned upon this idea initally, it may be mentioned that gaia online uses the same system and generates thousands of users. Gofishus took all his information already gathered from his previous site, Japanime, and amalgated it with Divine Requiem's community-based interface and created a website that could offer much more than just anime and graphics. By being forum-based, Divine Requiem eliminates the tedious elements of conventional anime sites and supercedes it in many ways:
	<p>
	-A search engine is already built in.<br>
-A user authentication system is already built in.<br>
-Users can comment and submit information readily.<br>
-The PHPBB forum can sort topics and provides downloads without the hassle of sql/php scripts.<br>
-Forums can change layouts the same way a site can.<br>
-Information is divided within the forum the same way a site can.<br>
-HTML code can be used in the forum, meaning that it functions almost exactly like a regular site.<br>
-The Dynamic user interaction system is inherently part of the forum.<p>
The forum-based interface provides many advantages over traditional site building ethos. Some disadvantages may be that users may complain of not having the same 'anime-like' structure of other sites; Divine Requiem is not strictly an anime site. While sites like celestial-star or aethereality may prevail in terms of elegance and functionality, those sites are also ran by full time staff and are well-established; Divine Requiem was recently established and is run by Gofishus. 
    </span></td>
  </tr>


</table>
<br clear="all" />

<table width="100%" cellpadding="4" cellspacing="0" border="0" class="forumline">
  <tr>

 	  <th class="class="1"" align="left" colspan="2">Japanime</th>


  </tr>


  <tr>
	<td class="row1" align="left" colspan="2"><span class="genmed">
  <table width="100%" border="0" align="center" bordercolor="#000033">
				<tr><td> <a href="http://tong.theghost.org/lay4.jpg"><img src="http://tong.theghost.org/lay4.jpg" width="270" height="200" border="0"></a></td>
		<td bordercolor="#330066"><p class="style2">My 6th layout. Used from Jan 2005 - Current. It was made by my friend and affiliate, Kidd of animekidd.simply-torn.net. The GFX and mood it creates resembles that of a new beginning, a change of seasons, hence the New Years' update.</td></tr>
		<tr><td> <a href="http://tong.theghost.org/lay3.jpg"><img src="http://tong.theghost.org/lay3.jpg" width="270" height="200" border="0"></a></td>
		<td bordercolor="#330066"><p class="style2">My 5th layout. Used from Dec 2005 - Jan 2006. It was made to celebrate the coming of christmas, and the winter season. Again, the image was from minitokyo.net, and featured more content than my previous layout.</td></tr>
   <tr><td> <a href="http://tong.theghost.org/lay2.jpg"><img src="http://tong.theghost.org/lay2.jpg" width="270" height="200" border="0"></a></td>
   <td bordercolor="#330066"><p class="style2">My 4th layout. I used it from Nov 2005 - Dec 2005. The image is from minitokyo.net, and it was made to celebrate my shift to my new domain, simply-torn.net. It is a two-column div layout and features a javascript top menu, and a retractable side menu. It is also my first php-based layout. </td></tr>
    <tr><td> <a href="http://tong.theghost.org/lay1.jpg"><img src="http://tong.theghost.org/lay1.jpg" width="270" height="200" border="0"></a></td>
    <td bordercolor="#330066"><span class="style2">My 3rd layout. I used it from June. 2005 - Nov. 2005. It features DBZ, and is a three column table layout with DHTML side menus. This was my final layout to be hosted by angelfire, but I decided to change it after I moved my domain to simply-torn.net. </span></td></tr>
</table>
	</span></td>
  </tr>


</table>
<br clear="all" />
<table width="100%" cellpadding="4" cellspacing="0" border="0" class="forumline">
  <tr>
 	  <th class="class="1"" align="left" colspan="2">&nbsp;Site Map&nbsp;</th>

<input type="hidden" name="sid" value="f17757743972be576814d5aa2f37a702" />
</form>

  </tr>


  <tr>
	<td class="row1" align="left" colspan="2"><table width='100%' height="196" align="center" cellpadding="0" class="forumline">
		<tr>
			<td>
			  <div align="center"><span class="style1"><strong><a href="http://divinerequiem.net/main/viewforum.php?f=4">Site</a>: </strong>
				  <a href="http://divinerequiem.net/main/viewtopic.php?t=23">Staff</a> | 
				  <a href="http://divinerequiem.net/main/viewtopic.php?t=22">Contact</a> | 
				  <a href="http://divinerequiem.net/main/viewtopic.php?t=24">Info</a> | 
				  <a href="http://divinerequiem.net/main/viewtopic.php?t=21">FAQs</a> | 
				  <a href="http://divinerequiem.net/main/viewtopic.php?t=20">Awards</a> | 
				  <a href="http://divinerequiem.net/main/viewtopic.php?t=19">Credits/TOS</a> | <a href="http://divinerequiem.net/main/viewforum.php?f=26">Entertainment</a> | <a href="http://divinerequiem.net/main/viewforum.php?f=9">Layouts</a> <br>
				  <strong><a href="http://divinerequiem.net/main/viewforum.php?f=15">Anime</a>:</strong> <a href="http://divinerequiem.net/main/viewforum.php?f=16">Reviews</a> | <a href="http://divinerequiem.net/main/viewforum.php?f=17">Archives</a> | <a href="http://divinerequiem.net/main/viewforum.php?f=33">News</a> | <a href="http://divinerequiem.net/main/viewforum.php?f=34">Movies</a> <br>
			       <strong>Graphics: </strong>
				   <a href="http://divinerequiem.net/cpg144/thumbnails.php?album=2">Avatars | Wallpapers </a> |<a href="http://divinerequiem.net/cpg144/thumbnails.php?album=6"> Banners | Buttons</a>
|				   <a href="http://divinerequiem.net/cpg144/thumbnails.php?album=7">Icons</a> | <a href="http://divinerequiem.net/cpg144/thumbnails.php?album=4">Templates | PNGs</a><br>
			                      <strong><a href="http://divinerequiem.net/main/viewforum.php?f=19">Literature</a>:</strong>				                   <a href="http://divinerequiem.net/main/viewforum.php?f=21">Articles/Blogs</a> |<a href="http://divinerequiem.net/main/viewforum.php?f=20"> Fanfiction</a> <br>
								  
								  <strong><a href="http://divinerequiem.net/main/viewforum.php?f=23">Tutorials</a>:</strong> <a href="http://divinerequiem.net/main/viewforum.php?f=24">Coding</a> | <a href="http://divinerequiem.net/main/viewforum.php?f=25">Graphics</a> <br>
		  			              <strong><a href="http://divinerequiem.net/main/viewforum.php?f=7">Downloads</a>: </strong>				                  <a href="http://divinerequiem.net/cpg144/thumbnails.php?album=15">Fanart | AMVs</a> |
		  		 				  <a href="http://divinerequiem.net/main/viewforum.php?f=57">Fonts</a> | 
				                  <a href="http://divinerequiem.net/main/viewforum.php?f=55">Brushes</a> |
								  <a href="http://divinerequiem.net/main/viewforum.php?f=56">Textures</a> </span><br>
		        </div></td>
		</tr>
	</table></td>
  </tr>

</table>
</td>
<td width="180" ><table width="180" cellpadding="4" cellspacing="0" border="0" class="forumline">
  <tr>

 	  <th class="class="1"" align="left" colspan="2">&nbsp;Profile</th>

  </tr>


  <tr>
	<td class="row1" align="left" colspan="2"><span class="genmed">

<?php if ($userdata['session_logged_in']) { ?>
<table>
<tr>
<td valign="top"><?php echo phpbb_avatar_image($userdata['user_avatar_type'], $userdata['user_avatar']); ?></td>
<td valign="top">
<span class="gensmall">
<?php printf($lang['Welcome_subject'], $board_config['sitename']); ?>, <?php echo $userdata['username']; ?>.<br />
<?php printf($lang['You_last_visit'], create_date($board_config['default_dateformat'], $userdata['user_lastvisit'], $board_config['board_timezone'])); ?><p />
</span>
</td>
</tr>
</table>
<span class="gensmall">
<a href="<?php echo append_sid($phpbb_root_path .
'privmsg.php?folder=inbox');?>"><?php
if ($userdata['user_new_privmsg'] == 0) {
echo $lang['No_new_pm']; }
elseif ($userdata['user_new_privmsg'] == 1) {
printf($lang['New_pm'], $userdata['user_new_privmsg']); }
else {
printf($lang['New_pms'], $userdata['user_new_privmsg']); } ?></a><br />
<a href="<?php echo append_sid($phpbb_root_path . 'search.php?search_id=newposts'); ?>"><?php echo $lang['Search_new']; ?> (<?php echo $new_posts['total']; ?>)</a><br />
<a href="<?php echo append_sid($phpbb_root_path . 'search.php?search_id=egosearch'); ?>"><?php echo $lang['Search_your_posts']; ?></a><br />
<a href="<?php echo append_sid($phpbb_root_path . 'search.php?search_id=unanswered'); ?>"><?php echo $lang['Search_unanswered']; ?></a>
</span>
<?php } else { ?>
<span class="gensmall"><?php printf($lang['Welcome_subject'],
$board_config['sitename']); ?>, <?php echo $lang['Guest']; ?>.
<br />&nbsp;<br /> <a href="<?php echo append_sid($phpbb_root_path .
'profile.php?mode=register'); ?>"><?php echo $lang['Register']; ?></a>
</span>
<?php } ?>

	</span>
	</td>
  </tr>


</table>
<br clear="all" />

<table width="180" cellpadding="1" cellspacing="0" border="0" class="forumline">
	<tr>
		<th class="class="1"" align="left">Featured Avatar </th>
	</tr>
	<tr>
		<td class="row1" align="center" valign="middle" height="24">
		<?php $objCpm->cpm_viewRandomMediaFromAlbum(1,1,1); ?>
			</td>
	</tr>
</table>
	

<br clear="all" />

<table width="180" cellpadding="4" cellspacing="0" border="0" class="forumline">
  <tr>
	  <th class="class="1"" align="left" colspan="2" >Recent Posts </th>
  </tr>
		<tr>
      <td class="row1"  align="center">      <span class="gensmall">

<script language="JavaScript" type="text/javascript" src="http://divinerequiem.net/main/topics_anywhere.php?mode=show&f=a&n=5&sfn=y&fnl=y&r=y&sr=y&b=non&lpb=0&lpd=0&lpi=y"></script>
      </span></td>
		</tr>
</table>
<br clear="all" />


<table width="180" cellpadding="4" cellspacing="0" border="0" class="forumline">
  <tr>
   <form action="" method="post" >

 	  <th class="class="1"" align="left" colspan="2">Forum Statistics</th>

      <input type="hidden" name="sid" value="f17757743972be576814d5aa2f37a702" />
</form>

  </tr>


  <tr>
	<td colspan="2" align="left" class="row3"><img src="images/folder.gif" width="19" height="18">
	Your IP is 
	    <?php $visitorip = $_SERVER['REMOTE_ADDR']; echo "$visitorip"; ?> 
	    <br>
	    <img src="images/folder.gif" width="19" height="18">
	    <script type="text/javascript" language="javascript">
var sc_project=1324962; 
var sc_invisible=0; 
var sc_partition=9; 
var sc_security="da558809"; 
var sc_text=2; 
        </script>

        <script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script>  <noscript>
<a href="http://www.statcounter.com/" target="_blank"><img  src="http://c10.statcounter.com/counter.php?sc_project=1324962&amp;java=0&amp;security=da558809&amp;invisible=0" alt="html hit counter" border="0"></a>
	  </noscript>

      <!-- End of StatCounter Code -->  
      Total Hits 
      <br />
      <img src="images/folder.gif" width="19" height="18"><?php printf($lang['Posted_articles_total'], $stats['total_posts']); ?><br />
      <img src="images/folder.gif" width="19" height="18"><?php printf($lang['Registered_users_total'], $stats['total_users']); ?>
	  <br>
	  <img src="images/folder.gif" width="19" height="18">	<?php printf($lang['Newest_user'], '<a href="' . append_sid($phpbb_root_path . 'profile.php?mode=viewprofile&amp;u=' . $stats['user_id']) . '">', $stats['username'], '</a>'); ?>  </td>
  </tr>


</table>
<br clear="all" />
<table width="180" cellpadding="4" cellspacing="0" border="0" class="forumline">
  <tr>
   <form action="" method="post" >

 	  <th class="class="1"" align="left" colspan="2">Directory Statistics</th>

      <input type="hidden" name="sid" value="f17757743972be576814d5aa2f37a702" />
</form>

  </tr>


  <tr>
	<td colspan="2" align="left" class="row3"><img src="images/folder.gif" width="19" height="18">
	Total: <?php $objCpm->cpm_listMediaCountFrom(""); ?><br>
<img src="images/folder.gif" width="19" height="18">
	Avatars: <?php $objCpm->cpm_listMediaCountFrom("Album=1"); ?><br>
	<img src="images/folder.gif" width="19" height="18">
	Wallpapers: <?php $objCpm->cpm_listMediaCountFrom("Album=2"); ?><br>
	<img src="images/folder.gif" width="19" height="18">
	Templates: <?php $objCpm->cpm_listMediaCountFrom("Album=3"); ?><br>
	<img src="images/folder.gif" width="19" height="18">
	PNGs: <?php $objCpm->cpm_listMediaCountFrom("Album=4"); ?><br>
	<img src="images/folder.gif" width="19" height="18">
	Banners: <?php $objCpm->cpm_listMediaCountFrom("Album=5"); ?><br>
	<img src="images/folder.gif" width="19" height="18">
	Buttons: <?php $objCpm->cpm_listMediaCountFrom("Album=6"); ?><br>
	<img src="images/folder.gif" width="19" height="18">
	Icons: <?php $objCpm->cpm_listMediaCountFrom("Album=7"); ?><br>
	    </td>
  </tr>


</table>
<br clear="all" />
<table width="180" cellpadding="4" cellspacing="0" border="0" class="forumline">
  <tr>
   <form action="" method="post" >

 	  <th class="class="1"" align="left" colspan="2">Who is Online </th>

      <input type="hidden" name="sid" value="f17757743972be576814d5aa2f37a702" />
</form>

  </tr>


  <tr>
	<td colspan="2" align="left" class="row3"><img src="images/folder.gif" width="19" height="18">
	      <span class="gensmall">
<?php for ($i = 0; $i < count($online); $i++) { ?>
<a href="<?php echo append_sid($phpbb_root_path .
'profile.php?mode=viewprofile&amp;u=' . $online[$i]['user_id']);
?>"><?php echo $online[$i]['username']; ?></a><?php if ($i <
count($online) - 1) { ?>, <?php } ?>
<?php } ?>
<?php if ($online) { ?>, <?php } ?>
<?php if ($stats['user_online'] - count($online) == 1) {
printf($lang['Guest_user_total'], 1);
} else { printf($lang['Guest_users_total'],
$stats['user_online'] - count($online) < 0 ? 0 :
$stats['user_online'] - count($online)); } ?>
      </span>
	</td>
  </tr>


</table>
<br clear="all" />
<table width="180" cellpadding="4" cellspacing="0" border="0" class="forumline">
  <tr>
   <form action="" method="post" >

 	  <th class="class="1"" align="left" colspan="2">Top Ten Posters </th>

      <input type="hidden" name="sid" value="f17757743972be576814d5aa2f37a702" />
</form>

  </tr>


  <tr>
	<td colspan="2" align="left" class="row3">

<table>
<?php for ($i = 0; $i < count($top_poster); $i++) { ?>
<tr>
<td><span class="gensmall">#<?php echo ($i+1); ?></span></td>
<td width="100%"><span class="gensmall"><a href="<?php echo append_sid($phpbb_root_path . 'profile.php?mode=viewprofile&amp;u=' . $top_poster[$i]['user_id']); ?>"><?php echo $top_poster[$i]['username']; ?></a></span></td>
<td align="right"><span class="gensmall"><?php echo $top_poster[$i]['user_posts']; ?></span></td>
</tr>
<?php } ?>
</table>
    </td>
  </tr>
</table>
<br clear="all" />
<table width="180" cellpadding="4" cellspacing="0" border="0" class="forumline">
  <tr>
   <form action="" method="post" >

 	  <th class="class="1"" align="left" colspan="2"><?php printf($lang['About_user'], $random_user['username']); ?></th>

      <input type="hidden" name="sid" value="f17757743972be576814d5aa2f37a702" />
</form>

  </tr>


  <tr>
	<td colspan="2" align="left" class="row3">

      <span class="gensmall">
<?php printf($lang['Viewing_user_profile'], '<a href="' . append_sid($phpbb_root_path . 'profile.php?mode=viewprofile&amp;u=' . $random_user['user_id']). '"><b>' . $random_user['username'] . '</b></a>'); ?><br />
      </span>
<?php if ($random_user['user_avatar_type'] > 0) { ?>
<table>
<tr>
<td valign="top"><?php echo phpbb_avatar_image($random_user['user_avatar_type'], $random_user['user_avatar']); ?></td>
<td valign="top">
<?php } ?>
<span class="gensmall">
<?php echo $lang['Joined']; ?>: <?php
$since = intval((time() - $random_user['user_regdate']) / 86400);
if ($since == 0) {
echo 'today';
} elseif ($since == 1) {
echo '1 day';
} else {
echo $since . ' ' . $lang['Days'];
} ?><br />
<?php echo $lang['Posts']; ?>: <?php echo $random_user['user_posts']; ?><br />
<?php echo $lang['Location']; ?>: <?php echo $random_user['user_from']; ?><br />
</span>
<?php if ($random_user['user_avatar_type'] > 0) { ?>
</td>
</tr>
</table>
<?php } ?>
	</td>
  </tr>


</table>
<br clear="all" />
<table width="180" cellpadding="4" cellspacing="0" border="0" class="forumline">
  <tr>
   <form action="" method="post" >

 	  <th colspan="2""" align="left" class="class="1>Linkage</th>

      <input type="hidden" name="sid" value="f17757743972be576814d5aa2f37a702" />
</form>

  </tr>


  <tr>
	<td colspan="2" align="left" class="row1"><div align="center"><img src="images/logo.jpg" width="88" height="31">
	<br>	          
	<textarea rows=2 cols=8><a href="http://www.divinerequiem.net" target="_blank"><img src="http://divinerequiem.net/images/bg1.jpg" border=0 alt="Divine Requiem"></a></textarea>
				<br>
				<a href="http://divinerequiem.net/main/viewtopic.php?p=50#50">More?</a>	</div></td>
  </tr>


</table>
<br clear="all" />
<table width="180" cellpadding="4" cellspacing="0" border="0" class="forumline">
  <tr>
   <form action="" method="post" >


 	  <th class="class="1"" align="left" colspan="2">&nbsp;Affiliates</th>

      <input type="hidden" name="sid" value="f17757743972be576814d5aa2f37a702" />
</form>

  </tr>


  <tr>
	<td class="row3" align="left" colspan="2">	 
	<a href="http://anime-wishes.net" target="_blank"><img src="images/folder.gif" width="19" height="18" border="0">Anime-Wishes</a><br>
		<a href="http://animekidd.simply-torn.net" target="_blank"><img src="images/folder.gif" width="19" height="18" border="0">AnimeKidd</a><br>
				<a href="http://po.aoumi.net" target="_blank"><img src="images/folder.gif" width="19" height="18" border="0">Presumptous Obscurity</a><br>
                      <a href="http://divinerequiem.net/main/viewtopic.php?p=36#36"><img src="images/folder.gif" width="19" height="18" border="0">apply?
                </a>	</td>
  </tr>


</table>
<br clear="all" />

</td></tr></table></td>

<TD WIDTH="15" valign=top background="main/templates/BBTech/images/rt.gif">
<IMG SRC="main/templates/BBTech/images/spacer.gif" WIDTH="15" HEIGHT="1"></TD>
</tr></table>

<!--
   We request you retain the full copyright notice below including the link to www.phpbb.com.
   This not only gives respect to the large amount of time given freely by the developers
   but also helps build interest, traffic and use of phpBB 2.0. If you cannot (for good
   reason) retain the full copyright we request you at least leave in place the
   Powered by phpBB  line, with phpBB linked to www.phpbb.com. If you refuse
   to include even this then support on our forums may be affected.

   The phpBB Group : 2002
// -->

<TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0>
   <TR>
      <TD ROWSPAN=3>
         <IMG SRC="main/templates/BBTech/images/BBTech-ft_01.gif" WIDTH=25 HEIGHT=80></TD>
      <TD ROWSPAN=3 background="main/templates/BBTech/images/BBTech-ft_lt.gif" WIDTH=50% HEIGHT=80></TD>
      <TD>
         <IMG SRC="main/templates/BBTech/images/BBTech-ft_03.gif" WIDTH=710 HEIGHT=9></TD>
      <TD ROWSPAN=3 background="main/templates/BBTech/images/BBTech-ft_rt.gif" WIDTH=50% HEIGHT=80></TD>
      <TD ROWSPAN=3>
         <IMG SRC="main/templates/BBTech/images/BBTech-ft_05.gif" WIDTH=25 HEIGHT=80></TD>
   </TR>
   <TR>
   
      <TD align=center background="main/templates/BBTech/images/BBTech-ft_links.gif" WIDTH=710 HEIGHT=65>
      <font class="copyright"><br>
      Powered by  <a href="http://www.mx-system.com/" target="_mx-system" class="copyright">mxBB-Portal</a>  &copy; 2001, 2005 &amp; <a href="http://www.phpbb.com/" target="_phpbb" class="copyright">phpBB</a>  &copy; 2001, 2005 phpBB Group 
<br /> <div align="center">
      Copyright &copy; 2004-2006 Divinerequiem.net All Right Reserved | <a href="http://divinerequiem.net/main/viewtopic.php?t=19">Terms and Conditions</a> |
	    <a target="_top" href="http://t.extreme-dm.com/?login=gofishus"> Extreme Tracker</a>
<script language="javascript1.2"><!--
EXs=screen;EXw=EXs.width;navigator.appName!="Netscape"?
EXb=EXs.colorDepth:EXb=EXs.pixelDepth;//-->
        </script>
    <script language="javascript"><!--
EXd=document;EXw?"":EXw="na";EXb?"":EXb="na";
EXd.write("<img src=\"http://t0.extreme-dm.com",
"/c.g?tag=gofishus&j=y&srw="+EXw+"&srb="+EXb+"&",
"l="+escape(EXd.referrer)+"\" height=1 width=1>");//-->
        </script>
	  </div></font></TD>
   </TR>
   <TR>
      <TD>
         <IMG SRC="main/templates/BBTech/images/BBTech-ft_07.gif" WIDTH=710 HEIGHT=6></TD>
   </TR>
</TABLE>
