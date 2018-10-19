<?php

class Bicycle extends Vehicle
{
    /**
     * @var bool
     */
    private $forSkirt;
    /**
     * @var bool
     */
    private $rides;

    /**
     * Bicycle constructor.
     * @param bool $forSkirt
     * @param bool $rides
     */
    public function __construct(string $color, bool $forSkirt, bool $rides)
    {
        parent::__construct(0, $color);
        $this->forSkirt = $forSkirt;
        $this->rides = $rides;
    }

    /**
     * @return bool
     */
    public function isForSkirt(): bool
    {
        return $this->forSkirt;
    }

    /**
     * @param bool $forSkirt
     */
    public function setForSkirt(bool $forSkirt): void
    {
        $this->forSkirt = $forSkirt;
    }

    public function ride() {
        $this->rides = true;
    }

    public function stop() {
        $this->rides = false;
    }

    public function setNumberDoors($doors = 0) :void {
        parent::setNumberDoors($doors);
    }

    public function __toString() {
        $allData = "<table><tr><td>$this->getNumberDoors()</td></tr>
                            <tr><td>$this->color()</td></tr>
                            <tr><td>$this->forSkirt()</td></tr>
                            <tr><td>$this->rides()</td></tr></table>";
        return $allData;
    }

}