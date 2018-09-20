<?php
$month = date('m', strtotime(readline()));
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, 2018);

for ($i = 1; $i <= $daysInMonth; $i++) {
    if (date('N', strtotime(2018 . "-" . $month . "-" . $i)) == 7) {
        echo $i . "rd " . $month . ", 2018\n";
    }
}
