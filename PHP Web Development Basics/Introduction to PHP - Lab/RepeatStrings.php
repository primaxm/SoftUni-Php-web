<?php
$input = readline();
$arr = explode(" ", $input);
$result = '';
foreach ($arr as $item) {
    $result .= str_repeat($item, strlen($item));
}

echo $result;