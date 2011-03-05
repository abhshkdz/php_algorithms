<?php

/**
 * Prints a Binary Tree level by level (BFS).
 *
 * E.g.: for a tree like:
 *       5
 *    3      8
 * 2    4  7   9
 *
 * print:
 * 5
 * 38
 * 2479
 *
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */

/**
 * Class that represents a node of the tree
 */
class Node {
	public $value;
	public $left;
	public $right;
	public $level;
	public function __construct($n) {
		$this->value = $n;
	}
}

/**
 * Use BFS to traverse the tree printing every level with an end-of-line after each one
 */
function printByLevel(Node $n) {
	$queue = new SPLQueue();
	$queue->enqueue($n);
	$currentLevel = 0;
	$n->level = $currentLevel;
	$root = $n;

	while (!$queue->isEmpty()) {
		$item = $queue->dequeue();

		if ($item->level != $currentLevel) {
			echo "\n";
			$currentLevel = $item->level;
		}

		echo $item->value;

		$childLevel = $currentLevel + 1;
		if ($item->left) {
			$item->left->level = $childLevel;
			$queue->enqueue($item->left);
		}
		if ($item->right) {
			$item->right->level = $childLevel;
			$queue->enqueue($item->right);
		}
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

printByLevel($root);
