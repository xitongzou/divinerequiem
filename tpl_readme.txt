
//------------------------------------------------------//
/*                              			*/
/*   phPlebius Template System 1.0			*/
/*							*/
/*   Copyright (c) 2004 Plebius Press			*/
/*   Author: Martin Kretzmann				*/
/*   http://www.plebius.org/				*/
/*							*/
/*   Modified 22 June 2004				*/
/*							*/
//-----------------------------------------------//
//						 //
// You may not remove or change			 //
// any copyright notice that appears in script   //
// output.  If you choose to remove or change    //
// copyright notice, you agree to purchase a     //
// commercial license.  Visit 			 //
// http://scripts.plebius.org/ for details.	 //
//						 //
//-----------------------------------------------//

- System requirements
	1. PHP 4+

- INSTALLATION
	1. Make a backup of all files.
	2. Unzip the files.
	3. Upload to your webserver in ASCII mode

- Support
	10. http://www.plebius.org/modules.php?name=Forums

- How to call templates:

	1. include("includes/pbl_template.php");
	2. do_template($filename, $array);
		- The $filename variable must be the full filename.
		- The $array is an array that contains whatever variables
		  you want to use.
		- This function returns some HTML, it doesn't print it 
		  automatically.  You can assign it to a variable or just print
		  it out.
			e.g.  echo do_template("templates/bob.html", $array);
			e.g.  $html = do_template("templates/bill.html", $array);
	
- How to build a template:

	There are several ways to pass variable to the template system.

	IF EQUAL statements

		<!--(if variable="value")-->
			some HTML here
			variable does equal value!
		<!--(endif)-->

	IF NOT statements

		<!--(if variable != "value")-->
			some HTML here
			variable does not equal value!
		<!--(endif)-->			

	IF STARTS WITH statements (case insensitive)

		<!--(if variable = /val/)-->
			some HTML here
			variable does start with value!
		<!--(endif)-->

	IF DOES NOT START WITH (case insensitive)

		<!--(if variable != /val/)-->
			some HTML here
			variable does not start with value!
		<!--(endif)-->

	ENTER VARIABLE VALUE

		'<!--(variable)-->'
		will be replaced with
		'value'

-- If you like and/or use this software, please consider making a donation at plebius.org

-- Example template --------------------------------------------------

<html>
<head>
<title><!--(pagetitle)--></title>
<META NAME="description" value="<!--(metadesc)-->">

</head>

<!--(if mode="dark")-->
<body bgcolor="black" text="white">
<!--(endif)-->

<!--(if mode!="dark")-->
<body>
<!--(endif)-->

Blah blah blah

Blah

<!--(if op="SHowTheStuff")-->

	Hey, this is some stuff!

<!--(endif)-->


<!--(if subscriber!="1")-->

	You know, you should subscribe and give me money.

<!--(endif)-->

<!--(if subscriber="1")-->

	Welcome, <!--(username)-->!  Thank you for giving us your money!

<!--(endif)-->


This great little template script was made by these guys:
<!--(copyright)-->

</body>

</html>


--------------------------------------------------------------------------

