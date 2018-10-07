<?php

class Tire
{
    private $tire1Pressure;
    private $tire1Age;
    private $tire2Pressure;
    private $tire2Age;
    private $tire3Pressure;
    private $tire3Age;
    private $tire4Pressure;
    private $tire4Age;

    /**
     * Tire constructor.
     * @param $tire1Pressure
     * @param $tire1Age
     * @param $tire2Pressure
     * @param $tire2Age
     * @param $tire3Pressure
     * @param $tire3Age
     * @param $tire4Pressure
     * @param $tire4Age
     */
    public function __construct(
        $tire1Pressure,
        $tire1Age,
        $tire2Pressure,
        $tire2Age,
        $tire3Pressure,
        $tire3Age,
        $tire4Pressure,
        $tire4Age
    ) {
        $this->tire1Pressure = $tire1Pressure;
        $this->tire1Age = $tire1Age;
        $this->tire2Pressure = $tire2Pressure;
        $this->tire2Age = $tire2Age;
        $this->tire3Pressure = $tire3Pressure;
        $this->tire3Age = $tire3Age;
        $this->tire4Pressure = $tire4Pressure;
        $this->tire4Age = $tire4Age;
    }

    /**
     * @return mixed
     */
    public function getTire1Pressure()
    {
        return $this->tire1Pressure;
    }

    /**
     * @return mixed
     */
    public function getTire2Pressure()
    {
        return $this->tire2Pressure;
    }

    /**
     * @return mixed
     */
    public function getTire3Pressure()
    {
        return $this->tire3Pressure;
    }

    /**
     * @return mixed
     */
    public function getTire4Pressure()
    {
        return $this->tire4Pressure;
    }

}