<?php
$read = readline();
$input = [];
if (strlen($read) === 1) {
    $input[0] = $read;
} else {
    $input = array_map("intval", explode(" ", $read));
    $redused = [];
    $count = count($input);
    for ($a = 0; $a < $count-1; $a++) {
        for ($b = 0; $b < count($input) - 1; $b++) {
            $redused[$b] = $input[$b] + $input[$b + 1];
        }
        $input = $redused;
        $redused = [];
    }
}

echo implode(" ", $input);

