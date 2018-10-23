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
     * @throws Exception
     */
    public function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @param float $length
     * @throws Exception
     */
    public function setLength(float $length): void
    {
        if ($length <= 0 ) {
            throw new Exception("Length cannot be zero or negative.");
        }
        $this->length = $length;
    }

    /**
     * @param float $width
     * @throws Exception
     */
    public function setWidth(float $width): void
    {
        if ($width <= 0 ) {
            throw new Exception("Width cannot be zero or negative.");
        }
        $this->width = $width;
    }

    /**
     * @param float $height
     * @throws Exception
     */
    public function setHeight(float $height): void
    {
        if ($height <= 0 ) {
            throw new Exception("Height cannot be zero or negative.");
        }
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


