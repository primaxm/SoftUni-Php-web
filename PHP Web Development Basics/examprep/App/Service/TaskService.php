<?php

namespace App\Service;


use App\Data\TaskDTO;
use App\Repository\TaskRepositoryInterface;

class TaskService implements TaskServiceInterface
{
    /**
     * @var TaskRepositoryInterface
     */
    private $taskRepository;

    /**
     * TaskService constructor.
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }


    public function listAllTasks(): \Generator
    {
        return $this->taskRepository->selectAllTasks();
    }

    /**
     * @param TaskDTO $taskDTO
     * @return void
     * @throws \Exception
     */
    public function addTask(TaskDTO $taskDTO) : void
    {
        if(!$this->taskRepository->insertTask($taskDTO)) {
            throw new \Exception("Data insert problem!");
        }
    }

    /**
     * @param TaskDTO $taskDTO
     * @return bool
     * @throws \Exception
     */
    public function editTask(TaskDTO $taskDTO, int $id): bool
    {
        if(!$this->taskRepository->editTask($taskDTO, $id)) {
            throw new \Exception("Task is not updatetd successful");
        }
        return $this->taskRepository->editTask($taskDTO, $id);
    }

    /**
     * @param $id
     * @return TaskDTO
     * @throws \Exception
     */
    public function selectTaskById($id): TaskDTO
    {
        if(!$this->taskRepository->selectTaskById($id)) {
            throw new \Exception("Wrong task ID!");
        }
        return $this->taskRepository->selectTaskById($id);
    }

    /**
     * @param $id
     * @return bool
     * @throws \Exception
     */
    public function deleteTask($id) :bool
    {
        if(!$this->taskRepository->deleteTask($id)) {
            throw new \Exception("Wrong task ID!");
        }
        return $this->taskRepository->deleteTask($id);
    }
}