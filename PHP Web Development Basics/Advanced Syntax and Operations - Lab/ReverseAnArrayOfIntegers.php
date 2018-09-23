<?php
$num = intval(readline());
$result = [];

for ($i = 0; $i < $num; $i++) {
    $result[$num-1-$i] = intval(readline());
}
ksort($result, SORT_REGULAR );
echo implode(" ", $result);