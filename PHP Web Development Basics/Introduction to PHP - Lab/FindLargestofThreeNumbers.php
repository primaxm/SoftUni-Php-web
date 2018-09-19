<?php
$numberOne = intval(fgets(STDIN));
$numberTwo = intval(fgets(STDIN));
$numberTree = intval(fgets(STDIN));

$largestFromOneAndTwho = max($numberOne, $numberTwo);
$largest = max($largestFromOneAndTwho, $numberTree);
echo $largest;