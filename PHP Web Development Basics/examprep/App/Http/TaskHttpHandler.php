<?php

namespace App\Http;


use App\Data\TaskDTO;
use App\Service\CategoryServiceInterface;
use App\Service\TaskServiceInterface;

class TaskHttpHandler extends HttpHandlerAbstract
{
    public function dashboard(TaskServiceInterface $taskService) {
        $taskDTO = $taskService->listAllTasks();
        $this->render("tasks/dashboard", $taskDTO);
    }

    public function addTask(TaskServiceInterface $taskService, TaskDTO $taskDTO, CategoryServiceInterface $categoryService, array $formData) {
        if (isset($formData['save'])) {
            try {
                $taskDTO = $this->dataBinder->binde($formData, TaskDTO::class);
                $taskDTO->setUserId($_SESSION['id']);
                $taskService->addTask($taskDTO);
                $this->redirect("dashboard.php");
            } catch (\Exception $e) {
                $taskDTO->setError($e->getMessage());
                $taskDTO->setData($formData);
                foreach ($categoryService->selectCategoryList() as $categoryDTO) {
                    $taskDTO->setCategoryList($categoryDTO);
                }
                $this->render("tasks/add", $taskDTO);
            }

        } else {
            foreach ($categoryService->selectCategoryList() as $categoryDTO) {
                $taskDTO->setCategoryList($categoryDTO);
            }
            $this->render("tasks/add", $taskDTO);
        }

    }

    public function edittask(TaskServiceInterface $taskService, TaskDTO $taskDTO, CategoryServiceInterface $categoryService, array $formData, $id) {
        if (isset($formData['edit'])) {
            try{
                $taskDTO = $this->dataBinder->binde($formData, TaskDTO::class);
                $taskDTO->setUserId($_SESSION['id']);
                $taskService->editTask($taskDTO, $id);
                $this->redirect("dashboard.php");
            } catch (\Exception $e) {
                $taskDTO = $taskService->selectTaskById($id);
                $taskDTO->setError($e->getMessage());
                foreach ($categoryService->selectCategoryList() as $categoryDTO) {
                    $taskDTO->setCategoryList($categoryDTO);
                }
                $this->render("tasks/edit", $taskDTO);
            }
        } else {
            try{
                $taskDTO = $taskService->selectTaskById($id);
            } catch (\Exception $e) {
                $taskDTO->setError($e->getMessage());
            }
            foreach ($categoryService->selectCategoryList() as $categoryDTO) {
                $taskDTO->setCategoryList($categoryDTO);
            }
            $this->render("tasks/edit", $taskDTO);
        }
    }

    public function deleteTask(TaskServiceInterface $taskService, int $id) {
        try{
            $taskService->deleteTask($id);
            $this->redirect("dashboard.php");
        } catch (\Exception $e) {
            $taskDTO = $taskService->listAllTasks();
            $this->render("tasks/dashboard", $taskDTO);
        }
    }
}