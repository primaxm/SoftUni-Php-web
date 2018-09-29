<?php
$n = intval(readline());
$k = intval(readline());
$output{0} = 1;

for ($i = 1; $i < $n; $i++) {
   $sumFrom = $i - $k;
   $sumOfElements = 0;
   if ($i - $k <= 0) {
       $sumFrom = 0;
       for ($b = $sumFrom; $b < count($output); $b++) {
           $sumOfElements += $output{$b};
       }
   } else {
       for ($b = 0; $b < $k; $b++) {
           $sumOfElements += $output{$sumFrom};
           $sumFrom++;
       }
   }
    $output{$i} = $sumOfElements;
}

echo implode(" ", $output);