<?php
/**
 * Implementation of the QuickSelect algorithm to return the kth smallest 
 * element of an array. (k starts on 0)
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function kth_smallest_element($list, $k, $lowerLimit = 0, $upperLimit = -1) {
	if ($upperLimit == -1) $upperLimit = count($list) - 1;
	swap($list, rand($lowerLimit, $upperLimit), $upperLimit); // pivot goes to the last position
	$dividerPosition = $lowerLimit;

	for($i = $lowerLimit; $i < $upperLimit; $i++) {
		if ($list[$i] < $list[$upperLimit]) {
			swap($list, $i, $dividerPosition);
			$dividerPosition++;
		} 
	}
	swap($list, $dividerPosition, $upperLimit);
	if ($dividerPosition > $k) {
		return kth_smallest_element($list, $k, $lowerLimit, $dividerPosition);
	} elseif ($dividerPosition < $k) {
		return kth_smallest_element($list, $k, $dividerPosition+1, $upperLimit);
	}
	return $list[$dividerPosition];

}

function swap(&$array, $i, $j) {
	$tmp = $array[$i];
	$array[$i] = $array[$j];
	$array[$j] = $tmp;
}

