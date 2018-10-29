<?php

interface Call {
    public function call(string $number);
}

interface Browse {
    public function browse(string $url);
}

class Smartphone implements Call, Browse {
    /**
     * @param string $number
     * @return Call|string
     * @throws Exception
     */
    public function call(string $number): string
    {
        if (!preg_match("/^\d+$/", $number)) {
            throw new Exception("Invalid number!");
        }
        return "Calling... " . $number;
    }

    /**
     * @param string $url
     * @return Browse|string
     * @throws Exception
     */
    public function browse(string $url): string
    {
        if (!preg_match("/^\D+$/", $url)) {
            throw new Exception("Invalid URL!");
        }
        return "Browsing: " . $url;
    }
}

$numbers = explode(" ", readline());
$urls = explode(" ", readline());
$smartPhone = new Smartphone();
foreach ($numbers as $number) {
    try {
        echo $smartPhone->call($number) . PHP_EOL;
    } catch (Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;
    }
}

foreach ($urls as $url) {
    try {
        echo $smartPhone->browse($url) . "!". PHP_EOL;
    } catch (Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;
    }
}