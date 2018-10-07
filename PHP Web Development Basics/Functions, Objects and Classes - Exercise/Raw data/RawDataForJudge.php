<?php
$number = intval(readline());

$cars = [];

for ($i = 0; $i < $number; $i++) {
    $in = explode(" ", readline());
    $model = $in[0];
    $engineSpeed = intval($in[1]);
    $enginePower = $in[2];
    $cargoWeight = intval($in[3]);
    $cargoType = $in[4];
    $tire1Pressure = floatval($in[5]);
    $tire1Age = intval($in[6]);
    $tire2Pressure = floatval($in[7]);
    $tire2Age = intval($in[8]);
    $tire3Pressure = floatval($in[9]);
    $tire3Age = intval($in[10]);
    $tire4Pressure = floatval($in[11]);
    $tire4Age = intval($in[12]);

    $engine = new Engine($engineSpeed, $enginePower);
    $cargo = new Cargo($cargoWeight, $cargoType);
    $tires = new Tire($tire1Pressure, $tire1Age, $tire2Pressure, $tire2Age,
        $tire3Pressure, $tire3Age, $tire4Pressure, $tire4Age);
    $car = new Car($model, $engine, $cargo, $tires);
    $cars[$model] = $car;
}

$commnad = readline();

if ($commnad === "fragile") {
    fragile($cars);
} elseif ($commnad === "flamable") {
    flamable($cars);
}

function fragile($cars) {
    // all cars whose Cargo Type is “fragile” with a tire whose pressure is  < 1
    foreach ($cars as $carType => $CarObj) {
        if ($CarObj->getCargo()->getCargoType() === "fragile" && ($CarObj->getTires()->getTire1Pressure() < 1 ||
                $CarObj->getTires()->getTire2Pressure() < 1 || $CarObj->getTires()->getTire3Pressure() < 1 ||
                $CarObj->getTires()->getTire4Pressure() < 1)) {
            echo $carType . PHP_EOL;
        }
    }
}

function flamable($cars) {
    //print all cars whose Cargo Type is “flamable” and have Engine Power > 250
    foreach ($cars as $carType => $CarObj) {
        if ($CarObj->getCargo()->getCargoType() === "flamable" && $CarObj->getEngine()->getEnginePower() > 250) {
            echo $carType . PHP_EOL;
        }
    }
}


class Car
{
    private $model;
    private $engine;
    private $cargo;
    private $tires;

    /**
     * Car constructor.
     * @param $model
     * @param $engine
     * @param $cargo
     * @param $tires
     */
    public function __construct(string $model,Engine $engine,Cargo $cargo,Tire $tires)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->cargo = $cargo;
        $this->tires = $tires;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return Engine
     */
    public function getEngine(): Engine
    {
        return $this->engine;
    }

    /**
     * @return Cargo
     */
    public function getCargo(): Cargo
    {
        return $this->cargo;
    }

    /**
     * @return Tire
     */
    public function getTires(): Tire
    {
        return $this->tires;
    }

}

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

class Cargo
{
    private $cargoWeight;
    private $cargoType;

    /**
     * Cargo constructor.
     * @param $cargoWeight
     * @param $cargoType
     */
    public function __construct($cargoWeight, $cargoType)
    {
        $this->cargoWeight = $cargoWeight;
        $this->cargoType = $cargoType;
    }

    /**
     * @return mixed
     */
    public function getCargoType()
    {
        return $this->cargoType;
    }

}

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