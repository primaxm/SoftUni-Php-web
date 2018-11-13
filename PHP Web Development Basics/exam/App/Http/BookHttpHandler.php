<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 11.11.2018 г.
 * Time: 11:16 ч.
 */

namespace App\Http;


use App\Data\BookDTO;
use App\Service\BookServiceInterface;
use App\Service\GenreServiceInterface;
use App\Service\UserServiceInterface;

class BookHttpHandler extends HttpHandlerAbstract
{
    public function addBook(
        BookServiceInterface $bookService,
        UserServiceInterface $userService,
        GenreServiceInterface $genreService, array $formData, BookDTO $bookDTO) {
        if (isset($formData['add'])) {
            //insert book data
            try {
                $bookDTO = $this->dataBinder->binde($formData, BookDTO::class);
                $userDTO = $userService->profile($_SESSION['id']);
                $genreDTO = $genreService->selectById($formData['genre_id']);
                $bookDTO->setUser($userDTO);
                $bookDTO->setGenre($genreDTO);
                $bookService->addBook($bookDTO);
                $this->redirect("all_books.php");
            } catch (\Exception $e){
                $bookDTO->setError($e->getMessage());
                foreach ($genreService->selectAll() as $genreDTO) {
                    $bookDTO->setGenreList($genreDTO);
                }
                $bookDTO->setData($formData);
                $this->render("books/add_book", $bookDTO);
            }
        } else {
            foreach ($genreService->selectAll() as $genreDTO) {
                $bookDTO->setGenreList($genreDTO);
            }
            $bookDTO->setData($formData);
            $this->render("books/add_book", $bookDTO);
        }
    }


    public function selectAllBooks( BookServiceInterface $bookService) {
        $bookDTO = $bookService->selectAllBook();

        $this->render("books/all_books", $bookDTO);
    }

    public function selectUserBooks( BookServiceInterface $bookService) {
        $bookDTO = $bookService->selectUsersBook($_SESSION['id']);

        $this->render("books/my_books", $bookDTO);
    }

    public function deleteBook(BookServiceInterface $bookService, $bookId) {
        $bookService->deleteBook($bookId);

        $bookDTO = $bookService->selectUsersBook($_SESSION['id']);
        $this->render("books/my_books", $bookDTO);
    }

    public function viewBook(BookServiceInterface $bookService, $bookId) {
        if (isset($_SESSION['id'])) {
            $bookDTO = $bookService->selectBook($bookId);
            $this->render("books/view", $bookDTO);
        } else {
            $this->redirect("login.php");
        }

    }

    public function editBook(
        BookServiceInterface $bookService,
        UserServiceInterface $userService,
        GenreServiceInterface $genreService, array $formData, BookDTO $bookDTO, $bookid){

        if (isset($formData['edit'])) {
            //edit book data
            try {
                $bookDTO = $this->dataBinder->binde($formData, BookDTO::class);
                $userDTO = $userService->profile($_SESSION['id']);
                $genreDTO = $genreService->selectById($formData['genre_id']);
                $bookDTO->setUser($userDTO);
                $bookDTO->setGenre($genreDTO);
                $bookService->editBook($bookDTO, $bookid);
                $this->redirect("my_books.php");
            } catch (\Exception $e){
                $bookDTO = $bookService->selectBook($bookid);
                $bookDTO->setError($e->getMessage());
                foreach ($genreService->selectAll() as $genreDTO) {
                    $bookDTO->setGenreList($genreDTO);
                }
                $this->render("books/edit", $bookDTO);
            }
        } else {
            $bookDTO = $bookService->selectBook($bookid);
            foreach ($genreService->selectAll() as $genreDTO) {
                $bookDTO->setGenreList($genreDTO);
            }
            $this->render("books/edit", $bookDTO);
        }

    }
}