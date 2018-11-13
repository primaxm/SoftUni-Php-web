<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 11.11.2018 г.
 * Time: 10:53 ч.
 */

namespace App\Repository;


use App\Data\GenreDTO;
use Database\DatabaseInterface;

class GenreRepository implements GenreRepositoryInterface
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

    public function selectAll(): \Generator
    {
        return $this->db->query("
        SELECT genre_id AS genreId, name 
        FROM genres")
            ->execute([])
            ->fetch(GenreDTO::class);
    }

    public function selectById($id): GenreDTO
    {
        return $this->db->query("
        SELECT genre_id AS genreId, name 
        FROM genres 
        WHERE genre_id = ?
        ")->execute([
            $id
        ])->fetch(GenreDTO::class)
            ->current();
    }
}