<?php

/**
 * Given a simple linked list, reverse it to make the tail the new head
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */


/**
 * Node of a simple linked list
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
class Node {
	public $value;
	public $next;

	public function __construct($value) {
		$this->value = $value;
	}
}


/**
 * Using a stack, O(n) in time and O(n) in space
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function reverse_linked_list0(Node $n) {
	$stack = new SPLStack();
	while($n != null) {
		$stack->push($n);
		$n = $n->next;
	}
	$head = $stack->pop();
	$n = $head;
	while(!$stack->isEmpty()) {
		$n->next = $stack->pop();
		$n = $n->next;
	}
	$n->next = null;
	return $head;
}

/** 
 * Using recursion, O(n) in time and O(n) in space due to the call stack
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function reverse_linked_list1(Node $n) {
	if (!$n->next) {
		return $n;
	}
	$next = $n->next;
	$newHead = reverse_linked_list1($next);
	$next->next = $n;
	$n->next = null;
	return $newHead;
}

/**
 * Using iteration, O(n) in time and O(1) in space
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function reverse_linked_list2(Node $n) {
	$next = $n->next;
	$n->next = null;
	while($next != null) {
		$tmp = $next->next;
		$next->next = $n;
		$n = $next;
		$next = $tmp;	
	}
	return $n; //new head
}

