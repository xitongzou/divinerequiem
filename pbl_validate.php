<?php




function removewhitespace ( $val ) {
	return preg_replace("/\s+/", ' ', $val);
}


function removehtml($val) {
	$val = str_replace( array ( 
					'&',
					'>',
					'<',
					'\"' ), 
			     array (		
					'&amp;',
					'&gt;',
					'&lt;',
					'&quot;' ),
				$val );
	return $val;
}


?>
