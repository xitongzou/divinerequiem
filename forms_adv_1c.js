// 21 Sep 2004
// Change to the CheckForm function, Pass password values instead of form

// 10 Mar 2005
// Change to the HighlightRequired and HighlightInvalid functions, Remove browser type check

var	blnPopErrorMessage = 0
function CheckForm(frm)
{
	
	blnPopErrorMessage = 0
	var strErrorMessage = "Please complete all required fields!" + '\n'
	var strPreviousAttributeName = ""
	//Loop through form fields
	for (loop=0; loop < frm.length; loop++) {
		var field = frm[loop]
		var strFormInputName = field.name;
		
		if (strFormInputName)
		{

			var strFormInputPrefix = strFormInputName.slice(0,3);
			var strFormInputType = field.type
			var strAttributeName = strFormInputName.substring(3,strFormInputName.length).toLowerCase();
	//		alert(strFormInputPrefix)		
			var blnRequired = false
			// check for valid form field starts
			
			if (strFormInputPrefix=='str' ||
				strFormInputPrefix=='txt' ||
				strFormInputPrefix=='dat' ||
				strFormInputPrefix=='int')
			{
				blnRequired = false
	// #### Check Empty Data Integrity ####
	
				if (strFormInputPrefix == 'int') {
					var varFormValue
					varFormValue = frm[loop].value
					if(varFormValue.length > 0) {
						if(isNaN(varFormValue) == true) {
							strErrorMessage += "Invalid number entered in a numeric field" + '\n'
							blnRequired = true
						}
					}
				}
				
				if (strFormInputPrefix == 'dat') {
					var varFormValue
					varFormValue = frm[loop].value
					if(varFormValue.length > 0) {
						if(strFormInputName.lastIndexOf("_Day") < -1 && strFormInputName.lastIndexOf("_Month") < -1 && strFormInputName.lastIndexOf("_Year") < -1)
						{
							if(varFormValue.length < 5) {
								strErrorMessage += "Invalid date entered in a date field" + '\n'
								blnRequired = true
							}
						}  else {
							if(varFormValue.length > 0) {
								if(isNaN(varFormValue) == true) {
									strErrorMessage += "Invalid date entered in a date field" + '\n'
									blnRequired = true
								}
							}
						}
					}
				}
	
				//Loop through Required formNames array
	
				for (index=0; index < formNames.length; index++) {
					if (strAttributeName == formNames[index].toLowerCase()) {
				
	// ####  Check For Empty Required Fields ####
	
						if ((strFormInputType == 'text') || (strFormInputType == 'textarea') || (strFormInputType == 'hidden') || (strFormInputType == 'select-one') || (strFormInputType == 'password')) {
							if (eval("frm." + strFormInputName).value == "")
							{
								blnRequired = true						
							}
						}
	
						// Check box
						if (strFormInputType == 'checkbox') {
							if (field.checked == false) {
								blnRequired = true
						}	}
	
						//Radio buttons
						if (strFormInputType == 'radio'  && strPreviousAttributeName != strAttributeName) {
							var fieldRadio = eval("frm." + field.name)
							if(CheckBlankRadioField(fieldRadio)) {
								blnRequired = true
								
							}
						}
	
	// ####  Check Special Email Types ####
						if (formValues[index] == 'email')
						{
							var strOriginalErrorMessage
							strOriginalErrorMessage = strErrorMessage
							strErrorMessage += CheckEmail(frm[loop].value)
							if(strOriginalErrorMessage != strErrorMessage) {
								strErrorMessage += '\n'
								blnRequired = true
							}
						}
	//						alert(frm[loop].value)
						// ### Email Type Ends					
	
	// ####  Check Special Credit Card Details ####
						if (formValues[index] == 'credit card number')
						{
							var strOriginalErrorMessage
							strOriginalErrorMessage = strErrorMessage
							strErrorMessage += CheckCardNumber(frm)
							if(strOriginalErrorMessage != strErrorMessage) {
								strErrorMessage += '\n'
								blnRequired = true
	
							}
						}
	
						if (formValues[index] == 'credit card expiry year')
						{
							var strOriginalErrorMessage
							strOriginalErrorMessage = strErrorMessage
							strErrorMessage += CheckExpiryYear(frm[loop])
							if(strOriginalErrorMessage != strErrorMessage) {
								strErrorMessage += '\n'
								blnRequired = true
							}
						}
	
	
						if (formValues[index] == 'credit card expiry month')
						{
							var strOriginalErrorMessage
							strOriginalErrorMessage = strErrorMessage
							strErrorMessage += CheckExpiryMonth(frm[loop])
							if(strOriginalErrorMessage != strErrorMessage) {
								strErrorMessage += '\n'
								blnRequired = true
							}
						}
	
	
						if (formValues[index] == 'password')
						{
							var fieldPasswordConfirm
							fieldPasswordConfirm = frm.PasswordConfirm
	
							var strOriginalErrorMessage
							strOriginalErrorMessage = strErrorMessage
							strErrorMessage += CheckPassword(field,fieldPasswordConfirm)
							if(strOriginalErrorMessage != strErrorMessage) {
								strErrorMessage += '\n'
								blnRequired = true
								HighlightInvalid(fieldPasswordConfirm, true)
							}
						}
						
	// ### Credit Card Ends
						
					}
				}
				if (strPreviousAttributeName != strAttributeName) {
					HighlightRequired(field, blnRequired)
				}
				strPreviousAttributeName = strAttributeName
			}
		// check for valid form field ends
		}
	} 

	if (blnPopErrorMessage==1)
	{
		alert(strErrorMessage)
		return false
	} else {
		return true
	}
}


function CheckPassword(field,fieldPasswordConfirm)
{
	if (field.value == '')
	{
		return " "
	} else {
		if (field.value.length < 4)
		{
			return "Password needs to be 4 or more characters."
		} else {

			if (field.value.lastIndexOf(" ") > -1)
			{
				return "Passwords must not have any gaps"
			} else {
				if (field.value != fieldPasswordConfirm.value)
				{
					return "Passwords do not match."
				} else {
					return ""
				}
			}
		}
	}
}


function CheckBlankRadioField(field) {

	var i
	for (i=0; i < field.length; i++) {
		if(field[i].checked == true)
		{
			for (i=0; i < field.length; i++) {
				HighlightRequired(field[i], false)
			}

			return false
		}
	}

	for (i=0; i < field.length; i++) {
		HighlightRequired(field[i], true)
	}
	return true
}

function HighlightInvalid(field, blnHighlight)
{
	HighlightRequired(field, blnHighlight)
}

function HighlightRequired(field, blnHighlight)
{
	var fieldInput = field
	
	if (blnHighlight == true)
	{
		fieldInput.style.background='#FFCCCC';
		blnPopErrorMessage = 1
	} 
	else
	{
		fieldInput.style.background='#EFEBDE';
	}
}


function CheckEmail(strEmailAddress)
{
  if (strEmailAddress == '') 
   	{
		return ""
	} else {
		if (strEmailAddress.length < 9 ||
		strEmailAddress.lastIndexOf("@") < 1)
		{
			return "Please make sure your email address is correct."
		} else {
			if (strEmailAddress.lastIndexOf(" ") > -1)
			{
				return "Please make sure there are no spaces in or either side of your email address."
			} else {
				if (strEmailAddress.lastIndexOf(".") < 1)
				{
					return "Please make sure your email address is correct."
				} else {
					return ""
				}
			}
		}
	}

}


function SuggestEmail(frm)
{
	var strEmailAddress = frm.strEmailAddress.value

	if(strEmailAddress.lastIndexOf(".conz") > -1)
	alert ("Suggest changing .conz to .co.nz")

	if(strEmailAddress.lastIndexOf(",") > -1)
	alert ("Suggest changing comma to a full stop")
	return true;

}


function CheckPasswordxx(strPassword, strPasswordConfirm)
{	
 
  if (strPassword =='' || 
	strPasswordConfirm =='' ) 
		{
			alert ("Please complete your password.");
			return false;
		} else {
			if (strPassword == strPasswordConfirm)
			{
				if (strPassword.length < 4 ||
				    strPassword.length > 8)
				{
					alert ("Passwords must be between 4 to 8 characters");
					return false;
				} else {

					if (strPassword.lastIndexOf(" ") > -1)
					{
						alert ("Passwords must not have any gaps");
						return false;
					} else {
						return true;				
					}				

				}				

			} else {
				alert ("Passwords do not match.");
				return false;
			}
		}
}

function PopupWindow(url, intWidth, intHeight)

	{
		if(navigator.appName == "Microsoft Internet Explorer")
			{
			remote = window.open(url,"remote","width=" + intWidth + " ,height=" + intHeight + ",resizable=yes,left=200,top=20,scrollbars=yes");
			}
		else
			{
			remote = window.open(url,"remote","width=" + intWidth + ",height=" + intHeight + ",resizable=yes,screenX=200,screenY=20,scrollbars=yes");
			}
		if(!(parseFloat(navigator.appVersion) < 3.0 && navigator.appName == "Microsoft Internet Explorer"))
			{
			remote.focus();
			}
	}



function ConfirmDelete(url)
	{
		if(confirm("Confirm Delete"))
		{
			location.href = url
		}
	}


function UpdateLink(msgLink)
	{
		if(confirm("Are you sure you want to delete this webpage"))
		{
			msgLink.href = msgLink.href + '&blnConfirmation=1'
		}
	}

function SubmitForm(frm)
		{
		frm.submit();
		}
		
function ResetForm(frm)
		{
		frm.reset();
		}
		
function ProcessCheckBoxes(frm)

	{	
		var strAction = ''
     	for (i = 0; i < frm.length; i++)
     	{
         	if (frm(i).type == 'checkbox')
        	{	
				
				if (frm(i).checked == false)
				{
					strAction = strAction + "&" + frm(i).name + "=0"
//					frm(i).value = '0';
//					frm(i).checked = true;
//				} else {
//					frm(i).value = '1';
				}
         	}
     	}
		frm.action = frm.action + strAction

		return true
	}


function PrepopulateForm(frmPopNames,frmPopValues)
{
	//Loop through form fields
	for (loop=0; loop < document.forms[0].length; loop++) {
		var field = document.forms[0][loop]
		if (field.name)
		{
			var fieldName = field.name;
			var fieldPrefix = fieldName.slice(0,3);
			var fieldType = field.type
			var attrName = fieldName.substring(3,fieldName.length).toLowerCase();
	
			if (fieldName.slice(0,2)=="id")
			{	
				var attrName = fieldName.toLowerCase();
			}
		
			//Loop through frmPopNames array
			for (index=0; index < frmPopNames.length; index++) {
				if (attrName == frmPopNames[index].toLowerCase()) {
	
					// One-dimensional text/string form field
					if ((fieldType == 'text') || (fieldType == 'textarea') || (fieldType == 'hidden')) {
						eval("document.forms[0]." + fieldName + ".value = '" + frmPopValues[index] + "'");
					}
					// Check box
					if (fieldType == 'checkbox') {
						if (field.value == frmPopValues[index]) {
							field.checked = true;
					}	}
					// List field
					if (fieldType == 'select-one') {
						for (selectIndex=0; selectIndex < field.length; selectIndex++) {
							if (field[selectIndex].value == frmPopValues[index]) {
								field[selectIndex].selected = true;
					}	}	}	
					//Radio buttons
					if (fieldType == 'radio') {
						if (field.value == frmPopValues[index]) {
							document.forms[0][loop].checked = true;
						}
					}
				}
			}
		}
	} 
}


function EditHTMLContent(idWebSite,strUserName,idWebPage,idLayout,strImageURL,strDestinationField) {
	var strImageLibraryURL = '/console/html_editor/html_editor_apps.asp?idWebSite=' + idWebSite + '&strUserName=' + strUserName + '&strImageURL=' + strImageURL + '&strDestinationField=' + strDestinationField + '&idWebPage=' + idWebPage + '&idLayout=' + idLayout
	window.open(strImageLibraryURL, '', 'height=500,width=650,top=0,left=0');
	
}
	
function ImagesLibrary(idWebSite,strUserName,idWebPage,strDestinationURL,strDestinationField,strReference) {
	var strImageLibraryURL = '/images_library.aspx?idWebSite=' + idWebSite + '&strUserName=' + strUserName + '&strDestinationURL=' + strDestinationURL + '&strDestinationField=' + strDestinationField + '&idWebPage=' + idWebPage + '&strReference=' + strReference
	
	window.open(strImageLibraryURL, '', 'height=550,width=630,top=0,left=0');
	
}


function SingleImageUpload(idWebSite,strUserName,idWebPage,strDestinationField,strReference,strTitle,strAction,strStartExtention,strEndExtention,strDescription) {
	var frm = document.form1

	var strFileName = eval("frm." + strDestinationField).value

	var strImageLibraryURL = '/image_upload.asp?idWebSite=' + idWebSite + '&strUserName=' + strUserName + '&FLE=' + strFileName + '&DFLD=' + strDestinationField + '&idWebPage=' + idWebPage + '&REF=' + strReference + '&TIT=' + strTitle + '&ACT=' + strAction + '&ST=' + strStartExtention + '&ED=' + strEndExtention
	
	window.open(strImageLibraryURL, '', 'resizable=yes,height=300,width=350,top=200,left=250');
}


function SingleImageUploadTemplate(idWebSite,strUserName,idWebPage,strDestinationField,strReference,strTitle,strAction,strTemplateCode,strDescription) {

	var frm = document.form1

	var strFileName = eval("frm." + strDestinationField).value

	var strImageLibraryURL = '/image_upload_template.asp?idWebSite=' + idWebSite + '&strUserName=' + strUserName + '&FLE=' + strFileName + '&DFLD=' + strDestinationField + '&idWebPage=' + idWebPage + '&REF=' + strReference + '&TIT=' + strTitle + '&ACT=' + strAction + '&TPLC=' + strTemplateCode
	
	window.open(strImageLibraryURL, '', 'resizable=yes,height=300,width=350,top=200,left=250');
}

function ValidateSearchWords(){

	var searchStr = document.searchForm.strSearchKeyWords.value;

	searchStr = searchStr.replace(/[^\w\s]/g, '');
	searchStr = searchStr.replace(/^\s*/, '').replace(/\s*$/, '');
	document.searchForm.strSearchKeyWords.value=searchStr;

	if(searchStr==""){
		alert('Please enter a search word');
		document.searchForm.strSearchKeyWords.value="";
		return false;
	}
	else if(searchStr.length < 4) {
		alert('Please enter a search word longer than 3 characters');
		return false;
	}
	else{
		return true;
	}
}
	
	
function DeleteRow(url)
{
	if( confirm("Are you sure you want to delete?") )
	{
		window.location = url
	}
	return
}