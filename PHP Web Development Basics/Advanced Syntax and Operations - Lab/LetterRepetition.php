<?php
$string = readline();
$input = str_split($string);

$arr = [];

for ($i = 0; $i < count($input); $i++) {
    if (array_key_exists(ord($input[$i]),$arr)) {
        $arr[ord($input[$i])] += 1;
    } else {
        $arr[ord($input[$i])] = 1;
    }
}

foreach ($arr as $key => $value) {
    echo chr($key) . " -> $value\n";
}

/*foreach (count_chars($string, 1) as $key => $value) {
    echo chr($key) . " -> $value \n";
}*/