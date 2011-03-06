<?php
/**
 * Searchs for an element in a sorted list in O(lg n)
 * and returns a boolean indicating whether it's present 
 * or not
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */


function binary_search($elements, $x, $l=0, $u=null) {
	if ($u === null) $u = count($elements)-1;
	if ($l > $u) return false;
	$median = ($l + $u) >> 1;
	
	if ($elements[$median] == $x) return true;
	if ($x > $elements[$median]) $l = $median + 1;
   	if ($x < $elements[$median]) $u = $median - 1;
	return binary_search($elements, $x, $l, $u);
}	
