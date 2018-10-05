<?php
$input = readline();
$teams = [];

while($input !== "Result") {
    $splited = explode("|", $input);
    $splited[0] = preg_replace("/[^A-Za-z0-9 ]/", '', $splited[0]);
    $splited[1] = preg_replace("/[^A-Za-z0-9 ]/", '', $splited[1]);

    $teamName = '';
    $playerName = '';
    if (preg_match("/[A-Z][A-Z]+/",  $splited[0])) {
        $teamName = $splited[0];
        $playerName = $splited[1];
    } else {
        $teamName = $splited[1];
        $playerName = $splited[0];
    }

    $teams[$teamName][$playerName] = $splited[2];
    $input = readline();
}


foreach ($teams as $key => $players) {
    uasort($players, function ($a1, $a2) {return $a2 - $a1;});
    $teams[$key] = $players;
}

uasort($teams, function ($arr1, $arr2) {
    return array_reduce($arr2, function ($e1, $e2) {return $e1 + $e2;}) <=> array_reduce($arr1, function ($e1, $e2) {return $e1 + $e2;});
});

//print_r($teams);
foreach ($teams as $teamName => $teamPlayersArray) {
    echo $teamName . " => " . array_reduce($teamPlayersArray, function ($e1, $e2) {return $e1 + $e2;}) . PHP_EOL;
    foreach ($teamPlayersArray as $playerName => $playerPoints) {
        echo "Most points scored by {$playerName}" . PHP_EOL;
        break;
    }
}
