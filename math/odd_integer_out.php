<?php
/**
* Question: You're given an unsorted array of integers where every integer 
* appears exactly twice, except for one integer which appears only once. 
* Write the algorithm that finds that integer. 
* 
* @author Felipe Ribeiro <felipernb@gmail.com>
*/

function odd_integer_out(array $a) {
	$oddInteger = 0;
	foreach($a as $i) {
		$oddInteger ^= $i;
	}
	return $oddInteger;
}

