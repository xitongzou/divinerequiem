<?php

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
//------------------------------------------------------//
// Do not modify or distribute this file		//
//------------------------------------------------------//


function do_template($filename, $data) {

	if ($filename == "") {
		die("Please specify a template filename");
	}

	if(eregi("http://", $filename) OR strstr($filename, "..")) {
		die("Hack attempt");
	}

	if (!file_exists($filename)) {
		die("Unable to open template: It does not exist");
	}

	if (!($fp = file($filename))) {
		die("Unable to open file");
	}

	$HTML = '';
	$AddHTML = 1;
	$cp = 0;

	foreach ($fp as $line) {

		$arr = array();
		if (strstr($line, "<!--(endif)-->")) {
			$AddHTML = 1;
		}

		// Here is the regexp, returned values are...
		// 1 - Variable name (key in $data array)
		// 2 - Want an equal or not equal (= or !=)
		// 3 - quote or contain ("" or //)
		// 4 - value (in data array)
		else if (preg_match_all("/<!-+\s*\(\s*if\s+(\w+)\s*(!*)\s*=\s*(\"|\/)\s*(.*?)\s*\\3\s*\)\s*-+>/i", $line, $arr)) {

			// Direct match
			// 4 possible outcomes: data[key] == value or not and we can be looking for
			// them to be equal or not.  If one test is true and the other is false (2 outcomes) then
			// we show the following HTML... otherwise both are true or both are false (2 outcomes) and
			// we show no HTML.
			if ($arr[3][0] == "\"") {
				$AddHTML = ( ($data[$arr[1][0]] == $arr[4][0] ) != ( $arr[2][0] == "!" ) );
			}

			// Starts with match...
			// See above for logic.
			else if ($arr[3][0] == "/") {
				$pattern = $arr[4][0];
				$AddHTML = ( ( preg_match("/^$pattern/i", $data[$arr[1][0]]) ) != ( $arr[2][0] == "!" ) );
			}
		}

		// just stick in the value...
		// here, we add the $line straight to the $HTML because not doing the if-endif stuff.
		// so we have to check that we should even look at this.
		else if (preg_match_all("/<!-+\s*\((\w+)\s*\)\s*-+>/", $line, $arr) && $AddHTML == 1) {
			for ($i = 0; $i < count($arr); $i++) {
				$line = str_replace($arr[0][$i], $data[$arr[1][$i]], $line);
				if ($arr[1][$i] == 'copyright' && strpos($data[$arr[1][$i]], "www.plebius.org") > 0) {
					$cp = 1;
				}
			}
			$HTML .= $line;
		}

		// This is just a regular line..
		else {

			// Should we add it in?
			if ($AddHTML == 1) {
				$HTML .= $line;
			}
		}
	}

	if ($cp != 1) {
		$HTML = str_replace("</body>", showcopyright("") . "</body>", $HTML);
	}

	return $HTML;

}

// Removing or changing the following
// function or any reference to it in any
// scripts is a violation of the copyright
// and the terms of the license.  If you wish to 
// remove or change this notice, you must purchase
// a commercial license.  See http://scripts.plebius.org/
// for details.
function showcopyright($name) {
	return "<p align=center><small><a href=\"http://scripts.plebius.org/\">$name</a> Powered by <a href=\"http://www.plebius.org/\">Plebius Press</a><br>Copyright &copy; 2004</small></p>";
}

?>