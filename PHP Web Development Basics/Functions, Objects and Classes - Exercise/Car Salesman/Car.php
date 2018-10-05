<?php

class Car {
    private $model;
    private $engine;
    private $weight;
    private $color;

    /**
     * Car constructor.
     * @param $model
     * @param $engine
     * @param $weight
     * @param $color
     */
    public function __construct($model, $engine, $weight, $color)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

}