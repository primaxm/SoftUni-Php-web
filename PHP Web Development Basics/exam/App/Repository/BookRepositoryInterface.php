<?php

namespace App\Repository;


use App\Data\BookDTO;

interface BookRepositoryInterface
{
    public function insertBook(BookDTO $bookDTO);
    public function editBook(BookDTO $bookDTO, $bookid);
    public function selectAllBooks(): \Generator;
    public function selectUsersBooks($id): \Generator;
    public function selectOneBook($bookId) : BookDTO;
    public function deleteBook($bookId);
}