<?php
$input = str_split(strtolower(readline()));

for ($i = 0; $i < count($input); $i++) {
    echo "$input[$i] -> " . (ord($input[$i]) - 97) . PHP_EOL;
}

