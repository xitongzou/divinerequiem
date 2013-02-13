// JavaScript Document
/***********************************************
* AnyLink Vertical Menu- © Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

//Contents for menu 1
var menu1=new Array()
menu1[0]='<a href="http://divinerequiem.net/index.php?id=content">News</a>'
menu1[1]='<a href="http://divinerequiem.net/index.php?id=staff">Staff</a>'
menu1[2]='<a href="http://divinerequiem.net/index.php?id=history">History</a>'
menu1[3]='<a href="http://divinerequiem.net/index.php?id=faqs">FAQs</a>'
menu1[4]='<a href="http://divinerequiem.net/index.php?id=awards">Awards/Gifts</a>'
menu1[5]='<a href="http://divinerequiem.net/index.php?id=credits">Credits/TOS</a>'
menu1[6]='<a href="http://divinerequiem.net/index.php?id=linkin">Links In/Affiliation</a>'
menu1[7]='<a href="http://divinerequiem.net/index.php?id=linkout">Links Out</a>'
menu1[8]='<a href="http://divinerequiem.net/index.php?id=hosting">Site Hosting</a>'


//Contents for menu 2, and so on
var menu2=new Array()
menu2[0]='<a href="http://divinerequiem.net/index.php?id=archives">Archives</a>'
menu2[1]='<a href="http://divinerequiem.net/main/viewforum.php?f=33">News</a>'

var menu3=new Array()
menu3[0]='<a href="http://divinerequiem.net/cpg144/thumbnails.php?album=1">Avatars</a>'
menu3[1]='<a href="http://divinerequiem.net/cpg144/thumbnails.php?album=2">Wallpapers</a>'
menu3[2]='<a href="http://divinerequiem.net/cpg144/thumbnails.php?album=6">Buttons</a>'
menu3[3]='<a href="http://divinerequiem.net/cpg144/thumbnails.php?album=5">Banners</a>'
menu3[4]='<a href="http://divinerequiem.net/cpg144/thumbnails.php?album=7">Icons</a>'
menu3[5]='<a href="http://divinerequiem.net/cpg144/thumbnails.php?album=3">Templates</a>'
menu3[6]='<a href="http://divinerequiem.net/cpg144/thumbnails.php?album=26">PNGs</a>'
menu3[7]='<a href="http://divinerequiem.net/cpg144/thumbnails.php?album=25">Signs</a>'
menu3[8]='<a href="http://divinerequiem.net/cpg144/thumbnails.php?album=15">Fanart</a>'

var menu4=new Array()
menu4[0]='<a href="http://www.divinerequiem.net/cpg144/thumbnails.php?album=27">Videos</a>'
menu4[1]='<a href="http://www.divinerequiem.net/cpg144/thumbnails.php?album=30">Clips</a>'
menu4[2]='<a href="http://www.divinerequiem.net/cpg144/thumbnails.php?album=29">AMVs</a>'
menu4[3]='<a href="http://www.divinerequiem.net/cpg144/thumbnails.php?album=31">Flash</a>'

var menu5=new Array()
menu5[0]='<a href="http://divinerequiem.net/cpg144/thumbnails.php?album=36">Div Layers</a>'
menu5[1]='<a href="http://www.divinerequiem.net/cpg144/thumbnails.php?album=37">Tables</a>'
menu5[2]='<a href="http://www.divinerequiem.net/cpg144/thumbnails.php?album=38">Iframe</a>'
menu5[3]='<a href="http://www.divinerequiem.net/cpg144/thumbnails.php?album=39">Pop-ups</a>'

var menu8=new Array()
menu8[0]='<a href="http://www.divinerequiem.net/cpg144/thumbnails.php?album=32">Scripts</a>'
menu8[1]='<a href="http://www.divinerequiem.net/cpg144/thumbnails.php?album=33">Fonts</a>'
menu8[2]='<a href="http://www.divinerequiem.net/cpg144/thumbnails.php?album=34">Brushes</a>'
menu8[3]='<a href="http://www.divinerequiem.net/cpg144/thumbnails.php?album=35">Textures</a>'
		
var disappeardelay=250  //menu disappear speed onMouseout (in miliseconds)
var horizontaloffset=2 //horizontal offset of menu from default location. (0-5 is a good value)

/////No further editting needed

var ie4=document.all
var ns6=document.getElementById&&!document.all

if (ie4||ns6)
document.write('<div id="dropmenudiv" style="visibility:hidden;width: 160px" onMouseover="clearhidemenu()" onMouseout="dynamichide(event)"></div>')

function getposOffset(what, offsettype){
var totaloffset=(offsettype=="left")? what.offsetLeft : what.offsetTop;
var parentEl=what.offsetParent;
while (parentEl!=null){
totaloffset=(offsettype=="left")? totaloffset+parentEl.offsetLeft : totaloffset+parentEl.offsetTop;
parentEl=parentEl.offsetParent;
}
return totaloffset;
}


function showhide(obj, e, visible, hidden, menuwidth){
if (ie4||ns6)
dropmenuobj.style.left=dropmenuobj.style.top=-500
dropmenuobj.widthobj=dropmenuobj.style
dropmenuobj.widthobj.width=menuwidth
if (e.type=="click" && obj.visibility==hidden || e.type=="mouseover")
obj.visibility=visible
else if (e.type=="click")
obj.visibility=hidden
}

function iecompattest(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function clearbrowseredge(obj, whichedge){
var edgeoffset=0
if (whichedge=="rightedge"){
var windowedge=ie4 && !window.opera? iecompattest().scrollLeft+iecompattest().clientWidth-15 : window.pageXOffset+window.innerWidth-15
dropmenuobj.contentmeasure=dropmenuobj.offsetWidth
if (windowedge-dropmenuobj.x-obj.offsetWidth < dropmenuobj.contentmeasure)
edgeoffset=dropmenuobj.contentmeasure+obj.offsetWidth
}
else{
var topedge=ie4 && !window.opera? iecompattest().scrollTop : window.pageYOffset
var windowedge=ie4 && !window.opera? iecompattest().scrollTop+iecompattest().clientHeight-15 : window.pageYOffset+window.innerHeight-18
dropmenuobj.contentmeasure=dropmenuobj.offsetHeight
if (windowedge-dropmenuobj.y < dropmenuobj.contentmeasure){ //move menu up?
edgeoffset=dropmenuobj.contentmeasure-obj.offsetHeight
if ((dropmenuobj.y-topedge)<dropmenuobj.contentmeasure) //up no good either? (position at top of viewable window then)
edgeoffset=dropmenuobj.y
}
}
return edgeoffset
}

function populatemenu(what){
if (ie4||ns6)
dropmenuobj.innerHTML=what.join("")
}


function dropdownmenu(obj, e, menucontents, menuwidth){
if (window.event) event.cancelBubble=true
else if (e.stopPropagation) e.stopPropagation()
clearhidemenu()
dropmenuobj=document.getElementById? document.getElementById("dropmenudiv") : dropmenudiv
populatemenu(menucontents)

if (ie4||ns6){
showhide(dropmenuobj.style, e, "visible", "hidden", menuwidth)
dropmenuobj.x=getposOffset(obj, "left")
dropmenuobj.y=getposOffset(obj, "top")
dropmenuobj.style.left=dropmenuobj.x-clearbrowseredge(obj, "rightedge")+obj.offsetWidth+horizontaloffset+"px"
dropmenuobj.style.top=dropmenuobj.y-clearbrowseredge(obj, "bottomedge")+"px"
}

return clickreturnvalue()
}

function clickreturnvalue(){
if (ie4||ns6) return false
else return true
}

function contains_ns6(a, b) {
while (b.parentNode)
if ((b = b.parentNode) == a)
return true;
return false;
}

function dynamichide(e){
if (ie4&&!dropmenuobj.contains(e.toElement))
delayhidemenu()
else if (ns6&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
delayhidemenu()
}

function hidemenu(e){
if (typeof dropmenuobj!="undefined"){
if (ie4||ns6)
dropmenuobj.style.visibility="hidden"
}
}

function delayhidemenu(){
if (ie4||ns6)
delayhide=setTimeout("hidemenu()",disappeardelay)
}

function clearhidemenu(){
if (typeof delayhide!="undefined")
clearTimeout(delayhide)
}
