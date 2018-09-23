<?php
$input = explode(", ", readline());
$arr = [];

for ($i = 0; $i < count($input); $i++) {
    if (array_key_exists($input[$i],$arr)) {
        $arr[$input[$i]] += 1;
    } else {
            $arr[$input[$i]] = 1;
    }
}

foreach ($arr as $key => $value) {
    if ($value == 1) {
        echo $key . " ";
    }
}