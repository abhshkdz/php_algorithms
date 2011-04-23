<?php

define ('DELTA', 0.00001);
/**
 * Function to calculate an approximation of the square root with a maximum DELTA
 * of difference using the binary search principle.
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function my_sqrt($n) {
	$upperBound = $n;
	$lowerBound = 0;

	do {
		$x = ($upperBound - $lowerBound) / 2 + $lowerBound;
		$square = $x * $x;
		if ($square < $n) $lowerBound = $x;
		else $upperBound = $x;
	} while ($square < $n - DELTA || $square > $n + DELTA);

	return $x;
}

var_dump(my_sqrt(4));
var_dump(my_sqrt(9));
var_dump(my_sqrt(16));
var_dump(my_sqrt(25));
var_dump(my_sqrt(10));
