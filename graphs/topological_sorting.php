<?php
define('UNVISITED', 0);
define('VISITED', 1);

function topological_sorting(array $graph) {
	$status = array();
	$stack = new SPLStack();
	foreach($graph as $n => $neighbors) $status[$n] = UNVISITED;

	foreach($graph as $n => $neighbors) {
		visit($graph, $n, $status, $stack);
	}
	
	return $stack;
}

function visit(array &$graph, $n, array &$status, SPLStack $stack) {
	if($status[$n] == UNVISITED) {
		$status[$n] = VISITED;
		foreach ($graph[$n] as $neighbor) {
			visit($graph, $neighbor, $status, $stack);
		}
		$stack->push($n);
	}
}



$graph = array(
		"undershorts" => array("pants", "shoes"),
		"socks" => array("shoes"),
		"watch" => array(),
		"pants" => array("shoes","belt"),
		"belt" => array("jacket"),
		"shirt" => array("belt", "tie"),
		"shoes" => array(),
		"tie" => array("jacket"),
		"jacket" => array(),

	);
$stack = topological_sorting($graph);
while(!$stack->isEmpty()) echo($stack->pop(). "\n");


