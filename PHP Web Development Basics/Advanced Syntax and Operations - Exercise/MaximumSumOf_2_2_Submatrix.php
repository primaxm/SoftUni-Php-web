<?php
list($rows, $cols) = array_map("intval", explode(" ", readline()));
$matrix = [];
$maxSum = 0;
$startIndexRows = 0;
$startIndexCols = 0;

for ($i = 0; $i < $rows; $i++) {
    $matrix[$i] = explode(", ", readline());
}

for ($i = 0; $i < $rows - 1; $i++) {
    for ($a = 0; $a < $cols - 1; $a++) {
        $sum = $matrix[$i][$a] + $matrix[$i+1][$a] + $matrix[$i][$a+1] + $matrix[$i+1][$a+1];
        if ($sum > $maxSum) {
            $maxSum = $sum;
            $startIndexRows = $i;
            $startIndexCols = $a;
        }
    }
}

echo $matrix[$startIndexRows][$startIndexCols] . " " . $matrix[$startIndexRows][$startIndexCols + 1] . PHP_EOL;
echo $matrix[$startIndexRows+1][$startIndexCols] . " " . $matrix[$startIndexRows+1][$startIndexCols + 1] . PHP_EOL;
echo $maxSum;