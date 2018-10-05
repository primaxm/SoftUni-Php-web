<?php
include "Trainer.php";
include "Pokemon.php";
$in = readline();
$trainers = [];

while ($in !== "Tournament") {
    $input = explode(" ", $in);

    $trainername = $input[0];
    $pokemonName = $input[1];
    $pokemonElement = $input[2];
    $pokemonHealt = floatval($input[3]);

    $pokemon = new Pokemon($pokemonName, $pokemonElement, $pokemonHealt);

    if (array_key_exists($trainername, $trainers)) {
        $trainers[$trainername]->setPokemons($pokemon, $pokemonName);
    } else {
        $trainer = new Trainer($trainername, 0, $pokemon, $pokemonName);
        $trainers[$trainername] = $trainer;
    }

    $in = readline();
}

$command = readline();
while($command !== "End") {
    foreach ($trainers as $objKey => $trainerObj) {
        $match = false;
        foreach ($trainerObj->getPokemons() as $pokemon) {
            if ($pokemon->getElement() === $command) {
                $match = true;
                break;
            }
        }

        if ($match) {
            $trainerObj->setNumberOfBadges($trainerObj->getNumberOfBadges() + 1);
        } else {
            foreach ($trainerObj->getPokemons() as $key => $pokemon) {
                $newPokemonHealt = $pokemon->getHealth()-10;
                if ($newPokemonHealt > 0) {
                    $pokemon->setHealth($newPokemonHealt);
                } else {
                    $trainerObj->unSetPokemons($key);
                }
            }
        }
    }

    $command = readline();
}

uasort($trainers, function ($obj1, $obj2) {
    return $obj2->getNumberOfBadges() <=>  $obj1->getNumberOfBadges();
});

foreach ($trainers as $trainer) {
    $pokemonNumber = count($trainer->getPokemons());
    echo "{$trainer->getName()} {$trainer->getNumberOfBadges()} {$pokemonNumber}" . PHP_EOL;
}


