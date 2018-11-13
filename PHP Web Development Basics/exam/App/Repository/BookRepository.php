<?php

namespace App\Repository;


use App\Data\BookDTO;
use Database\DatabaseInterface;

class BookRepository implements BookRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insertBook(BookDTO $bookDTO)
    {
        $this->db->query("
        INSERT INTO books(title, author, description, image, genre_id, user_id) 
        VALUES (?, ?, ?, ?, ?, ?)
        ")->execute([
            $bookDTO->getTitle(),
            $bookDTO->getAuthor(),
            $bookDTO->getDescription(),
            $bookDTO->getImage(),
            $bookDTO->getGenre()->getGenreId(),
            $bookDTO->getUser()->getUserId()
        ]);

        return $this->db->lastInsertId();
    }

    public function editBook(BookDTO $bookDTO, $bookid)
    {

        $this->db->query("
        UPDATE books
        SET title = ?, author = ?, description = ?, image = ?, user_id = ?, genre_id = ?, added_on = ? 
        WHERE book_id = ?
        ")->execute([
            $bookDTO->getTitle(),
            $bookDTO->getAuthor(),
            $bookDTO->getDescription(),
            $bookDTO->getImage(),
            $bookDTO->getUser()->getUserId(),
            $bookDTO->getGenre()->getGenreId(),
            $bookDTO->getAddedOn(),
            $bookid
        ]);

        return true;
    }

    public function selectAllBooks(): \Generator
    {
        return $this->db->query("
        SELECT book_id AS bookId, title, author, description, image, b.user_id AS userId, b.genre_id AS genreId, added_on AS addedOn, g.name as genreName, u.username as username  
        FROM books as b
        INNER JOIN users u on b.user_id = u.user_id
        INNER JOIN genres g on b.genre_id = g.genre_id")
            ->execute([])
            ->fetch(BookDTO::class);
    }

    public function selectUsersBooks($userId): \Generator
    {
        return $this->db->query("
        SELECT book_id AS bookId, title, author, description, image, b.user_id AS userId, b.genre_id AS genreId, added_on AS addedOn, g.name as genreName, u.username as username  
        FROM books as b
        INNER JOIN users u on b.user_id = u.user_id
        INNER JOIN genres g on b.genre_id = g.genre_id
        WHERE b.user_id = ?")
            ->execute([$userId])
            ->fetch(BookDTO::class);
    }


    public function selectOneBook($bookId): BookDTO
    {
        return $this->db->query("
        SELECT book_id AS bookId, title, author, description, image, b.user_id AS userId, b.genre_id AS genreId, added_on AS addedOn, g.name as genreName, u.username as username  
        FROM books as b
        INNER JOIN users u on b.user_id = u.user_id
        INNER JOIN genres g on b.genre_id = g.genre_id
        WHERE book_id = ?")
            ->execute([$bookId])
            ->fetch(BookDTO::class)
            ->current();
    }

    public function deleteBook($bookId)
    {
        $this->db->query("
        DELETE FROM books
        WHERE book_id = ?")
            ->execute([$bookId]);

    }
}