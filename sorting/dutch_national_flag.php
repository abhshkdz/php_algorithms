<?php
/**
 * The Dutch national flag problem is a famous computer science related programming
 * problem proposed by Edsger Dijkstra. The flag of the Netherlands consists of
 * three colors : Red, White and Blue. Given balls of these three colors arranged
 * randomly in a line (the actual number of balls does not matter), the task is
 * to arrange them such that all balls of same color are together and their
 * collective color groups are in the correct order in O(n) and just one pass.
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */

//Defining strings as contants
define('RED', 'RED');
define('WHITE', 'WHITE');
define('BLUE', 'BLUE');


function dutch_flag(array $colors) {
	$r = 0; //Index of the last red element (starts with no red element)
	$w = 0; // Index of the last white element (starts with no white element)
	$b = count($colors); // Index of the first blue element (starts with no blue element)

	/**
	 * In this loop we assume the following invariant:
	 *  __________________________________________
	 * |_______RED__|___WHITE___|__UNKNOWN_|_BLUE_|
	 *              ^r          ^w         ^b
	 */
	while($w < $b) {
		switch($colors[$w]) {
			case RED:
				swap($colors, $w, $r++);
			case WHITE: //This is also executed on the case RED 
				$w++;
				break;
			case BLUE:
				swap($colors, $w, --$b);
				break;
		}
	}

	return $colors;
}

function swap(&$array, $i, $j) {
	$tmp = $array[$i];
	$array[$i] = $array[$j];
	$array[$j] = $tmp;
}

print_r(dutch_flag(array(RED, WHITE, WHITE, BLUE, RED, WHITE, RED, BLUE, BLUE, WHITE, RED, BLUE)));
