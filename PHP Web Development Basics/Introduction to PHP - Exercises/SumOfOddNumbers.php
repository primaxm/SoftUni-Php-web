<?php
$num = (int)readline();
$sum = 0;
$count = 1;
for($i = 1; $i <= $num; $i++) {
    echo $count . "\n";
    $sum+=$count;
    $count+=2;
}
echo "Sum: $sum";