<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 11.11.2018 г.
 * Time: 11:13 ч.
 */

namespace App\Service;


use App\Data\BookDTO;
use App\Repository\BookRepositoryInterface;

class BookService implements BookServiceInterface
{
    /**
     * @var BookRepositoryInterface
     */
    private $bookRepository;

    /**
     * BookService constructor.
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }


    public function addBook(BookDTO $bookDTO)
    {
        $this->bookRepository->insertBook($bookDTO);
    }

    public function editBook(BookDTO $bookDTO, $bookid)
    {
        return $this->bookRepository->editBook($bookDTO, $bookid);
    }

    public function selectBook($id): BookDTO
    {
        return $this->bookRepository->selectOneBook($id);
    }

    public function selectAllBook(): \Generator
    {
        return $this->bookRepository->selectAllBooks();
    }

    public function selectUsersBook($userId): \Generator
    {
        return $this->bookRepository->selectUsersBooks($userId);
    }

    public function deleteBook($bookId)
    {
        $this->bookRepository->deleteBook($bookId);
    }
}