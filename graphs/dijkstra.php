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
	$nonOptimizedVertices->insert($initialVertex, $distance[$initialVertex]);
	
	while(!$nonOptimizedVertices->isEmpty()) {
		$u = $nonOptimizedVertices->extract();
		if ($distance[$u] == INFINITY) {
			return false; //All the other elements are inacessible
		}
		foreach($graph[$u] as $neighbor => $edgeWeight) {
			$newDistance = $distance[$u] + $edgeWeight;
			if ($newDistance < $distance[$neighbor]) {
				$distance[$neighbor] = $newDistance;
				$nonOptimizedVertices->insert($neighbor,$distance[$neighbor]); 
			}
		}

	}
	return $distance;
}

$graph = array( 
	's' => array('u'=>10, 'x'=>5),
	'u' => array('x'=>2, 'v'=>1),
	'x' => array('u'=>3, 'v'=>9, 'y'=>2),
	'v' => array('y'=>4),
	'y' => array('s'=>7, 'v'=>6),
);

var_dump(dijkstra($graph, 's'));
