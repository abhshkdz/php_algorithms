<?php

/**
 * Class that represents a node of the tree
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
class Node {
	public $value;
	public $left;
	public $right;

	public function __construct($n) {
		$this->value = $n;
	}
}

/**
 * Given a node (root of a binary search tree), traverses it, in order, printing the first $max elements
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function printWithDFS(Node $n = null, $max, &$actual = 0) {
	if ($n == null) return;
	
	printWithDFS($n->left, $max, $actual);

	if ($actual++ < $max) {
		echo $n->value;
		printWithDFS($n->right, $max, $actual);
	}
}

/**
 * The code bellow creates the following tree:
 *      5
 *   3      8
 * 2   4  7   9
 */
$root = new Node(5);
$root->left = new Node(3);
$root->right = new Node(8);
$root->left->left = new Node(2);
$root->left->right = new Node(4);
$root->right->left = new Node(7);
$root->right->right = new Node(9);

$in = fopen('php://STDIN', 'r');
while( ($n = (int)fgets($in)))
	printWithDFS($root, $n); //Print the first $n elements
