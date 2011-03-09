<?php
/**
 * Creates a binary search tree (BST) inserting each element at a time
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */


/**
 * Simple Node with value, left and right child
 *
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
 * Finds the proper position for the value and insert the node
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
 function bst_insert(Node $treeRoot, $n) {
	if ($n < $treeRoot->value) {
		if ($treeRoot->left != null) {
			bst_insert($treeRoot->left, $n);
		} else {
			$treeRoot->left = new Node($n);
		}
	} else {
		if ($treeRoot->right != null) {
			bst_insert($treeRoot->right, $n);
		} else {
			$treeRoot->right = new Node($n);
		}
	}

}

/**
 * Creates the tree:
 *    
 *           5
 *      3          7
 *  1      4    6     8
 *    2
 */
$root = new Node(5);
bst_insert($root, 3);
bst_insert($root, 1);
bst_insert($root, 7);
bst_insert($root, 6);
bst_insert($root, 8);
bst_insert($root, 2);
bst_insert($root, 4);
