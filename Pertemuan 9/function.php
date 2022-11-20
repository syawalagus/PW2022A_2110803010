<?php

function luas_dua_kubus($a, $b) {
    $luas_a = $a * $a * $a;
    $luas_b = $b * $b * $b;

    $Total = $luas_a + $luas_b;
    return $Total;
}

echo luas_dua_kubus(1,1);
?>