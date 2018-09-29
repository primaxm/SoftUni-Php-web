<?php
$input = readline();
$phonebook = [];

while ($input !== "END") {
    $splited = explode(" ", $input);
    if ($splited[0] === "A") {
        $phonebook[$splited[1]] = $splited[2];
    } elseif ($splited[0] === "S") {
        if (array_key_exists($splited[1], $phonebook)) {
            echo $splited[1] . " -> " . $phonebook[$splited[1]] . PHP_EOL;
        } else {
            echo "Contact $splited[1] does not exist." . PHP_EOL;
        }
    } elseif ($splited[0] === "ListAll") {
        ksort($phonebook);
        foreach ($phonebook as $key => $value) {
            echo $key . " -> " . $value . PHP_EOL;
        }
    }
    $input = readline();
}