<?php

namespace App\Data;


use Exception;

class BookDTO
{
    private $bookId;
    private $title;
    private $author;
    private $description;
    private $image;

    private $userId;

    private $genreId;

    /**
     * @var UserDTO
     */
    private $user;

    /**
     * @var GenreDTO
     */
    private $genre;

    private $addedOn;

    private $genreList = [];

    private $error;

    private $data = [];

    private $username;

    private $genreName;


    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param mixed $bookId
     */
    public function setBookId($bookId): void
    {
        $this->bookId = $bookId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @throws Exception
     */
    public function setTitle($title): void
    {
        if (strlen($title) < 3 || strlen($title) > 50) {
            throw new Exception("Title must be between 3 and 255 characters!");
        }
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @throws Exception
     */
    public function setAuthor($author): void
    {
        if (strlen($author) < 3 || strlen($author) > 50) {
            throw new Exception("Author must be between 3 and 255 characters!");
        }
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @throws Exception
     */
    public function setDescription($description): void
    {
        if (strlen($description) < 10 || strlen($description) > 1000) {
            throw new Exception("Description must be between 10 and 1000 characters!");
        }
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @throws Exception
     */
    public function setImage($image): void
    {
        if (strlen($image) < 3 || strlen($image) > 255) {
            throw new Exception("Image must be between 3 and 255 characters!");
        }
        $this->image = $image;
    }

    /**
     * @return UserDTO
     */
    public function getUser(): UserDTO
    {
        return $this->user;
    }

    /**
     * @param UserDTO $user
     * @throws Exception
     */
    public function setUser(UserDTO $user): void
    {
        if (strlen($user->getUserId()) < 1 || strlen($user->getUserId()) > 4294967295) {
            throw new Exception("UserId must be between 1 and 4294967295 characters!");
        }

        $this->user = $user;
    }

    /**
     * @return GenreDTO
     */
    public function getGenre(): GenreDTO
    {
        return $this->genre;
    }

    /**
     * @param GenreDTO $genre
     * @throws Exception
     */
    public function setGenre(GenreDTO $genre): void
    {
        if (strlen($genre->getGenreId()) < 1 || strlen($genre->getGenreId()) > 4294967295) {
            throw new Exception("GenreId must be between 1 and 4294967295 characters!");
        }
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getAddedOn()
    {
        return $this->addedOn;
    }

    /**
     * @param mixed $addedOn
     */
    public function setAddedOn($addedOn): void
    {
        $this->addedOn = $addedOn;
    }

    /**
     * @return array
     */
    public function getGenreList(): array
    {
        return $this->genreList;
    }

    /**
     * @param GenreDTO
     */
    public function setGenreList($genreDTO): void
    {
        $this->genreList[] = $genreDTO;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     */
    public function setError($error): void
    {
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getData($key): ?string
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
        return null;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getGenreId()
    {
        return $this->genreId;
    }

    /**
     * @param mixed $genreId
     */
    public function setGenreId($genreId): void
    {
        $this->genreId = $genreId;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getGenreName()
    {
        return $this->genreName;
    }

    /**
     * @param mixed $genreName
     */
    public function setGenreName($genreName): void
    {
        $this->genreName = $genreName;
    }



}