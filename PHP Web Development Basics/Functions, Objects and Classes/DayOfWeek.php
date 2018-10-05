<?php
$day = readline();

echo returnDay($day);
function returnDay($day) {
    $days = ["Monday" => 1, "Tuesday" => 2, "Wednesday" => 3,
        "Thursday" => 4, "Friday" => 5, "Saturday" => 6, "Sunday" => 7];
    if (array_key_exists($day, $days)) {
        return $days[$day];
    } else {
        return "Invalid day!";
    }
}