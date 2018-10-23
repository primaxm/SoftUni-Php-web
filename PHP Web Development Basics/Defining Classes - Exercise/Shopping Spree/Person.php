<?php

class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $money;

    /**
     * @var array
     */
    private $bagOfProducts = [];

    /**
     * Person constructor.
     * @param string $name
     * @param float $money
     * @throws Exception
     */
    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
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
            throw new Exception("Name cannot be empty");
        }
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * @param float $money
     * @throws Exception
     */
    public function setMoney(float $money): void
    {
        if ($money < 0) {
            throw new Exception("Money cannot be negative");
        }
        $this->money = $money;
    }

    /**
     * @return array
     */
    public function getBagOfProducts(): array
    {
        return $this->bagOfProducts;
    }

    /**
     * @param Product
     * @throws Exception
     */
    public function setProductsInBag(Product $product): void
    {
        if($this->money < $product->getCost()) {
            throw new Exception($this->name . " can't afford " . $product->getName());
        }
        $this->bagOfProducts[] = $product;
        $this->money -= $product->getCost();

    }

}