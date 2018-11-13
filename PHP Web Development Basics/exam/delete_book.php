<?php
include "common.php";
$bookRepository = new App\Repository\BookRepository($db);
$bookService = new App\Service\BookService($bookRepository);


$bookHttpHandler = new App\Http\BookHttpHandler($template, new \Core\DataBinder());
$bookHttpHandler->deleteBook($bookService, $_GET['bookid']);