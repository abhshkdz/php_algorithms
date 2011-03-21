<?php
require '../data_structures/heap.php';

/**
 * Uses a MinHeap to sort an array
 * O(n lgn) in time and O(n) in space
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function heapsort(array &$a) {
	$heap = new MinHeap();
	foreach($a as $x) {
		$heap->insert($x);
	}

	$a = array();
	while(!$heap->isEmpty()) {
		$a[] = $heap->extract();
	}
}
