<?php

/**
 * Fibonacci in O(2^n)
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function fib0($n) {
	if ($n <= 1) return $n;
	return fib0($n-1) + fib0($n-2);
}

/**
 * Fibonacci in O(n) in time and memory
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function fib1($n) {
	$fib = array(0,1);
	for($i = 2; $i <= $n; $i++) {
		$fib[$i] = $fib[$i-1] + $fib[$i-2];
	}
	return $fib[$n];
}

/**
 * Fibonacci in O(n) in time and O(1) in space
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function fib2($n) {
	if ($n <= 1) return $n;
	$fibNMinus1 = 1;
	$fibNMinus2 = 0;
	$fib = 0;
	for($i = 2; $i <= $n; $i++) {
		$fib = $fibNMinus1 + $fibNMinus2;

		$fibNMinus2 = $fibNMinus1;
		$fibNMinus1 = $fib;
	}

	return $fib;
}

/**
 * Fibonacii in O(lg n) in time
 *
 * Using the theorem that Fib(n) = ([[1,1],[1,0]] ^ n)[0][1]
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function fib3($n) {
	require_once './power.php';
	$baseMatrix = array(array(1,1),array(1,0));
	$resultMatrix = power_matrix($baseMatrix, $n);
	return $resultMatrix[0][1];
}

