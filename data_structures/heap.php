<?php
/** 
 * Implementation of the Heap data structure
 *
 * (PHP offers it natively as SPLMaxHeap/SPLMinHeap)
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */

abstract class Heap {
	protected $elements = array();
	protected $n = 0;
	
	/**
	 * Inserts a value to the heap, keeping the heap property
	 * 
	 * @author Felipe Ribeiro <felipernb@gmail.com>
	 */
	public abstract function insert($element);

	/**
	 * @author Felipe Ribeiro <felipernb@gmail.com>
	 */
	public function isEmpty() {
		return $this->n==0;
	}

	/**
	 * Extract the top value of the heap
	 *
	 * @author Felipe Ribeiro <felipernb@gmail.com>
	 */
	public function extract() {
		$element = $this->elements[1];
		$this->elements[1] = array_pop($this->elements);
		$this->n--;
		$this->siftDown();
		return $element;
	}
	
	/**
	 * Rearranges the heap after an extraction to keep the heap property
	 *
	 * @author Felipe Ribeiro <felipernb@gmail.com>
	 */
	protected abstract function siftDown();

	/**
	 * Swap two elements on the elements array
	 *
	 * @author Felipe Ribeiro <felipernb@gmail.com>
	 */
	protected function swap($x,$y) {
		$tmp = $this->elements[$x];
		$this->elements[$x] = $this->elements[$y];
		$this->elements[$y] = $tmp;
	}
}

class MaxHeap extends Heap {
	
	/**
	 * @see Heap::insert
	 */
	public function insert($element) {
		$this->elements[++$this->n] = $element;
		for ($i = $this->n; $i > 1 && $this->elements[$i >> 1] < $this->elements[$i]; $i = $i >> 1)
			$this->swap($i >> 1,$i);
	}

	/**
	 * @see Heap::siftDown
	 */
	protected function siftDown() {
		for ($i = 1; ($c = $i * 2) <= $this->n; $i = $c) {
			//Checks which of the bigger child to compare with the parent
			if ($c+1 <= $this->n && $this->elements[$c+1] > $this->elements[$c])
				$c++;
			if ($this->elements[$i] > $this->elements[$c])
				break;
			$this->swap($c, $i);
		}
	}

}


class MinHeap extends Heap {
	
	/**
	 * @see Heap::insert
	 */
	public function insert($element) {
		$this->elements[++$this->n] = $element;
		for ($i = $this->n; $i > 1 && $this->elements[$i >> 1] > $this->elements[$i]; $i = $i >> 1)
			$this->swap($i >> 1,$i);
	}

	/**
	 * @see Heap::siftDown
	 */
	protected function siftDown() {
		for ($i = 1; ($c = $i * 2) <= $this->n; $i = $c) {
			//Checks which of the smaller child to compare with the parent
			if ($c+1 <= $this->n && $this->elements[$c+1] < $this->elements[$c])
				$c++;
			if ($this->elements[$i] < $this->elements[$c])
				break;
			$this->swap($c, $i);
		}
	}

}


