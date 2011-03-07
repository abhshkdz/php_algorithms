<?php
/**
 * Given 2 arrays, A and B: 
 * A = [ 1, 3, 5, 7 , 9, __, __, __, __ ]
 * A has n numbers and m empty slots
 * In this case, n = 5, m = 4
 * B = [ 2, 4, 6, 8 ]
 * B has exactly m elements
 * The two arrays are sorted
 * Calculate A merged with B (sorted). 
 * The algorithm should be In-place and O(n) time:
 * [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ] 
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */

function merge_arrays(array &$a, array $b) {
	$i = count($a) - count($b) - 1; //current element of A
	$j = count($b) - 1; //current element of B
	$k = count($a) - 1; //position to insert current value

	while ($j >= 0) {
		if ($i >= 0 && $a[$i] > $b[$j]) {
			$a[$k] = $a[$i];
			$i--;
		} else {
			$a[$k] = $b[$j];
			$j--;
		}
		$k--;

	}
}
