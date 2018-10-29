<?php

spl_autoload_register();
/**
 * @var Birthdates[]
 */
$data = [];

while ($input = readline()) {
    if ($input == "End") break;
    $splited = explode(" ", $input);
    $splited[3] = $splited[3]??NULL;
    $splited[4] = $splited[4]??NULL;
    if ($splited[0] != "Robot") {
        $data[] = new $splited[0]($splited[1], $splited[2], $splited[3], $splited[4]);
    }
}

$n = readline();
$regex = "/$n$/";

$output = "";
foreach ($data as $obj) {
    if(preg_match($regex, $obj->getBirthdate())) {
        $output .= $obj->getBirthdate() . PHP_EOL;
    }
}

if ($output == "") {
    echo '<no output>';
} else {
    echo $output;
}