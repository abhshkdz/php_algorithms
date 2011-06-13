<?php

/**
 * Implementation of the levenshtein editing distance algorithm, 
 * that can be used natively in PHP with levenshtein()
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function editing_distance($a, $b) {
	$array = array();
	for ($i = 0; $i <= strlen($a); $i++) {
		$array[$i] = array();
		$array[$i][0] = $i;
	}
	for ($i = 0; $i <= strlen($b); $i++) {
		$array[0][$i] = $i;
	}
	for($i = 1; $i <= strlen($a); $i++) {
		for ($j = 1; $j <= strlen($b); $j++) {
			$array[$i][$j] = min ($array[$i-1][$j-1], $array[$i-1][$j], $array[$i][$j-1]) + ($a[$i-1] != $b[$j-1]? 1:0);
		}
	}
	return $array[strlen($a)][strlen($b)];
}

