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
	
	public function insert($element) {
		$this->elements[++$this->n] = $element;
		for ($i = $this->n; $i > 1 && $this->elements[$i >> 1] < $this->elements[$i]; $i = $i >> 1)
			$this->swap($i >> 1,$i);
	}
	
	public function extract() {
		$element = $this->elements[1];
		$this->elements[1] = array_pop($this->elements);
		$this->n--;
		$this->heapify();
		return $element;
	}

	private function heapify() {
		for ($i = 1; ($c = $i * 2) <= $this->n; $i = $c) {
			if ($c+1 <= $this->n && $this->elements[$c+1] > $this->elements[$c])
				$c++;
			if ($this->elements[$i] > $this->elements[$c])
				break;
			$this->swap($c, $i);
		}
	}

	private function swap($x,$y) {
		$tmp = $this->elements[$x];
		$this->elements[$x] = $this->elements[$y];
		$this->elements[$y] = $tmp;
	}

}
