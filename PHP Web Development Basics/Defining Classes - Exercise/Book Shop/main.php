<?php
spl_autoload_register();

$author = readline();
$title = readline();
$price = floatval(readline());
$type = readline();

$book = null;
try {
    if ($type == "STANDARD") {
        $book = new Book($title, $author, $price);
    } elseif ($type == "GOLD") {
        $book = new GoldenEditionBook($title, $author, $price);
    } else {
        throw new Exception("Type is not valid!");
    }
    echo $book;
} catch (Exception $ex) {
    echo $ex->getMessage();
}