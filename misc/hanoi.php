<?php

/**
 * Solution for the Towers of Hanoi problem
 * 
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */

function hanoi($disc, $source, $aux, $destiny) {
	if ($disc > 0) {
		hanoi($disc - 1, $source, $destiny, $aux);
		echo "Move disc $disc from $source to $destiny\n";
		hanoi($disc - 1, $aux, $source, $destiny);
	}
}

hanoi(4, 'A', 'B', 'C');
