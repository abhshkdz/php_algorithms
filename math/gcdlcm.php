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
	function lcm($m,$n) 
	{ 
		return (($m/gcd($m,$n))*$n); 
	}
	$gcd = gcd($a,$b);
	$lcm = lcm($a,$b);
	echo "GCD($a,$b)=$gcd and LCM($a,$b)=$lcm";
?>