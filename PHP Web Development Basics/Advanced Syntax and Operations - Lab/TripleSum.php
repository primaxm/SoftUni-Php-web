<?php
$input = readline();
$arr = explode(" ", $input);
$ok = false;

for ($a = 0; $a < count($arr)-1; $a++) {
    for ($b = $a+1; $b < count($arr); $b++) {
        if (in_array(intval($arr[$a]) + intval($arr[$b]), $arr)) {
            echo intval($arr[$a]) . " + " . intval($arr[$b]) . " == " . (intval($arr[$a]) + intval($arr[$b])) . "\n";
            $ok = true;
        }
    }
}
if ($ok === false) echo "No";