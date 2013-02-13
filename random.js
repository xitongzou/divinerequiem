<!--

/*
Random Content Script- By JavaScript Kit(http://www.javascriptkit.com) 
Over 200+ free JavaScripts here!
*/

function random_content(){
var mycontent=new Array()
//specify random content below.
mycontent[1]='<b>Random content 1</b>'
mycontent[2]='<b>Random content 2</b>'
mycontent[3]='<b>Random content 3</b>'
mycontent[4]='<b>Random content 4</b>'
mycontent[5]='<b>Random content 5</b>'


var ry=Math.floor(Math.random()*mycontent.length)
if (ry==0)
ry=1
document.write(mycontent[ry])
}
random_content()
//-->
