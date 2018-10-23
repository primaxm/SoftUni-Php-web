<?php
//spl_autoload_register();

$personSplit = explode(";", readline());
$productsInput = explode(";", readline());
//$productsInput = preg_split( "/[=;]/", readline());

$products = [];
$persons = [];

for ($a = 0; $a < count($personSplit)-1; $a++) {
    list($name, $money) = explode("=", $personSplit[$a]);
    try {
        $person = new Person($name, floatval($money));
        $persons[$name] = $person;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
        exit;
    }
}


for ($a = 0; $a < count($productsInput)-1; $a++) {
    list($name, $cost) = explode("=", $productsInput[$a]);
    try {
        $product = new Product($name, floatval($cost));
        $products[$name] = $product;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}


$command = readline();

while ($command != "END") {
    $splited = explode(" ", $command);
    $name = trim($splited[0]);
    $prod = trim($splited[1]);
    if (array_key_exists($name, $persons) && array_key_exists($prod, $products)) {
       try {
            $persons[$name]->setProductsInBag($products[$prod]);
            echo  $name . " bought " . $prod . PHP_EOL;
        } catch (Exception $e) {
            echo $e->getMessage() . PHP_EOL;
        }
    }


    $command = readline();

}

foreach ($persons as $personName => $personObj) {
    echo $personName . " - ";
    if (count($personObj->getBagOfProducts()) > 0) {
        echo implode(",", array_map(function($obj){return $obj->getName();}, $personObj->getBagOfProducts())) . PHP_EOL;
    } else {
        echo "Nothing bought";
    }

}


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