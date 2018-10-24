<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 24.10.2018 г.
 * Time: 15:05 ч.
 */

class Rectangle implements Area
{
    /**
     * @var float
     */
    private $width;

    /**
     * @var float
     */
    private $height;

    /**
     * Rectangle constructor.
     * @param float $width
     * @param float $height
     */
    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }


    public function getSurface() {
        return $this->height * $this->width;
    }

    public function __toString()
    {
        return "Rectangle, width = {$this->width} mm, height = {$this->height} mm, area = {$this->getSurface()} mm";
    }
}