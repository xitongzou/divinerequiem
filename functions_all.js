whitespace = "\t \n\r";
function isEmptyString(s)
{
    var i;
	if((s == null) || (s.length == 0)) return true;
	for(i=0;i < s.length;i++)
	{
		var currchar = s.charAt(i);
		if(whitespace.indexOf(currchar) == -1) return false;
	}
	return true;
}

All_numbers = "1234567890";
function isAnyNumber_Check(s)
{
    var i;
	for(i=0;i < s.length;i++)
	{
		var currchar = s.charAt(i);
		if(All_numbers.indexOf(currchar) != -1) return true;
	}
	return false;
}

function isNotNumeric(s)
{
	if(isNaN(s))
	{
		return(true);
	}
	return(false);
}

function isEmail(n)
{
		if ((n==null) || (n.length==0))
		{
			return true;
		}
		if (isEmptyString(n)) return false;
		var i=1;
		var nLength=n.length;
		while((parseInt(i) < parseInt(nLength)) && (n.charAt(parseInt(i)) != '@'))
		{
			i++;
		}
		if ((parseInt(i) >= parseInt(nLength)) || (n.charAt(i)!="@"))
		{
			return false;	
		}	
		else i+=2;
		while((i<nLength) && (n.charAt(i)!="."))
		{
			i++;
		}
		if ((i>=nLength-1) || (n.charAt(i)!="."))
		{
			return false;	
		}	
		else return true;		
}

/////////////////////////////////////////////////
first_I_on = new Image();
first_I_on.src = "nav_images/f_on.gif";
first_I_off = new Image();
first_I_off.src = "nav_images/f_off.gif";

previouspage_I_on = new Image();
previouspage_I_on.src = "nav_images/pp_on.gif";
previouspage_I_off = new Image();
previouspage_I_off.src = "nav_images/pp_off.gif";

previousframe_I_on = new Image();
previousframe_I_on.src = "nav_images/p_on.gif";
previousframe_I_off = new Image();
previousframe_I_off.src = "nav_images/p_off.gif";

nextframe_I_on = new Image();
nextframe_I_on.src = "nav_images/n_on.gif";
nextframe_I_off = new Image();
nextframe_I_off.src = "nav_images/n_off.gif";

nextpage_I_on = new Image();
nextpage_I_on.src = "nav_images/nn_on.gif";
nextpage_I_off = new Image();
nextpage_I_off.src = "nav_images/nn_off.gif";

last_I_on = new Image();
last_I_on.src = "nav_images/l_on.gif";
last_I_off = new Image();
last_I_off.src = "nav_images/l_off.gif";

function rollon(imgName)
{
    document.images[imgName.name].src = eval(imgName.name + "_on.src");
}
function rolloff(imgName)
{
	document.images[imgName.name].src = eval(imgName.name + "_off.src");
}
function ShowNavigationBar(Record_Start_ID,Records_To,TotalRecords,visualtablesrows,visualbarcolumns,page_url_nav)
{
   	document.write("<table width=591 cellpadding=5 cellspacing=0 border=0 align=center><tr class='bgcolor4'><td><b>&nbsp;&nbsp;Record's Display » ["+Record_Start_ID+" - "+Records_To+" of "+TotalRecords+"]</b></td></tr><tr><td align=left height=1>");
	if(TotalRecords > visualtablesrows)
	{
		document.write("<table border=0 align=left height=27 valign=Bottom cellPadding=0 cellSpacing=9 ");
  		document.write("<tr>");
  		if(parseInt(TotalRecords) != 0)
  		{
	 		document.write("<td ALIGN=left><b>Go to Page:</b></td>");
  	 		var first_I=first_I;
  	 		if((parseInt((parseInt(Record_Start_ID)/parseInt(visualtablesrows)) + 1)-1)> 0)
			{
  				document.write("<td > <a href='"+page_url_nav+"&Record_Start_ID=" + 1 + "' TITLE='First Page' target='_self' onmouseover='rollon(first_I);' onmouseout='rolloff(first_I);'><img src='nav_images/f_off.gif' name='first_I' border=0></a></td>");
			}	
  		}
	  	if(((parseInt((parseInt(Record_Start_ID)/(parseInt(visualtablesrows)*parseInt(visualbarcolumns))) + 1)-1)> 0) && (parseInt(TotalRecords) != 0))
	  	{
	 	 	var previouspage_I=previouspage_I;
		 	document.write("<td > <a href='"+page_url_nav+"&Record_Start_ID=" + parseInt((parseInt(parseInt(Record_Start_ID)/(parseInt(visualtablesrows)*parseInt(visualbarcolumns)))-1)*(parseInt(visualtablesrows)*parseInt(visualbarcolumns))+1) + "'  TITLE='Previous "+visualbarcolumns+" Pages' target='_self' onmouseover='rollon(previouspage_I);' onmouseout='rolloff(previouspage_I);'><img src='nav_images/pp_off.gif' name='previouspage_I' border=0></a></td>");
	  	}
	  	if(((parseInt((parseInt(Record_Start_ID)/parseInt(visualtablesrows)) + 1)-1)> 0) && (parseInt(TotalRecords) != 0))
	  	{
	  	 	var previousframe_I=previousframe_I;
	 	 	document.write("<td > <a href='"+page_url_nav+"&Record_Start_ID=" + parseInt((parseInt(parseInt(Record_Start_ID)/parseInt(visualtablesrows))-1)*parseInt(visualtablesrows)+1) + "'  TITLE='Previous Pages' target='_self' onmouseover='rollon(previousframe_I);' onmouseout='rolloff(previousframe_I);'><img src='nav_images/p_off.gif'  name='previousframe_I' border=0></a></td>");
	  	}
	  	for(var I=parseInt((parseInt((parseInt(Record_Start_ID)/(parseInt(visualtablesrows)*parseInt(visualbarcolumns))) + 1)-1)*parseInt(visualbarcolumns)+1);I<=parseInt((parseInt((parseInt(Record_Start_ID)/(parseInt(visualtablesrows)*parseInt(visualbarcolumns))) + 1)-1)*parseInt(visualbarcolumns)+parseInt(visualbarcolumns)) && ((I-1)*parseInt(visualtablesrows)<TotalRecords) && (parseInt(TotalRecords) != 0);I++)
	  	{
	  		var J = I-1;
	  		document.write("<font size=3>");
	  		if(parseInt((parseInt(Record_Start_ID)-1)/parseInt(visualtablesrows)) == J)
			{
	    		document.write("<td align=center valign=center><font class='fonttype4'><b>" + I +"</b></font></td>");
			}	
	  		else
			{
	    		document.write("<td align=center valign=center> <a href='"+page_url_nav+"&Record_Start_ID=" + parseInt(parseInt(parseInt( J )*parseInt(visualtablesrows))+1) + "' target='_self'>" + I +"</a></td>");
			}	
	  		document.write("</font>");
	  	}
	  	if((parseInt(parseInt((parseInt(Record_Start_ID)/parseInt(visualtablesrows))+1)*parseInt(visualtablesrows)) < TotalRecords) && (parseInt(TotalRecords) != 0))
	  	{
	  		var nextframe_I=nextframe_I;
	  		document.write("<td > <a href='"+page_url_nav+"&Record_Start_ID=" + parseInt(parseInt(parseInt((parseInt(Record_Start_ID)/parseInt(visualtablesrows))+1)*parseInt(visualtablesrows))+1) + "'  TITLE='Next Page' target='_self'   onmouseover='rollon(nextframe_I);' onmouseout='rolloff(nextframe_I);'><img src='nav_images/n_off.gif' name='nextframe_I' border=0></a></td>");
	  	}
	  	if(((I-1)*parseInt(visualtablesrows) < TotalRecords) && (parseInt(TotalRecords) != 0))
	  	{
	 	 	var nextpage_I=nextpage_I;
	  		document.write("<td > <a href='"+page_url_nav+"&Record_Start_ID=" + parseInt(parseInt(parseInt((parseInt(Record_Start_ID)/(parseInt(visualtablesrows)*parseInt(visualbarcolumns)))+1)*(parseInt(visualtablesrows)*parseInt(visualbarcolumns)))+1) + "'  TITLE='Next "+visualbarcolumns+" Pages' target='_self'   onmouseover='rollon(nextpage_I);' onmouseout='rolloff(nextpage_I);'><img src='nav_images/nn_off.gif' name='nextpage_I' border=0></a></td>");
	  	}
	  	if(parseInt(TotalRecords) != 0)
	  	{
	  		var last_I=last_I;
	  		if((parseInt(parseInt((parseInt(Record_Start_ID)/parseInt(visualtablesrows))+1)*parseInt(visualtablesrows)) < TotalRecords))
			{
	  			document.write("<td > <a href='"+page_url_nav+"&Record_Start_ID=" + parseInt((parseInt(parseInt(TotalRecords-1)/parseInt(visualtablesrows))*parseInt(visualtablesrows))+1) + "'  TITLE='Last Page' target='_self' onmouseover='rollon(last_I);' onmouseout='rolloff(last_I);'><img src='nav_images/l_off.gif' name='last_I' border=0></a></td>");
			}	
	  	}
	  	document.write("</tr></table></td></tr></table>");
	}
	else
	{
	  	document.write("</td></tr></table>");
	}
}
/////////////////////////////////////////////////
function ShowNavigationBar1(Record_Start_ID,Records_To,TotalRecords,visualtablesrows,visualbarcolumns,page_url_nav)
{
   	document.write("<table width=500 cellpadding=5 cellspacing=0 border=0 align=center><tr class='bgcolor4'><td><b>&nbsp;&nbsp;Record's Display » ["+Record_Start_ID+" - "+Records_To+" of "+TotalRecords+"]</b></td></tr><tr><td align=left height=1>");
	if(TotalRecords > visualtablesrows)
	{
		document.write("<table border=0 align=left height=27 valign=Bottom cellPadding=0 cellSpacing=9 ");
  		document.write("<tr>");
  		if(parseInt(TotalRecords) != 0)
  		{
	 		document.write("<td ALIGN=left><b>Go to Page:</b></td>");
  	 		var first_I=first_I;
  	 		if((parseInt((parseInt(Record_Start_ID)/parseInt(visualtablesrows)) + 1)-1)> 0)
			{
  				document.write("<td > <a href='"+page_url_nav+"&Record_Start_ID=" + 1 + "' TITLE='First Page' target='_self' onmouseover='rollon(first_I);' onmouseout='rolloff(first_I);'><img src='nav_images/f_off.gif' name='first_I' border=0></a></td>");
			}	
  		}
	  	if(((parseInt((parseInt(Record_Start_ID)/(parseInt(visualtablesrows)*parseInt(visualbarcolumns))) + 1)-1)> 0) && (parseInt(TotalRecords) != 0))
	  	{
	 	 	var previouspage_I=previouspage_I;
		 	document.write("<td > <a href='"+page_url_nav+"&Record_Start_ID=" + parseInt((parseInt(parseInt(Record_Start_ID)/(parseInt(visualtablesrows)*parseInt(visualbarcolumns)))-1)*(parseInt(visualtablesrows)*parseInt(visualbarcolumns))+1) + "'  TITLE='Previous "+visualbarcolumns+" Pages' target='_self' onmouseover='rollon(previouspage_I);' onmouseout='rolloff(previouspage_I);'><img src='nav_images/pp_off.gif' name='previouspage_I' border=0></a></td>");
	  	}
	  	if(((parseInt((parseInt(Record_Start_ID)/parseInt(visualtablesrows)) + 1)-1)> 0) && (parseInt(TotalRecords) != 0))
	  	{
	  	 	var previousframe_I=previousframe_I;
	 	 	document.write("<td > <a href='"+page_url_nav+"&Record_Start_ID=" + parseInt((parseInt(parseInt(Record_Start_ID)/parseInt(visualtablesrows))-1)*parseInt(visualtablesrows)+1) + "'  TITLE='Previous Pages' target='_self' onmouseover='rollon(previousframe_I);' onmouseout='rolloff(previousframe_I);'><img src='nav_images/p_off.gif'  name='previousframe_I' border=0></a></td>");
	  	}
	  	for(var I=parseInt((parseInt((parseInt(Record_Start_ID)/(parseInt(visualtablesrows)*parseInt(visualbarcolumns))) + 1)-1)*parseInt(visualbarcolumns)+1);I<=parseInt((parseInt((parseInt(Record_Start_ID)/(parseInt(visualtablesrows)*parseInt(visualbarcolumns))) + 1)-1)*parseInt(visualbarcolumns)+parseInt(visualbarcolumns)) && ((I-1)*parseInt(visualtablesrows)<TotalRecords) && (parseInt(TotalRecords) != 0);I++)
	  	{
	  		var J = I-1;
	  		document.write("<font size=3>");
	  		if(parseInt((parseInt(Record_Start_ID)-1)/parseInt(visualtablesrows)) == J)
			{
	    		document.write("<td align=center valign=center><font class='fonttype4'><b>" + I +"</b></font></td>");
			}	
	  		else
			{
	    		document.write("<td align=center valign=center> <a href='"+page_url_nav+"&Record_Start_ID=" + parseInt(parseInt(parseInt( J )*parseInt(visualtablesrows))+1) + "' target='_self'>" + I +"</a></td>");
			}	
	  		document.write("</font>");
	  	}
	  	if((parseInt(parseInt((parseInt(Record_Start_ID)/parseInt(visualtablesrows))+1)*parseInt(visualtablesrows)) < TotalRecords) && (parseInt(TotalRecords) != 0))
	  	{
	  		var nextframe_I=nextframe_I;
	  		document.write("<td > <a href='"+page_url_nav+"&Record_Start_ID=" + parseInt(parseInt(parseInt((parseInt(Record_Start_ID)/parseInt(visualtablesrows))+1)*parseInt(visualtablesrows))+1) + "'  TITLE='Next Page' target='_self'   onmouseover='rollon(nextframe_I);' onmouseout='rolloff(nextframe_I);'><img src='nav_images/n_off.gif' name='nextframe_I' border=0></a></td>");
	  	}
	  	if(((I-1)*parseInt(visualtablesrows) < TotalRecords) && (parseInt(TotalRecords) != 0))
	  	{
	 	 	var nextpage_I=nextpage_I;
	  		document.write("<td > <a href='"+page_url_nav+"&Record_Start_ID=" + parseInt(parseInt(parseInt((parseInt(Record_Start_ID)/(parseInt(visualtablesrows)*parseInt(visualbarcolumns)))+1)*(parseInt(visualtablesrows)*parseInt(visualbarcolumns)))+1) + "'  TITLE='Next "+visualbarcolumns+" Pages' target='_self'   onmouseover='rollon(nextpage_I);' onmouseout='rolloff(nextpage_I);'><img src='nav_images/nn_off.gif' name='nextpage_I' border=0></a></td>");
	  	}
	  	if(parseInt(TotalRecords) != 0)
	  	{
	  		var last_I=last_I;
	  		if((parseInt(parseInt((parseInt(Record_Start_ID)/parseInt(visualtablesrows))+1)*parseInt(visualtablesrows)) < TotalRecords))
			{
	  			document.write("<td > <a href='"+page_url_nav+"&Record_Start_ID=" + parseInt((parseInt(parseInt(TotalRecords-1)/parseInt(visualtablesrows))*parseInt(visualtablesrows))+1) + "'  TITLE='Last Page' target='_self' onmouseover='rollon(last_I);' onmouseout='rolloff(last_I);'><img src='nav_images/l_off.gif' name='last_I' border=0></a></td>");
			}	
	  	}
	  	document.write("</tr></table></td></tr></table>");
	}
	else
	{
	  	document.write("</td></tr></table>");
	}
}

function DonloadWindow(my_url)
{ 
	var My_Download_Open = window.open(my_url,"My_Download","toolbar=0,location=0,directories=0,status=0,menubar=1,scrollbars=1,resize=no,copyhistory=0,width=627,height=375")
	My_Download_Open.focus();
	My_Download_Open.moveTo(85,50);
}

function confdel()
{
	var fl = 0;
	for(i = 0; i < (document.frm_1.elements.length); i++)
	{
		if((document.frm_1.elements[i].type=="checkbox") && (document.frm_1.elements[i].checked==true))
		{
			fl = 1;
			break;
		}
	}
	if(fl == 1)
	{
		if(confirm("Records related will also get Deleted, Are you sure you want to Delete?"))
		{
			fl = 1;
		}
		else
		{
			fl = 0;
		}
	}
	else
	{
		alert("Nothing to Delete.");
		fl = 0;
	}
	if(fl == 1)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function Select_Delect_All(total_records_viewed)
{
	for(i=0;i<total_records_viewed;i=i+1)
	{
		if(document.frm_1.chk_SD.checked==true)
		{
			document.frm_1.elements["chk_1["+i+"]"].checked=true;
		}
		else
		{
			document.frm_1.elements["chk_1["+i+"]"].checked=false;
		}
	}
}

extArray = new Array(".gif",".jpg",".jpeg",".jpe");
function Allowed_Uploaded_Files(File_Value)
{
	allowSubmit = false;
	if (!File_Value)
	{
		return true;
	}
	while (File_Value.indexOf("\\") != -1)
	{
		File_Value = File_Value.slice(File_Value.indexOf("\\") + 1);
	}
	ext = File_Value.slice(File_Value.indexOf(".")).toLowerCase();
	for (var i = 0; i < extArray.length; i++)
	{
		if (extArray[i] == ext)
		{
			allowSubmit = true;
			break;
		}
	}
	if (allowSubmit)
	{
		return true;
	}
	else
	{
		return false;
	}
}
extArray_swf = new Array(".swf");
function Allowed_Uploaded_Files_swf(File_Value)
{
	allowSubmit = false;
	if (!File_Value)
	{
		return true;
	}
	while (File_Value.indexOf("\\") != -1)
	{
		File_Value = File_Value.slice(File_Value.indexOf("\\") + 1);
	}
	ext = File_Value.slice(File_Value.indexOf(".")).toLowerCase();
	for (var i = 0; i < extArray_swf.length; i++)
	{
		if (extArray_swf[i] == ext)
		{
			allowSubmit = true;
			break;
		}
	}
	if (allowSubmit)
	{
		return true;
	}
	else
	{
		return false;
	}
}
extArray_zip = new Array(".zip");
function Allowed_Uploaded_Files_zip(File_Value)
{
	allowSubmit = false;
	if (!File_Value)
	{
		return true;
	}
	while (File_Value.indexOf("\\") != -1)
	{
		File_Value = File_Value.slice(File_Value.indexOf("\\") + 1);
	}
	ext = File_Value.slice(File_Value.indexOf(".")).toLowerCase();
	for (var i = 0; i < extArray_zip.length; i++)
	{
		if (extArray_zip[i] == ext)
		{
			allowSubmit = true;
			break;
		}
	}
	if (allowSubmit)
	{
		return true;
	}
	else
	{
		return false;
	}
}