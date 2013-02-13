function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function RenderFlash( width, height, flashsrc, imagesrc, bgcolor )
{
MM_FlashCanPlay = 0;
MM_contentVersion = 5;

var plugin = (navigator.mimeTypes && navigator.mimeTypes["application/x-shockwave-flash"]) ? navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin : 0;
if ( plugin ) {
		var words = navigator.plugins["Shockwave Flash"].description.split(" ");
	    for (var i = 0; i < words.length; ++i)
	    {
		if (isNaN(parseInt(words[i])))
		continue;
		var MM_PluginVersion = words[i]; 
	    }
	MM_FlashCanPlay = MM_PluginVersion >= MM_contentVersion;
}
else if (navigator.userAgent && navigator.userAgent.indexOf("MSIE")>=0 
   && (navigator.appVersion.indexOf("Win") != -1)) {
   	document.write('<SCR' + 'IPT LANGUAGE=VBScript\> \n'); //FS hide this from IE4.5 Mac by splitting the tag
	document.write('on error resume next \n');
	document.write('MM_FlashCanPlay = (IsObject(CreateObject("ShockwaveFlash.ShockwaveFlash." & MM_contentVersion)))\n');
	document.write('</SCR' + 'IPT\> \n');
}

if ( MM_FlashCanPlay ) {
	document.write('<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"');
	document.write('codeBase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"');
	document.write('ID="script" height="' + height + '" width="' + width + '">');
	document.write('<PARAM NAME="Movie" VALUE="' + flashsrc + '">');
	document.write('<PARAM NAME="Src" VALUE="' + flashsrc + '">');
	document.write('<PARAM NAME="Quality" VALUE="High">');
	document.write('<PARAM NAME="BGColor" VALUE="' + bgcolor + '">');
	document.write('<PARAM NAME="wmode" value="opaque"> ');
	document.write('<EMBED src="' + flashsrc + '" wmode="opaque" ');
	document.write('loop=true quality=high bgcolor="' + bgcolor + '"  WIDTH=' + width + ' height=' + height + ' ');
	document.write('TYPE="application/x-shockwave-flash" ');
	document.write('PLUGINSPAGE="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash">');
	document.write('</EMBED>');
	document.write('</OBJECT>');
} else{
		document.write('<img alt="flash not detected" src="' + imagesrc + '" border=0>');
}
}

function PopupPrintPage(intHeight, intWidth) {


	var strImageLibraryURL = window.location.href
	if(strImageLibraryURL.lastIndexOf("wcs01") > -1)
	{
		strImageLibraryURL = window.location.href + "=/PrintLayout=Y"
	} else {
		strImageLibraryURL = window.location.href + "&PrintLayout=Y"
	}

	window.open(strImageLibraryURL, '', 'scrollbars=yes,height=' + intHeight + ',width=' + intWidth + ',top=0,left=0,resizable=yes,toolbar=yes,titlebar=yes,menubar=yes');
}

function PopupImage(strImageURL, intHeight, intWidth, strTitle, strBgColor) {
	strImageURL = '<img src="' + strImageURL + '" alt="" onload="fitPic(this)" />';
	var intLeftPos = 0;
	var intTopPos = 0;
	var scrollbar = ',scrollbars=no';
	var resizable = ',resizable=yes'

	if (screen) {
		if( intWidth > (screen.width * 0.7) )
		{
			intWidth = screen.width * 0.7;
			scrollbar = ',scrollbars=yes' ;
			intHeight += 18;
		}
		if( intHeight > (screen.height * 0.7) )
		{
			intHeight = screen.height * 0.7;
			scrollbar = ',scrollbars=yes' ;
			intWidth += 18;
		}
		
		intLeftPos = (screen.width / 2) - (intWidth/2);
		intTopPos = (screen.height / 2) - (intHeight/2);
	}

	var newwin = window.open('', '', 'height=' + intHeight + ',width=' + intWidth + ',top=' + intTopPos + ',left=' + intLeftPos + resizable + scrollbar);
	
newwin.document.writeln('<?xml version="1.0" encoding="iso-8859-1"?>');
newwin.document.writeln('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">');
newwin.document.writeln('<html xmlns="http://www.w3.org/1999/xhtml">');
newwin.document.writeln('<head>');
newwin.document.writeln('<title>' + (strTitle != null ? strTitle : 'Image Enlargement') + '</title>');
newwin.document.writeln('<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />');


newwin.document.writeln('<scr' + 'ipt language="javascript">');
newwin.document.writeln('var NS = (navigator.appName=="Netscape")?true:false;');
//newwin.document.writeln('window.scrollbars.visible=false');
newwin.document.writeln('function fitPic(imageObj) {');
newwin.document.writeln('	iWidth = (NS)?window.innerWidth:document.body.clientWidth;');
newwin.document.writeln('	iHeight = (NS)?window.innerHeight:document.body.clientHeight;');

newwin.document.writeln('	intWidth = imageObj.width');
newwin.document.writeln('	intHeight = imageObj.height');
newwin.document.writeln('	if (screen) {');
newwin.document.writeln('		if( intWidth > (screen.width * 0.7) ) {');
newwin.document.writeln('			intWidth = screen.width * 0.7;');
newwin.document.writeln('		}');
newwin.document.writeln('		if( intHeight > (screen.height * 0.7) )	{');
newwin.document.writeln('			intHeight = screen.height * 0.7;');
newwin.document.writeln('		}');
newwin.document.writeln('		intLeftPos = (screen.width / 2) - (intWidth/2);');
newwin.document.writeln('		intTopPos = (screen.height / 2) - (intHeight/2);');
newwin.document.writeln('		window.moveTo(intLeftPos,intTopPos)');
newwin.document.writeln('	}');


newwin.document.writeln('	iWidth = intWidth - iWidth;');
newwin.document.writeln('	iHeight = intHeight - iHeight;');
newwin.document.writeln('	window.resizeBy(iWidth, iHeight-1);');
newwin.document.writeln('	self.focus();');
newwin.document.writeln('}');
newwin.document.writeln('</scr' + 'ipt>');


newwin.document.writeln('</head>');
newwin.document.writeln('<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" bgcolor="' + ( strBgColor != null ? strBgColor : "#FFFFFF" ) + '">');
newwin.document.writeln(strImageURL);
newwin.document.writeln('</body>');
newwin.document.writeln('</html>');
}


function PopupFlash(strImageURL, intHeight, intWidth) {

	var intLeftPos = 0;
	var intTopPos = 0;
	var scrollbar = '';
	var resizable = '';
	if (screen) {
		if( intWidth > (screen.width * 0.7) )
		{
			intWidth = screen.width * 0.7;
			scrollbar = ',scrollbars=yes' ;
			intHeight += 18;
			resizable = ',resizable=yes'
		}
		if( intHeight > (screen.height * 0.7) )
		{
			intHeight = screen.height * 0.7;
			scrollbar = ',scrollbars=yes' ;
			intWidth += 18;
			resizable = ',resizable=yes'
		}
		
		intLeftPos = (screen.width / 2) - (intWidth/2);
		intTopPos = (screen.height / 2) - (intHeight/2);
	}
	
	var strFlash = strImageURL.replace(".jpg",".swf")

	var strURL = "/popupa.asp?strType=Flash&strImage=" + strImageURL + "&strFlash=" + strFlash + "&intHeight=" + intHeight + "&intWidth=" + intWidth
	window.open(strURL, '', 'height=' + intHeight + ',width=' + intWidth + ',top=' + intTopPos + ',left=' + intLeftPos + resizable + scrollbar);
}

function PopupWebPage(strURL, intHeight, intWidth) {

	window.open(strURL, '', 'scrollbars=yes,height=' + intHeight + ',width=' + intWidth + ',top=0,left=0,resizable=yes,toolbar=yes,titlebar=yes,menubar=yes');
}

function PopupWebPageBox(strURL, intHeight, intWidth) {

	window.open(strURL, '', 'scrollbars=no,height=' + intHeight + ',width=' + intWidth + ',top=0,left=0,resizable=no,toolbar=no,titlebar=no,menubar=no');
}


function PrintPage()
{
	setTimeout("window.print()",100)
}

function RunSlideShow(id){
	if( document.SlideShowArray[id] )
	{
		if( document.SlideShowArray[id].preLoad[document.SlideShowArray[id].j].complete )
		{
			if (document.all){
				document.SlideShowArray[id].object.style.filter="blendTrans(duration=" + document.SlideShowArray[id].crossFadeDuration + ")"
				document.SlideShowArray[id].object.filters.blendTrans.Apply()      
			}
			document.SlideShowArray[id].object.src = document.SlideShowArray[id].preLoad[document.SlideShowArray[id].j].src
			if (document.all){
				document.SlideShowArray[id].object.filters.blendTrans.Play()
			}
			document.SlideShowArray[id].j = document.SlideShowArray[id].j + 1
			if (document.SlideShowArray[id].j > (document.SlideShowArray[id].p-1)) document.SlideShowArray[id].j=0
		}
		setTimeout('RunSlideShow(\"' + id + '\")', document.SlideShowArray[id].slideShowSpeed)
	}
}

function SlideShowObject(imgObject, arguments)
{
	this.object = imgObject
	this.slideShowSpeed = arguments[1]
	this.crossFadeDuration = arguments[2]
	this.Pic = new Array()
	
	for (i=3; i < (arguments.length); i++) {
		this.Pic[i-3] = arguments[i]
	}
	
	this.j = 0
	this.p = this.Pic.length
	
	this.preLoad = new Array()
	for (i = 0; i < this.p; i++){
	   this.preLoad[i] = new Image()
	   this.preLoad[i].src = this.Pic[i]
	}
}

// Params: imgObject, slideShowSpeed, crossFadeDuration, slideShowImages
// eg: <img src="slideshow1.jpg" onload="CreateSlideShow(this,4000,2,'slideshow2.jpg','slideshow3.jpg','slideshow1.jpg')">
function CreateSlideShow(imgObject, slideShowSpeed, crossFadeDuration)
{
	if( !document.SlideShowArray ) document.SlideShowArray = new Array()
	if( !document.SlideShowCounter ) document.SlideShowCounter = 0;
	
	if( imgObject.name == "" )
	{
		imgObject.name = "slide" + document.SlideShowCounter++;
	}
	
	if( document.SlideShowArray[imgObject.name] == null)
	{
		document.SlideShowArray[imgObject.name] = new SlideShowObject(imgObject, CreateSlideShow.arguments)
		setTimeout('RunSlideShow(\"' + imgObject.name + '\")', ( slideShowSpeed > (crossFadeDuration*1000) ? slideShowSpeed - (crossFadeDuration*1000) : 0))
	}
}
