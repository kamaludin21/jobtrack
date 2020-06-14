<?php

function CountUMR($gaji, $umr)
{
    if($gaji > $umr) {
        $result = 'Lebih besar';
    } elseif($gaji < $umr) {
        $result = 'Lebih kecil';
    } elseif ($gaji == $umr) {
        $result = 'Setara';
    }
    return $result;
}