<?php

class Trainer {
    private $name;
    private $numberOfBadges;
    private $pokemons = [];

    /**
     * Trainer constructor.
     * @param $name
     * @param $numberOfBadges
     * @param $pokemons
     */
    public function __construct($name, $numberOfBadges, $pokemons, $pokemonName)
    {
        $this->name = $name;
        $this->numberOfBadges = $numberOfBadges;
        $this->pokemons[$pokemonName] = $pokemons;
    }

    /**
     * @return array
     */
    public function getPokemons(): array
    {
        return $this->pokemons;
    }

    /**
     * @param mixed $pokemons
     */
    public function setPokemons($pokemons, $pokemonName): void
    {
        $this->pokemons[$pokemonName] = $pokemons;
    }

    public function unSetPokemons($pokemonName): void
    {
        unset($this->pokemons[$pokemonName]);
    }

    /**
     * @param mixed $numberOfBadges
     */
    public function setNumberOfBadges($numberOfBadges): void
    {
        $this->numberOfBadges = $numberOfBadges;
    }

    /**
     * @return mixed
     */
    public function getNumberOfBadges()
    {
        return $this->numberOfBadges;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}