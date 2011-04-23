<?php
/**
 * In computer science, a topological sort or topological ordering of a directed
 * graph is a linear ordering of its vertices such that, for every edge uv, u 
 * comes before v in the ordering. For instance, the vertices of the graph may
 * represent tasks to be performed, and the edges may represent constraints that
 * one task must be performed before another; in this application, a topological
 * ordering is just a valid sequence for the tasks. A topological ordering is
 * possible if and only if the graph has no directed cycles, that is, if it is
 * a directed acyclic graph (DAG). Any DAG has at least one topological ordering,
 * and algorithms are known for constructing a topological ordering of any DAG
 * in linear time
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
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
