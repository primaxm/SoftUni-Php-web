<?php
spl_autoload_register();
$humans = [];
$robots = [];
$nums = [];

while ($input = readline()) {
    if ($input == "End") break;
    $splited = explode(" ", $input);
    if (count($splited) == 3) {
        $humans[] = new Citizen($splited[0], $splited[1], $splited[2]);
        $nums[] = $splited[2];
    } else {
        $robots[] = new Robot(intval($splited[1]), $splited[0]);
        $nums[] = $splited[1];
    }
}

$n = intval(readline());
$regex = "/{$n}$/";
/*foreach ($humans as $human_obj) {
    if(preg_match($regex, $human_obj->getId())) {
        echo $human_obj->getId() . PHP_EOL;
    }
}

foreach ($robots as $robot_obj) {
    if(preg_match($regex, $robot_obj->getId())) {
        echo $robot_obj->getId() . PHP_EOL;
    }
}*/

foreach ($nums as $num) {
    if(preg_match($regex, $num)) {
        echo $num . PHP_EOL;
    }
}