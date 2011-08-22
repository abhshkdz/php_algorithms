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
		/* If adding the current element makes the sum bigger than previous stored value
		 * set the max_sum_subarray start index as the start index of the current sequence
		 * and the end index as the current one 
		 */
		if ($currentMaxSum > $maxSum) {
			$maxSum = $currentMaxSum;
			$maxStartIndex = $currentStartIndex;
			$maxEndIndex = $currentEndIndex;
		}
		
		/* If the current max sum is lower than 0, consider the empty sub-array as the highest one
		 * with 0 and try to restart a new sequence
		 */
		if ($currentMaxSum < 0) {
			$currentMaxSum = 0;
			$currentStartIndex = $currentEndIndex + 1;
		}
	}
	return array_slice($a, $maxStartIndex, $maxEndIndex - $maxStartIndex + 1);
}

