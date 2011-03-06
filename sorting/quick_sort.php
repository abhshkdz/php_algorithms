<?php
/**
 * Implementation of quick sort algorithm
 * O(n lgn)
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */

/**
 * Swaps two positions ($x and $y) of an array $a
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function swap(array &$a, $x, $y) {
	$tmp = $a[$x];
	$a[$x] = $a[$y];
	$a[$y] = $tmp;
}

/**
 * Recursively sorts parts of the array
 * @param $a array to be sorted
 * @param $lowerLimit Index of the first element to be sorted
 * @param $upperLimit Index of the last element to be sorted
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function quicksort(array &$a, $lowerLimit, $upperLimit) {
	if ($upperLimit <= $lowerLimit) return;
	$pivot = pivot($a, $lowerLimit, $upperLimit);
	quicksort($a, $lowerLimit, $pivot - 1);
	quicksort($a, $pivot + 1, $upperLimit);
}

/**
 * Chooses a pivot and makes that every element that is smaller
 * than the pivot will be on its left, and every element that is
 * bigger, on its right
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function pivot(array &$a, $lowerLimit, $upperLimit) {
	$pivot = $upperLimit;
	$dividerPosition = $lowerLimit;
	for ($i = $lowerLimit; $i < $upperLimit; $i++) {
		if ($a[$i] < $a[$pivot]) {
			swap($a, $i, $dividerPosition);
			$dividerPosition++;
		}
	}
	swap($a, $pivot, $dividerPosition);
	return $dividerPosition;
}
