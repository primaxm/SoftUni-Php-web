<?php
$word = readline();
$result = [];
$i = 0;

while ($word !== "end") {
    $result[$i] = $word . " = " . strrev($word);
    $i++;
    $word = readline();
}

foreach ($result as $item) {
    echo $item . "\n";

}