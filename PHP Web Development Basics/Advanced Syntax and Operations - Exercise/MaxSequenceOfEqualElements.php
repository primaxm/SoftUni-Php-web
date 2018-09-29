<?php
$input = array_map("intval", explode(" ", readline()));

$mainIndex = 0;
$mainCount = 0;
$currentIndex = 0;
$currentCount = 0;

for ($i = 1; $i < count($input); $i++) {
    if ($input[$i] === $input[$i-1]) {
        $currentCount++;
        if ($currentCount > $mainCount) {
            $mainCount = $currentCount;
            $mainIndex = $currentIndex;
        }
    } else {
        $currentCount = 0;
        $currentIndex = $i;
    }
}

for ($i = $mainIndex; $i <= $mainIndex + $mainCount; $i++) {
    echo $input[$i] . " ";
}