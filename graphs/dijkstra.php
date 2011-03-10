<?php
/**
 * Implementation of Dijkstra algorithm to calculate the smallest path in a graph 
 * to any vertex from a single source
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */

define('INFINITY', PHP_INT_MAX);

class MinPriorityQueue extends SPLPriorityQueue {
	public function compare($a, $b) {
		return parent::compare($b, $a); //inverse the order
	}
}

/**
 * Receives an array representing the graph and the initial vertex to calculate the smallest path
 *
 * @param array $graph an array where the keys are the vertices of the graph and the values are 
 * 						other arrays to represent the adjencies, with the other vertex as key and the weight as value
 * 						e.g.:  array( 'a' => array('b'=>0.7, 'c'=>'2'), 'b' => array('c'=> 0.5), 'c' => array('a'=> 0.2, 'b' => 1));
 * @param $initialVertex Origin of the path
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function dijkstra(array $graph, $initialVertex) {
	$distance = array();
	
	foreach (array_keys($graph) as $v) {
		$distance[$v]  = INFINITY; 
	}
	
	$distance[$initialVertex] = 0;
	
	$nonOptimizedVertices = new MinPriorityQueue();
	foreach(array_keys($graph) as $v) {
		$nonOptimizedVertices->insert($v, $distance[$v]);
	}

	while(!$nonOptimizedVertices->isEmpty()) {
		$u = $nonOptimizedVertices->extract();
		if ($distance[$u] == INFINITY) {
			return false; //All the other elements are inacessible
		}
		foreach($graph[$u] as $neighbor => $edgeWeight) {
			$newDistance = $distance[$u] + $edgeWeight;
			if ($newDistance < $distance[$neighbor]) {
				$distance[$neighbor] = $newDistance;
			}
		}

	}
	return $distance;
}

$graph = array( 
	'a' => array('b'=>0.7, 'c'=>2),
	'b' => array('c'=> 0.5),
	'c' => array('a'=> 0.2, 'b' => 1)
);

dijkstra($graph, 'a');
