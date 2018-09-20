<?php
$currentDate = strtotime(readline());
$year = date('Y', $currentDate);

$newYear = mktime(0, 0, 0, 1, 1, $year+1);

echo "Hours until new year : " . floor(($newYear - $currentDate) / 3600)  . "\n";
echo "Minutes until new year : " . floor(($newYear - $currentDate) / 60) . "\n";
echo "Seconds until new year : " . ($newYear - $currentDate) . "\n";

$daysBetween = floor(($newYear - $currentDate)  / 86400);
$hoursBetween = floor((($newYear - $currentDate)  % 86400) / 3600);
$minuteBetween = floor(((($newYear - $currentDate)  % 86400) % 3600)  / 60);
$secondsBetween = floor(((($newYear - $currentDate)  % 86400) % 3600)  % 60);
echo "Days:Hours:Minutes:Seconds $daysBetween:$hoursBetween:$minuteBetween:$secondsBetween";