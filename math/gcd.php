<?php
	$a = 21;
	$b = 27;
	function gcd($m,$n)
	{
		if ($n==0)
		{
		 	return $m;
		}
		else
		{
		 	return (gcd($n,($m%$n)));
		}
	}
	$gcd = gcd($a,$b);
	echo "The GCD of $a and $b is: $gcd";
?>