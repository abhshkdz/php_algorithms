<?php

/**
 * Algorithm to determine if a given sum exists among any two elements 
 * of an unsorted array
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */

/**
 * Checks every possible sum, O(n^2)
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function sum_exists0(array $nums, $s) {
	for ($i = 0, $numsLength = count($nums); $i < $numsLength; $i++) {
		for ($j = $i+1; $j < $numsLength; $j++) {
			if ($nums[$i] + $nums[$j] == $s) return true;
		}
	}
	return false;
}

/**
 * Sorts before checking, It's O(n lg n) due to the sorting, 
 * the search itself is O(n)
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */

function sum_exists1(array $nums, $s) {
	sort($nums);
	$i = 0; //index of first element
	$j = count($nums) - 1; //index of last element
	
	while ($i < $j) {
		$actualSum = $nums[$i] + $nums[$j];
		if ($actualSum == $s) 
			return true;
		
		/* As the array is sorted, the element 
		 * on position n+1 is bigger than the one on position n
		 */		
		if ($actualSum < $s) {
			$i++;
		} else {
			$j--;
		}
	}
	return false;
}

