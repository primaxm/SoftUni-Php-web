<?php
$string = readline();

echo isPalindrome($string) ? "true" : "false";

function isPalindrome($str) {
    for ($i = 0; $i < strlen($str) / 2; $i++)
        if ($str[$i] != $str[strlen($str) - $i - 1])
            return false;
    return true;
}



