<?php


class Engine
{
    private $engineSpeed;
    private $enginePower;

    /**
     * Engine constructor.
     * @param $engineSpeed
     * @param $enginePower
     */
    public function __construct($engineSpeed, $enginePower)
    {
        $this->engineSpeed = $engineSpeed;
        $this->enginePower = $enginePower;
    }

    /**
     * @return mixed
     */
    public function getEnginePower()
    {
        return $this->enginePower;
    }

}