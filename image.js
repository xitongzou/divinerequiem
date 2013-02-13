// JavaScript Document<!--
// ==============================================
// Copyright 2003 by jsCode.com
// Source: jsCode.com
// Author: etLux
// Free for all; but please leave in the header.
// ==============================================

// Set up the image files to be used.
var theImages = new Array() // do not change this
// To add more image files, continue with the
// pattern below, adding to the array. Rememeber
// to increment the theImages[x] index!

theImages[0] = 'http://divinerequiem.net/images/1.gif'
theImages[1] = 'http://divinerequiem.net/images/2.gif'
theImages[2] = 'http://divinerequiem.net/images/3.gif'
theImages[3] = 'http://divinerequiem.net/images/4.gif'
theImages[4] = 'http://divinerequiem.net/images/5.gif'
theImages[5] = 'http://divinerequiem.net/images/6.gif'
theImages[6] = 'http://divinerequiem.net/images/7.gif'
theImages[7] = 'http://divinerequiem.net/images/8.gif'
theImages[8] = 'http://divinerequiem.net/images/9.gif'
theImages[9] = 'http://divinerequiem.net/images/10.gif'
theImages[10] = 'http://divinerequiem.net/images/11.gif'
theImages[11] = 'http://divinerequiem.net/images/12.gif'

// ======================================
// do not change anything below this line
// ======================================

var j = 0
var p = theImages.length;

var preBuffer = new Array()
for (i = 0; i < p; i++){
   preBuffer[i] = new Image()
   preBuffer[i].src = theImages[i]
}

var whichImage = Math.round(Math.random()*(p-1));
function showImage(){
document.write('<img src="'+theImages[whichImage]+'">');
}

//-->
