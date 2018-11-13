<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 11.11.2018 г.
 * Time: 11:20 ч.
 */

namespace App\Service;


use App\Data\GenreDTO;
use App\Repository\GenreRepositoryInterface;

class GenreService implements GenreServiceInterface
{
    /**
     * @var GenreRepositoryInterface
     */
    private $genreRepository;

    /**
     * GenreService constructor.
     * @param GenreRepositoryInterface $genreRepository
     */
    public function __construct(GenreRepositoryInterface $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }


    public function selectAll(): \Generator
    {
        return $this->genreRepository->selectAll();
    }

    public function selectById($id): GenreDTO
    {
        return $this->genreRepository->selectById($id);
    }
}