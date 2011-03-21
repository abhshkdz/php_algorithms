<?php

define('INFINITY', PHP_INT_MAX);

/**
 * Question: You are given an array with integers (both positive and negative) 
 * in any random order. 
 * Find the sub-array with the largest sum.
 *
 * Implementation of Kadane's Algorithm to determine the 
 * subarray with maximum sum in O(n) with constant space (O(1))
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function max_subarray_sum(array $a) {

	$maxSum = -INFINITY;
	$maxStartIndex = $maxEndIndex = 0;
	$currentMaxSum = 0;
	$currentStartIndex = 0;
	
	for ($currentEndIndex = 0, $aLength = count($a); $currentEndIndex < $aLength; $currentEndIndex++) {
		$currentMaxSum += $a[$currentEndIndex];
		if ($currentMaxSum > $maxSum) {
			$maxSum = $currentMaxSum;
			$maxStartIndex = $currentStartIndex;
			$maxEndIndex = $currentEndIndex;
		}

		if ($currentMaxSum < 0) {
			$currentMaxSum = 0;
			$currentStartIndex = $currentEndIndex + 1;
		}
	}
	return array_slice($a, $maxStartIndex, $maxEndIndex - $maxStartIndex + 1);
}

