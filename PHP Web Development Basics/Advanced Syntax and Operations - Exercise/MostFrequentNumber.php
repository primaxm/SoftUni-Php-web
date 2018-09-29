<?php
$arr = explode(" ", readline());
$result = [];

for ($i = 0; $i < count($arr); $i++) {
    if (array_key_exists($arr[$i],$result)) {
        $result[$arr[$i]] += 1;
    } else {
        $result[$arr[$i]] = 1;
    }
}
echo array_search(max($result), $result);
