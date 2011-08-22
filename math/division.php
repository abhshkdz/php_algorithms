<?php
/*
 * Implementing integer division without division operator
 * @author Felipe Ribeiro <felipernb@gmail.com>
*/


/**
 * Division in O(n) (n = dividend)
 *
 */
function linearDivision($dividend, $divisor) {
	for($quocient = 0; $quocient*$divisor <= $dividend - $divisor; $quocient++);
	return $quocient;
}


/**
 * Division in O(lg n) (n = dividend) using recursion
 */
function division($dividend, $divisor) {

	if ($divisor == $dividend) {
		return 1;
	} else if ($dividend < $divisor) {
		return 0;
	}

	$quotient = 1;
	
	/* Double the quotient while divisor * quotient is less than or equal to half 
	 of the dividend */
	while ($divisor*$quotient <= $dividend >> 1) {
		$quotient = $quotient << 1;
	}

	/* Call division recursively for the difference to get the
	 exact quotient */
	$quotient = $quotient + division($dividend - $divisor*$quotient, $divisor);

	return $quotient;
}
