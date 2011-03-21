<?php

define('INFINITY', PHP_INT_MAX);

/**
 * Implementation of Kadane's Algorithm to determine the 
 * subarray with maximum sum
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

