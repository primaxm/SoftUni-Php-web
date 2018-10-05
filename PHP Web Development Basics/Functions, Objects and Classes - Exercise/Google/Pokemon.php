<?php

class Pokemon {
    private $pokemonName;
    private $pokemonType;

    /**
     * @return mixed
     */
    public function getPokemonName()
    {
        return $this->pokemonName;
    }

    /**
     * @param mixed $pokemonName
     */
    public function setPokemonName($pokemonName): void
    {
        $this->pokemonName = $pokemonName;
    }

    /**
     * @return mixed
     */
    public function getPokemonType()
    {
        return $this->pokemonType;
    }

    /**
     * @param mixed $pokemonType
     */
    public function setPokemonType($pokemonType): void
    {
        $this->pokemonType = $pokemonType;
    }


}