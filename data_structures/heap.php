<?php
/** 
 * Implementation of the (Max)Heap data structure
 *
 * (PHP offers it natively as SPLMaxHeap/SPLMinHeap)
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */

class Heap {
	private $elements = array();
	private $n = 0;
	
	/**
	 * Inserts a value to the heap, keeping the heap property
	 * 
	 * @author Felipe Ribeiro <felipernb@gmail.com>
	 */
	public function insert($element) {
		$this->elements[++$this->n] = $element;
		for ($i = $this->n; $i > 1 && $this->elements[$i >> 1] < $this->elements[$i]; $i = $i >> 1)
			$this->swap($i >> 1,$i);
	}

	/**
	 * Extract the maximum value of the heap
	 *
	 * @author Felipe Ribeiro <felipernb@gmail.com>
	 */
	public function extract() {
		$element = $this->elements[1];
		$this->elements[1] = array_pop($this->elements);
		$this->n--;
		$this->heapify();
		return $element;
	}

	/**
	 * Rearranges the heap after an extraction to keep the heap property
	 *
	 * @author Felipe Ribeiro <felipernb@gmail.com>
	 */
	private function heapify() {
		for ($i = 1; ($c = $i * 2) <= $this->n; $i = $c) {
			//Checks which of the bigger child to compare with the parent
			if ($c+1 <= $this->n && $this->elements[$c+1] > $this->elements[$c])
				$c++;
			if ($this->elements[$i] > $this->elements[$c])
				break;
			$this->swap($c, $i);
		}
	}

	/**
	 * Swap two elements on the elements array
	 *
	 * @author Felipe Ribeiro <felipernb@gmail.com>
	 */
	private function swap($x,$y) {
		$tmp = $this->elements[$x];
		$this->elements[$x] = $this->elements[$y];
		$this->elements[$y] = $tmp;
	}

}
