<?php

class GoldenEditionBook extends Book
{
    /**
     * @return float
     */
    public function getPrice(): float
    {
        return parent::getPrice() * 1.3;
    }

    public function __toString()
    {
        return "OK" . PHP_EOL . $this->getPrice();
    }

}