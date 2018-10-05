<?php


class Pokemon {
    private $name;
    private $element;
    private $health;

    /**
     * Pokemon constructor.
     * @param $name
     * @param $element
     * @param $health
     */
    public function __construct($name, $element, $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param mixed $health
     */
    public function setHealth($health): void
    {
        $this->health = $health;
    }

}