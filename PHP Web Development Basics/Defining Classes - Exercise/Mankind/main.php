<?php

list($studentFirstName, $studentLastName, $fNumber) = explode(" ", readline());
list($workerFirstName, $workerLastName, $salary, $workingHours) = explode(" ", readline());

try {
    $student = new Student($studentFirstName, $studentLastName, $fNumber);
    $worker = new Worker($workerFirstName, $workerLastName, floatval($salary), floatval($workingHours));

    echo $student . PHP_EOL;
    echo $worker;
} catch (Exception $ex) {
    echo $ex->getMessage();
}