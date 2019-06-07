<?php

function mny2($value){ 
    $value = sprintf("%0.1f", $value);
    $vl = explode(".", $value);
    $value = number_format($vl[0]);
    return $value;
    if($vl[1]!="0")$value.=".".$vl[1];
    return $value;
}
function thousand_format($n, $precision=1) {
    // the length of the n
    $len = strlen($n);
    // getting the rest of the numbers
    $rest = (int)substr($n,$precision+1,$len);
    // checking if the numbers is integer yes add + if not nothing
    $checkPlus = (is_int($rest) and !empty($rest))?"+":"";
    if ($n >= 0 && $n < 100000) {
        // 1 - 9999
        $n_format = number_format($n);
        return $n_format;
        $suffix = '';
    } else if ($n >= 100000 && $n < 1000000) {
        // 10k-999k
        $n_format = number_format($n / 1000,$precision);
        $suffix = 'K'.$checkPlus;
    } else if ($n >= 1000000 && $n < 1000000000) {
        // 1m-999m
        $n_format = number_format($n / 1000000,$precision);
        $suffix = 'M'.$checkPlus;
    } else if ($n >= 1000000000 && $n < 1000000000000) {
        // 1b-999b
        $n_format = number_format($n / 1000000000);
        $suffix = 'B'.$checkPlus;
    } else if ($n >= 1000000000000) {
        // 1t+
        $n_format = number_format($n / 1000000000000);
        $suffix = 'T'.$checkPlus;
    }
    return !empty($n_format . $suffix) ? mny2($n_format) . $suffix: 0;
}

function getMonthName($monthNumber)
{
    return date("F", mktime(0, 0, 0, $monthNumber, 1));
}