<?php 

	function couper($str,$car){
		$tab=explode($car, $str);
		return $tab;
	}

	print_r(couper("salut professeur, comment allez vous ?"," "));
 
?>