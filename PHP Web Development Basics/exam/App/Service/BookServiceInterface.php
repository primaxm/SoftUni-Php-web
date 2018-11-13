<?php

namespace App\Service;


use App\Data\BookDTO;

interface BookServiceInterface
{
    public function addBook(BookDTO $bookDTO);
    public function editBook(BookDTO $bookDTO, $bookid);
    public function selectBook($id) : BookDTO;
    public function selectAllBook() : \Generator;
    public function selectUsersBook($userId) : \Generator;
    public function deleteBook($bookId);
}