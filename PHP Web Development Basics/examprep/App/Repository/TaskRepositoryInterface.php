<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9.11.2018 г.
 * Time: 14:04 ч.
 */

namespace App\Repository;


use App\Data\TaskDTO;

interface TaskRepositoryInterface
{
    public function insertTask(TaskDTO $taskDTO) : bool;

    /**
     * @return \Generator|TaskDTO[]
     */
    public function selectAllTasks() : \Generator;

    public function editTask(TaskDTO $taskDTO, int $id) : bool;

    /**
     * @param int $taskId
     * @return \Generator|TaskDTO
     */
    public function selectTaskById(int $taskId) : TaskDTO;

    public function deleteTask(int $taskId) : bool;
}