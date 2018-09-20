<?php
$string = readline();
$arr = explode(" ", readline());
$searchedPosition = 0;

for ($i = 0; $i < $arr[1]; $i++) {
    $searchedPosition = strpos($string, $arr[0], $searchedPosition+1);
}

if ($searchedPosition) {
    echo $searchedPosition;
} else {
    echo "Find the letter yourself!";
}
