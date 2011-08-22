<?php

/**
 * rot13
 * /rot ther'teen/ [Usenet: from "rotate alphabet 13 places"], v. The simple 
 * Caesar-cypher encryption that replaces each English letter with the one 13
 * places forward or back along the alphabet, so that "The butler did it!" 
 * becomes "Gur ohgyre qvq vg!" Most Usenet news reading and posting programs 
 * include a rot13 feature. It is used to enclose the text in a sealed wrapper
 * that the reader must choose to open - e.g. for posting things that might 
 * offend some readers, or spoilers. A major advantage of rot13 over rot(N) for
 * other N is that it is self-inverse, so the same code can be used for 
 * encoding and decoding. 
 *
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */

function rot13($str) {
	$a = ord('a');
	$A = ord('A');
	
	for ($i = 0, $len = strlen($str); $i < $len; $i++) {
		$asciiCode = ord($str[$i]);

		// Not a letter, keep what it is
		if ($asciiCode < $A || $asciiCode >= $a + 26) continue;

		// To check if should use the alphabet with upper or lower case letters
		$initialLetterOfAlphabet = $asciiCode < $a? $A : $a;
		$str[$i] = chr(($asciiCode - $initialLetterOfAlphabet + 13) % 26 + $initialLetterOfAlphabet);
	}

	return $str;
}

