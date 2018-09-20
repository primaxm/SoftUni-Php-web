<?php
$numOfCustomers = (int)readline();
$package = readline();
$result = 0;
$packageDiscount = 0;
$packagePrice = 0;

switch ($package) {
        case "Gold":
            $packageDiscount = 10;
            $packagePrice = 750;
        break;
        case "Platinum":
            $packageDiscount = 15;
            $packagePrice = 1000;
        break;
    default:
        $packageDiscount = 5;
        $packagePrice = 500;
        break;
}

if ($numOfCustomers <= 50) {
    $result = ((2500 + $packagePrice) - (2500 + $packagePrice) * $packageDiscount / 100) / $numOfCustomers;
    echo "We can offer you the Small Hall";
    echo "\nThe price per person is " . sprintf("%.2f",$result) . "$";
} else if ($numOfCustomers > 50 && $numOfCustomers <= 100) {
    $result = ((5000 + $packagePrice) - (5000 + $packagePrice) * $packageDiscount / 100) / $numOfCustomers;
    echo "We can offer you the Terrace";
    echo "\nThe price per person is " . sprintf("%.2f",$result) . "$";
} else if ($numOfCustomers > 100 && $numOfCustomers <= 120) {
    $result = ((7500 + $packagePrice) - (7500 + $packagePrice) * $packageDiscount / 100) / $numOfCustomers;
    echo "We can offer you the Great Hall";
    echo "\nThe price per person is " . sprintf("%.2f",$result) . "$";
} else {
    echo "We do not have an appropriate hall.";
}


