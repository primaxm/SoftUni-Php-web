<?php
$string = readline();
//$input = str_split($string);
$lenght = strlen($string);

$arr = [];

for ($i = 0; $i < $lenght; $i++) {
    if (array_key_exists($string[$i],$arr)) {
        $arr[$string[$i]] += 1;
    } else {
        $arr[$string[$i]] = 1;
    }
}

foreach ($arr as $key => $value) {
    echo $key . " -> $value\n";
}

/*foreach (count_chars($string, 1) as $key => $value) {
    echo chr($key) . " -> $value \n";
}*/