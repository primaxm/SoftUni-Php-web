<?php


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