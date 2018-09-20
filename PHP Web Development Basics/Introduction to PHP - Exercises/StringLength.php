<?php
$string = readline();

$string = substr($string, 0, 20);

if (strlen($string) < 20) {
    $toFull = 20 - strlen($string);
    $string .= str_repeat("*",$toFull);

}
echo $string;
