<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9.11.2018 г.
 * Time: 16:03 ч.
 */

namespace App\Repository;


use App\Data\TaskDTO;
use Database\DatabaseInterface;

class TaskRepository implements TaskRepositoryInterface
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

    public function insertTask(TaskDTO $taskDTO): bool
    {
        $this->db->query("
        INSERT INTO tasks(title, description, location, user_id, category_id, started_on, due_date) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
        ")->execute([
            $taskDTO->getTitle(),
            $taskDTO->getDescription(),
            $taskDTO->getLocation(),
            $taskDTO->getUserId(),
            $taskDTO->getCategoryId(),
            $taskDTO->getStartedOn(),
            $taskDTO->getDueDate(),
        ]);

        return true;
    }

    /**
     * @return \Generator|TaskDTO[]
     */
    public function selectAllTasks(): \Generator
    {
        return $this->db->query("
        SELECT task_id AS taskId, title, description, location, t.user_id AS userId, t.category_id AS categoryId, started_on AS StartedOn, due_date AS dueDate, first_name as userName, name as category  
        FROM tasks as t
        INNER JOIN users u on t.user_id = u.user_id
        INNER JOIN categories c on t.category_id = c.category_id")
            ->execute([])
            ->fetch(TaskDTO::class);
    }

    public function editTask(TaskDTO $taskDTO, int $id): bool
    {
        $this->db->query("
        UPDATE tasks
        SET title = ?, description = ?, location = ?, user_id = ?, category_id = ?, started_on = ?, due_date = ? 
        WHERE task_id = ?
        ")->execute([
            $taskDTO->getTitle(),
            $taskDTO->getDescription(),
            $taskDTO->getLocation(),
            $taskDTO->getUserId(),
            $taskDTO->getCategoryId(),
            $taskDTO->getStartedOn(),
            $taskDTO->getDueDate(),
            $id
        ]);

        return true;
    }

    /**
     * @param int $taskId
     * @return \Generator|TaskDTO
     */
    public function selectTaskById(int $taskId): TaskDTO
    {
        return $this->db->query("
        SELECT task_id AS taskId, title, description, location, user_id AS userId, category_id AS categoryId, started_on AS startedOn, due_date AS dueDate  
        FROM tasks
        WHERE task_id = ?")
            ->execute([$taskId])
            ->fetch(TaskDTO::class)
            ->current();
    }

    public function deleteTask(int $taskId): bool
    {
        $this->db->query("
        DELETE FROM tasks
        WHERE task_id = ?")
            ->execute([$taskId]);

        return true;
    }
}