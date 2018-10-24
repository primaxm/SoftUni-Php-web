<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 24.10.2018 г.
 * Time: 22:08 ч.
 */

interface TouchScreen
{
    public function moveFinger();
    public function clickFinger();
    public function writeText();
}