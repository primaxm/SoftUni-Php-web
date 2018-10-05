<?php

class Person {
    private $personName;
    private $company;
    private $pokemons = [];
    private $parents = [];
    private $children = [];
    private $car;

    /**
     * @return mixed
     */
    public function getPersonName()
    {
        return $this->personName;
    }

    /**
     * @param mixed $personName
     */
    public function setPersonName($personName): void
    {
        $this->personName = $personName;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company): void
    {
        $this->company = $company;
    }

    /**
     * @return array
     */
    public function getPokemons(): array
    {
        return $this->pokemons;
    }


    public function setPokemon($pokemon, $key): void
    {
        $this->pokemons[$key] = $pokemon;
    }

    /**
     * @return array
     */
    public function getParents(): array
    {
        return $this->parents;
    }

    public function setParents($parent, $key): void
    {
        $this->parents[$key] = $parent;
    }

    /**
     * @return array
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    public function setChildren($children, $key): void
    {
        $this->children[$key] = $children;
    }

    /**
     * @return mixed
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * @param mixed $car
     */
    public function setCar($car): void
    {
        $this->car = $car;
    }

}