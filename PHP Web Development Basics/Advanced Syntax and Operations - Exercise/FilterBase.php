<?php
$in = readline();

$position = [];
$salary = [];
$age = [];
while($in !== "filter base") {
    $data = explode(" -> ", $in);

    if(is_numeric($data[1])) {
        if (strpos($data[1], ".") > 0) {
            $salary[$data[0]] = $data[1];
        } else {
            $age[$data[0]] = $data[1];
        }
    } else {
        $position[$data[0]] = $data[1];
    }

    $in = readline();
}

$command = readline();
$ordered = $salary;
if ($command === "Position") $ordered = $position;
if ($command === "Age") $ordered = $age;
foreach ($ordered as  $key => $value) {
        if ($command === "Salary") $value = sprintf('%0.2f', $value);
        echo "Name: " . $key . PHP_EOL;
        echo $command . ": " . $value . PHP_EOL;
        echo "====================" . PHP_EOL;
}


