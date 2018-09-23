<?php
$input = explode(", ", readline());
$result = [];

if($input[1] === "A") {
    $result = methodA($input[0]);
} else if ($input[1] === "B") {
    $result = methodB($input[0]);
}

function methodA ($lenght) {
    $result = [];
    for ($i = 0; $i < $lenght; $i++) {
        $row = [];
        $count = $i+1;
        for ($j = 0; $j < $lenght; $j++) {
            $row[$j] = $count;
            $count += $lenght;
        }
        $result[$i] = $row;
    }
    return $result;
}

function methodB ($lenght) {
    $result = [];
    for ($i = 0; $i < $lenght; $i++) {
        for ($j = 0; $j < $lenght; $j++) {
            if ($j % 2 === 0) {
                $result[$i][$j] = $j * $lenght + $i + 1;
            } else {
                $result[$i][$j] = ($j+1) * $lenght - $i;
            }
        }
    }
    return $result;
}

for ($i = 0; $i < $input[0]; $i++) {
    echo implode(" ", $result[$i]) . "\n";
}

/*  1 8 9  16
    2 7 10 15
    3 6 11 14
    4 5 12 13   */
