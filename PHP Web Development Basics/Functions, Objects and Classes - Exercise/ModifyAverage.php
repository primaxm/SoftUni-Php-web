<?php
$splited = array_map("intval", str_split(readline()));

while(true) {
    $average = average($splited);
    if ($average > 5) {
        echo implode("", $splited);
        break;
    } else {
        array_push($splited, 9);
    }
}

function average($splited) {
    return array_sum($splited) / count($splited);
}