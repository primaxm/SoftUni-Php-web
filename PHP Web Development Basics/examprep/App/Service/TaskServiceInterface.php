<?php

namespace App\Service;


use App\Data\TaskDTO;

interface TaskServiceInterface
{
    public function listAllTasks() : \Generator;
    public function addTask(TaskDTO $taskDTO) : void;
    public function editTask(TaskDTO $taskDTO, int $id) : bool;
    public function selectTaskById($id) : TaskDTO;
    public function deleteTask($id);
}