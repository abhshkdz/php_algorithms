<?php
/**
 * Implementation of mergesort, it consists of a divide'n'conquer approach,
 * always spliting the array in two and recursivelly doing so to each sub-array.
 * At the end, merges the sub-arrays on sorted order
 *
 * O(n lgn)
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function mergesort(array &$a) {
	if (count($a) == 1) return $a;
	$middle = (int) count($a)/2;

	$left = array_slice($a, 0, $middle);
	$right = array_slice($a,$middle);

	mergesort($left);
	mergesort($right);

	$a = merge($left, $right);
}

/**
 * Merges two arrays in order
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function merge(array $array1, array $array2) {
	$result = array();
	while (!empty($array1) && !empty($array2)) {
		if ($array1[0] < $array2[0])
			$result[] = array_shift($array1);
		else
			$result[] = array_shift($array2);
	}
	//Append what's left on array1 or array2
	return array_merge($result,$array1,$array2);
}

