<?php
$input = explode(", ", readline());
$arr = [];

for ($i = 0; $i < count($input); $i+=2) {
    if (array_key_exists($input[$i],$arr)) {
        $arr[$input[$i]] += (float)$input[$i+1];
    } else {
        $arr[$input[$i]] = (float)$input[$i+1];
    }
}

foreach ($arr as $key => $value) {
    echo $key . " => $value\n";
}
