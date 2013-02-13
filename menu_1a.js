/*****************************************************

* dropMenu

*****************************************************/

dropMenu.Registry = []

dropMenu.aniLen = 250

dropMenu.hideDelay = 0

dropMenu.minCPUResolution = 10

// constructor



//fires on instantiation of each new menu object

function dropMenu(id, dir, width, height, hAlign, vAlign, animation)

{

this.ie = document.all ? 1 : 0

this.ns4 = document.layers ? 1 : 0

this.dom = document.getElementById ? 1 : 0

if (this.ie || this.ns4 || this.dom) 

	{

	this.id = id

	this.hAlign = hAlign

	this.vAlign = vAlign

	this.dir = dir

	this.animation = animation

	this.orientation = dir == "left" || dir == "right" ? "h" : "v"

	this.dirType = dir == "right" || dir == "down" ? "-" : "+"

	this.dim = this.orientation == "h" ? width : height

	this.hideTimer = false

	this.aniTimer = false

	this.open = false

	this.over = false

	this.startTime = 0

	this.gRef = "dropMenu_"+id

	

	this.width = width

	this.height = height

		

	eval(this.gRef+"=this")

	dropMenu.Registry[id] = this

	var d = document

	var strCSS = '<style type="text/css">';

	strCSS += '#' + this.id + 'Container { visibility:hidden; '

	strCSS += 'overflow:hidden; z-index:10000; }'

	strCSS += '#' + this.id + 'Container, #' + this.id + 'Content { position:absolute; '

	strCSS += 'width:' + width + 'px; '

	strCSS += 'height:' + height + 'px; '

	strCSS += 'clip:rect(0 ' + width + ' ' + height + ' 0); '

	strCSS += '}'

	strCSS += '</style>'

	d.write(strCSS)

	this.load()

	}

}



dropMenu.prototype.load = function() 

{

	var d = document

	var lyrId1 = this.id + "Container"

	var lyrId2 = this.id + "Content"

	var obj1 = this.dom ? d.getElementById(lyrId1) : this.ie ? d.all[lyrId1] : d.layers[lyrId1]

	if (obj1) var obj2 = this.ns4 ? obj1.layers[lyrId2] : this.ie ? d.all[lyrId2] : d.getElementById(lyrId2)

	var temp

	if (!obj1 || !obj2) window.setTimeout(this.gRef + ".load()", 100)

	else {

		this.container = obj1

		this.menu = obj2

		this.style = this.ns4 ? this.menu : this.menu.style

		this.containerStyle = this.ns4 ? this.container : this.container.style

		this.homePos = eval("0" + this.dirType + this.dim)

		this.outPos = 0

		this.accelConst = (this.outPos - this.homePos) / dropMenu.aniLen / dropMenu.aniLen 

		// set event handlers.

		if (this.ns4) this.menu.captureEvents(Event.MOUSEOVER | Event.MOUSEOUT);

		this.menu.onmouseover = new Function("dropMenu.showMenu('" + this.id + "')")

		this.menu.onmouseout = new Function("dropMenu.hideMenu('" + this.id + "')")

		//set initial state

		this.endSlide()

	}

}



dropMenu.showMenu = function(id, object)

{

	var reg = dropMenu.Registry

	var obj = dropMenu.Registry[id]

	if( obj )

	{

		if (obj.container) {

			obj.over = true

			for (menu in reg) if (id != menu) dropMenu.hide(menu)

			if (obj.hideTimer) { reg[id].hideTimer = window.clearTimeout(reg[id].hideTimer) }

			

			if( object )

			{

				var left

				if( obj.hAlign == "right" ) 

					left = findPosX(object) + object.offsetWidth

				else

					left = findPosX(object)

					

				var top

				if( obj.vAlign == "top" )

					top = findPosY(object)

				else

					top = (findPosY(object) + object.offsetHeight)

				

				obj.containerStyle["left"] = obj.ns4 ? left : left + "px"

				obj.containerStyle["top"] = obj.ns4 ? top : top + "px"

			}

			

			if (!obj.open && !obj.aniTimer) reg[id].startSlide(true)

		}

	}

	else

	{

		for (menu in reg) if (id != menu) dropMenu.hide(menu)

	}

}



dropMenu.hideMenu = function(id)

{

	var obj = dropMenu.Registry[id]

	if( obj )

	{

		if (obj.container) {

			if (obj.hideTimer) window.clearTimeout(obj.hideTimer)

			obj.hideTimer = window.setTimeout("dropMenu.hide('" + id + "')", dropMenu.hideDelay);

		}

	}

}



dropMenu.hideAll = function()

{

	var reg = dropMenu.Registry

	for (menu in reg) {

		dropMenu.hide(menu);

		if (menu.hideTimer) window.clearTimeout(menu.hideTimer);

	}

}



dropMenu.hide = function(id)

{

	var obj = dropMenu.Registry[id]

	obj.over = false

	if (obj.hideTimer) window.clearTimeout(obj.hideTimer)

	obj.hideTimer = 0

	if (obj.open && !obj.aniTimer) obj.startSlide(false)

}



dropMenu.prototype.startSlide = function(open) {

	this[open ? "onactivate" : "ondeactivate"]()

	this.open = open

	if (open) this.setVisibility(true)

	this.startTime = (new Date()).getTime() 

	this.aniTimer = window.setInterval(this.gRef + ".slide()", dropMenu.minCPUResolution)

}



dropMenu.prototype.slide = function() {

	var elapsed = (new Date()).getTime() - this.startTime

	if (elapsed > dropMenu.aniLen || this.animation == false) this.endSlide()

	else {

		var d = Math.round(Math.pow(dropMenu.aniLen-elapsed, 2) * this.accelConst)

		if (this.open && this.dirType == "-") d = -d

		else if (this.open && this.dirType == "+") d = -d

		else if (!this.open && this.dirType == "-") d = -this.dim + d

		else d = this.dim + d

		this.moveTo(d)

	}

}



dropMenu.prototype.endSlide = function() {

	this.aniTimer = window.clearTimeout(this.aniTimer)

	this.moveTo(this.open ? this.outPos : this.homePos)

	if (!this.open) this.setVisibility(false)

	if ((this.open && !this.over) || (!this.open && this.over)) {

		this.startSlide(this.over)

	}

}



dropMenu.prototype.setVisibility = function(bShow) { 

	var s = this.ns4 ? this.container : this.container.style

	s.visibility = bShow ? "visible" : "hidden"

}



dropMenu.prototype.moveTo = function(p) { 

	this.style[this.orientation == "h" ? "left" : "top"] = this.ns4 ? p : p + "px"

}



dropMenu.prototype.getPos = function(c) {

	return parseInt(this.style[c])

}



dropMenu.prototype.onactivate = function() {}

dropMenu.prototype.ondeactivate = function() { }



function findPosX(obj)

{

	var curleft = 0;

	if (obj.offsetParent)

	{

		while (obj.offsetParent)

		{

			curleft += obj.offsetLeft

			obj = obj.offsetParent;

		}

	}

	else if (obj.x)

		curleft += obj.x;

	return curleft;

}



function findPosY(obj)

{

	var curtop = 0;

	if (obj.offsetParent)

	{

		while (obj.offsetParent)

		{

			curtop += obj.offsetTop

			obj = obj.offsetParent;

		}

	}

	else if (obj.y)

		curtop += obj.y;

	return curtop;

}