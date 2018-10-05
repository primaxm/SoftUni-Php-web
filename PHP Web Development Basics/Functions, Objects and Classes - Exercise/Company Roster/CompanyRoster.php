<?php
include "Employee.php";
$num = intval(readline());
$emplyoee = [];
$dep = [];

while ($num-- > 0) {
    $input = explode(" ", readline());
    $name = $input[0];
    $salary = floatval($input[1]);
    $position = $input[2];
    $department = $input[3];
    $email = "n/a";
    $age = -1;
    $emplyoee = null;

    if (count($input) === 5) {
        if (is_numeric($input[4])) {
            $age = $input[4];
        } else {
            $email = $input[4];
        }
    } elseif (count($input) === 6) {
        if (is_numeric($input[4])) {
            $age = $input[4];
            $email = $input[5];
        } else {
            $email = $input[4];
            $age = $input[5];
        }
    }

    $emplyoee = new Employee($name, $salary, $position, $department, $email, $age);

    $dep[$department][] = $emplyoee;
}

//print_r($dep);

uasort($dep, function ($dep1, $dep2) {
    $sumOne = 0;
    $countOne = 0;
    foreach ($dep1 as $emp1) {
        $sumOne += $emp1->getSalary();
        $countOne++;
    }

    $SumTwo = 0;
    $countTwo = 0;

    foreach ($dep2 as $emp2) {
        $SumTwo += $emp2->getSalary();
        $countTwo++;
    }

    return $SumTwo/$countTwo <=> $sumOne/$countOne;
});

foreach ($dep as $key => $val) {
    usort($dep[$key], function ($emp1, $emp2){
        return $emp2->getSalary() <=> $emp1->getSalary();
    });
    echo "Highest Average Salary: {$key}" . PHP_EOL;
    foreach ($dep[$key] as $em) {
        echo "{$em->getName()} {$em->getSalary()} {$em->getEmail()} {$em->getAge()}" . PHP_EOL;
    }
    break;
}

