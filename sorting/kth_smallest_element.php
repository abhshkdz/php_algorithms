<?php
class a {
	public static $c = 0;
}
/**
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
		a::$c++;
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

assert(kth_smallest_element(array(4,1,10,50,3), 1) == 3);
echo a::$c."\n";
a::$c=0;
assert(kth_smallest_element(array(4,1,10,50,3), 2) == 4);
echo a::$c."\n";
a::$c=0;
assert(kth_smallest_element(array(4,1,10,50,3), 0) == 1);
echo a::$c."\n";
a::$c=0;
assert(kth_smallest_element(array(4,1,10,50,3), 4) == 50);
echo a::$c."\n";
a::$c=0;
assert(kth_smallest_element(array(4,1,10,50,3), 3) == 10);
echo a::$c."\n";
