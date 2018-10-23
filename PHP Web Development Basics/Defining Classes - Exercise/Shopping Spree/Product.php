<?php

class Product
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $cost;

    /**
     * Product constructor.
     * @param string $productName
     * @param float $cost
     * @throws Exception
     */
    public function __construct(string $productName, float $cost)
    {
        $this->setName($productName);
        $this->setCost($cost);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws Exception
     */
    public function setName(string $name): void
    {
        if (empty($name)) {
            throw new Exception("Product name cannot be empty");
        }
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * @param float $cost
     * @throws Exception
     */
    public function setCost(float $cost): void
    {
        if ($cost <= 0) {
            throw new Exception("Product price cannot be negative");
        }
        $this->cost = $cost;
    }

}