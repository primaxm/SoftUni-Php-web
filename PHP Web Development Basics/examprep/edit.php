<?php
include "common.php";

$taskRepository = new \App\Repository\TaskRepository($db);
$taskService = new \App\Service\TaskService($taskRepository);
$categoryRepository = new \App\Repository\CategoryRepository($db);
$categoryService = new \App\Service\CategoryService($categoryRepository);
$taskHttpHandler = new \App\Http\TaskHttpHandler($template, new \Core\DataBinder());
$taskDTO = new App\Data\TaskDTO();
$id = $_GET['id'];
$taskHttpHandler->edittask($taskService, $taskDTO, $categoryService, $_POST, $id);