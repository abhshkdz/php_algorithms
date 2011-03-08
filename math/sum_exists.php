<?php

/**
 * Algorithm to determine if a given sum exists among any two elements 
 * of an unsorted array
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */

/**
 * Checks every possible sum, O(n^2)
 * With constant space, O(1) 
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
 * the search itself is O(n), it uses constant space (O(1))
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

/**
 * Uses a hashmap to store and verify if the missing terms for a sum 
 * exists while iterating through the array. O(n) in time and O(n) in space for the hashmap
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function sum_exists2(array $nums, $s) {
	$missingTermForSum = array();

	foreach ($nums as $n) {
		if (isset($missingTermForSum[$n]))
			return true;
		$missingTermForSum[$s - $n] = true; //value doesn't matter
	}
	return false;
}
