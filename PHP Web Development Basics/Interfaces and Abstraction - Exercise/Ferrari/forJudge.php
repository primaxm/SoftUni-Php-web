<?php

interface Car {
    public function useBrakes();
    public function gasPedal();
}

class Ferrari implements Car {
    /**
     * @var string
     */
    private $model = "488-Spider";

    /**
     * @var string
     */
    private $name;

    /**
     * Ferrari constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }


    public function useBrakes() {
        return "Brakes!";
    }

    public function gasPedal() {
        return "Zadu6avam sA!";
    }

    public function __toString()
    {
        return $this->model . "/" . $this->useBrakes() . "/" . $this->gasPedal() . "/" . $this->name;
    }
}

$name = readline();

$ferrari = new Ferrari($name);
echo $ferrari;