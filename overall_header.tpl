<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="{S_CONTENT_DIRECTION}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset={S_CONTENT_ENCODING}">
<meta http-equiv="Content-Style-Type" content="text/css">
{META}
{NAV_LINKS}
<title>{SITENAME} :: {PAGE_TITLE}</title>
<link rel="stylesheet" href="templates/BBTech/{T_HEAD_STYLESHEET}" type="text/css">
<!-- BEGIN switch_enable_pm_popup -->
<script language="Javascript" type="text/javascript">
<!--
	if ( {PRIVATE_MESSAGE_NEW_FLAG} )
	{
		window.open('{U_PRIVATEMSGS_POPUP}', '_phpbbprivmsg', 'HEIGHT=225,resizable=yes,WIDTH=400');;
	}
//-->
</script>
<!-- END switch_enable_pm_popup -->
<style type="text/css">
<!--
.ssmHdr {
color: white;
font: bold 12px verdana;
	}

.ssmHdr:link {
color: white;
text-decoration: none;
	}

.ssmHdr:visited {
color: white;
text-decoration: none;
	}

.ssmHdr:hover {
color: white;
text-decoration: underline;
	}

.ssmHdr:active {
color: white;
text-decoration: underline;
	}

.ssmItem {
color: white;
font: 12px verdana;
	}

.ssmItem:link {
color: white;
text-decoration: none;
	}

.ssmItem:visited {
color: white;
text-decoration: none;
	}

.ssmItem:hover {
color: white;
text-decoration: underline;
	}

.ssmItem:active {
color: white;
text-decoration: underline;
	}

.ssmBar {
color: white;
font: bold 12px verdana;
	}
//-->
</style>

<SCRIPT>
<!--
/*
Copyright © MaXimuS 2002, All Rights Reserved.
Site: http://maximus.ravecore.com
E-mail: maximusforever@hotmail.com
Script: Static Slide Menu
Version: 6.6 Build 34
*/
NS6=(document.getElementById&&!document.all)
IE=(document.all);IE4=(document.all&&!document.getElementById)
NS=(navigator.appName=="Netscape" && navigator.appVersion.charAt(0)=="4")
OP=(navigator.userAgent.indexOf('Opera')>-1)

tempBar='';barBuilt=0;lastY=0;lastX=0;sI=new Array();moving=setTimeout('null',1);

function moveOut() {
	if(parseInt(ssm.left)<0&&mPos||parseInt(ssm.left)>0&&!mPos){
		clearTimeout(moving);
		moving=setTimeout('moveOut()', slideXSpeed);
		slideMenu((!mPos)?"out":"out");
		}
	else {
		clearTimeout(moving);
		moving=setTimeout('null',1);
	}
}
function moveBack() {
	clearTimeout(moving);
	moving=setTimeout('moveBack1()',waitTime);
}
function moveBack1() {
	if(parseInt(ssm.left)>-(menuWidth+1)&&mPos||parseInt(ssm.left)<menuWidth+1&&!mPos) {
		clearTimeout(moving);
		moving=setTimeout('moveBack1()',slideXSpeed);
		slideMenu((!mPos)?"in":"in");
	}
	else{
		clearTimeout(moving);
		moving=setTimeout('null',1);
	}
}
function slideMenu(way){
	fHow=(NS6)?0.4:0.2;
	if(way=="out")flow=fHow*-(parseInt(ssm.left));
	if(way=="in"&&!mPos)flow=fHow* (menuWidth+1-parseInt(ssm.left));
	else if(way=="in")flow=fHow*-(menuWidth+1+parseInt(ssm.left));
	if(flow>0)flow=Math.ceil(flow);
	else flow=Math.floor(flow);
	if(IE||NS6){
		lastX+=flow;
		bssm.clip="rect(0 "+((!mPos)?(barWidth+menuWidth+3):(barWidth+2+lastX))+" "+(((IE4)?document.body.clientHeight:0)+tssm.offsetHeight)+" "+((!mPos)?(lastX+1):0)+")";
		}
	ssm.left=parseInt(ssm.left)+flow;
	if(NS){
		if(!mPos){
			bssm.clip.left+=flow;
			bssm2.clip.left+=flow;
		}
		else{
			bssm.clip.right+=flow;
			bssm2.clip.right+=flow;
		}
		if(bssm.left+bssm.clip.right>document.width)document.width+=flow;
	}
}

function makeStatic() {
	winY=(IE)?document.body.scrollTop:window.pageYOffset;
	sHow=(NS6)?0.4:0.2;
	if(winY!=lastY&&winY>YOffset-staticYOffset)smooth=sHow*(winY-lastY-YOffset+staticYOffset);
	else if(YOffset-staticYOffset+lastY>YOffset-staticYOffset&&winY<=YOffset-staticYOffset)smooth=sHow*(winY-lastY-(YOffset-(YOffset-winY)));
	else smooth=0;
	if(smooth>0)smooth=Math.ceil(smooth);
	else smooth=Math.floor(smooth);
	bssm.top=parseInt(bssm.top)+smooth;
	lastY=lastY+smooth;
	setTimeout('makeStatic()',slideYSpeed);
}

function menuClick(id) {
	obj=(document.all)?document.all(id):document.getElementById(id);
	with(obj){
		if(event.srcElement.id!=id){
			if(target=="_top")top.location=href;
			else if(target=="_parent")parent.location=href;
			else if(target=="_blank")window.open(href);
			else if(target>""&&top.frames[target])top.frames[target].location=href;
			else if(target>"")eval('window.open("'+href+'","'+target+'")');
			else location=href;
		}
	}
}

function buildBar() {
if(barText.indexOf('<IMG')>-1) {tempBar=barText}
	else{
		for(b=0;b<barText.length;b++)tempBar+=barText.charAt(b)+"<BR>"
	}
	ssmHTML+='<td align="center" rowspan="100" width="'+barWidth+'" bgcolor="'+barBGColor+'" valign="'+barVAlign+'" align="'+barAlign+'" class="ssmBar" NOWRAP>'+tempBar+'</td>';
}

function initSlide() {
	if (!mPos)lastX=menuWidth
	if ((NS6||IE)&&!OP||(operaFix!=2&&OP)){
		ssm=(NS6)?document.getElementById("thessm").style:document.all("thessm").style;
		tssm=(NS6)?document.getElementById("thessm"):document.all("thessm");
		bssm=(NS6)?document.getElementById("basessm").style:document.all("basessm").style;
		bssm.clip="rect(0 "+(barWidth+2+((!mPos)?menuWidth+1:0))+" "+(((IE4)?document.body.clientHeight:0)+tssm.offsetHeight)+" "+((!mPos)?(menuWidth+1):0)+")";
		if (OP&&operaFix==1)XOff=(!mPos)?document.body.clientWidth-barWidth-3:0;
		bssm.left=(!mPos)?XOff-menuWidth:XOff;
		if(OP)ssm.left=ssm.left;
		bssm.visibility="visible";
		if(NS6&&!OP){
			bssm.top=YOffset;
			if(menuOpacity!=100)ssm.MozOpacity=menuOpacity/100;
			slideIsGo=window.innerHeight>tssm.offsetHeight+staticYOffset;
		}
		else{
			if(menuOpacity!=100)ssm.filter="alpha(opacity="+menuOpacity+")";
			slideIsGo=((OP)?window.innerHeight:document.body.clientHeight)>parseInt(tssm.offsetHeight)+staticYOffset;
			}
		if(autoHideXOverflow&&((IE?document.body.clientWidth:window.innerWidth-16)<parseInt(bssm.left)+parseInt(ssm.left)+menuWidth+barWidth+3)){
			document.body.style.overflowX="hidden";
			document.body.style.overflowY="scroll";
		}
	}
	else if(NS){
		bssm=document.layers["basessm1"];
		bssm2=bssm.document.layers["basessm2"];
		ssm=bssm2.document.layers["thessm"];
		bssm.clip.left=(!mPos)?menuWidth+1:0;
		bssm.clip.right=(!mPos)?(menuWidth+barWidth+3):barWidth+2;
		bssm.left=(!mPos)?XOff-menuWidth:XOff;
		ssm.visibility="show";
		slideIsGo=window.innerHeight>ssm.clip.bottom+staticYOffset;
	}
	if(slideY&&(slideOnYOverflow||(!slideOnYOverflow&&slideIsGo)))makeStatic();
	if(!slideX)moveOut();
}

function getXOff() {
	return (((!XAlign)?((IE||OP)?document.body.clientWidth-barWidth-3:window.innerWidth-barWidth-3-17):(XAlign==1)?Math.floor(((IE||OP)?document.body.clientWidth/2-barWidth/2-1.5:window.innerWidth/2-barWidth/2-1.5)):0)+XOffset);
}

function buildMenu() {
	mPos=menuPosition;
	ssmHTML="";
	XOff=getXOff();
	if(IE||NS6)ssmHTML+='<DIV ID="basessm" style="visibility:hidden;Position : Absolute ;Top : '+YOffset+' ;Z-Index : 20;width:'+(barWidth+2)+';"><DIV ID="thessm" style="Position : Absolute ;Left : '+((!mPos)?menuWidth+1:-menuWidth-1)+' ;Top : 0px ;Z-Index : 30;'+((IE)?"width:1px":"")+'" '+((slideX)?'onmouseover="moveOut()" onmouseout="moveBack()")':'')+'>';
	if(NS)ssmHTML+='<LAYER name="basessm1" top="'+YOffset+'" visibility="show" onload="initSlide()"><ILAYER name="basessm2"><LAYER visibility="hide" name="thessm" bgcolor="'+menuBGColor+'" left="'+((!mPos)?menuWidth+1:-menuWidth-1)+'" '+((slideX)?'onmouseover="moveOut()" onmouseout="moveBack()")':'')+'>';
	if(NS6)ssmHTML+='<table border="0" cellpadding="0" cellspacing="0" width="'+(menuWidth+barWidth+3)+'"><TR><TD>';
	ssmHTML+='<table border="0" cellpadding="0" cellspacing="1" width="'+(menuWidth+barWidth+3)+'" bgcolor="'+((!NS)?menuBGColor:"")+'">';
	for(i=0;i<sI.length;i++){
		ssmHTML+='<TR>';
		if(barBuilt==0&&!mPos){
			buildBar();
			barBuilt=1
		}
		if(sI[i][3]>1)ssmHTML+='<TD BGCOLOR="'+hdrBGColor+'" ALIGN="'+hdrAlign+'" WIDTH="'+menuWidth+'"'+((NS6)?' style="padding:'+hdrPadding+'px"':'><TABLE CELLPADDING="'+hdrPadding+'" CELLSPACING="0" BORDER="0"><TR><TD')+' CLASS="ssmHdr" VALIGN="'+hdrVAlign+'">'+((sI[i][3]==3)?'<a HREF="'+((sI[i][1].indexOf("://")==-1&&sI[i][1].indexOf("../")==-1)?targetDomain:'')+sI[i][1]+'" target="'+sI[i][2]+'" class="ssmHdr">':'')+sI[i][0]+((sI[i][3]==3)?'</a>':'')+((NS6)?'':'</TD></TR></TABLE>')+'</TD>';
		else{
			if(!sI[i][2])sI[i][2]=targetFrame;
			ssmHTML+='<TD WIDTH="'+menuWidth+'"'+(NS&&!sI[i][3]?'':'BGCOLOR="'+linkBGColor+'"')+' '+((NS6)?'CLASS="ssmItem" style="padding:'+linkPadding+'px;" ALIGN="'+linkAlign+'"':'')+' '+((sI[i][3])?'>':'onmouseover="style.backgroundColor=\''+linkOverBGColor+'\'" onmouseout="style.backgroundColor=\''+linkBGColor+'\'" onclick="menuClick(\'item_'+i+'\');"'+(IE?' style="cursor:hand;"':'')+'><ILAYER><LAYER onmouseover="bgColor=\''+linkOverBGColor+'\'" onmouseout="bgColor=\''+linkBGColor+'\'" WIDTH="100%" ALIGN="'+linkAlign+'" bgcolor="'+linkBGColor+'">')+((NS6)?'':'<DIV ALIGN="'+linkAlign+'" CLASS="ssmItem"><TABLE CELLPADDING="'+linkPadding+'" CELLSPACING="0" BORDER="0"><TR><TD VALIGN="'+linkVAlign+'" CLASS="ssmItem">')+((sI[i][3])?'':'<A HREF="'+((sI[i][1].indexOf("://")==-1&&sI[i][1].indexOf("../")==-1)?targetDomain:'')+sI[i][1]+'" target="'+sI[i][2]+'" CLASS="ssmItem" id="item_'+i+'">')+sI[i][0]+''+((sI[i][3])?'':'</A>')+((NS6)?'':'</TD></TR></TABLE></DIV>')+((sI[i][3])?'':'</LAYER></ILAYER>')+'</TD>';
		}
		if(barBuilt==0&&mPos){
			buildBar();
			barBuilt=1;
		}
		ssmHTML+='</TR>';
	}
	ssmHTML+='</table>';
	if(NS6)ssmHTML+='</TD></TR></TABLE>';
	if(IE||NS6){
		ssmHTML+='</DIV></DIV>';
		setTimeout('initSlide();',1);
	}
	if(NS)ssmHTML+='</LAYER></ILAYER></LAYER>';
	document.write(ssmHTML);
}

function addHdr(text){sI[sI.length]=[text, '', '', 2]}

function addLink(text, link, target){if(!link)link="javascript://";sI[sI.length]=[text, link, target, 3]}

function addItem(text, link, target){if(!link)link="javascript://";sI[sI.length]=[text, link, target, 0]}

function addText(text){sI[sI.length]=[text, '', '', 1]}

//window.onresize=function(){setTimeout('alert(getOff());XOff=getXOff();bssm.left=(!mPos)?XOff-menuWidth:XOff;');}

//-->
</SCRIPT>
<SCRIPT>
<!--
YOffset=40;
XAlign=2;
XOffset=0;
staticYOffset=20;
waitTime=500;
slideX=1;
slideXSpeed=15;
slideY=1;
slideYSpeed=15;
slideOnYOverflow=1;
autoHideXOverflow=1;
targetFrame="";
targetDomain="";
operaFix=0;
menuOpacity=100;
menuPosition=1;
menuBGColor="black";
menuWidth=125;
hdrBGColor="#2C323B";
hdrPadding=3;
hdrAlign="left";
hdrVAlign="center";
linkBGColor="#545C65";
linkOverBGColor="#2C323B";
linkAlign="left";
linkVAlign="center";
linkPadding=3;
barWidth=11;
barBGColor="4D4C5B";
barFontFamily="Verdana";
barFontSize="2";
barFontColor="#E4E4E4";
barAlign="left";
barVAlign="center";
barType=1;
barText="Navigation";

//The Menu's Items
addHdr("Menu.");
addItem("Home", "http://divinerequiem.net/index.php", "");
addItem("Anime", "http://divinerequiem.net/index.php?id=archives", "");
addItem("Graphics", "http://divinerequiem.net/cpg144/index.php?cat=3", "");
addItem("Layouts", "http://divinerequiem.net/cpg144/index.php?cat=2", "");
addItem("Media", "http://divinerequiem.net/cpg144/index.php?cat=4", "");
addItem("Tutorials", "http://divinerequiem.net/index.php?id=tut", "");
addItem("Downloads", "http://divinerequiem.net/cpg144/index.php?cat=5", "");
buildMenu();


//-->
</SCRIPT>
</head>
<body bgcolor="{T_BODY_BGCOLOR}" text="{T_BODY_TEXT}" link="{T_BODY_LINK}" vlink="{T_BODY_VLINK}" LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>
<!-- {QBARS} -->
<a name="top"></a>

<TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD COLSPAN=2>
			<IMG SRC="templates/BBTech/images/BBTech-hd_01.gif" WIDTH=348 HEIGHT=10></TD>
		<TD ROWSPAN=5 background="templates/BBTech/images/BBTech-hd_full.gif" WIDTH=100% HEIGHT=144></TD>
		<TD COLSPAN=8 ROWSPAN=3>
			<IMG SRC="templates/BBTech/images/BBTech-hd_03.gif" WIDTH=418 HEIGHT=92></TD>
		<TD>
			<IMG SRC="templates/BBTech/images/spacer.gif" WIDTH=1 HEIGHT=10></TD>
	</TR>
	<TR>
		<TD ROWSPAN=4>
			<IMG SRC="templates/BBTech/images/BBTech-hd_04.gif" WIDTH=18 HEIGHT=134></TD>
		<TD>  
	
<!-- UNCOMMENT THIS LINE IF YOU WISH TO USE GIF INSTEAD OF FLASH<IMG SRC="templates/BBTech/images/BBTech-hd_logo.gif" WIDTH=330 HEIGHT=72>-->
 <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="330" height="72" id="logo" align="middle">
<param name="allowScriptAccess" value="sameDomain" /> 
<param name="movie" value="templates/BBTech/images/logo.swf" />
<param name="menu" value="false" />
<param name="quality" value="high" />
<param name="scale" value="exactfit" />
<param name="wmode" value="transparent" />
<param name="bgcolor" value="#ffffff" />
<embed src="templates/BBTech/images/logo.swf" menu="false" quality="high" scale="exactfit" wmode="transparent" bgcolor="#ffffff" width="330" height="72" name="logo" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
			</TD>
		<TD>
			<IMG SRC="templates/BBTech/images/spacer.gif" WIDTH=1 HEIGHT=72></TD>
	</TR>
	<TR>
		<TD ROWSPAN=3>
			<IMG SRC="templates/BBTech/images/BBTech-hd_06.gif" WIDTH=330 HEIGHT=62></TD>
		<TD>
			<IMG SRC="templates/BBTech/images/spacer.gif" WIDTH=1 HEIGHT=10></TD>
	</TR>
	<TR>
		<TD ROWSPAN=2>
			<IMG SRC="templates/BBTech/images/BBTech-hd_07.gif" WIDTH=20 HEIGHT=52></TD>
		<TD>
			<A HREF="{U_FAQ}">
				<IMG SRC="templates/BBTech/images/BBTech-hd_08.gif" WIDTH=39 HEIGHT=22 BORDER=0 ALT="{L_FAQ}"></A></TD>
		<TD>
			<A HREF="{U_SEARCH}">
				<IMG SRC="templates/BBTech/images/BBTech-hd_09.gif" WIDTH=59 HEIGHT=22 BORDER=0 ALT="{L_SEARCH}"></A></TD>
		<TD>
			<A HREF="{U_MEMBERLIST}">
				<IMG SRC="templates/BBTech/images/BBTech-hd_10.gif" WIDTH=91 HEIGHT=22 BORDER=0 ALT="{L_MEMBERLIST}"></A></TD>
		<TD>
			<A HREF="{U_GROUP_CP}">
				<IMG SRC="templates/BBTech/images/BBTech-hd_11.gif" WIDTH=90 HEIGHT=22 BORDER=0 ALT="{L_USERGROUPS}"></A></TD>
		<TD>
			<A HREF="{U_PROFILE}">
				<IMG SRC="templates/BBTech/images/BBTech-hd_12.gif" WIDTH=63 HEIGHT=22 BORDER=0 ALT="{L_PROFILE}"></A></TD>
		<TD>
			<A HREF="{U_PRIVATEMSGS}">
				<IMG SRC="templates/BBTech/images/BBTech-hd_13.gif" WIDTH=35 HEIGHT=22 BORDER=0 ALT="{PRIVATE_MESSAGE_INFO}"></A></TD>
		<TD ROWSPAN=2>
			<IMG SRC="templates/BBTech/images/BBTech-hd_14.gif" WIDTH=21 HEIGHT=52></TD>
		<TD>
			<IMG SRC="templates/BBTech/images/spacer.gif" WIDTH=1 HEIGHT=22></TD>
	</TR>
	<TR>
		<TD COLSPAN=6 align=right valign=bottom background="templates/BBTech/images/BBTech-hd_button.gif" WIDTH=377 HEIGHT=30>
		<a href="http://divinerequiem.net/index.php"><img src="templates/BBTech/images/home.gif" border="0" alt="Divine Requiem Home"/></a>&nbsp;
		<a href="{U_LOGIN_LOGOUT}"><img src="templates/BBTech/images/logout.gif" border="0" alt="{L_LOGIN_LOGOUT}"/></a>&nbsp;
		<!-- BEGIN switch_user_logged_out --> 
						 <a href="{U_REGISTER}"><img src="templates/BBTech/images/register.gif" border="0" alt="{L_REGISTER}"></a>
						<!-- END switch_user_logged_out -->
		 </TD>
		<TD>
			<IMG SRC="templates/BBTech/images/spacer.gif" WIDTH=1 HEIGHT=30></TD>
	</TR>
</TABLE> 
 <!-- {QMENUS} -->
			<TABLE WIDTH="100%" height=100% align=center BORDER="0" CELLPADDING=0 CELLSPACING=0><TR>

<TD WIDTH="15" valign=top background="templates/BBTech/images/lt.gif">
<IMG SRC="templates/BBTech/images/spacer.gif" WIDTH="15" HEIGHT="1"></TD>
<TD WIDTH="100%" bgcolor="#1E1E2A" valign=top>
