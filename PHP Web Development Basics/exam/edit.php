<?php

include "common.php";

$bookRepository = new App\Repository\BookRepository($db);
$bookService = new App\Service\BookService($bookRepository);

$userRepository = new App\Repository\UserRepository($db);
$userService = new App\Service\UserService($userRepository);

$genreRepository = new App\Repository\GenreRepository($db);
$genreService = new App\Service\GenreService($genreRepository);

$bookDTO = new App\Data\BookDTO();

$bookHttpHandler = new App\Http\BookHttpHandler($template, new \Core\DataBinder());
$bookHttpHandler->editBook($bookService, $userService, $genreService, $_POST, $bookDTO, $_GET['bookid']);