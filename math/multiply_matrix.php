<?php

/**
 * Multiplies two matrixes A and B
 *
 * @author Felipe Ribeiro <felipernb@gmail.com>
 */
function multiply_matrix($a, $b) {
    $linesA = count($a);
    $colsA = count($a[0]);
    $linesB = count($b);
    $colsB = count($b[0]);
    $c = array();
    for($i = 0; $i < $linesA; $i++) {
        for ($j = 0; $j < $colsB; $j++) {
            $c[$i][$j] = 0;
            for ($k = 0; $k < $colsA; $k++) {
                $c[$i][$j] += $a[$i][$k] * $b[$k][$j];
            }
        }
    }
    return $c;
}

