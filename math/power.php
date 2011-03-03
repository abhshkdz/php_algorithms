<?php

/**
 * Calculates m^n in O(lg n)
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function power($m, $n) {
	if ($n == 0) return 1;
	if ($n == 1) return $m;
	if ($n % 2 == 1) {
		$tmp = power($m, ($n-1)/2); //make $n-1 even
		return $m * $tmp * $tmp;
	} else {
		$tmp = power($m, $n/2);
		return $tmp * $tmp;
	}
}

require_once './multiply_matrix.php';
/**
 * Powers the matrix A by n
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function power_matrix($a, $n) {
	if ($n == 1) return $a;
	if ($n % 2 == 1) {
		$tmp = power_matrix($a, ($n-1)/2);
		return multiply_matrix($a, multiply_matrix($tmp, $tmp));
	} else {
		$tmp = power_matrix($a, $n/2);
		return multiply_matrix($tmp, $tmp);
	}
}
