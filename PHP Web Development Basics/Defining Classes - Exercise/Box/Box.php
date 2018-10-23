<?php


class Box
{
    /**
     * @var float
     */
    private $length;

    /**
     * @var float
     */
    private $width;

    /**
     * @var float
     */
    private $height;

    /**
     * Box constructor.
     * @param float $length
     * @param float $width
     * @param float $height
     */
    public function __construct(float $length, float $width, float $height)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }


    public function getSurfaceArea() {
        $surfaceArea = 2*($this->length * $this->width + $this->length * $this->height + $this->width * $this->height);
        return "Surface Area - " . number_format($surfaceArea, 2, ".", "");
    }

    public function getLateralSurfaceArea() {
        $lateralSurfaceArea = 2*($this->length * $this->height + $this->width * $this->height);
        return "Lateral Surface Area - " . number_format($lateralSurfaceArea, 2, ".", "");
    }

    public function getVolume() {
        $volume = $this->length * $this->width * $this->height;
        return "Volume - " . number_format($volume, 2, ".", "");
    }

    public function __toString()
    {
        return $this->getSurfaceArea() . PHP_EOL . $this->$this->getLateralSurfaceArea() . PHP_EOL . $this->getVolume();
    }
}


