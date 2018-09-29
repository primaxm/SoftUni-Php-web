<?php
$input = readline();
$phonebook = [];

while ($input !== 'Over') {
    $splited = explode(" : ", $input);
    $matchName = preg_match("/[\d]+/",  $splited[0]);
    $matchNumber = preg_match("/[\d]+/",  $splited[1]);
    $name = $splited[0];
    $number = $splited[1];
    if ($matchName === 1 && $matchNumber === 0) {
        $name = $splited[1];
        $number = $splited[0];
    }
    $phonebook[$name] = $number;

    $input = readline();
}

ksort($phonebook);
foreach ($phonebook as $key => $value) {
    echo $key . " -> " . $value . PHP_EOL;
}